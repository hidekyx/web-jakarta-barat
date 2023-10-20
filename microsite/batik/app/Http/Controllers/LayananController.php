<?php

namespace App\Http\Controllers;

use App\Models\LayananAstik;
use App\Models\LayananId;
use App\Models\LayananKip;
use App\Traits\ApiBarat;
use Illuminate\Http\Request;

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

    public function cek_status_detail(Request $request) {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $berita = $this->get_latest_berita();
        $layanan = LayananId::where('kode_layanan', $request->get('kode_layanan'))->first();
        if($layanan == null) {
            $layanan = LayananKip::where('kode_layanan', $request->get('kode_layanan'))->first();
            $layanan_detail = "KIP";
            if($layanan == null) {
                $layanan = LayananAstik::where('kode_layanan', $request->get('kode_layanan'))->first();
                $layanan_detail = "ASTIK";
            }
        }
        else {
            $layanan_detail = "ID";
        }
        return view("main", [
            'page' => "Layanan",
            'subpage' => "Cek Status Layanan",
            'footer_secaw_infografis' => $footer_secaw_infografis,
            'berita' => $berita,
            'layanan' => $layanan,
            'layanan_detail' => $layanan_detail,
        ]);
    }
}