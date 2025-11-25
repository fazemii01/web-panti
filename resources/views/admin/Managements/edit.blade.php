@extends('partials.admin')
@section('title', 'Edit Pengurus')
@section('main')
<div class="container">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Edit Pengurus</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('managements.index') }}">
                                <i class="ph ph-arrow-left"></i> Kembali</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Edit Pengurus</li>
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
                    <h5 class="card-title text-center mb-4 text-primary">Form Edit Pengurus</h5>
                    <form action="{{ route('managements.update', $management->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Nama</label>
                            <input type="text" name="name" id="name" class="form-control border-primary" value="{{ $management->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label fw-bold text-dark">Jabatan</label>
                            <input type="text" name="position" id="position" class="form-control border-primary" value="{{ $management->position }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-dark">Foto Saat Ini</label>
                            <div class="mb-2">
                                @if($management->photo)
                                    <img src="{{ asset('storage/' . $management->photo) }}" alt="{{ $management->name }}" class="img-thumbnail" width="150">
                                @else
                                    <p>Tidak Ada Foto</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label fw-bold text-dark">Ganti Foto (Opsional)</label>
                            <input type="file" name="photo" id="photo" class="form-control border-primary">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('managements.index') }}" class="btn btn-secondary">
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
