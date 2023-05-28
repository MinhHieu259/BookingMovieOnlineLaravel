<?php

use App\Http\Controllers\User\BaiVietController;
use Illuminate\Support\Facades\Route;

Route::get('/bai-viet/{slug}', [BaiVietController::class, 'DetailPost'])->name('DetailPost');
Route::get('/tin-tuc/{slug}', [BaiVietController::class, 'TinTucByFilm'])->name('TinTucByFilm');