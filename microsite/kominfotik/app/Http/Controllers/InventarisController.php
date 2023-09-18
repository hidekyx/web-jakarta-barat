<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\InventarisBarang;
use App\Models\Layanan;
use App\Models\LayananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AsetImport;
use App\Models\Inventaris;
use App\Models\InventarisAset;
use App\Models\Seksi;

class InventarisController extends Controller
{
    public function barang_list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 2 || $id_role == 4 || $id_role == 6)) {
                $inventaris_barang = InventarisBarang::get();
                $instansi = Instansi::get();
                $id_barang = 1;
                $detail_barang = InventarisBarang::where('id_barang', $id_barang)->first();
                $riwayat_barang = $this->get_riwayat_barang($id_barang);
                // dd($satuan_barang);
                return view("main", [
                    'page' => "Barang-Pakai-Habis",
                    'subpage' => "BarangList",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'inventaris_barang' => $inventaris_barang,
                    'riwayat_barang' => $riwayat_barang,
                    'detail_barang' => $detail_barang,
                    'instansi' => $instansi
                ]);
            }
        }
        return redirect('/');
    }

    public function get_riwayat_barang($id_barang) {
        $layanan_detail = LayananDetail::where('id_layanan_kategori', 5)->where('value', $id_barang)->orderBy('id_layanan_detail', 'DESC')->get();
        foreach($layanan_detail as $key => $ld) {
            $riwayat_barang[$key]['kode_layanan'] = Layanan::where('id_layanan', $ld->id_layanan)->first()->kode_layanan;
            $riwayat_barang[$key]['tanggal'] = Layanan::where('id_layanan', $ld->id_layanan)->first()->tanggal;
            $riwayat_barang[$key]['instansi'] = Layanan::where('id_layanan', $ld->id_layanan)->first()->instansi->nama_instansi;
            $riwayat_barang[$key]['jumlah_terpakai'] = $ld->value_2;
            $riwayat_barang[$key]['hari'] = Carbon::parse(Layanan::where('id_layanan', $ld->id_layanan)->first()->tanggal)->isoFormat('dddd');
            $riwayat_barang[$key]['tanggal'] = Carbon::parse(Layanan::where('id_layanan', $ld->id_layanan)->first()->tanggal)->isoFormat('D MMMM Y');
        }
        return $riwayat_barang;
    }

    public function get_json_barang($id_barang) {
        $data_barang = InventarisBarang::where('id_barang', $id_barang)->first();
        $layanan_detail = LayananDetail::where('id_layanan_kategori', 5)->where('value', $id_barang)->orderBy('id_layanan_detail', 'DESC')->get();
        foreach($layanan_detail as $key => $ld) {
            $riwayat_barang[$key]['kode_layanan'] = Layanan::where('id_layanan', $ld->id_layanan)->first()->kode_layanan;
            $riwayat_barang[$key]['instansi'] = Layanan::where('id_layanan', $ld->id_layanan)->first()->instansi->nama_instansi;
            $riwayat_barang[$key]['jumlah_terpakai'] = $ld->value_2;

            $riwayat_barang[$key]['hari'] = Carbon::parse(Layanan::where('id_layanan', $ld->id_layanan)->first()->tanggal)->isoFormat('dddd');
            $riwayat_barang[$key]['tanggal'] = Carbon::parse(Layanan::where('id_layanan', $ld->id_layanan)->first()->tanggal)->isoFormat('D MMMM Y');
        }
        $satuan = InventarisBarang::where('id_barang', $id_barang)->first()->satuan;

        if($layanan_detail == null) {
            $success = false;
            $message = "Barang tidak ditemukan";
        }
        else {
            $success = true;
            $message = "Barang ditemukan";
        }
        return response()->json([
            'success'  => $success,
            'message'  => $message,
            'riwayat_barang'  => $riwayat_barang,
            'data_barang'  => $data_barang,
            'satuan'  => $satuan
        ]);
    }

    public function aset_list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 2 || $id_role == 4 || $id_role == 6)) {
                $query = Inventaris::orderBy('id_inventaris', 'DESC');
                $seksi = Seksi::get();
                $aset = InventarisAset::get();
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    // dd($results);
                    if(isset($results['bulan_perolehan']) && $results['bulan_perolehan'] != null) {
                        $filter_bulan = explode('-',$results['bulan_perolehan']);
                        $selected_bulan = $filter_bulan[1];
                        $selected_tahun = $filter_bulan[0];
                        $query->whereMonth('tanggal_perolehan', $selected_bulan)->whereyear('tanggal_perolehan', $selected_tahun);
                    }
                    if(isset($results['aset']) && $results['aset'] != null) {
                        $kode = $results['aset'];
                        $query->where('kode_barang_aset', $kode);
                    }
                    if(isset($results['seksi']) && $results['seksi'] != null) {
                        $kode = $results['seksi'];
                        $query->where('id_seksi', $kode);
                    }
                }
                $inventaris = $query->paginate(15);
                return view("main", [
                    'page' => "Barang-Aset",
                    'subpage' => "AsetList",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'inventaris' => $inventaris,
                    'aset' => $aset,
                    'seksi' => $seksi
                ]);
            }
        }
        return redirect('/');
    }

    public function import_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1) {
                return view("main", [
                    'page' => "Barang-Aset",
                    'subpage' => "Import",
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function import_action(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1) {
                Excel::import(new AsetImport, $request->file);
                return redirect()->back()->with('success', 'Data aset berhasil diperbaharui');
            }
        }
        return redirect('/');
    }
}