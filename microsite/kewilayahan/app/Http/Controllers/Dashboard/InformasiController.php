<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\InformasiTrait;
use App\Traits\MenuTrait;

class InformasiController extends Controller
{
    use MenuTrait;
    use InformasiTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function informasi_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_informasi = $this->get_data_informasi($subpage, $id_user);
            if($data_informasi == "Halaman Informasi tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
                // kalau return null, atau empty, subpage ditemukkan tapi belum ada data, tetap lanjut tanpa redirect 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_informasi' => $data_informasi,
                    'page' => "Informasi Wilayah",
                    'subpage' => $subpage,
                    'submenu' => ucwords(str_replace('-', ' ', $subpage))
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function informasi_create($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            return view("dashboard.main", [
                'logged_user' => $logged_user,
                'list_menu' => $list_menu,
                'page' => "Informasi Wilayah",
                'subpage' => $subpage,
                'submenu' => ucwords(str_replace('-', ' ', $subpage))." - Tambah"
            ]);
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function informasi_edit($subpage, $id_informasi_kalender) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_informasi = $this->detail_data_informasi($subpage, $id_user, $id_informasi_kalender);
            if($data_informasi == "Halaman Informasi tidak ditemukan" || $data_informasi == null) {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_informasi' => $data_informasi,
                    'page' => "Informasi Wilayah",
                    'subpage' => $subpage,
                    'submenu' => ucwords(str_replace('-', ' ', $subpage))." - Edit"
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function informasi_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            if($subpage == "kalender-kegiatan") {
                $data_informasi = $this->detail_data_informasi_kalender($subpage, $id_user, $request->get('id_informasi_kalender'));
                if($request->get('submit_form') == "save") {
                    $data_informasi = $this->store_data_informasi($subpage, $id_user, $request);
                    $transaksi = "save";
                }
                elseif($request->get('submit_form') == "update") {
                    $data_informasi = $this->update_data_informasi($subpage, $id_user, $request, $data_informasi);
                    $transaksi = "update";
                }
                else {
                    echo "404"; die(); // redirect ke 404
                }
            }
            elseif($subpage == "inovasi-dan-prestasi") {
                $data_informasi = $this->detail_data_informasi($subpage, $id_user);
                if($data_informasi) {
                    $data_informasi = $this->update_data_informasi($subpage, $id_user, $request, $data_informasi);
                    $transaksi = "update";
                }
                else {
                    $data_informasi = $this->store_data_informasi($subpage, $id_user, $request);
                    $transaksi = "save";
                }
            }
            else {
                echo "404"; die(); // redirect ke 404
            }

            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_informasi->save(); }
                elseif($transaksi == "update") { $data_informasi->update(); }
                DB::commit();
                return redirect('/dashboard/informasi-wilayah/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }

    public function informasi_delete($subpage, $id_informasi_kalender) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_informasi = $this->detail_data_informasi_kalender($subpage, $id_user, $id_informasi_kalender);
            if($data_informasi) {
                try {
                    DB::beginTransaction();
                    $data_informasi->delete();
                    $success = true;
                    $message = "Data informasi berhasil dihapus";
                    DB::commit();
                } 
                catch(\Exception $e) {
                    DB::rollback();
                    $success = false;
                    $message = $e;
                }

                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            }
            else {
                echo "404"; die(); // redirect ke 404
            }
        }
        return redirect('/dashboard/home');
    }
}