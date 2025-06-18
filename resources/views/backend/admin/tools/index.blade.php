@extends('layouts.app')

@section('title', 'Kelola Alat & Bahan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Daftar Alat & Bahan</h4>
        <a href="{{ route('admin.tools.create') }}" class="btn btn-primary">Tambah Alat</a>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tools as $tool)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tool->name }}</td>
                            <td>{{ $tool->quantity }}</td>
                            <td>
                                @if($tool->status == 'tersedia')
                                    <span class="badge bg-success">Tersedia</span>
                                @elseif($tool->status == 'rusak')
                                    <span class="badge bg-danger">Rusak</span>
                                @elseif($tool->status == 'dipinjam')
                                    <span class="badge bg-primary">Dipinjam</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($tool->status) }}</span>
                                @endif
                            </td>
                            <td>
                                @if($tool->image)
                                    <img src="{{ asset('storage/'.$tool->image) }}" alt="Gambar" width="60">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $tool->description }}</td>
                            <td>
                                <a href="{{ route('admin.tools.edit', $tool) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus alat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center">Belum ada data alat.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
