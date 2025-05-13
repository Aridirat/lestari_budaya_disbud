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

    public function detailTakbenda(Request $request, $id)
    {
        $takbenda = takbenda::findOrFail($id);
        $takbenda->embedUrl = $this->generateEmbedUrl($takbenda->video);
        $allTakbenda = takbenda::orderBy('created_at', 'desc')->get();
        
        return view('pages.landing.detailOpk', compact('takbenda', 'allTakbenda'));
    }

    public function detailBenda(Request $request, $id)
    {
        $benda = benda::findOrFail($id);
        $benda->embedUrl = $this->generateEmbedUrl($benda->video);
        $allBenda = benda::orderBy('created_at', 'desc')->get();
        
        return view('pages.landing.detailOdcb', compact('benda', 'allBenda'));
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

    // Embed URL generation for YouTube/Gdrive
    private function generateEmbedUrl($url)
    {
        // Untuk youtu.be
        if (str_contains($url, 'youtu.be')) {
            $path = parse_url($url, PHP_URL_PATH);
            $videoId = trim($path, '/');
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        // Untuk youtube.com/watch?v=ID
        if (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            return isset($query['v']) ? 'https://www.youtube.com/embed/' . $query['v'] : $url;
        }

        // Untuk Google Drive
        if (str_contains($url, 'drive.google.com')) {
            if (preg_match('/\/d\/([^\/]+)/', $url, $matches)) {
                return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
            }
            if (preg_match('/id=([^&]+)/', $url, $matches)) {
                return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
            }
        }

        // Default: return original
        return $url;
    }
}