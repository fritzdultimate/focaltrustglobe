<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| APP Routes
|--------------------------------------------------------------------------
|
| Here is where you can register APP routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "app" middleware group. Enjoy building your APP!
|
*/

// Registration::Router starts here
    /**
     * to register and account, use ?ref=username for referral
     * it accepts the below variables
     * $username*, 
     * $email*, 
     * $password*, 
     * $repassword*, 
     * $terms*, 
     * $firstname, 
     * $lastname, 
     * $middlename
     */
    Route::post('/register', [App\Http\Controllers\RegistrationController::class, 'index']);
    /**
     * to resent email verification
     * accepts
     * $email*
     */
    Route::post('/register/resend-verification', [App\Http\Controllers\RegistrationController::class, 'resendVerificationEmail']);
    /**
     * to verify email address
     * used on a form sent with the mail
     */
    Route::post('/register/verification', [App\Http\Controllers\RegistrationController::class, 'verifyAccount']);
    /**
     * to send email confirmation mail to change reset password
     * a code will be sent to the email
     * accepts
     * $email*
     */
    Route::post('/register/setup/forgotpassword/email', [App\Http\Controllers\RegistrationController::class, 'sendChangePasswordToken']);
    /**
     * to verify token
     * accepts
     * $email*
     * $token*
     */
    Route::post('/register/setup/verifytoken', [App\Http\Controllers\RegistrationController::class, 'verifyToken']);
    /**
     * to reset password
     * accepts
     * $email*
     * $password*
     * $repassword*
     */
    Route::post('/register/setup/resetpass', [App\Http\Controllers\RegistrationController::class, 'resetPassword']);

    // Admin Registration Route starts here
        /**
         * to create a user account by an admin
         * accepts
         * $email*
         * $password*
         * $username*
         * $firstname
         * $middlename
         * $lastname
         * $is_admin
         */
        Route::post('/admin/registration/create', [App\Http\Controllers\RegistrationController::class, 'createByAdmin']);
        /**
         * to update a user account by an admin
         * accepts
         * $email*
         * $username*
         * $firstname
         * $middlename
         * $lastname
         * $total_withdrawn
         */
        Route::post('/admin/registration/update', [App\Http\Controllers\RegistrationController::class, 'updateByAdmin']);
    // Admin Registration Route ends here
// Registration::Router ends here 

// Login::Router starts here
    /**
     * to login a user
     * accepts
     * $login
     * $password
     */
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'index']);
    /**
     * to logout a user
     */
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
// Login::Router ends here 

// Deposit::Router starts here
     Route::post('/deposit/create', [App\Http\Controllers\DepositController::class, 'store']);
     Route::post('/admin/deposit/approve', [App\Http\Controllers\DepositController::class, 'approve']);
     Route::post('/admin/deposit/deny', [App\Http\Controllers\DepositController::class, 'deny']);
     Route::post('/deposit/reinvest', [App\Http\Controllers\DepositController::class, 'reinvest']);
     Route::post('/admin/deposit/delete', [App\Http\Controllers\DepositController::class, 'delete']);
// Deposit::Router ends here 

// MainWallet::Router starts here
Route::post('/admin/wallet/create', [App\Http\Controllers\MainWalletController::class, 'store']);
Route::post('/admin/wallet/update', [App\Http\Controllers\MainWalletController::class, 'update']);
Route::post('/admin/wallet/trash', [App\Http\Controllers\MainWalletController::class, 'destroy']);
Route::post('/admin/wallet/delete', [App\Http\Controllers\MainWalletController::class, 'delete']);
Route::post('/admin/wallet/recover', [App\Http\Controllers\MainWalletController::class, 'recover']);
Route::post('/admin/wallet/activate', [App\Http\Controllers\MainWalletController::class, 'activate']);
Route::post('/admin/wallet/deactivate', [App\Http\Controllers\MainWalletController::class, 'deactivate']);
// MainWallet::Router ends here 

// ParentInvestmentPlan::Router starts here
Route::post('/admin/plan/parent/create', [App\Http\Controllers\ParentInvestmentPlanController::class, 'store']);

Route::post('/admin/plan/parent/update', [App\Http\Controllers\ParentInvestmentPlanController::class, 'update']);
Route::post('/admin/plan/parent/list', [App\Http\Controllers\ParentInvestmentPlanController::class, 'getPlans']);
Route::post('/admin/plan/parent/delete', [App\Http\Controllers\ParentInvestmentPlanController::class, 'destroy']);
Route::post('/admin/plan/parent/{id}', [App\Http\Controllers\ParentInvestmentPlanController::class, 'showPlan']);
// ParentInvestmentPlan::Router ends here 

// ChildInvestmentPlan::Router starts here
Route::post('/admin/plan/child/create', [App\Http\Controllers\ChildInvestmentPlanController::class, 'store']);

Route::post('/admin/plans/promo/create', [App\Http\Controllers\ChildInvestmentPlanController::class, 'promo']);
Route::post('/admin/plans/promo/update', [App\Http\Controllers\ChildInvestmentPlanController::class, 'updatePromo']);

