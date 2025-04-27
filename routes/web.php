<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class,"index"]);
Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');

