<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::controller(TodoController::class)->group(function () {
    Route::get('/', 'homepage')->name('home');
    Route::get('/all-todos', 'todos')->name('todos');
    Route::post('/store', 'storeTodo')->name('store');
    Route::get('/delete/{id}', 'deleteTodo')->name('delete');
    Route::get('/edit/{id}', 'editTodo')->name('edit');
    Route::post('/update/{id}', 'storeTodo')->name('update');
    Route::get('/status/{id}', 'statusTodo')->name('status');
});