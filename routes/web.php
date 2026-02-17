<?php


use App\Http\Controllers\WelcomeController;
use Lamda\Core\Http\Response;
use Lamda\Core\SSE\EventController;
use Lamda\Core\Support\Facades\Route;

// Other web routes can be defined here
Route::get('/', function(){
    return Response::view('welcome');
});

// Realtime routes
Route::get('/events', [EventController::class, 'stream']);