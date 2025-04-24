<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\KegiatanController;
use App\Http\Controllers\landing_odcbController;
use App\Http\Controllers\landing_opkController;
use App\Http\Controllers\landingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\OdcbController;
use App\Http\Controllers\Admin\OpkController;
use App\Http\Middleware\IsLogin;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login',[AuthController::class, 'loginView']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout']);

Route::get('/', [landingController::class, 'index'])->name('landing.index'); 
Route::get('/berita', [landingController::class, 'berita'])->name('landing.berita'); 

Route::get('/kebudayaan', [landingController::class, 'kebudayaan'])->name('landing.kebudayaan');
Route::get('/create_odcb', [landing_odcbController::class, 'index'])->name('landing.create_odcb');
Route::post('/create_odcb',[landing_odcbController::class, 'store'])->name('landing.create_odcb.store'); 

Route::get('/create_opk', [landing_opkController::class, 'index'])->name('landing.create_opk');
Route::post('/create_opk',[landing_opkController::class, 'store'])->name('landing.create_opk.store'); 

Route::middleware(IsLogin::class)->group(function(){

    Route::get('/dashboard',[DashboardController::class, 'index']);
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route ODCB
Route::get('/odcb', [OdcbController::class, 'index'])->name('odcb.index'); 
Route::get('/odcb/create', [OdcbController::class, 'create'])->name('odcb.create'); 
Route::post('/odcb', [OdcbController::class, 'store'])->name('odcb.store'); // Simpan data
Route::get('/odcb/{id}/edit', [OdcbController::class, 'edit'])->name('odcb.edit'); // Form edit
Route::put('/odcb/{id}', [OdcbController::class, 'update'])->name('odcb.update'); // Update data
Route::delete('/odcb/{id}', [OdcbController::class, 'destroy'])->name('odcb.destroy'); //delete data
// End Route ODCB


// Route OPK
Route::get('/opk', [OpkController::class, 'index'])->name('opk.index'); 
Route::get('/opk/create', [OpkController::class, 'create'])->name('opk.create'); 
Route::post('/opk', [OpkController::class, 'store'])->name('opk.store'); // Simpan data
Route::get('/opk/{id}/edit', [OpkController::class, 'edit'])->name('opk.edit'); // Form edit
Route::put('/opk/{id}', [OpkController::class, 'update'])->name('opk.update'); // Update data
Route::delete('/opk/{id}', [OpkController::class, 'destroy'])->name('opk.destroy'); //delete data
// End Route OPK


// Route Kegiatan
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index'); 
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); 
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store'); // Simpan data
Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit'); // Form edit
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update'); // Update data
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.delete'); //delete data
// End Route Kegiatan

});