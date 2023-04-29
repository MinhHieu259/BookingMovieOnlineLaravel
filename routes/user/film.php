<?php

use App\Http\Controllers\PhimController;
use Illuminate\Support\Facades\Route;

Route::get('/dang-chieu', [PhimController::class, 'DangChieu'])->name('dang-chieu');
Route::get('/sap-chieu', [PhimController::class, 'SapChieu'])->name('sap-chieu');
Route::get('/mua-ve', [PhimController::class, 'MuaVe'])->name('mua-ve');
Route::get('/thong-tin-phim', [PhimController::class, 'ThongTinPhim'])->name('thong-tin-phim');
Route::get('/lich-chieu/{slug}', [PhimController::class, 'LichChieuView'])->name('LichChieuView');
