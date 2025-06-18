@extends('layouts.app')

@section('title', 'Laporan Peminjaman/Pengembalian')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Laporan Peminjaman & Pengembalian</h4>
    <div class="mb-3">
        <a href="{{ route('admin.reports.exportPdf') }}" target="_blank" class="btn btn-danger"><i class="bx bx-printer"></i> Cetak PDF</a>
    </div>
    <div class="card">
        <div class="card-header"><strong>Data Peminjam Bulan Ini</strong></div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Peminjam</th>
                        <th>Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($loansThisMonth as $loan)
                    <tr>
                        <td>{{ $loan->user->name ?? '-' }}</td>
                        <td>{{ $loan->tool->name ?? '-' }}</td>
                        <td>{{ $loan->start_date }}</td>
                        <td>{{ $loan->end_date }}</td>
                        <td>{{ ucfirst($loan->status) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5">Tidak ada data peminjaman bulan ini.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
