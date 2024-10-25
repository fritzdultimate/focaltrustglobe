<?php

use App\Models\AdminSettings;
use App\Models\ChildInvestmentPlan;
use App\Models\Deposit;
use App\Models\ParentInvestmentPlan;
use App\Models\User;
use App\Models\UserSettings;
use Currency\Util\CurrencySymbolUtil;
use Illuminate\Support\Facades\Auth;

function generateTransactionHash($table, $column, $length) {
    $hash = bin2hex(random_bytes($length));
    $check_hash_exist = $table->where($column, $hash)->first();

    if($check_hash_exist) {
        generateTransactionHash($table, $column, $length);
    }

    return $hash;
}

function addDaysToDate($dateString, String $days) {
    $date = date_create($dateString);
    date_add($date, date_interval_create_from_date_string($days . ' days'));
    return date_format($date, 'Y-m-d H:i:s');
}

function minusDaysToDate($dateString, String $days) {
    $date = date_create($dateString);
    date_sub($date, date_interval_create_from_date_string($days . ' days'));
    return date_format($date, 'Y-m-d H:i:s');
}

function isUpTo24Hours($datefromdatabase) {
    $timefromdatabase = strtotime($datefromdatabase);
    $dif = time() - $timefromdatabase;

    return $dif >= 86400;
}

function isUpTo1Hours($datefromdatabase) {
    $timefromdatabase = strtotime($datefromdatabase);
    $dif = time() - $timefromdatabase;

    return $dif >= 3600;
}

function get_day_format($timestamp) {
    $date = date_create($timestamp);

    $date = date_format($date, 'M d, Y H:i A');

    return $date;
}

function get_day_name($timestamp) {
    $date = date_create($timestamp);
    // return $date;

    if(date_format($date, 'd/m/Y') == date('d/m/Y')) {
      $date = 'Today';
    } 
    else if(date_format($date, 'd/m/Y') == date('d/m/Y', now()->timestamp - (24 * 60 * 60))) {
      $date = 'Yesterday';
    } else {
        $date = date_format($date, 'M d, Y');
    }
    return $date;
}

function returnKycMessages($amount, $action = 'deposit') {
    $user_settings = UserSettings::where('user_id', Auth::id())->first();
    $admin_settings = AdminSettings::first();
    $user = Auth::user();

    if($action == 'deposit') {
        if($amount > $admin_settings->deposit_limit_level_1 && $user_settings->current_kyc_leve == 'tier 1') {
            $level_1_amount = returnCurrencyLocale($user_settings->currency, $admin_settings->deposit_limit_level_1);
            $msg = "You can only make deposit requests not greater than $level_1_amount at once, upgrade your account for higher deposit request limit!";
            return $msg;
       } elseif($amount > $admin_settings->deposit_limit_level_2 && $user_settings->current_kyc_leve == 'tier 2') {
            return "You can only make deposit requests  not greater than " . returnCurrencyLocale($user_settings->currency, $admin_settings->deposit_limit_level_2) . " at once, upgrade your account for higher deposit request limit!";
        } elseif (($user->today_deposits == $admin_settings->daily_deposit_limit_level_1 || $amount + $user->today_deposits > $admin_settings->daily_deposit_limit_level_1) && $user_settings->current_kyc_leve == 'tier 1') {
            return 'Daily deposit request limit exeeded, upgrade account for higher limit!';
        }
    
        elseif (($user->today_deposits == $admin_settings->daily_deposit_limit_level_2 || $amount + $user->today_deposits > $admin_settings->daily_deposit_limit_level_2) && $user_settings->current_kyc_leve == 'tier 2') {
            return 'Daily deposit request limit exeeded, upgrade your account for higher limit!';
        }
    } elseif($action == 'withdrawal') {
        if($amount > $admin_settings->withdrawal_limit_level_1 && $user_settings->current_kyc_leve == 'tier 1') {
            return "You can only make withdrawal requests not greater than " . returnCurrencyLocale($user_settings->currency, $admin_settings->withdrawal_limit_level_1) . " at once, upgrade your account for higher withdrawal requests limit!";
       } elseif($amount > $admin_settings->withdrawal_limit_level_2 && $user_settings->current_kyc_leve == 'tier 2') {
            return "You can only make withdrawal requests not greater than " . returnCurrencyLocale($user_settings->currency, $admin_settings->withdrawal_limit_level_2) . " at once, upgrade your account for higher withdrawal requests limit!";
        } elseif (($user->today_withdrawals == $admin_settings->daily_withdrawal_limit_level_1 || $amount + $user->today_withdrawals > $admin_settings->daily_withdrawal_limit_level_1) && $user_settings->current_kyc_leve == 'tier 1') {
            return 'Daily withdrawal request limit exeeded, upgrade account for higher limit!';
        }
    
        elseif (($user->today_withdrawals == $admin_settings->daily_withdrawal_limit_level_2 || $amount + $user->today_withdrawals > $admin_settings->daily_withdrawal_limit_level_2) && $user_settings->current_kyc_leve == 'tier 2') {
            return 'Daily withdrawal request limit exeeded, upgrade your account for higher limit!';
        }
    } elseif($action == 'reinvest') {
        // $count_reinvestment = Deposit::where([
        //     'user_id' => Auth::id(),
        //     'reinvestment' => 1
        // ])->count();
        // if($user_settings->current_kyc_leve == 'tier 1') {
        //     return 'Upgrade your account to be able to reinvest!';
        // } elseif($count_reinvestment >= $admin_settings->count_reinvestment_level_2) {
        //     return 'You have exceeded your reinvestment limit, upgrade account to enjoy higher limit';
        // } elseif($count_reinvestment >= $admin_settings->count_reinvestment_level_3) {
        //     return 'You have exceeded your account reinvestment limit.';
        // }
    }
    
}


