@extends('layouts.app')

@section('title', 'Dashboard Member')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    {{-- Welcome Card --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <p class="mb-1">Selamat datang, {{ Auth::user()->name }}! 🎉</p>
                        <p class="mb-0">Pantau aktivitas peminjaman dan alat Anda di sini.</p>
                    </div>
                    <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" alt="Welcome" class="ms-auto" style="height:60px;">
                </div>
            </div>
        </div>
    </div>
    {{-- Statistik Ringkasan --}}
    <div class="row g-4 mb-4">
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-success bg-opacity-10 mb-2">
                        <i class="bx bx-cube fs-2 text-success"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Alat Tersedia</h6>
                    <h3 class="fw-bold text-success mb-0">{{ $alatTersedia }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-primary bg-opacity-10 mb-2">
                        <i class="bx bx-cart fs-2 text-primary"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Alat Dipinjam</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $jumlahDipinjam }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-warning bg-opacity-10 mb-2">
                        <i class="bx bx-check-circle fs-2 text-warning"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Status Pengajuan Terakhir</h6>
                    @if($pengajuanTerakhir)
                        @if($pengajuanTerakhir->status == 'menunggu')
                            <span class="badge bg-warning">Menunggu</span>
                        @elseif($pengajuanTerakhir->status == 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($pengajuanTerakhir->status == 'dipinjam')
                            <span class="badge bg-primary">Dipinjam</span>
                        @elseif($pengajuanTerakhir->status == 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">{{ ucfirst($pengajuanTerakhir->status) }}</span>
                        @endif
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-info bg-opacity-10 mb-2">
                        <i class="bx bx-bar-chart-alt-2 fs-2 text-info"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Total Peminjaman</h6>
                    <h3 class="fw-bold text-info mb-0">{{ $data->sum() }}</h3>
                </div>
            </div>
        </div>
    </div>
    {{-- Grafik --}}
    <div class="row g-4 mb-4">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-3">Grafik Peminjaman Alat per Bulan</h5>
                    <canvas id="loansChart" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Status Peminjaman</h5>
                    <canvas id="statusChart" height="180"></canvas>
                </div>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-3">Alat Paling Sering Dipinjam</h5>
                    <canvas id="topToolsChart" height="180"></canvas>
                </div>
            </div>
        </div>
    </div>
    {{-- Riwayat Peminjaman Terbaru --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="mb-3">Riwayat Peminjaman Terbaru</h5>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Alat</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayatTerbaru as $loan)
                                <tr>
                                    <td>{{ $loan->tool->name }}</td>
                                    <td>{{ $loan->start_date }}</td>
                                    <td>
                                        <span class="badge bg-{{ $loan->status == 'disetujui' ? 'success' : ($loan->status == 'menunggu' ? 'warning' : ($loan->status == 'dipinjam' ? 'primary' : 'danger')) }}">
                                            {{ ucfirst($loan->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('loansChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: @json($data),
                borderColor: '#696cff',
                backgroundColor: 'rgba(105,108,255,0.1)',
                fill: true,
                tension: 0.3,
                pointRadius: 5,
                pointBackgroundColor: '#696cff',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    // Pie Chart Status Peminjaman
    new Chart(document.getElementById('statusChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: @json(array_map('ucfirst', array_keys($statusCounts->toArray()))),
            datasets: [{
                data: @json(array_values($statusCounts->toArray())),
                backgroundColor: ['#ffc107', '#28a745', '#0d6efd', '#dc3545', '#6c757d'],
            }]
        },
        options: {
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
    // Bar Chart Alat Paling Sering Dipinjam
    new Chart(document.getElementById('topToolsChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: @json(array_keys($topTools->toArray())),
            datasets: [{
                label: 'Jumlah Pinjam',
                data: @json(array_values($topTools->toArray())),
                backgroundColor: '#696cff',
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: { beginAtZero: true }
            }
        }
    });
</script>
@endpush
