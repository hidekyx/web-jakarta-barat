<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class ProfilController extends Controller{

    public function wilayah(){

        $data = DB::table('profil')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'nama', 'konten')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.profildatatable', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function wilayahedit($id){

        $data = DB::table('profil')
            ->select('*')
            ->where('id','=',$id)
            ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.wilayahedit', ['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function updatewilayah(Request $request, $id){

        DB::table('profil')->where('id', '=' , $id)->update([
            'konten' => $request->konten,
        ]);

        return redirect('/wilayah');
    }

    public function updatefasilitas(Request $request, $id){

        DB::table('fasilitas')->where('id', '=' , $id)->update([
            'alamat' => $request->alamat,
            'pimpinan' => $request->pimpinan,
            'telp' => $request->telp,
            'email' => $request->email,
            'website' => $request->website,
        ]);

        return redirect('/fasilitas');
    }

    public function kecamatan(){

        $data = DB::table('instansi')
        ->select(DB::raw('row_number() over() as nomor'),'id','nama','alamat','telp','email','fax','website','kodepos','tupoksi','img')
        ->where('node', '=', '3')
        ->paginate(10);
        if (Auth::check()) {

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.kecamatandatatable', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function fasilitas(){

        $data = DB::select('SELECT cm.id_menu as idMenu, cm.title_content as title
        from content_menu cm left join fasilitas f on cm.id_menu = f.id_menu
        WHERE cm.identifier = "fasilitas"
        GROUP BY idMenu, title');
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));

            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.fasilitasdatatable', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function fasilitasdetail($id){

        $data = DB::table('fasilitas')
            ->select(DB::raw('row_number() over() as nomor'),'id','nama','pimpinan','alamat','telp','email','website')
            ->where('id_menu', '=', $id)
            ->paginate(10);
        if (Auth::check()) {

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.fasilitasdatatabledetail', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function fasilitasdetailtempat($id){

        $data = DB::table('fasilitas')
            ->select('id','nama','pimpinan','alamat','telp','email','website')
            ->where('id', '=', $id)
            ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'profil'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.fasilitasupdate', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

}
