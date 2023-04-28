<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/cap-nhat-tai-khoan', [UserController::class, 'UpdateUserView'])->name('UpdateUserView');
Route::put('/cap-nhat-tai-khoan', [UserController::class, 'UpdateUser'])->name('UpdateUser');