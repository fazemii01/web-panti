@extends('partials.admin')
@section('title', 'Data Donasi')
@section('main')

<div class="container">

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block card mb-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title border-bottom pb-2 mb-2">
                            <h4 class="mb-0">Data Donasi</h4>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="ph ph-house"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Donasi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
    <a href="{{ route('rekap.index') }}" class="btn btn-primary d-flex align-items-center">
        <i class="ph ph-chart-bar me-1"></i> Rekap
    </a>

    <form action="{{ route('donasi.index') }}" method="GET" class="d-flex align-items-center gap-2">
        <input type="text" name="search" class="form-control" placeholder="Cari Nama / Email..." style="max-width: 250px;">
        <button type="submit" class="btn btn-primary d-flex align-items-center">
            <i class="ph ph-magnifying-glass me-1"></i> Cari
        </button>
    </form>
</div>


    <!-- Tabel Donasi -->
    <table class="table mt-3 table-bordered table-striped">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nominal</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($donasis as $key => $donasi)
            <tr>
                <td>{{ $donasis->firstItem() + $key }}</td>
                <td>{{ $donasi->nama }}</td>
                <td>Rp{{ number_format($donasi->nominal, 0, ',', '.') }}</td>
                <td>{{ $donasi->alamat }}</td>
                <td>{{ $donasi->no_hp }}</td>
                <td>{{ $donasi->email }}</td>
                <td>{{ $donasi->keterangan ?? '-' }}</td>
                <td class="text-center">
                    @if ($donasi->foto)
                        <!-- Thumbnail kecil -->
                        <img src="{{ asset('storage/' . $donasi->foto) }}"
                             alt="Bukti Donasi"
                             width="60"
                             class="img-thumbnail"
                             style="cursor: pointer;"
                             data-bs-toggle="modal"
                             data-bs-target="#fotoModal{{ $donasi->id }}">
                
                        <!-- Modal -->
                        <div class="modal fade" id="fotoModal{{ $donasi->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $donasi->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fotoModalLabel{{ $donasi->id }}">Bukti Donasi - {{ $donasi->nama }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="{{ asset('storage/' . $donasi->foto) }}"
                                             alt="Bukti Donasi Besar"
                                             class="img-fluid rounded"
                                             style="max-width: 600px; width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <span>-</span>
                    @endif
                </td>
                
                </td>
                <td>{{ $donasi->created_at->format('d-m-Y') }}</td>
                <td class="text-center">
                    <form action="{{ route('donasi.destroy', $donasi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus donasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="ph ph-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="text-center">Belum ada donasi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end mt-3">
        {{ $donasis->links() }}
    </div>
</div>

@endsection
