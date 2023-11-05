<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\User\WithDrawController;
use App\Http\Controllers\Admin\PlayTwoDController;
use App\Http\Controllers\Admin\TwoDigitController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\TwoDWinnerController;
use App\Http\Controllers\Admin\FillBalanceController;
use App\Http\Controllers\Admin\TwoDLotteryController;
use App\Http\Controllers\User\ChangePasswordController;
use App\Http\Controllers\Admin\FillBalanceReplyController;
use App\Http\Controllers\Admin\TwoDEveningWinnerController;
use App\Http\Controllers\Admin\TwoDWinnerHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * ****
 Write here User Side no need Auth Routes
 */
Route::get('/', [App\Http\Controllers\User\WelcomeController::class, 'index'])->name('welcome');
// Route::get('/twod', [App\Http\Controllers\User\WelcomeController::class, 'twod']);
Route::get('/wallet', [App\Http\Controllers\User\WelcomeController::class, 'wallet']);
Route::get('/topUp', [App\Http\Controllers\User\WelcomeController::class, 'topUp']);
Route::get('/withDraw', [App\Http\Controllers\User\WelcomeController::class, 'withDraw']);
Route::get('/promo', [App\Http\Controllers\User\WelcomeController::class, 'promo']);
Route::get('/promo/promo-detail', [App\Http\Controllers\User\WelcomeController::class, 'promoDetail']);
Route::get('/service', [App\Http\Controllers\User\WelcomeController::class, 'servicePage']);
Route::get('/winnerDigit', [App\Http\Controllers\User\WelcomeController::class, 'winnerDigit']);
Route::get('/winnerPage', [App\Http\Controllers\User\WelcomeController::class, 'winnerPage']);
Route::get('/myDigit', [App\Http\Controllers\User\WelcomeController::class, 'myDigit']);
Route::get('/myBank', [App\Http\Controllers\User\WelcomeController::class, 'myBank']);
Route::get('/changePassword', [App\Http\Controllers\User\WelcomeController::class, 'changePassword']);
Route::get('/inviteCode', [App\Http\Controllers\User\WelcomeController::class, 'inviteCode']);
Route::get('/comment', [App\Http\Controllers\User\WelcomeController::class, 'comment']);
Route::get('/user_dashboard', [App\Http\Controllers\User\WelcomeController::class, 'user_dashboard']);
Route::get('/winningRecord', [App\Http\Controllers\User\WelcomeController::class, 'winningRecord']);

/* no need auth route end */



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {
    // Permissions
    Route::delete('permissions/destroy', [PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionController::class);
    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);
    // Users
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);
    Route::get('/two-d-users', [App\Http\Controllers\Admin\TwoUsersController::class, 'index'])->name('two-d-users-index');
    // details route
    Route::get('/two-d-users/{id}', [App\Http\Controllers\Admin\TwoUsersController::class, 'show'])->name('two-d-users-details');
    //Banners
    Route::resource('banners', BannerController::class);
    // profile resource rotues
    Route::resource('profiles', ProfileController::class);
    // user profile route get method
    Route::put('/change-password', [ProfileController::class, 'newPassword'])->name('changePassword');
    // PhoneAddressChange route with auth id route with put method
    Route::put('/change-phone-address', [ProfileController::class, 'PhoneAddressChange'])->name('changePhoneAddress');
    Route::put('/change-kpay-no', [ProfileController::class, 'KpayNoChange'])->name('changeKpayNo');
    Route::put('/change-join-date', [ProfileController::class, 'JoinDate'])->name('addJoinDate');
    Route::resource('play-twod', PlayTwoDController::class);
    Route::get('/get-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'GetTwoDigit'])->name('GetTwoDigit');
    Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');
    Route::get('/morning-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'MorningPlayTwoDigit'])->name('MorningPlayTwoDigit');

    Route::get('/evening-play-two-d', [App\Http\Controllers\Admin\TwoDPlayController::class, 'EveningPlayTwoDigit'])->name('EveningPlayTwoDigit');

    Route::post('lotteries-two-d-play', [TwoDigitController::class, 'store'])->name('StorePlayTwoD');

    Route::get('/get-three-d', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'GetThreeDigit'])->name('GetThreeDigit');
    Route::get('/three-d-play', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'ThreeDigitPlay'])->name('ThreeDigitPlay');
    Route::get('/three-d-play-confirm', [App\Http\Controllers\Admin\ThreeDPlayController::class, 'ThreeDigitPlayConfirm'])->name('ThreeDigitPlayConfirm');
    //Route::resource('two-d-lotteries', TwoDigitController::class);
    //Route::get('/two-d-lotteries', [App\Http\Controllers\Admin\TwoDigitController::class, 'index'])->name('GetTwoDigit');

    Route::post('/two-d-play', [App\Http\Controllers\Admin\TwoDPlayController::class, 'store'])->name('two-d-play.store');
    Route::get('/two-d-play-noti', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'index'])->name('two-d-play-noti');
    Route::post('/two-d-play-noti-mark-as-read', [App\Http\Controllers\Admin\GetNotificationTwoDPlayUserController::class, 'playTwoDmarkNotification'])->name('playTwoDmarkNotification');

    Route::get('/get-two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'index'])->name('SessionResetIndex');
    Route::post('/two-d-session-reset', [App\Http\Controllers\Admin\SessionResetControlller::class, 'SessionReset'])->name('SessionReset');
    Route::get('/close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'index'])->name('CloseTwoD');
    Route::put('/update-open-close-two-d', [App\Http\Controllers\Admin\CloseTwodController::class, 'update'])->name('OpenCloseTwoD');
    Route::resource('twod-records', TwoDLotteryController::class);
    Route::resource('tow-d-win-number', TwoDWinnerController::class);
    Route::resource('tow-d-morning-number', TwoDMorningController::class);
    Route::get('/two-d-morning-winner', [App\Http\Controllers\Admin\TwoDMorningWinnerController::class, 'TwoDMorningWinner'])->name('morningWinner');
    Route::get('/two-d-evening-number', [App\Http\Controllers\Admin\TwoDMorningController::class, 'EveningTwoD'])->name('eveningNumber');
    Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDMorningController::class, 'TwoDEveningWinner'])->name('eveningWinner');
    Route::get('/two-d-evening-winner', [App\Http\Controllers\Admin\TwoDEveningWinnerController::class, 'TwoDEveningWinner'])->name('eveningWinner');
    Route::get('profile/fill_money', [ProfileController::class, 'fillmoney']);
    // kpay fill money get route
    Route::get('profile/kpay_fill_money', [ProfileController::class, 'index'])->name('kpay_fill_money');
    Route::resource('fill-balance-replies', FillBalanceReplyController::class);
    Route::get('/daily-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmounts'])->name('dailyIncomeJson');
    Route::get('/with-draw-view', [App\Http\Controllers\Admin\WithDrawViewController::class, 'index'])->name('withdrawViewGet');
    Route::get('/with-draw-details/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'show'])->name('withdrawViewDetails');
    // withdraw update route
    Route::put('/with-draw-update/{id}', [App\Http\Controllers\Admin\WithDrawViewController::class, 'update'])->name('withdrawViewUpdate');
    Route::get('/daily-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsDaily'])->name('getTotalAmountsDaily');
    // week name route
    Route::get('/weekly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsWeekly'])->name('getTotalAmountsWeekly');
    // month name route
    Route::get('/month-with-name-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsMonthly'])->name('getTotalAmountsMonthly');
    // year name route
    Route::get('/yearly-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmountsYearly'])->name('getTotalAmountsYearly');

});

