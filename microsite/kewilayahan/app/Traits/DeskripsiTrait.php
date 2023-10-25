<?php

namespace App\Traits;

use App\Models\DeskripsiFoto;
use App\Models\DeskripsiKontak;
use App\Models\DeskripsiPeta;

trait DeskripsiTrait
{
    public function get_data_deskripsi($subpage, $id_user) {
        $data_deskripsi = null;
        if($subpage == "foto-keperluan-website" || $subpage == "Foto Keperluan Website") {
            $data_deskripsi = DeskripsiFoto::where('id_user', $id_user)->first();
        }
        elseif($subpage == "peta-wilayah" || $subpage == "Peta Wilayah") {
            $data_deskripsi = DeskripsiPeta::where('id_user', $id_user)->first();
        }
        elseif($subpage == "kontak-wilayah" || $subpage == "Kontak Wilayah") {
            $data_deskripsi = DeskripsiKontak::where('id_user', $id_user)->first();
        }
        elseif($subpage == "all") {
            $data_deskripsi['deskripsi-foto'] = DeskripsiFoto::where('id_user', $id_user)->first();
            $data_deskripsi['deskripsi-kontak'] = DeskripsiKontak::where('id_user', $id_user)->first();
        }
        else {
            $data_deskripsi = "Halaman deskripsi website tidak ditemukan"; // apabila mengakses halaman website yang tidak ada di menu
        }

        return $data_deskripsi;
    }

    public function store_data_deskripsi_foto($subpage, $id_user, $randomName) {
        if($subpage == "foto-keperluan-website" || $subpage == "Foto Keperluan Website") {
            $data_deskripsi = new DeskripsiFoto([
                'id_user' => $id_user,
                'foto_bangunan' => $randomName['foto_bangunan'],
                'foto_banner_1' => $randomName['foto_banner_1'],
                'foto_banner_2' => $randomName['foto_banner_2'],
                'foto_banner_3' => $randomName['foto_banner_3'],
            ]);
        }
        else {
            $data_deskripsi = "Halaman deskripsi tidak ditemukan"; // apabila mengakses halaman profil yang tidak ada di menu
        }

        return $data_deskripsi;
    }

    public function store_data_deskripsi_kontak($subpage, $id_user, $request) {
        if($subpage == "kontak-wilayah" || $subpage == "Kontak Wilayah") {
            $data_deskripsi = new DeskripsiKontak([
                'id_user' => $id_user,
                'alamat' => $request->get('alamat'),
                'email' => $request->get('email'),
                'sosmed_facebook' => $request->get('sosmed_facebook'),
                'sosmed_instagram' => $request->get('sosmed_instagram'),
                'sosmed_youtube' => $request->get('sosmed_youtube'),
                'sosmed_twitter' => $request->get('sosmed_twitter'),
            ]);
        }
        else {
            $data_deskripsi = "Halaman deskripsi tidak ditemukan"; // apabila mengakses halaman profil yang tidak ada di menu
        }

        return $data_deskripsi;
    }

    public function store_data_deskripsi_peta($subpage, $id_user, $request) {
        if($subpage == "peta-wilayah" || $subpage == "Peta Wilayah") {
            $data_deskripsi = new DeskripsiPeta([
                'id_user' => $id_user,
                'peta_keyword' => $request->get('peta_keyword'),
                'peta_zoom' => $request->get('peta_zoom'),
            ]);
        }
        else {
            $data_deskripsi = "Halaman deskripsi tidak ditemukan"; // apabila mengakses halaman profil yang tidak ada di menu
        }

        return $data_deskripsi;
    }
}