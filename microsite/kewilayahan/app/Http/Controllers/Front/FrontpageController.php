<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Traits\ApiBarat;
use App\Traits\BerandaTrait;
use App\Traits\DeskripsiTrait;
use App\Traits\InformasiTrait;
use App\Traits\LayananTrait;
use App\Traits\MenuTrait;
use App\Traits\PerangkatTrait;
use App\Traits\PpidTrait;
use App\Traits\ProfilTrait;

class FrontpageController extends Controller
{
    use BerandaTrait;
    use MenuTrait;
    use DeskripsiTrait;
    use ProfilTrait;
    use LayananTrait;
    use PerangkatTrait;
    use PpidTrait;
    use InformasiTrait;
    use ApiBarat;

    public function home($username) {
        $kewilayahan = $this->get_url($username);
        
        if($kewilayahan) { 
            $list_menu = $this->get_list_menu();
            $data = $this->get_data($kewilayahan);
            return view("front.main", [
                'kewilayahan' => $kewilayahan,
                'list_menu' => $list_menu,
                'data' => $data,
                'page' => "Beranda",
            ]);
        }
        else {
            echo "404"; die();
        }
    }

    public function detail($username, $kategori) {
        $kewilayahan = $this->get_url($username);
        if($kewilayahan) {
            $subpage = Menu::where('kategori', ucwords(str_replace('-', ' ', $kategori)))->get();
            if(count($subpage)) {
                $current_url = parse_url(url()->full());
                if(isset($current_url['query'])) {
                    parse_str($current_url['query'], $results); 
                    $current_subpage = $results['page'];
                    if($current_subpage == "lmk") { $current_subpage = "LMK"; }
                    if($current_subpage == "struktur-ppid") { $current_subpage = "Struktur-PPID"; }
                    if($current_subpage == "tugas-dan-fungsi-ppid") { $current_subpage = "Tugas-dan-Fungsi-PPID"; }
                    if($current_subpage == "visi-dan-misi-ppid") { $current_subpage = "Visi-dan-Misi-PPID"; }
                    if($current_subpage == "laporan-penyelesaian-ppid") { $current_subpage = "Laporan-Penyelesaian-PPID"; }
                    if($current_subpage == "sop-ppid") { $current_subpage = "SOP-PPID"; }
                    if($current_subpage == "ptsp") { $current_subpage = "PTSP"; }
                    $current_menu = Menu::where('kategori', ucwords(str_replace('-', ' ', $kategori)))->where('nama_menu', ucwords(str_replace('-', ' ', $current_subpage)))->first();
                    if($current_menu == null) {
                        return redirect('/'.$username.'/'.$kategori);
                    }
                }
                else {
                    $current_subpage = strtolower(str_replace(' ','-', $subpage[0]->nama_menu));
                    $current_menu = Menu::where('kategori', ucwords(str_replace('-', ' ', $kategori)))->where('nama_menu', ucwords(str_replace('-', ' ', $current_subpage)))->first();
                }
                $list_menu = $this->get_list_menu();
                $data = $this->get_data($kewilayahan);
                // dd($data['ppid']['daftar-informasi-publik-berkala']);
                return view("front.main", [
                    'kewilayahan' => $kewilayahan,
                    'list_menu' => $list_menu,
                    'current_subpage' => $current_subpage,
                    'current_menu' => $current_menu,
                    'subpage' => $subpage,
                    'data' => $data,
                    'page' => ucwords(str_replace('-', ' ', $kategori)),
                ]);
            }
            else {
                echo "404"; die(); // URL mengambil data menu yang tidak ada di table menu
            }
        }
        else {
            echo "404"; die(); // URL mengambil data menu yang tidak ada di table menu
        }
    }
}