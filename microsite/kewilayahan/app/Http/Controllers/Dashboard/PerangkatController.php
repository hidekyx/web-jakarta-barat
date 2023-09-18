<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\MenuTrait;
use App\Traits\PerangkatTrait;

class PerangkatController extends Controller
{
    use MenuTrait;
    use PerangkatTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function perangkat_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_perangkat = $this->get_data_perangkat($subpage, $id_user);
            if($data_perangkat == "Halaman perangkat tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_perangkat' => $data_perangkat,
                    'page' => "Perangkat",
                    'subpage' => $subpage,
                    'submenu' => ucwords(str_replace('-', ' ', $subpage))
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function perangkat_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_perangkat = $this->get_data_perangkat($subpage, $id_user);
            if($data_perangkat) {
                if($subpage == "struktur-organisasi" || $subpage == "profil-pimpinan") {
                    $data_perangkat = $this->update_data_perangkat($subpage, $id_user, $request, $data_perangkat);
                }
                else {
                    $data_perangkat->konten = $request->get('konten');
                    $data_perangkat->status = "Sudah Dipublikasi";
                }
                $transaksi = "update";
            }
            else {
                $data_perangkat = $this->store_data_perangkat($subpage, $id_user, $request);
                $transaksi = "save";
            }

            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_perangkat->save(); }
                elseif($transaksi == "update") { $data_perangkat->update(); }
                DB::commit();
                return redirect('/dashboard/perangkat/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }
}