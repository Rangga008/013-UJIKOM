<?php

namespace App\Http\Controllers;

use App\Models\SiswaUjikom;
use Illuminate\Http\Request;

class SiswaUjikomController extends Controller
{
    public function index()
    {
        $siswa = SiswaUjikom::paginate(10);

        // Hitung rangkuman gender untuk dashboard
        $genderSummary = SiswaUjikom::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('count', 'jenis_kelamin');

        // Hitung rangkuman kelas untuk dashboard
        $kelasSummary = SiswaUjikom::selectRaw('kelas, COUNT(*) as count')
            ->groupBy('kelas')
            ->get()
            ->pluck('count', 'kelas');

        return view('siswa.index', compact('siswa', 'genderSummary', 'kelasSummary'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa_ujikom',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload untuk foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/foto_siswa'), $namaFoto);
            $data['foto'] = 'uploads/foto_siswa/' . $namaFoto;
        }

        SiswaUjikom::create($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(SiswaUjikom $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    public function edit(SiswaUjikom $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, SiswaUjikom $siswa)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa_ujikom,nis,' . $siswa->id,
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'required|string|max:10',
            'alamat' => 'required|string',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        // Handle file upload untuk foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto && file_exists(public_path($siswa->foto))) {
                unlink(public_path($siswa->foto));
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('uploads/foto_siswa'), $namaFoto);
            $data['foto'] = 'uploads/foto_siswa/' . $namaFoto;
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(SiswaUjikom $siswa)
    {
        // Hapus foto jika ada
        if ($siswa->foto && file_exists(public_path($siswa->foto))) {
            unlink(public_path($siswa->foto));
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function rangkuman()
    {
        // Hitung rangkuman gender untuk dashboard
        $genderSummary = SiswaUjikom::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('count', 'jenis_kelamin');

        // Hitung rangkuman kelas untuk dashboard
        $kelasSummary = SiswaUjikom::selectRaw('kelas, COUNT(*) as count')
            ->groupBy('kelas')
            ->get()
            ->pluck('count', 'kelas');

        return view('rangkuman', compact('genderSummary', 'kelasSummary'));
    }

    public function welcome()
    {
        // Hitung rangkuman gender untuk dashboard
        $genderSummary = SiswaUjikom::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->get()
            ->pluck('count', 'jenis_kelamin');

        // Hitung rangkuman kelas untuk dashboard
        $kelasSummary = SiswaUjikom::selectRaw('kelas, COUNT(*) as count')
            ->groupBy('kelas')
            ->get()
            ->pluck('count', 'kelas');

        return view('welcome', compact('genderSummary', 'kelasSummary'));
    }
}