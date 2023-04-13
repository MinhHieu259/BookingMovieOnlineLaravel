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
    //Route For Cum Rap
    Route::get('/them-moi-cum-rap', [CumRapController::class, 'AddNewCumRap'])->name('admin.addcumrap');
    Route::get('/cap-nhat-cum-rap/{maRap}', [CumRapController::class, 'EditCumRap'])->name('admin.editcumrap');
    Route::get('/danh-sach-cum-rap', [CumRapController::class, 'ListCumRap'])->name('admin.listcumrap');
    Route::get('/get-list-cum-rap', [CumRapController::class, 'ListCumRapToTable'])->name('admin.listcumraptable');
    Route::post('/validate-cum-rap', [CumRapController::class, 'ValidationCumRap'])->name('admin.cumrapvalidate');
    Route::post('/save-cum-rap', [CumRapController::class, 'SaveDataCumRap'])->name('admin.savecumrap');
    Route::post('/update-cum-rap/{maRap}', [CumRapController::class, 'UpdateDataCumRap'])->name('admin.updatecumrap');
    Route::delete('/delete-cum-rap/{maCum}', [CumRapController::class, 'DeleteCumRap'])->name('admin.deletecumrap');

    //Route For Rap
    Route::get('/them-moi-rap', [RapController::class, 'AddRap'])->name('admin.addrap');
    Route::post('/validate-data-rap', [RapController::class, 'ValidateDataRap'])->name('admin.validateAddRap');
    Route::post('/save-data-rap', [RapController::class, 'SaveDataRap'])->name('admin.savedatarap');

    //Route For Do An
    Route::get('/them-moi-do-an', [DoAnController::class, 'AddFood'])->name('admin.adddoan');
    Route::get('/cap-nhat-do-an/{maDoAn}', [DoAnController::class, 'EditFood'])->name('admin.editdoan');
    Route::get('/danh-sach-do-an', [DoAnController::class, 'ListFood'])->name('admin.listdoan');
    Route::get('/get-list-do-an', [DoAnController::class, 'ListFoodToTable'])->name('admin.listfoodtotable');
    Route::post('/validate-do-an', [DoAnController::class, 'ValidateDoAn'])->name('admin.doanvalidate');
    Route::post('/save-do-an', [DoAnController::class, 'SaveData'])->name('admin.savedoan');
    Route::post('/update-do-an/{maDoAn}', [DoAnController::class, 'UpdateDoAn'])->name('admin.updatedoan');
    Route::delete('/delete-do-an/{maDoAn}', [DoAnController::class, 'DeleteDoAn'])->name('admin.deletedoan');

    //Route For Phong
    Route::get('/danh-sach-phong', [PhongController::class, 'ListPhong'])->name('admin.listphong');
    Route::get('/danh-sach-phong/{maCum}', [PhongController::class, 'ListPhongOfCum'])->name('admin.listphongofcum');
    Route::get('/danh-sach-phong-table/{maCum}', [PhongController::class, 'ListPhongOfCumTable'])->name('admin.listphongtable');
    Route::get('/chi-tiet-phong/{maCum}/{maPhong}', [PhongController::class, 'EditPhong'])->name('admin.detailphong');
    Route::post('/them-moi-phong/{maCum}', [PhongController::class, 'InsertPhong'])->name('admin.insertphong');
    Route::post('/cap-nhat-phong/{maCum}/{maPhong}', [PhongController::class, 'UpdatePhong'])->name('admin.updatephong');
    Route::delete('/delete-phong/{maPhong}', [PhongController::class, 'DeletePhong'])->name('admin.deletephong');

    //Route For Auth
    Route::post('/logout-admin', [AuthController::class, 'LogoutAdmin'])->name('admin.logout');
});
