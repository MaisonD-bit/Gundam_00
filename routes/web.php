<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Route::get('/', [SearchController::class, 'search']);
Route::get('/search', [SearchController::class, 'search'])->name('search');
// Route::get('/details/{id}', [SearchController::class, 'details'])->name('details');
Route::get('/details/{type}/{id}', [SearchController::class, 'details'])->name('details');
