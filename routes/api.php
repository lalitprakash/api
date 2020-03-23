<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country/{id}','CountryController@countryByID');
Route::get('country','CountryController@country');
Route::post('country','CountryController@countrysave');
Route::put('country/{country}','CountryController@countryUpdate');
Route::delete('country/{country}','CountryController@countryDelete');
//maxmind routes
Route::post('maxmind','MaxmindController@MaxmindRequestSave');