<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Pejabat;

class PejabatController extends Controller
{
    public function index()
    {
        $data = DB::table('pejabat')
            ->leftJoin('instansi', 'pejabat.instansiID', '=', 'instansi.id')
            ->select('pejabat.id', 'instansi.nama as namaInstansi', 'pejabat.jabatan', 'pejabat.nama', 'pejabat.alamat', 'pejabat.telp', 'pejabat.email', 'pejabat.profil', 'pejabat.img')
            // ->where('berita.id', '=', $id)
            ->orderBy('pejabat.id', 'DESC')
            ->paginate(10);
        return view('master.pejabat', ['data' => $data]);
    }

    public function instansi()
    {
        $post = DB::table('instansi')
            ->select('id', 'nama as namaInstansi')
            ->get();

        return view('master.addpejabat', ['data' => $post]);
    }

    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('pejabat')->insert([
            'instansiID' => $request->instansiID,
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'profil' => $request->profil,
            'img' => $request->img,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pejabat');
    }

    public function delete($id)
    {
        $delete = Pejabat::where('id', $id)->delete();

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

    public function edit($id)
    {
        $data = DB::table('pejabat')
            ->leftJoin('instansi', 'pejabat.instansiID', '=', 'instansi.id')
            ->select('pejabat.id', 'instansi.nama as namaInstansi', 'pejabat.jabatan', 'pejabat.nama', 'pejabat.alamat', 'pejabat.telp', 'pejabat.email', 'pejabat.profil', 'pejabat.img')
            ->where('pejabat.id', '=', $id)
            ->get();
        return view('master.editpejabat', ['editdata' => $data]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('pejabat')->where('id', $request->id)->update([
            'instansiID' => $request->instansiID,
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'email' => $request->email,
            'profil' => $request->profil,
            'img' => $request->img,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pejabat');
    }
    // method untuk insert data ke table pegawai
}
