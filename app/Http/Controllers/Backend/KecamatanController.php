<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class KecamatanController extends Controller{

    public function kecamatandetail($id)
    {
        $data = DB::table('instansi')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.kecamatandetail', ['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
    }

    public function kelurahan($id){

        $data = DB::table('instansi')
            ->select(DB::raw('row_number() over() as nomor'),'id','nama','alamat','telp','email')
            ->where('sub','=', $id)
            ->paginate(10);
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.kelurahandatatable', ['data'=>$data, 'idKec'=>$id, 'priv'=>$priv, 'datauser'=>$datauser]);
    }

    public function kelurahandetail($id){
        $data = DB::table('instansi')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            return view('mainmenu.editkelurahan', ['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
    }

    public function inputkelurahan($id){
        $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        return view('mainmenu.addkelurahan', ['idKec'=>$id, 'priv'=>$priv, 'datauser'=>$datauser]);
    }

    public function updatekecamatan(Request $request, $id){

        $this->validate($request, [
            'img' => 'image|nullable',
        ]);


        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('instansi')->where('id', $id)->update([
                'tupoksi' => $request->tupoksi,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'website' => $request->website,
                'profil' => $request->profil
            ]);
        } else{

            if($request->hasFile('img')){
                $filenameWithExt = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('img')->storeAs('public/kecamatan&kelurahan', $filenameSimpan);


            DB::table('instansi')->where('id', $id)->update([
                'tupoksi' => $request->tupoksi,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'profil' => $request->profil,
                'website' => $request->website,
                'img' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/kecamatan');
    }

    public function insertkelurahan(Request $request, $id){
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
            $path = $request->file('img')->storeAs('public/kecamatan&kelurahan', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('instansi')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'img' => $randomName,
            'telp' => $request->telp,
            'profil'=> $request->profil,
            'tupoksi' => $request->tupoksi,
            'kodepos' => $request->kodepos,
            'website' => $request->website,
        ]);

        $reditectPath = '/kelurahan/'.$id;

        return redirect($reditectPath);
    }

    public function updatekelurahan(Request $request, $id){

        $this->validate($request, [
            'img' => 'image|nullable',
        ]);


        $img = null;

        if($request->img == "" || $request->img == null){
            DB::table('instansi')->where('id', $id)->update([
                'tupoksi' => $request->tupoksi,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'website' => $request->website,
                'profil' => $request->profil
            ]);
        } else{

            if($request->hasFile('img')){
                $filenameWithExt = $request->file('img')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('img')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $img = $filenameSimpan;
                $path = $request->file('img')->storeAs('public/kecamatan&kelurahan', $filenameSimpan);


            DB::table('instansi')->where('id', $id)->update([
                'tupoksi' => $request->tupoksi,
                'kodepos' => $request->kodepos,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'email' => $request->email,
                'profil' => $request->profil,
                'website' => $request->website,
                'img' => $img
            ]);
            }else{
                // tidak ada file yang diupload
            }
        }
        // alihkan halaman ke halaman pegawai
        return redirect('/kecamatan');
    }
}
