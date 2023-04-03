<?php

use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhimController;
use Illuminate\Support\Facades\Route;

//Route for User
Route::get('/', [PageController::class, 'index'])->name('trang-chu');

Route::get('/lich-chieu', [LichChieuController::class, 'LichChieu'])->name('lich-chieu');
Route::get('/dang-chieu', [PhimController::class, 'DangChieu'])->name('dang-chieu');
Route::get('/sap-chieu', [PhimController::class, 'SapChieu'])->name('sap-chieu');
Route::get('/mua-ve', [PhimController::class, 'MuaVe'])->name('mua-ve');
