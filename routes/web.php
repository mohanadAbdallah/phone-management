<?php


use App\Http\Controllers\MobileController;
use App\Http\Controllers\PaymentsController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;
use \App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\VehicleController;
use \App\Http\Controllers\Admin\VehicleTypeController;
use \App\Http\Controllers\Admin\BranchController;
use \App\Http\Controllers\Admin\BrandsController;
use \App\Http\Controllers\Admin\RoleController;
use \App\Http\Controllers\Admin\CustomersController;
use \App\Http\Controllers\Admin\CityController;
use \App\Http\Controllers\Admin\ReservationController;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    ], function(){

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['auth']], function() {
        //user
        Route::resource('users',UserController::class);
        Route::get('/show/profile', [UserController::class, 'showProfile'])->name('show.profile');
        Route::post('/update/profile', [UserController::class, 'updateProfile'])->name('update.profile');

        //Mobiles
        Route::resource('mobiles',MobileController::class);

        //payments
        Route::resource('payments', PaymentsController::class);
        Route::post('{id}/payments',[PaymentsController::class,'store'])->name('payments.store');
        Route::post('{id}/payments/print', [CustomersController::class,'printPayments'])->name('payments.print');


        //Customer
        Route::resource('customers', CustomersController::class);
        Route::get('{id}/showPayments', [CustomersController::class,'showPayments'])->name('customers.showPayments');
        Route::get('/customers/export/excel', [CustomersController::class,'export'])->name('customers.export.excel');
        Route::get('print', [CustomersController::class, 'print'])->name('print');

        //setting
        Route::resource('setting',SettingController::class);


        // ajax request Notification
        Route::get('make/NotificationRead', [ReservationController::class,'makeNotificationRead'])->name('make.NotificationRead');
        Route::get('get/Unread/Notification/{id}', [ReservationController::class,'getUnreadNotification'])->name('get.Unread.Notification');

    });

});
