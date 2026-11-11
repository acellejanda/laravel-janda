<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, PurchaseController, DashboardController};
Route::apiResource('/posts', PostController::class);

Route::apiResource('products', ProductController::class);

Route::post('/products', [ProductController::class, 'store']);        
Route::put('/products/{product}', [ProductController::class, 'update']); 