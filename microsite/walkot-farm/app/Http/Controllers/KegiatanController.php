<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\TanamanDetail;

class KegiatanController extends Controller
{
    public function get_footer_data() {
        $footer['kegiatan'] = Kegiatan::orderByDesc('tanggal')->limit(3)->get();
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function main() {
        $kegiatan = Kegiatan::orderByDesc('tanggal')->paginate(3);
        $widgetkegiatan = Kegiatan::orderByDesc('tanggal')->limit(5)->get();
        $footer = $this->get_footer_data();

        return view("front.kegiatan.main", [
            'jenis_page' => "Kegiatan",
            'page' => "list",
            'kegiatan' => $kegiatan,
            'widgetkegiatan' => $widgetkegiatan,
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }

    public function detail_kegiatan($id) {
        $kegiatan = Kegiatan::where('id','=',$id)->get();
        $widgetkegiatan = Kegiatan::orderByDesc('tanggal')->limit(5)->get();
        $footer = $this->get_footer_data();

        return view("front.kegiatan.main", [
            'jenis_page' => "Kegiatan",
            'page' => "detail",
            'kegiatan' => $kegiatan,
            'widgetkegiatan' => $widgetkegiatan,
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }
}
