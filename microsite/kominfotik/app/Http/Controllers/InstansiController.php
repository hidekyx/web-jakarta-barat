<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    public function instansi_list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 2 || $id_role == 4 || $id_role == 5)) {
                $query = Instansi::orderBy('id_instansi', 'DESC');
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    if(isset($results['nama_instansi']) && $results['nama_instansi'] != null) {
                        $nama_instansi = $results['nama_instansi'];
                        $query->where('nama_instansi','LIKE','%'.$nama_instansi.'%');
                    }
                }
                $instansi = $query->paginate(10);
                return view("main", [
                    'page' => "Instansi",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'instansi' => $instansi
                ]);
            }
        }
        return redirect('/');
    }

    public function instansi_tambah() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 2 || $id_role == 4 || $id_role == 5)) {
                return view("main", [
                    'page' => "Instansi",
                    'subpage' => "Tambah",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                ]);
            }
        }
        return redirect('/');
    }

    public function instansi_simpan(Request $request) {
        if (Auth::check()) {
            $rules = [
                'nama_instansi' => 'required|string',
            ];

            $messages = [
                'nama_instansi.required' => 'Nama Instansi wajib diisi',
                'nama_instansi.string' => 'Nama Instansi tidak valid',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $instansi = new Instansi([
                'nama_instansi' => $request->get('nama_instansi')
            ]);

            if($instansi->save()) {
                return redirect('/instansi')->with('success', 'Data unit kerja berhasil ditambahkan');
            }
        }   
    }

    public function instansi_edit($id_instansi) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 2 || $id_role == 4 || $id_role == 5)) {
                $instansi = Instansi::where('id_instansi', $id_instansi)->first();
                return view("main", [
                    'page' => "Instansi",
                    'subpage' => "Edit",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'instansi' => $instansi
                ]);
            }
        }
        return redirect('/');
    }

    public function instansi_update(Request $request, $id_instansi) {
        if (Auth::check()) {
            $rules = [
                'nama_instansi' => 'required|string',
            ];

            $messages = [
                'nama_instansi.required' => 'Nama Instansi wajib diisi',
                'nama_instansi.string' => 'Nama Instansi tidak valid',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $instansi = Instansi::find($id_instansi);
            if (!$instansi) {
                echo "gaada"; die();
            }

            $instansi->nama_instansi = $request->get('nama_instansi');

            if($instansi->update()) {
                return redirect('/instansi')->with('success', 'Data unit kerja berhasil diperbaharui');
            }
        }   
    }

    public function instansi_aktif($id_instansi) {
        if (Auth::check()) {
            $instansi = Instansi::find($id_instansi);
            if (!$instansi) {
                echo "gaada"; die();
            }

            $instansi->status = "Aktif";
            if($instansi->update()) {
                return redirect('/instansi')->with('success', 'Data unit kerja berhasil diaktifkan kembali');
            }
        }   
    }

    public function instansi_nonaktif($id_instansi) {
        if (Auth::check()) {
            $instansi = Instansi::find($id_instansi);
            if (!$instansi) {
                echo "gaada"; die();
            }

            $instansi->status = "Nonaktif";
            if($instansi->update()) {
                return redirect('/instansi')->with('success', 'Data unit kerja berhasil dinonaktifkan');
            }
        }   
    }
}