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

Route::get('ads', 'AdsController@index');
Route::get('ads/{slug}', 'AdsController@show');
Route::get('ads/brand/{slug}', 'AdsController@brand');
Route::get('ads/city/{slug}', 'AdsController@city');
Route::get('ads/category/{slug}', 'AdsController@category');