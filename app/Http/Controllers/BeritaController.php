<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Berita;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;
use Auth;
use PDF;
use Image;

class BeritaController extends Controller
{
    public function api_get_latest_berita() 
    {
        $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video')
        ->orderBy('berita.id', 'DESC')
        ->where('berita.published', 'Y')
        ->limit(10)
        ->get();

        if($berita) {
            return response()->json([
                'success' => true,
                'berita' => $berita
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'berita' => null
            ]);
        }
    }

    public function api_get_latest_berita_wilayah($tags) 
    {
        $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.tags', 'berita.thumbnail', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.caption')
        ->orderBy('berita.id', 'DESC')
        ->where('berita.published', 'Y')
        ->where('berita.tags', 'LIKE', '%'.$tags.'%')
        ->limit(9)
        ->get();

        if($berita) {
            return response()->json([
                'success' => true,
                'berita' => $berita
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'berita' => null
            ]);
        }
    }

    public function api_get_paginate_berita_wilayah($tags) 
    {
        $berita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.tags', 'berita.thumbnail', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.caption')
        ->orderBy('berita.id', 'DESC')
        ->where('berita.published', 'Y')
        ->where('berita.tags', 'LIKE', '%'.$tags.'%')
        ->paginate(10);

        $components = parse_url(url()->full());
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if(isset($results['search'])) {
                $berita = DB::table('berita')
                ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
                ->leftJoin('users', 'berita.writer', '=', 'users.id')
                ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.tags', 'berita.thumbnail', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.caption')
                ->orderBy('berita.id', 'DESC')
                ->where('berita.published', 'Y')
                ->where('berita.tags', 'LIKE', '%'.$tags.'%')
                ->where('berita.content', 'LIKE', '%'.$results['search'].'%')
                ->paginate(10);
            }
        }

        if($berita) {
            return response()->json([
                'success' => true,
                'berita' => $berita
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'berita' => null
            ]);
        }
    }

    public function index() 
    {
        $data = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video')
        // ->where('berita.id', '=', $id)
        ->orderBy('berita.id', 'DESC')
        ->paginate(10);

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            
            foreach($priv as $perm) {
                if($perm->name == 'publish' || $perm->name == 'editor-berita') {
                    $hasRole = true;
                }
            }
            return view('mainmenu.menuberita', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser, 'hasRole'=>$hasRole]);
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function data($id) 
    {
        $post = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video')
        ->where('berita.id', '=', $id)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.detailberita', ['post' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }
    

    public function kategori() 
    {
        // Function kategori ini sebenernya untuk tambah data, 
        // tapi programmer sebelumnya tolol ngasih nama function
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp 
            left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->where('node','=','B')
            ->get();

            $tags = DB::table('tags')
            ->select('*')
            ->where('kategori', null)
            ->get();

            foreach($priv as $perm) {
                if ($perm->name == 'publish') {
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'editor-berita') {
                    $hasRole = 'granted';
                }
                else if ($perm->name == 'reporter-berita') {
                    $hasRole = "reporter"; //khusus untuk role reporter, hanya bisa tambah berita unpublished
                }
                else if ($perm->name == 'subeditor-berita') {
                    $hasRole = "reporter"; //khusus untuk role subeditor, hanya bisa tambah berita unpublished
                }
            }

            if ($hasRole == "granted") {
                return view('MasterMainMenu.masterberita', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser, 'tags'=>$tags]);
            } 
            else if ($hasRole == "reporter") {
                return view('MasterMainMenu.reporterberita', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser, 'tags'=>$tags]);
            }  
            else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        }

        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function delete($id) 
    {
        $delete = Berita::where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Berita berhasil dihapus";
        } 
        
        else {
            $success = true;
            $message = "Berita gagal dihapus";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);

    }

    public function cek_penulis($id) 
    {
        $success = true;
        $message = "Berita gagal dihapus";

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
            'content' => 'required|string',
            'file_4' => 'image|nullable',
            'video' => 'mimes:mp4,mov,ogg,qt|nullable'
        ]);

        $writersementara = Auth::user();
        $publishedDate = null;
        $mytime = Carbon::now();
        $publishedDate = $mytime->toDateTimeString();

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;
        $randomNameVid = null;

        if($request->get('tags') != null) {
            $tags = implode(', ', $request->get('tags'));
        }
        else {
            $tags = null;
        }

        foreach($randomName as $key => $value)
        {
            if ($request->hasFile($key)) {
                $filenameWithExt = $request->file($key)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($key)->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName[$key] = $filenameSimpan;
                $path = $request->file($key)->storeAs('public/berita', $filenameSimpan);
            }
        }

        // thumbnails
        $filename_thumbnail = null;
        if ($request->hasFile('file_utama')) {
            $filenameWithExt = $request->file('file_utama')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_utama')->getClientOriginalExtension();
            $filename_thumbnail = md5($filename. time()).'-thumbnail.'.$extension;
            $image = Image::make($request->file('file_utama'));
            $destinationPath = public_path('storage/berita/thumbnail');
            $image->resize(400,200, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename_thumbnail);
        }

        if ($request->hasFile('video')) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomNameVid = $filenameSimpan;
            $path = $request->file('video')->storeAs('public/berita', $filenameSimpan);
        }

        DB::table('berita')->insert([
            'catID' => $request->catID,
            'title' => $request->title,
            'writer' => $writersementara->id,
            'content' => $request->content,
            'time' => $request->time,
            'caption' => $request->caption,
            'img' => $randomName['file_utama'],
            'img_2' => $randomName['file_2'],
            'img_3' => $randomName['file_3'],
            'img_4' => $randomName['file_4'],
            'thumbnail' => $filename_thumbnail,
            'published' => $request->published,
            'published_date' => $publishedDate,
            'viewed' => 0,
            'tags'=> $tags,
            'video' => $randomNameVid
        ]);
        
        return redirect('/menuberita');
    }

    public function edit($id)
    {
        $editberita = DB::table('berita')
        ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
        ->leftJoin('users', 'berita.writer', '=', 'users.id')
        ->select('berita.id','berita.catID', 'kategori.kategori','berita.writer', 'berita.tags', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.published', 'berita.viewed', 'berita.video', 'berita.caption')
        ->where('berita.id', '=', $id)
        ->get();

        $post = DB::table('kategori')
        ->select('id', 'kategori')
        ->where('node','=','B')
        ->get();

        $tags = DB::table('tags')
        ->select('*')
        ->where('kategori', null)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            foreach($priv as $perm) {
                if($perm->name == 'publish'){
                    $hasRole = 'granted';
                }
                else if($perm->name == 'editor-berita') {
                    $hasRole = "granted"; //khusus untuk role editor, hanya bisa mengedit berita yang ditulisnya
                }
                else if($perm->name == 'reporter-berita') {
                    $hasRole = "reporter"; //khusus untuk role reporter, hanya bisa edit berita unpublished
                }
                else if($perm->name == 'subeditor-berita') {
                    $hasRole = "reporter"; //khusus untuk role subeditor, hanya bisa edit berita unpublished
                }
            }

            if($hasRole == "granted") {
                return view('mainmenu.editberita', ['editberita' => $editberita, 'post'=>$post, 'priv'=>$priv, 'datauser'=>$datauser, 'tags'=>$tags]);
            } 
            else if($hasRole == "reporter") {
                foreach($editberita as $b) { //kondisional reporter tidak bisa mengedit berita orang lain
                    if ($b->writer == $datauser->id) {
                        return view('mainmenu.reportereditberita', ['editberita' => $editberita, 'post'=>$post, 'priv'=>$priv, 'datauser'=>$datauser, 'tags'=>$tags]);
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
            'video' => 'mimes:mp4,mov,ogg,qt'
        ]);

        $editor = Auth::user();

        $randomName = null;
        $randomNameVid = null;

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;
        $randomNameVid = null;

        if($request->get('tags') != null) {
            $tags = implode(', ', $request->get('tags'));
        }
        else {
            $tags = null;
        }

        foreach($randomName as $key => $value)
        {
            if ($request->hasFile($key)) {
                $filenameWithExt = $request->file($key)->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($key)->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName[$key] = $filenameSimpan;
                $path = $request->file($key)->storeAs('public/berita', $filenameSimpan);
            }
        }

        // thumbnails
        if ($request->hasFile('file_utama')) {
            $filenameWithExt = $request->file('file_utama')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_utama')->getClientOriginalExtension();
            $filename_thumbnail = md5($filename. time()).'-thumbnail.'.$extension;
            $image = Image::make($request->file('file_utama'));
            $destinationPath = public_path('storage/berita/thumbnail');
            $image->resize(400,200, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename_thumbnail);
        }

        if ($request->hasFile('video')) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('video')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomNameVid = $filenameSimpan;
            $path = $request->file('video')->storeAs('public/berita', $filenameSimpan);
        }

        

        DB::table('berita')->where('id', '=' , $id)->update([
            'catID' => $request->catID,
            'title' => $request->title,
            'content' => $request->content,
            'time' => $request->time,
            'tags' => $tags,
            'caption' => $request->caption,
            'editor' => $editor->id,
            'published' => $request->published
        ]);

        if ($request->video != null || $request->video != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'video' => $randomNameVid
            ]);
        }
        
        if ($request->file_utama != null || $request->file_utama != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'img' => $randomName['file_utama'],
                'thumbnail' => $filename_thumbnail,
            ]);
        }

        if ($request->file_2 != null || $request->file_2 != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'img_2' => $randomName['file_2'],
            ]);
        }

        if ($request->file_3 != null || $request->file_3 != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'img_3' => $randomName['file_3'],
            ]);
        }

        if ($request->file_4 != null || $request->file_4 != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'img_4' => $randomName['file_4'],
            ]);
        }

        return redirect('/menuberita');
    }

    public function changeStats($id)
    {
        $editor = Auth::user();
        $data = Berita::where('id', $id)->get();

        foreach($data as $datas) {
            if($datas->published == 'N') {
                $data = DB::table('berita')->where('id', '=', $id)->get();
                $response = false;

                foreach($data as $example) {
                    if($example->editor == null) {
                        $response = DB::table('berita')->where('id', '=' , $id)->update([
                            'published' => 'Y',
                            'editor' => $editor->id
                        ]);
                    } 
                    else {
                        $response = DB::table('berita')->where('id', '=' , $id)->update([
                            'published' => 'Y'
                        ]);
                    }
                }

                if ($response == 1) {
                    $success = true;
                    $message = "User deleted successfully";
                } 
                else {
                    $success = true;
                    $message = "User not found";
                }

                //  Return response
                return response()->json([
                    'success' => $success,
                    'message' => $message,
                ]);
            } 
            else {
                $response = DB::table('berita')->where('id', '=' , $id)->update([
                    'published' => 'N'
                ]);
                if ($response == 1) {
                    $success = true;
                    $message = "User deleted successfully";
                } 
                else {
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
