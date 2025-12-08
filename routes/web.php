<?php


use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class,'index']);
Route::post('/', [HomeController::class, 'store']);
Route::get('/delete/{id}', [HomeController::class, 'delete']);
Route::get('/update/{id}', [HomeController::class, 'updatePage']);
Route::post('/update/{id}', [HomeController::class, 'update']);