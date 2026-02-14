<?php

use App\Http\Controllers\SampleController;
use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/sample', [SampleController::class, 'sample']);

Route::get('/categories', [CategoryController::class, 'categories']);
Route::get('/categories-by-customer-type', [CategoryController::class, 'categoriesByCustomerType']);

Route::get('/postcodes/{postcode}/validity', [\App\Http\Controllers\Postcode\PostcodeController::class, 'validatePostcode']);
