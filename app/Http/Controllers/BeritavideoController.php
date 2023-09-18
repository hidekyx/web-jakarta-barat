<?php

namespace App\Http\Controllers;

use App\Beritavideo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BeritavideoController extends Controller
{
    public function index()
    {
        $data = DB::table('beritavideo')
            ->leftJoin('kategori', 'beritavideo.catID', '=', 'kategori.id')
            ->leftJoin('users', 'beritavideo.writer', '=', 'users.id')
            ->select('users.nama', 'beritavideo.id', 'kategori.kategori', 'beritavideo.judul', 'beritavideo.tanggal', 'beritavideo.source', 'beritavideo.deskripsi', 'beritavideo.viewed', 'beritavideo.published')
            ->orderBy('beritavideo.id', 'DESC')
            ->paginate(10);
         if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
             $hasRole = false;
             foreach($priv as $perm){
                if($perm->name == 'publish' || $perm->name == 'editor-berita' || $perm->name == 'subeditor-berita') {
                     $hasRole = true;
                 }
             }
            return view('mainmenu.menuberitavideo', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser, 'hasRole'=>$hasRole]);
          } else {
             return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
         }
    }

    public function delete($id)
    {
        $delete = Beritavideo::where('id', $id)->delete();

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

    public function data($id)
    {
        $data = DB::table('beritavideo')
            ->leftJoin('kategori', 'beritavideo.catID', '=', 'kategori.id')
            ->select('beritavideo.id', 'kategori.kategori', 'beritavideo.judul', 'beritavideo.tanggal', 'beritavideo.source', 'beritavideo.deskripsi', 'beritavideo.viewed', 'beritavideo.published')
            ->where('beritavideo.id', '=', $id)
            ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.detailberitavideo', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser]);
          } else {
             return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
         }
    }

    public function kategori()
    {
        $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->where('node','=','V')
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
                else if ($perm->name == 'editor-berita'){
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'subeditor-berita'){
                    $hasRole = 'granted';
                }
                else if($perm->name == 'reporter-berita'){
                    $hasRole = "reporter"; //khusus untuk role reporter, hanya bisa tambah berita unpublished
                }
            }
            if($hasRole == "granted"){
                return view('MasterMainMenu.masterberitavideo', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else if($hasRole == "reporter") {
                return view('MasterMainMenu.reporterberitavideo', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'thumbnail' => 'image|nullable',
        ]);

        $thumbnail = null;
        $writersementara = Auth::user();

        $source = "https://www.youtube.com/embed/".$request->source;

        if($request->hasFile('thumbnail')){
            $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $thumbnail = $filenameSimpan;
            $path = $request->file('thumbnail')->storeAs('public/beritavideo', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        // insert data ke table pegawai
        DB::table('beritavideo')->insert([
            'catID' => $request->catID,
            'judul' => $request->judul,
            'writer' => $writersementara->id,
            'tanggal' => $request->tanggal,
            'source' => $source,
            'deskripsi' => $request->deskripsi,
            'published' => $request->published,
            'thumbnail' => $thumbnail
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/menuberitavideo');
    }

    public function edit($id)
    {

        $post = DB::table('kategori')
        ->select('id', 'kategori')
        ->where('node','=','V')
        ->get();
        
        $editberita = DB::table('beritavideo')
        ->leftJoin('kategori', 'beritavideo.catID', '=', 'kategori.id')
        ->select('beritavideo.id', 'kategori.kategori', 'beritavideo.catID','beritavideo.judul', 'beritavideo.writer', 'beritavideo.tanggal', 'beritavideo.source', 'beritavideo.deskripsi', 'beritavideo.viewed', 'beritavideo.published', 'beritavideo.thumbnail')
        ->where('beritavideo.id', '=', $id)
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
                    $hasRole = "granted";
                }
                else if($perm->name == 'subeditor-berita'){
                    $hasRole = "granted";
                }
                else if($perm->name == 'reporter-berita'){
                    $hasRole = "reporter";
                }
            }

            if($hasRole == "granted"){
                return view('mainmenu/editberitavideo', ['editberitavideo' => $editberita, 'kat' => $post,'priv'=>$priv, 'datauser'=>$datauser]);
            } 
            else if($hasRole == "reporter") {
                foreach($editberita as $b) { //kondisional reporter tidak bisa mengedit berita orang lain
                    if ($b->writer == $datauser->id) {
                        return view('mainmenu.reportereditberitavideo', ['editberitavideo' => $editberita, 'kat'=>$post, 'priv'=>$priv, 'datauser'=>$datauser]);
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
            'thumbnail' => 'image|nullable',
        ]);


        $thumbnail = null;
        $source = "https://www.youtube.com/embed/".$request->source;

        if($request->thumbnail == "" || $request->thumbnail == null){
            DB::table('beritavideo')->where('id', $id)->update([
                'catID' => $request->catID,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'source' => $source,
                'deskripsi' => $request->deskripsi,
                'published' => $request->published
            ]);
        } else{

            if($request->hasFile('thumbnail')){
                $filenameWithExt = $request->file('thumbnail')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $thumbnail = $filenameSimpan;
                $path = $request->file('thumbnail')->storeAs('public/beritavideo', $filenameSimpan);

            }else{
            }

            DB::table('beritavideo')->where('id', $id)->update([
                'catID' => $request->catID,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'source' => $source,
                'deskripsi' => $request->deskripsi,
                'published' => $request->published,
                'thumbnail' => $thumbnail
            ]);
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/menuberitavideo');
    }

    public function changeStats($id){

        $data = Beritavideo::where('id', $id)->get();

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
