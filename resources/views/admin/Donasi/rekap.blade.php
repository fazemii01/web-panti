@extends('partials.admin')
@section('title', 'Rekap Donasi Bulanan')
@section('main')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Rekap Donasi Bulanan</h3>
        <a href="{{ route('donasi.index') }}" class="btn btn-outline-primary">
            <i class="ph ph-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- Chart --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body" style="height: 300px;">
            <canvas id="donasiChart"></canvas>
        </div>
    </div>

    {{-- Tabel Rekap --}}
    <div class="card shadow-sm">
        <div class="card-body p-3">
            <table class="table table-hover table-bordered align-middle mb-0">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 40%;">Bulan</th>
                        <th style="width: 60%;">Total Donasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rekapBulanan as $index => $rekap)
                        <tr>
                            <td class="text-center">
                                <button class="btn btn-link fw-semibold" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $index }}">
                                    {{ \Carbon\Carbon::parse($rekap->bulan . '-01')->translatedFormat('F Y') }}
                                </button>
                            </td>
                            <td class="text-end fw-bold">
                                Rp{{ number_format($rekap->total, 0, ',', '.') }}
                            </td>
                        </tr>

                        {{-- Modal Detail Donatur --}}
                        <div class="modal fade" id="modalDetail{{ $index }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $index }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDetailLabel{{ $index }}">
                                            Daftar Donatur - {{ \Carbon\Carbon::parse($rekap->bulan . '-01')->translatedFormat('F Y') }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if (count($rekap->donatur))
                                            <ul class="list-group">
                                                @foreach ($rekap->donatur as $donatur)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>{{ $donatur->nama }}</span>
                                                        <span class="fw-bold">Rp{{ number_format($donatur->jumlah, 0, ',', '.') }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted fst-italic mb-0">Belum ada data donatur untuk bulan ini.</p>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted fst-italic">Belum ada data rekap.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Bootstrap Bundle (jika belum dimuat) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('donasiChart').getContext('2d');

    const labels = @json($rekapBulanan->map(fn($r) => \Carbon\Carbon::parse($r->bulan . '-01')->translatedFormat('M Y')));
    const data = @json($rekapBulanan->map(fn($r) => (int)$r->total));

    if (labels.length && data.length) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Donasi (Rp)',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                    maxBarThickness: 50,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return 'Rp' + context.formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection