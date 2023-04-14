<?php

use App\Http\Controllers\Admin\CumRapController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    //Route For Cum Rap
    Route::get('/them-moi-cum-rap', [CumRapController::class, 'AddNewCumRap'])->name('admin.addcumrap');
    Route::get('/cap-nhat-cum-rap/{maRap}', [CumRapController::class, 'EditCumRap'])->name('admin.editcumrap');
    Route::get('/danh-sach-cum-rap', [CumRapController::class, 'ListCumRap'])->name('admin.listcumrap');
    Route::get('/get-list-cum-rap', [CumRapController::class, 'ListCumRapToTable'])->name('admin.listcumraptable');
    Route::post('/validate-cum-rap', [CumRapController::class, 'ValidationCumRap'])->name('admin.cumrapvalidate');
    Route::post('/save-cum-rap', [CumRapController::class, 'SaveDataCumRap'])->name('admin.savecumrap');
    Route::post('/update-cum-rap/{maRap}', [CumRapController::class, 'UpdateDataCumRap'])->name('admin.updatecumrap');
    Route::delete('/delete-cum-rap/{maCum}', [CumRapController::class, 'DeleteCumRap'])->name('admin.deletecumrap');
});
