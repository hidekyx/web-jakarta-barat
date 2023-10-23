<?php

namespace App\Traits;

use App\Models\LayananPublik;

trait LayananTrait
{
    public function get_data_layanan($subpage, $id_user) {
        if($subpage == "Kesehatan" || $subpage == "Pendidikan" || $subpage == "Transportasi" || $subpage == "PTSP" || $subpage == "Kanal Pengaduan" || $subpage == "Tempat Ibadah") {
            $data_layanan = LayananPublik::where('kategori', $subpage)->where('id_user', $id_user)->orderBy('id_layanan_publik', 'DESC')->get();
            // Subpage valid
        }
        elseif($subpage == "all") {
            $data_layanan = LayananPublik::where('id_user', $id_user)->orderBy('id_layanan_publik', 'DESC')->get();
        }
        else {
            $data_layanan = "Halaman layanan tidak ditemukan";
            // Subpage invalid
        }
        return $data_layanan;
    }

    public function detail_data_layanan($subpage, $id_user, $id_layanan_publik) {
        if($subpage == "Kesehatan" || $subpage == "Pendidikan" || $subpage == "Transportasi" || $subpage == "PTSP" || $subpage == "Kanal Pengaduan" || $subpage == "Tempat Ibadah") {
            $data_layanan = LayananPublik::where('kategori', $subpage)->where('id_user', $id_user)->where('id_layanan_publik', $id_layanan_publik)->first();
            // Subpage valid
        }
        else {
            $data_layanan = "Halaman layanan tidak ditemukan";
            // Subpage invalid
        }
        return $data_layanan;
    }

    public function store_data_layanan($subpage, $id_user, $request) {
        $randomName = null;
        if ($request->hasFile('foto')) {
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('foto')->storeAs('public/files/images/foto/layanan_publik/', $filenameSimpan);
        }
        $data_layanan = new LayananPublik([
            'id_user' => $id_user,
            'kategori' => $subpage,
            'nama_layanan' => $request->nama_layanan,
            'alamat_layanan' => $request->alamat_layanan,
            'foto' => $randomName,
        ]);

        return $data_layanan;
    }
}