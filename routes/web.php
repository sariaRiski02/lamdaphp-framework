<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/',[GuestController::class, 'home']);
Route::get('/news/{slug}',[GuestController::class, 'news']);