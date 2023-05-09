<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/dang-ky-tai-khoan', [AuthController::class, 'RegisterPage'])->name('RegisterPage');
Route::get('/dang-nhap', [AuthController::class, 'LoginPage'])->name('LoginPage');
Route::post('/do-dang-ky', [AuthController::class, 'DoRegister'])->name('DoRegister');
Route::post('/do-dang-nhap', [AuthController::class, 'DoLogin'])->name('DoLogin');
Route::post('/do-dang-nhap-modal', [AuthController::class, 'DoLoginModal'])->name('DoLoginModal');
Route::post('/do-logout', [AuthController::class, 'DoLogout'])->name('DoLogout');
// Login Facebook
Route::get('login/facebook', [AuthController::class, 'redirectFacebook'])->name('login.facebook');
Route::get('login/facebook/callback', [AuthController::class, 'handleFacebookCallback'])->name('handleFacebookCallback');

Route::get('login/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');
