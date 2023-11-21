<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// RestAPI list-

// To View all product API 'http://localhost:8000/api/product'  Method: GET 
// To Add New Item API 'http://localhost:8000/api/product'      Method: POST

Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);