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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');

    Route::group(['prefix' => 'password'], function () {
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/user', 'AuthController@user');

        Route::group(['prefix' => 'orders'], function () {
            Route::get('', 'OrderController@index');
            Route::get('{id}', 'OrderController@detail');
        });

        Route::group(['prefix' => 'products'], function () {
            Route::get('', 'ProductController@index');
            Route::post('', 'ProductController@store');
            Route::get('{id}', 'ProductController@show');
            Route::post('{id}', 'ProductController@update');
            Route::delete('{id}', 'ProductController@destroy');
        });
    });
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
