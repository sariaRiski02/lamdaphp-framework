<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashboardViewController;

Route::get('/',[GuestController::class, 'home']);
Route::get('/news/{slug}',[GuestController::class, 'news']);
Route::get('/dashboard', [DashboardViewController::class, 'landingPage']);
Route::get('/dashboard/add-news', [DashboardViewController::class, 'addNewsPage']);
Route::get('/dashboard/list-news', [DashboardViewController::class, 'listNewsPage']);
Route::get('/dashboard/news/update/{slug}', [DashboardViewController::class, 'updateNewsPage']);
Route::get('/dashboard/category', [DashboardViewController::class, 'setCategoryPage']);
Route::get('/dashboard/category/update/1', [DashboardViewController::class, 'updateCategoryPage']);