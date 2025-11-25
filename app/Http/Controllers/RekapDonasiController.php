<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class RekapDonasiController extends Controller
{
    public function index()
        {
            // Ambil data rekap bulanan: bulan & total nominal
            $rekapBulanan = Donasi::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, SUM(nominal) as total")
                ->groupBy('bulan')
                ->orderBy('bulan', 'desc')
                ->get()
                ->map(function ($item) {
                    $donatur = Donasi::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = ?", [$item->bulan])
                        ->select('nama', 'nominal as jumlah')
                        ->orderBy('nama')
                        ->get();

                    return (object)[
                        'bulan' => $item->bulan,
                        'total' => $item->total,
                        'donatur' => $donatur
                    ];
                });

            return view('admin.donasi.rekap', compact('rekapBulanan'));
        }
}
