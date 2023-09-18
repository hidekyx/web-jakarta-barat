<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\TanamanDetail;

class TanamanController extends Controller
{
    public function get_footer_data() {
        $footer['kegiatan'] = Kegiatan::orderByDesc('tanggal')->limit(3)->get();
        $footer['tanaman'] = TanamanDetail::inRandomOrder()->limit(8)->get();
        return $footer;
    }

    public function index($kategori) {
        $id_kategori = null;
        if($kategori == "Hias" || $kategori == "hias") { $id_kategori = 1; }
        else if($kategori == "Toga" || $kategori == "toga") { $id_kategori = 2; }
        else if($kategori == "Produktif" || $kategori == "produktif") { $id_kategori = 3; }
        else { return redirect('/'); }
        $tanaman = TanamanDetail::where('id_kategori', $id_kategori)->paginate(3);
        $footer = $this->get_footer_data();

        return view("front.tanaman.main", [
            'subpage' => "list",
            'jenis' => $kategori,
            'jenis_page' => "Tanaman",
            'tanaman' => $tanaman,
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }

    public function detail($kategori, $id_tanaman) {
        $id_kategori = null;
        if($kategori == "Hias" || $kategori == "hias") { $id_kategori = 1; }
        else if($kategori == "Toga" || $kategori == "toga") { $id_kategori = 2; }
        else if($kategori == "Produktif" || $kategori == "produktif") { $id_kategori = 3; }
        else { return redirect('/'); }
        $tanaman = TanamanDetail::where('id_kategori', $id_kategori)->where('id_tanaman', $id_tanaman)->first();
        
        $paging_tanaman = array();
        $paging_tanaman['next'] = TanamanDetail::where('id_kategori', $id_kategori)->where('id_tanaman', '>', $id_tanaman)->min('id_tanaman');
        $paging_tanaman['previous'] = TanamanDetail::where('id_kategori', $id_kategori)->where('id_tanaman', '<', $id_tanaman)->max('id_tanaman');
        
        if(!$tanaman) {
            return redirect('/');
        }
        $footer = $this->get_footer_data();

        return view("front.tanaman.main", [
            'subpage' => "detail",
            'jenis' => $kategori,
            'jenis_page' => "Tanaman",
            'tanaman' => $tanaman,
            'paging_tanaman' => $paging_tanaman,
            'footerkegiatan' => $footer['kegiatan'],
            'footertanaman' => $footer['tanaman']
        ]);
    }
}
