@extends('layouts.app')

@section('title', 'Verifikasi Pengembalian')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Permohonan Pengembalian Menunggu Verifikasi</h4>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Peminjam</th>
                        <th>Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($returns as $return)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $return->loan->user->name }}</td>
                            <td>{{ $return->loan->tool->name }}</td>
                            <td>{{ $return->loan->start_date }}</td>
                            <td>{{ $return->loan->end_date }}</td>
                            <td><span class="badge bg-warning">Menunggu</span></td>
                            <td>
                                <a href="{{ route('admin.returns.show', $return) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Tidak ada permohonan pengembalian menunggu.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
