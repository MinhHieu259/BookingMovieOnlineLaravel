<?php

use App\Http\Controllers\Admin\PhimController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('them-moi-phim', [PhimController::class, 'AddFilm'])->name('admin.addphim');
    Route::get('cap-nhat-phim/{maPhim}', [PhimController::class, 'EditFilm'])->name('admin.editphim');
    Route::get('danh-sach-phim', [PhimController::class, 'ListFilm'])->name('admin.listphim');
    Route::get('get-list-phim', [PhimController::class, 'ListFilmToTable'])->name('admin.listphimtable');
    Route::post('validate-phim', [PhimController::class, 'ValidateFilm'])->name('admin.validatephim');
    Route::post('insert-phim', [PhimController::class, 'InsertFilm'])->name('admin.insertphim');
    Route::post('update-phim/{maPhim}', [PhimController::class, 'UpdatePhim'])->name('admin.updatephim');
    Route::delete('delete-phim/{maPhim}', [PhimController::class, 'DeletePhim'])->name('admin.deletephim');
});
