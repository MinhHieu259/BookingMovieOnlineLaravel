<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/dang-ky-tai-khoan', [AuthController::class, 'RegisterPage'])->name('RegisterPage');
Route::get('/dang-nhap', [AuthController::class, 'LoginPage'])->name('LoginPage');
