@extends('layouts.app')

@section('title', 'Riwayat Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Riwayat Peminjaman Alat</h4>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Estimasi Kembali</th>
                        <th>Status Pengajuan</th>
                        <th>Status Pengembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loans as $loan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $loan->tool->name ?? '-' }}</td>
                            <td>{{ $loan->start_date }}</td>
                            <td>{{ $loan->end_date }}</td>
                            <td>
                                @if($loan->status == 'menunggu')
                                    <span class="badge bg-warning">Menunggu</span>
                                @elseif($loan->status == 'disetujui' || $loan->status == 'dipinjam')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($loan->status == 'ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($loan->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @php
                                    $return = $loan->return;
                                @endphp
                                @if($return)
                                    @if($return->status == 'menunggu')
                                        <span class="badge bg-warning">Menunggu Verifikasi</span>
                                    @elseif($return->status == 'disetujui')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($return->status == 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                @if(in_array($loan->status, ['disetujui', 'dipinjam']))
                                    <a href="{{ route('member.loans.downloadPdf', $loan) }}" class="btn btn-sm btn-primary" target="_blank">Download Bukti Sewa</a>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center">Belum ada riwayat peminjaman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
