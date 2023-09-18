<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\LayananKip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Image;

class KipController extends Controller
{
    public function list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 4) || ($logged_user->id_seksi == 3)) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','2')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','3')->where('status_kontrak','Aktif')->get();
                $instansi = Instansi::get();

                $results = null;
                $selected_bulan = null;
                $selected_tahun = null;
                $query = LayananKip::orderBy('id_layanan_kip', 'DESC');
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    if(isset($results['bulan']) && $results['bulan'] != null) {
                        $filter_bulan = explode('-',$results['bulan']);
                        $selected_bulan = $filter_bulan[1];
                        $selected_tahun = $filter_bulan[0];
                        $query->whereMonth('tanggal_penerimaan', $selected_bulan)->whereyear('tanggal_penerimaan', $selected_tahun);
                    }
                    if(isset($results['instansi']) && $results['instansi'] != null) {
                        $instansi_search = $results['instansi'];
                        $query->where('id_instansi', $instansi_search);
                    }
                    if(isset($results['kategori']) && $results['kategori'] != null) {
                        $kategori_search = $results['kategori'];
                        if($kategori_search == "Instalasi") {
                            $kategori_search = "Instalasi, Penambahan, dan Penataan Jaringan";
                        }
                        if($kategori_search == "Penanganan") {
                            $kategori_search = "Penanganan Permasalahan Jaringan";
                        }
                        $query->where('kategori', $kategori_search);
                    }
                    if(isset($results['kode']) && $results['kode'] != null) {
                        $kode = $results['kode'];
                        $query->where('kode_layanan', $kode);
                    }
                    if($id_role == 1 || $id_role == 2 || $id_role == 4) {
                        if(isset($results['disposisi']) && $results['disposisi'] != null) {
                            $disposisi_search = $results['disposisi'];
                            $id_layanan = LayananDetail::where('id_layanan_kategori', 8)->where('value', $disposisi_search)->pluck('id_layanan');
                            $query->whereIn('id_layanan', $id_layanan);
                        }
                    }
                }
                if($id_role == 3) {
                    $id_layanan = LayananDetail::where('id_layanan_kategori', 8)->where('value', $logged_user->id_user)->pluck('id_layanan');
                    $query->whereIn('id_layanan', $id_layanan);
                }
                $layanan = $query->paginate(10);
                return view("main", [
                    'page' => "Kip",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil,
                    'staff' => $staff,
                    'instansi' => $instansi,
                    'layanan' => $layanan
                ]);
            }
        }
        return redirect('/');
    }
}