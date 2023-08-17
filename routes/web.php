<?php


use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\DeviceController;
use App\Http\Controllers\Admin\MobileController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\TraderController;
use Illuminate\Support\Facades\Auth;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
    ], function(){

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware'=>'auth'],function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/show/profile', [UserController::class, 'showProfile'])->name('show.profile');
    Route::post('/update/profile', [UserController::class, 'updateProfile'])->name('update.profile');
    //setting
    Route::get('warning',[SettingController::class,'warning'])->name('setting.warning');
    Route::put('update_warning/{id}',[SettingController::class,'update_warning'])->name('setting.update_warning');
    Route::resource('setting',SettingController::class);
    //notifications
    Route::get('/send_notification', [PaymentsController::class,'send_notification'])->name('make.send_notification');
    Route::get('get/Unread/Notification/{id}', [MobileController::class,'getUnreadNotification'])->name('get.Unread.Notification');
    Route::get('/notification', [MobileController::class,'showNotificaton']);
    Route::post('/mark-as-read',[MobileController::class, 'markNotification'])->name('admin.markNotification');

 Route::group(['middleware'=>['role:User']],function (){
      //Mobiles
    Route::get('expired',[MobileController::class,'expired'])->name('mobile.expired');
    Route::resource('mobiles',MobileController::class);
      //payments
    Route::resource('payments', PaymentsController::class);
    Route::delete('delete-all-payments/{mobile}', [PaymentsController::class,'deleteAllPayments'])->name('delete_all_payments');

    Route::post('{id}/payments',[PaymentsController::class,'store'])->name('payments.store');
    Route::post('{id}/payments/print', [CustomersController::class,'printPayments'])->name('payments.print');
    Route::get('requiredPayment',[PaymentsController::class,'requiredPayment'])->name('payments.required');
    //Route::delete('deleteAllPayments/{mobile}',[PaymentsController::class,'deleteAllPayments'])->name('payments.deleteAll');
      //Customer
    Route::resource('customers', CustomersController::class);
    Route::get('{id}/showPayments', [CustomersController::class,'showPayments'])->name('customers.showPayments');
    Route::get('/customers/export/excel', [CustomersController::class,'export'])->name('customers.export.excel');
    Route::get('print', [CustomersController::class, 'print'])->name('print');

     //trader
     Route::resource('traders',TraderController::class);

     //devices
     Route::resource('devices',DeviceController::class);
});

  Route::group(['middleware'=>['role:Super_Admin']],function (){
       //user
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);

});
});


});
