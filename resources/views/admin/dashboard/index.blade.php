@extends('partials.admin')
@section('title', 'Dashboard')
@section('main')
<div class="pc-content">
    <div class="row g-3">

        <!-- Total Anak Asuh -->
        <div class="col-md-6">
            <a href="{{ route('anak_asuh.index') }}" class="card shadow-lg border-0 rounded-4" style="background: linear-gradient(to right, #3498db, #5dade2); color: #ffffff; min-height: 160px; text-decoration: none;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">Total Anak Asuh</h5>
                        <p class="text-white-50 mb-0">Terdaftar</p>
                    </div>
                    <div class="text-end">
                        <i class="feather icon-users" style="font-size: 40px; opacity: 0.8;"></i>
                        <h2 class="fw-bold mb-0" style="font-size: 2rem;">{{ $totalAnakAsuh }}</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Total Donasi -->
        <div class="col-md-6">
            <a href="{{ route('donasi.index') }}" class="card shadow-lg border-0 rounded-4" style="background: linear-gradient(to right, #1abc9c, #48c9b0); color: #ffffff; min-height: 160px; text-decoration: none;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="fw-semibold mb-1">Total Donasi Masuk</h5>
                        <p class="text-white-50 mb-0">Keseluruhan</p>
                    </div>
                    <div class="text-end">
                        <i class="feather icon-credit-card" style="font-size: 40px; opacity: 0.8;"></i>
                        <h2 class="fw-bold mb-0" style="font-size: 1.8rem;">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Kalender & Dokumentasi Terbaru -->
   <div class="row mt-3 gx-4 gy-4">
    <!-- Kalender -->
        <!-- Kalender -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-white border-0 pb-0">
                    <h5 class="fw-semibold mb-0">📅 Kalender</h5>
                </div>
                <div class="card-body d-flex justify-content-center align-items-center">
                    <div id="calendar" class="custom-calendar-box w-100"></div>
                </div>
            </div>
        </div>
         
        

    <!-- Dokumentasi Terbaru -->
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 rounded-4 h-100">
            <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center pt-3 pb-0 mb-3">
    <h5 class="fw-semibold mb-0">📸 Dokumentasi Terbaru</h5>
    <a href="{{ route('gallery.index') }}" class="btn btn-xs rounded-pill px-3 py-1 text-white" style="background: linear-gradient(135deg, #4e8cff, #1c65d1); font-size: 12px;">
        Lihat Semua
    </a>
</div>

<div class="card-body pt-0">
    <div class="row g-3">
        @forelse ($dokumentasi as $item)
            <div class="col-md-4 col-sm-6">
                <div class="card border-0 shadow-sm rounded-3 h-100 transition hover-shadow overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-100" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h6 class="fw-semibold text-truncate text-capitalize mb-1" title="{{ $item->title }}">
                            {{ Str::limit($item->title, 40) }}
                        </h6>
                        <small class="text-muted">Diunggah {{ $item->created_at->format('d M Y') }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Belum ada dokumentasi.</p>
            </div>
        @endforelse
    </div>
</div>

        </div>
    
    </div>
</div>

</div>

<!-- Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Kalender Styling -->
<style>
    .custom-calendar {
        width: 260px;
        font-size: 14px;
    }
    .flatpickr-calendar {
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .flatpickr-day {
        border-radius: 6px;
        transition: 0.2s ease-in-out;
    }
    .flatpickr-day:hover {
        background-color: #e0f0ff;
        color: #004080;
    }
    .flatpickr-day.today {
        background-color: #0d6efd !important;
        color: #fff !important;
    }
    .flatpickr-day.selected {
        background-color: #5b9cff !important;
        color: white !important;
    }

    .hover-shadow:hover {
        box-shadow: 0 6px 20px rgba(0,0,0,0.15) !important;
    }

    .transition {
        transition: all 0.3s ease;
    }

    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<!-- Init Flatpickr -->
<script>
    flatpickr("#calendar", {
        inline: true,
        defaultDate: "today",
        locale: {
            firstDayOfWeek: 1 // Senin
        }
    });
</script>
@endsection
