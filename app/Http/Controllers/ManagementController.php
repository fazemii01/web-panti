<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use Illuminate\Support\Facades\Storage;

class ManagementController extends Controller
{
    public function showPublic()
{
    $managements = Management::all();
    return view('front.kepengurusan', compact('managements'));
}

    public function index(Request $request)
    {
    $query = Management::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'LIKE', "%$search%");
        }

    $managements = $query->get();

    return view('admin.managements.index', compact('managements'));
    }

    public function create()
    {
        return view('admin.managements.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'position' => 'required',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    // Simpan foto jika diunggah
    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('management_photos', 'public');
    }

    // Simpan data ke database
    Management::create([
        'name' => $request->name,
        'position' => $request->position,
        'photo' => $photoPath,
    ]);

    return redirect()->route('managements.index')->with('success', 'Data kepengurusan berhasil ditambahkan.');
}


    public function edit(Management $management)
    {
        return view('admin.managements.edit', compact('management'));
    }

    public function update(Request $request, Management $management)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $photoPath = $management->photo;
        if ($request->hasFile('photo')) {
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('management_photos', 'public');
        }

        $management->update([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $photoPath,
        ]);

        return redirect()->route('managements.index')->with('success', 'Data kepengurusan berhasil diperbarui.');
    }

    public function destroy(Management $management)
    {
        if ($management->photo) {
            Storage::disk('public')->delete($management->photo);
        }

        $management->delete();

        return redirect()->route('managements.index')->with('success', 'Data kepengurusan berhasil dihapus.');
    }
}

