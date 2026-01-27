<?php


use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;

// Other web routes can be defined here


// Realtime routes
Route::get('/events', [EventController::class, 'stream']);