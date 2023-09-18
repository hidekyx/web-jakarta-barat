<?php

namespace App\Http\Controllers\Frontend;

use App\Beritafoto;
use App\Beritavideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GlobalFunction;
use Illuminate\Support\Carbon;


class LandingPageController extends Controller
{

    public function main(Request $request)
    {
        // return view("frontend.index",compact('datas'));
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
            ->limit(12)
            ->orderByDesc('berita.published_date')
            ->get();
        $berita1 = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
            ->where('berita.catID', '=', '1')
            ->where('berita.published', '=', 'Y')
            ->limit(12)
            ->orderByDesc('berita.published_date')
            ->get();
        $berita2 = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
            ->where('berita.catID', '=', '2')
            ->where('berita.published', '=', 'Y')
            ->limit(12)
            ->orderByDesc('berita.published_date')
            ->get();
        $berita3 = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
            ->where('berita.catID', '=', '3')
            ->where('berita.published', '=', 'Y')
            ->limit(12)
            ->orderByDesc('berita.published_date')
            ->get();
        $berita4 = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.published_date')
            ->where('berita.catID', '=', '4')
            ->where('berita.published', '=', 'Y')
            ->limit(12)
            ->orderByDesc('berita.published_date')
            ->get();
        $beritavideo = DB::table('beritavideo')
            ->select('*')
            ->where('published','=','Y')
            ->orderByDesc('id')
            ->limit(8)
            ->get();
        $beritafoto = Beritafoto::where('published','=','Y')
            ->limit(8)
            ->orderByDesc('id')
            ->get();
        $banner = DB::select('select * from banner where aktif = "Y" order by id desc limit 16');
        $tags = DB::table('tags')
            ->select('*')
            ->orderByDesc('id')
            ->limit(10)
            ->get();
        $kategori = DB::table('kategori')
            ->select('*')
            ->where('node','=','B')
            ->get();
        $pejabatteras = DB::select('select * from pejabat where node = "T" order by id asc limit 10');
        $running = DB::table('runningtext')
            ->select('*')
            ->get();
        $popup = DB::table('popup')
            ->select('*')
            ->get();
        $portal = DB::table('portal')
            ->select('*')
            ->where('active', '=', true)
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

        // Tambahan fitur dari Afgan, load header dari CMS backend
        $header = DB::table('header')
        ->select('*')
        ->get();

        foreach ($popup as $pp) {
            $status_popup = $pp->aktif;
        }

        // dd($berita1[5]);

        return view("layouts.main", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'berita1' => $berita1, 'berita2' => $berita2, 'berita3' => $berita3, 'berita4' => $berita4, 'berita' => $berita, 'beritavideo' => $beritavideo, 'beritafoto' => $beritafoto, 'pejabat' => $pejabatteras, 'banner' => $banner, 'tags' => $tags, 'kategori'=>$kategori, 'run'=>$running, 'pop'=>$popup, 'status_popup'=>$status_popup, 'portal'=>$portal, 'header'=>$header, 'stats'=>$statistik]);
    }

    public function pekppp()
    {
        $data = DB::table('content_menu')
        ->select('title_content as title')
        ->where('id_menu','=', '52') // ID menu pekppp static = 52
        ->get();
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
        $wilayah = DB::table('profil')
            ->select('*')
            ->where('id_menu', '=', '52')
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
        return view("panels.frontend1.navDetail.pemerintahan.pekppp", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'content' => $wilayah, 'tags' => $tags, 'stats'=>$statistik]);
    }

    public function content($namaSubMenu, $id, $namaMenu)
    {
        if($namaSubMenu == 'wilayah'){
            $data = DB::table('content_menu')
            ->select('title_content as title')
            ->where('id_menu','=',$id)
            ->get();
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
            $wilayah = DB::table('profil')
                ->select('*')
                ->where('id_menu', '=', $id)
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
            return view("panels.frontend1.navDetail.profil.sejarah", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'content' => $wilayah, 'tags' => $tags, 'stats'=>$statistik, 'banner'=>$banner]);
        } else if($namaSubMenu == 'kecamatan & kelurahan'){
            $data = DB::table('content_menu')
                ->select('title_content as title')
                ->where('id_menu','=',$id)
                ->get();
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
            $kecamatan = DB::table('instansi')
                ->select('*')
                ->where('id-menu', '=', $id)
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
            return view("panels.frontend1.navDetail.profil.kecamatancengkareng", ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data,'kecamatan'=>$kecamatan,'berita'=>$berita,'fasilitas'=>$fasilitas,'tags' => $tags, 'stats'=>$statistik, 'banner'=>$banner]);
        } else if($namaSubMenu == 'fasilitas'){
            $data = DB::table('content_menu')
            ->select('title_content as title')
            ->where('id_menu','=',$id)
            ->get();
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
            $fasilitas = DB::table('fasilitas')
            ->select(DB::raw('row_number() over() as nomor'), 'id', 'nama', 'pimpinan', 'alamat', 'telp', 'email', 'website', 'id_menu')
            ->where('id_menu', '=', $id)
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
            return view("panels.frontend1.navDetail.profil.pendidikan",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'content' => $fasilitas, 'tags' => $tags, 'stats'=>$statistik]);
        }
            else if($namaSubMenu == 'lain-lain'){
                $data = DB::table('content_menu')
                ->select('title_content as title')
                ->where('id_menu','=',$id)
                ->get();
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
                return view("panels.frontend1.navDetail.profil.prestasi",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'tags' => $tags, 'stats'=>$statistik]);
                // return view("/panels/frontend1/navDetail/profil/sejarah");
        }
        else if($namaSubMenu == 'profil'){
            $data = DB::table('content_menu')
                ->select('title_content as title')
                ->where('id_menu','=',$id)
                ->get();
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
            $profil = DB::table('pemerintahan')
                ->select('*')
                ->where('id_menu', '=', $id)
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
            return view("panels.frontend1.navDetail.pemerintahan.visimisi",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'profil' => $profil,'tags' => $tags, 'stats'=>$statistik, 'banner'=>$banner]);
            // return view("/panels/frontend1/navDetail/profil/sejarah");
    }
    else if($namaSubMenu == 'pejabat'){
        $data = DB::table('content_menu')
        ->select('title_content as title')
        ->where('id_menu','=',$id)
        ->get();
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

        $pejabat = DB::table('pejabat')
            ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
            ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
            ->where('pejabat.id_menu', '=', $id)
            ->orderBy('pejabat.id')
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
        $currentURL = url()->full();  
        $components = parse_url($currentURL);
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if(isset($results['keyword']) && isset($results['filter'])) {
                if($results['filter'] == "nama") {
                    $pejabat = DB::table('pejabat')
                    ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
                    ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
                    ->where('pejabat.id_menu', '=', $id)
                    ->where('pejabat.nama', 'LIKE', '%'.$results['keyword'].'%')
                    ->orderBy('pejabat.id')
                    ->paginate(10);
                }
                elseif($results['filter'] == "jabatan") {
                    $pejabat = DB::table('pejabat')
                    ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
                    ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
                    ->where('pejabat.id_menu', '=', $id)
                    ->where('pejabat.jabatan', 'LIKE', '%'.$results['keyword'].'%')
                    ->orderBy('pejabat.id')
                    ->paginate(10);
                }
                elseif($results['filter'] == "instansi") {
                    $pejabat = DB::table('pejabat')
                    ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
                    ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
                    ->where('pejabat.id_menu', '=', $id)
                    ->where('instansi.nama', 'LIKE', '%'.$results['keyword'].'%')
                    ->orderBy('pejabat.id')
                    ->paginate(10);
                }
            }
        }
        
        return view("panels.frontend1.navDetail.pemerintahan.pejabatteras",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $data, 'pejabat' => $pejabat, 'tags' => $tags, 'stats'=>$statistik]);
        // return view("/panels/frontend1/navDetail/profil/sejarah");
    }
    else{
        $data = DB::table('content_menu')
            ->select('title_content as title', 'content as content')
            ->where('id_menu','=',$id)
            ->get();
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
        $tags = DB::table('tags')
            ->select('*')
            ->orderByDesc('id')
            ->limit(10)
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
        return view("panels.frontend1.contentmenu",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'data' => $data, 'tags' => $tags, 'stats'=>$statistik]);
        // return view("/panels/frontend1/navDetail/profil/sejarah");
    }

    }


    public function berita($id){
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
            $post = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname','users.nama','berita.editor','berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video','berita.published_date', 'berita.caption', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.thumbnail')
                ->where('berita.id', '=', $id)
                ->where('berita.published', '=', 'Y')
                ->get();


            $editor = DB::table('berita')
                ->leftJoin('users', 'berita.editor', '=', 'users.id')
                ->select('users.nama')
                ->where('berita.id', '=', $id)
                ->get();

            $editeddata = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname','users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video')
                ->where('berita.id', '=', $id)
                ->get();

                foreach($editeddata as $data){
                    DB::table('berita')->where('id', $data->id )->update([
                        'viewed' => $data->viewed + 1,
                    ]);
                }

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
            return view("panels.frontend1.detailberita",  ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $post, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'tags' => $tags, 'stats'=>$statistik, 'editor'=>$editor, 'banner'=>$banner]);
    }

    public function kelurahan($id){
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
            $kelurahan = DB::table('instansi')
                ->select('*')
                ->where('id', '=', $id)
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
            return view('panels.frontend1.navDetail.profil.kelurahan', ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $kelurahan, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'tags' => $tags, 'stats'=>$statistik, 'banner' => $banner]);
    }

    public function pejabat($id){
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
            $pejabat = DB::table('pejabat')
                ->select('*')
                ->where('id', '=', $id)
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
            return view('panels.frontend1.navDetail.pemerintahan.pejabat', ['menu' => $menu, 'submenu' => $submenu, 'mainmenu' => $mainmenu,'data' => $pejabat, 'berita' => $berita, 'fasilitas' => $fasilitas, 'pelayanan' => $pelayanan, 'tags' => $tags, 'stats'=>$statistik]);
    }

    public function stats(){
        $mytime = Carbon::now();
        $publishedDate = $mytime->toDateTimeString();

        DB::table('statistik')->insert([
            'date' => $publishedDate,
        ]);

        return redirect('/');
    }

}
