@extends('layouts.app')

@section('title', 'Ajukan Pengembalian Alat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Ajukan Pengembalian Alat</h4>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('member.returns.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="loan_id" class="form-label">Pilih Alat yang Dikembalikan</label>
                    <select class="form-select" id="loan_id" name="loan_id" required>
                        <option value="">-- Pilih Alat --</option>
                        @foreach($loans as $loan)
                            <option value="{{ $loan->id }}">{{ $loan->tool->name }} (Pinjam: {{ $loan->start_date }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="condition_note" class="form-label">Catatan Kondisi Alat</label>
                    <textarea class="form-control" id="condition_note" name="condition_note" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Foto Alat (opsional)</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Pengembalian</button>
            </form>
        </div>
    </div>
</div>
@endsection
