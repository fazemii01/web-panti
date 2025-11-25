<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view('admin.blog.index', compact('data'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'penulis' => 'required',
            'tanggal' => 'required',
            'konten' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $data = Blog::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'file' => $request->file,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/blog/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('blog.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Blog::findOrFail($id);
        // Cek apakah file baru diupload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file foto lama jika ada
            if ($data->file) {
                $oldPhotoPath = public_path('images/blog/' . $data->file);
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
        }
        $data->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tanggal' => $request->tanggal,
            'konten' => $request->konten,
            'file' => $request->file,
        ]);
        if ($request->hasFile('file')) {
            $request->file('file')->move('images/blog/', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('blog.index')->with('toast_success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        if ($data->file) {
            $oldPhotoPath = public_path('images/blog/' . $data->file);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }
        $data->delete();
        return redirect()->route('blog.index')->with('toast_success', 'Data Berhasil Dihapus');
    }

    
}