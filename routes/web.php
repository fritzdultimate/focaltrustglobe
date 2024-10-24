<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $title = env("SITE_NAME") . " - Home";
//     return view('visitor.index', compact('title'));
// });
Route::get('/namecheap/support/tree/web/maintainance/', [App\Http\Controllers\HomeController::class, 'maintainance']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/test', [App\Http\Controllers\HomeController::class, 'index2']);
Route::get('/businesses/credit', [App\Http\Controllers\HomeController::class, 'credit']);
Route::get('/businesses/private-equity', [App\Http\Controllers\HomeController::class, 'privateEquity']);
Route::get('/businesses/permanent-capital-vehicles', [App\Http\Controllers\HomeController::class, 'permanentCapital']);

Route::get('/shareholders/tax-information', [App\Http\Controllers\HomeController::class, 'taxInformation']);
Route::get('/responsibility', [App\Http\Controllers\HomeController::class, 'responsibility']);
Route::get('/responsibility/commitment-to-veterans', [App\Http\Controllers\HomeController::class, 'commitment']);



Route::get('/admin/ids', [App\Http\Controllers\HomeController::class, 'ids']);

Route::get('/about-us', function () {
    $title = env("SITE_NAME") . " - About Us";
    return view('visitor.about-us', compact('title'));
});
Route::get('/account/verify', function () {
    return view('visitor.reverify');
});
Route::get('/how-it-works', function () {
    $page_title = env("SITE_NAME") . " - How it works";
    return view('visitor.how-it-works', compact('page_title'));
});

Route::get('/privacy', function () {
    $page_title = env("SITE_NAME") . " - Privacy & Policy";
    return view('visitor.privacy', compact('page_title'));
});

Route::get('/terms', function () {
    $page_title = env("SITE_NAME") . " - Terms & Condition";
    return view('visitor.terms', compact('page_title'));
});

Route::get('/news', function () {
    $title = env("SITE_NAME") . " - News";
    return view('visitor.news', compact('title'));
});

Route::get('/our-team', function () {
    $title = env("SITE_NAME") . " - Our Teams";
    return view('visitor.our-team', compact('title'));
});

Route::get('/services', function () {
    $title = env("SITE_NAME") . " - Services";
    return view('visitor.services', compact('title'));
});

Route::get('/finance-restructuring', function () {
    $title = env("SITE_NAME") . " - Finance and restructuring";
return view('visitor.finance-restructuring', compact('title'));
});

Route::get('/audit', function () {
    $title = env("SITE_NAME") . " - Audit";
    return view('visitor.audit', compact('title'));
});

// Route::get('/contact-us', function () {
//     $title = env("SITE_NAME") . " - Contact Us";
//     return view('visitor.contact-us', compact('title'));
// });

Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact']);

// Route::get('/pricing', function () {
//     $title = env("SITE_NAME") . " - Plans and pricing";
//     return view('visitor.pricing', compact('title'));
// });

Route::get('/pricing', [App\Http\Controllers\HomeController::class, 'pricing']);

// Route::get('/faq', function () {
//     $title = env("SITE_NAME") . " - Frequently Asked Questions";
//     return view('visitor.faq', compact('title'));
// });

Route::get('/faqs', [App\Http\Controllers\HomeController::class, 'faqs']);

Route::get('/testimonial', function () {
    $title = env("SITE_NAME") . " - Testimonial";
    return view('visitor.testimonial', compact('title'));
});

Route::get('/login', [App\Http\Controllers\HomeController::class, 'newLogin']);

Route::get('/new/login', [App\Http\Controllers\HomeController::class, 'newLogin']);
Route::get('/new/register', [App\Http\Controllers\HomeController::class, 'newRegister']);
Route::get('/register', [App\Http\Controllers\HomeController::class, 'newRegister']);
Route::post('/register', [App\Http\Controllers\RegistrationController::class, 'index']);

Route::get('/user', [App\Http\Controllers\HomeController::class, 'dashboard']);
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard2']);
Route::get('/user/settings', [App\Http\Controllers\HomeController::class, 'settings']);
Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'settings']);
Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::get('/user/wallets', [App\Http\Controllers\HomeController::class, 'wallets']);
Route::get('/user/deposit', [App\Http\Controllers\HomeController::class, 'deposit']);
Route::get('/user/deposit/stock', [App\Http\Controllers\HomeController::class, 'deposit_stock']);
Route::get('/user/deposits', [App\Http\Controllers\HomeController::class, 'deposits']);
Route::get('/user/reinvest', [App\Http\Controllers\HomeController::class, 'reinvest']);
Route::get('/user/reinvestments', [App\Http\Controllers\HomeController::class, 'reinvestments']);
Route::get('/user/withdrawal', [App\Http\Controllers\HomeController::class, 'withdrawal']);
Route::get('/user/withdrawals', [App\Http\Controllers\HomeController::class, 'withdrawals']);
Route::get('/user/transactions', [App\Http\Controllers\HomeController::class, 'transactions']);

Route::get('/user/crypto/wallet', [App\Http\Controllers\HomeController::class, 'cryptoWallet']);
Route::get('/user/crypto/wallet/details/{id}', [App\Http\Controllers\HomeController::class, 'cryptoWalletDetails']);

Route::get('/user/transaction/data/{id}', [App\Http\Controllers\HomeController::class, 'transactionsItem']);

