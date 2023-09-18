<?php

namespace App\Traits;

trait ApiBarat
{
    public function get_infografis()
    {
        $infografis = null;
        $url_infografis = "https://barat.jakarta.go.id/api/get-infografis";
        $result = @file_get_contents($url_infografis);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $infografis = $resp_berita['infografis'];
        }

        return $infografis;
    }

    public function get_infografis_statistik()
    {
        $infografis = null;
        $url_infografis = "https://barat.jakarta.go.id/api/get-infografis-statistik";
        $result = @file_get_contents($url_infografis);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $infografis = $resp_berita['infografis'];
        }

        return $infografis;
    }

    public function get_latest_infografis()
    {
        $infografis = null;
        $url_infografis = "https://barat.jakarta.go.id/api/get-latest-infografis";
        $result = @file_get_contents($url_infografis);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $infografis = $resp_berita['infografis'];
        }

        return $infografis;
    }

    public function get_latest_berita()
    {
        $berita = null;
        $url_berita = "https://barat.jakarta.go.id/api/get-latest-berita";
        $result = @file_get_contents($url_berita);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $berita = $resp_berita['berita'];
        }

        return $berita;
    }
}