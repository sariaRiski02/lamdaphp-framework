<?php


use Lamda\Support\Facades\Route;
use App\Controllers\HomeController;

Route::get('/', fn()=> 'Welcome to Lamda Framework!');