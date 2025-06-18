@extends('layouts.app')

@section('title', 'Ajukan Peminjaman Alat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Ajukan Peminjaman Alat</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('member.loans.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tool_id" class="form-label">Pilih Alat</label>
                    <select class="form-select" id="tool_id" name="tool_id" required>
                        <option value="">-- Pilih Alat --</option>
                        @foreach($tools as $tool)
                            <option value="{{ $tool->id }}">{{ $tool->name }} (Tersedia: {{ $tool->quantity }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Mulai Pinjam</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Estimasi Tanggal Kembali</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="mb-3">
                    <label for="reason" class="form-label">Alasan Penggunaan (opsional)</label>
                    <textarea class="form-control" id="reason" name="reason" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Peminjaman</button>
            </form>
        </div>
    </div>
</div>
@endsection
