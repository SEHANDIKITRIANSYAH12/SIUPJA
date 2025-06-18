@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <a href="{{ route('admin.loans.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <div class="card">
        <div class="card-header"><h5>Detail Peminjaman</h5></div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Peminjam</dt>
                        <dd class="col-sm-8">{{ $loan->user->name }}</dd>
                        <dt class="col-sm-4">Alat</dt>
                        <dd class="col-sm-8">{{ $loan->tool->name }}</dd>
                        <dt class="col-sm-4">Tanggal Pinjam</dt>
                        <dd class="col-sm-8">{{ $loan->start_date }}</dd>
                        <dt class="col-sm-4">Tanggal Kembali</dt>
                        <dd class="col-sm-8">{{ $loan->end_date }}</dd>
                        <dt class="col-sm-4">Alasan</dt>
                        <dd class="col-sm-8">{{ $loan->reason ?? '-' }}</dd>
                    </dl>
                </div>
            </div>
            <form action="{{ route('admin.loans.update', $loan) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Verifikasi Peminjaman</label>
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
