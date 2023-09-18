<?php

use Illuminate\Support\Facades\Route;
use App\cobadata;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\KecamatanController;
use App\Http\Controllers\Backend\LayoutsController;
use App\Http\Controllers\Backend\PemerintahanController;
use App\Http\Controllers\Backend\PPIDController as BackendPPIDController;
use App\Http\Controllers\Backend\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BeritafotoController;
use App\Http\Controllers\BeritavideoController;
use App\Http\Controllers\Frontend\AgendaController;
use App\Http\Controllers\Backend\AgendaSetController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Frontend\PpidController;
use App\Http\Controllers\Backend\PPIDSetController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\PublikasiController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TagsController;
use Spatie\Analytics\Period;

use App\Http\Controllers\Frontend\GaleriFotoController;
use App\Http\Controllers\Frontend\StatistikController;
use App\Http\Controllers\KontributorController;

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

Route::get('/welcome2', function () {

    $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
    return view('welcome2', ['analyticsData' => $analyticsData]);
});

Route::get('/', [LandingPageController::class, 'main']);
Route::get('/input-stats', [LandingPageController::class, 'stats']);

Route::get('/sejarah', function () {
    return view('/panels/frontend1/navDetail/profil/sejarah');
});

Route::get('/profil/{namaSubMenu}/{id}/{namaMenu}',[LandingPageController::class, 'content']);


Route::get('/pemerintahan/{namaSubMenu}/{id}/{namaMenu}',[LandingPageController::class, 'content']);

Route::get('/detailberita/{id}', [LandingPageController::class, 'berita']);


Route::get('/kelurahan-info/{id}', [LandingPageController::class, 'kelurahan']);
Route::get('/pejabat/{id}', [LandingPageController::class, 'pejabat']);

Route::get('/berita', [PublikasiController::class, 'berita']);
Route::get('/berita/cetak_pdf', [PublikasiController::class, 'cetak_pdf']);

Route::get('/berita/param={tags}', [PublikasiController::class, 'beritaonsearch']);
Route::get('/berita/tentang={param}', [PublikasiController::class, 'cariberita']);

Route::get('/agenda', [AgendaController::class, 'agenda']);
Route::get('/detailagenda/{id}', [AgendaController::class, 'detail']);

Route::get('/beritafoto', [PublikasiController::class, 'beritafoto']);

Route::get('/beritavideo', [PublikasiController::class, 'beritavideo']);





Route::get('/kependudukan', function () {
    return view('/panels/frontend1/navDetail/profil/kependudukan');
});

Route::get('/infrastruktur', function () {
    return view('/panels/frontend1/navDetail/profil/infrastruktur');
});

Route::get('/geografis', function () {
    return view('/panels/frontend1/navDetail/profil/geografis');
});

Route::get('/peta', function () {
    return view('/panels/frontend1/navDetail/profil/peta');
});

// Route::get('/kecamatan', function () {
//     return view('/panels/frontend1/navDetail/profil/kecamatan');
// });
Route::get('/kecamatancengkareng', function () {
    return view('/panels/frontend1/navDetail/profil/kecamatancengkareng');
});

Route::get('/pendidikan', function () {
    return view('/panels/frontend1/navDetail/profil/pendidikan');
});

Route::get('/kesehatan', function () {
    return view('/panels/frontend1/navDetail/profil/kesehatan');
});

Route::get('/pemadam', function () {
    return view('/panels/frontend1/navDetail/profil/pemadam');
});

Route::get('/transportasi', function () {
    return view('/panels/frontend1/navDetail/profil/transportasi');
});

Route::get('/olahraga', function () {
    return view('/panels/frontend1/navDetail/profil/olahraga');
});

Route::get('/perpustakaan', function () {
    return view('/panels/frontend1/navDetail/profil/perpustakaan');
});

Route::get('/kawasanunggulan', function () {
    return view('/panels/frontend1/navDetail/profil/kawasanunggulan');
});


Route::get('/visimisi', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/visimisi');
});

Route::get('/strukturorganisasi', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/strukturorganisasi');
});

