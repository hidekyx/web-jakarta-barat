<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kegiatan;
use App\Models\Seksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function main() {
        if (Auth::check()) { //Cek session
            $logged_user = Auth::user();
            $username = $logged_user->username;
            $seksi = null;
            if ($logged_user->id_role == 3) {
                return redirect('/profil/view/'.$username);   
            }

            if ($logged_user->id_role == 2 || $logged_user->id_role == 5) {
                $id_seksi = $logged_user->id_seksi;
                $seksi = Seksi::where([
                    'id_seksi'  => $id_seksi
                ])->first();
                $tenaga_terampil = User::where([
                    'id_role'  => '3',
                    'id_seksi'  => $id_seksi
                ])->get();

                $bulan_lalu = date("Y-m", strtotime("-1 months"));
                $bulan_lalu_split = explode('-', $bulan_lalu);
                $selected_bulan = $bulan_lalu_split[1];
                $selected_tahun = $bulan_lalu_split[0];
                
                $waktu_import_absen = null;
                $selected_bulan = "06";
                $selected_tahun = "2022";

                foreach ($tenaga_terampil as $key => $t) {
                    $kegiatan_all = Kegiatan::where([
                        'id_user'  => $t->id_user
                    ])->get();
                    $absensi_all = Absensi::where([
                        'id_user'  => $t->id_user
                    ])->get();
                    $absensi[$key] = Absensi::where('id_user',$t->id_user)
                    ->whereMonth('tanggal', $selected_bulan)
                    ->whereyear('tanggal', $selected_tahun)
                    ->get();
                    if ($absensi[$key]->isEmpty()) {
                        $imported_absen = false;
                    }
                    else {
                        $imported_absen = true;
                        foreach ($absensi[$key] as $a) {
                            $waktu_import_absen = $a->created_at;
                        }
                    }
                }

                $jumlah_tenaga_terampil = count($tenaga_terampil);
                $jumlah_kegiatan = count($kegiatan_all);
                $jumlah_absensi = count($absensi_all);

                return view("main", [
                    'page' => "Dashboard",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'bulan_lalu' => $bulan_lalu,
                    'tenaga_terampil' => $tenaga_terampil,
                    'seksi' => $seksi,
                    'imported_absen' => $imported_absen,
                    'waktu_import_absen' => $waktu_import_absen,
                    'jumlah_tenaga_terampil' => $jumlah_tenaga_terampil,
                    'jumlah_kegiatan' => $jumlah_kegiatan,
                    'jumlah_absensi' => $jumlah_absensi
                ]);
            }

            if ($logged_user->id_role == 1 || $logged_user->id_role == 4 || $logged_user->id_role == 7) {
                $validated_absen = null;
                $validated_kegiatan = null;
                $waktu_validasi_absen = null;
                $waktu_validasi_kegiatan = null;
                $tenaga_terampil = User::where('id_role','=','3')->get();
                $jumlah_kegiatan = Kegiatan::count();
                $jumlah_absensi = Absensi::count();
                $jumlah_tenaga_terampil = count($tenaga_terampil);

                $bulan_lalu = date("Y-m", strtotime("-1 months"));
                $bulan_lalu_split = explode('-', $bulan_lalu);
                $selected_bulan = $bulan_lalu_split[1];
                $selected_tahun = $bulan_lalu_split[0];
                
                $selected_bulan = "06";
                $selected_tahun = "2022";

                // $key = id_seksi
                // $key2 = id_user
                $seksi = Seksi::all();
                foreach ($seksi as $key => $s) {
                    $id_seksi[$key] = $s->id_seksi;
                }
                
                foreach ($id_seksi as $key => $id) {
                    $user[$key] = User::where([
                        'id_role'  => '3',
                        'id_seksi'  => $id_seksi[$key]
                    ])->get();
                    foreach ($user[$key] as $key2 => $u) {
                        $id_user[$key][$key2] = $u->id_user;
                        foreach ($id_user as $k) {
                            $absensi[$key][$key2] = Absensi::where('id_user',$id_user[$key][$key2])
                            ->whereMonth('tanggal', $selected_bulan)
                            ->whereyear('tanggal', $selected_tahun)
                            ->get();
                            foreach($absensi[$key][$key2] as $a) {
                                $waktu_validasi_absen[$key] = $a->updated_at;
                                if($a->validated == "Y") {
                                    $validated_absen[$key] = true;
                                }
                                else {
                                    $validated_absen[$key] = false;
                                }
                            }

                            $kegiatan[$key][$key2] = Kegiatan::where('id_user',$id_user[$key][$key2])
                            ->whereMonth('tanggal', $selected_bulan)
                            ->whereyear('tanggal', $selected_tahun)
                            ->get();
                            foreach($kegiatan[$key][$key2] as $k) {
                                $waktu_validasi_kegiatan[$key] = $k->updated_at;
                                if($k->validated == "Y") {
                                    $validated_kegiatan[$key] = true;
                                }
                                else {
                                    $validated_kegiatan[$key] = false;
                                }
                            }
                        }
                    }
                }
                // $validated_absen = array(false);
                $validated_absen[3] = false; // sementara
                // dd($validated_absen);
                return view("main", [
                    'page' => "Dashboard",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'bulan_lalu' => $bulan_lalu,
                    'tenaga_terampil' => $tenaga_terampil,
                    'seksi' => $seksi,
                    'absensi' => $absensi,
                    'validated_absen' => $validated_absen,
                    'validated_kegiatan' => $validated_kegiatan,
                    'waktu_validasi_absen' => $waktu_validasi_absen,
                    'waktu_validasi_kegiatan' => $waktu_validasi_kegiatan,
                    'jumlah_tenaga_terampil' => $jumlah_tenaga_terampil,
                    'jumlah_kegiatan' => $jumlah_kegiatan,
                    'jumlah_absensi' => $jumlah_absensi
                ]);
            }
        }

        return redirect('/');
    }
}
