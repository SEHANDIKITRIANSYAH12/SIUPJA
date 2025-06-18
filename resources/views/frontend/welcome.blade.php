<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIUPJA - Sistem Informasi Usaha Pertanian Jasa</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset("assets/img/backgrounds/hero-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            min-height: 80vh;
            display: flex;
            align-items: center;
        }
        .feature-card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <i class="fas fa-tractor text-primary me-2"></i>
                <span class="fw-bold">SIUPJA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="hero-section text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Sistem Informasi Usaha Pertanian Jasa</h1>
                    <p class="lead mb-4">Memudahkan petani dalam mengelola dan meminjam alat pertanian secara digital. Tingkatkan efisiensi pertanian Anda dengan SIUPJA.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Daftar Sekarang</a>
                        <a href="#fitur" class="btn btn-outline-light btn-lg">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('assets/img/illustrations/farmer.png') }}" alt="Farmer" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Utama</h2>
                <p class="text-muted">Solusi digital untuk pertanian modern</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-primary bg-opacity-10 text-primary mx-auto">
                                <i class="bx bx-cube fs-3"></i>
                            </div>
                            <h5 class="card-title">Kelola Alat</h5>
                            <p class="card-text text-muted">Sistem manajemen alat pertanian yang terintegrasi dan mudah digunakan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-success bg-opacity-10 text-success mx-auto">
                                <i class="bx bx-check-circle fs-3"></i>
                            </div>
                            <h5 class="card-title">Peminjaman Digital</h5>
                            <p class="card-text text-muted">Proses peminjaman alat yang cepat dan terverifikasi secara digital.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon bg-info bg-opacity-10 text-info mx-auto">
                                <i class="bx bx-bar-chart fs-3"></i>
                            </div>
                            <h5 class="card-title">Laporan Real-time</h5>
                            <p class="card-text text-muted">Pantau status peminjaman dan pengembalian alat secara real-time.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('assets/img/illustrations/about.png') }}" alt="About" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Tentang SIUPJA</h2>
                    <p class="text-muted mb-4">SIUPJA adalah platform digital yang menghubungkan petani dengan alat pertanian yang mereka butuhkan. Kami berkomitmen untuk meningkatkan efisiensi pertanian melalui teknologi.</p>
                    <div class="d-flex gap-3">
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">1000+</h3>
                            <p class="text-muted mb-0">Pengguna Aktif</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">500+</h3>
                            <p class="text-muted mb-0">Alat Tersedia</p>
                        </div>
                        <div class="text-center">
                            <h3 class="fw-bold text-primary">98%</h3>
                            <p class="text-muted mb-0">Kepuasan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Hubungi Kami</h2>
                <p class="text-muted">Ada pertanyaan? Silakan hubungi kami</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-4 text-center">
                                    <div class="feature-icon bg-primary bg-opacity-10 text-primary mx-auto">
                                        <i class="bx bx-map fs-3"></i>
                                    </div>
                                    <h5 class="mt-3">Alamat</h5>
                                    <p class="text-muted mb-0">Jl. Pertanian No. 123<br>Jakarta, Indonesia</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="feature-icon bg-success bg-opacity-10 text-success mx-auto">
                                        <i class="bx bx-phone fs-3"></i>
                                    </div>
                                    <h5 class="mt-3">Telepon</h5>
                                    <p class="text-muted mb-0">+62 123 4567 890<br>+62 987 6543 210</p>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div class="feature-icon bg-info bg-opacity-10 text-info mx-auto">
                                        <i class="bx bx-envelope fs-3"></i>
                                    </div>
                                    <h5 class="mt-3">Email</h5>
                                    <p class="text-muted mb-0">info@siupja.com<br>support@siupja.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2024 SIUPJA. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="text-white me-3"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
