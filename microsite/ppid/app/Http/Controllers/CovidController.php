<?php

namespace App\Http\Controllers;

use App\Models\Statistik;

class CovidController extends Controller
{
    public function main() {
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        
        $url_covid = "https://data.covid19.go.id/public/api/prov.json";
        $url_vaksin = "https://data.covid19.go.id/public/api/pemeriksaan-vaksinasi.json";

        $result_1 = file_get_contents($url_covid);
        $result_2 = file_get_contents($url_vaksin);
        $data_covid = (json_decode($result_1, true));
        $data_covid = $data_covid['list_data'][0];

        $data_vaksin = (json_decode($result_2, true));
	if ($data_vaksin) {
		$data_vaksin = $data_vaksin['vaksinasi']['total'];
	}
	else {
		$data_vaksin = null;
	}

        return view("front.main", [
            'data_covid' => $data_covid,
            'data_vaksin' => $data_vaksin,
            'statistik' => $statistik,
            'page' => 'Info Covid-19',
            'subpage' => null
        ]);
    }
}
