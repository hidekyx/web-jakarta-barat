<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\InformasiPublik;
use App\Models\Statistik;

class InformasiController extends Controller
{
    public function main() {
        $subpage = null;
        $results = null;
        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->paginate(10);
        $jumlah_download = InformasiPublik::sum('download');
        $currentURL = url()->full();
        $components = parse_url($currentURL);
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if(isset($results['kategori'])) {
                if($results['kategori'] == "Setiap Saat") {
                    if(isset($results['judul'])) {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Setiap Saat")->where('nama_inf', 'LIKE', '%'.$results['judul'].'%')->paginate(10);
                    }
                    else {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Setiap Saat")->paginate(10);
                    }
                }
                elseif($results['kategori'] == "Berkala") {
                    if(isset($results['judul'])) {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Berkala")->where('nama_inf', 'LIKE', '%'.$results['judul'].'%')->paginate(10);
                    }
                    else {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Berkala")->paginate(10);
                    }                    
                }
                elseif($results['kategori'] == "Serta Merta") {
                    if(isset($results['judul'])) {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Serta Merta")->where('nama_inf', 'LIKE', '%'.$results['judul'].'%')->paginate(10);
                    }
                    else {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Serta Merta")->paginate(10);
                    }
                }
                elseif($results['kategori'] == "Dikecualikan") {
                    if(isset($results['judul'])) {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Dikecualikan")->where('nama_inf', 'LIKE', '%'.$results['judul'].'%')->paginate(10);
                    }
                    else {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('kategori', "Dikecualikan")->paginate(10);
                    }
                }
                elseif($results['kategori'] == "") {
                    if(isset($results['judul'])) {
                        $informasi_publik = InformasiPublik::orderBy('id_dftr', 'DESC')->where('nama_inf', 'LIKE', '%'.$results['judul'].'%')->paginate(10);
                    }
                }
            }
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'informasi_publik' => $informasi_publik,
            'jumlah_download' => $jumlah_download,
            'page' => 'Daftar Informasi Publik',
            'results' => $results,
            'subpage' => 'Kota Administrasi Jakarta Barat'
        ]);
    }

    public function informasi_berkala() {
        $informasi = Informasi::where('kategori', 'Berkala')->where('jenis', 'Sub Kategori')->get();
        foreach($informasi as $key => $i) {
            $informasi[$key]['judul'] = Informasi::where('kategori', 'Berkala')->where('jenis', 'Judul')->where('id_subkategori', $i->id_informasi)->get();
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'informasi' => $informasi,
            'page' => 'Informasi Berkala',
            'subpage' => 'Informasi Publik Yang Wajib Disediakan Dan Diumumkan Secara Berkala',
        ]);
    }

    public function informasi_serta_merta() {
        $informasi = Informasi::where('kategori', 'Serta Merta')->where('jenis', 'Sub Kategori')->get();
        foreach($informasi as $key => $i) {
            $informasi[$key]['judul'] = Informasi::where('kategori', 'Serta Merta')->where('jenis', 'Judul')->where('id_subkategori', $i->id_informasi)->get();
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'informasi' => $informasi,
            'page' => 'Informasi Serta Merta',
            'subpage' => 'Informasi Publik Yang Wajib Disediakan Dan Diumumkan Secara Serta Merta',
        ]);
    }

    public function informasi_setiap_saat() {
        $informasi = Informasi::where('kategori', 'Setiap Saat')->where('jenis', 'Sub Kategori')->get();
        foreach($informasi as $key => $i) {
            $informasi[$key]['judul'] = Informasi::where('kategori', 'Setiap Saat')->where('jenis', 'Judul')->where('id_subkategori', $i->id_informasi)->get();
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'informasi' => $informasi,
            'page' => 'Informasi Setiap Saat',
            'subpage' => 'Informasi Publik Yang Wajib Tersedia Setiap Saat',
        ]);
    }

    public function download($id_dftr){
        $informasi_publik = InformasiPublik::find($id_dftr);
        $informasi_publik->download = $informasi_publik->download + 1;
        $informasi_publik->update();
        $link = 'storage/files/ppid_docs/'.$informasi_publik->file;

        return response()->download($link);
    }
}
