<?php

namespace App\Traits;

use App\Models\ProfilDemografi;
use App\Models\ProfilGeografi;
use App\Models\ProfilPotensi;
use App\Models\ProfilSejarah;
use App\Models\ProfilVisimisi;

trait ProfilTrait
{
    public function get_data_profil($subpage, $id_user) {
        if($subpage == "sejarah" || $subpage == "Sejarah") {
            $data_profil = ProfilSejarah::where('id_user', $id_user)->first();
        }
        elseif($subpage == "geografi" || $subpage == "Geografi") {
            $data_profil = ProfilGeografi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "demografi" || $subpage == "Demografi") {
            $data_profil = ProfilDemografi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "visi-dan-misi" || $subpage == "Visi Dan Misi") {
            $data_profil = ProfilVisimisi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "potensi-wilayah" || $subpage == "Potensi Wilayah") {
            $data_profil = ProfilPotensi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "all") {
            $data_profil['sejarah'] = ProfilSejarah::where('id_user', $id_user)->first();
            $data_profil['geografi'] = ProfilGeografi::where('id_user', $id_user)->first();
            $data_profil['demografi'] = ProfilDemografi::where('id_user', $id_user)->first();
            $data_profil['visi-dan-misi'] = ProfilVisimisi::where('id_user', $id_user)->first();
            $data_profil['potensi-wilayah'] = ProfilPotensi::where('id_user', $id_user)->first();
        }
        else {
            $data_profil = "Halaman profil tidak ditemukan"; // apabila mengakses halaman profil yang tidak ada di menu
        }

        return $data_profil;
    }

    public function store_data_profil($subpage, $id_user, $request) {
        if($subpage == "sejarah") {
            $data_profil = new ProfilSejarah([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "geografi") {
            $data_profil = new ProfilGeografi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "demografi") {
            $data_profil = new ProfilDemografi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "visi-dan-misi") {
            $data_profil = new ProfilVisimisi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "potensi-wilayah") {
            $data_profil = new ProfilPotensi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        else {
            $data_profil = "Halaman profil tidak ditemukan"; // apabila mengakses halaman profil yang tidak ada di menu
        }

        return $data_profil;
    }
}