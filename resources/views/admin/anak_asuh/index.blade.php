@extends('partials.admin')
@section('title', 'Data Anak Asuh')
@section('main')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title border-bottom pb-2 mb-2">
                                <h4 class="mb-0">Data Anak Asuh</h4>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="ph ph-house"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Anak Asuh</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('anak_asuh.create') }}" class="btn btn-sm btn-primary">
                                <i class="ph ph-plus"></i> Tambah Anak Asuh
                            </a>
                            <form action="{{ route('anak_asuh.index') }}" method="GET" class="d-flex" role="search">
                                <input type="text" name="q" class="form-control form-control-sm me-2"
                                    placeholder="Cari nama..." value="{{ request('q') }}">
                                <button class="btn btn-sm btn-outline-secondary" type="submit">
                                    <i class="ph ph-magnifying-glass"></i> Cari
                                </button>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle mb-0">
                                <thead class="table-primary text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Mukim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($anak_asuh as $index => $anak)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $anak->nama }}</td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($anak->tanggal_lahir)->format('d-m-Y') }}</td>
                                            <td class="text-center">
                                                {{ $anak->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            </td>
                                            <td class="text-center text-capitalize">{{ $anak->mukim_nonmukim }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('anak_asuh.edit', $anak->id) }}" class="btn btn-sm btn-warning me-1">
                                                    <i class="ph ph-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('anak_asuh.destroy', $anak->id) }}" method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="ph ph-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted fst-italic">Belum ada data anak asuh.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
