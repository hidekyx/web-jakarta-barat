<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use App\Models\KegiatanPrioritas;
use App\Models\Statistik;
use App\Models\Permohonan;

class HomeController extends Controller
{
    public function main() {
        $jumlah['download'] = InformasiPublik::sum('download');
        $jumlah['informasi'] = InformasiPublik::count();
        $jumlah['permohonan'] = Permohonan::count();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        $kegiatan = KegiatanPrioritas::orderBy('id_kegiatan_prioritas', 'DESC')->limit(10)->get();

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
                                    \n  \"search\": \"\",
                                    \n  \"limit\": \"4\",
                                    \n  \"statuspers\": \"\",
                                    \n  \"kode_wilayah\": \"3\"\n}",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $siaran_pers = null;

        if ($err) {
            echo "cURL Error #:" . $err;
        } 
        else {
            $siaran_pers = json_decode($response, true);
            $siaran_pers = $siaran_pers['data'];
            foreach($siaran_pers as $index => $sp) {
                $siaran_pers[$index]['preview_isipers'] = strip_tags($this->get_siaran_pers_detail($sp['id_siaran_pers']));
            }
        }

        return view("front.main", [
            'statistik' => $statistik,
            'jumlah' => $jumlah,
            'kegiatan' => $kegiatan,
            'siaran_pers' => $siaran_pers,
            'page' => 'Beranda'
        ]);
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
        $isipers = htmlspecialchars_decode(htmlspecialchars_decode($siaran_pers['data'][0]['isipers']));
        return $isipers;
    }
}
