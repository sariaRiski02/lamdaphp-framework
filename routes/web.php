<?php

use App\Http\Controllers\GuestController;
use Lamda\Core\Support\Facades\Route;


Route::get("/", [GuestController::class, 'home']);