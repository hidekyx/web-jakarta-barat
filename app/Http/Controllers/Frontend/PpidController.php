<?php

namespace App\Http\Controllers\Frontend;

use App\Beritafoto;
use App\Beritavideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GlobalFunction;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class PpidController extends Controller
{
    public function struktur(){
        $walikota = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'Walikota')
              ->get();
            $sekretaris = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'Sekretaris Kota')
              ->get();
            $baginfo = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'KEPALA BAGIAN KEPEGAWAIAN, TATALAKSANA,  dan PELAYANAN PUBLIK')
              ->get();
            $bagumum = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'KEPALA BAGIAN UMUM DAN PROTOKOL')
              ->get();
            $baglola = DB::table('pejabat')
                ->select('*')
                ->where('jabatan', '=', 'KEPALA BAGIAN TATA PEMERINTAHAN')
                ->get();
            $bagsengketa = DB::table('pejabat')
            ->select('*')
            ->where('jabatan', '=', 'KEPALA BAGIAN HUKUM')
            ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));

            return view('panels.frontend1.navDetail.ppid.struktur-ppid', ['walkot'=>$walikota,'sek'=>$sekretaris,'bag1'=>$baginfo,'bag2'=>$bagumum,'bag3'=>$baglola,'bag4'=>$bagsengketa, 'stats'=>$statistik]);

    }

    public function publik($param){
        $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $data = DB::table('ppid_daftar_i')
            ->select(DB::raw('row_number() over() as nomor'), 'penanggung_jaw','id_dftr', 'nama_inf', 'detail_inf', 'kategori', 'file', 'download')
            ->orderByDesc('id_dftr')
            ->where('kategori', '=', $param)
            ->paginate(5);
            $jumlah_download = DB::table('ppid_daftar_i')
            ->sum('download');
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));

                return view('panels.frontend1.navDetail.ppid.info-publik', ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'data'=>$data, 'jumlah_download'=>$jumlah_download, 'tags'=>$tags, 'stats'=>$statistik]);
    }

    public function download($id){
        $data = DB::table('ppid_daftar_i')
            ->select('file', 'download', 'kategori')
            ->where('id_dftr', $id)
            ->first();

        $download = $data->download + 1;
        DB::table('ppid_daftar_i')->where('id_dftr', $id)->update([
            'download' => $download
        ]);

        return response()->download('storage/ppid_docs/'.$data->file);
        // return back();
    }

    public function main($ket){
        if($ket == 'profil'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.profil', ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        } else if($ket == 'visi-misi'){

            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.visi-misi',  ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        }else if($ket == 'struktur'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();

            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $walikota = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'Walikota')
              ->get();
            $sekretaris = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'Sekretaris Kota')
              ->get();
            $baginfo = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'KEPALA BAGIAN KEPEGAWAIAN, TATALAKSANA,  dan PELAYANAN PUBLIK')
              ->get();
            $bagumum = DB::table('pejabat')
              ->select('*')
              ->where('jabatan', '=', 'KEPALA BAGIAN UMUM DAN PROTOKOL')
              ->get();
            $baglola = DB::table('pejabat')
                ->select('*')
                ->where('jabatan', '=', 'KEPALA BAGIAN TATA PEMERINTAHAN')
                ->get();
            $bagsengketa = DB::table('pejabat')
            ->select('*')
            ->where('jabatan', '=', 'KEPALA BAGIAN HUKUM')
            ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.struktur',  ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags,'walkot'=>$walikota,'sek'=>$sekretaris,'bag1'=>$baginfo,'bag2'=>$bagumum,'bag3'=>$baglola,'bag4'=>$bagsengketa, 'stats'=>$statistik]);

        }else if($ket == 'hukum&sop'){
            return view('panels.frontend1.navDetail.ppid.hukum');
        }else if($ket == 'maklumat'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.maklumat', ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        }else if($ket == 'ppidprov'){
            return view('panels.frontend1.navDetail.ppid.ppid-prov');
        }else if($ket == 'daftar-info-publik'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $data = DB::table('ppid_daftar_i')
            ->select(DB::raw('row_number() over() as nomor'), 'penanggung_jaw','id_dftr', 'nama_inf', 'detail_inf', 'kategori', 'file', 'download')
            ->orderByDesc('id_dftr')
            ->paginate(5);
            $jumlah_download = DB::table('ppid_daftar_i')
            ->sum('download');
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.info-publik', ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'data'=>$data, 'jumlah_download'=>$jumlah_download, 'tags'=>$tags, 'stats'=>$statistik]);
        }else if($ket == 'layanan'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.layanan', ['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        }else if($ket == 'laporan-informasi'){
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.laporan',['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        }else if($ket == 'formulir-informasi'){
            return view('panels.frontend1.navDetail.ppid.formulir');
        }else{
            $menu = DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu')
            ->whereNull('id_menu')
            ->get();
            $submenu =  DB::table('menu')
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id', 'link', DB::raw('(CASE WHEN link like "%https%" THEN 1 ELSE 0 END) AS blank'))
            ->whereNotNull('id_menu')
            ->whereNull('id_submenu')
            ->get();
            $mainmenu = DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id','link')
                ->whereNotNull('id_menu')
                ->whereNotNull('id_submenu')
                ->get();
            $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
                ->where('berita.published', '=', 'Y')
                ->limit(5)
                ->orderByDesc('berita.published_date')
                ->get();
            $fasilitas =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_submenu', '=', 11)
                ->get();
            $pelayanan =  DB::table('menu')
                ->select('keterangan', 'href_status as href', 'id', 'link', 'width', 'submenu', 'icon')
                ->where('id_menu', '=', 3)
                ->get();
            $tags = DB::table('tags')
                ->select('*')
                ->orderByDesc('id')
                ->limit(10)
                ->get();
            $statistik = DB::select(DB::raw("SELECT (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE())) as hari,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())
                and DAY(`date`) = DAY(CURRENT_DATE()-1)) as kemarin,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())
                AND YEAR(`date`) = YEAR(CURRENT_DATE())) as bulanIni,
                (SELECT COUNT(*) from statistik s
                WHERE MONTH(`date`) = MONTH(CURRENT_DATE())) as tahunIni,
                (SELECT COUNT(*) from statistik) as total"));
            return view('panels.frontend1.navDetail.ppid.kontak',['menu'=>$menu,'submenu'=>$submenu,'mainmenu'=>$mainmenu,'berita'=>$berita,'fasilitas'=>$fasilitas,'pelayanan'=>$pelayanan,'tags'=>$tags, 'stats'=>$statistik]);
        }
    }
}