Route::get('/tugasfungsi', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/tugasfungsi');
});

Route::get('/rencanastrategis', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/rencanastrategis');
});

Route::get('/walikotaterdahulu', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/walikotaterdahulu');
});

Route::get('/pejabatteras', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/pejabatteras');
});

Route::get('/pejabateselon', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/pejabateselon');
});

Route::get('/camat', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/camat');
});

Route::get('/lurah', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/lurah');
});

Route::get('/skpd', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/skpd');
});

Route::get('/ukpd', function () {
    return view('/panels/frontend1/navDetail/pemerintahan/ukpd');
});

Route::get('/publikasi', function () {
    return view('/panels/frontend1/navDetail/publikasi');
});

Route::get('/popup', function () {
    return view('/panels/frontend1/popup');
});

Route::get('/patner', function () {
    return view('/panels/frontend1/patner');
});

// baru tambahan afgan
Route::get('header-list', [LayoutsController::class, 'headerlist']);
Route::get('header-edit/{id}', [LayoutsController::class, 'headeredit']);
Route::post('header-update/{id}', [LayoutsController::class, 'headerupdate']);
// Route::post('header-activate/{id}', [LayoutsController::class, 'headeractivate']);
// Route::post('header-deactivate/{id}', [LayoutsController::class, 'headerdeactivate']);

Route::get('galeri-foto-pejabat', [GaleriFotoController::class, 'main']);
Route::get('galeri-foto-pejabat/{jabatan}', [GaleriFotoController::class, 'list']);

// Route::get('/ppids/{ket}', [PpidController::class, 'main']);
// Route::get('/struktur-ppid', [PpidController::class, 'struktur']);
// Route::get('daftar-info-publik/{param}', [PpidController::class, 'publik']);
// Route::post('ppid-download/{id}', [PpidController::class, 'download']);

Route::get('info-publik', [PPIDSetController::class, 'list']);
Route::get('info-publik/add', [PPIDSetController::class, 'add']);
Route::get('info-publik/{id}', [PPIDSetController::class, 'edit']);
Route::post('info-publik/store', [PPIDSetController::class, 'store']);
Route::post('info-publik/update/{id}', [PPIDSetController::class, 'update']);
Route::post('info-publik/delete/{id}', [PPIDSetController::class, 'delete']);

Route::get('layanan-info-publik/permohonan', [PPIDSetController::class, 'permohonan_list']);
Route::get('layanan-info-publik/permohonan/detail/{id}', [PPIDSetController::class, 'permohonan_detail']);
Route::get('layanan-info-publik/permohonan/tinjau/{id}', [PPIDSetController::class, 'permohonan_tinjau']);
Route::get('layanan-info-publik/permohonan/tolak/view/{id}', [PPIDSetController::class, 'permohonan_tolak_view']);
Route::post('layanan-info-publik/permohonan/tolak/simpan/{id}', [PPIDSetController::class, 'permohonan_tolak_action']);
Route::post('layanan-info-publik/permohonan/konfirmasi/{id}', [PPIDSetController::class, 'permohonan_konfirmasi']);
Route::post('layanan-info-publik/permohonan/simpan/', [PPIDSetController::class, 'permohonan_simpan']);

Route::get('layanan-info-publik/pengajuan-keberatan', [PPIDSetController::class, 'keberatan_list']);
Route::get('layanan-info-publik/pengajuan-keberatan/detail/{id}', [PPIDSetController::class, 'keberatan_detail']);
Route::get('layanan-info-publik/pengajuan-keberatan/tinjau/{id}', [PPIDSetController::class, 'keberatan_tinjau']);
Route::get('layanan-info-publik/pengajuan-keberatan/tolak/view/{id}', [PPIDSetController::class, 'keberatan_tolak_view']);
Route::post('layanan-info-publik/pengajuan-keberatan/tolak/simpan/{id}', [PPIDSetController::class, 'keberatan_tolak_action']);
Route::post('layanan-info-publik/pengajuan-keberatan/konfirmasi/{id}', [PPIDSetController::class, 'keberatan_konfirmasi']);
Route::post('layanan-info-publik/pengajuan-keberatan/simpan/', [PPIDSetController::class, 'keberatan_simpan']);

Route::get('layanan-info-publik/survei', [PPIDSetController::class, 'survei_list']);
Route::get('layanan-info-publik/survei/detail/{id}', [PPIDSetController::class, 'survei_detail']);

Route::get('kegiatan-prioritas', [PPIDSetController::class, 'kegiatan_prioritas_list']);
Route::get('kegiatan-prioritas/add', [PPIDSetController::class, 'kegiatan_prioritas_add']);
Route::get('kegiatan-prioritas/{id}', [PPIDSetController::class, 'kegiatan_prioritas_edit']);
Route::post('kegiatan-prioritas/store', [PPIDSetController::class, 'kegiatan_prioritas_store']);
Route::post('kegiatan-prioritas/update/{id}', [PPIDSetController::class, 'kegiatan_prioritas_update']);
Route::post('kegiatan-prioritas/delete/{id}', [PPIDSetController::class, 'kegiatan_prioritas_delete']);

Route::get('statistik', [StatistikController::class, 'list']);
Route::get('kontributor', [AuthController::class, 'kontributor_showFormLogin']);
Route::get('kontributor/list-berita', [KontributorController::class, 'list']);
Route::get('kontributor/detail/berita/{id}', [KontributorController::class, 'detail']);
Route::get('kontributor/tambah-berita', [KontributorController::class, 'create']);
Route::get('kontributor/edit/berita/{id}', [KontributorController::class, 'edit']);
Route::post('kontributor/delete/berita/{id}', [KontributorController::class, 'delete']);
Route::post('kontributor/store-berita', [KontributorController::class, 'store']);
Route::post('kontributor/update/berita/{id}', [KontributorController::class, 'update']);

Route::get('api/get-latest-berita', [BeritaController::class, 'api_get_latest_berita']);
Route::get('api/get-latest-berita-wilayah/{tags}', [BeritaController::class, 'api_get_latest_berita_wilayah']);
Route::get('api/get-paginate-berita-wilayah/{tags}', [BeritaController::class, 'api_get_paginate_berita_wilayah']);
Route::get('api/get-latest-infografis', [InfografisController::class, 'api_get_latest_infografis']);
Route::get('api/get-infografis', [InfografisController::class, 'api_get_infografis']);
Route::get('api/get-infografis-statistik', [InfografisController::class, 'api_get_infografis_statistik']);

Route::get('/pekppp-2023',[LandingPageController::class, 'pekppp']);
// ===================


Route::get('portal', [LayoutsController::class, 'portal']);
Route::get('portalinsert', [LayoutsController::class, 'portalinsert']);
Route::post('portal-set/new', [LayoutsController::class, 'pertalnew']);
Route::post('portal-set/delete/{id}', [LayoutsController::class, 'pertaldelete']);
Route::get('portal-detail/{id}', [LayoutsController::class, 'portaledit']);
Route::post('portal-set/update/{id}', [LayoutsController::class, 'pertalupdate']);


Route::post('menu/delete/{id}', [MenuController::class, 'delete']);



Route::get('tags', [TagsController::class, 'tags']);
Route::get('tagsinput', [TagsController::class, 'tagsinput']);
Route::get('tagsedit/{id}', [TagsController::class, 'tagsedit']);
Route::post('/tags/insert', 'TagsController@insert');
Route::post('/tags/update/{id}', 'TagsController@update');


Route::get('agenda-settings', [AgendaSetController::class, 'list']);
Route::get('agenda/add', [AgendaSetController::class, 'add']);
Route::post('agenda/insert', [AgendaSetController::class, 'insert']);
Route::post('agenda/edit/{id}', [AgendaSetController::class, 'edit']);
Route::get('agenda-detail/{id}', [AgendaSetController::class, 'detail']);
Route::post('delete/agenda/{id}', [AgendaSetController::class, 'delete']);

