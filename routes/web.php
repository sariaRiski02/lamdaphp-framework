<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardController;

Route::get('/',[GuestController::class, 'home']);
Route::get('/news/{slug}',[GuestController::class, 'news']);
Route::get('/dashboard', [DashboardController::class, 'landingPage']);
Route::get('/dashboard/add-news', [DashboardController::class, 'addNewsPage']);
Route::get('/dashboard/list-news', [DashboardController::class, 'listNewsPage']);
Route::get('/dashboard/list-news/update/1', [DashboardController::class, 'updateNewsPage']);
Route::get('/dashboard/category', [DashboardController::class, 'setCategoryPage']);
Route::get('/dashboard/category/update/1', [DashboardController::class, 'updateCategoryPage']);