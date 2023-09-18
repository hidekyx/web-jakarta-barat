<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{

	public function index(Request $request){

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            if(Auth::user()->id_role == 8) {
                return redirect('/user-profile/'.Auth::user()->id);
            }
            $data = DB::select(DB::raw("SELECT COUNT(*) as jumlah
                FROM berita
                WHERE MONTH(published_date) = MONTH(CURRENT_DATE())
                AND YEAR(published_date) = YEAR(CURRENT_DATE())"));
            $data2 = DB::select(DB::raw("SELECT COUNT(*) as jumlah
                FROM beritafoto
                WHERE MONTH(time) = MONTH(CURRENT_DATE())
                AND YEAR(time) = YEAR(CURRENT_DATE())"));
            $data3 = DB::select(DB::raw("SELECT COUNT(*) as jumlah
                FROM beritavideo
                WHERE MONTH(tanggal) = MONTH(CURRENT_DATE())
                AND YEAR(tanggal) = YEAR(CURRENT_DATE())"));
            $datauser = Auth::user();
            $array = DB::table('users')
                ->select('id', 'aname', 'remember_token', 'id_role')
                ->where('id', '=', Auth::user()->id)
                ->get();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
                left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
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
            return view("backend.index", ['data'=>$data,'data2'=>$data2,'data3'=>$data3,'datauser'=>$datauser, 'useratt'=>$array, 'priv'=>$priv, 'statistik'=>$statistik]);
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }

	}
}
