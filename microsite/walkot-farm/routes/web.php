<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\KegiatanController;

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
Route::get('/tentang', [HomeController::class, 'tentang']);
Route::get('/tanaman/{kategori}', [TanamanController::class, 'index']);
Route::get('/tanaman/{kategori}/{id_tanaman}', [TanamanController::class, 'detail']);
Route::get('/kegiatan', [KegiatanController::class, 'main']);
Route::get('/kegiatan/{id}', [KegiatanController::class, 'detail_kegiatan']);