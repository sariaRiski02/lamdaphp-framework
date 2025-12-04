<?php


use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', fn()=> 'Welcome to Lamda Framework!');
Route::get('/test', [HomeController::class, 'index']);