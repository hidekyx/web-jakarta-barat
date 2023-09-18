<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use App\Models\InformasiPublik;
use App\Models\Keberatan;
use App\Models\Permohonan;
use App\Models\Statistik;

class LaporanController extends Controller
{
    public function laporan_dokumen() {
        $berita_terbaru = Berita::orderBy('id', 'DESC')->where('time', '>=', date('2022-01-01'))->where('published', 'Y')->limit(5)->get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'berita_terbaru' => $berita_terbaru,
            'page' => 'Laporan',
            'subpage' => 'Laporan PPID Jakarta Barat'
        ]);
    }

    public function laporan_statistik() {
        $statistik['jumlah_setiap_saat'] = InformasiPublik::where('kategori', 'Setiap Saat')->count();
        $statistik['jumlah_berkala'] = InformasiPublik::where('kategori', 'Berkala')->count();
        $statistik['jumlah_serta_merta'] = InformasiPublik::where('kategori', 'Serta Merta')->count();
        $statistik['jumlah_dikecualikan'] = InformasiPublik::where('kategori', 'Dikecualikan')->count();

        $statistik['jumlah_dipersetujui'] = Permohonan::where('status', 'Dipersetujui')->count();
        $statistik['jumlah_ditolak'] = Permohonan::where('status', 'Ditolak')->count();
        $statistik['jumlah_diproses'] = Permohonan::where('status', 'Menunggu Respon')->orwhere('status', 'Sedang Diproses')->count();

        $statistik['jumlah_informasi'] = InformasiPublik::count();
        $statistik['jumlah_download'] = InformasiPublik::sum('download');
        $statistik['jumlah_permohonan'] = Permohonan::count();
        $statistik['jumlah_keberatan'] = Keberatan::count();
        $statistik['jumlah_permohonan_selesai'] = Permohonan::where('status', 'Dipersetujui')->orwhere('status', 'Ditolak')->count();

        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();

        return view("front.main", [
            'statistik' => $statistik,
            'page' => 'Laporan',
            'subpage' => 'Laporan Statistik PPID Jakarta Barat'
        ]);
    }
}