// Route::get('/daily-income-json', [App\Http\Controllers\Admin\DailyTwodIncomeOutComeController::class, 'getTotalAmounts'])->name('dailyIncomeJson');

Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {

    /*
    **********
    Write here Client Side Auth Routes
    **********
    */
Route::get('/dashboard', [App\Http\Controllers\User\WelcomeController::class, 'dashboard']);
Route::get('/play-two-evening-record', [App\Http\Controllers\HomeController::class, 'UserPlayEveningRecord'])->name('UserPlayEveningRecord');
Route::get('/morning-history-record', [App\Http\Controllers\User\PrizeNoController::class, 'MorningPrizeNo'])->name('MorningPrizeNo');
Route::get('/evening-history-record', [App\Http\Controllers\User\PrizeNoController::class, 'EveningPrizeNo'])->name('EveningPrizeNo');
Route::get('/two-d-top-up-wallet', [App\Http\Controllers\User\WalletController::class, 'GetWallet'])->name('GetWallet');
// kpay route get method
    Route::get('kpay-top-up-money', [WalletController::class, 'UserKpayFillMoney'])->name('UserKpayFillMoney');
    // kpay fill money post method
    Route::post('user-kpay-fill-money', [WalletController::class, 'StoreKpayFillMoney'])->name('StoreKpayFillMoney');
    // cbpay fill money get method
    Route::get('cbpay-top-up-money', [WalletController::class, 'UserCBPayFillMoney'])->name('UserCBPayFillMoney');

    Route::post('cbpay-fill-money', [WalletController::class, 'StoreCBpayFillMoney'])->name('StoreCBpayFillMoney');

    Route::get('wavepay-top-up-money', [WalletController::class, 'UserWavePayFillMoney'])->name('UserWavePayFillMoney');

    Route::post('user-wavepay-fill-money', [WalletController::class, 'StoreWavepayFillMoney'])->name('StoreWavepayFillMoney');

    Route::get('aya-pay-top-up-money', [WalletController::class, 'UserAYAPayFillMoney'])->name('UserAYAPayFillMoney');

    Route::post('user-aya-pay-fill-money', [WalletController::class, 'StoreAYApayFillMoney'])->name('StoreAYApayFillMoney');

    Route::get('k-pay-withdraw-money', [WithDrawController::class, 'UserKpayWithdrawMoney'])->name('UserKpayWithdrawMoney');
    Route::post('k-pay-with-draw-money', [WithDrawController::class, 'StoreKpayWithdrawMoney'])->name('StoreKpayWithdrawMoney');

    Route::get('cb-pay-withdraw-money', [WithDrawController::class, 'UserCBPayWithdrawMoney'])->name('UserCBPayWithdrawMoney');
    Route::post('cb-pay-with-draw-money', [WithDrawController::class, 'StoreCBpayWithdrawMoney'])->name('StoreCBpayWithdrawMoney');

    Route::get('wave-pay-withdraw-money', [WithDrawController::class, 'UserWavePayWithdrawMoney'])->name('UserWavePayWithdrawMoney');
    Route::post('wave-pay-with-draw-money', [WithDrawController::class, 'StoreWavepayWithdrawMoney'])->name('StoreWavepayWithdrawMoney');

    Route::get('aya-pay-withdraw-money', [WithDrawController::class, 'UserAYAPayWithdrawMoney'])->name('UserAYAPayWithdrawMoney');
    Route::post('aya-pay-with-draw-money', [WithDrawController::class, 'StoreAYApayWithdrawMoney'])->name('StoreAYApayWithdrawMoney');
    Route::get('/change-new-password-form', [ChangePasswordController::class, 'showChangePasswordForm'])->name('showChangePasswordForm');
    Route::put('/change-new-password', [ChangePasswordController::class, 'ChangenewPassword'])->name('changeNewPassword');
});
