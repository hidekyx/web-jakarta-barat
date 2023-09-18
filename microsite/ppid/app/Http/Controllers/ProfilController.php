<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\Statistik;

class ProfilController extends Controller
{
    public function profil() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Profil',
            'subpage' => 'Profil PPID Jakarta Barat'
        ]);
    }

    public function visimisi() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Profil',
            'subpage' => 'Visi-Misi PPID'
        ]);
    }

    public function struktur() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Profil',
            'subpage' => 'Struktur Organisasi PPID'
        ]);
    }

    public function tugasfungsi() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Profil',
            'subpage' => 'Tugas dan Fungsi PPID'
        ]);
    }
}
