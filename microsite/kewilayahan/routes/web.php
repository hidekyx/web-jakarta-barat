<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\DeskripsiController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\InformasiController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\LayananController;
use App\Http\Controllers\Dashboard\PerangkatController;
use App\Http\Controllers\Dashboard\PpidController;
use App\Http\Controllers\Front\BeritaController;
use App\Http\Controllers\Front\FrontpageController;
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
Route::get('/dashboard', [HomeController::class, 'home']);
Route::get('/dashboard/home', [HomeController::class, 'home']);
Route::get('/dashboard/login', [AuthController::class, 'login_view']);
Route::post('/dashboard/autentikasi', [AuthController::class, 'login_auth']);
Route::get('/dashboard/logout', [AuthController::class, 'logout']);
Route::get('/dashboard/reload-captcha', [AuthController::class, 'reload_captcha']);

Route::get('/dashboard/password_view', [AuthController::class, 'password_view']);
Route::post('/dashboard/password_change', [AuthController::class, 'password_change']);

Route::get('/dashboard/deskripsi-website/{subpage}', [DeskripsiController::class, 'deskripsi_view']);
Route::post('/dashboard/deskripsi-website/{subpage}/simpan', [DeskripsiController::class, 'deskripsi_store']);

Route::get('/dashboard/profil/{subpage}', [ProfilController::class, 'profil_view']);
Route::post('/dashboard/profil/{subpage}/simpan', [ProfilController::class, 'profil_store']);

Route::get('/dashboard/perangkat/{subpage}', [PerangkatController::class, 'perangkat_view']);
Route::post('/dashboard/perangkat/{subpage}/simpan', [PerangkatController::class, 'perangkat_store']);

Route::get('/dashboard/ppid/{subpage}', [PpidController::class, 'ppid_view']);
Route::get('/dashboard/ppid/{subpage}/tambah', [PpidController::class, 'ppid_create']);
Route::get('/dashboard/ppid/{subpage}/edit/{id_ppid}', [PpidController::class, 'ppid_edit']);
Route::post('/dashboard/ppid/{subpage}/simpan', [PpidController::class, 'ppid_store']);
Route::post('/dashboard/ppid/{subpage}/delete/{id_ppid}', [PpidController::class, 'ppid_delete']);
Route::get('/dashboard/ppid/{subpage}/edit_informasi/{id_ppid}', [PpidController::class, 'ppid_edit_informasi']);
Route::post('/dashboard/ppid/{subpage}/simpan_informasi', [PpidController::class, 'ppid_store_informasi']);

Route::get('/dashboard/layanan-publik/{subpage}', [LayananController::class, 'layanan_view']);
Route::get('/dashboard/layanan-publik/{subpage}/tambah', [LayananController::class, 'layanan_create']);
Route::post('/dashboard/layanan-publik/{subpage}/simpan', [LayananController::class, 'layanan_store']);
Route::get('/dashboard/layanan-publik/{subpage}/edit/{id_layanan_publik}', [LayananController::class, 'layanan_edit']);
Route::post('/dashboard/layanan-publik/{subpage}/update/{id_layanan_publik}', [LayananController::class, 'layanan_update']);
Route::post('/dashboard/layanan-publik/{subpage}/delete/{id_layanan_publik}', [LayananController::class, 'layanan_delete']);

Route::get('/dashboard/informasi-wilayah/{subpage}', [InformasiController::class, 'informasi_view']);
Route::get('/dashboard/informasi-wilayah/{subpage}/tambah', [InformasiController::class, 'informasi_create']);
Route::post('/dashboard/informasi-wilayah/{subpage}/simpan', [InformasiController::class, 'informasi_store']);
Route::get('/dashboard/informasi-wilayah/{subpage}/edit/{id_informasi}', [InformasiController::class, 'informasi_edit']);
Route::post('/dashboard/informasi-wilayah/{subpage}/update/{id_informasi}', [InformasiController::class, 'informasi_update']);
Route::post('/dashboard/informasi-wilayah/{subpage}/delete/{id_informasi}', [InformasiController::class, 'informasi_delete']);

// Frontpage di bawah agar prioritas routing URL dashboard page didahulukan
Route::get('/{username}/berita', [BeritaController::class, 'berita_list']);

Route::get('/{username}', [FrontpageController::class, 'home']);
Route::get('/{username}/{kategori}', [FrontpageController::class, 'detail']);