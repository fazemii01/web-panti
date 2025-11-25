<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnakAsuh;

class AnakAsuhController extends Controller
{
    // app/Http/Controllers/AnakAsuhController.php
    public function showFrontend(Request $request)
        {
            // Ambil data Anak Asuh dengan pencarian dan filter
            $anak_asuh = AnakAsuh::query();

            // Filter berdasarkan mukim atau non-mukim
            if ($request->has('mukim_nonmukim') && $request->mukim_nonmukim != '') {
                $anak_asuh->where('mukim_nonmukim', $request->mukim_nonmukim);
            }

            // Pencarian berdasarkan nama
            if ($request->has('search') && $request->search != '') {
                $anak_asuh->where('nama', 'like', '%' . $request->search . '%');
            }

            $anak_asuh = $anak_asuh->get(); // Ambil data anak asuh

            return view('front.laporan_anak_asuh', compact('anak_asuh'));
        }

    public function index(Request $request)
    {
        $query = AnakAsuh::query();
    
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }
    
        if ($request->has('mukim_nonmukim') && $request->mukim_nonmukim != '') {
            $query->where('mukim_nonmukim', $request->mukim_nonmukim);
        }
    
        $anak_asuh = $query->get();
    
        return view('admin.anak_asuh.index', compact('anak_asuh'));
    }
    

    
    public function create()
    {
        return view('admin.anak_asuh.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'mukim_nonmukim' => 'required|in:mukim,non-mukim', // Tambahkan validasi ini
    ]);

    AnakAsuh::create($request->all());

    return redirect()->route('anak_asuh.index')->with('success', 'Data anak asuh berhasil ditambahkan.');
}

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $anak_asuh = AnakAsuh::findOrFail($id);
        return view('admin.anak_asuh.edit', compact('anak_asuh'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'mukim_nonmukim' => 'required|in:mukim,non-mukim', // Tambahkan validasi ini
        ]);
    
        $anak_asuh = AnakAsuh::findOrFail($id);
        $anak_asuh->update($request->all());
    
        return redirect()->route('anak_asuh.index')->with('success', 'Data anak asuh berhasil diperbarui.');
    }
    
    public function destroy($id)
    {
        $anak_asuh = AnakAsuh::findOrFail($id);
        $anak_asuh->delete();

        return redirect()->route('anak_asuh.index')->with('success', 'Data anak asuh berhasil dihapus.');
    }
}