<?php

use App\Http\Controllers\admin\KegiatanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\OdcbController;
use App\Http\Controllers\Admin\OpkController;

Route::get('/', function () {
    return view('layouts.main');
});

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
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy'); //delete data
// End Route Kegiatan