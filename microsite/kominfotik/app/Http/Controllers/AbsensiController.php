<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiBulananExport;
use App\Imports\AbsensiImport;
use App\Imports\WFHImport;
use App\Models\Absensi;
use App\Models\Penggajian;
use App\Models\User;
use App\Models\Seksi;
use App\Exports\AbsensiExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    public function main() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 1 || $id_role == 4 || $id_role == 7) {
                $tenaga_terampil = User::where('id_role','=','3')->where('status_kontrak','Aktif')->get();
                return view("main", [
                    'page' => "Absensi",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil
                ]);
            }

            else if($id_role == 2 || $id_role == 5) {
                $id_seksi = $logged_user->id_seksi;
                $tenaga_terampil = User::whereHas('seksi', function($query) use ($id_seksi) {
                $query->where([
                    ['status_kontrak', '=', 'Aktif'],
                    ['id_seksi', '=', $id_seksi],
                    ['id_role', '=', '3']
                ]);
                })->get();
                return view("main", [
                    'page' => "Absensi",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil
                ]);
            }

            else if($id_role == 3) {
                $username = $logged_user->username;
                return redirect('/absensi/view/'.$username);
            }

            else {
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function list($username) {
        if (Auth::check()) {
            $user = User::where('username','=',$username)->first();
            if($user == null) {
                // user tidak ditemukan
                return redirect('/');
            }

            $logged_user = Auth::user();
            if ($user->id_role == 3) {
                if($logged_user->id_role == 1 || $logged_user->id_role == 4 || $logged_user->id_role == 7) {
                    return $this->list_load($user, $logged_user);
                }
                else if($logged_user->id_role == 2 || 5 && $logged_user->id_seksi == $user->id_seksi) {
                    return $this->list_load($user, $logged_user);
                }
                else if($logged_user->id_role == 3 && $logged_user->id_user == $user->id_user) {
                    return $this->list_load($user, $logged_user);
                }
            }
            // hanya bisa akses absen user role 3
            return redirect('/');
        }
        // harus login
        return redirect('/');
    }

    public function list_load($user, $logged_user) {
        $absensi = array();
        $bonus = array();
        $filter_bulan = null;
        $validated = null;
        $absensi_kosong = false;
        $rekap_absen = array();
        $grafik_absen = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if($results['bulan'] == "")  {
                return redirect('/absensi/view/'.$user->username);   
            }

            $filter_bulan = explode('-',$results['bulan']);
            $selected_bulan = $filter_bulan[1];
            $selected_tahun = $filter_bulan[0];
            $id_user = $user->id_user;
            $absensi = Absensi::whereHas('user', function($query) use ($id_user) {
                $query->where('id_user', $id_user);
            })
            ->whereMonth('tanggal', $selected_bulan)
            ->whereyear('tanggal', $selected_tahun)
            ->orderBy('tanggal', 'ASC')
            ->get();

            foreach ($absensi as $a) {
                if ($a->validated == "Y") {
                    $validated = true;
                }
            }

            if(count($absensi)) {
                foreach ($absensi as $key => $a) {
                    if($a->keterangan_absen_pagi != "Tidak Absen") {
                        if($a->keterangan_absen_pagi == "Flexible Time") {
                            $grafik_absen['pagi']['tanggal'][] = $a->tanggal;
                            $grafik_absen['pagi']['jam_masuk'][] = $a->first_in;
                            $jam_masuk_awal = Carbon::parse('07:30:00');
                            $selisih_jam = Carbon::parse($a->first_in)->diff($jam_masuk_awal)->format('%H');
                            $selisih_menit = Carbon::parse($a->first_in)->diff($jam_masuk_awal)->format('%I');
                            $selisih_detik = Carbon::parse($a->first_in)->diff($jam_masuk_awal)->format('%S');
                            $grafik_absen['pagi']['jadwal_masuk'][] = ($jam_masuk_awal->addHours($selisih_jam)->addMinutes($selisih_menit)->addSeconds($selisih_detik))->toTimeString();
                        }
                        else {
                            $grafik_absen['pagi']['tanggal'][] = $a->tanggal;
                            $grafik_absen['pagi']['jam_masuk'][] = $a->first_in;
                            if($a->keterangan_absen_pagi == "Tepat Waktu") {
                                $grafik_absen['pagi']['jadwal_masuk'][] = '07:30:00';
                            }
                            if($a->keterangan_absen_pagi == "Telat") {
                                $grafik_absen['pagi']['jadwal_masuk'][] = '08:00:00';
                            }
                        }
                    }
                    if($a->keterangan_absen_sore != "Tidak Absen") {
                        if($a->keterangan_absen_pagi == "Flexible Time") {
                            $grafik_absen['sore']['tanggal'][] = $a->tanggal;
                            $grafik_absen['sore']['jam_pulang'][] = $a->last_out;
                            if(Carbon::parse($a->tanggal)->format('l') == "Friday") {
                                $jam_pulang_awal = Carbon::parse('16:30:00');
                            }
                            else {
                                $jam_pulang_awal = Carbon::parse('16:00:00');
                            }
                            $selisih_jam = Carbon::parse($a->last_out)->diff($jam_pulang_awal)->format('%H');
                            $selisih_menit = Carbon::parse($a->last_out)->diff($jam_pulang_awal)->format('%I');
                            $selisih_detik = Carbon::parse($a->last_out)->diff($jam_pulang_awal)->format('%S');
                            $grafik_absen['sore']['jadwal_pulang'][] = ($jam_pulang_awal->addHours($selisih_jam)->addMinutes($selisih_menit)->addSeconds($selisih_detik));
                        }
                        else {
                            $grafik_absen['sore']['tanggal'][] = $a->tanggal;
                            $grafik_absen['sore']['jam_pulang'][] = $a->last_out;
                            if(Carbon::parse($a->tanggal)->format('l') == "Friday") {
                                $grafik_absen['sore']['jadwal_pulang'][] = '16:30:00';
                            }
                            else {
                                $grafik_absen['sore']['jadwal_pulang'][] = '16:00:00';
                            }
                        }
                    }
                }
            }

            if ($validated == true) {
                $rekap_absen = Penggajian::where('id_user', $user->id_user)
                ->whereMonth('bulan', $selected_bulan)
                ->whereyear('bulan', $selected_tahun)
                ->get();
            }
            else {
                $rekap_absen = $this->kalkulasi_rekap($absensi);
            }
            
            $filter_bulan = $results['bulan'];
        }
        if (!count($absensi)) {
            $absensi_kosong = true;
        }

        return view("main", [
            'page' => "Absensi",
            'subpage' => "List",
            'username' => $user->username,
            'nama_lengkap' => $user->nama_lengkap,
            'jabatan' => $user->jabatan,
            'gaji_pokok' => $user->gaji,
            'logged_user' => $logged_user,
            'id_role' => $logged_user->id_role,
            'absensi' => $absensi,
            'absensi_kosong' => $absensi_kosong,
            'bonus' => $bonus,
            'filter_bulan' => $filter_bulan,
            'rekap_absen' => $rekap_absen,
            'grafik_absen' => $grafik_absen,
            'validated' => $validated
        ]);
    }

    public function kalkulasi_rekap ($absensi) {
        $gaji = null;
        $tidak_absen = array();
        $rekap_absen = array(
            "total_penalty" => null,
            "total_telat" => null,
            "total_pulang_cepat" => null,
            "hasil_telat" => null,
            "hasil_pulang_cepat" => null,
            "total_alpha" => null,
            "total_izin" => null,
            "total_cuti" => null,
            "total_sakit" => null,
            "total_tidak_absen" => null,
            "total_dinas_luar_sehari" => null,
            "total_dinas_luar_setengah" => null,
            "potongan_alpha" => null,
            "validated" => false
        );
        if (count($absensi)) {
            $jumlah_hari_kerja = 0;
            foreach($absensi as $a) {
                $gaji = $a->user->gaji;
                if($a->jenis != "Libur") {
                    $jumlah_hari_kerja = $jumlah_hari_kerja + 1;
                }
                
                if ($a->penalty_absen_pagi != null && $a->status != "Dinas Luar Awal" && $a->status != "Dinas Luar Penuh" && $a->jenis != "Libur") {
                    sscanf($a->penalty_absen_pagi, "%d:%d:%d", $hours, $minutes, $seconds);
                    $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
                    $telat[] = $time_seconds;
                    $rekap_absen['hasil_telat'] = array_sum($telat);
                    $rekap_absen['total_telat'] = sprintf('%02d:%02d:%02d', ($rekap_absen['hasil_telat']/3600),($rekap_absen['hasil_telat']/60%60), $rekap_absen['hasil_telat']%60);
                }
    
                if ($a->penalty_absen_sore != null && $a->status != "Dinas Luar Akhir" && $a->status != "Dinas Luar Penuh" && $a->jenis != "Libur") {
                    sscanf($a->penalty_absen_sore, "%d:%d:%d", $hours, $minutes, $seconds);
                    $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
                    $pulang_cepat[] = $time_seconds;
                    $rekap_absen['hasil_pulang_cepat'] = array_sum($pulang_cepat);
                    $rekap_absen['total_pulang_cepat'] = sprintf('%02d:%02d:%02d', ($rekap_absen['hasil_pulang_cepat']/3600),($rekap_absen['hasil_pulang_cepat']/60%60), $rekap_absen['hasil_pulang_cepat']%60);
                }
                
                if ($a->status == "Alpha") {
                    $alpha[] = $a->status;
                    $rekap_absen['total_alpha'] = count($alpha);
                }
    
                if ($a->status == "Izin") {
                    $izin[] = $a->status;
                    $rekap_absen['total_izin'] = count($izin);
                }
    
                if ($a->status == "Cuti") {
                    $cuti[] = $a->status;
                    $rekap_absen['total_cuti'] = count($cuti);
                }
    
                if ($a->status == "Sakit") {
                    $sakit[] = $a->status;
                    $rekap_absen['total_sakit'] = count($sakit);
                }
    
                if ($a->status == "Dinas Luar Penuh") {
                    $dinas_luar_sehari[] = $a->status;
                    $rekap_absen['total_dinas_luar_sehari'] = count($dinas_luar_sehari);
                }
    
                if ($a->status == "Dinas Luar Awal" || $a->status == "Dinas Luar Akhir") {
                    $dinas_luar_setengah[] = $a->status;
                    $rekap_absen['total_dinas_luar_setengah'] = count($dinas_luar_setengah);
                }
    
                if ($a->jenis != "Libur" && $a->status == "Masuk") {
                    if ($a->keterangan_absen_pagi == "Tidak Absen") {
                        $tidak_absen[] = $a->keterangan_absen_pagi;
                    }
                    if ($a->keterangan_absen_sore == "Tidak Absen") {
                        $tidak_absen[] = $a->keterangan_absen_sore;
                    }
                    
                    $rekap_absen['total_tidak_absen'] = count($tidak_absen);
                }
            }

            $rekap_absen['potongan_alpha'] = ($rekap_absen['total_alpha']/$jumlah_hari_kerja) * (12/10) * $gaji;
            // $rekap_absen['potongan_alpha'] = 0;
    
            if ($rekap_absen['hasil_telat'] == null) {
                $rekap_absen['hasil_telat'] = 0;
            }
            if ($rekap_absen['hasil_pulang_cepat'] == null) {
                $rekap_absen['hasil_pulang_cepat'] = 0;
            }
            $bulan = date('Y-m', strtotime($a->tanggal));
            $bulan = explode('-',$bulan);
            $selected_bulan = $bulan[1];
            $selected_tahun = $bulan[0];
            
            $hasil_penalty = $rekap_absen['hasil_telat'] + $rekap_absen['hasil_pulang_cepat'];
            $rekap_absen['total_penalty'] = sprintf('%02d:%02d:%02d', ($hasil_penalty/3600),($hasil_penalty/60%60), $hasil_penalty%60);
            // dd($rekap_absen);
            return $rekap_absen;
        }
    }

    public function import_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "Import",
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function import_action(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $tanggal_awal = $request->get('tanggal_awal');
                $tanggal_akhir = $request->get('tanggal_akhir');
                for($i = strtotime($tanggal_awal); $i <= strtotime($tanggal_akhir); $i = $i + 86400) {
                    $hari = date("l", $i);
                    if($hari == "Saturday" || $hari == "Sunday") {
                        $tanggal = date("Y-m-d", $i);
                        $id_user = User::where('id_role','3')->get();
                        foreach ($id_user as $id) {
                            $id_user = $id->id_user; 

                            $absensi = Absensi::where([
                                'tanggal' => $tanggal,
                                'id_user' => $id_user
                            ])->first();
                
                            if ($absensi) {
                                // echo "harus update"; die();
                                $absensi->jenis = "Libur";
                                $absensi->status = "Libur";
                                $absensi->save();
                            }
                            
                            else {
                                $absensi = new Absensi([
                                    'id_user'                 => $id_user,
                                    'keterangan_absen_pagi'   => "Tidak Absen",
                                    'keterangan_absen_sore'   => "Tidak Absen",
                                    'jenis'                   => "Libur",
                                    'status'                   => "Libur",
                                    'tanggal'                 => $tanggal,
                                    'keterangan'              => "Weekend"
                                ]);
                
                                $absensi->save();
                            }
                        }
                    }
                }
                Excel::import(new AbsensiImport($tanggal_awal, $tanggal_akhir), $request->file); 
                for($i = strtotime($tanggal_awal); $i <= strtotime($tanggal_akhir); $i = $i + 86400) {
                    $tanggal = date("Y-m-d", $i);
                    $id_user = User::where('id_role','3')->get();
                    foreach ($id_user as $id) {
                        $id_user = $id->id_user; 
                        $absensi = Absensi::where([
                            'tanggal' => $tanggal,
                            'id_user' => $id_user
                        ])->first();

                        if(!$absensi) {
                            $absensi = new Absensi([
                                'id_user'                 => $id_user,
                                'keterangan_absen_pagi'   => "Tidak Absen",
                                'keterangan_absen_sore'   => "Tidak Absen",
                                'jenis'                   => "WFO",
                                'status'                  => "Alpha",
                                'tanggal'                 => $tanggal
                            ]);
            
                            $absensi->save();
                        }
                        elseif($absensi->status == "Alpha") {
                            $absensi->jenis = "WFO";
                            $absensi->update();
                        }
                    }
                }
                return redirect()->back()->with('success', 'Data absen berhasil diperbaharui');   
            }
        }
        return redirect('/');
    }

    public function wfh_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "WFH",
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function wfh_action(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $tanggal_awal = $request->get('tanggal_awal');
                $tanggal_akhir = $request->get('tanggal_akhir');
                for($i = strtotime($tanggal_awal); $i <= strtotime($tanggal_akhir); $i = $i + 86400) {
                    $hari = date("l", $i);
                    if($hari == "Saturday" || $hari == "Sunday") {
                        $tanggal = date("Y-m-d", $i);
                        $id_user = User::where('id_role','3')->get();
                        foreach ($id_user as $id) {
                            $id_user = $id->id_user; 

                            $absensi = Absensi::where([
                                'tanggal' => $tanggal,
                                'id_user' => $id_user
                            ])->first();
                
                            if ($absensi) {
                                // echo "harus update"; die();
                                $absensi->jenis = "Libur";
                                $absensi->save();
                            }
                            
                            else {
                                $absensi = new Absensi([
                                    'id_user'                 => $id_user,
                                    'keterangan_absen_pagi'   => "Tidak Absen",
                                    'keterangan_absen_sore'   => "Tidak Absen",
                                    'jenis'                   => "Libur",
                                    'tanggal'                 => $tanggal,
                                    'keterangan'              => "Weekend"
                                ]);
                
                                $absensi->save();
                            }
                        }
                    }
                }
                Excel::import(new WFHImport($tanggal_awal, $tanggal_akhir), $request->file);
                for($i = strtotime($tanggal_awal); $i <= strtotime($tanggal_akhir); $i = $i + 86400) {
                    $tanggal = date("Y-m-d", $i);
                    $id_user = User::where('id_role','3')->get();
                    foreach ($id_user as $id) {
                        $id_user = $id->id_user; 
                        $absensi = Absensi::where([
                            'tanggal' => $tanggal,
                            'id_user' => $id_user
                        ])->first();

                        if(!$absensi) {
                            $absensi = new Absensi([
                                'id_user'                 => $id_user,
                                'keterangan_absen_pagi'   => "Tidak Absen",
                                'keterangan_absen_sore'   => "Tidak Absen",
                                'jenis'                   => "WFH",
                                'status'                  => "Alpha",
                                'tanggal'                 => $tanggal
                            ]);
            
                            $absensi->save();
                        }
                    }
                }
                return redirect()->back()->with('success', 'Data absen WFH berhasil diperbaharui');   
            }
        }
        return redirect('/');
    }

    public function libur_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "Libur",
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function libur_action(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $tanggal = $request->get('tanggal');
                $keterangan = $request->get('keterangan');
                $rules = [
                    'tanggal'         => 'required',
                    'keterangan'      => 'required'
                ];
                $messages = [
                    'tanggal.required'    => 'Tanggal wajib diisi',
                    'keterangan.required' => 'Keterangan wajib diisi'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $jumlah_data = count($keterangan);
                
                $id_user = User::where('id_role','3')->get();
                foreach ($id_user as $id) {
                    $id_user = $id->id_user;
                    $keterangan_absen_pagi = "Tidak Absen";
                    $keterangan_absen_sore = "Tidak Absen";

                    for ($i = 0; $i < $jumlah_data; $i++) {
                        $absensi = Absensi::where([
                            'tanggal' => $tanggal,
                            'id_user' => $id_user
                        ])->first();
            
                        if ($absensi) {
                            // echo "harus update"; die();
                            $absensi->keterangan = $keterangan[$i];
                            $absensi->jenis = "Libur";
                            $absensi->status = "Libur";
                            $absensi->update();
                        }
                        
                        else {
                            $absensi = new Absensi([
                                'id_user'                 => $id_user,
                                'keterangan_absen_pagi'   => $keterangan_absen_pagi,
                                'keterangan_absen_sore'   => $keterangan_absen_sore,
                                'jenis'                   => "Libur",
                                'status'                  => "Libur",
                                'tanggal'                 => $tanggal[$i],
                                'keterangan'              => $keterangan[$i]
                            ]);
        
                            $absensi->save();
                        }
                    }
                }
                return redirect()->back()->with('success', 'Data libur berhasil diperbaharui');   
            }
        }   
        return redirect('/');
    }
    
    // public function status_change (Request $request) {
    //     if (Auth::check()) {
    //         $logged_user = Auth::user();
    //         $id_role = $logged_user->id_role;
    //         if($id_role == 3) {
    //             return response()->json([
    //                 'error' => 'Tidak berhak untuk mengakses page ini'
    //             ], 401);
    //         }
    //         dd($request->all());
    //         foreach ($request->id_absensi as $key => $value) {
    //             $data = array(
    //                 'status'=> $request->status[$key]
    //             );
                
    //             Absensi::where('id_absensi',$request->id_absensi[$key])
    //             ->update($data);
    //         }

    //         return redirect()->back()->with('success', 'Status absensi berhasil diperbaharui');   
    //     }
    //     return redirect('/');
    // }

    public function edit_keterangan ($id_absensi) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role != 3) {
                $absensi = Absensi::where('id_absensi', $id_absensi)->get();
                foreach ($absensi as $a) {
                    if($a->status != "Libur" && $a->validated == "N") {
                        if($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                            return $this->load_edit_keterangan($absensi, $logged_user);
                        }
                        else if($logged_user->id_role == 2 && $logged_user->id_seksi == $a->user->id_seksi) {
                            return $this->load_edit_keterangan($absensi, $logged_user);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function load_edit_keterangan ($absensi, $logged_user) {
        return view("main", [
            'page' => "Absensi",
            'subpage' => "Keterangan",
            'absensi' => $absensi,
            'id_role' => $logged_user->id_role,
            'logged_user' => $logged_user
        ]);
    }

    public function update_keterangan(Request $request, $id_absensi) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role != 3) {
                $rules = [
                    // 'keterangan'               => 'string'
                ];
                $messages = [
                    // 'keterangan.string'        => 'Keterangan tidak valid'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $absensi = Absensi::find($id_absensi);
                if (!$absensi) {
                    echo "gaada"; die();
                }

                $absensi->keterangan = $request->get('keterangan');
                $absensi->status = $request->get('status');

                if($absensi->update()) {
                    $user = User::where('id_user', $absensi->id_user)->first();
                    return redirect('/absensi/view/'.$user->username.'?bulan='.date('Y-m', strtotime($absensi->tanggal)))->with('success', 'Data keterangan absensi berhasil diperbaharui');
                }
            }
        }   
    }

    public function validasi_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 2 || $logged_user->id_role == 7) {
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "Validasi",
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function validasi_action (Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 2 || $logged_user->id_role == 7) {
                $id_absensi = $request->get('id_absensi');
                
                foreach ($id_absensi as $key => $i) {
                    $absensi = Absensi::where([
                        'id_absensi'  => $id_absensi[$key]
                    ])->first();
        
                    if ($absensi) {
                        // echo "harus update"; die();
                        $absensi->validated = "Y";
                        $absensi->save();
                        $bulan = $absensi->tanggal;
                        $id_user = $absensi->id_user;
                    }

                    else {
                        return redirect()->back()->with('error', 'Data absen tidak ditemukan');   
                    }
                }

                $filter_bulan = explode('-',$bulan);
                $selected_bulan = $filter_bulan[1];
                $selected_tahun = $filter_bulan[0];
                $user = User::where('id_user', $id_user)->first();
                $absensi = Absensi::whereHas('user', function($query) use ($id_user) {
                    $query->where('id_user', $id_user);
                })
                ->whereMonth('tanggal', $selected_bulan)
                ->whereyear('tanggal', $selected_tahun)
                ->orderBy('tanggal', 'ASC')
                ->get();
                $rekap_absen = $this->kalkulasi_rekap($absensi);
                $gaji_sebelum_pajak = $user->gaji - $rekap_absen['potongan_alpha'];
                $bulan_penggajian = date('Y-m-t', strtotime($bulan));
                $penggajian = Penggajian::where('id_user', $id_user)->where('bulan', $bulan_penggajian)->first();
                if ($penggajian) {
                    $penggajian->total_telat = $rekap_absen['total_telat'];
                    $penggajian->total_pulang_cepat = $rekap_absen['total_pulang_cepat'];
                    $penggajian->total_telat_dan_pulang_cepat = $rekap_absen['total_penalty'];
                    $penggajian->total_izin = $rekap_absen['total_izin'];
                    $penggajian->total_cuti = $rekap_absen['total_cuti'];
                    $penggajian->total_alpha = $rekap_absen['total_alpha'];
                    $penggajian->total_sakit = $rekap_absen['total_sakit'];
                    $penggajian->total_tidak_absen = $rekap_absen['total_tidak_absen'];
                    $penggajian->total_dinas_luar_sehari = $rekap_absen['total_dinas_luar_sehari'];
                    $penggajian->total_dinas_luar_setengah = $rekap_absen['total_dinas_luar_setengah'];
                    $penggajian->potongan_alpha = $rekap_absen['potongan_alpha'];
                    $penggajian->gaji_sebelum_pajak = $gaji_sebelum_pajak;
                    $penggajian->update();
                }
                
                else {
                    $penggajian = new Penggajian([
                        'id_user'                              => $id_user,
                        'bulan'                                => $bulan_penggajian,
                        'total_telat'                          => $rekap_absen['total_telat'],
                        'total_pulang_cepat'                   => $rekap_absen['total_pulang_cepat'],
                        'total_telat_dan_pulang_cepat'         => $rekap_absen['total_penalty'],
                        'total_izin'                           => $rekap_absen['total_izin'],
                        'total_cuti'                           => $rekap_absen['total_cuti'],
                        'total_alpha'                          => $rekap_absen['total_alpha'],
                        'total_sakit'                          => $rekap_absen['total_sakit'],
                        'total_tidak_absen'                    => $rekap_absen['total_tidak_absen'],
                        'total_dinas_luar_sehari'              => $rekap_absen['total_dinas_luar_sehari'],
                        'total_dinas_luar_setengah'            => $rekap_absen['total_dinas_luar_setengah'],
                        'potongan_alpha'                       => $rekap_absen['potongan_alpha'],
                        'gaji_sebelum_pajak'                   => $gaji_sebelum_pajak
                    ]);
                    $penggajian->save();
                }
                return redirect()->back()->with('success', 'Absen berhasil divalidasi');   
            }
        }
        return redirect('/');
    }

    public function unvalidasi_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $seksi = Seksi::all();
                foreach ($seksi as $s) {
                    $user[$s->id_seksi] = User::where('id_seksi', $s->id_seksi)->where('id_role', 3)->where('status_kontrak', 'Aktif')->get();
                }
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "Unvalidasi",
                    'seksi' => $seksi,
                    'user' => $user,
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function unvalidasi_action (Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $bulan = $request->get('bulan');
                $id_user = $request->get('id_user');
                $rules = [
                    'bulan'      => 'required',
                    'id_user'    => 'required|int'
                ];
                $messages = [
                    'bulan.required'   => 'Bulan wajib diisi',
                    'id_user.required' => 'Pegawai wajib diisi',
                    'id_user.int'      => 'Pegawai tidak valid'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $tanggal_awal = date('Y-m-01', strtotime($bulan));
                $tanggal_akhir  = date('Y-m-t', strtotime($bulan));
                for($i = strtotime($tanggal_awal); $i <= strtotime($tanggal_akhir); $i = $i + 86400) {
                    $tanggal = date("Y-m-d", $i);
                    $absensi = Absensi::where([
                        'tanggal'  => $tanggal,
                        'id_user'  => $id_user
                    ])->first();
        
                    if ($absensi) {
                        // echo "harus update"; die();
                        $absensi->validated = "N";
                        if($absensi->jenis != "Libur") {
                            $absensi->keterangan = null;
                            if($absensi->keterangan_absen_pagi == "Tidak Absen" && $absensi->keterangan_absen_sore == "Tidak Absen") {
                                $absensi->status = "Alpha";    
                            }
                            else {
                                $absensi->status = "Masuk";
                            }
                        }
                        $absensi->save();
                    }

                    else {
                        return redirect()->back()->with('error', 'Data absen tidak ditemukan');   
                    }
                }  

                return redirect()->back()->with('success', 'Absen berhasil di-unvalidasi');
            }
        }
        return redirect('/');
    }

    public function export($username, $filter_bulan) {
        if (Auth::check()) {
            $user = User::where('username', $username)->first();
            $validated = null;
            $id_user = $user->id_user;
            $nama_lengkap = $user->nama_lengkap;
            $explode_bulan = explode('-',$filter_bulan);
            $selected_bulan = $explode_bulan[1];
            $selected_tahun = $explode_bulan[0];
            $bulan = date("F", strtotime(date("Y") ."-". $selected_bulan ."-01"));
            $bulan = Carbon::parse($bulan)->isoFormat('MMMM');
            $absensi = Absensi::where('id_user', $id_user)
            ->whereMonth('tanggal', $selected_bulan)
            ->whereyear('tanggal', $selected_tahun)
            ->orderBy('tanggal', 'ASC')
            ->get();
            foreach ($absensi as $a) {
                if ($a->validated == "Y") {
                    $validated = true;
                }
            }
            if($validated == true) {
                $penggajian = Penggajian::where('id_user', $id_user)
                ->whereMonth('bulan', $selected_bulan)
                ->whereyear('bulan', $selected_tahun)
                ->first();
            }
            else {
                $penggajian = $this->kalkulasi_rekap($absensi);
            }
            $bulan_cetak = $bulan.' '.$selected_tahun;
            return Excel::download(new AbsensiExport($absensi, $penggajian, $user, $bulan_cetak, $validated), 'Laporan Absensi - '.$bulan.' '.$selected_tahun.' - '.$nama_lengkap.'.xlsx');
            
        }
        return redirect('/');
	}

    public function export_bulanan_view () {
        if (Auth::check()) {
            $logged_user = Auth::user();
            if ($logged_user->id_role == 1 || $logged_user->id_role == 7) {
                $seksi = Seksi::all();
                foreach ($seksi as $s) {
                    $user[$s->id_seksi] = User::where('id_seksi', $s->id_seksi)->where('id_role', 3)->where('status_kontrak', 'Aktif')->get();
                }
                return view("main", [
                    'page' => "Absensi",
                    'subpage' => "ExportBulanan",
                    'seksi' => $seksi,
                    'user' => $user,
                    'id_role' => $logged_user->id_role,
                    'logged_user' => $logged_user
                ]);
            }
        }

        return redirect('/');
    }

    public function export_bulanan_action(Request $request) {
        if (Auth::check()) {
            $user = User::where('id_role', 3)->where('status_kontrak', 'Aktif')->get();
            $validated = null;

            $explode_bulan = explode('-',$request->get('bulan'));
            $selected_bulan = $explode_bulan[1];
            $selected_tahun = $explode_bulan[0];
            $bulan = date("F", strtotime(date("Y") ."-". $selected_bulan ."-01"));
            $bulan = Carbon::parse($bulan)->isoFormat('MMMM');

            foreach($user as $key => $u) {
                $absensi[$key] = Absensi::where('id_user', $u->id_user)
                ->whereMonth('tanggal', $selected_bulan)
                ->whereyear('tanggal', $selected_tahun)
                ->orderBy('tanggal', 'ASC')
                ->get();

                foreach ($absensi[$key] as $a) {
                    if ($a->validated == "Y") {
                        $validated[$key] = true;
                    }
                    else {
                        $validated[$key] = false;
                    }
                }

                if($validated[$key] == true) {
                    $penggajian[$key] = Penggajian::where('id_user', $u->id_user)
                    ->whereMonth('bulan', $selected_bulan)
                    ->whereyear('bulan', $selected_tahun)
                    ->first();
                }
                else {
                    $penggajian[$key] = $this->kalkulasi_rekap($absensi[$key]);
                }
            }
            
            $bulan_cetak = $bulan.' '.$selected_tahun;
            return Excel::download(new AbsensiBulananExport($absensi, $penggajian, $user, $bulan_cetak, $validated), 'Laporan Absensi - '.$bulan.' '.$selected_tahun.'.xlsx');
            // return Excel::download(new AbsensiExport($absensi, $penggajian, $user, $bulan_cetak, $validated), 'Laporan Absensi - '.$bulan.' '.$selected_tahun.'.xlsx');
            
        }
        return redirect('/');
	}
}