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
