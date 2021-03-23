<?php

use App\Http\Controllers\Auth\API\ForgotPasswordController;
use App\Http\Controllers\Auth\API\LoginController;
use App\Http\Controllers\Auth\API\RegisterController;
use Illuminate\Http\Request;

Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('forgot-password');

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/user", fn(Request $request) => $request->user())->name('user');
});