// function notify($message, $title, $user_id, $is_transaction = false, $type = null) {
//     $notify = Notification::insert([
//         'user_id' => $user_id,
//         'message' => $message,
//         'title' => $title,
//         'transaction' => $is_transaction,
//         'type' => $type,
//         'created_at' => date('Y-m-d H:i:s')
//     ]);

//     return $notify;
// }

function isNoon() {
    $users = User::all();
    foreach($users as $user) {
        $date = date_create($user->is_twenty_four_hours);
        if(date_format($date, 'd/m/Y') != date('d/m/Y')) {
            User::where('id', $user->id)->update(['is_twenty_four_hours' => date('Y-m-d H:i:s')]);
        }
    }
}

function disablePromo() {
    $parent_promo_plan = ParentInvestmentPlan::where('name', 'promo')->first();
    $promoPlans = ChildInvestmentPlan::where('parent_investment_plan_id', $parent_promo_plan->id)->get();
    foreach($promoPlans as $plan) {
        $date = strtotime(date('Y-m-d H:i:s', $plan->exp_date));
        $current_date = strtotime(date('Y-m-d H:i:s'));
        if($date < $current_date) {

            echo 'date is in the past';
            // send email
            // $details = [
            //     'subject' => 'Your Money Was  Unocked',
            //     'amount' => $fund->amount,
            //     'transaction_id' => $fund->transaction_id,
            //     'due_date' => get_day_format($fund->due_date),
            //     'date_locked' => get_day_format($fund->created_at),
            //     'sign' => '+',
            //     'color' => 'green',
            //     'view' => 'emails.user.moneyunlocked',
            // ];

            // $mailer = new \App\Mail\MailSender($details);
            // Mail::to($fund->user->email)->send($mailer);

        }
    }

}

function currency_conversion($currency, $amount, $symbol = 'USD') {
    // Try/catch for json_decode operation
    try {
        // Fetching JSON
        $req_url = "https://api.exchangerate-api.com/v4/latest/$symbol";
        $response_json = file_get_contents($req_url);

        // Continuing if we got a result
        if(false !== $response_json) {

            // Decoding
            $response_object = json_decode($response_json);

            // YOUR APPLICATION CODE HERE, e.g.
            //$base_price = 12; // Your price in USD
            $price = round(($amount * $response_object->rates->$currency), 2);

            echo number_format($price, 2);

        }
    }
    catch(Exception $e) {
        echo 'err435';
    }
}

function return_currency_conversion($currency, $amount, $symbol = 'USD') {
    // Try/catch for json_decode operation
    try {
        // Fetching JSON
        $req_url = "https://api.exchangerate-api.com/v4/latest/$symbol";
        $response_json = file_get_contents($req_url);

        // Continuing if we got a result
        if(false !== $response_json) {

            // Decoding
            $response_object = json_decode($response_json);

            // YOUR APPLICATION CODE HERE, e.g.
            //$base_price = 12; // Your price in USD
            $price = round(($amount * $response_object->rates->$currency), 2);

            return number_format($price, 2);

        }
    }
    catch(Exception $e) {
        echo 'err435';
    }
}

function return_currency_conversion_no_format($currency, $amount, $symbol = 'USD') {
    // Try/catch for json_decode operation
    try {
        // Fetching JSON
        $req_url = "https://api.exchangerate-api.com/v4/latest/$symbol";
        $response_json = file_get_contents($req_url);

        // Continuing if we got a result
        if(false !== $response_json) {

            // Decoding
            $response_object = json_decode($response_json);

            // YOUR APPLICATION CODE HERE, e.g.
            //$base_price = 12; // Your price in USD
            $price = round(($amount * $response_object->rates->$currency), 2);

            return $price;

        }
    }
    catch(Exception $e) {
        return 'err435';
    }
}

function currency_conversion_no_format($currency, $amount, $symbol = 'USD') {
    // Fetching JSON
    $req_url = "https://api.exchangerate-api.com/v4/latest/$symbol";
    $response_json = file_get_contents($req_url);

    // Continuing if we got a result
    if(false !== $response_json) {

        // Try/catch for json_decode operation
        try {

        // Decoding
        $response_object = json_decode($response_json);

        // YOUR APPLICATION CODE HERE, e.g.
        //$base_price = 12; // Your price in USD
        $price = round(($amount * $response_object->rates->$currency), 2);

        echo $price;

        }
        catch(Exception $e) {
            // Handle JSON parse error...
        }
    }
}

function get_currency_symbol($currency) {
    
    $symbol = CurrencySymbolUtil::getSymbol($currency);
    return $symbol;
}

function returnCurrencyLocale($currency, $amount, $symbol = 'USD') { 
    // Fetching JSON
    $req_url = "https://api.exchangerate-api.com/v4/latest/$symbol";
    $response_json = file_get_contents($req_url);

    // Continuing if we got a result
    if(false !== $response_json) {

        // Try/catch for json_decode operation
        try {

        // Decoding
        $response_object = json_decode($response_json);

        // YOUR APPLICATION CODE HERE, e.g.
        //$base_price = 12; // Your price in USD
        $price = round(($amount * $response_object->rates->$currency), 2);

        return  CurrencySymbolUtil::getSymbol($currency) . number_format($price, 2);

        }
        catch(Exception $e) {
            // Handle JSON parse error...
        }
    }
}