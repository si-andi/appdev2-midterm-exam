<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products/upload/local', ProductController::class);
Route::apiResource('products/upload/public', ProductController::class);

Route::middleware('product.access')->group(function (){
    Route::post('products/upload/local', [ProductController::class,'store']);
    Route::put('products/upload/local/{id}', [ProductController::class, 'update']);
    Route::delete('products/upload/local/{id}', [ProductController::class, 'destroy']);
    Route::patch('products/upload/local/{id}', [ProductController::class, 'update']);
});