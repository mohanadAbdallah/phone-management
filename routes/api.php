<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ReservationController;
use \App\Http\Controllers\Api\AddressController;
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

Route::group(['middleware' => ['localization'] , 'prefix' => 'v1'] , function() {

    Route::post('/customer/register', [\App\Http\Controllers\Api\Auth\RegisterController::class, 'register'])->name('customer.register');
    Route::post('/customer/login', [\App\Http\Controllers\Api\Auth\LoginController::class, 'login'])->name('customer.login');
    Route::post('/customer/socialite/login', [\App\Http\Controllers\Api\Auth\LoginController::class, 'socialiteLoginCustomer'])->name('customer.socialite.login');
    Route::post('/customer/send/otp/code', [\App\Http\Controllers\Api\CustomersController::class, 'sendOtpCode'])->name('verify.Otp.Code');
    Route::post('/customer/verify/otp/code', [\App\Http\Controllers\Api\CustomersController::class, 'verifyOtpCode'])->name('verify.otp.code');
    Route::get('/customer/get/question', [\App\Http\Controllers\Api\CustomersController::class, 'getQuestion'])->name('get.question');
    Route::post('/customer/verify/question', [\App\Http\Controllers\Api\CustomersController::class, 'verifyQuestion'])->name('verify.question');

//Setting
    Route::get('/get/setting/data', [\App\Http\Controllers\Api\SettingController::class, 'getData'])->name('get.setting');
    Route::get('/customer/get/question', [\App\Http\Controllers\Api\SettingController::class, 'getQuestion'])->name('get.question');

//VehicleType
    Route::get('/customer/get/vehicleType', [\App\Http\Controllers\Api\VehicleTypeController::class, 'getVehicleTypes'])->name('get.vehicleTypes');
//Brands
    Route::get('/customer/get/brands', [\App\Http\Controllers\Api\BrandsController::class, 'getBrands'])->name('get.brands');

//branchs
    Route::get('/customer/get/cities', [\App\Http\Controllers\Api\CityController::class, 'getCities'])->name('get.cities');
    Route::get('/customer/get/branchs', [\App\Http\Controllers\Api\CityController::class, 'getbranchs'])->name('get.branchs');

//vehicles
    Route::get('/customer/get/vehicles', [\App\Http\Controllers\Api\VehicleController::class, 'getVehicles'])->name('get.vehicles');
    Route::get('/customer/show/vehicle', [\App\Http\Controllers\Api\VehicleController::class, 'showVehicle'])->name('show.vehicle');
    Route::get('/customer/get/brand/vehicles', [\App\Http\Controllers\Api\VehicleController::class, 'getBrandVehicles'])->name('get.brand.vehicles');
    Route::post('/filter/vehicle', [\App\Http\Controllers\Api\VehicleController::class, 'filterVehicle'])->name('remove.Vehicle.favorites');


});


Route::group(['middleware' => ['localization','auth:sanctum'] , 'prefix' => 'v1'] , function() {

    //Customers
    Route::post('/customer/update/profile', [\App\Http\Controllers\Api\CustomersController::class, 'updateProfile'])->name('merchant.update.profiler');
    Route::post('/customer/forgot/password', [\App\Http\Controllers\Api\CustomersController::class, 'forgotPassword'])->name('forgot.password');
    Route::post('/customer/password/update', [\App\Http\Controllers\Api\CustomersController::class, 'updatePassword'])->name('password.update.customers');

//vehicles
    Route::get('/vehicles/favorites', [\App\Http\Controllers\Api\VehicleController::class, 'favorites'])->name('products.favorites');
    Route::post('/add/vehicle/favorites', [\App\Http\Controllers\Api\VehicleController::class, 'addVehicleToFavorites'])->name('add.Vehicle.favorites');
    Route::post('/remove/vehicle/favorites', [\App\Http\Controllers\Api\VehicleController::class, 'removeVehicleFromFavorites'])->name('remove.Vehicle.favorites');

    Route::post('/make/vehicle/rate/{id}', [\App\Http\Controllers\Api\VehicleController::class, 'makeVehicleRating'])->name('make.vehicle.rate');
    Route::get('/get/vehicle/rate/{id}', [\App\Http\Controllers\Api\VehicleController::class, 'getMyRatingVehicle'])->name('get.vehicle.rate');

    //reservation
    Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function () {
        /* one route calls */

        Route::post('/customers/make', [ReservationController::class, 'makeReservation'])->name('customers.make.reservation');
        Route::delete('/customers/delete/{id}', [ReservationController::class, 'deleteReservation'])->name('customers.delete.reservation');
        Route::post('/customers/cancel/{id}', [ReservationController::class, 'cancelReservation'])->name('customers.cancel.reservation');
        Route::post('/customers/edit/{id}', [ReservationController::class, 'editReservation'])->name('customers.edit.reservation');
        Route::get('/customers/show', [ReservationController::class, 'showReservation'])->name('customers.show.reservation');
        Route::get('/get/time/table', [ReservationController::class, 'getTimeTable'])->name('get.time.table.reservation');


    });
    Route::group(['prefix' => 'address', 'as' => 'address.'], function () {
        /* one route calls */
        Route::get('/show/list/address', [AddressController::class, 'showListAddresses'])->name('all');
        Route::post('/make/address', [AddressController::class, 'makeAddresses'])->name('store');
        Route::post('/address/update', [AddressController::class, 'updateAddresses'])->name('update');
        Route::delete('/remove/address/{id}', [AddressController::class, 'removeAddresses'])->name('destroy');

    });


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
