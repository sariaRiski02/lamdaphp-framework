<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\TestController;


Route::get('/', [TestController::class, 'test']);

