<?php

namespace App\Http\Controllers;

use App\Models\AdminSettings;
use App\Models\Faq;
use App\Models\Transactions;
use App\Models\ChildInvestmentPlan;
use App\Models\ParentInvestmentPlan;
use App\Models\MainWallet;
use App\Models\UserWallet;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Reviews;
use App\Models\User;
use App\Models\FakeWithdrawal;
use App\Models\ProfitCronJob;
use App\Models\UserDoc;
use Illuminate\Http\Request;
use App\Models\SiteSettings;
use App\Models\UserSettings;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller {
    public function __construct() {
        if(!Schema::hasTable('admin_settings')) {
            Schema::create('admin_settings', function (Blueprint $table) {
                $table->id();
                $table->string('site_name')->nullable();
                $table->string('site_description')->nullable();
                $table->string('site_keywords')->nullable();
                $table->boolean('on_maintenance')->default(0);
                $table->string('site_title')->nullable();
                $table->string('site_favicon')->nullable();
                $table->string('site_logo')->nullable();
                $table->string('site_logo_white')->nullable();
                $table->string('site_address')->nullable();
                $table->decimal('deposit_charge')->default(0.00);
                $table->decimal('reinvestment_charge')->default(0.00);
                $table->decimal('withdrawal_charge')->default(0.00);
                $table->boolean('disable_login_page')->default(0);
                $table->boolean('disable_signup_page')->default(0);
                $table->boolean('disable_whatsapp_button')->default(0);
                $table->boolean('disable_support_button')->default(0);
                $table->string('admin_phrase')->default('some birds were out of the wind, nicolas');
                $table->string('default_currency')->default('USD');
                $table->string('default_currency_name')->default('US Dollar');
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();
            });
            // UserSettings::insert(['user_id' => Auth::id()]);
        }
        if(!Schema::hasColumn('admin_settings', 'site_favicon')) {
            Schema::table('admin_settings', function(Blueprint $table) {
                $table->string('site_favicon')->nullable();
                $table->string('site_logo')->nullable();
                $table->string('site_logo_white')->nullable();
                $table->string('site_address')->nullable();
                $table->decimal('deposit_charge')->default(0.00);
                $table->decimal('reinvestment_charge')->default(0.00);
                $table->decimal('withdrawal_charge')->default(0.00);
                $table->boolean('disable_login_page')->default(0);
                $table->boolean('disable_signup_page')->default(0);
                $table->boolean('disable_whatsapp_button')->default(0);
                $table->boolean('disable_support_button')->default(0);
                $table->string('admin_phrase')->default('some birds were out of the wind, nicolas');
                $table->string('default_currency')->default('USD');
                $table->string('default_currency_name')->default('US Dollar');
            });
        }
        $admin_settings = AdminSettings::first();
        if(!$admin_settings) {
            AdminSettings::insert(['site_name' => env('SITE_NAME')]);
        }
        $admin_settings = AdminSettings::first();
        if($admin_settings->on_maintenance) {
            $this->middleware('maintainance', ['except' => ['maintainance', 'login']]);
        }
        //  $this->middleware('maintainance', ['except' => ['maintainance', 'login']]);
        $user_settings = UserSettings::where('user_id', Auth::id())->first();
        if(!Schema::hasTable('user_settings') && Auth::user()) {
            Schema::create('user_settings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->boolean('dark_mode')->default(0);
                $table->boolean('transaction_emails')->default(0);
                $table->boolean('twofac')->default(0);
                $table->boolean('use_pin_for_transaction')->default(0);
                $table->string('profile_image_url')->nullable();
                $table->string('address_proof')->nullable();
                $table->string('front_kyc')->nullable();
                $table->string('back_kyc')->nullable();
                $table->enum('current_kyc_leve', ['tier 1', 'tier 2', 'tier 3'])->default('tier 1');
                $table->string('pin')->nullable();
                $table->string('currency')->default('USD');
                $table->string('currency_name')->default('US Dollar');
                $table->timestamps();
                $table->timestamp('deleted_at')->nullable();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
            UserSettings::insert(['user_id' => Auth::id()]);
        } elseif(!$user_settings && Auth::user()) {
            UserSettings::insert(['user_id' => Auth::id()]);
        }

        if(!Schema::hasColumn('child_investment_plans', 'sent_email')) {
            Schema::table('child_investment_plans', function(Blueprint $table) {
                $table->boolean('sent_email')->default(0); 

            });
        }

        if(!Schema::hasColumn('users', 'today_withdrawals')) {
            Schema::table('users', function(Blueprint $table) {
                $table->decimal('today_withdrawals', 30)->default(0.00); 
                $table->decimal('today_deposits', 30)->default(0.00);

            });
        }

        if(!Schema::hasColumn('users', 'last_admin_authenticated')) {
            Schema::table('users', function(Blueprint $table) {
                $table->timestamp('last_admin_authenticated')->nullable();

            });
        }

        if(!Schema::hasColumn('admin_settings', 'withdrawal_limit_level_1')) {
            Schema::table('admin_settings', function(Blueprint $table) {
                $table->decimal('withdrawal_limit_level_1', 30)->default(50); 
                $table->decimal('deposit_limit_level_1', 30)->default(100);
                $table->decimal('deposit_limit_level_2', 30)->default(1000);
                $table->decimal('withdrawal_limit_level_2', 30)->default(500);

                $table->decimal('daily_deposit_limit_level_1', 30)->default(1000); 
                $table->decimal('daily_deposit_limit_level_2', 30)->default(5000);
                $table->decimal('daily_withdrawal_limit_level_1', 30)->default(1000);
                $table->decimal('daily_withdrawal_limit_level_2', 30)->default(5000);
                
                $table->integer('count_reinvestment_level_2')->default(3);
                $table->integer('count_reinvestment_level_3')->default(5);

            });
        }

        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $this->middleware('login', ['except' => ['index', 'index2', 'support', 'login', 'register', 'faqs', 'terms', 'meetOurTraders', 'howItWorks', 'privacyPolicy', 'aboutUs', 'forgotPass', 'changePass', 'verifyToken', 'contact', 'maintainance', 'privateEquity', 'credit', 'permanentCapital', 'taxInformation', 'commitment', 'responsibility', 'newRegister', 'newLogin']]);

        $this->middleware('wallet', ['except' => ['index', 'index2', 'support', 'login', 'register', 'faqs', 'terms', 'meetOurTraders', 'howItWorks', 'privacyPolicy', 'aboutUs', 'forgotPass', 'changePass', 'verifyToken', 'contact', 'maintainance', 'privateEquity', 'credit', 'permanentCapital', 'taxInformation', 'commitment', 'responsibility', 'newRegister', 'newLogin', 'cryptoWallet', 'settings']]);

        if(!Schema::hasColumn('transactions', 'transaction_id')) {
            Schema::table('transactions', function(Blueprint $table) {
                $table->string('transaction_id')->nullable();

            });
        }
    }
    
    public function maintainance(Request $request){
        $page_title = "Namecheap Maintenance";
        return view('visitor.admin_maintenance');
    }
    
    public function index(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        // $parent_plans = ParentInvestmentPlan::where('name', 'crypto')->first();
        $plans = ChildInvestmentPlan::where('exp_date', null)->orderBy('minimum_amount', 'asc')->get();
        $parent_plans = ParentInvestmentPlan::all();
        $faqs = Faq::orderBy('priority', 'ASC')->get();
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        $reviews = Reviews::where('active', '1')->get();
        $main_wallets = MainWallet::all();
        $deposits = Deposit::where('status', 'accepted')->orderBy('created_at','desc')->take(15)->get();
        $withdrawals = Withdrawal::where('status', 'accepted')->orderBy('created_at','desc')->take(15)->get();
        $fake_withdrawals = FakeWithdrawal::orderBy('created_at','desc')->take(15)->get();
        return view('visitor.index', compact('page_title', 'fake_withdrawals', 'deposits', 'withdrawals', 'plans', 'parent_plans', 'faqs', 'settings', 'reviews', 'main_wallets'));
    }
    
    public function index2(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $plans = ChildInvestmentPlan::orderBy('minimum_amount', 'asc')->get();
        $parent_plans = ParentInvestmentPlan::all();
        $faqs = Faq::orderBy('priority', 'ASC')->get();
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        $reviews = Reviews::where('active', '1')->get();
        $main_wallets = MainWallet::all();
        $deposits = Deposit::where('status', 'accepted')->orderBy('created_at','desc')->take(15)->get();
        $withdrawals = Withdrawal::where('status', 'accepted')->orderBy('created_at','desc')->take(15)->get();
        $fake_withdrawals = FakeWithdrawal::orderBy('created_at','desc')->take(15)->get();
        return view('visitor.theludax', compact('page_title', 'fake_withdrawals', 'deposits', 'withdrawals', 'plans', 'parent_plans', 'faqs', 'settings', 'reviews', 'main_wallets'));
    }
    
    public function pricing() {
        $title = env('SITE_NAME') . " - Plans & Pricing";
        $child_plans = ChildInvestmentPlan::orderBy('minimum_amount', 'asc')->get();
        $parent_plans = ParentInvestmentPlan::all();
        
        return view('visitor.pricing', compact('title', 'child_plans', 'parent_plans'));
    }
    public function dashboard(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Dashboard";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        
        if(!$wallets->count()) {
            return redirect('/user/crypto/wallet');
        } 
        if(!Schema::hasColumn('transactions', 'status')) {
            Schema::table('transactions', function(Blueprint $table) {
                $table->enum('status', ['pending', 'accepted', 'denied'])->default('pending');

            });
        }

        if(!Schema::hasColumn('transactions', 'wallet_id')) {
            Schema::table('transactions', function(Blueprint $table) {
                $table->unsignedBigInteger('wallet_id')->default(99);

                $table->foreign('wallet_id')->references('id')->on('user_wallets')->onDelete('cascade');

            });
        }
        $transactions = Transactions::where('user_id', $user['id'])->latest(5);
        return view('user.index', compact('page_title', 'mode', 'user', 'transactions'));
    }

    public function dashboard2(Request $request){
        
        $c = ParentInvestmentPlan::where('name', 'crypto')->first();
        $plans = ChildInvestmentPlan::where('parent_investment_plan_id', $c->id)->get();
        // UserSettings::insert(['user_id' => Auth::id()]);
        $page_title = env('SITE_NAME') . " Investment Website | Dashboard";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        
        if(!$wallets->count()) {
            return redirect('/user/crypto/wallet');
        }

        $promotion_plans = [];
        $highest_promo_duration_date = null;
        if($user->on_promo) {
            $promo_plan = ParentInvestmentPlan::where('name', 'promo')->first();

            $promotion_plans = $promo_plan ? ChildInvestmentPlan::where(['parent_investment_plan_id' => $promo_plan->id, 'expired' => 0])->get() : [];

            $highest_promo_duration_date = ChildInvestmentPlan::where(['parent_investment_plan_id' => $promo_plan->id, 'expired' => 0])->orderBy('exp_date', 'desc')->first();

            if($highest_promo_duration_date) {
                $highest_promo_duration_date = $highest_promo_duration_date['exp_date'];
            } else {
                $highest_promo_duration_date = null;
            }
        }
        $transactions = Transactions::where('user_id', $user['id'])->orderBy('id', 'desc')->take(15)->get();
        $notification_count = 3;
        $total_locked_fund = 2222;
        $total_savings = 3746;
        $total_card_balance = 4949;
        $total_referred = User::where('referrer', $user->name)->count();
        $admin_settings = AdminSettings::first();

        $today_deposits = Deposit::where([
            'user_id' => $user['id'],
            'created_at' => Carbon::today()
        ])->sum('amount');
        $today_withdrawal = Withdrawal::where([
            'user_id' => $user['id'],
            'created_at' => Carbon::today()
        ])->sum('amount');
        // $user_account = 4536;

        return view('user.dashboard', compact('page_title', 'today_deposits', 'mode', 'user', 'admin_settings', 'transactions', 'notification_count', 'total_locked_fund', 'total_savings', 'total_card_balance', 'total_referred', 'plans', 'wallets', 'promotion_plans', 'highest_promo_duration_date'));
    }


    public function deposit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Deposit";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $plans = ChildInvestmentPlan::all();
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        return view('user.deposit', compact('page_title', 'mode', 'user', 'plans', 'wallets'));
    }
    
    public function deposit_stock(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Deposit In Stock";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $plans = ChildInvestmentPlan::all();
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        return view('user.deposit_forest', compact('page_title', 'mode', 'user', 'plans', 'wallets'));
    }
    
    public function ids(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | User Docs";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $ids = UserDoc::all();
        return view('admin.ids', compact('page_title', 'mode', 'user', 'ids'));
    }
    public function deposits(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Deposit History";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $deposits = Deposit::where('user_id', $user['id'])->get();
        return view('user.deposits', compact('page_title', 'mode', 'user', 'deposits'));
    }

    public function wallets(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Deposit History";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $user_wallets = UserWallet::where('user_id', Auth::id())->get();
        $user_owned_wallet_ids = [];
        foreach($user_wallets as $wallet) {
            array_push($user_owned_wallet_ids, $wallet->main_wallet_id);
        }
        $main_wallets = MainWallet::whereNotIn('id', $user_owned_wallet_ids)->get();
        return view('user.wallets', compact('page_title', 'mode', 'user', 'main_wallets', 'user_wallets'));
    }

    public function reinvest(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Reinvest";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $plans = ChildInvestmentPlan::all();
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        return view('user.reinvest', compact('page_title', 'mode', 'user', 'plans', 'wallets'));
    }

    public function reinvestments(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Reinvestment History";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $reinvestments = Deposit::where([
            ['reinvestment', '=', 1],
            ['user_id', '=', $user['id']]
        ])->get();
        return view('user.reinvestments', compact('page_title', 'mode', 'user', 'reinvestments'));
    }

    public function withdrawal(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Withdrawal";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $wallets = UserWallet::where('user_id', $user['id'])->get();
        return view('user.withdrawal', compact('page_title', 'mode', 'user', 'wallets'));
    }

    public function withdrawals(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Withdrawal History";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $withdrawals = Withdrawal::where('user_id', $user['id'])->get();
        return view('user.withdrawals', compact('page_title', 'mode', 'user', 'withdrawals'));
    }

    public function transactions_(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Transactions";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $transactions = Transactions::where('user_id', $user['id'])->orderBy('id', 'DESC')->get();
        return view('user.transactions', compact('page_title', 'mode', 'user', 'transactions'));
    }

    public function referrals(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Referrals";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $referrals = User::where('referrer', $user['name'])->get();
        return view('user.referrals', compact('page_title', 'mode', 'user', 'referrals'));
    }

    public function security(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Dashboard";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        return view('user.security', compact('page_title', 'mode', 'user'));
    }

    public function profile(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Dashboard";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $transactions = Transactions::where('user_id', $user['id'])->get();
        $referrals = User::where('referrer', $user['name'])->get();
        return view('user.profile', compact('page_title', 'mode', 'user', 'transactions', 'referrals'));
    }

    public function login(Request $request){
        return redirect('/new/login');
        $user = Auth::user();
        $page_title = env('SITE_NAME') . " Investment Website";
        $settings = SiteSettings::latest()->first();
        $main_wallets = MainWallet::all();
        // $wallets = UserWallet::where('user_id', $user['id'])->get();
        return view('visitor.login', compact('page_title', 'settings', 'main_wallets'));
    }
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
    public function register(Request $request){
        return redirect('/new/register');
        $page_title = env('SITE_NAME') . " Investment Website";
        $settings = SiteSettings::latest()->first();
        $main_wallets = MainWallet::all();
        return view('visitor.register', compact('page_title', 'settings', 'main_wallets'));
    }
    public function referralBonus(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Referral Bonus";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $users = User::all();
        return view('user.referral-bonus', compact('page_title', 'mode', 'user', 'users'));
    }
    public function walletBalance(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Wallet Balance";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $users = User::all();
        return view('user.wallet-balance', compact('page_title', 'mode', 'user','users'));
    }

    public function currentInvested(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Manage Current Invested";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $users = User::all();
        return view('user.current-invested', compact('page_title', 'mode', 'user', 'users'));
    }
    public function aboutUs(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.about-us', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function responsibility(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.responsibility', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function commitment(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.commitment', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function taxInformation(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.tax-info', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function credit(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.credit', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function privateEquity(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.private-equity', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    public function permanentCapital(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | About Us";
        $settings = SiteSettings::latest()->first();
        $site_about_us = $settings['site_about_us'];
        $main_wallets = MainWallet::all();
        return view('visitor.permanent-capital-hevicles', compact('site_about_us', 'page_title', 'settings', 'main_wallets'));
    }
    
    public function terms(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Terms And Condition";
        $settings = SiteSettings::latest()->first();
        $terms_and_conditions = $settings['terms_and_conditions'];
        $main_wallets = MainWallet::all();
        return view('visitor.terms', compact('terms_and_conditions', 'page_title', 'settings', 'main_wallets'));
    }
    public function meetOurTraders(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Meet Our Traders";
        $settings = SiteSettings::latest()->first();
        $meet_our_traders = $settings['meet_our_traders'];
        $main_wallets = MainWallet::all();
        return view('visitor.meet-our-traders', compact('meet_our_traders', 'page_title', 'settings', 'main_wallets'));
    }
    public function howItWorks(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Meet Our Traders";
        $settings = SiteSettings::latest()->first();
        $how_it_works = $settings['how_it_works'];
        $main_wallets = MainWallet::all();
        return view('visitor.how-it-works', compact('how_it_works', 'page_title', 'settings', 'main_wallets'));
    }
    public function faqs(Request $request){
        $title = env('SITE_NAME') . " - Frequently Asked Questions";
        $settings = SiteSettings::latest()->first();
        $faqs = Faq::orderBy('priority', 'ASC')->get();
        $main_wallets = MainWallet::all();
        return view('visitor.faq', compact('faqs', 'title', 'settings', 'main_wallets'));
    }
    
    public function contact(Request $request){
        $title = env("SITE_NAME") . " - Contact Us";
        $settings = SiteSettings::latest()->first();
        $faqs = Faq::orderBy('priority', 'ASC')->get();
        return view('visitor.contact-us', compact('faqs', 'title', 'settings'));
    }
    
    public function support(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Change Password";
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        return view('visitor.support', compact('page_title', 'settings'));
    }
    
     public function privacyPolicy(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Privacy And Policy";
        $settings = SiteSettings::latest()->first();
        $privacy_and_policy = $settings['privacy_and_policy'];
        $main_wallets = MainWallet::all();
        return view('visitor.privacy-and-policy', compact('privacy_and_policy', 'page_title', 'settings', 'main_wallets'));
    }
    public function quickWithdrawal(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website";
        $mode = 'dark';
        $user = Auth::user();
        return view('admin.quickwithdrawal', compact('page_title', 'mode', 'user'));
    }
    public function forgotPass(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Forgot Password";
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        $main_wallets = MainWallet::all();
        return view('visitor.forgotpass', compact('page_title', 'settings', 'main_wallets'));
    }
    public function changePass(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Change Password";
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        $main_wallets = MainWallet::all();
        return view('visitor.changepass', compact('page_title', 'settings', 'main_wallets'));
    }
    public function verifyToken(Request $request){
        $page_title = env('SITE_NAME') . "Investment Website | Verify Token";
        SiteSettings::where('id', 1)->increment('visit_count', 1);
        $settings = SiteSettings::latest()->first();
        $main_wallets = MainWallet::all();
        return view('visitor.verify-token', compact('page_title', 'settings', 'main_wallets'));
    }

    public function settings(Request $request, UserSettings $userSettings){
        $page_title = env('SITE_NAME') . " Settings";
        $mode = 'dark';
        $user = Auth::user();
        // $user_account = UserAccountData::where('user_id', $user->id)->first();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }

        $faqs = Faq::get();
        $notification_count = 0;
        $user_settings = $userSettings->where('user_id', $user->id)->first();
        return view('user.settings', compact('page_title', 'mode', 'user', 'user_settings', 'faqs', 'notification_count'));
    }

    public function transactions(Request $request){
        $page_title = env('SITE_NAME') . " | Transactions";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        // $user_account = UserAccountData::where('user_id', $user->id)->first();
        $transactions = Transactions::where('user_id', $user['id'])->orderBy('created_at', 'desc')->get();
        $new_transaction_arr = array();
        $dates = array();
        foreach($transactions as $key => $item) {
            $new_transaction_arr[$item->created_at->format('d/m/Y')][$key] = $item;
            $dates[$item->created_at->format('d/m/Y')] = $item->created_at;
        }
        // ksort($new_transaction_arr, SORT_NUMERIC);
        $transaction_count = Transactions::where('user_id', $user['id'])->count();
        $notification_count = 0;
        return view('user.transactions-view', compact('page_title', 'mode', 'user', 'transactions', 'transaction_count', 'new_transaction_arr', 'dates', 'notification_count'));
    }

    public function transactionsItem($id) {
        $page_title = env('SITE_NAME') . " - Transaction Details";
        $user = Auth::user();
        $transaction = Transactions::where('id', $id)->first();
        $notification_count = 0;
        return view('user.transaction-details', compact('transaction', 'page_title', 'user', 'notification_count'));
    }

    public function upgradeAccount(Request $request, UserSettings $userSettings){
        $page_title = env('SITE_NAME') . " Acount Upgrade";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }

        
        $user_settings = $userSettings->where('user_id', $user->id)->first();
        $notification_count = 0;
        return view('user.upgrade-kyc', compact('page_title', 'mode', 'user', 'user_settings', 'notification_count'));
    }

    public function referralsList(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Referrals";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        $referrals = User::where('referrer', $user['name'])->get();
        $notification_count = 0;
        $referral_count = User::where('referrer', $user['name'])->count();
        foreach($referrals as $referral) {
            $picture = User::find($referral->id)->picture;
            $referral->picture = $picture ? $picture['profile_image_url'] : null;
        }
        return view('user.referral_new', compact('page_title', 'mode', 'user', 'referrals', 'notification_count', 'referral_count'));
    }

    public function offers(Request $request){
        $page_title = env('SITE_NAME') . " Investment Website | Referrals";
        $mode = 'dark';
        $user = Auth::user();
        if($user->browsing_as){
            $user = User::find($user->browsing_as);
        }
        
        $notification_count = 0;
        return view('user.offers', compact('page_title', 'mode', 'user', 'notification_count'));
    }

    public function newLogin(Request $request){
        
        
        // $notification_count = 0;
        if(Auth::user()) {
            return redirect('/dashboard');
        }

        return view('user.new_login');
    }

    public function newRegister(Request $request){
        
        
        // $notification_count = 0;

        return view('user.new_register');
    }

    public function cryptoWallet() {
        $user_settings = UserSettings::where('user_id', Auth::id())->first();
        if(!$user_settings) {
            UserSettings::insert(['user_id' => Auth::id()]);
        }
        $user = Auth::user();
        $wallets = UserWallet::where('user_id', $user->id)->get();
        $user_owned_wallet_ids = [];
        foreach($wallets as $wallet) {
            array_push($user_owned_wallet_ids, $wallet->main_wallet_id);
        }
        $main_wallets = MainWallet::whereNotIn('id', $user_owned_wallet_ids)->get();
        $wallet_count = UserWallet::where('user_id', $user->id)->count();
        $notification_count = 0;
        $total_deposited = [];
        return view('user.user-wallet', compact('main_wallets', 'wallet_count', 'notification_count', 'user', 'wallets'));
    }

    public function cryptoWalletDetails($id) {
        $user = Auth::user();
        $notification_count = 0;
        $transactions = Transactions::where('wallet_id', $id)->orderBy('created_at', 'desc')->get();
        $wallet = UserWallet::where('id', $id)->first();
        return view('user.wallet-details', compact('notification_count', 'user', 'transactions', 'wallet'));
    }

    public function authAdmin() {
        $user = Auth::user();
        if(!$user) {
            return redirect('/login');
        } elseif($user->is_admin) {
            return view('protected.admin.auth.login');
        }
        return redirect('/dashboard');
    }

    public function adminLogin(Request $request) {
        $user = Auth::user();
        $admin_settings = AdminSettings::first();

        if(!$user->is_admin) {
            return response()->json(
                [
                'errors'=> ['message' => ["Access denied!"]]
                ], 400
            );
        }

        if($request->phrase !== $admin_settings->admin_phrase) {
            return response()->json(
                [
                'errors'=> ['message' => ["Access denied! Contact the developer for help."]]
                ], 400
            );
        }

        $set_date = User::where('id', Auth::id())->update([
            'last_admin_authenticated' => date('Y-m-d H:i:s')
        ]);

        if($set_date) {
            return response()->json(
                [
                'success'=> ['message' => ["Access granted!"]]
                ], 201
            );
        }
        
        return response()->json(
            [
            'errors'=> ['message' => ["System failure, please contact the developer!"]]
            ], 400
        );
    }
}