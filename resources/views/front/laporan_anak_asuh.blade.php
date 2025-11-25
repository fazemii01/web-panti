@extends('partials.front')
@section('title', 'Laporan Anak Asuh')
@section('content')

@section('content')

<!-- ======= Banner Section ======= -->
<section class="page-banner" style="position: relative; height: 100vh; background: url('{{ asset('asset/img/bnnr9.png') }}') center center no-repeat; background-size: cover;">
    <div class="overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0, 0, 0, 0.4);"></div>
    <div class="container d-flex align-items-center justify-content-center h-100">
        <h1 class="text-white text-center fw-bold display-3" style="z-index: 2; position: relative; text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
            Anak Asuh
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

<main id="main">

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Data Anak Asuh</p>
            </header>

    <!-- Form Pencarian dan Filter -->
    <div class="row mb-3">
        <div class="col-sm-6 d-flex justify-content-end"> <!-- flex-end untuk menjorokkan ke kanan -->
            <form action="{{ route('laporan.anak_asuh') }}" method="GET" class="d-flex align-items-center w-100"> <!-- w-100 untuk memastikan form penuh -->
                <select name="mukim_nonmukim" class="form-select form-select-sm me-2">
                    <option value="">Semua</option>
                    <option value="mukim" {{ request('mukim_nonmukim') == 'mukim' ? 'selected' : '' }}>Mukim</option>
                    <option value="non-mukim" {{ request('mukim_nonmukim') == 'non-mukim' ? 'selected' : '' }}>Non-Mukim</option>
                </select>
    
    
                <button type="submit" class="btn btn-primary btn-sm px-3 py-1 ms-2 d-flex align-items-center">
                    <i class="ph ph-magnifying-glass me-1"></i> Cari
                </button>
            </form>
        </div>
    </div>
    

    <!-- Tabel Daftar Anak Asuh -->
    <table id="example" class="table table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Status Mukim</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anak_asuh as $key => $anak)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $anak->nama }}</td>
                <td>{{ $anak->tanggal_lahir }}</td>
                <td>{{ $anak->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                <td>{{ ucfirst($anak->mukim_nonmukim) }}</td>
            </tr>
            @endforeach
        </tbody>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();  // Menginisialisasi DataTables pada tabel dengan ID 'example'
            });
        </script>
        
        
    </table>
</div>
</section>
<!-- End Team Section -->
</main>
@endsection
