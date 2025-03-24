<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsLogin;

Route::get('/login',[AuthController::class, 'loginView']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/logout',[AuthController::class, 'logout']);

Route::middleware(IsLogin::class)->group(function(){
    Route::get('/',[DashboardController::class, 'index']);

    Route::get('/odcb', function () {
        return view('pages.budaya_odcb.index');
    });
    
    Route::get('/opk', function () {
        return view('pages.budaya_opk.index');
    });
    
    Route::get('/kegiatan', function () {
        return view('pages.kegiatan.index');
    });
});