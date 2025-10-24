<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaUjikom extends Model
{
    protected $table = 'siswa_ujikom';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'foto',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}