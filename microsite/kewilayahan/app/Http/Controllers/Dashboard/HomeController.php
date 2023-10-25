<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\User;
use App\Traits\DeskripsiTrait;
use App\Traits\InformasiTrait;
use App\Traits\LayananTrait;
use App\Traits\MenuTrait;
use App\Traits\PerangkatTrait;
use App\Traits\PpidTrait;
use App\Traits\ProfilTrait;

class HomeController extends Controller
{
    use MenuTrait;
    use DeskripsiTrait;
    use ProfilTrait;
    use PerangkatTrait;
    use PpidTrait;
    use InformasiTrait;
    use LayananTrait;

    public function home() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            if($logged_user->kategori == "Monitoring") {
                $page = "Home Admin";
                $status = User::where('kategori', '!=', 'Monitoring')->get();                
                foreach($status as $s) {
                    $s['data_deskripsi'] = $this->get_data_deskripsi('all', $s->id_user);
                    $s['data_profil'] = $this->get_data_profil('all', $s->id_user);
                    $s['data_perangkat'] = $this->get_data_perangkat('all', $s->id_user);
                    $s['data_ppid'] = $this->get_data_ppid('all', $s->id_user);
                    $s['data_informasi'] = $this->get_data_informasi('all', $s->id_user);
                    $s['data_layanan_kesehatan'] = $this->count_data_layanan('Kesehatan', $s->id_user);
                    $s['data_layanan_pendidikan'] = $this->count_data_layanan('Pendidikan', $s->id_user);
                    $s['data_layanan_transportasi'] = $this->count_data_layanan('Transportasi', $s->id_user);
                    $s['data_layanan_ptsp'] = $this->count_data_layanan('PTSP', $s->id_user);
                    $s['data_layanan_kanal_pengaduan'] = $this->count_data_layanan('Kanal Pengaduan', $s->id_user);
                    $s['data_layanan_tempat_ibadah'] = $this->count_data_layanan('Tempat Ibadah', $s->id_user);
                }
                // dd(count($status[0]['data_layanan_kesehatan']));
                // dd($status[0]);
            }
            else {
                $page = "Home";
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
            }
            return view("dashboard.main", [
                'logged_user' => $logged_user,
                'list_menu' => $list_menu,
                'status' => $status,
                'page' => $page
            ]);
        }
        return redirect('/dashboard/login');
    }
}