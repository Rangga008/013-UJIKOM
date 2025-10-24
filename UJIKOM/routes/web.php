<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaUjikomController;

Route::get('/', [SiswaUjikomController::class, 'welcome'])->name('welcome');

// Routes untuk CRUD Siswa tanpa autentikasi
Route::get('/siswa', [SiswaUjikomController::class, 'index'])->name('siswa.index');
Route::get('/rangkuman', [SiswaUjikomController::class, 'rangkuman'])->name('rangkuman');
Route::get('/siswa/create', [SiswaUjikomController::class, 'create'])->name('siswa.create');
Route::post('/siswa', [SiswaUjikomController::class, 'store'])->name('siswa.store');
Route::get('/siswa/{siswa}', [SiswaUjikomController::class, 'show'])->name('siswa.show');
Route::get('/siswa/{siswa}/edit', [SiswaUjikomController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{siswa}', [SiswaUjikomController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{siswa}', [SiswaUjikomController::class, 'destroy'])->name('siswa.destroy');