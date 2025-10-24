<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Siswa Baru - UJIKOM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/smk2.png') }}" type="image/x-icon">
</head>
<body class="bg-light">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-plus me-2"></i>
                            <div>
                                <h5 class="card-title mb-0">Tambah Siswa Baru</h5>
                                <small class="text-primary-50">Masukkan data siswa yang akan ditambahkan</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nama_siswa" class="form-label">
                                        <i class="fas fa-user me-1"></i>Nama Siswa <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror"
                                           id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
                                    @error('nama_siswa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="nis" class="form-label">
                                        <i class="fas fa-id-card me-1"></i>NIS <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                           id="nis" name="nis" value="{{ old('nis') }}" required>
                                    @error('nis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kelas" class="form-label">
                                        <i class="fas fa-graduation-cap me-1"></i>Kelas <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('kelas') is-invalid @enderror"
                                            id="kelas" name="kelas" required>
                                        <option value="">Pilih Kelas</option>
                                        <option value="X" {{ old('kelas') == 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ old('kelas') == 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ old('kelas') == 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        <i class="fas fa-venus-mars me-1"></i>Jenis Kelamin <span class="text-danger">*</span>
                                    </label>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                       id="laki" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="laki">
                                                    <i class="fas fa-mars text-primary me-1"></i>Laki-laki
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                       id="perempuan" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="perempuan">
                                                    <i class="fas fa-venus text-danger me-1"></i>Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="tempat_lahir" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Tempat Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                           id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="tanggal_lahir" class="form-label">
                                        <i class="fas fa-calendar me-1"></i>Tanggal Lahir <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                           id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <!-- Alamat Lengkap -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kelurahan" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Kelurahan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                                           id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}" required>
                                    @error('kelurahan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="kecamatan" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Kecamatan <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                           id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" required>
                                    @error('kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kabupaten" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Kabupaten/Kota <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                           id="kabupaten" name="kabupaten" value="{{ old('kabupaten') }}" required>
                                    @error('kabupaten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="provinsi" class="form-label">
                                        <i class="fas fa-map-marker-alt me-1"></i>Provinsi <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror"
                                           id="provinsi" name="provinsi" value="{{ old('provinsi') }}" required>
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">
                                    <i class="fas fa-map-marker-alt me-1"></i>Alamat Lengkap <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror"
                                          id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Upload Foto -->
                            <div class="mb-3">
                                <label for="foto" class="form-label">
                                    <i class="fas fa-camera me-1"></i>Foto Siswa
                                </label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                       id="foto" name="foto" accept="image/*">
                                <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB.</div>
                                @error('foto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
