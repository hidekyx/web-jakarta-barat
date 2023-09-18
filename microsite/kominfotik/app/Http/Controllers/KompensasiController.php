<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PenggajianKompensasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KompensasiController extends Controller
{
    public function kompensasi_view($username, $filter_bulan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 2) {
                $user = User::where('username','=',$username)->first();
                if($user == null && $user->id_role != 3) {
                    // user tidak ditemukan
                    return redirect('/');
                }
                $bulan = explode('-',$filter_bulan);
                $selected_bulan = $bulan[1];
                $selected_tahun = $bulan[0];
                if ($user->id_seksi == $logged_user->id_seksi) {
                    $kompensasi = PenggajianKompensasi::where('id_user',$user->id_user)
                    ->whereMonth('bulan', $selected_bulan)
                    ->whereyear('bulan', $selected_tahun)
                    ->first();
                    $bulan = date('Y-m-t', strtotime($filter_bulan));
                    
                    return view("main", [
                        'page' => "Absensi",
                        'subpage' => "Kompensasi",
                        'user' => $user,
                        'filter_bulan' => $filter_bulan,
                        'kompensasi' => $kompensasi,
                        'id_role' => $logged_user->id_role,
                        'logged_user' => $logged_user
                    ]);
                }
            }
        }
        return redirect('/');
    }

    public function kompensasi_action(Request $request, $username) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 2) {
                $rules = [
                    'bulan'                 => 'required|date'
                ];
                $messages = [
                    'bulan.required'        => 'Bulan wajib diisi',
                    'bulan.date'            => 'Bulan tidak valid'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $user = User::where('username','=',$username)->first();
                if($user != null && $user->id_role == 3 && $user->id_seksi == $logged_user->id_seksi) {
                    $bulan = date('Y-m-01', strtotime($request->get('bulan')));
                    $filter_bulan = explode('-',$bulan);
                    $selected_bulan = $filter_bulan[1];
                    $selected_tahun = $filter_bulan[0];
                    $kompensasi = PenggajianKompensasi::where('id_user',$user->id_user)
                    ->whereMonth('bulan', $selected_bulan)
                    ->whereyear('bulan', $selected_tahun)
                    ->first();
                    
                    if ($kompensasi) {
                        $kompensasi->jumlah = $request->get('jumlah');
                        $kompensasi->keterangan = $request->get('keterangan');

                        if($kompensasi->save()) {
                            return redirect('/absensi/view/'.$username.'?bulan='.$request->get('bulan'))->with('success', 'Data kompensasi berhasil diperbaharui');
                        }
                    }
                    else {
                        $kompensasi = new PenggajianKompensasi([
                            'id_user'     => $user->id_user,
                            'jumlah'      => $request->get('jumlah'),
                            'keterangan'  => $request->get('keterangan'),
                            'bulan'       => $bulan
                        ]);
                        if($kompensasi->save()) {
                            return redirect('/absensi/view/'.$username.'?bulan='.$request->get('bulan'))->with('success', 'Data kompensasi berhasil diperbaharui');
                        }
                    }
                } 
            }
        }
        return redirect('/');
    }
}