Route::get('pejabat/{node}/new/{idMenu}', [PemerintahanController::class, 'masterpejabat']);
Route::post('pejabat/insert/{node}/{idMenu}', [PemerintahanController::class, 'insertPejabat']);

Route::get('kecamatandetail/{id}', [KecamatanController::class, 'kecamatandetail']);
Route::get('kelurahanlist/{id}', [KecamatanController::class, 'kelurahan']);
Route::get('kelurahandetail/{id}', [KecamatanController::class, 'kelurahandetail']);
Route::get('addkelurahan/{id}', [KecamatanController::class, 'inputkelurahan']);
Route::post('kecamatanupdate/{id}', [KecamatanController::class, 'updatekecamatan']);
Route::post('insertkelurahan/{id}', [KecamatanController::class, 'insertkelurahan']);
Route::post('kelurahanupdate/{id}', [KecamatanController::class, 'updatekelurahan']);


Route::get('popup-content', [LayoutsController::class, 'popup']);
Route::get('running-text', [LayoutsController::class, 'text']);
Route::post('popup-set/update/{id}', [LayoutsController::class, 'popupset']);
Route::post('running-text/update', [LayoutsController::class, 'updaterunningtext']);



// Route::get('dashboard','Backend\indexController@index');

// Route::post('change-stats-berita/{id}', 'BeritaController@changeStats');
// Route::post('change-stats-beritafoto/{id}', 'BeritaFotoController@changeStats');
// Route::post('change-stats-beritavideo/{id}', 'BeritaVideoController@changeStats');



// Route::get('/masterberita/editberita/{id}', 'BeritaController@edit');
Route::post('/masterberita/update/{id}', 'BeritaController@update');
Route::post('/wilayah/update/{id}', [ProfilController::class, 'updatewilayah']);
Route::post('/profil/update/{id}', [PemerintahanController::class, 'updateprofil']);
Route::post('/fasilitas/update/{id}', [ProfilController::class, 'updatefasilitas']);
Route::post('/pejabat/update/{id}', [PemerintahanController::class, 'updatepejabat']);
Route::get('/masterberitafoto/{id}', 'BeritafotoController@edit');
Route::get('/masterberitavideo/{id}', 'BeritavideoController@edit');
Route::post('/masterberitafoto/update/{id}', 'BeritafotoController@update');
Route::get('/addkategoriberita/editkategoriberita/{id}', 'KategoriberitaController@edit');
Route::post('/addkategoriberita/update/{id}', 'KategoriberitaController@update');
Route::get('/addpejabat/editpejabat/{id}', 'PejabatController@edit');
Route::post('/addpejabat/update', 'PejabatController@update');
Route::get('/editinfografis/{id}',[InfografisController::class, 'edit']);
Route::post('/addinfografis/update/{id}', 'InfografisController@update');
Route::post('delete/{id}', 'BeritaController@delete');
Route::post('deletepejabat/{id}', 'PemerintahanController@deletepejabat');
Route::post('deletetag/{id}', 'TagsController@delete');
Route::post('deletefoto/{id}', 'BeritafotoController@delete');
Route::post('deletevideo/{id}', 'BeritavideoController@delete');
Route::post('deletekategoriberita/{id}', 'KategoriberitaController@delete');
Route::post('deletepejabat/{id}', 'PejabatController@delete');
Route::post('deleteinfografis/{id}', 'infografisController@delete');

Route::post('/masterberita/store', 'BeritaController@store');
Route::post('/masterberitafoto/store', 'BeritafotoController@store');
Route::post('/masterberitavideo/store', 'BeritavideoController@store');
Route::post('/masterberitavideo/update/{id}', 'BeritavideoController@update');
Route::post('/addkategoriberita/store', 'KategoriberitaController@store');
Route::post('/addpejabat/store', 'PejabatController@store');
Route::post('/addinfografis/store', 'InfografisController@store');


Route::post('/addmenu/store', 'MenuController@store');
Route::post('/addcontentmenu/store', 'MenuController@storecontent');
Route::post('/addbigcontent/store/{id}', 'MenuController@storebigcontent');



