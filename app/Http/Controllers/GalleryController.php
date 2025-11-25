<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Gallery;

class GalleryController extends Controller
{
    // Menampilkan galeri ke publik
    public function showPublic()
    {
    $galleries = Gallery::latest()->get();
    return view('front.galeri', compact('galleries'));
    }
    // Menampilkan semua gambar
    public function index(Request $request)
    {
    // Ambil input pencarian
    $search = $request->input('search');

    // Filter data berdasarkan judul jika ada pencarian
    $galleries = Gallery::when($search, function ($query) use ($search) {
        return $query->where('title', 'like', "%{$search}%");
    })->get();

    return view('admin.gallery.index', compact('galleries'));
    }

    // Form upload gambar
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Simpan gambar ke database
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

    $imagePath = $request->file('image')->store('gallery', 'public');

    Gallery::create([
        'title' => $request->title,
        'image' => $imagePath
        ]);

    return redirect()->route('gallery.index')->with('success', 'Gambar berhasil ditambahkan!');
    }

    // Hapus gambar
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        \Storage::delete('public/' . $gallery->image);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gambar berhasil dihapus!');
    }
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
{
    $gallery = Gallery::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $gallery->title = $request->title;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension(); // Buat nama unik
        $image->storeAs('public/gallery', $imageName); // Simpan ke storage/public/gallery
        $gallery->image = 'gallery/' . $imageName; // Simpan path di database
    }
    

    $gallery->save();

    return redirect()->route('gallery.index')->with('success', 'Gambar berhasil diperbarui.');
}

}