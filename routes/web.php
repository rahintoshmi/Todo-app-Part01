<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class,'homepage'])->name('home');
   
Route::get('/all-todos', [TodoController::class,'todos'])->name('todos');

Route::post('/store', [TodoController::class,'storeTodo'])->name('store');
