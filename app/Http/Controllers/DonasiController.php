<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Donasi::query();

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('alamat', 'like', "%$search%");
            });
        }

        $donasis = $query->latest()->paginate(10)->withQueryString();

         return view('admin.donasi.index', compact('donasis'));
    }

    // Simpan data donasi
    public function store(Request $request)
    {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nominal' => 'required|integer|min:1000',
        'alamat' => 'required|string',
        'no_hp' => 'required|string|max:20',
        'email' => 'required|email',
        'keterangan' => 'nullable|string'
    ]);

    // Simpan data ke session dulu
    session(['donasi_data' => $validated]);

    // Arahkan ke form upload bukti
    return redirect()->route('donasi.upload');
    }

    // Tampilkan halaman upload foto
    public function showUploadForm()
{
    $donasi_data = session('donasi_data');

    if (!$donasi_data) {
        return redirect()->route('front.donasi.form')->with('error', 'Silakan isi form donasi terlebih dahulu.');
    }

    return view('front.donasi_upload', compact('donasi_data'));
}

    // Upload foto bukti donasi
    public function uploadFoto(Request $request)
{
    $donasi_data = session('donasi_data');

    if (!$donasi_data) {
        return redirect()->route('front.donasi.form')->with('error', 'Data donasi tidak ditemukan.');
    }

    $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    if ($request->hasFile('foto')) {
        $donasi_data['foto'] = $request->file('foto')->store('donasi/foto', 'public');
    }

    Donasi::create($donasi_data); // Simpan semuanya sekaligus

    session()->forget('donasi_data'); // Hapus dari session

    return redirect()->route('front.donasi.form')->with('success', 'Donasi berhasil disimpan.');
}

    // Tampilkan laporan donasi di front
    public function laporan()
    {
    $donasis = Donasi::orderBy('created_at', 'desc')->paginate(10);
    return view('front.laporan_donasi', compact('donasis'));
    }

    public function destroy(Donasi $donasi)
    {
        // Hapus foto jika ada
        if ($donasi->foto && \Storage::exists($donasi->foto)) {
            \Storage::delete($donasi->foto);
        }

        // Hapus data donasi
        $donasi->delete();

        return redirect()->route('donasi.index')->with('success', 'Data donasi berhasil dihapus.');
    }

}
