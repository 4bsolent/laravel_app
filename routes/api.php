<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/show/{product}', [ProductController::class, 'show']);
Route::post('/onlyproduct', [ProductController::class, 'onlyProduct']);
Route::post('/updatproduct', [ProductController::class, 'update'])->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);

});
