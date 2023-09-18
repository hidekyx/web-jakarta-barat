<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kategoriberita;
use Illuminate\Support\Facades\DB;

class KategoriberitaController extends Controller
{
    public function index()
    {
        $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->orderBy('kategori.id', 'DESC')
            ->paginate(10);

        return view('master.kategoriberita', ['kat' => $post]);
    }

    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('kategori')->insert([
            'kategori' => $request->kategori,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/kategoriberita');
    }

    public function edit($id)
    {
        $post = DB::table('kategori')
            ->select('id', 'kategori')
            ->where('kategori.id', '=', $id)
            ->get();

        return view('master.editkategoriberita', ['edit' => $post]);
    }

    public function update(Request $request)
    {
        // update data pegawai
        DB::table('kategori')->where('id', $request->id)->update([
            'kategori' => $request->kategori,
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/kategoriberita');
    }

    public function delete($id)
    {
        $delete = Kategoriberita::where('id', $id)->delete();

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
}
