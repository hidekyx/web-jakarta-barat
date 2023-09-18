<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use App\Models\Berita;
use App\Models\Keberatan;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDF;


class LayananController extends Controller
{
    public function maklumat() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Maklumat Informasi Publik'
        ]);
    }

    public function sop() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'SOP PPID'
        ]);
    }

    public function waktubiaya() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Waktu dan Biaya Layanan'
        ]);
    }

    public function kanal() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Kanal Layanan Informasi'
        ]);
    }

    public function kanal_pengaduan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Kanal Pengaduan Resmi'
        ]);
    }
    
    public function prosedur_permohonan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Prosedur Permohonan Pelayanan Informasi'
        ]);
    }

    public function prosedur_keberatan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Prosedur Pengajuan Keberatan Informasi'
        ]);
    }

    public function prosedur_penyelesaian() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Prosedur Permohonan Penyelesaian Sengketa Informasi'
        ]);
    }

    public function prosedur_penanganan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Prosedur Penanganan Sengketa Informasi'
        ]);
    }

    public function formpermohonan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Standar Layanan',
            'subpage' => 'Form Permohonan Informasi Publik'
        ]);
    }

    public function formkeberatan() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,    
            'page' => 'Standar Layanan',
            'subpage' => 'Form Pengajuan Keberatan Informasi Publik'
        ]);
    }

    public function statuspermohonan() {
        $permohonan = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if($results['kode_permohonan'] == "")  {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
            $permohonan = Permohonan::where('kode_permohonan', $results['kode_permohonan'])->first();
            if($permohonan == null) {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'permohonan' => $permohonan,
            'page' => 'Standar Layanan',
            'subpage' => 'Status Permohonan Informasi Publik'
        ]);
    }

    public function cetak_statuspermohonan() {
        $permohonan = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if($results['kode_permohonan'] == "")  {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
            $permohonan = Permohonan::where('kode_permohonan', $results['kode_permohonan'])->first();
            if($permohonan == null) {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
        }

        $pdf = PDF::loadview('front.layanan.cetak_statuspermohonan',['permohonan'=>$permohonan]);
    	return $pdf->download('Status Permohonan PPID - '.$permohonan->kode_permohonan.'.pdf');
    }

    public function statuskeberatan() {
        $keberatan = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if($results['kode_permohonan'] == "")  {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
            $keberatan = DB::table('ppid_keberatan')
            ->leftJoin('ppid_permohonan', 'ppid_keberatan.kode_permohonan', '=', 'ppid_permohonan.kode_permohonan')
            ->select('*', 'ppid_permohonan.status as status_permohonan', 'ppid_keberatan.status as status_keberatan', 'ppid_permohonan.tanggal_respon as tanggal_respon_permohonan', 'ppid_keberatan.tanggal_respon as tanggal_respon_keberatan')
            ->where('ppid_keberatan.kode_permohonan', $results['kode_permohonan'])
            ->first();
            if($keberatan == null) {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
        }
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'keberatan' => $keberatan,
            'page' => 'Standar Layanan',
            'subpage' => 'Status Pengajuan Keberatan Informasi Publik'
        ]);
    }

    public function cetak_statuskeberatan() {
        $keberatan = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if($results['kode_permohonan'] == "")  {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
            $keberatan = DB::table('ppid_keberatan')
            ->leftJoin('ppid_permohonan', 'ppid_keberatan.kode_permohonan', '=', 'ppid_permohonan.kode_permohonan')
            ->select('*', 'ppid_permohonan.status as status_permohonan', 'ppid_keberatan.status as status_keberatan', 'ppid_permohonan.tanggal_respon as tanggal_respon_permohonan', 'ppid_keberatan.tanggal_respon as tanggal_respon_keberatan')
            ->where('ppid_keberatan.kode_permohonan', $results['kode_permohonan'])
            ->first();
            if($keberatan == null) {
                return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
            }
        }

        $pdf = PDF::loadview('front.layanan.cetak_statuskeberatan',['keberatan'=>$keberatan]);
    	return $pdf->download('Status Pengajuan Keberatan PPID - '.$keberatan->kode_permohonan.'.pdf');
    }

    public function formpermohonan_submit(Request $request) {
        $rules = [
            'kategori'          => 'required|string',
            'alamat'            => 'required|string',
            'email'             => 'required|email',
            'no_telp'           => 'required|string',
            'pekerjaan'         => 'required|string',
            'rincian'           => 'required|string',
            'tujuan'            => 'required|string',
            'cara_memperoleh'   => 'required|string',
            'media'             => 'required|string',
            'cara_mendapatkan'  => 'required|string'
        ];

        $messages = [
            'kategori.required'   => 'Kategori wajib diisi',
            'kategori.string'  => 'Kategori tidak valid',
            'alamat.required'   => 'Alamat wajib diisi',
            'alamat.string'  => 'Alamat tidak valid',
            'email.required'   => 'Email wajib diisi',
            'email.email'  => 'Email tidak valid',
            'no_telp.required'   => 'No Telp wajib diisi',
            'no_telp.string'  => 'No Telp tidak valid',
            'pekerjaan.required'   => 'Pekerjaan wajib diisi',
            'pekerjaan.string'  => 'Pekerjaan tidak valid',
            'rincian.required'   => 'Rincian wajib diisi',
            'rincian.string'  => 'Rincian tidak valid',
            'tujuan.required'   => 'Tujuan wajib diisi',
            'tujuan.string'  => 'Tujuan tidak valid',
            'cara_memperoleh.required'   => 'Cara Memperoleh wajib diisi',
            'cara_memperoleh.string'  => 'Cara Memperoleh tidak valid',
            'media.required'   => 'Media wajib diisi',
            'media.string'  => 'Media tidak valid',
            'cara_mendapatkan.required'   => 'Cara Mendapatkan wajib diisi',
            'cara_mendapatkan.string'  => 'Cara Mendapatkan tidak valid'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $tanggal_permohonan = date('Y-m-d');
        $permohonan = new Permohonan([
            'kategori'           => $request->get('kategori'),
            'alamat'             => $request->get('alamat'),
            'email'              => $request->get('email'),
            'no_telp'            => $request->get('no_telp'),
            'pekerjaan'          => $request->get('pekerjaan'),
            'rincian'            => $request->get('rincian'),
            'tujuan'             => $request->get('tujuan'),
            'cara_memperoleh'    => $request->get('cara_memperoleh'),
            'media'              => $request->get('media'),
            'cara_mendapatkan'   => $request->get('cara_mendapatkan'),
            'tanggal_permohonan' => $tanggal_permohonan,
            'status'             => "Menunggu Respon"
        ]);

        $permohonan->save();
        $id_permohonan = $permohonan->id_permohonan;
        $kode_tanggal = explode('-',$tanggal_permohonan);
        if($permohonan->kategori == "Perorangan") {
            $kode_kategori = "P";
        }
        elseif($permohonan->kategori == "Lembaga") {
            $kode_kategori = "L";
        }
        $kode_permohonan = $kode_kategori.$id_permohonan.$kode_tanggal[2].$kode_tanggal[1].$kode_tanggal[0];
        $permohonan_update = Permohonan::find($id_permohonan);
        if (!$permohonan_update) {
            echo "gaada"; die();
        }
        $permohonan_update->kode_permohonan = $kode_permohonan;

        if($permohonan_update->update()) {
            return redirect('/standar-layanan/status-permohonan-informasi-publik?kode_permohonan='.$kode_permohonan);
        }
    }

    public function formkeberatan_submit(Request $request) {
        $rules = [
            'kode_permohonan'      => 'required|string|unique:ppid_keberatan',
            'nik'                  => 'required|string',
            'keterangan_keberatan' => 'required|string'
        ];

        $messages = [
            'kode_permohonan.required'       => 'Kode Permohonan wajib diisi',
            'kode_permohonan.string'         => 'Kode Permohonan tidak valid',
            'kode_permohonan.unique'         => 'Kode Permohonan untuk pengajuan keberatan sedang diproses',
            'nik.required'                   => 'NIK wajib diisi',
            'nik.string'                     => 'NIK tidak valid',
            'keterangan_keberatan.required'  => 'Keterangan wajib diisi',
            'keterangan_keberatan.email'     => 'Keterangan tidak valid'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $permohonan = Permohonan::where('kode_permohonan', $request->get('kode_permohonan'))->first();
        if($permohonan != null) {
            if($permohonan->status == "Ditolak") {
                $tanggal_keberatan = date('Y-m-d');
                $keberatan = new Keberatan([
                    'id_permohonan'         => $permohonan->id_permohonan,
                    'kode_permohonan'       => $request->get('kode_permohonan'),
                    'nik'                   => $request->get('nik'),
                    'keterangan_keberatan'  => $request->get('keterangan_keberatan'),
                    'tanggal_keberatan'     => $tanggal_keberatan,
                    'status'                => "Menunggu Respon"
                ]);
                if($keberatan->save()) {
                    // return redirect()->back()->with('success', 'Berhasil mengajukan keberatan informasi publik');
                    return redirect('/standar-layanan/status-pengajuan-keberatan-informasi-publik?kode_permohonan='.$permohonan->kode_permohonan);
                }
            }
            else {
                return redirect()->back()->withErrors('Kode permohonan sedang diproses!');
            }
        }
        else {
            return redirect()->back()->withErrors('Kode permohonan tidak ditemukan!');
        }
    }
}
