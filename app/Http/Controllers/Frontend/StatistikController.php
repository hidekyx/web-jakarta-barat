<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class StatistikController extends Controller
{
	public function list(){
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
            ->limit(3)
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
        $laporan_statistik = DB::table('laporan_statistik')
            ->select('*')
            ->orderByDesc('id')
            ->paginate(10);
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
        return view('panels.frontend1.navDetail.statistik.statistik', ['menu'=>$menu, 'submenu'=>$submenu, 'mainmenu'=>$mainmenu, 'berita'=>$berita, 'fasilitas'=>$fasilitas, 'pelayanan'=>$pelayanan, 'laporan_statistik'=>$laporan_statistik, 'tags'=>$tags, 'stats'=>$statistik]);
	}
}
