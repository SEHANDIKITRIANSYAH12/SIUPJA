@extends('layouts.app')

@section('title', 'Daftar Alat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold mb-3">Daftar Alat Pertanian</h4>
    <div class="row">
        @forelse($tools as $tool)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($tool->image)
                        <img src="{{ asset('storage/'.$tool->image) }}" class="card-img-top" alt="Gambar Alat" style="height:180px;object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $tool->name }}</h5>
                        <p class="mb-1"><strong>Kondisi:</strong> <span class="badge bg-{{ $tool->status == 'tersedia' ? 'success' : ($tool->status == 'dipinjam' ? 'warning' : 'danger') }}">{{ ucfirst($tool->status) }}</span></p>
                        <p class="mb-1"><strong>Jumlah Tersedia:</strong> {{ $tool->quantity }}</p>
                        <p class="mb-1"><strong>Deskripsi:</strong> {{ $tool->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">Belum ada data alat.</div>
        @endforelse
    </div>
</div>
@endsection
