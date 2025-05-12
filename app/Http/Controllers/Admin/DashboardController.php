<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\benda;
use App\Models\Kegiatan;
use App\Models\takbenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error-unauthorized', 'Silahkan Login terlebih Dahulu');
        }
        

        $odcbCount = benda::count();
        $opkCount = takbenda::count();
        $kegiatanCount = Kegiatan::count();
    
        $viewType = $request->input('view', 'daily'); // daily, monthly, yearly
        $selectedMonth = $request->input('month', date('m'));
        $selectedYear = $request->input('year', date('Y'));
    
        $labels = [];
        $opkData = [];
        $odcbData = [];
        $kegiatanData = [];
    
        if ($viewType === 'daily') {
            // Per jam hari ini
            $hours = range(0, 23);
            $today = Carbon::today();
    
            foreach ($hours as $hour) {
                $start = $today->copy()->addHours($hour);
                $end = $start->copy()->addHour();
    
                $labels[] = sprintf('%02d:00', $hour);
                $opkData[] = takbenda::whereBetween('created_at', [$start, $end])->count();
                $odcbData[] = benda::whereBetween('created_at', [$start, $end])->count();
                $kegiatanData[] = Kegiatan::whereBetween('created_at', [$start, $end])->count();
            }
    
        } elseif ($viewType === 'monthly') {
            // Per hari dalam bulan tertentu
            $daysInMonth = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->daysInMonth;
    
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $start = Carbon::create($selectedYear, $selectedMonth, $day)->startOfDay();
                $end = $start->copy()->endOfDay();
    
                $labels[] = $day;
                $opkData[] = takbenda::whereBetween('created_at', [$start, $end])->count();
                $odcbData[] = benda::whereBetween('created_at', [$start, $end])->count();
                $kegiatanData[] = Kegiatan::whereBetween('created_at', [$start, $end])->count();
            }
    
        } elseif ($viewType === 'yearly') {
            // Per bulan dalam tahun tertentu
            for ($month = 1; $month <= 12; $month++) {
                $start = Carbon::create($selectedYear, $month, 1)->startOfMonth();
                $end = $start->copy()->endOfMonth();
    
                $labels[] = Carbon::create()->month($month)->format('F');
                $opkData[] = takbenda::whereBetween('created_at', [$start, $end])->count();
                $odcbData[] = benda::whereBetween('created_at', [$start, $end])->count();
                $kegiatanData[] = Kegiatan::whereBetween('created_at', [$start, $end])->count();
            }
        }

        // Di dalam fungsi index
        $kegiatanDates = Kegiatan::select('id', 'judul_kegiatan', 'tanggal_kegiatan')
        ->whereNotNull('tanggal_kegiatan')
        ->get()
        ->map(function ($item) {
            return [
                'title' => $item->judul_kegiatan,
                'start' => $item->tanggal_kegiatan,
                'url' => route('kegiatan.index') . '?tanggal=' . $item->tanggal_kegiatan,
                'color' => 'green',
            ];
        });
    
        return view('pages.dashboard.index', compact(
            'odcbCount', 'opkCount', 'kegiatanCount',
            'labels', 'opkData', 'odcbData', 'kegiatanData',
            'viewType', 'selectedMonth', 'selectedYear',
            'kegiatanDates' // <- Tambahkan ini
        ));
        
    }
}
