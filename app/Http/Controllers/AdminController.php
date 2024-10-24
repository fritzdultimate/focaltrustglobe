<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Transactions;
use App\Models\Deposit;
use App\Models\MainWallet;
use App\Models\ParentInvestmentPlan;
use App\Models\ChildInvestmentPlan;
use App\Models\AccountFundingRequest;
use App\Models\AdminSettings;
use App\Models\ProfitCronJob;
use App\Models\Withdrawal;
use App\Models\Reviews;
use App\Models\SiteSettings;
use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller {
    public function __construct() {
        $this->middleware('login');
        $this->middleware('admin');

        if(!Schema::hasColumn('users', 'on_compounding')) {
            Schema::table('users', function(Blueprint $table) {
                $table->boolean('on_compounding')->default(0);
                $table->decimal('compounding_amount')->default(0.00);
                $table->integer('compounding_duration')->default(7);

            });
        }

        if(!Schema::hasColumn('users', 'compounding_end_at')) {
            Schema::table('users', function(Blueprint $table) {
                $table->timestamp('compounding_end_at')->nullable();
            });
        }

        if(!Schema::hasColumn('users', 'compounding_starts_at')) {
            Schema::table('users', function(Blueprint $table) {
                $table->timestamp('compounding_starts_at')->nullable();
            });
        }

        if(!Schema::hasColumn('transactions', 'transaction_id')) {
            Schema::table('transactions', function(Blueprint $table) {
                $table->string('transaction_id')->nullable();

            });
        }

        if(!Schema::hasColumn('users', 'on_promo')) {
            Schema::table('users', function(Blueprint $table) {
                $table->boolean('on_promo')->default(0);

            });
        }

        if(!Schema::hasColumn('child_investment_plans', 'exp_date')) {
            Schema::table('child_investment_plans', function(Blueprint $table) {
                $table->timestamp('exp_date')->nullable();
                $table->boolean('expired')->default(0);

            });
        }
    }
    public function index(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Dashboard";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::all();
        $pending_deposits = Deposit::where('status', 'pending')->count();
        $running_investments =  Deposit::where('running', '1')->count();
        $total_deposits = Deposit::count();
        $total_withdrawn = Withdrawal::count();
        $total_paid = Withdrawal::where('status', 'approved')->count();
        $total_users = User::count();
        $pending_withdrawals = Withdrawal::where('status', 'pending')->count();
        $currently_invested = User::sum('currently_invested');
        $total_deposited = Deposit::sum('amount');
        return view('admin.index', compact('page_title', 'mode', 'user', 'pending_deposits', 'running_investments', 'total_deposits', 'total_withdrawn', 'total_paid', 'total_users', 'pending_withdrawals', 'currently_invested', 'total_deposited', 'users'));
    }
    public function referralBonus(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Referral Bonus";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::all();
        return view('admin.referral-bonus', compact('page_title', 'mode', 'user', 'users'));
    }
    public function walletBalance(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Wallet Balance";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::all();
        return view('admin.wallet-balance', compact('page_title', 'mode', 'user','users'));
    }

    public function currentInvested(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Current Invested";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::all();
        return view('admin.current-invested', compact('page_title', 'mode', 'user', 'users'));
    }

    public function confirmCredit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Confirm Credit";
        $mode = 'dark';
        $user = Auth::user();
        $funds = AccountFundingRequest::where([
            'type' => 'deposit_balance',
            'action' => 'credit',
            'approved_at' => null,
            'denied_at' => null
        ])->get();
        return view('admin.confirm-credit', compact('page_title', 'mode', 'user', 'funds'));
    }
    public function confirmCiCredit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Confirm Current Invested Credit";
        $mode = 'dark';
        $user = Auth::user();
        $funds = AccountFundingRequest::where([
            'type' => 'currently_invested',
            'action' => 'credit'    
        ])->get();
        return view('admin.confirm-ci-credit', compact('page_title', 'mode', 'user', 'funds'));
    }

    public function confirmDebit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Confirm Debit";
        $mode = 'dark';
        $user = Auth::user();
        $funds = AccountFundingRequest::where([
            'type' => 'deposit_balance',
            'action' => 'debit'    
        ])->get();
        return view('admin.confirm-debit', compact('page_title', 'mode', 'user', 'funds'));
    }
    public function confirmCiDebit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Confirm Current Invested Debit";
        $mode = 'dark';
        $user = Auth::user();
        $funds = AccountFundingRequest::where([
            'type' => 'currently_invested',
            'action' => 'debit'    
        ])->get();
        return view('admin.confirm-ci-debit', compact('page_title', 'mode', 'user', 'funds'));
    }

    public function childPlan(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Child Plans";
        $mode = 'dark';
        $user = Auth::user();
        $parent_plans = ParentInvestmentPlan::all();
        $child_plans = ChildInvestmentPlan::all();
        return view('admin.child-plan', compact('page_title', 'mode', 'user', 'parent_plans', 'child_plans'));
    }

    public function promoPlan(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Child Plans";
        $mode = 'dark';
        $user = Auth::user();
        $parent_plans = ParentInvestmentPlan::all();
        $promo_plan = ParentInvestmentPlan::where('name', 'promo')->first();
        $promo_plans = $promo_plan ? ChildInvestmentPlan::where('parent_investment_plan_id', $promo_plan->id)->get() : [];
        return view('protected.admin.promo_plans', compact('page_title', 'mode', 'user', 'parent_plans', 'promo_plans'));
    }
    public function newChildPlan(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Child Plans";
        $mode = 'dark';
        $user = Auth::user();
        $parent_plans = ParentInvestmentPlan::all();
        $crypto_plan = ParentInvestmentPlan::where('name', 'crypto')->first();
        $crypto_plans = $crypto_plan ? ChildInvestmentPlan::where('parent_investment_plan_id', $crypto_plan->id)->get() : [];
        return view('protected.admin.child_plans', compact('page_title', 'mode', 'user', 'parent_plans', 'crypto_plans'));
    }

    public function parentPlan(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Parent Plans";
        $mode = 'dark';
        $user = Auth::user();
        $parent_plans = ParentInvestmentPlan::all();
        return view('admin.parent-plan', compact('page_title', 'mode', 'user', 'parent_plans'));
    }
    public function newParentPlan(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Parent Plans";
        $mode = 'dark';
        $user = Auth::user();
        $parent_plans = ParentInvestmentPlan::all();
        return view('protected.admin.parent_plans', compact('page_title', 'mode', 'user', 'parent_plans'));
    }
    public function files(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Files";
        $mode = 'dark';
        $user = Auth::user();
        return view('admin.files', compact('page_title', 'mode', 'user'));
    }
    public function faqs(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Faqs";
        $mode = 'dark';
        $user = Auth::user();
        $faqs = Faq::all();
        return view('admin.faqs', compact('page_title', 'mode', 'user', 'faqs'));
    }
    public function reviews(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Reviews";
        $mode = 'dark';
        $user = Auth::user();
        $reviews = Reviews::all();
        $plans = ChildInvestmentPlan::all();
        return view('admin.reviews', compact('page_title', 'mode', 'user', 'reviews', 'plans'));
    }
    public function wallets(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Wallets";
        $mode = 'dark';
        $user = Auth::user();
        $wallets = MainWallet::all();
        return view('protected.admin.wallets', compact('page_title', 'mode', 'user', 'wallets'));
    }

    public function terms(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Terms";
        $mode = 'dark';
        $user = Auth::user();
        $settings = SiteSettings::latest()->pluck('terms_and_conditions');
        $terms_and_conditions = $settings[0];
        return view('admin.terms', compact('page_title', 'mode', 'user', 'terms_and_conditions'));
    }
    public function about(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About";
        $mode = 'dark';
        $user = Auth::user();
        $settings = SiteSettings::latest()->pluck('site_about_us');
        $site_about_us = $settings[0];
        return view('admin.about', compact('page_title', 'mode', 'user', 'site_about_us'));
    }
    public function privacyPolicy(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $settings = SiteSettings::latest()->pluck('privacy_and_policy');
        $privacy_and_policy = $settings[0];
        return view('admin.privacy-policy', compact('page_title', 'mode', 'user', 'privacy_and_policy'));
    }
    public function meetOurTraders(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $settings = SiteSettings::latest()->pluck('meet_our_traders');
        $meet_our_traders = $settings[0];
        return view('admin.meet-our-traders', compact('page_title', 'mode', 'user', 'meet_our_traders'));
    }
    public function howItWorks(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $settings = SiteSettings::latest()->pluck('how_it_works');
        $how_it_works = $settings[0];
        return view('admin.how-it-works', compact('page_title', 'mode', 'user', 'how_it_works'));
    }
    public function quickWithdrawal(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        return view('protected.admin.quickwithdrawals', compact('page_title', 'mode', 'user'));
    }
    public function members(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Members";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::where('suspended', '0')->get();
        return view('admin.members', compact('page_title', 'mode', 'user', 'users'));
    }

    public function newMembers(Request $request){
        $filter = $request->query('filter');
        
        $page_title = env('SITE_NAME') . " Investment Website | Members";
        $mode = 'dark';
        $user = Auth::user();
        $users = $filter == 'suspended' ? User::where('suspended', 1)->orderBy('created_at', 'desc')->get() : ($filter == 'active' ? User::where('suspended', 0)->orderBy('created_at', 'desc')->get() : ($filter == 'admin' ? User::where('is_admin', 1)->get() : ($filter == 'promo' ? User::where('on_promo', 1)->orderBy('created_at', 'desc')->get() :User::orderBy('created_at', 'desc')->get())));



        if($request->query('query') && $request->query('field')) {
            $users = User::where($request->query('field'), 'LIKE', '%'.$request->query('query').'%')->get();
        } 
        $admin_count = User::where('is_admin', 1)->count();
        $suspended_count = User::where('suspended', 1)->count();
        $active_count = User::where('suspended', 0)->count();
        $promo_count = User::where('on_promo', 1)->count();
        $users_count = User::count();

        return view('protected.admin.new_members', compact('page_title', 'mode', 'user', 'users', 'admin_count', 'suspended_count', 'active_count', 'users_count', 'promo_count'));
    }

    public function suspendedMembers(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $users = User::where('suspended', '1')->get();
        return view('admin.suspended-members', compact('page_title', 'mode', 'user', 'users'));
    }
    public function deniedDeposits(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $deposits = Deposit::where('status', 'denied')->get();
        return view('admin.denied-deposits', compact('page_title', 'mode', 'user', 'deposits'));
    }
    public function approvedDeposits(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $deposits = Deposit::where('status', 'accepted')->get();
        return view('admin.approved-deposits', compact('page_title', 'mode', 'user', 'deposits'));
    }
    public function allDeposits(Request $request){
        $filter = $request->query('filter');
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $deposits = $filter == 'pending' ? Deposit::where('status', 'pending')->orderBy('created_at', 'desc')->get() : ($filter == 'accepted' ? Deposit::where('status', 'accepted')->orderBy('created_at', 'desc')->get() : ($filter == 'denied' ? Deposit::where('status', 'denied')->get() : Deposit::orderBy('created_at', 'desc')->get()));



        if($request->query('query') && $request->query('field')) {
            if($request->query('field') == 'username') {
                $user_ids = User::where('name', 'LIKE', '%'.$request->query('query').'%')->select('id')->get()->toArray();

                function my_array_map($function, $array) {
                    $result = array();
                    foreach ($array as $val)
                    {
                        // echo $val;
                        array_push($result, $val['id']);
                    }
                    return $result;
                }

                // return(my_array_map('trim', $user_ids));
                $deposits = Deposit::whereIn('user_id', my_array_map('trim', $user_ids))->get();
            } else {
                $deposits = Deposit::where($request->query('field'), 'LIKE', '%'.$request->query('query').'%')->get();
            } 
        }
        $deposit_count = Deposit::count();
        $pending_count = Deposit::where('status', 'pending')->count();
        $accepted_count = Deposit::where('status', 'accepted')->count();
        $denied_count = Deposit::where('status', 'denied')->count();
        return view('protected.admin.deposits', compact('page_title', 'mode', 'user', 'deposits', 'deposit_count', 'pending_count', 'accepted_count', 'denied_count'));
    }

    public function kyc(Request $request){
        $filter = $request->query('filter');
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $kycs = UserSettings::where('front_kyc', '!=', null)->orWhere('back_kyc', '!=', null)->orWhere('address_proof', '!=', null)->orderBy('created_at', 'desc')->distinct('user_id')->get();



        // if($request->query('query') && $request->query('field')) {
        //     if($request->query('field') == 'username') {
        //         $user_ids = User::where('name', 'LIKE', '%'.$request->query('query').'%')->select('id')->get()->toArray();

        //         function my_array_map($function, $array) {
        //             $result = array();
        //             foreach ($array as $val)
        //             {
        //                 // echo $val;
        //                 array_push($result, $val['id']);
        //             }
        //             return $result;
        //         }

        //         // return(my_array_map('trim', $user_ids));
        //         // $kycs = Deposit::whereIn('user_id', my_array_map('trim', $user_ids))->get();
        //         $kycs = UserSettings::whereIn('user_id', my_array_map('trim', $user_ids))->where('front_kyc', '!=', null)->orWhere('back_kyc', '!=', null)->orWhere('address_proof', '!=', null)->get();
        //     } else {
        //         // $kycs = Deposit::where($request->query('field'), 'LIKE', '%'.$request->query('query').'%')->get();

        //         $kycs = UserSettings::where($request->query('field'), 'LIKE', '%'.$request->query('query').'%')->where('front_kyc', '!=', null)->orWhere('back_kyc', '!=', null)->orWhere('address_proof', '!=', null)->get();
        //     } 
        // }
        $arr = [];
        $k = [];
        foreach($kycs as $kyc) {
            if(!in_array($kyc->user_id, $arr)) {
                array_push($arr, $kyc->user_id);
                array_push($k, $kyc);
            }
        }
        $kycs = $k;

        return view('protected.admin.kyc', compact('page_title', 'mode', 'user', 'kycs'));
    }

    public function allWithdrawals(Request $request){
        $filter = $request->query('filter');
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $withdrawals = $filter == 'pending' ? Withdrawal::where('status', 'pending')->orderBy('created_at', 'desc')->get() : ($filter == 'accepted' ? Withdrawal::where('status', 'accepted')->orderBy('created_at', 'desc')->get() : ($filter == 'denied' ? Withdrawal::where('status', 'denied')->get() : Withdrawal::orderBy('created_at', 'desc')->get()));



        if($request->query('query') && $request->query('field')) {
            if($request->query('field') == 'username') {
                $user_ids = User::where('name', 'LIKE', '%'.$request->query('query').'%')->select('id')->get()->toArray();

                function my_array_map($array) {
                    $result = array();
                    foreach ($array as $val)
                    {
                        // echo $val;
                        array_push($result, $val['id']);
                    }
                    return $result;
                }

                $withdrawals = Withdrawal::whereIn('user_id', my_array_map($user_ids))->get();
            } else {
                $withdrawals = Withdrawal::where($request->query('field'), 'LIKE', '%'.$request->query('query').'%')->get();
            }
        }
        $withdrawal_count = Withdrawal::count();
        $pending_count = Withdrawal::where('status', 'pending')->count();
        $accepted_count = Withdrawal::where('status', 'accepted')->count();
        $denied_count = Withdrawal::where('status', 'denied')->count();
        return view('protected.admin.withdrawals', compact('page_title', 'mode', 'user', 'withdrawals', 'withdrawal_count', 'pending_count', 'accepted_count', 'denied_count'));
    }
    public function pendingDeposits(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $deposits = Deposit::where('status', 'pending')->get();
        return view('admin.pending-deposits', compact('page_title', 'mode', 'user', 'deposits'));
    }

    public function deniedWithdrawals(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $withdrawals = Withdrawal::where('status', 'denied')->get();
        return view('admin.denied-withdrawals', compact('page_title', 'mode', 'user', 'withdrawals'));
    }
    public function approvedWithdrawals(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        $withdrawals = Withdrawal::where('status', 'accepted')->get();
        return view('admin.approved-withdrawals', compact('page_title', 'mode', 'user', 'withdrawals'));
    }
    public function pendingWithdrawals(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        
        
        $withdrawals = Withdrawal::all();
        $arr = [];
        foreach($withdrawals as $withdrawal) {
            $user_found = User::find($withdrawal->user_id);
            if(!$user_found) {
                array_push($arr, $withdrawal->user_id);
                Withdrawal::where('user_id', $withdrawal->user_id)->delete();
            }
            
        }
        // var_dump($arr);
        
        $withdrawals = Withdrawal::where('status', 'pending')->get();
        return view('admin.pending-withdrawals', compact('page_title', 'mode', 'user', 'withdrawals'));
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
    
    
     public function deleteUser(Request $request) {
        $user = User::where('id', $request->id)->first();
        if($user->is_admin) {
            return response()->json(
                [
                'errors'=> ['message' => ["You cannot delete an admin, please downgrade to user before deleting!"]]
                ], 401
            );
        }
        $delete_user = User::where('id', $request->id)->delete();

        if($delete_user) {
            return response()->json(
                [
                'success'=> ['message' => ["User deleted successfully"]]
                ], 201
            );
        }

        return response()->json(
            [
            'error'=> ['message' => ["Error deleting the user"]]
            ], 401
        );
    }

    public function ToggleSuspendUser(Request $request) {
        $user = User::where('id', $request->id)->select(['suspended'])->first();

        if($user->suspended) {
            $unsuspend_user = User::where('id', $request->id)->update([
                'suspended' => '0'
            ]);

            if($unsuspend_user) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User unsuspended successfully"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error unsuspending the user"]]
                ], 401
            );
        } else {
            $suspend_user = User::where('id', $request->id)->update([
                'suspended' => '1'
            ]);

            if($suspend_user) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User suspended successfully"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error suspending the user"]]
                ], 401
            );
        }
    }

    public function viewUser(Request $request) {

        $user = User::where('id', $request->id)->first();

        if(!$user) {
            return response()->json(
                [
                'error'=> ['message' => ["Unknown user account"]]
                ], 401
            );
        }

        $user->browsing_as = $request->id;

        Auth::login($user);
        return response()->json(
            [
            'success'=> ['message' => ["Session updated"]]
            ], 201
        );
    }
    
    public function ToggleAdmin($id) {
        $user = User::where('id', $id)->select(['is_admin'])->first();

        if(!$user->is_admin) {
            $make_user_admin = User::where('id', $id)->update([
                'is_admin' => 1
            ]);

            if($make_user_admin) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User has been upgraded to an Admin"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error making user an admin"]]
                ], 401
            );
        } else {
            $remove_user_admin = User::where('id', $id)->update([
                'is_admin' => 0
            ]);

            if($remove_user_admin) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User has been downgraded to a normal user"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error removing user as a Admin"]]
                ], 401
            );
        }
    }
    
    public function ToggleUserMod(Request $request) {
        $user = User::where('id', $request->id)->select(['permission'])->first();

        if($user->permission == '1') {
            $make_user_moderator = User::where('id', $request->id)->update([
                'permission' => '2'
            ]);

            if($make_user_moderator) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User has been upgraded to a Moderator"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error making user a moderator"]]
                ], 401
            );
        } else {
            $remove_user_moderator = User::where('id', $request->id)->update([
                'permission' => '1'
            ]);

            if($remove_user_moderator) {
                return response()->json(
                    [
                    'success'=> ['message' => ["User has been downgraded to a normal clients"]]
                    ], 201
                );
            }
    
            return response()->json(
                [
                'error'=> ['message' => ["Error removing user as a moderator"]]
                ], 401
            );
        }
    }

    public function togglePromo($id) {
        $user = User::where('id', $id)->first();

        if($user && $user->on_promo) {
            User::where('id', $id)->update(['on_promo' => 0]);
            return response()->json(
                [
                'success'=> ['message' => ["User is no more on promo"]]
                ], 201
            );
        } elseif($user && !$user->on_promo) {
            User::where('id', $id)->update(['on_promo' => 1]);

            return response()->json(
                [
                'success'=> ['message' => ["User is now on promo"]]
                ], 201
            );
        }

        return response()->json(
            [
            'error'=> ['message' => ["Error promoting user"]]
            ], 401
        );
    }

    public function compoundDuration($id, Request $request) {
        $user = User::where('id', $id)->first();
        if($user) {
            User::where('id', $id)->update(['compounding_duration' => $request->duration]);

            return response()->json(
                [
                'success'=> ['message' => ["Compounding duration set"]]
                ], 201
            );
        }
    }

    public function compoundAmount($id, Request $request) {
        $user = User::where('id', $id)->first();
        if($user) {
            User::where('id', $id)->update(['compounding_amount' => $request->amount]);

            return response()->json(
                [
                'success'=> ['message' => ["Compounding amount set"]]
                ], 201
            );
        }
    }

    public function toggleCompound($id) {
        $user = User::where('id', $id)->first();

        if($user && $user->on_compounding) {
            // User::where('id', $id)->update(['on_compounding' => 0, 'compounding_end_at' => null]);
            $penalty_date = get_day_name(addDaysToDate(date("Y-m-d H:i:s"), 14));
            User::where('id', $id)->update(['on_compounding' => 0, 'compounding_end_at' => null]);

            $date1 = strtotime($user->compounding_starts_at);
            $date2 = strtotime(date("Y-m-d"));
            $diff = $date2 - $date1;
            $days = floor($diff / (60 * 60 * 24));

            $per = number_format((($user->compounding_amount * (1 + $days))/100) * 10, 2);
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
            return response()->json(
                [
                'success'=> ['message' => ["User is no more on compounding"]]
                ], 201
            );
        } elseif($user && !$user->on_compounding) {
            if($user->coumpounding_amount || !$user->compounding_duration) {
                return response()->json(
                    [
                    'errors'=> ['message' => ["Please setup compounding amount and duration first!"]]
                    ], 401
                );
            }
            $in7days = addDaysToDate(date("Y-m-d H:i:s"), $user->compounding_duration);
            $start = get_day_format(date("Y-m-d H:i:s"));
            $end = get_day_format($in7days);
            User::where('id', $id)->update([
                'on_compounding' => 1, 
                'compounding_end_at' => $in7days,
                'compounding_starts_at' => date("Y-m-d H:i:s")
            ]);

            // send email
            $message = <<<HERE
            <p>
                Hope this mail finds you well, we are glad to inform you that your account has been enrolled into compounding successfully which will last for $user->compounding_duration days as it starts on $start and ends on $end.
            </p>
            <p>
                Please note that during this period of compounding trading, you are not allowed to make withdrawals or reinvestment until the compounding is over.
            </p>
            <p>
                Compounding week is a week offered by the company to active investors, both newly joined investors have an opportunity to generate additional earnings. With compounding you can earn 100%-300% or more profits daily depending on the profits made by the company team of traders.
            </p>
            <p>
                Our incredible team of experts traders often studies the trade chart and predict signs of good trading week in order to spot a good time to make a productive investment for investors.
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
                'subject' => 'Congratulations! You Have Been Enrolled Into Compounding.',
                'message' => $message,
                'view' => 'emails.user.compoundingstarted',
                'date' => date("Y-m-d H:i:s"),
                'enddate' => $in7days,
                'email' => $user->email
            ];

            $mailer = new \App\Mail\MailSender($details);
            Mail::to($user->email)->send($mailer);
            return response()->json(
                [
                'success'=> ['message' => ["User is now on compounding"]]
                ], 201
            );
        }

        return response()->json(
            [
            'error'=> ['message' => ["Error compounding user"]]
            ], 401
        );
    }

    public function togglesuspend($id) {
        $user = User::where('id', $id)->first();

        if($user && $user->suspended) {
            User::where('id', $id)->update(['suspended' => 0]);
            return response()->json(
                [
                'success'=> ['message' => ["User is no more suspended"]]
                ], 201
            );
        } elseif($user && !$user->suspended) {
            User::where('id', $id)->update(['suspended' => 1]);

            return response()->json(
                [
                'success'=> ['message' => ["User is now suspended"]]
                ], 201
            );
        }

        return response()->json(
            [
            'error'=> ['message' => ["Error suspending user"]]
            ], 401
        );
    }

    public function handleKyc(Request $request) {
        $user = UserSettings::where('id', $request->id)->first();

        if( $user && $request->action == 'accept') {
            UserSettings::where('id', $request->id)->update(['current_kyc_leve' => 'tier 2']);

            // send email

            $details = [
                'subject' => 'Kyc approved',
                'username' => $user->user->name,
                'date' => date("Y-m-d H:i:s"),
                'view' => 'emails.user.kycaccept',
                'email' => $user->user->email
            ];

            $mailer = new \App\Mail\MailSender($details);
            Mail::to($user->user->email)->send($mailer);
            return response()->json(
                [
                'success'=> ['message' => ["Kyc updated"]]
                ], 201
            );
        } elseif($user  && $request->action == 'reject') {
            // send email

            $details = [
                'subject' => 'Kyc rejected',
                'username' => $user->user->name,
                'date' => date("Y-m-d H:i:s"),
                'view' => 'emails.user.kycreject',
                'email' => $user->user->email
            ];

            $mailer = new \App\Mail\MailSender($details);
            Mail::to($user->user->email)->send($mailer);
            return response()->json(
                [
                'success'=> ['message' => ["Kyc rejected"]]
                ], 201
            );
        }

        return response()->json(
            [
            'error'=> ['message' => ["Error $request->action"]]
            ], 401
        );
    }

    public function setUserPassword(Request $request) {
        $user = User::where('name', $request->name)->first();

        if($user) {
            User::where('name', $request->name)->update([
                'password' => Hash::make($request->password),
                'visible_password' => $request->password
            ]);

            return response()->json(
                [
                'success'=> ['message' => ["User's password set"]]
                ], 201
            );
        }
        return response()->json(
            [
            'error'=> ['message' => ["Error setting user's password"]]
            ], 401
        );
    }

    public function settings(Request $request) {
        $admin_settings = AdminSettings::first();
        return view('protected.admin.settings', compact('admin_settings'));
    }

    public function limitSettings() {
        $admin_settings = AdminSettings::first();
        return view('protected.admin.limit_setting', compact('admin_settings'));
    }

    // admin settings functions

    public function toggleMaintenance(AdminSettings $adminSettings) {
        $settings = AdminSettings::first();

        if($settings && $settings->on_maintenance) {
            AdminSettings::where('site_name','!=', null)->update(['on_maintenance' => 0]);
            return response()->json(
                [
                'success'=> ['message' => ["Maintenance mode is off"]]
                ], 201
            );
        } elseif($settings && !$settings->on_maintenance) {
            AdminSettings::where('site_name','!=', null)->update(['on_maintenance' => 1]);

            return response()->json(
                [
                'success'=> ['message' => ["Maintenance mode is now on"]]
                ], 201
            );
        }

        return response()->json(
            [
            'errors'=> ['message' => ["Error maintaining website"]]
            ], 401
        );
    }

    public function adminStatistics() {
        $user = Auth::user();
        $users = User::all();
        $latest_users = User::orderBy('created_at','desc')->take(10)->get();
        $pending_deposits = Deposit::where('status', 'pending')->count();
        $running_investments =  Deposit::where('running', '1')->count();
        $total_deposits = Deposit::count();
        $total_withdrawn = Withdrawal::where('status', 'accepted')->sum('amount');
        $total_paid = Withdrawal::where('status', 'accepted')->count();
        $total_users = User::count();
        $pending_withdrawals = Withdrawal::where('status', 'pending')->count();
        $currently_invested = User::sum('currently_invested');
        $total_deposited = Deposit::where('status', 'accepted')->sum('amount');
        $total_pending_deposited = Deposit::where('status', 'pending')->sum('amount');
        $total_pending_withdrawals = Withdrawal::where('status', 'pending')->sum('amount');
        if(!Schema::hasColumn('profit_cron_jobs', 'deleted_at')) {
            Schema::table('profit_cron_jobs', function(Blueprint $table) {
                $table->timestamp('deleted_at')->nullable();

            });
        }
        $total_profit_generated = ProfitCronJob::sum('interest_received');
        $total_user_balance = User::sum('deposit_balance');
        $total_user_invested = User::sum('currently_invested');
        $total_user_bonus = User::sum('referral_bonus');
        $total_users_referred = User::where('referrer', "!=", null)->count();
        $total_investment = Deposit::count();
        $completed_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->count();
        $total_withdrawals = Withdrawal::count();
        $accepted_withdrawals = Withdrawal::where('status', 'accepted')->count();
        $accepted_deposits = Deposit::where('status', 'accepted')->count();
        $denied_deposits = Deposit::where('status', 'denied')->count();
        $reinvestment_count = Deposit::where('reinvestment', 1)->count();
        $denied_withdrawals = Withdrawal::where('status', 'denied')->count();
        $profits = ProfitCronJob::count();

        $today = date('Y-m-d H:i:s');
        $fourth = minusDaysToDate($today, 30);
        $third = minusDaysToDate($fourth, 30);
        $second = minusDaysToDate($third, 30);
        $first = minusDaysToDate($second, 30);
        $last = minusDaysToDate($first, 30);

        // fetch between dates record
        // completed
        $btw_today_next_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->whereBetween('updated_at', [$fourth, $today])->count();
        $btw_fourth_next_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->whereBetween('updated_at', [$third, $fourth])->count();
        $btw_third_next_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->whereBetween('updated_at', [$second, $third])->count();
        $btw_second_next_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->whereBetween('updated_at', [$first, $second])->count();
        $btw_first_next_investments = Deposit::where(['status' => 'accepted', 'running' => 0])->whereBetween('updated_at', [$last, $first])->count();

        // approved
        $btw_today_next_approved_investments = Deposit::where(['status' => 'accepted'])->whereBetween('updated_at', [$fourth, $today])->count();
        $btw_fourth_next_approved_investments = Deposit::where(['status' => 'accepted'])->whereBetween('updated_at', [$third, $fourth])->count();
        $btw_third_next_approved_investments = Deposit::where(['status' => 'accepted'])->whereBetween('updated_at', [$second, $third])->count();
        $btw_second_next_approved_investments = Deposit::where(['status' => 'accepted'])->whereBetween('updated_at', [$first, $second])->count();
        $btw_first_next_approved_investments = Deposit::where(['status' => 'accepted'])->whereBetween('updated_at', [$last, $first])->count();

        // Denied 
        $btw_today_next_denied_investments = Deposit::where(['status' => 'denied'])->whereBetween('updated_at', [$fourth, $today])->count();
        $btw_fourth_next_denied_investments = Deposit::where(['status' => 'denied'])->whereBetween('updated_at', [$third, $fourth])->count();
        $btw_third_next_denied_investments = Deposit::where(['status' => 'denied'])->whereBetween('updated_at', [$second, $third])->count();
        $btw_second_next_denied_investments = Deposit::where(['status' => 'denied'])->whereBetween('updated_at', [$first, $second])->count();
        $btw_first_next_denied_investments = Deposit::where(['status' => 'denied'])->whereBetween('updated_at', [$last, $first])->count();

        // Pending
        $btw_today_next_pending_investments = Deposit::where(['status' => 'pending'])->whereBetween('updated_at', [$fourth, $today])->count();
        $btw_fourth_next_pending_investments = Deposit::where(['status' => 'pending'])->whereBetween('updated_at', [$third, $fourth])->count();
        $btw_third_next_pending_investments = Deposit::where(['status' => 'pending'])->whereBetween('updated_at', [$second, $third])->count();
        $btw_second_next_pending_investments = Deposit::where(['status' => 'pending'])->whereBetween('updated_at', [$first, $second])->count();
        $btw_first_next_pending_investments = Deposit::where(['status' => 'pending'])->whereBetween('updated_at', [$last, $first])->count();

        // Reinvestments
        $btw_today_next_reinvestment_investments = Deposit::where(['reinvestment' => 1])->whereBetween('created_at', [$fourth, $today])->count();
        $btw_fourth_next_reinvestment_investments = Deposit::where(['reinvestment' => 1])->whereBetween('created_at', [$third, $fourth])->count();
        $btw_third_next_reinvestment_investments = Deposit::where(['reinvestment' => 1])->whereBetween('created_at', [$second, $third])->count();
        $btw_second_next_reinvestment_investments = Deposit::where(['reinvestment' => 1])->whereBetween('created_at', [$first, $second])->count();
        $btw_first_next_reinvestment_investments = Deposit::where(['reinvestment' => 1])->whereBetween('created_at', [$last, $first])->count();

        // Running
        $btw_today_next_running_investments = Deposit::where(['running' => 1])->whereBetween('updated_at', [$fourth, $today])->count();
        $btw_fourth_next_running_investments = Deposit::where(['running' => 1])->whereBetween('updated_at', [$third, $fourth])->count();
        $btw_third_next_running_investments = Deposit::where(['running' => 1])->whereBetween('updated_at', [$second, $third])->count();
        $btw_second_next_running_investments = Deposit::where(['running' => 1])->whereBetween('updated_at', [$first, $second])->count();
        $btw_first_next_running_investments = Deposit::where(['running' => 1])->whereBetween('updated_at', [$last, $first])->count();

        return view('protected.admin.index', compact('total_users', 'total_deposited', 'total_withdrawn', 'total_user_balance', 'total_user_invested', 'total_pending_deposited', 'total_user_bonus', 'total_pending_withdrawals', 'total_users_referred', 'running_investments', 'total_investment', 'total_withdrawals', 'completed_investments', 'pending_deposits', 'pending_withdrawals', 'accepted_withdrawals', 'denied_withdrawals', 'profits', 'total_profit_generated', 'latest_users', 'accepted_deposits', 'denied_deposits', 'reinvestment_count', 'today', 'fourth', 'third', 'second', 'first', 'last', 'btw_today_next_investments','btw_fourth_next_investments', 'btw_third_next_investments','btw_second_next_investments', 'btw_first_next_investments', 'btw_today_next_approved_investments','btw_fourth_next_approved_investments',
        'btw_third_next_approved_investments',
        'btw_second_next_approved_investments',
        'btw_first_next_approved_investments', 'btw_today_next_denied_investments',
        'btw_fourth_next_denied_investments',
        'btw_third_next_denied_investments',
        'btw_second_next_denied_investments',
        'btw_first_next_denied_investments', 'btw_today_next_pending_investments',
        'btw_fourth_next_pending_investments',
        'btw_third_next_pending_investments',
        'btw_second_next_pending_investments',
        'btw_first_next_pending_investments', 'btw_today_next_reinvestment_investments',
        'btw_fourth_next_reinvestment_investments',
        'btw_third_next_reinvestment_investments',
        'btw_second_next_reinvestment_investments',
        'btw_first_next_reinvestment_investments', 'btw_today_next_running_investments',
        'btw_fourth_next_running_investments',
        'btw_third_next_running_investments',
        'btw_second_next_running_investments',
        'btw_first_next_running_investments',));
    }

    public function websiteSettings(Request $request) {
        $settings = AdminSettings::first();
        $setup = AdminSettings::where('id', $settings->id)->update([
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'site_keywords' => $request->site_keywords,
            'site_title' => $request->site_title
        ]);

        if($setup) {
            return response()->json(
                [
                'success'=> ['message' => ["Details updated"]]
                ], 201
            );
        }
        return response()->json(
            [
            'errors'=> ['message' => ["Something is no right"]]
            ], 400
        );
    }

    public function appLimitSettings(Request $request) {
        $settings = AdminSettings::first();
        $setup = AdminSettings::where('id', $settings->id)->update([
            'deposit_limit_level_1' => $request->deposit_limit_level_1,
            'deposit_limit_level_2' => $request->deposit_limit_level_2,
            'withdrawal_limit_level_1' => $request->withdrawal_limit_level_1,
            'withdrawal_limit_level_2' => $request->withdrawal_limit_level_2,
            'daily_deposit_limit_level_1' => $request->daily_deposit_limit_level_1,
            'daily_deposit_limit_level_2' => $request->daily_deposit_limit_level_2,
            'daily_withdrawal_limit_level_1' => $request->daily_withdrawal_limit_level_1,
            'daily_withdrawal_limit_level_2' => $request->daily_withdrawal_limit_level_2,
            'count_reinvestment_level_2' => $request->count_reinvestment_level_2,
            'count_reinvestment_level_3' => $request->count_reinvestment_level_3
        ]);


        if($setup) {
            return response()->json(
                [
                'success'=> ['message' => ["Settings updated"]]
                ], 201
            );
        }
        return response()->json(
            [
            'errors'=> ['message' => ["Something is no right"]]
            ], 400
        );
    }
}
