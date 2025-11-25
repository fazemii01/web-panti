@extends('partials.admin')
@section('title', 'Anak Asuh')
@section('main')

<div class="container">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Kepengurusan</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Pengurus</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="row mb-3">
        <div class="col-sm-6">
            <a href="{{ route('managements.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="col-sm-6">
            <!-- Form Pencarian -->
            <div class="d-flex justify-content-end">
                <form action="{{ route('managements.index') }}" method="GET" class="input-group input-group-sm mb-3" style="max-width: 300px;">
                    <input type="text" name="search" class="form-control border-primary" placeholder="Cari Nama..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="ph ph-magnifying-glass"></i> Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th class="text-center" style="width: 140px;">Aksi</th> <!-- Menyesuaikan ukuran kolom -->
            </tr>
        </thead>
        <tbody>
            @foreach($managements as $management)
                <tr>
                    <td>
                        @if($management->photo)
                            <img src="{{ asset('storage/' . $management->photo) }}" alt="{{ $management->name }}" width="100">
                        @else
                            Tidak Ada Foto
                        @endif
                    </td>
                    <td>{{ $management->name }}</td>
                    <td>{{ $management->position }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2"> 
                            <a href="{{ route('managements.edit', $management->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('managements.destroy', $management->id) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
        
</div>
@endsection