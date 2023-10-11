<?php

namespace App\Http\Controllers;

use App\Models\AstikSecurityAwareness;
use App\Models\AstikStatistik;
use App\Models\Instansi;
use App\Models\LayananAstik;
use App\Models\LayananAstikDetail;
use App\Traits\ApiBarat;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AstikController extends Controller
{
    use ApiBarat;
    
    public function layanan_astik_form() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $instansi = Instansi::get();

        return view("main", [
            'page' => "Layanan Astik",
            'subpage' => "Form Layanan Aplikasi Siber dan Statistik",
            'instansi' => $instansi,
            'footer_secaw_infografis' => $footer_secaw_infografis,
        ]);
    }

    public function layanan_astik_form_optimalisasi() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $instansi = Instansi::get();

        return view("main", [
            'page' => "Layanan Astik",
            'subpage' => "Form Layanan Aplikasi Siber dan Statistik - Optimalisasi",
            'instansi' => $instansi,
            'footer_secaw_infografis' => $footer_secaw_infografis,
        ]);
    }

    public function layanan_astik_resi($kode_layanan) {
        $layanan = LayananAstik::where('kode_layanan', $kode_layanan)->first();
        $pdf = PDF::loadview('layanan.layanan_resi',['layanan'=>$layanan]);
        return $pdf->stream('Resi Kode Layanan BATIK - '.$layanan->kode_layanan.'.pdf');
        // return view("layanan.layanan_resi", [
        //     'layanan' => $layanan
        // ]);
    }

    public function layanan_astik_secaw() {
        $secaw_materi = AstikSecurityAwareness::where('kategori','Materi')->orderBy('id_secaw', 'DESC')->get();
        $secaw_infografis = $this->get_infografis();
        $footer_secaw_infografis = $this->get_latest_infografis();

        return view("main", [
            'page' => "Layanan Astik",
            'subpage' => "Security Awareness",
            'secaw_infografis' => $secaw_infografis,
            'secaw_materi' => $secaw_materi,
            'footer_secaw_infografis' => $footer_secaw_infografis,
        ]);
    }

    public function layanan_astik_statistik() {
        $statistik_materi = AstikStatistik::where('kategori','Materi')->orderBy('id_statistik', 'DESC')->get();
        $statistik_infografis = $this->get_infografis_statistik();
        $footer_secaw_infografis = $this->get_latest_infografis();

        return view("main", [
            'page' => "Layanan Astik",
            'subpage' => "Statistik",
            'statistik_materi' => $statistik_materi,
            'statistik_infografis' => $statistik_infografis,
            'footer_secaw_infografis' => $footer_secaw_infografis,
        ]);
    }

    public function layanan_astik_form_submit(Request $request) {
        $id_instansi = $kode_layanan = $kategori = $nama_pemohon = $nip_pemohon = $jabatan = $no_hp_pemohon = $email = $alamat_kantor = $penjelasan = $nama_narahubung = $no_hp_narahubung = $file_surat = null;
        $id_layanan_astik = $tanggal_pelaksanaan = $waktu_mulai = $waktu_akhir = $lokasi_pelaksanaan = $jammer_sinyal = $perangkat = $seksi = $bidang = $perangkat_daerah = null;
        $jenis_akun = $target_akun = $nama_domain = $jenis_web = $fungsi_web = $lokasi_server = $ip_address = $port = $operating_system = $protokol = null;
        $bahasa = $database = $service_lain = $organisasi = $kota = $provinsi = $file_ektp = $file_sk = $nik_pemohon = $jenis_permasalahan = null;

        if($request->kategori == "Kontra Penginderaan") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_penginderaan' => 'required|string',
                'nip_pemohon_penginderaan' => 'required',
                'jabatan_pemohon_penginderaan' => 'required|string',
                'instansi_penginderaan' => 'required|int',
                'tanggal_pelaksanaan_penginderaan' => 'required|date',
                'waktu_mulai_penginderaan' => 'required|date_format:H:i',
                'lokasi_pelaksanaan_penginderaan' => 'required|string',
                'nama_narahubung_penginderaan' => 'required|string',
                'no_telp_narahubung_penginderaan' => 'required',
                'file_surat_penginderaan' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_penginderaan.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_penginderaan.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_penginderaan.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_penginderaan.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_penginderaan.string' => 'Jabatan pemohon tidak valid',
                'instansi_penginderaan.required' => 'Unit kerja wajib dipilih',
                'instansi_penginderaan.int' => 'Unit kerja tidak valid',
                'tanggal_pelaksanaan_penginderaan.date' => 'Tanggal pelaksanaan tidak valid',
                'tanggal_pelaksanaan_penginderaan.required' => 'Tanggal pelaksanaan wajib ditentukan',
                'waktu_mulai_penginderaan.required' => 'Waktu mulai wajib ditentukan',
                'waktu_mulai_penginderaan.time' => 'Waktu mulai tidak valid',
                'lokasi_pelaksanaan_penginderaan.required' => 'Lokasi pelaksanaan wajib ditentukan',
                'lokasi_pelaksanaan_penginderaan.time' => 'Lokasi pelaksanaan tidak valid',
                'nama_narahubung_penginderaan.required' => 'Nama narahubung wajib diisi',
                'nama_narahubung_penginderaan.string' => 'Nama narahubung tidak valid',
                'no_telp_narahubung_penginderaan.required' => 'No telp narahubung wajib diisi',
                'file_surat_penginderaan.required' => 'File surat permohonan wajib diupload',
                'file_surat_penginderaan.mimes' => 'File surat permohonan tidak valid',
                'file_surat_penginderaan.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_penginderaan');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_penginderaan');
            $nip_pemohon = $request->get('nip_pemohon_penginderaan');
            $jabatan = $request->get('jabatan_pemohon_penginderaan');
            $nama_narahubung = $request->get('nama_narahubung_penginderaan');
            $no_hp_narahubung = $request->get('no_telp_narahubung_penginderaan');

            $tanggal_pelaksanaan = $request->get('tanggal_pelaksanaan_penginderaan');
            $waktu_mulai = $request->get('waktu_mulai_penginderaan');
            $lokasi_pelaksanaan = $request->get('lokasi_pelaksanaan_penginderaan');
            $kode_kategori = "AP"; //Astik Penginderaan
            $kategori_file_surat = "file_surat_penginderaan";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Pengamanan Sinyal") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_sinyal' => 'required|string',
                'nip_pemohon_sinyal' => 'required',
                'jabatan_pemohon_sinyal' => 'required|string',
                'instansi_sinyal' => 'required|int',
                'tanggal_pelaksanaan_sinyal' => 'required|date',
                'waktu_mulai_sinyal' => 'required|date_format:H:i',
                'waktu_akhir_sinyal' => 'required|date_format:H:i',
                'lokasi_pelaksanaan_sinyal' => 'required|string',
                'jammer_sinyal' => 'required',
                'nama_narahubung_sinyal' => 'required|string',
                'no_telp_narahubung_sinyal' => 'required',
                'file_surat_sinyal' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_sinyal.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_sinyal.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_sinyal.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_sinyal.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_sinyal.string' => 'Jabatan pemohon tidak valid',
                'instansi_sinyal.required' => 'Unit kerja wajib dipilih',
                'instansi_sinyal.int' => 'Unit kerja tidak valid',
                'tanggal_pelaksanaan_sinyal.required' => 'Tanggal pelaksanaan wajib ditentukan',
                'tanggal_pelaksanaan_sinyal.date' => 'Tanggal pelaksanaan tidak valid',
                'waktu_mulai_sinyal.required' => 'Waktu mulai wajib ditentukan',
                'waktu_mulai_sinyal.time' => 'Waktu mulai tidak valid',
                'waktu_akhir_sinyal.required' => 'Waktu akhir wajib ditentukan',
                'waktu_akhir_sinyal.time' => 'Waktu akhir tidak valid',
                'lokasi_pelaksanaan_sinyal.required' => 'Lokasi pelaksanaan wajib ditentukan',
                'lokasi_pelaksanaan_sinyal.time' => 'Lokasi pelaksanaan tidak valid',
                'jammer_sinyal.required' => 'Jammer sinyal wajib dipilih',
                'nama_narahubung_sinyal.required' => 'Nama narahubung wajib diisi',
                'nama_narahubung_sinyal.string' => 'Nama narahubung tidak valid',
                'no_telp_narahubung_sinyal.required' => 'No telp narahubung wajib diisi',
                'file_surat_sinyal.required' => 'File surat permohonan wajib diupload',
                'file_surat_sinyal.mimes' => 'File surat permohonan tidak valid',
                'file_surat_sinyal.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_sinyal');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_sinyal');
            $nip_pemohon = $request->get('nip_pemohon_sinyal');
            $jabatan = $request->get('jabatan_pemohon_sinyal');
            $nama_narahubung = $request->get('nama_narahubung_sinyal');
            $no_hp_narahubung = $request->get('no_telp_narahubung_sinyal');

            $tanggal_pelaksanaan = $request->get('tanggal_pelaksanaan_sinyal');
            $waktu_mulai = $request->get('waktu_mulai_sinyal');
            $waktu_akhir = $request->get('waktu_akhir_sinyal');
            $lokasi_pelaksanaan = $request->get('lokasi_pelaksanaan_sinyal');
            $jammer_sinyal = implode("|", $request->get('jammer_sinyal'));
            $kode_kategori = "AJ"; // Astik Jammer
            $kategori_file_surat = "file_surat_sinyal";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Instalasi Antivirus") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_antivirus' => 'required|string',
                'nip_pemohon_antivirus' => 'required',
                'jabatan_pemohon_antivirus' => 'required|string',
                'instansi_antivirus' => 'required|int',
                'no_hp_pemohon_antivirus' => 'required',
                'email_pemohon_antivirus' => 'required|string',
                'alamat_kantor_antivirus' => 'required|string',
                'nama_narahubung_antivirus' => 'required|string',
                'no_telp_narahubung_antivirus' => 'required',
                'file_surat_antivirus' => 'mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_antivirus.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_antivirus.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_antivirus.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_antivirus.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_antivirus.string' => 'Jabatan pemohon tidak valid',
                'instansi_antivirus.required' => 'Unit kerja wajib dipilih',
                'instansi_antivirus.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_antivirus.required' => 'No telp pemohon wajib diisi',
                'email_pemohon_antivirus.required' => 'Email pemohon wajib diisi',
                'email_pemohon_antivirus.string' => 'Email pemohon tidak valid',
                'alamat_kantor_antivirus.required' => 'Alamat kantor wajib diisi',
                'alamat_kantor_antivirus.string' => 'Alamat kantor tidak valid',
                'nama_narahubung_antivirus.required' => 'Nama narahubung wajib diisi',
                'nama_narahubung_antivirus.string' => 'Nama narahubung tidak valid',
                'no_telp_narahubung_antivirus.required' => 'No telp narahubung wajib diisi',
                'file_surat_antivirus.mimes' => 'File surat permohonan tidak valid',
                'file_surat_antivirus.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_antivirus');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_antivirus');
            $nip_pemohon = $request->get('nip_pemohon_antivirus');
            $jabatan = $request->get('jabatan_pemohon_antivirus');
            $no_hp_pemohon = $request->get('no_hp_pemohon_antivirus');
            $email = $request->get('email_pemohon_antivirus');
            $alamat_kantor = $request->get('alamat_kantor_antivirus');
            $nama_narahubung = $request->get('nama_narahubung_antivirus');
            $no_hp_narahubung = $request->get('no_telp_narahubung_antivirus');
            $lokasi_pelaksanaan = $request->get('lokasi_pelaksanaan_antivirus');
            $kode_kategori = "AA"; // Astik Antivirus
            $kategori_file_surat = "file_surat_antivirus";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Penetration Testing") {
            $rules = [
                'kategori' => 'required|string',
                'nama_domain_pentest' => 'required|string',
                'jenis_web_pentest' => 'required|string',
                'fungsi_web_pentest' => 'required|string',
                'lokasi_server_pentest' => 'required|string',
                'ip_address_pentest' => 'required|string',
                'port_pentest' => 'required|string',
                'operating_system_pentest' => 'required|string',
                'protokol_pentest' => 'required|string',
                'bahasa_pentest' => 'required|string',
                'database_pentest' => 'required|string',
                'service_lainnya_pentest' => 'nullable|string',
                'nama_pemilik_pentest' => 'required|string',
                'nip_pemilik_pentest' => 'required',
                'jabatan_pemilik_pentest' => 'required|string',
                'instansi_pentest' => 'required|int',
                'file_surat_pentest' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_domain_pentest.required' => 'Nama domain wajib diisi',
                'nama_domain_pentest.string' => 'Nama domain tidak valid',
                'jenis_web_pentest.required' => 'Jenis web wajib diisi',
                'jenis_web_pentest.string' => 'Jenis web tidak valid',
                'fungsi_web_pentest.required' => 'Fungsi web wajib diisi',
                'fungsi_web_pentest.string' => 'Fungsi web tidak valid',
                'lokasi_server_pentest.required' => 'Lokasi server wajib dipilih',
                'lokasi_server_pentest.string' => 'Lokasi server tidak valid',
                'ip_address_pentest.required' => 'IP address wajib diisi',
                'ip_address_pentest.string' => 'IP address pemohon tidak valid',
                'port_pentest.required' => 'Port wajib diisi',
                'port_pentest.string' => 'Port tidak valid',
                'operating_system_pentest.required' => 'Operating system wajib diisi',
                'operating_system_pentest.string' => 'Operating system tidak valid',
                'protokol_pentest.required' => 'Protokol wajib diisi',
                'protokol_pentest.string' => 'Protokol tidak valid',
                'bahasa_pentest.required' => 'Bahasa pemrograman wajib diisi',
                'bahasa_pentest.string' => 'Bahasa pemrograman tidak valid',
                'database_pentest.required' => 'Database wajib diisi',
                'database_pentest.string' => 'Database tidak valid',
                'service_lainnya_pentest.string' => 'Service lainnya tidak valid',
                'nama_pemilik_pentest.required' => 'Nama pemilik wajib diisi',
                'nama_pemilik_pentest.string' => 'Nama pemilik tidak valid',
                'nip_pemilik_pentest.required' => 'NIP pemilik wajib diisi',
                'jabatan_pemilik_pentest.required' => 'Jabatan pemilik wajib diisi',
                'jabatan_pemilik_pentest.string' => 'Jabatan pemilik tidak valid',
                'instansi_pentest.required' => 'Unit kerja wajib diisi',
                'instansi_pentest.int' => 'Unit kerja tidak valid',
                'file_surat_pentest.required' => 'File surat permohonan wajib diupload',
                'file_surat_pentest.mimes' => 'File surat permohonan tidak valid',
                'file_surat_pentest.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_pentest');
            $kategori = $request->get('kategori');
            $nama_domain = $request->get('nama_domain_pentest');
            $jenis_web = $request->get('jenis_web_pentest');
            $fungsi_web = $request->get('fungsi_web_pentest');
            if($request->get('lokasi_server_pentest') == "DC Kominfotik") {
                $lokasi_server = $request->get('lokasi_server_pentest');
            }
            else {
                $lokasi_server = $request->get('lokasi_server_lainnya_pentest');
            }
            $ip_address = $request->get('ip_address_pentest');
            $port = $request->get('port_pentest');
            $operating_system = $request->get('operating_system_pentest');
            $protokol = $request->get('protokol_pentest');
            $bahasa = $request->get('bahasa_pentest');
            $database = $request->get('database_pentest');
            $service_lain = $request->get('service_lainnya_pentest');
            $nama_pemohon = $request->get('nama_pemilik_pentest');
            $nip_pemohon = $request->get('nip_pemilik_pentest');
            $jabatan = $request->get('jabatan_pemilik_pentest');
            $kode_kategori = "AX"; // Astik Pentest
            $kategori_file_surat = "file_surat_pentest";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Optimalisasi Komputer / Laptop") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_optimalisasi' => 'required|string',
                'nip_pemohon_optimalisasi' => 'required',
                'jabatan_pemohon_optimalisasi' => 'required|string',
                'instansi_optimalisasi' => 'required|int',
                'no_hp_pemohon_optimalisasi' => 'required',
                'email_pemohon_optimalisasi' => 'required|string',
                'alamat_kantor_optimalisasi' => 'required|string',
                'deskripsi_optimalisasi' => 'required|string',
                'perangkat_optimalisasi' => 'required|string',
                'nama_narahubung_optimalisasi' => 'required|string',
                'no_telp_narahubung_optimalisasi' => 'required',
                'file_surat_optimalisasi' => 'mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_optimalisasi.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_optimalisasi.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_optimalisasi.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_optimalisasi.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_optimalisasi.string' => 'Jabatan pemohon tidak valid',
                'instansi_optimalisasi.required' => 'Unit kerja wajib dipilih',
                'instansi_optimalisasi.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_optimalisasi.required' => 'No HP pemohon wajib diisi',
                'email_pemohon_optimalisasi.required' => 'Email pemohon wajib diisi',
                'email_pemohon_optimalisasi.string' => 'Email pemohon tidak valid',
                'alamat_kantor_optimalisasi.required' => 'Alamat kantor wajib diisi',
                'alamat_kantor_optimalisasi.string' => 'Alamat kantor tidak valid',
                'deskripsi_optimalisasi.required' => 'Penjelasan permasalahan wajib diisi',
                'deskripsi_optimalisasi.string' => 'Penjelasan permasalahan tidak valid',
                'perangkat_optimalisasi.required' => 'Perangkat wajib dipilih',
                'perangkat_optimalisasi.string' => 'Perangkat tidak valid',
                'nama_narahubung_optimalisasi.required' => 'Nama narahubung wajib diisi',
                'nama_narahubung_optimalisasi.string' => 'Nama narahubung tidak valid',
                'no_telp_narahubung_optimalisasi.required' => 'No telp narahubung wajib diisi',
                'file_surat_optimalisasi.mimes' => 'File surat permohonan tidak valid',
                'file_surat_optimalisasi.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_optimalisasi');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_optimalisasi');
            $nip_pemohon = $request->get('nip_pemohon_optimalisasi');
            $jabatan = $request->get('jabatan_pemohon_optimalisasi');
            $no_hp_pemohon = $request->get('no_hp_pemohon_optimalisasi');
            $email = $request->get('email_pemohon_optimalisasi');
            $alamat_kantor = $request->get('alamat_kantor_optimalisasi');
            $penjelasan = $request->get('deskripsi_optimalisasi');
            $perangkat = $request->get('perangkat_optimalisasi');
            $nama_narahubung = $request->get('nama_narahubung_optimalisasi');
            $no_hp_narahubung = $request->get('no_telp_narahubung_optimalisasi');

            $kode_kategori = "AO"; // Astik Optimalisasi
            $kategori_file_surat = "file_surat_optimalisasi";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Pemulihan Akun Pemerintahan Yang Diretas") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_pemulihan' => 'required|string',
                'nip_pemohon_pemulihan' => 'required',
                'jabatan_pemohon_pemulihan' => 'required|string',
                'instansi_pemulihan' => 'required|int',
                'no_hp_pemohon_pemulihan' => 'required',
                'email_instansi_pemulihan' => 'required|string',
                'seksi_pemulihan' => 'required|string',
                'bidang_pemulihan' => 'required|string',
                'perangkat_daerah_pemulihan' => 'required|string',
                'alamat_instansi_pemulihan' => 'required|string',
                'deskripsi_pemulihan' => 'required|string',
                'jenis_akun_pemulihan' => 'required|string',
                'username_pemulihan' => 'required|string',
                'nama_narahubung_pemulihan' => 'required|string',
                'no_telp_narahubung_pemulihan' => 'required',
                'file_surat_pemulihan' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_pemulihan.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_pemulihan.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_pemulihan.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_pemulihan.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_pemulihan.string' => 'Jabatan pemohon tidak valid',
                'instansi_pemulihan.required' => 'Unit kerja wajib dipilih',
                'instansi_pemulihan.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_pemulihan.required' => 'No HP pemohon wajib diisi',
                'email_instansi_pemulihan.required' => 'Email instansi wajib diisi',
                'email_instansi_pemulihan.string' => 'Email instansi tidak valid',
                'seksi_pemulihan.required' => 'Seksi / SubBag / Satpel wajib diisi',
                'seksi_pemulihan.string' => 'Seksi / SubBag / Satpel tidak valid',
                'bidang_pemulihan.required' => 'Bidang / unit / bagian wajib diisi',
                'bidang_pemulihan.string' => 'Bidang / unit / bagian tidak valid',
                'perangkat_daerah_pemulihan.required' => 'Perangkat daerah wajib diisi',
                'perangkat_daerah_pemulihan.string' => 'Perangkat daerah tidak valid',
                'alamat_instansi_pemulihan.required' => 'Alamat instansi wajib diisi',
                'alamat_instansi_pemulihan.string' => 'Alamat instansi tidak valid',
                'deskripsi_pemulihan.required' => 'Penjelasan permasalahan wajib diisi',
                'deskripsi_pemulihan.string' => 'Penjelasan permasalahan tidak valid',
                'jenis_akun_pemulihan.required' => 'Jenis akun wajib dipilih',
                'jenis_akun_pemulihan.string' => 'Jenis akun tidak valid',
                'username_pemulihan.required' => 'Username / email / no HP wajib diisi',
                'username_pemulihan.string' => 'Username / email / no HP tidak valid',
                'nama_narahubung_pemulihan.required' => 'Nama narahubung wajib diisi',
                'nama_narahubung_pemulihan.string' => 'Nama narahubung tidak valid',
                'no_telp_narahubung_pemulihan.required' => 'No telp narahubung wajib diisi',
                'file_surat_pemulihan.required' => 'File surat permohonan wajib diupload',
                'file_surat_pemulihan.mimes' => 'File surat permohonan tidak valid',
                'file_surat_pemulihan.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_pemulihan');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_pemulihan');
            $nip_pemohon = $request->get('nip_pemohon_pemulihan');
            $jabatan = $request->get('jabatan_pemohon_pemulihan');
            $no_hp_pemohon = $request->get('no_hp_pemohon_pemulihan');
            $email = $request->get('email_instansi_pemulihan');
            $seksi = $request->get('seksi_pemulihan');
            $bidang = $request->get('bidang_pemulihan');
            $perangkat_daerah = $request->get('perangkat_daerah_pemulihan');
            $alamat_kantor = $request->get('alamat_instansi_pemulihan');
            $penjelasan = $request->get('deskripsi_pemulihan');
            $jenis_akun = $request->get('jenis_akun_pemulihan');
            $target_akun = $request->get('username_pemulihan');
            $nama_narahubung = $request->get('nama_narahubung_pemulihan');
            $no_hp_narahubung = $request->get('no_telp_narahubung_pemulihan');

            $kode_kategori = "AR"; // Astik Recovery
            $kategori_file_surat = "file_surat_pemulihan";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }
        
        elseif($request->kategori == "Sertifikat Elektronik") {
            $rules = [
                'kategori' => 'required|string',
                'nama_lengkap_sertifikat' => 'required|string',
                'nik_sertifikat' => 'required',
                'nip_sertifikat' => 'required',
                'email_pribadi_sertifikat' => 'required|string',
                'jabatan_sertifikat' => 'required|string',
                'instansi_sertifikat' => 'required|int',
                'no_hp_sertifikat' => 'required',
                'organisasi_sertifikat' => 'required|string',
                'kota_sertifikat' => 'required|string',
                'provinsi_sertifikat' => 'required|string',
                'file_ektp_sertifikat' => 'required|mimes:pdf|max:2000',
                'file_sk_sertifikat' => 'required|mimes:pdf|max:2000',
                'file_surat_sertifikat' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_lengkap_sertifikat.required' => 'Nama lengkap wajib diisi',
                'nama_lengkap_sertifikat.string' => 'Nama lengkap tidak valid',
                'nik_sertifikat.required' => 'NIK wajib diisi',
                'nip_sertifikat.required' => 'NIP wajib diisi',
                'email_pribadi_sertifikat.required' => 'Email pribadi wajib diisi',
                'email_pribadi_sertifikat.string' => 'Email pribadi tidak valid',
                'jabatan_sertifikat.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_sertifikat.string' => 'Jabatan pemohon tidak valid',
                'instansi_sertifikat.required' => 'Unit kerja wajib dipilih',
                'instansi_sertifikat.int' => 'Unit kerja tidak valid',
                'no_hp_sertifikat.required' => 'No HP pemohon wajib diisi',
                'organisasi_sertifikat.required' => 'Organisasi wajib diisi',
                'organisasi_sertifikat.string' => 'Organisasi tidak valid',
                'kota_sertifikat.required' => 'Kota wajib diisi',
                'kota_sertifikat.string' => 'Kota tidak valid',
                'provinsi_sertifikat.required' => 'Provinsi wajib diisi',
                'provinsi_sertifikat.string' => 'Provinsi tidak valid',
                'file_ektp_sertifikat.required' => 'File e-KTP wajib diupload',
                'file_ektp_sertifikat.mimes' => 'File e-KTP tidak valid',
                'file_ektp_sertifikat.max' => 'File e-KTP melebihi batas maksimal upload yang diperbolehkan',
                'file_sk_sertifikat.required' => 'File SK jabatan / SK penempatan wajib diupload',
                'file_sk_sertifikat.mimes' => 'File SK jabatan / SK penempatan tidak valid',
                'file_sk_sertifikat.max' => 'File SK jabatan / SK penempatan melebihi batas maksimal upload yang diperbolehkan',
                'file_surat_sertifikat.required' => 'File surat permohonan wajib diupload',
                'file_surat_sertifikat.mimes' => 'File surat permohonan tidak valid',
                'file_surat_sertifikat.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_sertifikat');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_lengkap_sertifikat');
            $nik_pemohon = $request->get('nik_sertifikat');
            $nip_pemohon = $request->get('nip_sertifikat');
            $jabatan = $request->get('jabatan_sertifikat');
            $no_hp_pemohon = $request->get('no_hp_sertifikat');
            $email = $request->get('email_pribadi_sertifikat');
            $organisasi = $request->get('organisasi_sertifikat');
            $kota = $request->get('kota_sertifikat');
            $provinsi = $request->get('provinsi_sertifikat');

            $kode_kategori = "AS"; // Astik Sertifikat
            $kategori_file_surat = "file_surat_sertifikat";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Permohonan Email") {
            $rules = [
                'kategori' => 'required|string',
                'nama_lengkap_email' => 'required|string',
                'nip_email' => 'required',
                'instansi_email' => 'required|int',
                'no_hp_email' => 'required',
                'file_surat_email' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_lengkap_email.required' => 'Nama lengkap wajib diisi',
                'nama_lengkap_email.string' => 'Nama lengkap tidak valid',
                'nip_email.required' => 'NIP wajib diisi',
                'instansi_email.required' => 'Unit kerja wajib dipilih',
                'instansi_email.int' => 'Unit kerja tidak valid',
                'no_hp_email.required' => 'No HP pemohon wajib diisi',
                'file_surat_email.required' => 'File surat permohonan wajib diupload',
                'file_surat_email.mimes' => 'File surat permohonan tidak valid',
                'file_surat_email.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_email');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_lengkap_email');
            $nip_pemohon = $request->get('nip_email');
            $jabatan = $request->get('jabatan_email');
            $no_hp_pemohon = $request->get('no_hp_email');
            $email = $request->get('email_pribadi_email');

            $kode_kategori = "AE"; // Astik Email
            $kategori_file_surat = "file_surat_email";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Troubleshooting Aplikasi") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_troubleshooting' => 'required|string',
                'nip_pemohon_troubleshooting' => 'required',
                'jabatan_pemohon_troubleshooting' => 'required|string',
                'instansi_troubleshooting' => 'required|int',
                'no_hp_pemohon_troubleshooting' => 'required',
                'email_pemohon_troubleshooting' => 'required|string',
                'alamat_kantor_troubleshooting' => 'required|string',
                'deskripsi_troubleshooting' => 'required|string',
                'jenis_permasalahan_troubleshooting' => 'required|string',
                'file_surat_troubleshooting' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:10000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_troubleshooting.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_troubleshooting.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_troubleshooting.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_troubleshooting.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_troubleshooting.string' => 'Jabatan pemohon tidak valid',
                'instansi_troubleshooting.required' => 'Unit kerja wajib dipilih',
                'instansi_troubleshooting.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_troubleshooting.required' => 'No HP pemohon wajib diisi',
                'email_pemohon_troubleshooting.required' => 'Email pemohon wajib diisi',
                'email_pemohon_troubleshooting.string' => 'Email pemohon tidak valid',
                'alamat_kantor_troubleshooting.required' => 'Alamat kantor wajib diisi',
                'alamat_kantor_troubleshooting.string' => 'Alamat kantor tidak valid',
                'deskripsi_troubleshooting.required' => 'Penjelasan permasalahan wajib diisi',
                'deskripsi_troubleshooting.string' => 'Penjelasan permasalahan tidak valid',
                'jenis_permasalahan_troubleshooting.required' => 'Jenis permasalahan wajib dipilih',
                'jenis_permasalahan_troubleshooting.string' => 'Jenis permasalahan tidak valid',
                'file_surat_troubleshooting.required' => 'File surat permohonan wajib diupload',
                'file_surat_troubleshooting.mimes' => 'File surat permohonan tidak valid',
                'file_surat_troubleshooting.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_troubleshooting');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_troubleshooting');
            $nip_pemohon = $request->get('nip_pemohon_troubleshooting');
            $email = $request->get('email_pemohon_troubleshooting');
            $alamat_kantor = $request->get('alamat_kantor_troubleshooting');
            $jabatan = $request->get('jabatan_pemohon_troubleshooting');
            $no_hp_pemohon = $request->get('no_hp_pemohon_troubleshooting');
            $penjelasan = $request->get('deskripsi_troubleshooting');
            if($request->get('jenis_permasalahan_troubleshooting') == "Tidak Bisa Akses" || $request->get('jenis_permasalahan_troubleshooting') == "Tidak Bisa Upload" || $request->get('jenis_permasalahan_troubleshooting') == "Tidak Bisa Simpan") {
                $jenis_permasalahan = $request->get('jenis_permasalahan_troubleshooting');
            }
            else {
                $jenis_permasalahan = $request->get('jenis_permasalahan_lainnya_troubleshooting');
            }

            $kode_kategori = "AT"; // Astik Troubleshooting
            $kategori_file_surat = "file_surat_troubleshooting";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        else {
            return redirect()->back()->withErrors('Kategori layanan wajib dipilih');
        }

        if ($request->hasFile($kategori_file_surat)) {
            $filenameWithExt = $request->file($kategori_file_surat)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($kategori_file_surat)->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_surat = $filenameSimpan;
            $path = $request->file($kategori_file_surat)->storeAs('public/layanan/astik/surat_permohonan/', $file_surat);
        }

        if ($request->hasFile('file_ektp_sertifikat')) {
            $filenameWithExt = $request->file('file_ektp_sertifikat')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_ektp_sertifikat')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_ektp = $filenameSimpan;
            $path = $request->file('file_ektp_sertifikat')->storeAs('public/layanan/astik/ektp/', $file_ektp);
        }

        if ($request->hasFile('file_sk_sertifikat')) {
            $filenameWithExt = $request->file('file_sk_sertifikat')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_sk_sertifikat')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_sk = $filenameSimpan;
            $path = $request->file('file_sk_sertifikat')->storeAs('public/layanan/astik/sk/', $file_sk);
        }

        $layanan_astik = new LayananAstik([
            'id_instansi' => $id_instansi,
            'kategori' => $kategori,
            'nama_pemohon' => $nama_pemohon,
            'nip_pemohon' => $nip_pemohon,
            'jabatan' => $jabatan,
            'no_hp_pemohon' => $no_hp_pemohon,
            'email' => $email,
            'alamat_kantor' => $alamat_kantor,
            'penjelasan' => $penjelasan,
            'nama_narahubung' => $nama_narahubung,
            'no_hp_narahubung' => $no_hp_narahubung,
            'surat_permohonan' => $file_surat,
            'tanggal_penerimaan' => date("Y-m-d")
        ]);

        if($layanan_astik->save()) {
            //kode layanan = Kategori-IDLayanan-Instansi;
            $id_layanan_astik = $layanan_astik->id_layanan_astik;
            $kode_layanan = $kode_kategori.$layanan_astik->id_layanan_astik.$layanan_astik->id_instansi;
            $kode_layanan_update = LayananAstik::find($id_layanan_astik);
            if (!$kode_layanan_update) {
                echo "Error, layanan tidak ditemukan"; die();
            }
            $kode_layanan_update->kode_layanan = $kode_layanan;
            $kode_layanan_update->update();

            $layanan_astik_detail = new LayananAstikDetail([
                'id_layanan_astik' => $id_layanan_astik,
                'kategori' => $kategori,
                'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
                'waktu_mulai' => $waktu_mulai,
                'waktu_akhir' => $waktu_akhir,
                'lokasi_pelaksanaan' => $lokasi_pelaksanaan,
                'jammer_sinyal' => $jammer_sinyal,
                'perangkat' => $perangkat,
                'seksi' => $seksi,
                'bidang' => $bidang,
                'perangkat_daerah' => $perangkat_daerah,
                'jenis_akun' => $jenis_akun,
                'target_akun' => $target_akun,
                'nama_domain' => $nama_domain,
                'jenis_web' => $jenis_web,
                'fungsi_web' => $fungsi_web,
                'lokasi_server' => $lokasi_server,
                'ip_address' => $ip_address,
                'port' => $port,
                'operating_system' => $operating_system,
                'protokol' => $protokol,
                'bahasa' => $bahasa,
                'database' => $database,
                'service_lain' => $service_lain,
                'organisasi' => $organisasi,
                'kota' => $kota,
                'provinsi' => $provinsi,
                'file_ektp' => $file_ektp,
                'file_sk' => $file_sk,
                'nik_pemohon' => $nik_pemohon,
                'jenis_permasalahan' => $jenis_permasalahan,
            ]);
            $layanan_astik_detail->save();
        }

        Session::flash('download_resi', asset("layanan-astik/resi/$kode_layanan"));
        return redirect('/layanan-astik/form?kode_layanan='.$kode_layanan_update->kode_layanan.'#status')->with('success', 'Harap simpan kode layanan anda: '.$kode_layanan_update->kode_layanan);        
    }
}