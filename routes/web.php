<?php


use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\DashboardController;

use App\Http\Middlewares\AuthMiddleware;
use App\Http\Middlewares\AfterAuthMiddleware;


Route::get('/', [NewsController::class, 'index'], AuthMiddleware::class);
Route::get('/news/{slug}', [NewsController::class, 'show'], AuthMiddleware::class);
Route::get('/about', [NewsController::class, 'about']);
Route::get('/contact', [NewsController::class, 'contact']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'], AfterAuthMiddleware::class);
Route::post('/login', [AuthController::class, 'loginPost'], AfterAuthMiddleware::class);
Route::get('/register', [AuthController::class, 'register'], AfterAuthMiddleware::class);
Route::post('/register', [AuthController::class, 'store'], AfterAuthMiddleware::class);
Route::get('/logout', [AuthController::class, 'logout'], AuthMiddleware::class);

// Dashboard route
Route::get('/dashboard', [DashboardController::class, 'dashboard'], AuthMiddleware::class);
Route::post('/dashboard', [DashboardController::class, 'store'], AuthMiddleware::class);
Route::get('/dashboard/delete/{id}', [DashboardController::class, 'delete'], AuthMiddleware::class);
Route::get('/dashboard/update/{id}', [DashboardController::class, 'update'], AuthMiddleware::class);
Route::post('/dashboard/update/{id}', [DashboardController::class, 'updatePost'], AuthMiddleware::class);

// Realtime routes
Route::get('/events', [EventController::class, 'stream']);