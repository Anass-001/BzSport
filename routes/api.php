<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ClientController;

// Routes protégées
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes pour les produits
Route::get('/products/men', [ProductController::class, 'allProductsForMen']);
Route::get('/products/men/tshirts-tops', [ProductController::class, 'tshirtsTopsForMen']);
Route::get('/products/men/pants', [ProductController::class, 'pantsForMen']);
Route::get('/products/men/hoodies', [ProductController::class, 'hoodiesForMen']);
Route::get('/products/men/shorts', [ProductController::class, 'shortsForMen']);
Route::get('/products/women', [ProductController::class, 'allProductsForWomen']);
Route::get('/products/women/bras', [ProductController::class, 'sportsBrasForWomen']);
Route::get('/products/women/leggings', [ProductController::class, 'leggingsForWomen']);
Route::get('/products/women/tshirts-tops', [ProductController::class, 'tshirtsTopsForWomen']);
Route::get('/products/women/pants', [ProductController::class, 'pantsForWomen']);
Route::get('/products/women/hoodies', [ProductController::class, 'hoodiesForWomen']);
Route::get('/products/women/shorts', [ProductController::class, 'shortsForWomen']);
Route::get('/products/new/men', [ProductController::class, 'newForMen']);
Route::get('/products/new/women', [ProductController::class, 'newForWomen']);
Route::get('/products/sale/men', [ProductController::class, 'saleForMen']);
Route::get('/products/sale/women', [ProductController::class, 'saleForWomen']);
Route::get('/products/sale/all', [ProductController::class, 'saleAllProduct']);
Route::get('/products/new/all', [ProductController::class, 'newAllProduct']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search', [ProductController::class, 'search']);

// Routes pour les commandes
Route::apiResource('orders', OrderController::class);

// Routes pour les clients
Route::apiResource('clients', ClientController::class);
