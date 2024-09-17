<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('student', StudentController::class);
Route::resource('todo', Todo::class);