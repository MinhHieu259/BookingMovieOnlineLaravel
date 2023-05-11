<?php

use App\Http\Controllers\User\CreditPaymentController;
use Illuminate\Support\Facades\Route;

Route::post('/thanh-toan-credit/{maSuatChieu}', [CreditPaymentController::class, 'CreditPayment'])->name('CreditPayment');
