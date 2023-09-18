<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PemerintahanController extends Controller{

    public function profil(){

        $data = DB::table('pemerintahan')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'nama', 'konten')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.pemerintahandatatable', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function profildetails($id){

        $data = DB::table('profil')
        ->select('*')
        ->where('id', '=', $id)
        ->get();
        $hasRole = false;
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));

            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.editpemerintahan', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function updateprofil(Request $request, $id){

        DB::table('pemerintahan')->where('id', '=' , $id)->update([
            'konten' => $request->konten,
        ]);

        return redirect('/profil');
    }

    public function pejabat(){

        $data = DB::select('SELECT cm.id_menu as idMenu, cm.title_content as title, f.node as node
        from content_menu cm left join pejabat f on cm.id_menu = f.id_menu
        WHERE cm.identifier = "pejabat"
        GROUP BY idMenu, title, node');

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.pejabatdatatable', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
        
    }

    public function pejabatdetail($id){

        $data = DB::table('pejabat')
            ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
            ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
            ->where('pejabat.id_menu', '=', $id)
            ->orderBy('pejabat.id')
            ->paginate(10);

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.pejabatdatatabledetail', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function pejabatdetailkategori($id){

        $data = DB::table('pejabat')
            ->join('instansi', 'pejabat.instansiID', '=', 'instansi.id')
            ->select(DB::raw('row_number() over() as nomor'),'pejabat.id as id', 'pejabat.instansiID as idInstansi', 'pejabat.jabatan as jabatan', 'pejabat.nama as nama', 'pejabat.nip', 'pejabat.pangkat', 'pejabat.agama', 'pejabat.riwayat_jabatan', 'pejabat.riwayat_pendidikan', 'pejabat.profil', 'pejabat.img', 'instansi.nama as instansi')
            ->where('pejabat.id', '=', $id)
            ->get();
        if (Auth::check()) {

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.pejabatedit', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function updatepejabat(Request $request, $id)
    {
        $this->validate($request, [
            'img' => 'image|nullable',
        ]);


        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('pejabat')->where('id', $id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'profil' => $request->profil,
                'nip'=> $request->nip,
                'pangkat'=> $request->pangkat,
                'agama'=> $request->agama,
                'riwayat_jabatan'=> $request->riwayat_jabatan,
                'riwayat_pendidikan'=> $request->riwayat_pendidikan
            ]);
        } else{

            if($request->hasFile('img')){
                $filenameWithExt = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('img')->storeAs('public/pejabat', $filenameSimpan);


            DB::table('pejabat')->where('id', $id)->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'nip'=> $request->nip,
                'pangkat'=> $request->pangkat,
                'agama'=> $request->agama,
                'riwayat_jabatan'=> $request->riwayat_jabatan,
                'riwayat_pendidikan'=> $request->riwayat_pendidikan,
                'img' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/pejabat');
    }

    public function masterpejabat($node, $idMenu)
    {
        $instansi = DB::table('instansi')
            ->select('*')
            ->get();
        if (Auth::check()) {

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'pemerintahan'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.addpejabat', ['node'=>$node, 'idMenu'=>$idMenu, 'instansi'=>$instansi,'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function insertPejabat(Request $request, $node, $idMenu)
    {
        $this->validate($request, [
            'img' => 'image|nullable',
        ]);

        $randomName = null;

        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('img')->storeAs('public/pejabat', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('pejabat')->insert([
            'instansiID' => $request->instansiID,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'img' => $randomName,
            'nip'=> $request->nip,
            'pangkat'=> $request->pangkat,
            'agama'=> $request->agama,
            'riwayat_jabatan'=> $request->riwayat_jabatan,
            'riwayat_pendidikan'=> $request->riwayat_pendidikan,
            'node' => $node,
            'id_menu'=> $idMenu
        ]);

        $reditectPath = '/pejabat/'.$idMenu;

        return redirect($reditectPath);
    }

    public function deletepejabat($id)
    {
        $delete = DB::table('pejabat')->where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function tagsinput(){

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'publish'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.inputtag', ['priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

}
