<?php

namespace App\Http\Controllers;

use App\Models\takbenda;
use Illuminate\Http\Request;

class landing_opkController extends Controller
{
    public function index(Request $request)
    {
        $query = takbenda::query();
    
        if ($request->has('search')) {
            $query->where('judul_opk', 'like', '%' . $request->search . '%');
        }
    
        $takbenda = $query->paginate(10);
    
        return view('pages.landing.create_opk', compact('takbenda'));
    }
}