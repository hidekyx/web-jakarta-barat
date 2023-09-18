<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Berita;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Validator;

class KontributorController extends Controller
{
    public function list() 
    {
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            $data = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.nama', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video', 'berita.nama_narahubung')
            ->where('berita.writer', '=', $datauser->id)
            ->orderBy('berita.id', 'DESC')
            ->paginate(10);
            
            foreach($priv as $perm) {
                if($perm->name == 'kontributor-berita') {
                    $hasRole = true;
                }
            }
            return view('mainmenu.kontributor.list_berita', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser, 'hasRole'=>$hasRole]);
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function detail($id) 
    {
        if (Auth::check()) {
            $datauser = Auth::user();
            $post = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('users.nama', 'berita.id', 'berita.catID', 'kategori.kategori','berita.writer', 'berita.tags', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.published', 'berita.viewed', 'berita.video', 'berita.caption', 'berita.nama_narahubung', 'berita.no_kontak_narahubung')
            ->where('berita.id', '=', $id)
            ->first();
            
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));

            // dd($post);
            if($datauser->id == $post->writer) {
                return view('mainmenu.kontributor.detail_berita', ['post' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            }
            else {
                return redirect('/kontributor/list-berita')->with('jsAlert', 'Anda tidak memiliki akses');    
            }
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function create() 
    {
        if (Auth::check()) {
            $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->where('node','=','B')
            ->get();

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            foreach($priv as $perm) {
                if ($perm->name == 'kontributor-berita') {
                    $hasRole = 'granted';
                }
            }
            if ($hasRole == "granted") {
                return view('mainmenu.kontributor.tambah_berita', ['kat' => $post, 'priv'=>$priv, 'datauser'=>$datauser]);
            }   
            else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        }

        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'catID' => 'required|numeric',
            'title' => 'required|string',
            'content' => 'required|string',
            'time' => 'required|date',
            'caption' => 'required|string',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            'file_utama' => 'required|image|max:2000',
            'file_2' => 'image|nullable|max:2000',
            'file_3' => 'image|nullable|max:2000',
            'file_4' => 'image|nullable|max:2000',
        ];
        $messages = [
            'catID.required' => 'Kategori wajib diisi',
            'catID.numeric' => 'Kategori tidak valid',
            'title.required' => 'Judul berita wajib diisi',
            'title.string' => 'Judul berita tidak valid',
            'content.required' => 'Isi berita wajib diisi',
            'content.string' => 'Isi berita tidak valid',
            'time.required' => 'Tanggal berita wajib diisi',
            'time.string' => 'Tanggal berita tidak valid',
            'caption.tequired' => 'Keterangan foto berita wajib diisi',
            'caption.string' => 'Keterangan foto berita tidak valid',
            'file_utama.required' => 'Foto berita wajib diisi',
            'file_utama.image' => 'Format file foto utama tidak valid',
            'file_utama.max' => 'Ukuran file foto melebihi batas maksimal 2MB',
            'file_2.image' => 'Format file foto #2 tidak valid',
            'file_2.max' => 'Ukuran file foto #2 melebihi batas maksimal 2MB',
            'file_3.image' => 'Format file foto #3 tidak valid',
            'file_3.max' => 'Ukuran file foto #3 melebihi batas maksimal 2MB',
            'file_4.image' => 'Format file foto #4 tidak valid',
            'file_4.max' => 'Ukuran file foto #4 melebihi batas maksimal 2MB',
            'video.mimes' => 'Format file video tidak valid',
            'video.max' => 'Ukuran file video melebihi batas maksimal 20MB',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $datauser = Auth::user();
        $publishedDate = null;
        $mytime = Carbon::now();
        $publishedDate = $mytime->toDateTimeString();

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;
        $randomNameVid = null;

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
            'writer' => $datauser->id,
            'content' => $request->content,
            'time' => $request->time,
            'tags' => $datauser->nama,
            'caption' => $request->caption,
            'img' => $randomName['file_utama'],
            'img_2' => $randomName['file_2'],
            'img_3' => $randomName['file_3'],
            'img_4' => $randomName['file_4'],
            'published' => 'N',
            'published_date' => $publishedDate,
            'viewed' => 0,
            'video' => $randomNameVid,
            'nama_narahubung' => $request->nama_narahubung,
            'no_kontak_narahubung' => $request->no_kontak_narahubung,
            'berita_kontributor' => 'kontributor'
        ]);
        
        return redirect('/kontributor/list-berita');
    }

    public function delete($id) 
    {
        $datauser = Auth::user();
        $berita = Berita::where('id', $id)->first();
        if($datauser->id == $berita->writer) {
            $delete = Berita::where('id', $id)->delete();
        }
        if ($delete == 1) {
            $success = true;
            $message = "Berita berhasil dihapus";
        } 
        else {
            $success = true;
            $message = "Berita gagal dihapus";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    

    public function edit($id)
    {
        if (Auth::check()) {
            $editberita = DB::table('berita')
            ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            ->leftJoin('users', 'berita.writer', '=', 'users.id')
            ->select('berita.id','berita.catID', 'kategori.kategori','berita.writer', 'berita.tags', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.img_2', 'berita.img_3', 'berita.img_4', 'berita.published', 'berita.viewed', 'berita.video', 'berita.caption', 'berita.nama_narahubung', 'berita.no_kontak_narahubung')
            ->where('berita.id', '=', $id)
            ->first();

            if(!$editberita) {
                return redirect('/kontributor/list-berita')->with('jsAlert', 'Data berita tidak ditemukan!');
            }

            $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->where('node','=','B')
            ->get();

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;

            foreach($priv as $perm) {
                if($perm->name == 'kontributor-berita'){
                    $hasRole = 'granted';
                }
            }

            if($hasRole == "granted") {
                if($datauser->id == $editberita->writer) {
                    if($editberita->published == "N") {
                        return view('mainmenu.kontributor.edit_berita', ['editberita' => $editberita, 'post'=>$post, 'priv'=>$priv, 'datauser'=>$datauser]);
                    }
                }    
            }
            return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
        } 
        else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'catID' => 'required|numeric',
            'title' => 'required|string',
            'content' => 'required|string',
            'time' => 'required|date',
            'caption' => 'required|string',
            'file_utama' => 'nullable|image|max:2000',
            'file_2' => 'image|nullable|max:2000',
            'file_3' => 'image|nullable|max:2000',
            'file_4' => 'image|nullable|max:2000',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            'nama_narahubung' => 'required|string',
            'no_kontak_narahubung' => 'required|numeric',
        ];
        $messages = [
            'catID.required' => 'Kategori wajib diisi',
            'catID.numeric' => 'Kategori tidak valid',
            'title.required' => 'Judul berita wajib diisi',
            'title.string' => 'Judul berita tidak valid',
            'content.required' => 'Isi berita wajib diisi',
            'content.string' => 'Isi berita tidak valid',
            'time.required' => 'Tanggal berita wajib diisi',
            'time.string' => 'Tanggal berita tidak valid',
            'caption.tequired' => 'Keterangan foto berita wajib diisi',
            'caption.string' => 'Keterangan foto berita tidak valid',
            'file_utama.image' => 'Format file foto utama tidak valid',
            'file_utama.max' => 'Ukuran file foto melebihi batas maksimal 2MB',
            'file_2.image' => 'Format file foto #2 tidak valid',
            'file_2.max' => 'Ukuran file foto #2 melebihi batas maksimal 2MB',
            'file_3.image' => 'Format file foto #3 tidak valid',
            'file_3.max' => 'Ukuran file foto #3 melebihi batas maksimal 2MB',
            'file_4.image' => 'Format file foto #4 tidak valid',
            'file_4.max' => 'Ukuran file foto #4 melebihi batas maksimal 2MB',
            'video.mimes' => 'Format file video tidak valid',
            'video.max' => 'Ukuran file video melebihi batas maksimal 20MB',
            'nama_narahubung.required' => 'Nama narahubung wajib diisi',
            'nama_narahubung.string' => 'Nama narahubung tidak valid',
            'no_kontak_narahubung.required' => 'No kontak narahubung wajib diisi',
            'no_kontak_narahubung.numeric' => 'No kontak narahubung tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $randomName['file_utama'] = null;
        $randomName['file_2'] = null;
        $randomName['file_3'] = null;
        $randomName['file_4'] = null;
        $randomNameVid = null;

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
            'caption' => $request->caption,
            'published' => 'N',
            'nama_narahubung' => $request->nama_narahubung,
            'no_kontak_narahubung' => $request->no_kontak_narahubung,
            'berita_kontributor' => 'kontributor'
        ]);

        if ($request->video != null || $request->video != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'video' => $randomNameVid
            ]);
        }
        
        if ($request->file_utama != null || $request->file_utama != "") {
            DB::table('berita')->where('id', '=' , $id)->update([
                'img' => $randomName['file_utama'],
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

        return redirect('/kontributor/list-berita');
    }
}
