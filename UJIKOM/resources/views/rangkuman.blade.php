<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rangkuman Siswa - UJIKOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/smk2.png') }}" type="image/x-icon">
</head>
<body class="bg-light">
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
                        <a class="nav-link" href="{{ route('welcome') }}"><i class="fas fa-home me-1"></i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users me-1"></i>Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('rangkuman') }}"><i class="fas fa-chart-bar me-1"></i>Rangkuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0 text-dark">
                            <i class="fas fa-chart-bar me-2 text-primary"></i>Rangkuman Data Siswa
                        </h1>
                        <p class="text-muted mb-0">Statistik dan ringkasan data siswa SMK</p>
                    </div>
                    <div>
                        <a href="{{ route('welcome') }}" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-home me-1"></i>Kembali ke Beranda
                        </a>
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary">
                            <i class="fas fa-list me-1"></i>Lihat Data Siswa
                        </a>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-primary text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-users fa-3x text-primary mb-3"></i>
                                <h3 class="card-title text-primary">{{ $genderSummary->sum() ?? 0 }}</h3>
                                <p class="card-text">Total Siswa Terdaftar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-success text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-graduation-cap fa-3x text-success mb-3"></i>
                                <h3 class="card-title text-success">{{ $kelasSummary->count() ?? 0 }}</h3>
                                <p class="card-text">Jumlah Kelas Aktif</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-info text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-mars fa-3x text-info mb-3"></i>
                                <h3 class="card-title text-info">{{ $genderSummary->get('L', 0) }}</h3>
                                <p class="card-text">Siswa Laki-laki</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card border-danger text-center h-100">
                            <div class="card-body">
                                <i class="fas fa-venus fa-3x text-danger mb-3"></i>
                                <h3 class="card-title text-danger">{{ $genderSummary->get('P', 0) }}</h3>
                                <p class="card-text">Siswa Perempuan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detailed Summary -->
                <div class="row">
                    <!-- Gender Summary -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-primary text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-venus-mars me-2"></i>Ringkasan Berdasarkan Jenis Kelamin
                                </h6>
                            </div>
                            <div class="card-body">
                                @if($genderSummary->isNotEmpty())
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-mars text-primary me-2 fa-lg"></i>
                                                <span class="fw-semibold">Laki-laki</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-primary fs-6">{{ $genderSummary->get('L', 0) }}</span>
                                                <small class="text-muted d-block">
                                                    {{ $genderSummary->sum() > 0 ? round(($genderSummary->get('L', 0) / $genderSummary->sum()) * 100, 1) : 0 }}%
                                                </small>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 style="width: {{ $genderSummary->sum() > 0 ? ($genderSummary->get('L', 0) / $genderSummary->sum()) * 100 : 0 }}%"
                                                 aria-valuenow="{{ $genderSummary->get('L', 0) }}"
                                                 aria-valuemin="0" aria-valuemax="{{ $genderSummary->sum() }}"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-venus text-danger me-2 fa-lg"></i>
                                                <span class="fw-semibold">Perempuan</span>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-danger fs-6">{{ $genderSummary->get('P', 0) }}</span>
                                                <small class="text-muted d-block">
                                                    {{ $genderSummary->sum() > 0 ? round(($genderSummary->get('P', 0) / $genderSummary->sum()) * 100, 1) : 0 }}%
                                                </small>
                                            </div>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px;">
                                            <div class="progress-bar bg-danger" role="progressbar"
                                                 style="width: {{ $genderSummary->sum() > 0 ? ($genderSummary->get('P', 0) / $genderSummary->sum()) * 100 : 0 }}%"
                                                 aria-valuenow="{{ $genderSummary->get('P', 0) }}"
                                                 aria-valuemin="0" aria-valuemax="{{ $genderSummary->sum() }}"></div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-chart-bar fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada data siswa untuk ditampilkan</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Class Summary -->
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-success text-white">
                                <h6 class="card-title mb-0">
                                    <i class="fas fa-graduation-cap me-2"></i>Ringkasan Berdasarkan Kelas
                                </h6>
                            </div>
                            <div class="card-body">
                                @if($kelasSummary->isNotEmpty())
                                    @foreach($kelasSummary as $kelas => $count)
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-users text-success me-2"></i>
                                                    <span class="fw-semibold">Kelas {{ $kelas }}</span>
                                                </div>
                                                <div class="text-end">
                                                    <span class="badge bg-success fs-6">{{ $count }}</span>
                                                    <small class="text-muted d-block">
                                                        {{ $genderSummary->sum() > 0 ? round(($count / $genderSummary->sum()) * 100, 1) : 0 }}%
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="progress mb-3" style="height: 8px;">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: {{ $genderSummary->sum() > 0 ? ($count / $genderSummary->sum()) * 100 : 0 }}%"
                                                     aria-valuenow="{{ $count }}"
                                                     aria-valuemin="0" aria-valuemax="{{ $genderSummary->sum() }}"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-4">
                                        <i class="fas fa-graduation-cap fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Belum ada data kelas untuk ditampilkan</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
