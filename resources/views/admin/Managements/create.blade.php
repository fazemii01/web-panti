@extends('partials.admin')
@section('title', 'Tambah Pengurus')
@section('main')

<div class="container">
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Tambah Pengurus</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('managements.index') }}"><i class="ph ph-arrow-left"></i> Kembali</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tambah Pengurus</li>
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
                    <h5 class="card-title text-center mb-4 text-primary">Form Tambah Pengurus</h5>
                    <form action="{{ route('managements.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Nama</label>
                            <input type="text" name="name" id="name" class="form-control border-primary" required>
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label fw-bold text-dark">Jabatan</label>
                            <input type="text" name="position" id="position" class="form-control border-primary" required>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label fw-bold text-dark">Foto</label>
                            <input type="file" name="photo" id="photo" class="form-control border-primary">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('managements.index') }}" class="btn btn-secondary">
                                <i class="ph ph-x"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="ph ph-check"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