Route::get('masterberita', [BeritaController::class, 'kategori']);
Route::get('masterberitafoto', [BeritafotoController::class, 'kategori']);
Route::get('masterberitavideo', [BeritavideoController::class, 'kategori']);
Route::get('addkategoriberita', function () {
    return view('master/addkategoriberita');
});
Route::get('addinfografis', [InfografisController::class, 'addNew']);
Route::get('addmenu', [MenuController::class, 'add']);
Route::get('edit-menu/{id}', [MenuController::class, 'editmenu']);
Route::get('edit-linkmenu/{id}', [MenuController::class, 'editlink']);
Route::get('edit-sublinkmenu/{id}', [MenuController::class, 'editsublink']);
Route::get('edit-content-menu/{id}', [MenuController::class, 'editcontent']);


Route::post('update-menu/main/{id}', [MenuController::class, 'updatemain']);
Route::post('update-menu/content/{id}', [MenuController::class, 'updatecontent']);
Route::post('update-menu/link/{id}', [MenuController::class, 'updatelink']);
Route::post('update-menu/sublink/{id}', [MenuController::class, 'updatesublink']);


Route::get('wilayah', [ProfilController::class, 'wilayah']);
Route::get('wilayah/{id}', [ProfilController::class, 'wilayahedit']);
// Route::get('kecamatan', [ProfilController::class, 'kecamatan']);
Route::get('fasilitas', [ProfilController::class, 'fasilitas']);
Route::get('fasilitas/{id}', [ProfilController::class, 'fasilitasdetail']);
Route::get('fasilitasdetail/place_id={id}', [ProfilController::class, 'fasilitasdetailtempat']);
Route::get('profil', [PemerintahanController::class, 'profil']);
Route::get('profil/{id}', [PemerintahanController::class, 'profildetails']);
Route::get('pejabat', [PemerintahanController::class, 'pejabat']);
Route::get('pejabat/{id}', [PemerintahanController::class, 'pejabatdetail']);
Route::get('pejabatdetail/place_id={id}', [PemerintahanController::class, 'pejabatdetailkategori']);

Route::get('addcontentmenu', [MenuController::class, 'addcontent']);
Route::get('addbigcontentmenu/{id}', [MenuController::class, 'addbigcontent']);



Route::get('menu', [MenuController::class, 'index']);
Route::get('addpejabat', [PejabatController::class, 'instansi']);
Route::get('menuberita/{detailberita:id}', [BeritaController::class, 'data']);
Route::get('menuberitaupdate/{detailberita:id}', [BeritaController::class, 'edit']);
Route::get('menuberita', [BeritaController::class, 'index']);
Route::get('menuberitafoto', [BeritafotoController::class, 'index']);
Route::get('menuberitafoto/{detailberitafoto:id}', [BeritafotoController::class, 'data']);
Route::get('menuberitavideo', [BeritavideoController::class, 'index']);
Route::get('menuberitavideo/{detailberitavideo:id}', [BeritavideoController::class, 'data']);
Route::get('kategoriberita', [KategoriberitaController::class, 'index']);
Route::get('infografis', [InfografisController::class, 'index']);


Route::get('user-profile/{id}', [UsersController::class, 'userDetail']);
Route::get('change-password/{id}', [UsersController::class, 'changePass']);
Route::post('users/profile/{id}', [UsersController::class, 'profile']);
Route::post('/change/pass/{id}', [UsersController::class, 'pass']);
Route::get('/ubah-{roleId}/{id}', [UsersController::class, 'ubahRole']);
Route::post('change-photo/profile/{id}', [UsersController::class, 'profilePhoto']);
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('reload-captcha', 'AuthController@reloadCaptcha');
// Route::get('register', 'AuthController@showFormRegister')->name('register');
// Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', 'Backend\indexController@index');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::resource('users', 'Backend\UsersController');

    Route::resource('roles', 'Backend\RolesController');
});


Route::get('/{namaSubMenu}/{id}/{namaMenu}',[LandingPageController::class, 'content']);