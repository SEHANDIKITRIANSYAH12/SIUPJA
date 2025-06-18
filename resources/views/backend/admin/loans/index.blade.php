@extends('layouts.app')

@section('title', 'Verifikasi Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Permohonan Peminjaman Menunggu Verifikasi</h4>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loans as $loan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $loan->user->name }}</td>
                            <td>{{ $loan->tool->name }}</td>
                            <td>{{ $loan->start_date }}</td>
                            <td>{{ $loan->end_date }}</td>
                            <td>
                                @if($loan->status == 'menunggu')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif($loan->status == 'disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($loan->status == 'dipinjam')
                                    <span class="badge bg-primary">Dipinjam</span>
                                @elseif($loan->status == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($loan->status) }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.loans.show', $loan) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Tidak ada permohonan peminjaman menunggu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
