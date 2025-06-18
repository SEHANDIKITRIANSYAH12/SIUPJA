@extends('layouts.app')

@section('title', 'Detail Pengembalian')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('admin.returns.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card">
        <div class="card-header"><h5>Detail Pengembalian</h5></div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Peminjam</dt>
                        <dd class="col-sm-8">{{ $return->loan->user->name }}</dd>
                        <dt class="col-sm-4">Alat</dt>
                        <dd class="col-sm-8">{{ $return->loan->tool->name }}</dd>
                        <dt class="col-sm-4">Tanggal Pinjam</dt>
                        <dd class="col-sm-8">{{ $return->loan->start_date }}</dd>
                        <dt class="col-sm-4">Tanggal Pengembalian</dt>
                        <dd class="col-sm-8">{{ $return->loan->end_date }}</dd>
                        <dt class="col-sm-4">Catatan Kondisi</dt>
                        <dd class="col-sm-8">{{ $return->condition_note ?? '-' }}</dd>
                    </dl>
                </div>
                <div class="col-md-6 text-center">
                    <label class="form-label">Foto Alat Saat Dikembalikan</label><br>
                    @if($return->photo)
                        <img src="{{ asset('storage/'.$return->photo) }}" alt="Foto Alat" class="img-thumbnail" width="200">
                    @else
                        <span class="text-muted">Tidak ada foto</span>
                    @endif
                </div>
            </div>
            <form action="{{ route('admin.returns.update', $return) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Verifikasi Pengembalian</label>
                    <select name="status" class="form-select" required>
                        <option value="disetujui">Setujui</option>
                        <option value="ditolak">Tolak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alasan Penolakan (jika ditolak)</label>
                    <textarea name="alasan" class="form-control" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Simpan Verifikasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
