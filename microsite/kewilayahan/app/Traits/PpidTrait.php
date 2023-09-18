<?php

namespace App\Traits;

use App\Models\PpidInformasi;
use App\Models\PpidKeberatan;
use App\Models\PpidLaporan;
use App\Models\PpidMaklumat;
use App\Models\PpidPenyelesaian;
use App\Models\PpidPermohonan;
use App\Models\PpidSengketa;
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
        elseif($subpage == "prosedur-permohonan-pelayanan-informasi" || $subpage == "Prosedur Permohonan Pelayanan Informasi") {
            $data_ppid = PpidPermohonan::where('id_user', $id_user)->first();
        }
        elseif($subpage == "prosedur-pengajuan-keberatan-informasi" || $subpage == "Prosedur Pengajuan Keberatan Informasi") {
            $data_ppid = PpidKeberatan::where('id_user', $id_user)->first();
        }
        elseif($subpage == "prosedur-penanganan-sengketa-informasi" || $subpage == "Prosedur Penanganan Sengketa Informasi") {
            $data_ppid = PpidSengketa::where('id_user', $id_user)->first();
        }
        elseif($subpage == "prosedur-permohonan-penyelesaian-sengketa-informasi" || $subpage == "Prosedur Permohonan Penyelesaian Sengketa Informasi") {
            $data_ppid = PpidPenyelesaian::where('id_user', $id_user)->first();
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
        elseif($subpage == "maklumat-pelayanan-informasi" || $subpage == "Maklumat Pelayanan Informasi") {
            $data_ppid = PpidMaklumat::where('id_user', $id_user)->orderBy('created_at', 'DESC')->first();
        }
        elseif($subpage == "all") {
            $data_ppid ['struktur-ppid'] = PpidStruktur::where('id_user', $id_user)->first();
            $data_ppid ['tugas-dan-fungsi-ppid'] = PpidTugasfungsi::where('id_user', $id_user)->first();
            $data_ppid ['prosedur-permohonan-pelayanan-informasi'] = PpidPermohonan::where('id_user', $id_user)->first();
            $data_ppid ['prosedur-pengajuan-keberatan-informasi'] = PpidKeberatan::where('id_user', $id_user)->first();
            $data_ppid ['prosedur-penanganan-sengketa-informasi'] = PpidSengketa::where('id_user', $id_user)->first();
            $data_ppid ['prosedur-permohonan-penyelesaian-sengketa-informasi'] = PpidPenyelesaian::where('id_user', $id_user)->first();
            $data_ppid ['waktu-dan-biaya-layanan-informasi'] = PpidWaktubiaya::where('id_user', $id_user)->first();
            $data_ppid ['daftar-informasi-publik'] = PpidInformasi::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
            $data_ppid ['laporan-penyelesaian-ppid'] = PpidLaporan::where('id_user', $id_user)->orderBy('created_at', 'DESC')->get();
            $data_ppid ['visi-dan-misi-ppid'] = PpidVisimisi::where('id_user', $id_user)->first();
            $data_ppid ['maklumat-pelayanan-informasi'] = PpidVisimisi::where('id_user', $id_user)->first();
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
        elseif($subpage == "prosedur-permohonan-pelayanan-informasi") {
            $randomName = null;
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('gambar')->storeAs('public/files/images/foto/ppid_prosedur/', $filenameSimpan);
            }
            $data_ppid = new PpidPermohonan([
                'id_user' => $id_user,
                'gambar' => $randomName,
            ]);
        }
        elseif($subpage == "prosedur-pengajuan-keberatan-informasi") {
            $randomName = null;
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('gambar')->storeAs('public/files/images/foto/ppid_prosedur/', $filenameSimpan);
            }
            $data_ppid = new PpidKeberatan([
                'id_user' => $id_user,
                'gambar' => $randomName,
            ]);
        }
        elseif($subpage == "prosedur-penanganan-sengketa-informasi") {
            $randomName = null;
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('gambar')->storeAs('public/files/images/foto/ppid_prosedur/', $filenameSimpan);
            }
            $data_ppid = new PpidSengketa([
                'id_user' => $id_user,
                'gambar' => $randomName,
            ]);
        }
        elseif($subpage == "prosedur-permohonan-penyelesaian-sengketa-informasi") {
            $randomName = null;
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('gambar')->storeAs('public/files/images/foto/ppid_prosedur/', $filenameSimpan);
            }
            $data_ppid = new PpidPenyelesaian([
                'id_user' => $id_user,
                'gambar' => $randomName,
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
        elseif($subpage == "maklumat-pelayanan-informasi") {
            $data_ppid = new PpidMaklumat([
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
        elseif($subpage == "prosedur-permohonan-pelayanan-informasi" || $subpage == "prosedur-pengajuan-keberatan-informasi" || $subpage == "prosedur-penanganan-sengketa-informasi" || $subpage == "prosedur-permohonan-penyelesaian-sengketa-informasi") {
            $randomName = null;
            if ($request->hasFile('gambar')) {
                $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName = $filenameSimpan;
                $path = $request->file('gambar')->storeAs('public/files/images/foto/ppid_prosedur', $filenameSimpan);
                $data_ppid->gambar = $randomName;
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