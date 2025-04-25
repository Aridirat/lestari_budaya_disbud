<?php

namespace App\Http\Controllers;

use App\Models\benda;
use App\Models\Kegiatan;
use App\Models\takbenda;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(Request $request)
    {
        $benda = benda::orderBy('created_at', 'desc')->get();
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        $takbenda = takbenda::orderBy('created_at', 'desc')->get();
        
        return view('pages.landing.index', compact('benda', 'kegiatans', 'takbenda'));
    }

    public function kebudayaan(Request $request)
    {
        $benda = benda::orderBy('created_at', 'desc')->get();
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        $takbenda = takbenda::orderBy('created_at', 'desc')->get();
        
        return view('pages.landing.kebudayaan', compact('benda', 'kegiatans', 'takbenda'));
    }

    public function berita(Request $request)
    {
        $benda = benda::orderBy('created_at', 'desc')->get();
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        $takbenda = takbenda::orderBy('created_at', 'desc')->get();
        
        return view('pages.landing.berita', compact('benda', 'kegiatans', 'takbenda'));
    }

    public function detailBerita(Request $request, $id)
    {
        $kegiatans = Kegiatan::findOrFail($id);
        $allKegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('pages.landing.detailBerita', compact( 'kegiatans', 'allKegiatans'));
    }
}