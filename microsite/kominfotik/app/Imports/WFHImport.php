<?php

namespace App\Imports;

use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WFHImport implements ToModel, WithHeadingRow
{
    private $jam_masuk = '07:30:00';
    private $jam_masuk_akhir = '08:00:00';
    private $jam_pulang = '16:00:00';
    private $jam_pulang_jumat = '16:30:00';
    private $flexi_time_pulang;
    private $flexi_time_bool = false;

    // bulan puasa enable di bawah ini
    // private $jam_masuk = '07:00:00';
    // private $jam_pulang = '15:00:00';
    // private $jam_pulang_jumat = '15:30:00';

    private $tanggal_awal;
    private $tanggal_akhir;

    public function __construct($tanggal_awal, $tanggal_akhir) {
        $this->tanggal_awal = $tanggal_awal;
        $this->tanggal_akhir = $tanggal_akhir;
    }
    
    public function model(array $row)
    {
        $tanggal_awal = strtotime($this->tanggal_awal);
        $tanggal_akhir = strtotime($this->tanggal_akhir);
        
        // sinkronisasi id user mesin dengan id user
        $user = User::where('id_user_mesin', $row['user_id'])->get();
        if ($user != null) {
            foreach ($user as $u) {
                $id_user = $u->id_user;
            }
        }

        if($row['date'] != null) {
            $tanggal = Carbon::createFromFormat('d/m/Y', $row['date'])->format('Y-m-d');
        }
        else {
            $tanggal = Carbon::now()->setTime(0,0)->format('Y-m-d');
        }
        // dd($tanggal);
        
        $jam_masuk = $this->jam_masuk;
        $jam_masuk_akhir = $this->jam_masuk_akhir;
        $jam_pulang = $this->jam_pulang;
        $jam_pulang_jumat = $this->jam_pulang_jumat;
        $jenis = "WFH";

        if (isset($id_user)) {
            if ($tanggal >= $this->tanggal_awal && $tanggal <= $this->tanggal_akhir) { 
                $hari = date("l", strtotime($tanggal));
                if($hari == "Saturday" || $hari == "Sunday") {
                    $jenis = "Libur";
                }
                // cek apabila tidak absen maka jam absen null
                if ($row['first_in'] == "- -" || $row['first_in'] == "") {
                    $row['first_in'] = null;
                    $keterangan_absen_pagi = "Tidak Absen";
                    $penalty_absen_pagi = null;
                }
                if ($row['lastout'] == "- -" || $row['lastout'] == "") {
                    $row['lastout'] = null;
                    $keterangan_absen_sore = "Tidak Absen";
                    $penalty_absen_sore = null;
                }
    
                // cek jam absen ada penalty atau ngga
                $jam_absen_pagi = $row['first_in'];
                $jam_absen_sore = $row['lastout'];
                
                if ($jam_absen_pagi != null) {
                    $a = Carbon::parse($tanggal . $jam_masuk);
                    $b = Carbon::parse($tanggal . $jam_absen_pagi);
                    $c = Carbon::parse($tanggal . $jam_masuk_akhir);
                    if ($b > $a && $row['weekday'] != "Saturday" && $row['weekday'] != "Sunday") { // Flexible time atau telat
                        if($b > $c) {
                            $penalty_absen_pagi =  $b->diff($c)->format('%H:%I:%S');
                            $keterangan_absen_pagi = "Telat";
                            $this->flexi_time_bool = "Telat";
                        }
                        else {
                            $penalty_absen_pagi = null;
                            $keterangan_absen_pagi = "Flexible Time";
                            $this->flexi_time_bool = "Flexible Time";
                        }

                        if ($row['weekday'] != "Friday") {
                            $flexi_time_pulang = Carbon::parse($tanggal . $jam_pulang);
                        }
                        else {
                            $flexi_time_pulang = Carbon::parse($tanggal . $jam_pulang_jumat);
                        }
                        $selisih_jam = $b->diff($a)->format('%H');
                        $selisih_menit = $b->diff($a)->format('%I');
                        $selisih_detik = $b->diff($a)->format('%S');
                        $this->flexi_time_pulang = $flexi_time_pulang->addHours($selisih_jam)->addMinutes($selisih_menit)->addSeconds($selisih_detik);
                    }
                    else {
                        $penalty_absen_pagi = null;
                        $keterangan_absen_pagi = "Tepat Waktu";
                        $this->flexi_time_bool = false;
                    }
                }
    
                if ($jam_absen_sore != null) {
                    if($this->flexi_time_bool == "Flexible Time") {
                        $a = $this->flexi_time_pulang;
                    }
                    else if($this->flexi_time_bool == "Telat") {
                        if ($row['weekday'] != "Friday") {
                            $a = Carbon::parse($tanggal . $jam_pulang)->addMinutes(30);
                        }
                        else {
                            $a = Carbon::parse($tanggal . $jam_pulang_jumat)->addMinutes(30);
                        }
                    }
                    else{
                        if ($row['weekday'] != "Friday") {
                            $a = Carbon::parse($tanggal . $jam_pulang);
                        }
                        else {
                            $a = Carbon::parse($tanggal . $jam_pulang_jumat);
                        }
                    }
                    $b = Carbon::parse($tanggal . $jam_absen_sore);
                    if ($b < $a && $row['weekday'] != "Saturday" && $row['weekday'] != "Sunday") {
                        $penalty_absen_sore =  $b->diff($a)->format('%H:%I:%S');
                        $keterangan_absen_sore = "Pulang Cepat";
                    }
                    else {
                        $penalty_absen_sore = null;
                        $keterangan_absen_sore = "Tepat Waktu";
                    }
                }
                
                // cek apabila ada tanggal yang sudah diinput
                $absensi = Absensi::where([
                    'tanggal' => $tanggal,
                    'id_user' => $id_user
                ])->first();
    
                if ($absensi) {
                    // echo "harus update"; die();
                    $absensi->first_in = $row['first_in'];
                    $absensi->last_out = $row['lastout'];
                    $absensi->penalty_absen_pagi = $penalty_absen_pagi;
                    $absensi->keterangan_absen_pagi = $keterangan_absen_pagi;
                    $absensi->penalty_absen_sore = $penalty_absen_sore;
                    $absensi->keterangan_absen_sore = $keterangan_absen_sore;
                    $absensi->jenis = $jenis;
                    $absensi->status = "Masuk";
                    $absensi->save();
                }
    
                else {
                    return new Absensi([
                        'id_user'               => $id_user,
                        'id_user_mesin'         => $row['user_id'],
                        'tanggal'               => $tanggal,
                        'penalty_absen_pagi'    => $penalty_absen_pagi,
                        'keterangan_absen_pagi' => $keterangan_absen_pagi,
                        'penalty_absen_sore'    => $penalty_absen_sore,
                        'keterangan_absen_sore' => $keterangan_absen_sore,
                        'first_in'              => $row['first_in'],
                        'last_out'              => $row['lastout'],
                        'jenis'                 => $jenis,
                        'status'                => "Masuk"
                    ]);
                }
            }
        }
    }
}
