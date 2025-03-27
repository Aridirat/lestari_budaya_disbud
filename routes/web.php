<?php

use App\Http\Controllers\Admin\KegiatanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main');
});

Route::get('/odcb', function () {
    return view('pages.budaya_odcb.index');
});

Route::get('/opk', function () {
    return view('pages.budaya_opk.index');
});

/**
     * Rute untuk manajemen produk.
     */


Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index'); 
Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create'); 
Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store'); 
Route::get('/kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit'); 
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update'); 
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.delete');
