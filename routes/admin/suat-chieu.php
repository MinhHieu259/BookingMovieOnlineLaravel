<?php

use App\Http\Controllers\Admin\SuatChieuController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/danh-sach-lich-chieu/{maPhim}', [SuatChieuController::class, 'index'])->name('admin.listLichChieu');
    Route::get('/them-moi-lich-chieu/{maPhim}', [SuatChieuController::class, 'add'])->name('admin.addLichChieu');
    Route::get('/get-list-room/{maCumRap}', [SuatChieuController::class, 'onChangeCumRap'])->name('admin.onChangeCumRap');
});
