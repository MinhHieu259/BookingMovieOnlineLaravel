<?php

use App\Http\Controllers\Admin\SuatChieuController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/danh-sach-lich-chieu/{maPhim}', [SuatChieuController::class, 'index'])->name('admin.listLichChieu');
    Route::get('/them-moi-lich-chieu/{maPhim}', [SuatChieuController::class, 'add'])->name('admin.addLichChieu');
    Route::get('/cap-nhat-suat-chieu/{maSuatChieu}', [SuatChieuController::class, 'editLichChieu'])->name('admin.editLichChieu');
    Route::get('/get-list-room/{maCumRap}', [SuatChieuController::class, 'onChangeCumRap'])->name('admin.onChangeCumRap');
    Route::get('/get-list-suat-chieu/{maPhim}', [SuatChieuController::class, 'listSuatChieuToTable'])->name('admin.listSuatChieuToTable');
    Route::get('/danh-sach-ghe/{maPhong}/{maSuatChieu}', [SuatChieuController::class, 'detailChair'])->name('admin.detailChair');
    Route::post('/validate-suat-chieu', [SuatChieuController::class, 'validateSuatChieu'])->name('admin.validateSuatChieu');
    Route::post('/validate-update-suat-chieu', [SuatChieuController::class, 'validateUpdate'])->name('admin.validateUpdate');
    Route::post('/insert-suat-chieu', [SuatChieuController::class, 'storeSuatChieu'])->name('admin.storeSuatChieu');
    Route::post('/update-suat-chieu/{maSuatChieu}', [SuatChieuController::class, 'updateSuatChieu'])->name('admin.updateSuatChieu');
    Route::delete('/delete-suat-chieu/{maSuatChieu}', [SuatChieuController::class, 'deleteSuatChieu'])->name('admin.deleteSuatChieu');
    Route::get('/get-list-ghe/{maSuatChieu}', [SuatChieuController::class, 'getListChair'])->name('admin.getListChair');
});
