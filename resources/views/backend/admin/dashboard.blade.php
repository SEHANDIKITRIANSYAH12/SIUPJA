@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y px-4">
    {{-- Welcome Card --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white shadow-sm border-0">
                <div class="card-body d-flex align-items-center">
                    <div>
                        <h4 class="mb-1 text-white">Selamat datang, Administrator! 🎉</h4>
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
                    <h3 class="fw-bold text-success mb-0">{{ $jumlahTersedia }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-primary bg-opacity-10 mb-2">
                        <i class="bx bx-transfer fs-2 text-primary"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Alat Dipinjam</h6>
                    <h3 class="fw-bold text-primary mb-0">{{ $jumlahDipinjam }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-danger bg-opacity-10 mb-2">
                        <i class="bx bx-error fs-2 text-danger"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Alat Rusak</h6>
                    <h3 class="fw-bold text-danger mb-0">{{ $jumlahRusak }}</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <span class="avatar avatar-md rounded-circle bg-info bg-opacity-10 mb-2">
                        <i class="bx bx-time fs-2 text-info"></i>
                    </span>
                    <h6 class="mb-1 text-muted">Pengajuan Menunggu</h6>
                    <h3 class="fw-bold text-info mb-0">{{ $pengajuanMenunggu }}</h3>
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
                    <h5 class="mb-3">Status Pengembalian</h5>
                    <canvas id="returnChart" height="180"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk grafik peminjaman
    const loanCtx = document.getElementById('loanChart').getContext('2d');
    new Chart(loanCtx, {
        type: 'line',
        data: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: [12, 19, 15, 25],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
                fill: false
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });

    // Data untuk grafik pengembalian
    const returnCtx = document.getElementById('returnChart').getContext('2d');
    new Chart(returnCtx, {
        type: 'doughnut',
        data: {
            labels: ['Menunggu', 'Disetujui', 'Ditolak'],
            datasets: [{
                data: [{{ $pengembalianMenunggu }}, 15, 5],
                backgroundColor: [
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 99, 132)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endpush
@endsection
