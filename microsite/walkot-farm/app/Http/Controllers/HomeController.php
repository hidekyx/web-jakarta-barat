<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\TanamanDetail;
use App\Models\TanamanKategori;

class HomeController extends Controller
{
    public function get_footer_data() {
        $footer['kegiatan'] = Kegiatan::orderByDesc('tanggal')->limit(3)->get();
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function main() {
        $kategori = TanamanKategori::get();
        foreach ($kategori as $k) {
            $tanaman[$k->nama_kategori] = TanamanDetail::orderByDesc('id_tanaman')->where('id_kategori', $k->id_kategori)->limit(8)->get();
            $totaltanaman[$k->nama_kategori] = TanamanDetail::where('id_kategori', $k->id_kategori)->count();
        }

        $kegiatanterbaru = Kegiatan::orderByDesc('tanggal')->limit(4)->get();
        $kegiatanheadline = Kegiatan::orderByDesc('tanggal')->limit(1)->get();
        $footer = $this->get_footer_data();

        return view("front.home.main", [
            'tanaman' => $tanaman,
            'totaltanaman' => $totaltanaman,
            'kegiatanheadline' => $kegiatanheadline,
            'kegiatanterbaru' => $kegiatanterbaru,
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }

    public function tentang() {
        $footer = $this->get_footer_data();
        return view("front.about.main", [
            'jenis_page' => 'Tentang',
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }
}
