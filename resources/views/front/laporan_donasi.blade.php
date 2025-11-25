@extends('partials.front')
@section('title', 'Laporan Donasi')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Laporan Donasi
        </h1>
        <a href="#main" class="scroll-down-icon" style="position: absolute; bottom: 30px; z-index: 2; text-decoration: none;">
            <i class="fas fa-chevron-down" style="font-size: 2rem; color: white; animation: bounce 2s infinite;"></i>
        </a>
    </div>
</section>

<style>
    @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0); 
    }
    40% {
        transform: translateY(10px); 
    }
    60% {
        transform: translateY(5px); 
    }
}
</style>
<!-- ======= End Banner Section ======= -->

<div class="container py-5">
    <h2 class="mb-4 text-center">Laporan Donasi</h2>

    <div class="table-responsive">
        <!-- Form Pencarian -->
        <form action="{{ route('laporan_donasi') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control form-control-sm border-primary me-2" placeholder="Cari Nama..." value="{{ request('search') }}" style="width: 250px;">
            <button type="submit" class="btn btn-primary btn-sm d-flex align-items-center">
                <i class="ph ph-magnifying-glass me-1"></i> Cari
            </button>
        </form>

        <!-- Tabel Donasi -->
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Tanggal</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donasis as $donasi)
                    <tr class="text-center">
                        <td>{{ $donasi->nama }}</td>
                        <td>Rp{{ number_format($donasi->nominal, 0, ',', '.') }}</td>
                        <td>{{ $donasi->created_at->format('d-m-Y') }}</td>
                        <td>{{ $donasi->keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada donasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $donasis->links() }}
    </div>
</div>

@endsection
