<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\infografis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InfografisController extends Controller
{
    public function api_get_latest_infografis() 
    {
        $infografis = DB::table('banner')
        ->select('id', 'nama', 'link', 'img')
        ->orderBy('id', 'DESC')
        ->where('aktif', 'Y')
        ->where('tags', 'batik - security awareness')
        ->limit(4)
        ->get();

        if($infografis) {
            return response()->json([
                'success' => true,
                'infografis' => $infografis
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'infografis' => null
            ]);
        }
    }

    public function api_get_infografis() 
    {
        $infografis = DB::table('banner')
        ->select('id', 'nama', 'link', 'img')
        ->orderBy('id', 'DESC')
        ->where('aktif', 'Y')
        ->where('tags', 'batik - security awareness')
        ->get();

        if($infografis) {
            return response()->json([
                'success' => true,
                'infografis' => $infografis
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'infografis' => null
            ]);
        }
    }

    public function api_get_infografis_statistik() 
    {
        $infografis = DB::table('banner')
        ->select('id', 'nama', 'link', 'img')
        ->orderBy('id', 'DESC')
        ->where('aktif', 'Y')
        ->where('tags', 'batik - statistik')
        ->get();

        if($infografis) {
            return response()->json([
                'success' => true,
                'infografis' => $infografis
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'infografis' => null
            ]);
        }
    }

    public function index()
    {
        $get = DB::table('banner')
            ->orderBy('id', 'DESC')
            ->paginate(10);
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
                return view('mainmenu.infografis', ['data' => $get, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function addNew(){

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
                $tags = DB::table('tags')->select('*')->where('kategori', 'infografis')->get();
                return view('MasterMainMenu.addinfografis',['datauser'=>$datauser, 'priv'=>$priv, 'tags'=>$tags]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function delete($id)
    {
        $delete = infografis::where('id', $id)->delete();

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

    public function store(Request $request)
    {
        $this->validate($request, [
            'img' => 'image|required'
        ]);


        $randomName = null;

        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('img')->storeAs('public/banner', $filenameSimpan);
            // insert data ke table pegawai

            DB::table('banner')->insert([
                'nama' => $request->nama,
                'link' => $request->link,
                'tags' => $request->tags,
                'img' => $randomName,
                'aktif' => $request->published,
            ]);
        }else{
            // tidak ada file yang diupload
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/infografis');
    }

    public function edit($id)
    {
        $post = DB::table('banner')
            ->where('banner.id', '=', $id)
            ->get();
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
                $tags = DB::table('tags')->select('*')->where('kategori', 'infografis')->get();
                return view('mainmenu.editinfografis', ['edit' => $post, 'priv'=>$priv, 'datauser'=>$datauser, 'tags'=>$tags]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'img' => 'image|nullable'
        ]);


        $randomName = null;

        if($request->hasFile('img')){
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('img')->storeAs('public/banner', $filenameSimpan);
            // insert data ke table pegawai

            DB::table('banner')->where('id', '=' , $id)->update([
                'nama' => $request->nama,
                'link' => $request->link,
                'tags' => $request->tags,
                'img' => $randomName,
                'aktif' => $request->published,
            ]);
        }else{

            DB::table('banner')->where('id', '=' , $id)->update([
                'nama' => $request->nama,
                'link' => $request->link,
                'tags' => $request->tags,
                'aktif' => $request->published,
            ]);
            // tidak ada file yang diupload
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/infografis');
    }
}
