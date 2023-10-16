<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AstikController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KipController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\TicketingController;

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

Route::get('/dashboard', [HomeController::class, 'main']);
Route::get('/', [AuthController::class, 'login_view']);
Route::post('/autentikasi', [AuthController::class, 'login_auth']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/reload-captcha', [AuthController::class, 'reloadCaptcha']);

Route::get('/absensi', [AbsensiController::class, 'main']);
Route::get('/absensi/view/{username}', [AbsensiController::class, 'list']);
Route::get('/absensi/import', [AbsensiController::class, 'import_view']);
Route::post('/absensi/generate', [AbsensiController::class, 'import_action']);
Route::get('/absensi/wfh', [AbsensiController::class, 'wfh_view']);
Route::post('/absensi/generate_wfh', [AbsensiController::class, 'wfh_action']);
Route::get('/absensi/libur', [AbsensiController::class, 'libur_view']);
Route::post('/absensi/generate_libur', [AbsensiController::class, 'libur_action']);
Route::get('/absensi/export/{username}/{filter_bulan}', [AbsensiController::class, 'export']);
Route::get('/absensi/edit_keterangan/{id_absensi}', [AbsensiController::class, 'edit_keterangan']);
Route::post('/absensi/update_keterangan/{id_absensi}', [AbsensiController::class, 'update_keterangan']);
Route::post('/absensi/generate_validasi', [AbsensiController::class, 'validasi_action']);
Route::get('/absensi/unvalidasi', [AbsensiController::class, 'unvalidasi_view']);
Route::post('/absensi/generate_unvalidasi', [AbsensiController::class, 'unvalidasi_action']);
Route::get('/absensi/export_bulanan', [AbsensiController::class, 'export_bulanan_view']);
Route::post('/absensi/generate_export_bulanan', [AbsensiController::class, 'export_bulanan_action']);

Route::get('/profil', [ProfilController::class, 'main']);
Route::get('/profil/view/{username}', [ProfilController::class, 'profil']);
Route::get('/profil/password/{username}', [ProfilController::class, 'password_view']);
Route::post('/profil/password_update/{username}', [ProfilController::class, 'password_update']);

Route::get('/kegiatan', [KegiatanController::class, 'main']);
Route::get('/kegiatan/view/{username}', [KegiatanController::class, 'list']);
Route::get('/kegiatan/tambah', [KegiatanController::class, 'create']);
Route::get('/kegiatan/edit/{username}/{id_kegiatan}', [KegiatanController::class, 'edit']);
Route::post('/kegiatan/simpan', [KegiatanController::class, 'store']);
Route::post('/kegiatan/update/{username}/{id_kegiatan}', [KegiatanController::class, 'update']);
Route::post('/kegiatan/delete/{username}/{id_kegiatan}', [KegiatanController::class, 'delete']);
Route::get('/kegiatan/validasi/{username}', [KegiatanController::class, 'validasi_view']);
Route::post('/kegiatan/generate_validasi/{username}', [KegiatanController::class, 'validasi_action']);
Route::get('/kegiatan/revisi/{username}/{id_kegiatan}', [KegiatanController::class, 'revisi_view']);
Route::post('/kegiatan/generate_revisi/{username}/{id_kegiatan}', [KegiatanController::class, 'revisi_action']);
Route::get('/kegiatan/export/{id_user}/{selected_tahun}-{selected_bulan}/{format}', [KegiatanController::class, 'export']);

Route::get('/ticketing', [TicketingController::class, 'list']);
Route::get('/ticketing/tambah', [TicketingController::class, 'create']);
Route::post('/ticketing/simpan', [TicketingController::class, 'store']);
Route::get('/ticketing/disposisi/{id_layanan}', [TicketingController::class, 'disposisi']);
Route::post('/ticketing/submit_disposisi/{id_layanan}', [TicketingController::class, 'submit_disposisi']);
Route::get('/ticketing/edit/{id_layanan}', [TicketingController::class, 'edit']);
Route::post('/ticketing/update/{id_layanan}', [TicketingController::class, 'update']);
Route::post('/ticketing/delete/{id_layanan}', [TicketingController::class, 'delete']);
Route::post('/ticketing/cancel/{id_layanan}', [TicketingController::class, 'cancel']);
Route::post('/ticketing/process/{id_layanan}', [TicketingController::class, 'process']);
Route::get('/ticketing/report/{id_layanan}', [TicketingController::class, 'report']);
Route::get('/ticketing/edit_report/{id_layanan}', [TicketingController::class, 'edit_report']);
Route::post('/ticketing/submit_report/{id_layanan}', [TicketingController::class, 'submit_report']);
Route::post('/ticketing/update_report/{id_layanan}', [TicketingController::class, 'update_report']);
Route::post('/ticketing/validasi_report/{id_layanan}', [TicketingController::class, 'validasi_report']);
Route::get('/ticketing/export/{id_layanan}', [TicketingController::class, 'export']);

Route::get('/astik', [AstikController::class, 'list']);
Route::get('/astik/disposisi/{id_layanan_astik}', [AstikController::class, 'disposisi']);
Route::post('/astik/submit_disposisi/{id_layanan_astik}', [AstikController::class, 'submit_disposisi']);
Route::post('/astik/process/{id_layanan_astik}', [AstikController::class, 'process']);
Route::post('/astik/cancel/{id_layanan_astik}', [AstikController::class, 'cancel']);
Route::get('/astik/report/{id_layanan_astik}', [AstikController::class, 'report']);
Route::get('/astik/edit_report/{id_layanan_astik}', [AstikController::class, 'edit_report']);
Route::post('/astik/submit_report/{id_layanan_astik}', [AstikController::class, 'submit_report']);
Route::post('/astik/update_report/{id_layanan_astik}', [AstikController::class, 'update_report']);
Route::post('/astik/validasi_report/{id_layanan_astik}', [AstikController::class, 'validasi_report']);
Route::post('/astik/delete/{id_layanan_astik}', [AstikController::class, 'delete']);

Route::get('/kip', [KipController::class, 'list']);

Route::get('/inventaris/barang-pakai-habis', [InventarisController::class, 'barang_list']);
Route::get('/inventaris/get_json_barang/{id_barang}', [InventarisController::class, 'get_json_barang']);
Route::get('/inventaris/barang-aset', [InventarisController::class, 'aset_list']);
Route::get('/inventaris/import', [InventarisController::class, 'import_view']);
Route::post('/inventaris/generate', [InventarisController::class, 'import_action']);

Route::get('/net-ticketing', [TicketingController::class, 'batik']);
Route::get('/net-ticketing/status/{kode_layanan}', [TicketingController::class, 'batik_status']);
// Route::get('/net-ticketing/request', [TicketingController::class, 'request']);
// Route::get('/net-ticketing/request_status/{kode_layanan}', [TicketingController::class, 'status']);
Route::post('/net-ticketing/submit', [TicketingController::class, 'request_submit']);
Route::get('/net-ticketing/resi/{kode_layanan}', [TicketingController::class, 'resi']);

Route::get('/rekrutmen', [RekrutmenController::class, 'main']);
Route::get('/rekrutmen/form', [RekrutmenController::class, 'form']);
Route::get('/rekrutmen/persyaratan/{posisi}', [RekrutmenController::class, 'persyaratan']);
Route::post('/rekrutmen/submit', [RekrutmenController::class, 'submit']);
Route::get('/rekrutmen/status', [RekrutmenController::class, 'status']);
Route::get('/rekrutmen/download/{nik}/{berkas}', [RekrutmenController::class, 'download']);
Route::get('/manage-rekrutmen', [RekrutmenController::class, 'list']);
Route::post('/manage-rekrutmen/lolos/{id_rekrutmen}', [RekrutmenController::class, 'lolos']);
Route::post('/manage-rekrutmen/reset/{id_rekrutmen}', [RekrutmenController::class, 'reset']);

Route::get('/instansi', [InstansiController::class, 'instansi_list']);
Route::get('/instansi/tambah', [InstansiController::class, 'instansi_tambah']);
Route::post('/instansi/simpan', [InstansiController::class, 'instansi_simpan']);
Route::get('/instansi/edit/{id_instansi}', [InstansiController::class, 'instansi_edit']);
Route::post('/instansi/update/{id_instansi}', [InstansiController::class, 'instansi_update']);
Route::post('/instansi/aktif/{id_instansi}', [InstansiController::class, 'instansi_aktif']);
Route::post('/instansi/nonaktif/{id_instansi}', [InstansiController::class, 'instansi_nonaktif']);