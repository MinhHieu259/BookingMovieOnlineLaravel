<?php

use App\Http\Controllers\LichChieuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\RapController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function (){
    return view('welcome');
});
//Route For Errors
Route::get('/access-denied', [PageController::class, 'AccessDenied'])->name('access-denied');

//Route for User
Route::get('/', [PageController::class, 'index'])->name('trang-chu');

//Route For Lich Chieu
Route::get('/lich-chieu', [LichChieuController::class, 'LichChieu'])->name('lich-chieu');
Route::get('/chi-tiet-lich-chieu', [LichChieuController::class, 'ChiTietLichChieu'])->name('chi-tiet-lich-chieu');

//Route for Film
Route::get('/dang-chieu', [PhimController::class, 'DangChieu'])->name('dang-chieu');
Route::get('/sap-chieu', [PhimController::class, 'SapChieu'])->name('sap-chieu');
Route::get('/mua-ve', [PhimController::class, 'MuaVe'])->name('mua-ve');
Route::get('/thong-tin-phim', [PhimController::class, 'ThongTinPhim'])->name('thong-tin-phim');

//Route For Rap
Route::get('/chi-tiet-rap', [RapController::class, 'ChiTietRap'])->name('chi-tiet-rap');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
