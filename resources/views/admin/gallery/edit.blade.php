@extends('partials.admin')
@section('title', 'Edit Gambar')
@section('main')
<div class="container">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Edit Gambar</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">
                                <i class="ph ph-arrow-left"></i> Kembali</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Gambar</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-body p-4">
                    <h5 class="card-title text-center mb-4 text-primary">Form Edit Foto</h5>
                    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold text-dark">Judul Foto</label>
                            <input type="text" name="title" id="title" class="form-control border-primary" value="{{ $gallery->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Foto Saat Ini</label>
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $gallery->image) }}" 
                                     alt="{{ $gallery->title }}" 
                                     class="img-thumbnail" 
                                     width="200">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label fw-bold text-dark">Ganti Foto (Opsional)</label>
                            <input type="file" name="image" id="image" class="form-control border-primary">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
                                <i class="ph ph-x"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="ph ph-check"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
