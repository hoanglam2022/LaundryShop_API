<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function ()  {
    Route::group(['prefix' => 'auth'], function ()  {
        Route::post('tokens/create', [AuthController::class, 'getToken']);
        Route::post('register', [AuthController::class, 'register']);
    });

    Route::group(['prefix' => 'users'], function ()  {
        Route::get('', 'UserController@get');
        Route::get('username/{username}', 'UserController@detail');
        Route::post('insert', 'UserController@insert');
    });

    Route::group(['middleware' => 'auth'], function ()  {

        Route::group(['prefix' => 'auth'], function ()  {
            Route::post('refresh-token', 'AuthController@refreshToken');
        });

        Route::group(['prefix' => 'users', 'middleware' => 'authorization'], function ()  {

            Route::post('{username}/orders', 'UserController@ordersByUsername');
            Route::post('{username}/transactions', 'UserController@transactionsByUsername');
        });

        Route::group(['middleware' => 'authorization'], function ()  {

            Route::group(['prefix' => 'transactions'], function ()  {
                Route::post('pay-in', 'TransactionController@payIn');
            });

            Route::group(['prefix' => 'orders'], function ()  {
                Route::post('insert', 'OrderController@insert');
            });

            Route::group(['prefix' => 'orders'], function ()  {
                Route::post('insert-ssc', 'OrderController@insertSSC');
            });
        });
    });
});
