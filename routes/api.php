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
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('profile', 'UserController@profile');
    Route::get('logout', 'UserController@logout');
    Route::get('links', 'LinkController@index');
    Route::get('link/stat/{link}', 'LinkController@stat');
    Route::get('link/deactivate/{link}', 'LinkController@deactivate');
    Route::get('link/activate/{link}', 'LinkController@activate');
    Route::delete('link/{link}', 'LinkController@destroy');
    Route::post('links', 'LinkController@store');
});
