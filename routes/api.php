<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController :: class, 'login_get'])->name('login');

Route::post('/login', [AuthController :: class, 'login_post']);

Route:: post('/register', [AuthController :: class, 'register'])->name('register');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