Route::get('/user/security', [App\Http\Controllers\HomeController::class, 'security']);

Route::get('/user/logout', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/user/referrals', [App\Http\Controllers\HomeController::class, 'referrals']);

Route::get('/user/manage/quick-withdrawal', [App\Http\Controllers\HomeController::class, 'quickWithdrawal']);
Route::get('/user/manage/referral-bonus', [App\Http\Controllers\HomeController::class, 'referralBonus']);
Route::get('/user/manage/current-invested', [App\Http\Controllers\HomeController::class, 'currentInvested']);
Route::get('/user/manage/wallet-balance', [App\Http\Controllers\HomeController::class, 'walletBalance']);



Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/members', [App\Http\Controllers\AdminController::class, 'members']);
Route::get('/admin/new/members', [App\Http\Controllers\AdminController::class, 'newMembers']);
Route::get('/admin/members/suspended', [App\Http\Controllers\AdminController::class, 'suspendedMembers']);


Route::get('/admin/plans/parent', [App\Http\Controllers\AdminController::class, 'newParentPlan']);
Route::get('/admin/plans/child', [App\Http\Controllers\AdminController::class, 'newChildPlan']);
Route::get('/admin/plans/promo', [App\Http\Controllers\AdminController::class, 'promoPlan']);

Route::get('/admin/wallets', [App\Http\Controllers\AdminController::class, 'wallets']);

Route::get('/admin/deposits', [App\Http\Controllers\AdminController::class, 'allDeposits']);

Route::get('/admin/deposits/pending', [App\Http\Controllers\AdminController::class, 'pendingDeposits']);
Route::get('/admin/deposits/approved', [App\Http\Controllers\AdminController::class, 'approvedDeposits']);
Route::get('/admin/deposits/denied', [App\Http\Controllers\AdminController::class, 'deniedDeposits']);

Route::get('/admin/withdrawals', [App\Http\Controllers\AdminController::class, 'allWithdrawals']);
Route::get('/admin/withdrawals/pending', [App\Http\Controllers\AdminController::class, 'pendingWithdrawals']);
Route::get('/admin/withdrawals/approved', [App\Http\Controllers\AdminController::class, 'approvedWithdrawals']);
Route::get('/admin/withdrawals/denied', [App\Http\Controllers\AdminController::class, 'deniedWithdrawals']);

Route::get('/admin/fund/confirm-credit', [App\Http\Controllers\AdminController::class, 'confirmCredit']);
Route::get('/admin/fund/confirm-debit', [App\Http\Controllers\AdminController::class, 'confirmDebit']);
Route::get('/admin/fund/ci/confirm-credit', [App\Http\Controllers\AdminController::class, 'confirmCiCredit']);
Route::get('/admin/fund/ci/confirm-debit', [App\Http\Controllers\AdminController::class, 'confirmCiDebit']);

Route::get('/admin/quick-withdrawal', [App\Http\Controllers\AdminController::class, 'quickWithdrawal']);

Route::get('/admin/manage/referral-bonus', [App\Http\Controllers\AdminController::class, 'referralBonus']);
Route::get('/admin/manage/current-invested', [App\Http\Controllers\AdminController::class, 'currentInvested']);
Route::get('/admin/manage/wallet-balance', [App\Http\Controllers\AdminController::class, 'walletBalance']);

Route::get('/admin/files', [App\Http\Controllers\AdminController::class, 'files']);
Route::get('/admin/reviews', [App\Http\Controllers\AdminController::class, 'reviews']);

Route::get('/admin/pages/terms', [App\Http\Controllers\AdminController::class, 'terms']);
Route::get('/admin/pages/faqs', [App\Http\Controllers\AdminController::class, 'faqs']);
Route::get('/admin/pages/about', [App\Http\Controllers\AdminController::class, 'about']);
Route::get('/admin/pages/privacy-policy', [App\Http\Controllers\AdminController::class, 'privacyPolicy']);
Route::get('/admin/pages/meet-our-traders', [App\Http\Controllers\AdminController::class, 'meetOurTraders']);

Route::get('/admin/pages/how-it-works', [App\Http\Controllers\AdminController::class, 'howItWorks']);
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout']);

Route::get('/user/account/verification', [App\Http\Controllers\RegistrationController::class, 'verifyUserAccount']);


Route::get('/forgot-pass', [App\Http\Controllers\HomeController::class, 'forgotPass']);
Route::get('/change-pass', [App\Http\Controllers\HomeController::class, 'changePass']);
Route::get('/verify-token', [App\Http\Controllers\HomeController::class, 'verifyToken']);

Route::get('/user/account/upgrade', [App\Http\Controllers\HomeController::class, 'upgradeAccount']);

Route::get('/user/referrals-list', [App\Http\Controllers\HomeController::class, 'referralsList']);
Route::get('/user/my/offers', [App\Http\Controllers\HomeController::class, 'offers']);
Route::get('/auth/access/admin/login', [App\Http\Controllers\HomeController::class, 'authAdmin']);




// Admin - new version
Route::get('/v1/admin/statistics', [App\Http\Controllers\AdminController::class, 'adminStatistics']);
Route::get('/admin/settings/limit', [App\Http\Controllers\AdminController::class, 'limitSettings']);

Route::get('/admin/kyc', [App\Http\Controllers\AdminController::class, 'kyc']);

