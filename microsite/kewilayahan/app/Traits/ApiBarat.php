<?php

namespace App\Traits;

trait ApiBarat
{
    public function get_latest_berita_wilayah($tags)
    {
        $berita = null;
        $url_berita = "https://barat.jakarta.go.id/api/get-latest-berita-wilayah/".str_replace(' ', '%20', strtolower($tags));
        $result = file_get_contents($url_berita);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $berita = $resp_berita['berita'];
        }

        return $berita;
    }

    public function get_paginate_berita_wilayah($tags)
    {
        $berita = null;
        $components = parse_url(url()->full());
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if(isset($results['page'])) {
                if($results['page'] == "") {
                    $results['page'] = 1;
                }
                $url_berita = "https://barat.jakarta.go.id/api/get-paginate-berita-wilayah/".str_replace(' ', '%20', strtolower($tags))."?page=".$results['page'];
            }
            else {
                $url_berita = "https://barat.jakarta.go.id/api/get-paginate-berita-wilayah/".str_replace(' ', '%20', strtolower($tags));
            }
        }
        else {
            $url_berita = "https://barat.jakarta.go.id/api/get-paginate-berita-wilayah/".str_replace(' ', '%20', strtolower($tags));
        }

        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if(isset($results['search'])) {
                if($results['search'] != "") {
                    $url_berita = $url_berita."&search=".$results['search'];
                    $berita['search'] = $results['search'];
                }
            }
        }

        $result = file_get_contents($url_berita);
        if($result) {
            $resp_berita = (json_decode($result, true));
            $berita['berita'] = $resp_berita['berita'];
        }

        return $berita;
    }

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
}