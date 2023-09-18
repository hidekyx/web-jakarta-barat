<?php

namespace App\Traits;

use App\Models\PpidInformasi;
use App\Models\PpidLaporan;
use App\Models\PpidProsedur;
use App\Models\PpidStruktur;
use App\Models\PpidTugasfungsi;
use App\Models\PpidVisimisi;
use App\Models\PpidWaktubiaya;

trait PpidTrait
{
    public function get_data_ppid($subpage, $id_user) {
        if($subpage == "struktur-ppid" || $subpage == "Struktur PPID") {
            $data_ppid = PpidStruktur::where('id_user', $id_user)->first();
        }
        elseif($subpage == "tugas-dan-fungsi-ppid" || $subpage == "Tugas Dan Fungsi PPID") {
            $data_ppid = PpidTugasfungsi::where('id_user', $id_user)->first();
        }
        elseif($subpage == "prosedur-pelayanan-informasi" || $subpage == "Prosedur Pelayanan Informasi") {
            $data_ppid = PpidProsedur::where('id_user', $id_user)->first();
        }
        elseif($subpage == "waktu-dan-biaya-layanan-informasi" || $subpage == "Waktu Dan Biaya Layanan Informasi") {
            $data_ppid = PpidWaktubiaya::where('id_user', $id_user)->first();
        }
        elseif($subpage == "daftar-informasi-publik" || $subpage == "Daftar Informasi Publik") {
            $data_ppid = PpidInformasi::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
        }
        elseif($subpage == "laporan-penyelesaian-ppid" || $subpage == "Laporan Penyelesaian PPID") {
            $data_ppid = PpidLaporan::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
        }
        elseif($subpage == "visi-dan-misi-ppid" || $subpage == "Visi Dan Misi PPID") {
            $data_ppid = PpidVisimisi::where('id_user', $id_user)->orderBy('created_at', 'DESC')->first();
        }
        elseif($subpage == "all") {
            $data_ppid ['struktur-ppid'] = PpidStruktur::where('id_user', $id_user)->first();
            $data_ppid ['tugas-dan-fungsi-ppid'] = PpidTugasfungsi::where('id_user', $id_user)->first();
            $data_ppid ['prosedur-pelayanan-informasi'] = PpidProsedur::where('id_user', $id_user)->first();
            $data_ppid ['waktu-dan-biaya-layanan-informasi'] = PpidWaktubiaya::where('id_user', $id_user)->first();
            $data_ppid ['daftar-informasi-publik'] = PpidInformasi::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
            $data_ppid ['laporan-penyelesaian-ppid'] = PpidLaporan::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
            $data_ppid ['visi-dan-misi-ppid'] = PpidVisimisi::where('id_user', $id_user)->first();
        }
        else {
            $data_ppid = "Halaman PPID tidak ditemukan"; // apabila mengakses halaman PPID yang tidak ada di menu
        }

        return $data_ppid;
    }

    public function detail_data_ppid($subpage, $id_user, $id_ppid) {
        if($subpage == "daftar-informasi-publik" || $subpage == "Daftar Informasi Publik") {
            $data_ppid = PpidInformasi::where('id_user', $id_user)->where('id_ppid', $id_ppid)->first();
        }
        elseif($subpage == "laporan-penyelesaian-ppid" || $subpage == "Laporan Penyelesaian PPID") {
            $data_ppid = PpidLaporan::where('id_user', $id_user)->where('id_ppid', $id_ppid)->first();
        }
        else {
            $data_ppid = "Halaman PPID tidak ditemukan"; // apabila mengakses halaman PPID yang tidak ada di menu
        }

        return $data_ppid;
    }