Route::post('/admin/plan/child/update', [App\Http\Controllers\ChildInvestmentPlanController::class, 'update']);
Route::post('/admin/plan/child/list{parent}', [App\Http\Controllers\ChildInvestmentPlanController::class, 'getPlans']);
Route::post('/admin/plan/child/delete', [App\Http\Controllers\ChildInvestmentPlanController::class, 'destroy']);
Route::post('/admin/plan/child/{id}', [App\Http\Controllers\ChildInvestmentPlanController::class, 'showPlan']);

// ChildInvestmentPlan::Router ends here 

// withdrawal::Router starts here
Route::post('/withdrawal/create', [App\Http\Controllers\WithdrawalController::class, 'store']);
Route::post('/admin/withdrawal/approve', [App\Http\Controllers\WithdrawalController::class, 'approve']);
Route::post('/admin/withdrawal/deny', [App\Http\Controllers\WithdrawalController::class, 'deny']);
Route::post('/admin/withdrawal/delete', [App\Http\Controllers\WithdrawalController::class, 'delete']);
// withdrawal::Router ends here 

// ReferralBonusWithdrawal::Router starts here
Route::post('/withdrawal/referral-bonus/create', [App\Http\Controllers\WithdrawReferralBonusController::class, 'store']);
Route::post('/admin/withdrawal/referral-bonus/approve', [App\Http\Controllers\WithdrawReferralBonusController::class, 'approve']);
Route::post('/admin/withdrawal/referral-bonus/deny', [App\Http\Controllers\WithdrawReferralBonusController::class, 'deny']);
// ReferralBonusWithdrawal::Router ends here 


// Faq::Router starts here
Route::post('/admin/faq/create', [App\Http\Controllers\FaqController::class, 'store']);
Route::post('/admin/faq/update', [App\Http\Controllers\FaqController::class, 'update']);

// Faq::Router ends here 

// Reviews::Router starts here
Route::post('/admin/review/create', [App\Http\Controllers\ReviewsController::class, 'store']);
Route::post('/admin/review/update', [App\Http\Controllers\ReviewsController::class, 'update']);
// Route::post('/review/trash', [App\Http\Controllers\ReviewsController::class, 'destroy']);
Route::post('/admin/review/delete', [App\Http\Controllers\ReviewsController::class, 'delete']);
// Route::post('/review/recover', [App\Http\Controllers\ReviewsController::class, 'recover']);
// Reviews::Router ends here 


// Settings::Router starts here
Route::post('/admin/settings/about-us', [App\Http\Controllers\SiteSettingsController::class, 'storeAboutUs']);
Route::post('/admin/settings/terms', [App\Http\Controllers\SiteSettingsController::class, 'storeTermsAndConditions']);
Route::post('/admin/settings/privacy', [App\Http\Controllers\SiteSettingsController::class, 'storePrivacyAndPolicy']);
Route::post('/admin/settings/how-it-works', [App\Http\Controllers\SiteSettingsController::class, 'storeHowItWorks']);
Route::post('/admin/settings/our-traders', [App\Http\Controllers\SiteSettingsController::class, 'storeMeetOurTraders']);
Route::post('/admin/settings/details', [App\Http\Controllers\SiteSettingsController::class, 'storeDetails']);
Route::post('/admin/settings/enablesocials', [App\Http\Controllers\SiteSettingsController::class, 'enableSocialHandles']);
Route::post('/admin/settings/socialhandles', [App\Http\Controllers\SiteSettingsController::class, 'storeSocialHandles']);
// Settings::Router ends here 

// UserWallet::Router starts here
Route::post('/wallet/create', [App\Http\Controllers\UserWalletController::class, 'store']);
Route::post('/wallet/update', [App\Http\Controllers\UserWalletController::class, 'update']);
// UserWallet::Router ends here 

// Email::Router starts here
Route::post('/admin/newsletter', [App\Http\Controllers\EmailController::class, 'sendNewsLetter']);
Route::post('/contact-support', [App\Http\Controllers\EmailController::class, 'contactSupport']);
// Email::Router ends here 


// AccountFundingRequest::Router starts here
Route::post('/account/fund-account', [App\Http\Controllers\AccountFundingRequestController::class, 'fundAccount']);
Route::post('/account/debit-account', [App\Http\Controllers\AccountFundingRequestController::class, 'debitAccount']);
Route::post('/account/fund-currently-invested', [App\Http\Controllers\AccountFundingRequestController::class, 'fundCurrentInvested']);
Route::post('/account/debit-currently-invested', [App\Http\Controllers\AccountFundingRequestController::class, 'debitCurrentInvested']);
Route::post('/account/fund-referral-bonus', [App\Http\Controllers\AccountFundingRequestController::class, 'fundReferralBonus']);
Route::post('/account/debit-referral-bonus', [App\Http\Controllers\AccountFundingRequestController::class, 'debitReferralBonus']);
Route::post('/account/quick-withdrawal', [App\Http\Controllers\AccountFundingRequestController::class, 'quickWithdrawal']);
Route::post('/admin/account/funds/approve', [App\Http\Controllers\AccountFundingRequestController::class, 'approve']);
Route::post('/admin/account/funds/deny', [App\Http\Controllers\AccountFundingRequestController::class, 'deny']);
// AcccountFundingRequest::Router ends here 


