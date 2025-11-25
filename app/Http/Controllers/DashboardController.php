<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakAsuh;
use App\Models\Donasi;
use App\Models\Gallery; // Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnakAsuh = AnakAsuh::count();
        $totalDonasi = Donasi::sum('nominal'); // asumsi 'nominal' adalah field total donasi

        // Ambil 3 dokumentasi terbaru dari gallery
        $dokumentasi = Gallery::latest()->take(3)->get();

        return view('admin.dashboard.index', compact('totalAnakAsuh', 'totalDonasi', 'dokumentasi'));
    }
}
