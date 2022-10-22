<?php

use App\Http\Controllers\Api\CustomersController;
use App\Http\Controllers\Api\MobileController;
use App\Http\Controllers\Api\PaymentsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::group(['middleware' => ['auth:sanctum'] ] , function (){
    Route::resource('customers',CustomersController::class)->except('create','edit');
    Route::resource('mobiles',MobileController::class)->except('create','edit');
    Route::resource('mobiles',PaymentsController::class)->except('create','edit');
});


Route::group(['middleware' => ['localization'] , 'prefix' => 'v1'] , function() {
    Route::post('/customer/register', [\App\Http\Controllers\Api\Auth\RegisterController::class, 'register'])->name('customer.register');
    Route::post('/customer/login', [\App\Http\Controllers\Api\Auth\LoginController::class, 'login'])->name('customer.login');

});


Route::group(['middleware' => ['localization','auth:sanctum'] , 'prefix' => 'v1'] , function() {

//Notification
    Route::post('/save/user/fcmToken', [\App\Http\Controllers\Api\NotificationController::class, 'saveUserFcmToken'])->name('save.user.fcmToken');
    Route::post('/position/notification', [\App\Http\Controllers\Api\NotificationController::class, 'positionNotification'])->name('position/notification');
    Route::get('/get/notifications/customer', [\App\Http\Controllers\Api\NotificationController::class, 'getNotifications'])->name('get.Notifications');
    Route::get('/remove/notifications/', [\App\Http\Controllers\Api\NotificationController::class, 'removeNotifications'])->name('remove.notifications');

});

Route::group(['as' => 'api.', 'middleware' => [ 'throttle:api']], function () {
    /* one route calls */
    /* redirect not logged-in users to unauthenticated route */
    Route::get('/unauthenticated', function () {
        return response()->json(['message' => 'يرجى تسجيل الدخول', 'status' => false], 401);
    })->name('unauthenticated');
});
