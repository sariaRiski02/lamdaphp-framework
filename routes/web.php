<?php

use Lamda\Core\Support\Facades\Route;
use App\Http\Controllers\TodosController;


Route::get('/', [TodosController::class, 'todos']);
Route::get('/update/{id}', [TodosController::class, 'updateTodo']);

