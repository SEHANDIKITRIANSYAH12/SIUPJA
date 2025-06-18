@extends('layouts.app')

@section('title', 'Edit Alat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Edit Alat</h4>
        <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tools.update', $tool) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $tool->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" value="{{ $tool->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="tersedia" {{ $tool->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="dipinjam" {{ $tool->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="rusak" {{ $tool->status == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    @if($tool->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/'.$tool->image) }}" alt="Gambar" width="80">
                        </div>
                    @endif
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $tool->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
