<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WarehouseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// 🟢 Public Routes
Route::post('/login', [AuthController::class, 'login']);

// 🔒 Protected Routes (Require Sanctum Auth)
Route::middleware('auth:sanctum')->group(function () {
    
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Products with dynamic pricing
     Route::get('/products', [ProductController::class, 'index']);

    // // Create or update stock
     Route::post('/stock', [StockController::class, 'store']);

    // // Warehouse stock report
     Route::get('/warehouses/{id}/report', [WarehouseController::class, 'report']);
});
