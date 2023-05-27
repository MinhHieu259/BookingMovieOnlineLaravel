<?php

use App\Http\Controllers\Admin\BaiVietController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/danh-sach-bai-viet', [BaiVietController::class, 'index'])->name('admin.bai-viet.index');
    Route::get('/them-moi-bai-viet', [BaiVietController::class, 'add'])->name('admin.bai-viet.add');
    Route::get('/cap-nhat-bai-viet/{maBaiViet}', [BaiVietController::class, 'edit'])->name('admin.bai-viet.edit');
    Route::post('/validate-bai-viet', [BaiVietController::class, 'ValidatePost'])->name('admin.bai-viet.ValidatePost');
    Route::post('/validate-bai-viet-update', [BaiVietController::class, 'ValidatePostUpdate'])->name('admin.bai-viet.ValidatePostUpdate');
    Route::post('/save-bai-viet', [BaiVietController::class, 'SaveData'])->name('admin.bai-viet.SaveData');
    Route::post('/update-bai-viet/{maBaiViet}', [BaiVietController::class, 'UpdateData'])->name('admin.bai-viet.UpdateData');
    Route::get('/get-list-bai-viet', [BaiVietController::class, 'getListPost'])->name('admin.bai-viet.getListPost');
    Route::delete('/xoa-bai-viet/{maBaiViet}', [BaiVietController::class, 'deletePost'])->name('admin.bai-viet.deletePost');
});