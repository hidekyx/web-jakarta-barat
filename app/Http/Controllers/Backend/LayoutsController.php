<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class LayoutsController extends Controller{


    public function text(){
        $data = DB::table('runningtext')
        ->select('*')
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.runningtext', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function popup(){
        $data = DB::table('popup')
        ->select('*')
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.popupsetting', ['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function popupset(Request $request, $id){

        $this->validate($request, [
            'img' => 'image|nullable',
        ]);

        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('popup')->where('id', $id)->update([
                'nama' => $request->nama,
                'aktif' => $request->aktif,
                'ket' => $request->ket
            ]);
        } else{

            if($request->hasFile('img')){
                $filenameWithExt = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('img')->storeAs('public/popup', $filenameSimpan);


            DB::table('popup')->where('id', $id)->update([
                'nama' => $request->nama,
                'ket' => $request->ket,
                'aktif' => $request->aktif,
                'img' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/popup-content');
    }

    public function updaterunningtext(Request $request){
        DB::table('runningtext')->update([
            'teks' => $request->teks
        ]);

        return redirect('/running-text');
    }

    public function portal(){
        $data = DB::table('portal')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'logo', 'link', 'active')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.portalsetting', ['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function portalinsert(){
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.portaladd',['priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function portaledit($id){
        $data = DB::table('portal')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'logo', 'link', 'active')
        ->where('id','=',$id)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.portaledit', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function pertalnew(Request $request){

        $this->validate($request, [
            'logo' => 'image',
        ]);

        $logo = null;

        if($request->hasFile('logo')){
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $logo = $filenameSimpan;
            $path = $request->file('logo')->storeAs('public/portal', $filenameSimpan);

        }else{
            // tidak ada file yang diupload
        }

        DB::table('portal')->insert([
            'link' => $request->link,
            'active' => $request->active,
            'logo' => $logo
        ]);

        return redirect('/portal');
    }

    public function pertalupdate(Request $request, $id){

        $this->validate($request, [
            'logo' => 'image|nullable',
        ]);

        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('portal')->where('id', $id)->update([
                'link' => $request->link,
                'active' => $request->active,
            ]);
        } else{

            if($request->hasFile('logo')){
                $filenameWithExt = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('logo')->storeAs('public/popup', $filenameSimpan);


            DB::table('portal')->where('id', $id)->update([
                'link' => $request->link,
                'active' => $request->active,
                'logo' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }

        return redirect('/portal');
    }

    public function pertaldelete($id)
    {
        $delete = DB::table('portal')->where('id', $id)->delete();

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

    // Tambahan fitur dari Afgan
    public function headerlist(){
        $data = DB::table('header')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'title', 'img', 'aktif')
        ->orderBy('id')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.headerlist', ['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function headeredit($id){
        $data = DB::table('header')
        ->select(DB::raw('row_number() over() as nomor'), 'id', 'title', 'img', 'aktif')
        ->where('id','=',$id)
        ->get();

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('mainmenu.headeredit', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function headerupdate(Request $request, $id){

        $this->validate($request, [
            'img' => 'image|nullable',
        ]);

        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('header')->where('id', $id)->update([
                'title' => $request->title,
                'aktif' => $request->aktif,
            ]);
        } else{

            if($request->hasFile('img')){
                $filenameWithExt = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('img')->storeAs('public/header', $filenameSimpan);


            DB::table('header')->where('id', $id)->update([
                'title' => $request->title,
                'aktif' => $request->aktif,
                'img' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }

        return redirect('/header-list');
    }

}
