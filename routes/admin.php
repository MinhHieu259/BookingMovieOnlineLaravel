<?php

use App\Http\Controllers\Admin\CumRapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DoAnController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhongController;
use App\Http\Controllers\Admin\RapController;
use Illuminate\Support\Facades\Route;

//Route For Auth
Route::prefix('admin')->group(function() {
    Route::get('/dang-nhap', [AuthController::class, 'LoginPage'])->name('admin.dangnhap');
    Route::post('/do-login', [AuthController::class, 'DoLogin'])->name('admin.dologin');
});

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/trang-chu', [PageController::class, 'index'])->name('admin.trangchu');

    //Route For Auth
    Route::post('/logout-admin', [AuthController::class, 'LogoutAdmin'])->name('admin.logout');
});
