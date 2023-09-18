<?php

namespace App\Http\Controllers;

use App\Models\Statistik;

class PersController extends Controller
{
    public function get_siaran_pers($kode) {
        $kode = str_replace('_', '/', $kode);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_PORT => "",
            CURLOPT_URL => "https://ppid.jakarta.go.id/api/pers-wilayah",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"page\": \"1\",
                                    \n  \"search\": \"$kode\",
                                    \n  \"limit\": \"1\",
                                    \n  \"statuspers\": \"\",
                                    \n  \"kode_wilayah\": \"3\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $siaran_pers = json_decode($response, true);
        $siaran_pers = $siaran_pers['data'];
        dd($siaran_pers);

        return $siaran_pers;
    }

    public function get_siaran_pers_detail($id_siaran_pers) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_PORT => "",
            CURLOPT_URL => "https://ppid.jakarta.go.id/api/detail-pers-wilayah",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"id_siaran_pers\": \"$id_siaran_pers\",\n  \"kode_wilayah\": \"3\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $siaran_pers = json_decode($response, true);
        return $siaran_pers;
    }

    public function main() {
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
    }

    public function detail($kode) {
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        $siaran_pers = $this->get_siaran_pers_detail($kode);
        if($siaran_pers['code'] == 1) { //kalau ada error atau data siaran pers tidak ditemukan
            return redirect('/');
        }
        $siaran_pers = $siaran_pers['data'][0];
        // dd($siaran_pers);
        return view("front.main", [
            'statistik' => $statistik,
            'siaran_pers' => $siaran_pers,
            'page' => 'Siaran Pers',
            'subpage' => 'Kota Administrasi Jakarta Barat'
        ]);
    }
}
