<?php

use App\Http\Controllers\Admin\PhimController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('them-moi-phim', [PhimController::class, 'AddFilm'])->name('admin.addphim');
    Route::get('danh-sach-phim', [PhimController::class, 'ListFilm'])->name('admin.listphim');
});
