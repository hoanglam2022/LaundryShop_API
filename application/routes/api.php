<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerServiceController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
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

Route::group([
    'prefix' => 'v1',
], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::post('admin/tokens/create', [AdminAuthController::class, 'getToken']);
        Route::post('admin/register', [AdminAuthController::class, 'register']);

        Route::post('customer/tokens/create', [CustomerAuthController::class, 'getToken']);
        Route::post('customer/register', [CustomerAuthController::class, 'register']);
    });

    Route::group([
        'middleware' => ['auth:sanctum'],
    ], function () {
        Route::group([
            'middleware' => 'admin',
            'prefix'     => 'admin',
        ], function () {
            // Auth
            Route::post('auth/admin/tokens/refresh', [AdminAuthController::class, 'getToken']);

            // Customer
            Route::group(['prefix' => 'customers'], function () {
                Route::get('', [CustomerController::class, 'index']);
                Route::get('{id}', [CustomerController::class, 'find']);
                Route::post('', [CustomerController::class, 'create']);
                Route::post('{id}', [CustomerController::class, 'update']);
                Route::delete('{id}', [CustomerController::class, 'delete']);
            });

            // Employee
            Route::group(['prefix' => 'employees'], function () {
                Route::get('', [EmployeeController::class, 'index']);
                Route::get('{id}', [EmployeeController::class, 'find']);
                Route::post('', [EmployeeController::class, 'create']);
                Route::post('{id}', [EmployeeController::class, 'update']);
                Route::delete('{id}', [EmployeeController::class, 'delete']);
            });

            // Service
            Route::group(['prefix' => 'services'], function () {
                Route::get('', [ServiceController::class, 'index']);
                Route::get('{id}', [ServiceController::class, 'find']);
                Route::post('', [ServiceController::class, 'create']);
                Route::post('{id}', [ServiceController::class, 'update']);
                Route::delete('{id}', [ServiceController::class, 'delete']);
            });

            // Product
            Route::group(['prefix' => 'products'], function () {
                Route::get('', [ProductController::class, 'index']);
                Route::get('{id}', [ProductController::class, 'find']);
                Route::post('', [ProductController::class, 'create']);
                Route::post('{id}', [ProductController::class, 'update']);
                Route::delete('{id}', [ProductController::class, 'delete']);
            });

            // Customer service
            Route::group(['prefix' => 'customer-service'], function () {
                Route::get('', [CustomerServiceController::class, 'index']);
                Route::get('{id}', [CustomerServiceController::class, 'find']);
                Route::post('', [CustomerServiceController::class, 'create']);
                Route::post('{id}', [CustomerServiceController::class, 'update']);
                Route::delete('{id}', [CustomerServiceController::class, 'delete']);
            });
        });
    });
});
