<?php

namespace App\Http\Controllers\Frontend;

use App\Beritafoto;
use App\Beritavideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GlobalFunction;
use phpDocumentor\Reflection\DocBlock\Tag;
use SebastianBergmann\Environment\Console;

class PublikasiController extends Controller{

    public function berita(){
        $query_berita = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
            ->where('berita.published', '=', 'Y')
            ->orderByDesc('berita.published_date');

        $results = null;
        $selected_bulan = null;
        $selected_tahun = null;
        $currentURL = url()->full();
        $components = parse_url($currentURL);
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if(isset($results['bulan']) && $results['bulan'] != null) {
                $filter_bulan = explode('-',$results['bulan']);
                $selected_bulan = $filter_bulan[1];
                $selected_tahun = $filter_bulan[0];
                $query_berita->whereMonth('time', $selected_bulan)->whereyear('time', $selected_tahun);
            }
            if(isset($results['konten']) && $results['konten'] != null) {
                $konten = $results['konten'];
                $query_berita->where('berita.title', 'like', "%$konten%");
            }
        }
        $berita = $query_berita->paginate(6);

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
            ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id', 'link')
            ->whereNotNull('id_menu')
            ->whereNotNull('id_submenu')
            ->get();
        $kategori = DB::table('kategori')
            ->select('kategori')
            ->where('node', 'F')
            ->get();
        $beritaterbaru = DB::table('berita')
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
        $banner = DB::table('banner')
            ->select('*')
            ->orderByDesc('id')
            ->first();
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
        return view("panels.frontend1.navDetail.publikasi.berita", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'kategori' => $kategori, 'berita' => $berita, 'beritaterbaru' => $beritaterbaru, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'tags'=>$tags, 'stats'=>$statistik, 'banner' => $banner]);

    }

    public function beritafoto(){
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
        ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id', 'link')
        ->whereNotNull('id_menu')
        ->whereNotNull('id_submenu')
        ->get();
    $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.published', '=', 'Y')
        ->orderByDesc('id')
        ->paginate(6);
    $beritafoto= DB::table('beritafoto')
        ->leftJoin('kategori', 'beritafoto.catID', '=', 'kategori.id')
        ->select('beritafoto.id', 'kategori.kategori', 'beritafoto.judul', 'beritafoto.lokasi', 'beritafoto.keterangan', 'beritafoto.img', 'beritafoto.published', 'beritafoto.viewed')
        ->where('beritafoto.published', '=', 'Y')
        ->orderByDesc('id')
        ->paginate(6);
    $beritaheadline = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.published', '=', 'Y')
        ->limit(5)
        ->get();
        $beritaterbaru = DB::table('berita')
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
                ->limit(5)
                ->get();
            $banner = DB::table('banner')
                ->select('*')
                ->orderByDesc('id')
                ->first();
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
    return view("panels.frontend1.navDetail.publikasi.beritafoto", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'berita' => $berita, 'beritaterbaru' => $beritaterbaru, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'beritaheadline'=> $beritaheadline,'tags'=>$tags, 'beritafoto'=>$beritafoto, 'stats'=>$statistik, 'banner'=>$banner]);

    }

    public function beritavideo(){
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
        ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id', 'link')
        ->whereNotNull('id_menu')
        ->whereNotNull('id_submenu')
        ->get();

        $beritavideo = DB::table('beritavideo')
            ->leftJoin('kategori', 'beritavideo.catID', '=', 'kategori.id')
            ->select('beritavideo.id', 'kategori.kategori', 'beritavideo.judul', 'beritavideo.tanggal', 'beritavideo.deskripsi', 'beritavideo.source', 'beritavideo.published', 'beritavideo.viewed', 'beritavideo.thumbnail')
            ->where('published','=','Y')
            ->orderByDesc('id')
            ->limit(1)
            ->get();

        $banner = DB::table('banner')
            ->select('*')
            ->orderByDesc('id')
            ->first();

        $beritavideolist =  DB::table('beritavideo')
        ->leftJoin('kategori', 'beritavideo.catID', '=', 'kategori.id')
        ->select('beritavideo.id', 'kategori.kategori', 'beritavideo.judul', 'beritavideo.tanggal', 'beritavideo.deskripsi', 'beritavideo.source', 'beritavideo.published', 'beritavideo.viewed', 'beritavideo.thumbnail')
        ->where('published','=','Y')
        ->orderByDesc('id')
        ->paginate(9);

        $beritaheadline = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.published', '=', 'Y')
        ->limit(5)
        ->get();
        $beritaterbaru = DB::table('berita')
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
    return view("panels.frontend1.navDetail.publikasi.beritavideo", ['banner' => $banner, 'menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'beritavideolist'=>$beritavideolist,'beritavideo' => $beritavideo, 'beritaterbaru' => $beritaterbaru, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'beritaheadline'=> $beritaheadline,'tags'=>$tags, 'stats'=>$statistik]);

    }


    public function beritaonsearch($tags){
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
        ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id', 'link')
        ->whereNotNull('id_menu')
        ->whereNotNull('id_submenu')
        ->get();
    $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.tags', 'like', "%$tags%")
        ->where('berita.published', '=', 'Y')
        ->orderByDesc('berita.published_date')
        ->paginate(10);
    $beritaheadline = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.published', '=', 'Y')
        ->limit(5)
        ->orderByDesc('berita.published_date')
        ->get();
        $beritaterbaru = DB::table('berita')
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
    return view("panels.frontend1.navDetail.publikasi.berita", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'berita' => $berita, 'beritaterbaru' => $beritaterbaru, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'beritaheadline'=> $beritaheadline,'tags'=>$tags, 'stats'=>$statistik]);

    }

    public function cariberita($param){
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
        ->select('keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'id', 'link')
        ->whereNotNull('id_menu')
        ->whereNotNull('id_submenu')
        ->get();
    $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.title', 'like', "%$param%")
        ->where('berita.published', '=', 'Y')
        ->orderByDesc('berita.published_date')
        ->paginate(10);
    $beritaheadline = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
        ->where('berita.published', '=', 'Y')
        ->limit(5)
        ->orderByDesc('berita.published_date')
        ->get();
        $beritaterbaru = DB::table('berita')
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
    return view("panels.frontend1.navDetail.publikasi.berita", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'berita' => $berita, 'beritaterbaru' => $beritaterbaru, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'beritaheadline'=> $beritaheadline,'tags'=>$tags, 'stats'=>$statistik]);

    }

}
