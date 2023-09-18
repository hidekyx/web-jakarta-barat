<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriFotoController extends Controller
{

    public function main(){
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
        return view('panels.frontend1.galerifoto', ['menu'=>$menu, 'submenu'=>$submenu, 'mainmenu'=>$mainmenu, 'tags'=>$tags, 'stats'=>$statistik]);
	}

    public function list($pejabat){
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
        $foto = DB::table('pejabat_galeri')
            ->select('*')
            ->where('pejabat', $pejabat)
            ->get();
        if (!count($foto)) {
            return redirect('/galeri-foto-pejabat');
        }
        return view('panels.frontend1.galerifotolist', ['foto'=>$foto, 'menu'=>$menu, 'submenu'=>$submenu, 'mainmenu'=>$mainmenu, 'tags'=>$tags, 'stats'=>$statistik]);
	}
}
