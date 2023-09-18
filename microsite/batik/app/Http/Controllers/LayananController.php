<?php

namespace App\Http\Controllers;

use App\Traits\ApiBarat;

class LayananController extends Controller
{
    use ApiBarat;

    public function cek_status_view() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $berita = $this->get_latest_berita();
        
        return view("main", [
            'page' => "Layanan",
            'subpage' => "Cek Status Layanan",
            'footer_secaw_infografis' => $footer_secaw_infografis,
            'berita' => $berita
        ]);
    }

    public function cek_status_detail() {
        return view("main", [
            'detail_page' => "Detail Layanan",
        ]);
    }
}