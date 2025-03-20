<?php

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

Route::get('/kegiatan', function () {
    return view('pages.kegiatan.index');
});