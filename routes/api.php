<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/mlogin', 'AuthenticateLoginController@store')->name('mlogin');
Route::post('/mlogout', 'AuthenticateLoginController@ilogout')->name('mlogout');
//Route::post('/mlogin', 'AuthenticateLoginController@guzzleLogin')->name('mlogin');

//////////////////////////DEFINE A ROUTE GROUP auth:api  token//////////////////////////////////
Route::group(['middleware' => 'token'], function() {
   Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

///////////////////////////END OF ROUTE GROUP //////////////////////////////////

Route::apiResource('/bookings', 'BookingController');
Route::apiResource('/trips', 'TripsController');
Route::apiResource('/servicetype', 'ServiceTypeController');

/*
//USING MIDDLE IN ROUTE DEFINED IN app/Http/Kernel.php
Route::get('admin/profile', function () {
    //
})->middleware('auth');
 
 Route::get('admin/profile', function () {
    //
})->middleware(CheckAge::class);
*/

 
