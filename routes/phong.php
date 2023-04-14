<?php

use App\Http\Controllers\Admin\PhongController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    //Route For Phong
    Route::get('/danh-sach-phong', [PhongController::class, 'ListPhong'])->name('admin.listphong');
    Route::get('/danh-sach-phong/{maCum}', [PhongController::class, 'ListPhongOfCum'])->name('admin.listphongofcum');
    Route::get('/danh-sach-phong-table/{maCum}', [PhongController::class, 'ListPhongOfCumTable'])->name('admin.listphongtable');
    Route::get('/chi-tiet-phong/{maCum}/{maPhong}', [PhongController::class, 'EditPhong'])->name('admin.detailphong');
    Route::post('/them-moi-phong/{maCum}', [PhongController::class, 'InsertPhong'])->name('admin.insertphong');
    Route::post('/cap-nhat-phong/{maCum}/{maPhong}', [PhongController::class, 'UpdatePhong'])->name('admin.updatephong');
    Route::delete('/delete-phong/{maPhong}', [PhongController::class, 'DeletePhong'])->name('admin.deletephong');
});
