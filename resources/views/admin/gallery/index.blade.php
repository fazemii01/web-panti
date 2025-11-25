@extends('partials.admin')
@section('title', 'Gallery')
@section('main')
<div class="container">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Konten Gallery</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="row mb-3">
        <div class="col-sm-6">
            <a href="{{ route('gallery.create') }}" class="btn btn-primary">Tambah Foto</a>
        </div>
        <div class="col-sm-6">
            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end">
                <form action="{{ route('gallery.index') }}" method="GET" class="input-group input-group-sm" style="max-width: 300px;">
                    <input type="text" name="search" class="form-control border-primary" placeholder="Cari Judul..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="ph ph-magnifying-glass"></i> Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    
    

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galleries as $key => $gallery)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $gallery->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" width="100">
                                </td>
                                <td style="width: 120px;">
                                    <div class="d-flex gap-1">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning btn-sm">
                                            <i class="ph ph-pencil-simple"></i>
                                        </a>
                                
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
