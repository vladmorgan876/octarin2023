<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('product',\App\Http\Controllers\Api\v1\ProductController::class);

Route::get('getAllproduct2','\App\Http\Controllers\Api\v1\ProductController@getAllproduct2')->name('getAllproduct2');
