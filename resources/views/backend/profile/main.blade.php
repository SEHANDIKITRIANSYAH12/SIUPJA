@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Ubah Username</h5></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Username</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header"><h5>Ubah Kata Sandi</h5></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Kata Sandi Lama</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header"><h5>Ubah Foto Profil</h5></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 text-center">
                                <img src="{{ Auth::user()->avatar_url }}" alt="Foto Profil" class="rounded-circle mb-2" width="100" height="100">
                            </div>
                            <div class="mb-3">
                                <input type="file" class="form-control" name="avatar" accept="image/*" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Foto Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
