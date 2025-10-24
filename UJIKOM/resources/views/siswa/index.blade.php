<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa UJIKOM - SMK</title>
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
                        <a class="nav-link active" href="{{ route('siswa.index') }}"><i class="fas fa-users me-1"></i>Data Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rangkuman') }}"><i class="fas fa-chart-bar me-1"></i>Rangkuman</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h3 mb-0 text-dark">
                            <i class="fas fa-users me-2 text-primary"></i>Data Siswa
                        </h1>
                        <p class="text-muted mb-0">Kelola data siswa SMK dengan mudah</p>
                    </div>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah Siswa
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Summary Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card border-primary">
                            <div class="card-body text-center">
                                <i class="fas fa-users fa-2x text-primary mb-2"></i>
                                <h4 class="card-title text-primary">{{ $siswa->total() }}</h4>
                                <p class="card-text text-muted">Total Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success">
                            <div class="card-body text-center">
                                <i class="fas fa-venus-mars fa-2x text-success mb-2"></i>
                                <h4 class="card-title text-success">{{ $genderSummary->get('L', 0) + $genderSummary->get('P', 0) }}</h4>
                                <p class="card-text text-muted">Jenis Kelamin</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-info">
                            <div class="card-body text-center">
                                <i class="fas fa-school fa-2x text-info mb-2"></i>
                                <h4 class="card-title text-info">{{ $kelasSummary->count() }}</h4>
                                <p class="card-text text-muted">Kelas Aktif</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tabel Data Siswa -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">
                            <i class="fas fa-table me-2 text-primary"></i>Daftar Siswa
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0">#</th>
                                        <th class="border-0">NIS</th>
                                        <th class="border-0">Nama Lengkap</th>
                                        <th class="border-0">Umur</th>
                                        <th class="border-0 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($siswa as $index => $s)
                                        <tr>
                                            <td>{{ $siswa->firstItem() + $index }}</td>
                                            
                                            <td>
                                                <code class="text-primary">{{ $s->nis }}</code>
                                            </td>
                                            <td>
                                                <strong>{{ $s->nama_siswa }}</strong>
                                                @if($s->no_hp)
                                                    <br><small class="text-muted"><i class="fas fa-phone me-1"></i>{{ $s->no_hp }}</small>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->age }} tahun</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('siswa.show', $s) }}" class="btn btn-sm btn-outline-info" title="Lihat Detail">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('siswa.edit', $s) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $s->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5">
                                                <div class="text-muted">
                                                    <i class="fas fa-inbox fa-3x mb-3"></i>
                                                    <h5>Belum ada data siswa</h5>
                                                    <p class="mb-3">Mulai tambahkan data siswa pertama Anda</p>
                                                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                                                        <i class="fas fa-plus me-2"></i>Tambah Siswa Pertama
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if($siswa->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $siswa->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Modals -->
    @foreach($siswa as $s)
    <div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $s->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel{{ $s->id }}">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus siswa <strong>{{ $s->nama_siswa }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form method="POST" action="{{ route('siswa.destroy', $s) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
