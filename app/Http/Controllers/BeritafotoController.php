<?php

namespace App\Http\Controllers;

use App\Beritafoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Auth;
use Google\Service\ServiceControl\Auth as ServiceControlAuth;

class BeritafotoController extends Controller
{
    public function index()
    {
        $data = DB::table('beritafoto')
        ->leftJoin('kategori', 'beritafoto.catID', '=', 'kategori.id')
        ->leftJoin('users', 'beritafoto.writer', '=', 'users.id')
        ->select('users.nama', 'beritafoto.id', 'beritafoto.catID', 'beritafoto.published','kategori.kategori', 'beritafoto.judul', 'beritafoto.lokasi', 'beritafoto.keterangan', 'beritafoto.time', 'beritafoto.img', 'beritafoto.viewed', 'beritafoto.viewed')
        ->orderBy('beritafoto.id', 'DESC')
        ->paginate(10);

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            foreach($priv as $perm) {
                if($perm->name == 'publish' || $perm->name == 'editor-berita' || $perm->name == 'subeditor-berita') {
                    $hasRole = true;
                }
            }
            return view('mainmenu.menuberitafoto', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser, 'hasRole'=>$hasRole]);
        }
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function data($id)
    {
        $data = DB::table('beritafoto')
        ->leftJoin('kategori', 'beritafoto.catID', '=', 'kategori.id')
        ->select('beritafoto.id', 'kategori.kategori', 'beritafoto.judul', 'beritafoto.lokasi', 'beritafoto.keterangan', 'beritafoto.time', 'beritafoto.img', 'beritafoto.viewed', 'beritafoto.viewed')
        ->where('beritafoto.id', '=', $id)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.detailberitafoto', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser]);
        }
        else {
             return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function kategori()
    {
        $post = DB::table('kategori')
        ->select('id', 'kategori')
        ->where('node','=','F')
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            foreach($priv as $perm){
                if ($perm->name == 'publish'){
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'editor-berita'){
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'subeditor-berita'){
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'reporter-berita'){
                    $hasRole = "reporter"; //khusus untuk role reporter, hanya bisa tambah berita unpublished
                }
            }

            if ($hasRole == "granted"){
                return view('MasterMainMenu.masterberitafoto', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            } 
            else if ($hasRole == "reporter") {
                return view('MasterMainMenu.reporterberitafoto', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  
            else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function delete($id)
    {
        $delete = Beritafoto::where('id', $id)->delete();

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
            'file_utama' => 'image|nullable',
            'file_2' => 'image|nullable',
            'file_3' => 'image|nullable',
            'file_4' => 'image|nullable'
        ]);

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;

        $img = null;
        $writersementara = Auth::user();

        foreach($randomName as $key => $value)
        {
            if ($request->hasFile($key)) {
                $filenameWithExt = $request->file($key)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($key)->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName[$key] = $filenameSimpan;
                $path = $request->file($key)->storeAs('public/beritafoto', $filenameSimpan);
            }
        }

        DB::table('beritafoto')->insert([
            'catID' => $request->catID,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'writer' => $writersementara->id,
            'keterangan' => $request->keterangan,
            'time' => $request->time,
            'img' => $randomName['file_utama'],
            'img_2' => $randomName['file_2'],
            'img_3' => $randomName['file_3'],
            'img_4' => $randomName['file_4'],
            'published' => $request->published
        ]);
        return redirect('/menuberitafoto');
    }

    public function edit($id)
    {
        $post = DB::table('kategori')
        ->select('id', 'kategori')
        ->where('node','=','F')
        ->get();
        
        $editberita = DB::table('beritafoto')
        ->leftJoin('kategori', 'beritafoto.catID', '=', 'kategori.id')
        ->select('beritafoto.id', 'beritafoto.catID', 'kategori.kategori', 'beritafoto.published', 'beritafoto.judul', 'beritafoto.writer', 'beritafoto.lokasi', 'beritafoto.keterangan', 'beritafoto.time', 'beritafoto.img', 'beritafoto.img_2', 'beritafoto.img_3', 'beritafoto.img_4', 'beritafoto.viewed', 'beritafoto.viewed')
        ->where('beritafoto.id', '=', $id)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        

            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'publish'){
                    $hasRole = 'granted';
                }
                else if($perm->name == 'editor-berita'){
                    $hasRole = "granted"; //khusus untuk role editor, hanya bisa mengedit berita yang ditulisnya
                }
                else if($perm->name == 'subeditor-berita'){
                    $hasRole = "granted"; //khusus untuk role editor, hanya bisa mengedit berita yang ditulisnya
                }
                else if($perm->name == 'reporter-berita'){
                    $hasRole = "reporter"; //khusus untuk role reporter, hanya bisa tambah berita unpublished
                }
            }

            if($hasRole == "granted"){
                return view('mainmenu/editberitafoto', ['editberitafoto' => $editberita,'kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            } 
            else if($hasRole == "reporter") {
                foreach($editberita as $b) { //kondisional reporter tidak bisa mengedit berita orang lain
                    if ($b->writer == $datauser->id) {
                        return view('mainmenu.reportereditberitafoto', ['editberitafoto' => $editberita, 'kat'=>$post, 'priv'=>$priv, 'datauser'=>$datauser]);
                    }
                    else {
                        return redirect('/dashboard')->with('jsAlert', 'User has no permission to edit this, Access denied!');
                    }
                }
            } 
            else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file_utama' => 'image|nullable',
            'file_2' => 'image|nullable',
            'file_3' => 'image|nullable',
            'file_4' => 'image|nullable',
        ]);

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;

        foreach($randomName as $key => $value)
        {
            if ($request->hasFile($key)) {
                $filenameWithExt = $request->file($key)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($key)->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName[$key] = $filenameSimpan;
                $path = $request->file($key)->storeAs('public/beritafoto', $filenameSimpan);
            }
        }

        DB::table('beritafoto')->where('id', $id)->update([
            'catID' => $request->catID,
            'judul' => $request->judul,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'time' => $request->time,
        ]);

        if ($request->file_utama != null || $request->file_utama != "") {
            DB::table('beritafoto')->where('id', '=' , $id)->update([
                'img' => $randomName['file_utama'],
            ]);
        }

        if ($request->file_2 != null || $request->file_2 != "") {
            DB::table('beritafoto')->where('id', '=' , $id)->update([
                'img_2' => $randomName['file_2'],
            ]);
        }

        if ($request->file_3 != null || $request->file_3 != "") {
            DB::table('beritafoto')->where('id', '=' , $id)->update([
                'img_3' => $randomName['file_3'],
            ]);
        }

        if ($request->file_4 != null || $request->file_4 != "") {
            DB::table('beritafoto')->where('id', '=' , $id)->update([
                'img_4' => $randomName['file_4'],
            ]);
        }
        return redirect('/menuberitafoto');
    }

    public function changeStats($id){

        $data = Beritafoto::where('id', $id)->get();

        foreach($data as $datas){
            if($datas->published == 'N'){
                $response = DB::table('berita')->where('id', '=' , $id)->update([
                    'published' => 'Y'
                ]);

                if ($response == 1) {
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
            } else {
                $response = DB::table('berita')->where('id', '=' , $id)->update([
                    'published' => 'N'
                ]);

                if ($response == 1) {
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
        }

    }
}
