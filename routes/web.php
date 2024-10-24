<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VidioController;
use App\Models\Pesan;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/beranda');
// Beranda Halaman Route
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
// Profiel Halaman
Route::get('/profile/visi', [ProfileController::class, 'visi'])->name('profile.visi');
Route::get('/profile/sambutan', [ProfileController::class, 'sambutan'])->name('profile.sambutan');
Route::get('/profile/staff', [StaffController::class, 'staff'])->name('staff');
// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
// Ekskull halaman
Route::get('/ekskul/{id}', [EkskulController::class, 'show'])->name('ekskul.show');
// jurusan
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])->name('jurusan.show');
// agenda
Route::get('/informasi/agenda', [AgendaController::class, 'index'])->name('agenda');
// Alumni
Route::get('/informasi/alumni', [AlumniController::class, 'index'])->name('alumni');
// Download
Route::get('/informasi/download', [MediaController::class, 'download'])->name('download');
// Infografis
Route::get('/informasi/infografis', [InfografisController::class, 'index'])->name('infografis');
// Pengumuman
Route::get('/informasi/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
// Prestasi
Route::get('/informasi/prestasi', [PenghargaanController::class, 'index'])->name('prestasi');
// Route::get('/prestasi/{id}', [PenghargaanController::class, 'show'])->name('prestasi.show');
// Foto
Route::get('/galeri/foto', [MediaController::class, 'foto'])->name('foto');
// Video
Route::get('/galeri/video', [VidioController::class, 'index'])->name('video');
// Alur PPDB
Route::get('/ppdb/alur', [PpdbController::class, 'alur'])->name('alur');
Route::get('/ppdb/alur/{id}', [PpdbController::class, 'alurShow'])->name('alur.show');
// Brosur PPDB
Route::get('/ppdb/brosur', [PpdbController::class, 'brosur'])->name('brosur');
Route::get('/ppdb/brosur/{id}', [PpdbController::class, 'brosurShow'])->name('brosur.show');
// Kuota PPDB
Route::get('/ppdb/kuota', [PpdbController::class, 'kuota'])->name('kuota');
Route::get('/ppdb/kuota/{id}', [PpdbController::class, 'kuotaShow'])->name('kuota.show');
// Pesan
Route::get('/Hubungi-Kami', [PesanController::class, 'index'])->name('pesan');
Route::post('/Hubungi-Kami', [PesanController::class, 'store'])->name('pesan.store');