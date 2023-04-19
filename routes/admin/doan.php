<?php

use App\Http\Controllers\Admin\DoAnController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    //Route For Do An
    Route::get('/them-moi-do-an', [DoAnController::class, 'AddFood'])->name('admin.adddoan');
    Route::get('/cap-nhat-do-an/{maDoAn}', [DoAnController::class, 'EditFood'])->name('admin.editdoan');
    Route::get('/danh-sach-do-an', [DoAnController::class, 'ListFood'])->name('admin.listdoan');
    Route::get('/get-list-do-an', [DoAnController::class, 'ListFoodToTable'])->name('admin.listfoodtotable');
    Route::post('/validate-do-an', [DoAnController::class, 'ValidateDoAn'])->name('admin.doanvalidate');
    Route::post('/save-do-an', [DoAnController::class, 'SaveData'])->name('admin.savedoan');
    Route::post('/update-do-an/{maDoAn}', [DoAnController::class, 'UpdateDoAn'])->name('admin.updatedoan');
    Route::delete('/delete-do-an/{maDoAn}', [DoAnController::class, 'DeleteDoAn'])->name('admin.deletedoan');
});
