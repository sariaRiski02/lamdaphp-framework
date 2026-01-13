<?php

use App\Http\Controllers\ChatBoxController;
use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;


Route::get('/', [ChatBoxController::class, 'kontak']);
Route::get('/chat/to/{to}', [ChatBoxController::class, 'chat']);
Route::post('/chat/to/{to}', [ChatBoxController::class, 'send']);



// Realtime routes
Route::get('/events', [EventController::class, 'stream']);