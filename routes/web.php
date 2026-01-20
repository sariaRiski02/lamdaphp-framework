<?php


use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use Lamda\Core\Middleware\AuthMiddleware;
use App\Middleware\AfterAuthMiddleware;

Route::get('/', [NewsController::class, 'index'], AuthMiddleware::class);
Route::get('/about', [NewsController::class, 'about']);
Route::get('/contact', [NewsController::class, 'contact']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'], AfterAuthMiddleware::class);
Route::post('/login', [AuthController::class, 'loginPost'], AfterAuthMiddleware::class);
Route::get('/register', [AuthController::class, 'register'], AfterAuthMiddleware::class);
Route::post('/register', [AuthController::class, 'store'], AfterAuthMiddleware::class);
Route::get('/logout', [AuthController::class, 'logout'], AuthMiddleware::class);

// Realtime routes
Route::get('/events', [EventController::class, 'stream']);