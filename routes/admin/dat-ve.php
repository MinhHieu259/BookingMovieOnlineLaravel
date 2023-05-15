<?php

use App\Http\Controllers\Admin\DatVeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/danh-sach-dat-ve', [DatVeController::class, 'ManagerTicketView'])->name('admin.ManagerTicketView');
    Route::get('/tim-kiem-order', [DatVeController::class, 'SearchOrder'])->name('admin.SearchOrder');
});
