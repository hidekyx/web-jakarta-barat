<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\MenuTrait;
use App\Traits\ProfilTrait;

class ProfilController extends Controller
{
    use MenuTrait;
    use ProfilTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function profil_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_profil = $this->get_data_profil($subpage, $id_user);
            if($data_profil == "Halaman profil tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_profil' => $data_profil,
                    'page' => "Profil",
                    'subpage' => $subpage
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function profil_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_profil = $this->get_data_profil($subpage, $id_user);
            if($data_profil) {
                $data_profil->konten = $request->get('konten');
                $data_profil->status = "Sudah Dipublikasi";
                $transaksi = "update";
            }
            else {
                $data_profil = $this->store_data_profil($subpage, $id_user, $request);
                $transaksi = "save";
            }

            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_profil->save(); }
                elseif($transaksi == "update") { $data_profil->update(); }
                DB::commit();
                return redirect('/dashboard/profil/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }
}