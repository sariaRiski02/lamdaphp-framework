<?php

use App\Http\Controllers\AuthController;
use Lamda\Core\SSE\EventController;

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\DashLogicController;
use App\Http\Controllers\DashboardViewController;



Route::get('/register', [AuthController::class, 'register']);
Route::get('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);



Route::get('/',[GuestController::class, 'home']);
Route::get('/news/{slug}',[GuestController::class, 'news']);
Route::get('/dashboard', [DashboardViewController::class, 'landingPage']);
Route::get('/dashboard/add-news', [DashboardViewController::class, 'addNewsPage']);
Route::get('/dashboard/list-news', [DashboardViewController::class, 'listNewsPage']);
Route::get('/dashboard/news/update/{slug}', [DashboardViewController::class, 'updateNewsPage']);
Route::get('/dashboard/category', [DashboardViewController::class, 'setCategoryPage']);
Route::get('/dashboard/category/update/{slug}', [DashboardViewController::class, 'updateCategoryPage']);

Route::post('/dashboard/news/store',[DashLogicController::class, 'storeNews']);
Route::post('/dashboard/news/update/{slug}', [DashLogicController::class, 'updateNews']);
Route::post('/dashboard/news/delete/{slug}', [DashLogicController::class, 'deleteNews']);
Route::post('/dashboard/category/store',[DashLogicController::class, 'storeCategory']);
Route::post('/dashboard/category/update/{slug}', [DashLogicController::class, 'updateCategory']);
Route::post('/dashboard/category/delete/{slug}', [DashLogicController::class, 'deleteCategory']);