// ProfitCronJob::Router starts here
Route::get('/fkbnm/fjfkkcixmzifk/ddjdmccdk/daily-interest', [App\Http\Controllers\ProfitCronJobController::class, 'addProfit']);

Route::get('/fkbnm/fjfkkcixmzifk/ddjdmccdk/plan/khfddhf/promo/dfhgdfj/check', [App\Http\Controllers\ProfitCronJobController::class, 'disablePromo']);

Route::get('/fkbnm/fjfkkcixmzifk/ddjdmccdk/plan/khfddhf/tokens/dfhgdfj/delete', [App\Http\Controllers\ProfitCronJobController::class, 'deleteEmailTokens']);

Route::get('/fkbnm/fjfkkcixmzifk/ddjdmccdk/plan/khfddhf/userdata/dfhgdfj/reset-deposit-and-withdrawal-limit', [App\Http\Controllers\ProfitCronJobController::class, 'clearDepositAndWithdrawalLimit']);

Route::get('/fkbnm/fjfkkcixmzifk/ddjdmccdk/plan/khfddhf/userdata/dfhgdfj/reset-admin-auth', [App\Http\Controllers\ProfitCronJobController::class, 'resetAdminAuthentication']);
// ProfitCronJob::Router ends here 

// User::Route starts here

// User::Route ends here


// User Management Starts here
Route::post('admin/user/delete', [App\Http\Controllers\AdminController::class, 'deleteUser']);
Route::post('admin/user/admin/{id}', [App\Http\Controllers\AdminController::class, 'ToggleAdmin']);
Route::post('admin/user/moderate', [App\Http\Controllers\AdminController::class, 'ToggleUserMod']);
Route::post('admin/user/view', [App\Http\Controllers\AdminController::class, 'viewUser']);
Route::post('admin/user/toggleSuspend', [App\Http\Controllers\AdminController::class, 'ToggleSuspendUser']);

Route::get('admin/user/{user}', [App\Http\Controllers\UserController::class, 'getUser']);
// User Management ends here

Route::post('/setting/toggleMode', [App\Http\Controllers\UserSettingsController::class, 'updateMode']);

     Route::post('/setting/toggleTransactionEmails', [App\Http\Controllers\UserSettingsController::class, 'updateEmailsTrasaction']);
     
     Route::post('/setting/toggleTwoFactor', [App\Http\Controllers\UserSettingsController::class, 'toggleTwoFactor']);

     Route::post('/setting/changeAddress', [App\Http\Controllers\UserSettingsController::class, 'updateAddress']);
     Route::post('/setting/changePassword', [App\Http\Controllers\UserSettingsController::class, 'changePassword']);

     Route::post('/setting/setpin', [App\Http\Controllers\UserSettingsController::class, 'setPin']);

     Route::post('/setting/changeCurrency', [App\Http\Controllers\UserSettingsController::class, 'changeCurrency']);

     Route::post('/setting/logOutOtherDevices', [App\Http\Controllers\UserSettingsController::class, 'logOutOtherDevices']);

     Route::post('/setting/uploadImage', [App\Http\Controllers\UserSettingsController::class, 'uploadImage']);

     Route::post('/setting/uploadKycFile', [App\Http\Controllers\UserSettingsController::class, 'uploadKycFile']);

     Route::post('/setting/transaction/edit', [App\Http\Controllers\UserSettingsController::class, 'editTransaction']);

     Route::delete('/setting/transaction/delete', [App\Http\Controllers\UserSettingsController::class, 'deleteTransaction']);

     Route::post('/setting/card/edit', [App\Http\Controllers\UserSettingsController::class, 'editCard']);

     Route::post('/admin/promote/user/{id}', [App\Http\Controllers\AdminController::class, 'togglePromo']);
     Route::post('/admin/suspend/user/{id}', [App\Http\Controllers\AdminController::class, 'togglesuspend']);

     Route::post('/admin/set/userpassword', [App\Http\Controllers\AdminController::class, 'setUserPassword']);


     Route::post('/admin/auth/login', [App\Http\Controllers\HomeController::class, 'adminLogin']);


    //  admin settings

    Route::post('admin/settings/toggle/maintenance', [App\Http\Controllers\AdminController::class, 'toggleMaintenance']);
    Route::post('admin/settings/website-settings', [App\Http\Controllers\AdminController::class, 'websiteSettings']);
    Route::post('admin/settings/limit-settings', [App\Http\Controllers\AdminController::class, 'appLimitSettings']);


    Route::post('admin/kyc/handle', [App\Http\Controllers\AdminController::class, 'handleKyc']);