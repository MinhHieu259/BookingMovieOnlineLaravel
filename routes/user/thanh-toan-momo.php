<?php

use App\Http\Controllers\User\MoMoPaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/thanh-toan-momo', [MoMoPaymentController::class, 'MomoPayment'])->name('momo');
Route::get('/return-thanh-toan-momo', [MoMoPaymentController::class, 'PageReturnMomo'])->name('returnMomo');

Route::get('/init-nap-tien-momo', [MoMoPaymentController::class, 'InitMomoPayNapTien'])->name('InitMomoPayNapTien');
Route::get('/return-nap-tien-momo', [MoMoPaymentController::class, 'ReturnNapTienMomo'])->name('ReturnNapTienMomo');
