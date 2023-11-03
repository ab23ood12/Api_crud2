<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::resource('products',ProductController::class);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::get('/products/search/{search}',[ProductController::class,'search']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);



Route::group(['middleware'=>['auth:sanctum']],function () {
    Route::post('/products/store',[ProductController::class,'store']);
    Route::get('/products/edit/{id}',[ProductController::class,'edit']);
    Route::put('/products/update/{id}',[ProductController::class,'update']);
    Route::delete('/products/delete/{id}',[ProductController::class,'detsroy']);

    Route::post('/logout',[AuthController::class,'logout']);
});
