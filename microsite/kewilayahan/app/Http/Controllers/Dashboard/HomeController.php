<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\ProfilSejarah;
use App\Traits\MenuTrait;
use App\Traits\ProfilTrait;

class HomeController extends Controller
{
    use MenuTrait;
    use ProfilTrait;

    public function home() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();

            $menu = Menu::get();
            foreach ($menu as $m) {
                if($m->kategori == "Profil") {
                    $status[$m->kategori][$m->nama_menu]['kategori'] = $m->kategori;
                    $status[$m->kategori][$m->nama_menu]['nama_menu'] = $m->nama_menu;
                    $data_profil = $this->get_data_profil($m->nama_menu, $id_user);
                    if($data_profil) {
                        $status[$m->kategori][$m->nama_menu]['status'] = $data_profil->status;
                        $status[$m->kategori][$m->nama_menu]['diperbaharui'] = $data_profil->updated_at;
                    }
                    else {
                        $status[$m->kategori][$m->nama_menu]['status'] = "Belum Diisi";
                        $status[$m->kategori][$m->nama_menu]['diperbaharui'] = null;
                    }
                }
            }
            // dd($status);
            return view("dashboard.main", [
                'logged_user' => $logged_user,
                'list_menu' => $list_menu,
                'status' => $status,
                'page' => "Home",
            ]);
        }
        return redirect('/dashboard/login');
    }
}