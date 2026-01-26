<?php


use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;



// Register Web Routes Here





// Realtime routes
Route::get('/events', [EventController::class, 'stream']);