<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/cap-nhat-tai-khoan', [UserController::class, 'UpdateUserView'])->name('UpdateUserView');
Route::post('/cap-nhat-tai-khoan', [UserController::class, 'UpdateUser'])->name('UpdateUser');

Route::get('/nap-tien', [UserController::class, 'NapTienView'])->name('NapTienView');
Route::get('/nap-tien/{soTien}', [UserController::class, 'PhuongThucNap'])->name('PhuongThucNap');

Route::get('/lich-su-mua-ve', [UserController::class, 'HistoryOrderView'])->name('HistoryOrderView');
Route::get('/danh-sach-order/{status}', [UserController::class, 'GetListOrder'])->name('GetListOrder');
Route::get('/chi-tiet-mua-ve/{maLichSu}', [UserController::class, 'DetailOrder'])->name('DetailOrder');
Route::post('/huy-mua-ve/{maLichSu}', [UserController::class, 'CancelBookTicket'])->name('CancelBookTicket');

Route::get('/export-pdf/{maLichSu}', [UserController::class, 'ExportPdf'])->name('ExportPdf');
