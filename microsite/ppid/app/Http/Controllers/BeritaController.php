<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Statistik;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function main() {
        $berita = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->paginate(6);
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita' => $berita,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Berita',
            'subpage' => 'Kota Administrasi Jakarta Barat'
        ]);
    }

    public function detail($id) {
        $berita = DB::table('berita')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'berita.title', 'users.nama as writer', 'berita.content', 'berita.time', 'berita.img', 'berita.viewed')
        ->where('berita.id', $id)
        ->where('published', 'Y')
        ->get();
        if (!count($berita)) {
            return redirect('/berita');
        }
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita' => $berita,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Berita PPID',
            'subpage' => 'Kota Administrasi Jakarta Barat'
        ]);
    }
}
