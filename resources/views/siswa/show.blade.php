<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Siswa - UJIKOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/smk2.png') }}" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-eye me-2"></i>
                                <div>
                                    <h5 class="card-title mb-0">Detail Siswa</h5>
                                    <small class="text-info-50">Informasi lengkap siswa</small>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('siswa.index') }}" class="btn btn-light btn-sm me-2">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                                <a href="{{ route('siswa.edit', $siswa) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                @if($siswa->foto)
                                    <img src="{{ asset($siswa->foto) }}" alt="Foto Siswa" class="rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #dee2e6;">
                                @else
                                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 120px; height: 120px;">
                                        @if($siswa->jenis_kelamin == 'L')
                                            <i class="fas fa-user-tie text-primary" style="font-size: 3rem;"></i>
                                        @else
                                            <i class="fas fa-user text-danger" style="font-size: 3rem;"></i>
                                        @endif
                                    </div>
                                @endif
                                <h4 class="mb-1">{{ $siswa->nama_siswa }}</h4>
                                <p class="text-muted mb-0">NIS: {{ $siswa->nis }}</p>
                            </div>

                            <div class="col-md-8">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-graduation-cap text-success me-2"></i>
                                                <small class="text-muted fw-semibold">KELAS</small>
                                            </div>
                                            <span class="badge bg-success fs-6">{{ $siswa->kelas }}</span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-venus-mars text-primary me-2"></i>
                                                <small class="text-muted fw-semibold">JENIS KELAMIN</small>
                                            </div>
                                            @if($siswa->jenis_kelamin == 'L')
                                                <span class="badge bg-primary fs-6">
                                                    <i class="fas fa-mars me-1"></i>Laki-laki
                                                </span>
                                            @else
                                                <span class="badge bg-danger fs-6">
                                                    <i class="fas fa-venus me-1"></i>Perempuan
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-map-marker-alt text-warning me-2"></i>
                                                <small class="text-muted fw-semibold">TEMPAT LAHIR</small>
                                            </div>
                                            <div class="fs-6">{{ $siswa->tempat_lahir }}</div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="border rounded p-3 h-100">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-calendar text-warning me-2"></i>
                                                <small class="text-muted fw-semibold">TANGGAL LAHIR</small>
                                            </div>
                                            <div class="fs-6">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}</div>
                                            <small class="text-muted">({{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->age }} tahun)</small>
                                        </div>
                                    </div>

                                    @if($siswa->email)
                                        <div class="col-12">
                                            <div class="border rounded p-3">
                                                <div class="d-flex align-items-center mb-2">
                                                    <i class="fas fa-envelope text-secondary me-2"></i>
                                                    <small class="text-muted fw-semibold">EMAIL</small>
                                                </div>
                                                <div class="fs-6">{{ $siswa->email }}</div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-12">
                                        <div class="border rounded p-3">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                <small class="text-muted fw-semibold">ALAMAT</small>
                                            </div>
                                            <div class="fs-6">{{ $siswa->alamat }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted">
                                    <i class="fas fa-clock me-1"></i>
                                    Dibuat: {{ $siswa->created_at->format('d/m/Y H:i') }}
                                </small>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <small class="text-muted">
                                    <i class="fas fa-edit me-1"></i>
                                    Diupdate: {{ $siswa->updated_at->format('d/m/Y H:i') }}
                                </small>
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
