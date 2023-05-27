<?php
/**
 * Created by Nguyễn Minh Hiếu on 25/05/2023.
 * User: Nguyễn Minh Hiếu
 * Date: 25/05/2023
 * Time: 22:49
 */

use App\Http\Controllers\RapController;
use Illuminate\Support\Facades\Route;

Route::get('/tim-kiem-rap', [RapController::class, 'TimKiemRap'])->name('TimKiemRap');
Route::get('/get-rap-by-province', [RapController::class, 'GetTheaterByProvince'])->name('GetTheaterByProvince');
Route::get('/rap/{slug}', [RapController::class, 'DetailTheater'])->name('DetailTheater');
Route::get('/get-list-film-by-rap', [RapController::class, 'GetListFilmAndTime'])->name('GetListFilmAndTime');
