<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DisabilityController;
use App\Models\Disabilities\Disabilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('disability',[DisabilityController::class,'index']);
Route::post('login',[AuthController::class,'login']);
Route::get('user',[AuthController::class,'get_data_auth'])->middleware('auth:sanctum');
Route::post('register',[AuthController::class,'register']);


Route::apiResource('company',CompanyController::class);

