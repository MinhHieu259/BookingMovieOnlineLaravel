<?php

use App\Http\Controllers\Admin\RapController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    //Route For Rap
    Route::get('/them-moi-rap', [RapController::class, 'AddRap'])->name('admin.addrap');
    Route::post('/validate-data-rap', [RapController::class, 'ValidateDataRap'])->name('admin.validateAddRap');
    Route::post('/save-data-rap', [RapController::class, 'SaveDataRap'])->name('admin.savedatarap');
});
