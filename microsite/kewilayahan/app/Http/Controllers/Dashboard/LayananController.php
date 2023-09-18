<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\LayananTrait;
use App\Traits\MenuTrait;

class LayananController extends Controller
{
    use MenuTrait;
    use LayananTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function layanan_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            if($subpage == "ptsp") { $subpage = "PTSP"; }
            $data_layanan = $this->get_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user);
            if($data_layanan == "Halaman layanan tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_layanan' => $data_layanan,
                    'page' => "Layanan Publik",
                    'subpage' => $subpage
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function layanan_create($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            if($subpage == "ptsp") { $subpage = "PTSP"; }
            $data_layanan = $this->get_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user);
            if($data_layanan == "Halaman layanan tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_layanan' => $data_layanan,
                    'page' => "Layanan Publik",
                    'subpage' => $subpage,
                    'submenu' => "Create"
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function layanan_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_layanan = $this->store_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user, $request);

            try {
                DB::beginTransaction();
                $data_layanan->save();
                DB::commit();
                return redirect('/dashboard/layanan-publik/'.$subpage)->with('success', 'Data layanan berhasil ditambahkan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }

    public function layanan_edit($subpage, $id_layanan_publik) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            if($subpage == "ptsp") { $subpage = "PTSP"; }
            $data_layanan = $this->detail_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user, $id_layanan_publik);
            if($data_layanan == "Halaman layanan tidak ditemukan" || $data_layanan == null) {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_layanan' => $data_layanan,
                    'page' => "Layanan Publik",
                    'subpage' => $subpage,
                    'submenu' => "Edit"
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function layanan_update(Request $request, $subpage, $id_layanan_publik) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_layanan = $this->detail_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user, $id_layanan_publik);
            if($data_layanan) {
                $data_layanan->nama_layanan = $request->get('nama_layanan');
                $data_layanan->alamat_layanan = $request->get('alamat_layanan');
                try {
                    DB::beginTransaction();
                    $data_layanan->update();
                    DB::commit();
                    return redirect('/dashboard/layanan-publik/'.$subpage)->with('success', 'Data layanan berhasil diperbaharui');
                } 
                catch(\Exception $e) {
                    DB::rollback();
                    dd($e); // error transaction
                }
            }
            else {
                echo "404"; die(); // redirect ke 404
            }
        }
        return redirect('/dashboard/home');
    }

    public function layanan_delete($subpage, $id_layanan_publik) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_layanan = $this->detail_data_layanan(ucwords(str_replace('-', ' ', $subpage)), $id_user, $id_layanan_publik);
            if($data_layanan) {
                try {
                    DB::beginTransaction();
                    $data_layanan->delete();
                    $success = true;
                    $message = "Data layanan berhasil dihapus";
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