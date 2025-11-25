@extends('partials.front')
@section('title', 'Form Donasi')
@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/mccbg.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            From Donasi
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
    <h2 class="mb-4 text-center">Form Donasi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('front.donasi.store') }}" method="POST" id="donasiForm">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nominal" class="form-label">Nominal Donasi</label>
                <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal donasi" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan alamat lengkap" required></textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor telepon" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
            <textarea name="keterangan" class="form-control" rows="2" placeholder="Tulis keterangan (opsional)"></textarea>
        </div>

        <button type="button" class="btn btn-primary w-100 py-3" onclick="konfirmasiDonasi()">Konfirmasi</button>
    </form>
</div>

<script>
function konfirmasiDonasi() {
    if (confirm('Apakah Anda yakin ingin melanjutkan ke halaman konfirmasi dan upload bukti donasi?')) {
        document.getElementById('donasiForm').submit();
    }
}
</script>

@endsection
