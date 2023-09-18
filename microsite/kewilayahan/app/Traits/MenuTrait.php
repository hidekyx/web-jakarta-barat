<?php

namespace App\Traits;

use App\Models\Menu;

trait MenuTrait
{
    public function get_list_menu() {
        $list_menu['Deskripsi Website'] = Menu::where('kategori','Deskripsi Website')->get();
        $list_menu['Profil'] = Menu::where('kategori','Profil')->get();
        $list_menu['Perangkat'] = Menu::where('kategori','Perangkat')->get();
        $list_menu['PPID'] = Menu::where('kategori','PPID')->get();
        $list_menu['Informasi Wilayah'] = Menu::where('kategori','Informasi Wilayah')->get();
        $list_menu['Layanan Publik'] = Menu::where('kategori','Layanan Publik')->get();

        return $list_menu;
    }
}