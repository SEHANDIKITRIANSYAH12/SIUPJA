@extends('layouts.app')

@section('title', 'Tambah Alat')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Tambah Alat</h4>
        <a href="{{ route('admin.tools.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" min="0" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="tersedia">Tersedia</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="rusak">Rusak</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
