<?php

use App\Http\Controllers\Admin\DanhMucController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/them-moi-danh-muc', [DanhMucController::class, 'AddDanhMuc'])->name('admin.adddanhmuc');
    Route::get('/danh-sach-danh-muc', [DanhMucController::class, 'ListDanhMuc'])->name('admin.listdanhmuc');
    Route::get('/list-danh-muc-table', [DanhMucController::class, 'ListDanhMucToTable'])->name('admin.listdanhmuctable');
    Route::get('/cap-nhat-danh-muc/{maDanhMuc}', [DanhMucController::class, 'EditDanhMuc'])->name('admin.capnhatdanhmuc');
    Route::post('/them-moi-danh-muc', [DanhMucController::class, 'InsertDanhMuc'])->name('admin.savedanhmuc');
    Route::post('/update-danh-muc/{maDanhMuc}', [DanhMucController::class, 'UpdateDanhMuc'])->name('admin.updatedanhmuc');
    Route::post('/validate-danh-muc', [DanhMucController::class, 'ValidateDanhMuc'])->name('admin.doanvalidate');
    Route::delete('/delete-danh-muc/{maDanhMuc}', [DanhMucController::class, 'DeleteDanhMuc'])->name('admin.deletedanhmuc');
});
