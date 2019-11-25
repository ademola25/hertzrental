<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API! login
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/mlogin', 'AuthenticateLoginController@store')->name('mlogin');
//Route::post('/mlogout', 'AuthenticateLoginController@ilogout')->name('mlogout');
Route::post('/mlogout', 'AuthenticateLoginController@mylogout')->name('mlogout');
Route::get('/norights', 'AuthenticateLoginController@norights')->name('norights');

/////////////////////////////CAR DISPATCHED APIS//////////////////////////////
Route::post('/driver_login', 'AuthenticateLoginController@loginDriver')->name('addusercid');

//Route::post('/mlogin', 'AuthenticateLoginController@login')->name('mlogin');

//////////////////////////DEFINE A ROUTE GROUP auth:api  token//////////////////////////////////

Route::group(['middleware' => 'token'], function(){
Route::get('dashboard', 'DashboardController@index');
Route::get('/usertrips', 'DashboardController@usertrips')->name('usertrips');
Route::apiResource('/bookings', 'BookingController');
Route::post('/createbooking', 'BookingController@create')->name('createbooking');
Route::get('/drivers', 'DriverController@index')->name('drivers');
Route::get('/vehicles', 'VehicleController@index')->name('vehicles');
Route::get('/tripbycid', 'TripsController@index')->name('tripbycid');
Route::get('/companyusers', 'UserController@index')->name('companyusers');
Route::get('/adduser', 'DashboardController@addUser')->name('adduser');
Route::post('/addusercid', 'UserController@adduserCompany')->name('addusercid');
Route::post('/driver/jobstatus', 'DriverController@jobstatus')->name('driver.jobstatus');
Route::post('/driversid', 'DriverController@driverDetails')->name('driversid');
});

Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'AuthenticateLoginController@details');
});
///////////////////////////END OF ROUTE GROUP //////////////////////////////////
Route::get('/home', 'HomeController@index')->name('home');
//Route::apiResource('/bookings', 'BookingController');
Route::apiResource('/trips', 'TripsController');
Route::apiResource('/servicetype', 'ServiceTypeController');



Route::get('/vehicleCategory', 'AuthenticateLoginController@getvehicleCategory')->name('vehicleCategory');
Route::post('/vehicleMake', 'AuthenticateLoginController@getVehiclemake')->name('vehicleMake');
Route::post('/getprice', 'AuthenticateLoginController@getprice')->name('getprice');
Route::post('/register', 'AuthenticateLoginController@register')->name('register');


