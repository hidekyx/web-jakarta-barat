<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PpidInformasiBerkalaPivot;
use App\Models\PpidInformasiSertamertaPivot;
use App\Models\PpidInformasiSetiapsaatPivot;
use App\Traits\MenuTrait;
use App\Traits\PpidTrait;

class PpidController extends Controller
{
    use MenuTrait;
    use PpidTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function ppid_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_ppid = $this->get_data_ppid($subpage, $id_user);
            // dd($data_ppid[0]['isi'][0]->pivot($data_ppid[0]['isi'][0]->id_ppid, $id_user));
            // dd($data_ppid);
            if($data_ppid == "Halaman PPID tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_ppid' => $data_ppid,
                    'page' => "PPID",
                    'subpage' => $subpage,
                    'submenu' => ucwords(str_replace('-', ' ', $subpage))
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function ppid_create($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_ppid = $this->get_data_ppid($subpage, $id_user);
            if($data_ppid == "Halaman PPID tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_ppid' => $data_ppid,
                    'page' => "PPID",
                    'subpage' => $subpage,
                    'submenu' => "Create"
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function ppid_edit($subpage, $id_ppid) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_ppid = $this->detail_data_ppid($subpage, $id_user, $id_ppid);
            if($data_ppid == "Halaman PPID tidak ditemukan" || $data_ppid == null) {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_ppid' => $data_ppid,
                    'page' => "PPID",
                    'subpage' => $subpage,
                    'submenu' => "Edit"
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function ppid_edit_informasi($subpage, $id_ppid) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_ppid = $this->detail_data_ppid_informasi($subpage, $id_user, $id_ppid);
            if($subpage == "daftar-informasi-publik-berkala" || $subpage == "daftar-informasi-publik-serta-merta" || $subpage == "daftar-informasi-publik-setiap-saat") {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_ppid' => $data_ppid,
                    'page' => "PPID",
                    'subpage' => $subpage,
                    'submenu' => "Edit Informasi"
                ]);
            }
            elseif($data_ppid == "Halaman PPID tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function ppid_store_informasi(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            if($subpage == "daftar-informasi-publik-setiap-saat" || $subpage == "daftar-informasi-publik-berkala" || $subpage == "daftar-informasi-publik-serta-merta") {
                $data_ppid = $this->detail_data_ppid_informasi($subpage, $id_user, $request->get('id_ppid'));
                if($request->get('submit_form') == "save") {
                    $data_ppid = $this->store_data_ppid($subpage, $id_user, $request);
                    $transaksi = "save";
                }
                elseif($request->get('submit_form') == "update") {
                    if($data_ppid->getTable() == "ppid_informasi_berkala_pivot") {
                        $data_ppid = PpidInformasiBerkalaPivot::where('id_pivot', $request->get('id_pivot'))->first();
                    }
                    elseif($data_ppid->getTable() == "ppid_informasi_sertamerta_pivot") {
                        $data_ppid = PpidInformasiSertamertaPivot::where('id_pivot', $request->get('id_pivot'))->first();
                    }
                    elseif($data_ppid->getTable() == "ppid_informasi_setiapsaat_pivot") {
                        $data_ppid = PpidInformasiSetiapsaatPivot::where('id_pivot', $request->get('id_pivot'))->first();
                    }
                    $data_ppid = $this->update_data_ppid($subpage, $id_user, $request, $data_ppid);
                    $transaksi = "update";
                }
                elseif($data_ppid == "Halaman PPID tidak ditemukan") {
                    echo "404"; die(); // redirect ke 404
                }
            }
            else {
                echo "404"; die(); // redirect ke 404
            }
            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_ppid->save(); }
                elseif($transaksi == "update") { $data_ppid->update(); }
                DB::commit();
                return redirect('/dashboard/ppid/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }

    public function ppid_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            if($subpage == "laporan-penyelesaian-ppid" || $subpage == "sop-ppid" || $subpage =="dokumen-informasi-publik") {
                $data_ppid = $this->detail_data_ppid($subpage, $id_user, $request->get('id_ppid'));
                if($request->get('submit_form') == "save") {
                    $data_ppid = $this->store_data_ppid($subpage, $id_user, $request);
                    $transaksi = "save";
                }
                elseif($request->get('submit_form') == "update") {
                    $data_ppid = $this->update_data_ppid($subpage, $id_user, $request, $data_ppid);
                    $transaksi = "update";
                }
                else {
                    echo "404"; die(); // redirect ke 404
                }
            }
            else {
                $data_ppid = $this->get_data_ppid($subpage, $id_user);
                if($data_ppid) {
                    if($subpage == "struktur-ppid" || $subpage == "prosedur-permohonan-pelayanan-informasi" || $subpage == "prosedur-pengajuan-keberatan-informasi" || $subpage == "prosedur-penanganan-sengketa-informasi" || $subpage == "prosedur-permohonan-penyelesaian-sengketa-informasi") {
                        $data_ppid = $this->update_data_ppid($subpage, $id_user, $request, $data_ppid);
                    }
                    else {
                        $data_ppid->konten = $request->get('konten');
                        $data_ppid->status = "Sudah Dipublikasi";
                    }
                    $transaksi = "update";
                }
                else {
                    $data_ppid = $this->store_data_ppid($subpage, $id_user, $request);
                    $transaksi = "save";
                }
            }
            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_ppid->save(); }
                elseif($transaksi == "update") { $data_ppid->update(); }
                DB::commit();
                return redirect('/dashboard/ppid/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }

    public function ppid_delete($subpage, $id_ppid) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $data_ppid = $this->detail_data_ppid($subpage, $id_user, $id_ppid);
            if($data_ppid) {
                try {
                    DB::beginTransaction();
                    $data_ppid->delete();
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