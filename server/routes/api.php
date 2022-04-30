<?php

use App\Http\Controllers\API\V1\EmployeeController;
use App\Http\Controllers\API\V1\UserController;
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
Route::prefix('v1')->group(function(){
    //Employees API Resource
    Route::apiResource('employees', EmployeeController::class);

    //Users API Resource
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{users}', [UserController::class, 'show']);
});
