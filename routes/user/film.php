<?php

use App\Http\Controllers\PhimController;
use Illuminate\Support\Facades\Route;

Route::middleware(['authUser'])->group(function () {
    Route::get('/chon-ghe/{maSuatChieu}', [PhimController::class, 'ChooseSeatView'])->name('ChooseSeatView');
});

Route::get('/dang-chieu', [PhimController::class, 'DangChieu'])->name('dang-chieu');
Route::get('/get-list-dang-chieu', [PhimController::class, 'GetListDangChieu'])->name('GetListDangChieu');
Route::get('/sap-chieu', [PhimController::class, 'SapChieu'])->name('sap-chieu');
Route::get('/get-list-sap-chieu', [PhimController::class, 'GetListSapChieu'])->name('GetListSapChieu');
Route::get('/mua-ve', [PhimController::class, 'MuaVe'])->name('mua-ve');
Route::get('/thong-tin-phim', [PhimController::class, 'ThongTinPhim'])->name('thong-tin-phim');
Route::get('/lich-chieu/{slug}', [PhimController::class, 'LichChieuView'])->name('LichChieuView');
Route::get('/get-show-time/{province_id}/{date_show}/{slug}', [PhimController::class, 'GetShowTime'])->name('GetShowTime');
Route::get('/get-list-ghe/{maSuatChieu}', [PhimController::class, 'GetListSeat'])->name('GetListSeat');
Route::get('/tim-kiem', [PhimController::class, 'SearchFunction'])->name('SearchFunction');

