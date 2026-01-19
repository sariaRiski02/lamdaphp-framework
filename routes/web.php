<?php

use App\Http\Controllers\AuthController;
use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use Lamda\Core\Middleware\AuthMiddleware;

Route::get('/', [NewsController::class, 'index'], AuthMiddleware::class);
Route::get('/about', [NewsController::class, 'about']);
Route::get('/contact', [NewsController::class, 'contact']);

// Auth routes
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store']);
Route::get('/logout', [AuthController::class, 'logout']);

// Realtime routes
Route::get('/events', [EventController::class, 'stream']);