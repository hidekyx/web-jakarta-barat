<?php

namespace App\Traits;

use Illuminate\Support\Facades\URL;
use App\Models\User;

trait BerandaTrait
{
    public function get_url($username) {
        $current_url = parse_url(URL::current());
        $url = explode('/', $current_url['path']);
        if($url[2] == "public") { // localhost testing
            $kewilayahan = User::where('username', $username)->where('kategori', $url[3])->first();
        }
        else { // public domain
            $kewilayahan = User::where('username', $username)->where('kategori', $url[1])->first();
        }

        return $kewilayahan;
    }

    public function get_data($kewilayahan) {
        $kecamatan = User::where('kategori', 'kecamatan')->get();
        for ($i=0; $i < count($kecamatan); $i++) { 
            $data['kewilayahan'][$kecamatan[$i]->username] = User::where('kategori', 'Kelurahan')->where('kecamatan', $kecamatan[$i]->id_user)->get();
        }
        $data['current_kecamatan'] = User::where('id_user', $kewilayahan->kecamatan)->first();
        $data['foto-keperluan-website'] = $this->get_data_deskripsi('foto-keperluan-website', $kewilayahan->id_user);
        $data['kontak-wilayah'] = $this->get_data_deskripsi('kontak-wilayah', $kewilayahan->id_user);
        $data['peta-wilayah'] = $this->get_data_deskripsi('peta-wilayah', $kewilayahan->id_user);
        $data['profil'] = $this->get_data_profil('all', $kewilayahan->id_user);
        $data['layanan-publik'] = $this->get_data_layanan('all', $kewilayahan->id_user);
        $data['perangkat'] = $this->get_data_perangkat('all', $kewilayahan->id_user);
        $data['ppid'] = $this->get_data_ppid('all', $kewilayahan->id_user);
        $data['informasi-wilayah'] = $this->get_data_informasi('all', $kewilayahan->id_user);
        $data['berita'] = $this->get_latest_berita_wilayah($kewilayahan->nama);
        foreach ($data['berita'] as $key => $db) {
            $data['berita'][$key]['tags_array'] = explode(", ", $db['tags']);
        }

        return $data;
    }

    public function get_berita_list($kewilayahan) {
        $kecamatan = User::where('kategori', 'kecamatan')->get();
        for ($i=0; $i < count($kecamatan); $i++) { 
            $data['kewilayahan'][$kecamatan[$i]->username] = User::where('kategori', 'Kelurahan')->where('kecamatan', $kecamatan[$i]->id_user)->get();
        }
        $data['current_kecamatan'] = User::where('id_user', $kewilayahan->kecamatan)->first();
        $data['foto-keperluan-website'] = $this->get_data_deskripsi('foto-keperluan-website', $kewilayahan->id_user);
        $data['kontak-wilayah'] = $this->get_data_deskripsi('kontak-wilayah', $kewilayahan->id_user);
        $data['peta-wilayah'] = $this->get_data_deskripsi('peta-wilayah', $kewilayahan->id_user);
        $data['berita'] = $this->get_latest_berita_wilayah($kewilayahan->nama);
        $data['berita_paginate'] = $this->get_paginate_berita_wilayah($kewilayahan->nama);
        foreach ($data['berita'] as $key => $db) {
            $data['berita'][$key]['tags_array'] = explode(", ", $db['tags']);
        }

        return $data;
    }
}