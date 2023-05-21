<?php
/**
 * Created by Nguyễn Minh Hiếu on 20/05/2023.
 * User: Nguyễn Minh Hiếu
 * Date: 20/05/2023
 * Time: 22:51
 */

use App\Http\Controllers\Admin\ThongKeController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('isAdminWeb')->group(function() {
    Route::get('/thong-ke-doanh-thu', [ThongKeController::class, 'ThongKeDoanhThu'])->name('admin.ThongKeDoanhThu');
    Route::get('/get-data-doanh-thu', [ThongKeController::class, 'GetDataDoanhThu'])->name('admin.GetDataDoanhThu');

});
