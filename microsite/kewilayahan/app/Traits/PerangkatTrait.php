<?php

namespace App\Traits;

use App\Models\PerangkatLmk;
use App\Models\PerangkatPimpinan;
use App\Models\PerangkatStruktur;
use App\Models\PerangkatTugasfungsi;
use App\Models\User;

trait PerangkatTrait
{
    public function get_data_perangkat($subpage, $id_user) {
        if($subpage == "profil-pimpinan" || $subpage == "Profil Pimpinan") {
            $data_perangkat = PerangkatPimpinan::where('id_user', $id_user)->first();
        }
        elseif($subpage == "struktur-organisasi" || $subpage == "Struktur Organisasi") {
            $data_perangkat = PerangkatStruktur::where('id_user', $id_user)->first();
        }
        elseif($subpage == "tugas-dan-fungsi" || $subpage == "Tugas dan Fungsi") {
            $data_perangkat = PerangkatTugasfungsi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "lmk" || $subpage == "LMK") {
            $user = User::where('id_user', $id_user)->first();
            if($user->kategori == "Kelurahan") {
                $data_perangkat = PerangkatLmk::where('id_user', $id_user)->first();
            }
            else {
                $data_perangkat = "Halaman perangkat tidak ditemukan";
            }
        }
        elseif($subpage == "all") {
            $data_perangkat['profil-pimpinan'] = PerangkatPimpinan::where('id_user', $id_user)->first();
            $data_perangkat['struktur-organisasi'] = PerangkatStruktur::where('id_user', $id_user)->first();
            $data_perangkat['tugas-dan-fungsi'] = PerangkatTugasfungsi::where('id_user', $id_user)->first();
            $data_perangkat['lmk'] = PerangkatLmk::where('id_user', $id_user)->first();
        }
        else {
            $data_perangkat = "Halaman perangkat tidak ditemukan"; // apabila mengakses halaman pernagkat yang tidak ada di menu
        }

        return $data_perangkat;
    }

    public function store_data_perangkat($subpage, $id_user, $request) {
        if($subpage == "profil-pimpinan") {
            $randomName = null;
            if ($request->hasFile('foto_pimpinan')) {
                $filenameWithExt = $request->file('foto_pimpinan')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('foto_pimpinan')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('foto_pimpinan')->storeAs('public/files/images/foto/pimpinan', $filenameSimpan);
            }
            $data_perangkat = new PerangkatPimpinan([
                'id_user' => $id_user,
                'foto_pimpinan' => $randomName,
                'nama_pimpinan' => $request->get('nama_pimpinan'),
                'nip_pimpinan' => $request->get('nip_pimpinan'),
                'pangkat_pimpinan' => $request->get('pangkat_pimpinan'),
            ]);
        }
        elseif($subpage == "struktur-organisasi") {
            $randomName = null;
            if ($request->hasFile('struktur_organisasi')) {
                $filenameWithExt = $request->file('struktur_organisasi')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('struktur_organisasi')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('struktur_organisasi')->storeAs('public/files/images/foto/struktur_organisasi/', $filenameSimpan);
            }
            $data_perangkat = new PerangkatStruktur([
                'id_user' => $id_user,
                'struktur_organisasi' => $randomName,
            ]);
        }
        elseif($subpage == "lmk" || $subpage == "LMK" || $subpage == "Lmk") {
            $data_perangkat = new PerangkatLmk([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "tugas-dan-fungsi") {
            $data_perangkat = new PerangkatTugasfungsi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        else {
            $data_perangkat = "Halaman perangkat tidak ditemukan"; // apabila mengakses halaman perangkat yang tidak ada di menu
        }

        return $data_perangkat;
    }

    public function update_data_perangkat($subpage, $id_user, $request, $data_perangkat) {
        if($subpage == "struktur-organisasi") {
            $randomName = null;
            if ($request->hasFile('struktur_organisasi')) {
                $filenameWithExt = $request->file('struktur_organisasi')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('struktur_organisasi')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('struktur_organisasi')->storeAs('public/files/images/foto/struktur_organisasi', $filenameSimpan);
                $data_perangkat->struktur_organisasi = $randomName;
            }
        }
        elseif($subpage == "profil-pimpinan") {
            $randomName = null;
            if ($request->hasFile('foto_pimpinan')) {
                $filenameWithExt = $request->file('foto_pimpinan')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('foto_pimpinan')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('foto_pimpinan')->storeAs('public/files/images/foto/pimpinan', $filenameSimpan);
                $data_perangkat->foto_pimpinan = $randomName;
            }
            $data_perangkat->nama_pimpinan = $request->get('nama_pimpinan');
            $data_perangkat->nip_pimpinan = $request->get('nip_pimpinan');
            $data_perangkat->pangkat_pimpinan = $request->get('pangkat_pimpinan');
        }
        else {
            $data_perangkat = "Halaman perangkat tidak ditemukan"; // apabila mengakses halaman perangkat yang tidak ada di menu
        }

        return $data_perangkat;
    }
}