<?php

use App\Http\Controllers\AstikController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdController;
use App\Http\Controllers\KipController;
use App\Http\Controllers\LayananController;
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

Route::get('/', [HomeController::class, 'home']);
Route::get('/layanan-astik/form', [AstikController::class, 'layanan_astik_form']);
Route::get('/layanan-astik/form-optimalisasi', [AstikController::class, 'layanan_astik_form_optimalisasi']);
Route::post('/layanan-astik/form/submit', [AstikController::class, 'layanan_astik_form_submit']);
Route::get('/layanan-astik/resi/{kode_layanan}', [AstikController::class, 'layanan_astik_resi']);
Route::get('/layanan-astik/security-awareness', [AstikController::class, 'layanan_astik_secaw']);
Route::get('/layanan-astik/statistik', [AstikController::class, 'layanan_astik_statistik']);

Route::get('/layanan-kip/form', [KipController::class, 'layanan_kip_form']);
Route::post('/layanan-kip/form/submit', [KipController::class, 'layanan_kip_form_submit']);
Route::get('/layanan-kip/resi/{kode_layanan}', [KipController::class, 'layanan_kip_resi']);

Route::get('/layanan-id/form', [IdController::class, 'layanan_id_form']);
Route::post('/layanan-id/form/submit', [IdController::class, 'layanan_id_form_submit']);
Route::get('/layanan-id/resi/{kode_layanan}', [IdController::class, 'layanan_id_resi']);

Route::get('/layanan/cek-status', [LayananController::class, 'cek_status_view']);
Route::get('/layanan/detail-status', [LayananController::class, 'cek_status_detail']);
