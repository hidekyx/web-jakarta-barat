<?php

namespace App\Traits;

use App\Models\InformasiInovasi;
use App\Models\InformasiKalender;

trait InformasiTrait
{
    public function get_data_informasi($subpage, $id_user) {
        if($subpage == "kalender-kegiatan" || $subpage == "Kalender Kegiatan") {
            $data_informasi = InformasiKalender::where('id_user', $id_user)->get();
        }
        elseif($subpage == "inovasi-dan-prestasi" || $subpage == "Inovasi Dan Prestasi") {
            $data_informasi = InformasiInovasi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "all") {
            $data_informasi['kalender-kegiatan'] = InformasiKalender::where('id_user', $id_user)->get();
            $data_informasi['inovasi-dan-prestasi'] = InformasiInovasi::where('id_user', $id_user)->first();
        }
        else {
            $data_informasi = "Halaman Informasi tidak ditemukan"; // apabila mengakses halaman Informasi yang tidak ada di menu
        }

        return $data_informasi;
    }

    public function detail_data_informasi_kalender($subpage, $id_user, $id_informasi_kalender) {
        if($subpage == "kalender-kegiatan" || $subpage == "Kalender Kegiatan") {
            $data_informasi = InformasiKalender::where('id_user', $id_user)->where('id_informasi_kalender', $id_informasi_kalender)->first();
        }
        else {
            $data_informasi = "Halaman Informasi tidak ditemukan"; // apabila mengakses halaman Informasi yang tidak ada di menu
        }

        return $data_informasi;
    }

    public function detail_data_informasi($subpage, $id_user) {
        if($subpage == "inovasi-dan-prestasi" || $subpage == "Inovasi Dan Prestasi") {
            $data_informasi = InformasiInovasi::where('id_user', $id_user)->first();
        }
        else {
            $data_informasi = "Halaman Informasi tidak ditemukan"; // apabila mengakses halaman Informasi yang tidak ada di menu
        }

        return $data_informasi;
    }

    public function store_data_informasi($subpage, $id_user, $request) {
        if($subpage == "kalender-kegiatan" || $subpage == "Kalender Kegiatan") {
            $data_informasi = new InformasiKalender([
                'id_user' => $id_user,
                'acara' => $request->get('acara'),
                'tempat' => $request->get('tempat'),
                'kehadiran' => $request->get('kehadiran'),
                'jam_mulai' => $request->get('jam_mulai'),
                'jam_selesai' => $request->get('jam_selesai'),
                'tanggal' => $request->get('tanggal'),
            ]);
        }
        elseif($subpage == "inovasi-dan-prestasi" || $subpage == "Inovasi Dan Prestasi") {
            $data_informasi = new InformasiInovasi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        else {
            $data_informasi = "Halaman Informasi tidak ditemukan"; // apabila mengakses halaman Informasi yang tidak ada di menu
        }

        return $data_informasi;
    }

    public function update_data_informasi($subpage, $id_user, $request, $data_informasi) {
        if($subpage == "kalender-kegiatan" || $subpage == "Kalender Kegiatan") {
            $data_informasi->acara = $request->get('acara');
            $data_informasi->tempat = $request->get('tempat');
            $data_informasi->kehadiran = $request->get('kehadiran');
            $data_informasi->jam_mulai = $request->get('jam_mulai');
            $data_informasi->jam_selesai = $request->get('jam_selesai');
            $data_informasi->tanggal = $request->get('tanggal');
        }
        elseif($subpage == "inovasi-dan-prestasi" || $subpage == "Inovasi Dan Prestasi") {
            $data_informasi->konten = $request->get('konten');
            $data_informasi->status = "Sudah Dipublikasi";
        }
        else {
            $data_informasi = "Halaman Informasi tidak ditemukan"; // apabila mengakses halaman Informasi yang tidak ada di menu
        }

        return $data_informasi;
    }
}