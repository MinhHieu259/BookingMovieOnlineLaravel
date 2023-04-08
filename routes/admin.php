<?php

use App\Http\Controllers\Admin\CumRapController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RapController;
use Illuminate\Support\Facades\Route;

//Route For Auth
Route::prefix('admin')->group(function() {
    Route::get('/dang-nhap', [AuthController::class, 'LoginPage'])->name('admin.dangnhap');
    Route::post('/do-login', [AuthController::class, 'DoLogin'])->name('admin.dologin');
});

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/trang-chu', [PageController::class, 'index'])->name('admin.trangchu');
    //Route For Cum Rap
    Route::get('/them-moi-cum-rap', [CumRapController::class, 'AddNewCumRap'])->name('admin.addcumrap');
    Route::get('/danh-sach-cum-rap', [CumRapController::class, 'ListCumRap'])->name('admin.listcumrap');
    //Route For Rap
    Route::get('/them-moi-rap', [RapController::class, 'AddRap'])->name('admin.addrap');
    Route::get('/danh-sach-rap', [RapController::class, 'ListRap'])->name('admin.listrap');
    Route::post('/validate-data-rap', [RapController::class, 'ValidateDataRap'])->name('admin.validateAddRap');
    Route::post('/save-data-rap', [RapController::class, 'SaveDataRap'])->name('admin.savedatarap');
    //Route For Auth
    Route::post('/logout-admin', [AuthController::class, 'LogoutAdmin'])->name('admin.logout');
});
