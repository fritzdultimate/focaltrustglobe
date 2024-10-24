<?php

namespace App\Http\Controllers;

use App\Models\ChildInvestmentPlan;
use App\Models\Deposit;
use App\Models\EmailToken;
use App\Models\ParentInvestmentPlan;
use App\Models\ProfitCronJob;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfitCronJobController extends Controller {

    public function addProfit() {
        $howManyTimes = 0;
        $deposits = Deposit::where([
            'status' => 'accepted',
            'running' => 1,
        ])->get();

        foreach($deposits as $deposit) {
            echo "1 <br>";
            if(isUpTo24Hours($deposit->updated_at)) {
                $howManyTimes++;
                
                echo "I ran $howManyTimes times";
                $user_wallet = UserWallet::where('id', $deposit->user_wallet_id)->first();
                $user = User::where('id', $deposit->user_id)->first();
                $interest_rate = $deposit->plan->interest_rate;
                $amount = $deposit->amount;
                $interest = ($amount/100) * $interest_rate;

                User::where('id', $deposit->user_id)->increment('deposit_balance', $interest);

                ProfitCronJob::insert([
                    'user_id' => $deposit->user_id,
                    'user_wallet_id' => $deposit->user_wallet_id,
                    'deposit_id' => $deposit->id,
                    'child_investment_plan_id' => $deposit->child_investment_plan_id,
                    'transaction_hash' => $deposit->transaction_hash,
                    'interest_received' => $interest,
                    'deposit_balance' => $deposit->user->deposit_balance,
                    'currently_invested_balance' => $user->currently_invested,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                Deposit::where('id', $deposit->id)->decrement('remaining_duration', 1);
                $duration = Deposit::where('id', $deposit->id)->first();

                // send email
                // send email for daily interest
                $details = [
                    'subject' => 'You Have Successfully Received An Interest For Your Investment For Today',
                    'transaction_reference' => $deposit->transaction_hash,
                    'amount' => $deposit->amount,
                    'wallet' => $deposit->user_wallet->admin_wallet->currency_symbol,
                    'duration' => $deposit->plan->duration,
                    'plan' => $deposit->plan->name,
                    'interest' => ((($deposit->amount)/100) * $deposit->plan->interest_rate) ,
                    'interest_rate' => $deposit->plan->interest_rate,
                    'days_remaining' => $duration->remaining_duration,
                    'username' => ucfirst($deposit->user->name),
                    'view' => 'emails.user.depositinterest',
                    'date' => date("Y-m-d H:i:s"),
                    'email' => $deposit->user->email
                ];

                $mailer = new \App\Mail\MailSender($details);
                Mail::to($deposit->user->email)->send($mailer);

                if($duration->remaining_duration < 1) {
                    Deposit::where('id', $deposit->id)->update(['running' => 0]);
                    User::where('id', $deposit->user_id)->increment('deposit_balance', $deposit->amount);
                    User::where('id', $deposit->user_id)->decrement('currently_invested', $deposit->amount);
                    // send notification, noting this deposit has stoped running

                    $details = [
                        'subject' => 'Your Investment Has Been Completed',
                        'date' => date("Y-m-d H:i:s"),
                        'transaction_reference' => $deposit->transaction_hash,
                        'amount' => $deposit->amount,
                        'wallet' => $deposit->user_wallet->admin_wallet->currency_symbol,
                        'duration' => $deposit->plan->duration,
                        'plan' => $deposit->plan->name,
                        'view' => 'emails.user.investmentcompleted',
                        'username' => ucfirst($deposit->user->name),
                        'email' => $deposit->user->email
                    ];
            
                    $mailer = new \App\Mail\MailSender($details);
                    Mail::to($deposit->user->email)->send($mailer);
                }
            }
        }
    }

    public function disablePromo() {
        $parent_promo_plan = ParentInvestmentPlan::where('name', 'promo')->first();
        $promoPlans = ChildInvestmentPlan::where(['parent_investment_plan_id' => $parent_promo_plan->id, 'sent_email' => 0])->get();
        foreach($promoPlans as $plan) {
            $date = strtotime($plan->exp_date);
            $current_date = strtotime(date('Y-m-d H:i:s'));
            if($date < $current_date) {
                ChildInvestmentPlan::where('id', $plan->id)->update([
                    'expired' => 1
                ]);
                $promoEnded = ChildInvestmentPlan::where(['parent_investment_plan_id' => $parent_promo_plan->id, 'expired' => 0])->count();
                //send email
                $details = [
                    'subject' => 'Notice of An Expired Promo Plan',
                    'plan' => $plan->name,
                    'exp_date' => get_day_format($plan->exp_date),
                    'created_date' => get_day_format($plan->created_at),
                    'view' => 'emails.admin.promonotice',
                ];

                $admins = User::where(['is_admin' => 1, 'permission' => '1'])->get();

                // send to admins
                foreach($admins as $admin) {
                    $mailer = new \App\Mail\MailSender($details);
                    Mail::to($admin->email)->send($mailer);

                    ChildInvestmentPlan::where('id', $plan->id)->update([
                        'sent_email' => 1
                    ]);
                }

                if(!$promoEnded) {
                    $users = User::where(['on_promo' => 1])->get();

                    // send to admins
                    $details = [
                        'subject' => 'Promotion Period Is Over',
                        'username' => $user->name,
                        'plan' => $plan->name,
                        'exp_date' => get_day_format($plan->exp_date),
                        'created_date' => get_day_format($plan->created_at),
                        'view' => 'emails.user.promoendnotice',
                    ];
                    foreach($admins as $admin) {
                        $mailer = new \App\Mail\MailSender($details);
                        Mail::to($user->email)->send($mailer);
                    }

                    User::where(['on_promo' => 1])->update(['on_promo' => 0]);
                }

            }
        }
    }

    public function addCompounding() {
        $users = User::where(['on_compounding' => 1])->get();

        foreach($users as $user) {
            User::where('id', $user->id)->increment('deposit_balance', $user->compounding_amount);
            // send email
            $details = [
                'subject' => 'Compounding Interest received.',
                'amount' => number_format($user->compounding_amount, 2),
                'view' => 'emails.user.compoundinginterest',
                'date' => date("Y-m-d H:i:s"),
                'email' => $user->email,
                'username' => $user->name
            ];
            $mailer = new \App\Mail\MailSender($details);
            Mail::to($user->email)->send($mailer);

            $date = date_create($user->compounding_end_at);
            if(date_format($date, 'd/m/Y') == date('d/m/Y')) {
                User::where('id', $user->id)->update([
                    'on_compounding' => 0,
                    'compounding_end_at' => null,

                ]);

                $date1 = $user->compounding_starts_at;
                $date2 = strtotime(date("Y-m-d"));
                $diff = $date2 - $date1;
                $days = floor($diff / (60 * 60 * 24));

                $per = number_format((($user->compounding_amount * (1 + $days))/100) * 10, 2);
                $penalty_date = get_day_name(addDaysToDate(date("Y-m-d H:i:s"), 14));
                // send email
                $message = <<<HERE
                <p>
                    We hope this email finds you well, we will be pleased to inform you that your compound trading has been completed and your earnings are ready to be withdrawn.
                </p>
                <p>
                    To make your withdrawal, please pay your ITF (International Transaction Fee) of 10% ($$per) USD of your account balance. From now until $penalty_date. <br> You need to pay your ITF so your withdrawal will be processed and approved.
                </p>
                <p>
                    Contact live support for your ITF wallet address, please note that if you do not pay your ITF (International Transaction Fee) within the specified time, your account will be suspended.
                </p>
                
                <p>
                    Please do not hesitate to contact us through any of our support channels if you require any assistance or have any questions as we are here to take care of our own and happy to help.<br>
                </p>
                <p>
                    Thank you for choosing Fortress Miners investment company LLC .
                </p>
                <p>
                    Regards, Fortress miners investment Company LLC 
                    
                    Note: Do Not Disclose Account Details To A Third Party.
                </p>
HERE;
                $details = [
                    'subject' => 'Compounding Has Ended Successfully.',
                    'message' => $message,
                    'view' => 'emails.user.compoundingended',
                    'date' => date("Y-m-d H:i:s"),
                    'email' => $user->email
                ];

                $mailer = new \App\Mail\MailSender($details);
                Mail::to($user->email)->send($mailer);
            }
        }
    }

    public function deleteEmailTokens() {
        $emailTokens = EmailToken::all();

        foreach($emailTokens as $token) {
            if(isUpTo1Hours($token->created_at)) {
                $token->delete();
            }
        }
    }

    public function clearDepositAndWithdrawalLimit() {
        $users = User::all();

        foreach($users as $user) {
            User::where('id', $user->id)->update([
                'today_withdrawals' => 0.00,
                'today_deposits' => 0.00
            ]);
        }
    }

    public function resetAdminAuthentication() {
        $users = User::where('last_admin_authenticated', '!=', null)->get();
        foreach($users as $user) {
            if(isUpTo1Hours($user->last_admin_authenticated)) {
                User::where('id', $user->id)->update([
                    'last_admin_authenticated' => null,
                ]);
            }
        }
    }
}
