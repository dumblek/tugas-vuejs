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

Route::get('/item', 'ItemController@index');
Route::get('/item/{id}', 'ItemController@show');
Route::post('/item', 'ItemController@store');
Route::put('/item/plus/{id}', 'ItemController@plus');
Route::put('/item/minus/{id}', 'ItemController@minus');
Route::put('/item/{id}', 'ItemController@update');
Route::delete('/item/{id}', 'ItemController@destroy');