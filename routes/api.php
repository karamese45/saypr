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

Route::post('/login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/', [App\Http\Controllers\Api\CompanyController::class, 'all']);

Route::group(['middleware' => ['auth', 'authorization']], function () {
    Route::group(['prefix' => 'company'], function() {
        Route::get('', [App\Http\Controllers\Api\CompanyController::class, 'all']);
        Route::get('/{id}', [App\Http\Controllers\Api\CompanyController::class, 'read']);
        Route::post('/', [App\Http\Controllers\Api\CompanyController::class, 'create']);
        Route::patch('/{id}', [App\Http\Controllers\Api\CompanyController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Api\CompanyController::class, 'delete']);
    });

    Route::group(['prefix' => 'employee'], function() {
        Route::get('', [App\Http\Controllers\Api\EmployeeController::class, 'all']);
        Route::get('/{id}', [App\Http\Controllers\Api\EmployeeController::class, 'read']);
        Route::post('/', [App\Http\Controllers\Api\EmployeeController::class, 'create']);
        Route::patch('/{id}', [App\Http\Controllers\Api\EmployeeController::class, 'update']);
        Route::delete('/{id}', [App\Http\Controllers\Api\EmployeeController::class, 'delete']);
    });
});

