<?php

use App\Http\Controllers\User\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/thong-tin-ve/{maLichSu}', [TicketController::class, 'InformationTicket'])->name('InformationTicket');
Route::get('/gui-mail-ve/{maLichSu}', [TicketController::class, 'SendMailTicket'])->name('SendMailTicket');
