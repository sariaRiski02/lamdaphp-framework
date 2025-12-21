<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;

Route::get('/',[GuestController::class, 'home']);
Route::get('/news/{slug}',[GuestController::class, 'news']);
Route::get('/dashboard', [DashboardController::class, 'landingPage']);
Route::get('/dashboard/add-news', [DashboardController::class, 'addNewsPage']);