<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'UJIKOM') }} - Sistem Manajemen Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/smk2.png') }}" type="image/x-icon">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .feature-card {
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('welcome') }}">
                <img src="{{ asset('assets/img/smk2.png') }}" alt="Logo SMK" class="me-2" style="height: 40px;">
                <span>{{ config('app.name', 'UJIKOM') }}</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('welcome') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users me-1"></i>Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rangkuman') }}"><i class="fas fa-chart-bar me-1"></i>Rangkuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('assets/img/smk2.png') }}" alt="SMK Logo" class="img-fluid" style="max-height: 200px;">
                </div>
                <div class="col-lg-8">
                    <div class="text-center text-lg-start">
                        <h1 class="display-4 fw-bold mb-3">SMKN 2 Bandung</h1>
                        <h2 class="h3 text-white-50 mb-4">Rangga Aditya</h2>    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-6 fw-bold text-primary">Fitur Utama</h2>
                    <p class="lead text-muted">Temukan berbagai fitur yang memudahkan pengelolaan data siswa</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="{{ route('siswa.index') }}" class="text-decoration-none">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-users fa-2x"></i>
                                </div>
                                <h5 class="card-title fw-bold">Manajemen Data Siswa</h5>
                                <p class="card-text text-muted">
                                    Kelola data lengkap siswa termasuk informasi pribadi, akademik, dan kontak dengan mudah.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('rangkuman') }}" class="text-decoration-none">
                        <div class="card feature-card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                    <i class="fas fa-chart-bar fa-2x"></i>
                                </div>
                                <h5 class="card-title fw-bold">Laporan & Statistik</h5>
                                <p class="card-text text-muted">
                                    Dapatkan ringkasan data siswa berdasarkan kelas, jenis kelamin, dan kriteria lainnya.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-6 fw-bold text-primary">Statistik Sekolah</h2>
                    <p class="lead text-muted">Data terkini siswa SMK</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-primary text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x text-primary mb-3"></i>
                            <h3 class="card-title text-primary">{{ $genderSummary->sum() ?? 0 }}</h3>
                            <p class="card-text">Total Siswa Terdaftar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-success text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-graduation-cap fa-3x text-success mb-3"></i>
                            <h3 class="card-title text-success">{{ $kelasSummary->count() ?? 0 }}</h3>
                            <p class="card-text">Jumlah Kelas Aktif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-info text-center h-100">
                        <div class="card-body">
                            <i class="fas fa-school fa-3x text-info mb-3"></i>
                            <h3 class="card-title text-info">SMK</h3>
                            <p class="card-text">Sekolah Menengah Kejuruan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('assets/img/smk2.png') }}" alt="Logo SMK" class="me-3" style="height: 40px;">
                        <div>
                            <h5 class="mb-0">{{ config('app.name', 'UJIKOM') }}</h5>
                            <small class="text-muted">Sistem Manajemen Data Siswa</small>
                        </div>
                    </div>
                    <p class="mb-0">Platform modern untuk mengelola data siswa SMK dengan fitur lengkap dan antarmuka yang user-friendly.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('siswa.index') }}" class="text-white text-decoration-none"><i class="fas fa-users me-2"></i>Data Siswa</a></li>
                        <li><a href="{{ route('siswa.create') }}" class="text-white text-decoration-none"><i class="fas fa-user-plus me-2"></i>Tambah Siswa</a></li>
                        <li><a href="https://laravel.com" target="_blank" class="text-white text-decoration-none"><i class="fas fa-external-link-alt me-2"></i>Laravel Docs</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <small class="text-muted">&copy; {{ date('Y') }} {{ config('app.name', 'UJIKOM') }}. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