    public function store_data_ppid($subpage, $id_user, $request) {
        if($subpage == "struktur-ppid") {
            $randomName = null;
            if ($request->hasFile('struktur_organisasi')) {
                $filenameWithExt = $request->file('struktur_organisasi')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('struktur_organisasi')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('struktur_organisasi')->storeAs('public/files/images/foto/ppid_struktur_organisasi/', $filenameSimpan);
            }
            $data_ppid = new PpidStruktur([
                'id_user' => $id_user,
                'struktur_organisasi' => $randomName,
            ]);
        }
        elseif($subpage == "prosedur-pelayanan-informasi") {
            $randomName = null;
            if ($request->hasFile('prosedur')) {
                $filenameWithExt = $request->file('prosedur')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('prosedur')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('prosedur')->storeAs('public/files/images/foto/ppid_prosedur/', $filenameSimpan);
            }
            $data_ppid = new PpidProsedur([
                'id_user' => $id_user,
                'prosedur' => $randomName,
            ]);
        }
        elseif($subpage == "tugas-dan-fungsi-ppid") {
            $data_ppid = new PpidTugasfungsi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "waktu-dan-biaya-layanan-informasi") {
            $data_ppid = new PpidWaktubiaya([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "visi-dan-misi-ppid") {
            $data_ppid = new PpidVisimisi([
                'id_user' => $id_user,
                'konten' => $request->get('konten'),
                'status' => "Sudah Dipublikasi",
            ]);
        }
        elseif($subpage == "daftar-informasi-publik") {
            $randomName = null;
            if ($request->hasFile('file')) {
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/files/images/foto/ppid_daftar_informasi_publik/', $filenameSimpan);
            }
            $data_ppid = new PpidInformasi([
                'id_user' => $id_user,
                'judul' => $request->get('judul'),
                'keterangan' => $request->get('keterangan'),
                'file' => $randomName,
            ]);
        }
        elseif($subpage == "laporan-penyelesaian-ppid") {
            $randomName = null;
            if ($request->hasFile('file')) {
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/files/images/foto/ppid_laporan_penyelesaian/', $filenameSimpan);
            }
            $data_ppid = new PpidLaporan([
                'id_user' => $id_user,
                'judul' => $request->get('judul'),
                'keterangan' => $request->get('keterangan'),
                'file' => $randomName,
            ]);
        }
        else {
            $data_ppid = "Halaman PPID tidak ditemukan"; // apabila mengakses halaman PPID yang tidak ada di menu
        }

        return $data_ppid;
    }

    public function update_data_ppid($subpage, $id_user, $request, $data_ppid) {
        if($subpage == "struktur-ppid") {
            $randomName = null;
            if ($request->hasFile('struktur_organisasi')) {
                $filenameWithExt = $request->file('struktur_organisasi')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('struktur_organisasi')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('struktur_organisasi')->storeAs('public/files/images/foto/ppid_struktur_organisasi', $filenameSimpan);
                $data_ppid->struktur_organisasi = $randomName;
            }
        }
        elseif($subpage == "prosedur-pelayanan-informasi") {
            $randomName = null;
            if ($request->hasFile('prosedur')) {
                $filenameWithExt = $request->file('prosedur')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('prosedur')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('prosedur')->storeAs('public/files/images/foto/ppid_prosedur', $filenameSimpan);
                $data_ppid->prosedur = $randomName;
            }
        }
        elseif($subpage == "daftar-informasi-publik") {
            $randomName = null;
            if ($request->hasFile('file')) {
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/files/images/foto/ppid_daftar_informasi_publik', $filenameSimpan);
                $data_ppid->file = $randomName;
            }
            else {
                $data_ppid->judul = $request->get('judul');
                $data_ppid->keterangan = $request->get('keterangan');
            }
        }
        elseif($subpage == "laporan-penyelesaian-ppid") {
            $randomName = null;
            if ($request->hasFile('file')) {
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/files/images/foto/ppid_laporan_penyelesaian', $filenameSimpan);
                $data_ppid->file = $randomName;
            }
            else {
                $data_ppid->judul = $request->get('judul');
                $data_ppid->keterangan = $request->get('keterangan');
            }
        }
        else {
            $data_ppid = "Halaman PPID tidak ditemukan"; // apabila mengakses halaman PPID yang tidak ada di menu
        }

        return $data_ppid;
    }
}