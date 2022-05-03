<?php

use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Employee\EmployeeController;
use App\Http\Controllers\API\V1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){

    //Login to the API
    Route::post('/login', [AuthController::class, 'signin'])->name('auth.login');

    //Protected Routes
    Route::middleware('auth:sanctum')->group(function(){

        //Employees API Resource
        Route::apiResource('employees', EmployeeController::class);

        //Users API Resource
        Route::get('/user', function (Request $request) { return $request->user();
        })->name('me');

        Route::apiResource('users', UserController::class);
        Route::post('/logout', [AuthController::class, 'logout']);

        //Reports Users and Employees
        Route::get('reports/users', [UserController::class]);
        Route::get('reports/employees', [EmployeeController::class, 'index']);
    });

});
