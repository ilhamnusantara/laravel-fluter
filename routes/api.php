<?php

use  App\Http\Controllers\API;
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


Route::get('products',[API\ProductController::class, 'all']);
Route::get('categories',[API\ProductCategoryController::class,'all']);

Route::post('register',[API\UserController::class, 'register']);
Route::post('login',[API\UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('user',[API\UserController::class,'fetch']);
    Route::post('user', [API\UserController::class, 'updateProfile']);
    Route::post('logout', [API\UserController::class, 'logout']);

    Route::get('transactioin',[API\TransactionController::class,'all']);
    Route::post('checkout',[API\TransactionController::class,'checkout']);
});
