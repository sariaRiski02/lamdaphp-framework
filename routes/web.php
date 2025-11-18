<?php


use Lamda\Support\Facades\Route;
use App\Controllers\HomeController;

Route::get('/',[HomeController::class, 'index']);
Route::get('/ping', fn()=>"pong");
Route::get('/hello/{name}', [HomeController::class, 'hello']);