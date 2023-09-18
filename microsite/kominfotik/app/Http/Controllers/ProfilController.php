<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    public function main() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role != 3) {
                if($id_role == 2 || $id_role == 5) {
                    $id_seksi = $logged_user->id_seksi;
                    $tenaga_terampil = User::whereHas('seksi', function($query) use ($id_seksi) {
                    $query->where([
                        ['id_seksi', '=', $id_seksi],
                        ['status_kontrak', '=', 'Aktif'],
                        ['id_role', '=', '3']
                    ]);
                    })->get();
                }
                else if($id_role == 1 || $id_role == 4) {
                    $tenaga_terampil = User::where('id_role','=','3')->get();
                }
                
                return view("main", [
                    'page' => "Profil",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil
                ]);
            }
            else {
                $username = $logged_user->username;
                return redirect('/profil/'.$username);   
            }
        }
        return redirect('/');
    }
    
    public function profil($username) {
        if (Auth::check()) {
            $logged_profile = false;
            $logged_user = Auth::user();
            $logged_id_role = $logged_user->id_role;
            $logged_username = $logged_user->username;
            
            $user = User::where('username', $username)->first();

            if ($user != null || $user != "") {
                if($user->id_role != 3 || $user->id_role == null) {
                    return redirect('/');
                }
                
                $loaded_id_user = $user->id_user;
                if($logged_user->id_user == $user->id_user) {
                    $logged_profile = true;
                }
                $id_seksi = $user->id_seksi;
                $id_seksi_logged = $logged_user->id_seksi;
                if ($id_seksi == $id_seksi_logged || $logged_id_role == 1 || $logged_id_role == 4) {
                    $pegawai_seksi = User::whereHas('seksi', function($query) use ($id_seksi, $loaded_id_user) {
                    $query->where([
                                ['id_seksi', '=', $id_seksi],
                                ['id_user', '!=', $loaded_id_user],
                                ['id_role', '=', '3'],
                                ['status_kontrak', '=', 'Aktif']
                            ]);
                    })->get();
                    $kegiatan = Kegiatan::whereHas('ruanglingkup', function($query) use ($loaded_id_user) {
                        $query->where('id_user', $loaded_id_user);
                    })->limit(5)
                    ->orderBy('tanggal', 'DESC')
                    ->get();
    
                    return view("main", [
                        'page' => "Profil",
                        'subpage' => "View",
                        'pegawai_seksi' => $pegawai_seksi,
                        'user' => $user,
                        'kegiatan' => $kegiatan,
                        'id_role' => $logged_user->id_role,
                        'logged_user' => $logged_user,
                        'logged_profile' => $logged_profile
                    ]);
                }
                // tidak dapat akses ke profil ini
                return redirect('/profil/view/'.$logged_username);
            }
            // user tidak ditemukan
            return redirect('/profil/view/'.$logged_username);
        }

        return redirect('/');
    }

    public function password_view ($username) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            $logged_username = $logged_user->username;
            
            if($id_role == 3 && $username != $logged_username) {
                return redirect('/');
            }

            return view("main", [
                'page' => "Profil",
                'subpage' => "Password",
                'id_role' => $logged_user->id_role,
                'logged_user' => $logged_user
            ]);
        }

        return redirect('/');
    }

    public function password_update (Request $request, $username) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $logged_username = $logged_user->username;
            $id_user = $logged_user->id_user;
            $id_role = $logged_user->id_role;
            if($id_role == 3 && $username != $logged_username) {
                return response()->json([
                    'error' => 'Tidak berhak untuk mengakses page ini'
                ], 401);
            }

            $rules = [
                'password_lama'                  => 'required|string',
                'password'                       => 'required|string|confirmed'
            ];
            $messages = [
                'password_lama.required'         => 'Password lama wajib diisi',
                'password.required'              => 'Password baru wajib diisi',
                'password_confirmation.required' => 'Password baru wajib diisi'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            if (!Hash::check($request['password_lama'], Auth::user()->password)) {
                return redirect()->back()->with('error', 'Password lama yang diisi tidak cocok');   
            }

            $user = User::find($id_user);
            if (!$user) {
                echo "gaada"; die();
            }

            $user->password = bcrypt($request->get('password'));

            if($user->update()) {
                return redirect()->back()->with('success', 'Password berhasil dirubah');   
            }
        }
        return redirect('/');   
    }
    
}
