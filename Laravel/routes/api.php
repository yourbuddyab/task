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

Route::post('login','API\LoginController@login');
Route::group(['middleware'=>['auth:sanctum'],'namespace'=>'API'],function(){
    Route::post('status/store', 'StatusController@store');
    Route::patch('status/{status}', 'StatusController@update');
    Route::delete('status/{status}', 'StatusController@destroy');
});
