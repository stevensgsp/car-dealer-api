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

Route::get( 'customers', 'CustomersController@index' )->name( 'customers.index' );
Route::get( 'customers/car-dealer/{carDealer}', 'CustomersController@indexByCarDealer' )->name( 'customers.indexByCarDealer' );
Route::post( 'customers', 'CustomersController@store' )->name( 'customers.store' );
Route::get( 'customers/{customer}', 'CustomersController@show' )->name( 'customers.show' );
Route::put( 'customers/{customer}', 'CustomersController@update' )->name( 'customers.update' );
Route::delete( 'customers/{customer}', 'CustomersController@destroy' )->name( 'customers.destroy' );

Route::get( 'car-dealers', 'CarDealersController@index' )->name( 'carDealers.index' );
Route::post( 'car-dealers', 'CarDealersController@store' )->name( 'carDealers.store' );
Route::get( 'car-dealers/{carDealer}', 'CarDealersController@show' )->name( 'carDealers.show' );
Route::put( 'car-dealers/{carDealer}', 'CarDealersController@update' )->name( 'carDealers.update' );
Route::delete( 'car-dealers/{carDealer}', 'CarDealersController@destroy' )->name( 'carDealers.destroy' );

Route::get( 'cities', 'CitiesController@index' )->name( 'cities.index' );
