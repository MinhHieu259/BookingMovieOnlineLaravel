<?php

use App\Http\Controllers\Admin\DayGheController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/them-moi-day-ghe/{maCum}/{maPhong}', [DayGheController::class, 'ListDayGhe'])->name('admin.listdayghe');
    Route::post('/them-moi-day-ghe/{maPhong}', [DayGheController::class, 'AddDayGhe'])->name('admin.adddayghe');
});
