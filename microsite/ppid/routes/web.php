<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SurveiController;
use App\Http\Controllers\CovidController;
use App\Http\Controllers\PersController;

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

Route::get('/', [HomeController::class, 'main']);

Route::get('/profil', [ProfilController::class, 'profil']);
Route::get('/profil/visi-misi', [ProfilController::class, 'visimisi']);
Route::get('/profil/struktur-organisasi', [ProfilController::class, 'struktur']);
Route::get('/profil/tugas-dan-fungsi', [ProfilController::class, 'tugasfungsi']);

Route::get('/standar-layanan/maklumat-informasi-publik', [LayananController::class, 'maklumat']);
Route::get('/standar-layanan/sop-ppid', [LayananController::class, 'sop']);
Route::get('/standar-layanan/waktu-dan-biaya-layanan', [LayananController::class, 'waktubiaya']);
Route::get('/standar-layanan/kanal-layanan-informasi', [LayananController::class, 'kanal']);
Route::get('/standar-layanan/kanal-pengaduan-resmi', [LayananController::class, 'kanal_pengaduan']);
Route::get('/standar-layanan/prosedur-permohonan-pelayanan-informasi', [LayananController::class, 'prosedur_permohonan']);
Route::get('/standar-layanan/prosedur-pengajuan-keberatan-informasi', [LayananController::class, 'prosedur_keberatan']);
Route::get('/standar-layanan/prosedur-permohonan-penyelesaian-sengketa-informasi', [LayananController::class, 'prosedur_penyelesaian']);
Route::get('/standar-layanan/prosedur-penanganan-sengketa-informasi', [LayananController::class, 'prosedur_penanganan']);

Route::get('/standar-layanan/form-permohonan-informasi-publik', [LayananController::class, 'formpermohonan']);
Route::get('/standar-layanan/status-permohonan-informasi-publik', [LayananController::class, 'statuspermohonan']);
Route::get('/standar-layanan/cetak-status-permohonan-informasi-publik', [LayananController::class, 'cetak_statuspermohonan']);
Route::post('/standar-layanan/form-permohonan-informasi-publik/submit', [LayananController::class, 'formpermohonan_submit']);

Route::get('/standar-layanan/form-pengajuan-keberatan-informasi-publik', [LayananController::class, 'formkeberatan']);
Route::get('/standar-layanan/status-pengajuan-keberatan-informasi-publik', [LayananController::class, 'statuskeberatan']);
Route::get('/standar-layanan/cetak-status-pengajuan-keberatan-informasi-publik', [LayananController::class, 'cetak_statuskeberatan']);
Route::post('/standar-layanan/form-pengajuan-keberatan-informasi-publik/submit', [LayananController::class, 'formkeberatan_submit']);

Route::get('/daftar-informasi-publik', [InformasiController::class, 'main']);
Route::post('/daftar-informasi-publik/download/{id_dftr}', [InformasiController::class, 'download']);
Route::get('/informasi-berkala', [InformasiController::class, 'informasi_berkala']);
Route::get('/informasi-serta-merta', [InformasiController::class, 'informasi_serta_merta']);
Route::get('/informasi-setiap-saat', [InformasiController::class, 'informasi_setiap_saat']);

Route::get('/laporan/dokumen', [LaporanController::class, 'laporan_dokumen']);
Route::get('/laporan/statistik-layanan-informasi-publik', [LaporanController::class, 'laporan_statistik']);

Route::get('/berita', [BeritaController::class, 'main']);
Route::get('/berita/{id}', [BeritaController::class, 'detail']);

Route::get('/survei', [SurveiController::class, 'formsurvei']);
Route::post('/survei/submit', [SurveiController::class, 'formsurvei_submit']);

// Route::get('/info-covid-19', [CovidController::class, 'main']);

Route::get('/siaran-pers', [PersController::class, 'main']);
Route::get('/siaran-pers/{id}', [PersController::class, 'detail']);
