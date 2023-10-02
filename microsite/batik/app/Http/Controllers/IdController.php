<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\LayananId;
use App\Models\LayananIdDetail;
use App\Traits\ApiBarat;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class IdController extends Controller
{
    use ApiBarat;

    public function layanan_id_form() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $instansi = Instansi::get();

        return view("main", [
            'page' => "Layanan ID",
            'subpage' => "Form Layanan Infrastruktur Digital",
            'instansi' => $instansi,
            'footer_secaw_infografis' => $footer_secaw_infografis
        ]);
    }

    public function layanan_id_resi($kode_layanan) {
        $layanan = LayananId::where('kode_layanan', $kode_layanan)->first();
        $pdf = PDF::loadview('layanan.layanan_resi',['layanan'=>$layanan]);
        return $pdf->stream('Resi Kode Layanan BATIK - '.$layanan->kode_layanan.'.pdf');
    }

    public function layanan_id_form_submit(Request $request){
        $id_instansi = $kode_layanan = $kategori = $nama_pemohon = $kontak = $cakupan = $deskripsi = $foto_kondisi = $file_surat = $no_surat = $perihal_surat = $tanggal_surat = null;
        $id_layanan = $jenis = $kategori_file_surat = null;

        if($request->kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_instalasi_id' => 'required|string',
                'kontak_instalasi_id' => 'required|string',
                'instansi_instalasi' => 'required|int',
                'jenis_instalasi' => 'required',
                'cakupan_instalasi_id' => 'required|string',
                'deskripsi_instalasi_id' => 'required|string',
                'file_foto_kondisi_instalasi' => 'required|mimes:jpg,png,jpeg|max:2000',
                'no_surat_instalasi_id' => 'required|string',
                'tanggal_surat_instalasi_id' => 'required|date',
                'perihal_surat_instalasi_id' => 'required|string',
                'file_surat_instalasi' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_instalasi_id.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_instalasi_id.string' => 'Nama pemohon tidak valid',
                'kontak_instalasi_id.required' => 'Kontak pemohon wajib diisi',
                'kontak_instalasi_id.string' => 'Kontak pemohon tidak valid',
                'instansi_instalasi.required' => 'Instansi wajib dipilih',
                'instansi_instalasi.int' => 'Instansi tidak valid',
                'jenis_instalasi.required' => 'Jenis instalasi jaringan wajib dipilih',
                'cakupan_instalasi_id.required' => 'Cakupan instalasi wajib diisi',
                'cakupan_instalasi_id.string' => 'Cakupan instalasi tidak valid',
                'deskripsi_instalasi_id.required' => 'Deskripsi wajib diisi',
                'deskripsi_instalasi_id.string' => 'Deskripsi tidak valid',
                'file_foto_kondisi_instalasi.required' => 'File foto kondisi wajib diupload',
                'file_foto_kondisi_instalasi.mimes' => 'File foto kondisi tidak valid',
                'file_foto_konsisi_instalasi.max' => 'File foto kondisi melebihi batas maksimal upload yang diperbolehkan',
                'no_surat_instalasi_id.required' => 'No surat wajib diisi',
                'no_surat_instalasi_id.string' => 'No surat tidak valid',
                'tanggal_surat_instalasi_id.required' => 'Tanggal surat wajib ditentukan',
                'tanggal_surat_instalasi_id.date' => 'Tanggal surat tidak valid',
                'perihal_surat_instalasi_id.required' => 'Perihal surat wajib diisi',
                'perihal_surat_instalasi_id.string' => 'Perihal surat tidak valid',
                'file_surat_instalasi.required' => 'File surat permohonan wajib diupload',
                'file_surat_instalasi.mimes' => 'File surat permohonan tidak valid',
                'file_surat_instalasi.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_instalasi');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_instalasi_id');
            $kontak = $request->get('kontak_instalasi_id');
            $jenis = $request->get('jenis_penanganan');
            $cakupan = $request->get('cakupan_instalasi_id');
            $deskripsi = $request->get('deskripsi_instalasi_id');
            $no_surat = $request->get('no_surat_instalasi_id');
            $tanggal_surat = $request->get('tanggal_surat_instalasi_id');
            $perihal_surat = $request->get('perihal_surat_instalasi_id');
    
            $kode_kategori = "TI"; // Ticketing Instalasi
            $kategori_file_surat = "file_surat_instalasi";
            $foto_kondisi = "file_foto_kondisi_instalasi";

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Penanganan Permasalahan Jaringan"){
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_penanganan_id' => 'required|string',
                'kontak_penanganan_id' => 'required|string',
                'instansi_penanganan' => 'required|int',
                'cakupan_penanganan_id' => 'required|string',
                'deskripsi_penanganan_id' => 'required|string',
                'file_foto_kondisi_penanganan' => 'required|mimes:jpg,png,jpeg|max:2000'
            ];

            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_penanganan_id.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_penanganan_id.string' => 'Nama pemohon tidak valid',
                'kontak_penanganan_id.required' => 'Kontak pemohon wajib diisi',
                'kontak_penanganan_id.string' => 'Kontak pemohon tidak valid',
                'instansi_penanganan.required' => 'Instansi wajib dipilih',
                'instansi_penanganan.int' => 'Instansi tidak valid',
                'cakupan_penanganan_id.required' => 'Cakupan permasalahan wajib diisi',
                'cakupan_penanganan_id.string' => 'Cakupan permasalahan tidak valid',
                'deskripsi_penanganan_id.required' => 'Deskripsi wajib diisi',
                'deskripsi_penanganan_id.string' => 'Deskripsi tidak valid',
                'file_foto_kondisi_penanganan.required' => 'File foto kondisi wajib diupload',
                'file_foto_kondisi_penanganan.mimes' => 'File foto kondisi tidak valid',
                'file_foto_konsisi_penanganan.max' => 'File foto kondisi melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_penanganan');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_penanganan_id');
            $kontak = $request->get('kontak_penanganan_id');
            $jenis = $request->get('jenis_penanganan');
            $cakupan = $request->get('cakupan_penanganan_id');
            $deskripsi = $request->get('deskripsi_penanganan_id');

            $kode_kategori = "TP"; // Ticketing Penanganan
            $foto_kondisi = "file_foto_kondisi_penanganan";
            
            // dd($request->all());

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Dukungan Zoom Meeting"){
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_zoom_id' => 'required|string',
                'kontak_zoom_id' => 'required|string',
                'instansi_zoom' => 'required|int',
                'deskripsi_zoom_id' => 'required|string',
                'no_surat_zoom_id' => 'required|string',
                'tanggal_surat_zoom_id' => 'required|date',
                'perihal_surat_zoom_id' => 'required|string',
                'file_surat_zoom' => 'required|mimes:pdf|max:2000'
            ];

            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_zoom_id.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_zoom_id.string' => 'Nama pemohon tidak valid',
                'kontak_zoom_id.required' => 'Kontak pemohon wajib diisi',
                'kontak_zoom_id.string' => 'Kontak pemohon tidak valid',
                'instansi_zoom.required' => 'Instansi wajib dipilih',
                'instansi_zoom.int' => 'Instansi tidak valid',
                'deskripsi_zoom_id.required' => 'Deskripsi wajib diisi',
                'deskripsi_zoom_id.string' => 'Deskripsi tidak valid',
                'no_surat_zoom_id.required' => 'No surat wajib diisi',
                'no_surat_zoom_id.string' => 'No surat tidak valid',
                'tanggal_surat_zoom_id.required' => 'Tanggal surat wajib ditentukan',
                'tanggal_surat_zoom_id.date' => 'Tanggal surat tidak valid',
                'perihal_surat_zoom_id.required' => 'Perihal surat wajib diisi',
                'perihal_surat_zoom_id.string' => 'Perihal surat tidak valid',
                'file_surat_zoom.required' => 'File surat permohonan wajib diupload',
                'file_surat_zoom.mimes' => 'File surat permohonan tidak valid',
                'file_surat_zoom.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_zoom');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_zoom_id');
            $kontak = $request->get('kontak_zoom_id');
            $deskripsi = $request->get('deskripsi_zoom_id');
            $no_surat = $request->get('no_surat_zoom_id');
            $tanggal_surat = $request->get('tanggal_surat_zoom_id');
            $perihal_surat = $request->get('perihal_surat_zoom_id');
            $cakupan = "Cakupan Lainnya";
            
            $kategori_file_surat = "file_surat_zoom";
            $kode_kategori = "TZ"; // Ticketing Zoom


            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        else {
            return redirect()->back()->withErrors('Kategori layanan wajib dipilih');
        }

        if ($request->hasFile($kategori_file_surat) && $kategori_file_surat != null) {
            $filenameWithExt = $request->file($kategori_file_surat)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($kategori_file_surat)->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_surat = $filenameSimpan;
            $path = $request->file($kategori_file_surat)->storeAs('public/layanan/id/surat/', $file_surat);
        }

        if ($request->hasFile('file_foto_kondisi_instalasi')) {
            $filenameWithExt = $request->file('file_foto_kondisi_instalasi')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_foto_kondisi_instalasi')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $foto_kondisi = $filenameSimpan;
            $path = $request->file('file_foto_kondisi_instalasi')->storeAs('public/layanan/id/kondisi/', $foto_kondisi);
        }

        if ($request->hasFile('file_foto_kondisi_penanganan')) {
            $filenameWithExt = $request->file('file_foto_kondisi_penanganan')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_foto_kondisi_penanganan')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $foto_kondisi = $filenameSimpan;
            $path = $request->file('file_foto_kondisi_penanganan')->storeAs('public/layanan/id/kondisi/', $foto_kondisi);
        }

        $layanan_id = new LayananId([
            'id_instansi' => $id_instansi,
            'media' => "Aplikasi",
            'kategori' => $kategori,
            'nama_pemohon' => $nama_pemohon,
            'kontak' => $kontak,
            'cakupan' => $cakupan,
            'deskripsi' => $deskripsi,
            'foto_kondisi' => $foto_kondisi,
            'file_surat' => $file_surat,
            'no_surat' => $no_surat,
            'tanggal_surat' => $tanggal_surat,
            'perihal_surat' => $perihal_surat,
            'tanggal' => date("Y-m-d")
        ]);

        if($layanan_id->save()){
            //kode layanan = Kategori-IDLayanan-Instansi;
            $id_layanan = $layanan_id->id_layanan;
            $kode_layanan = $kode_kategori.$layanan_id->id_layanan.$layanan_id->id_instansi;
            $kode_layanan_update = LayananId::find($id_layanan);
            if (!$kode_layanan_update){
                echo "Error, layanan tidak ditemukan"; die();
            }
            $kode_layanan_update->kode_layanan = $kode_layanan;
            $kode_layanan_update->update();

            if($request->get('jenis')) {
                $total_jenis = count($jenis);
                for ($i=0; $i < $total_jenis; $i++) { 
                    $jenis_save = new LayananIdDetail([
                        'id_layanan' => $id_layanan,
                        'value' => $jenis[$i],
                        'id_layanan_kategori' => 1
                    ]);
                    $jenis_save->save();
                }
            }
            if($request->get('jenis_penanganan_lainnya')) {
                $jenis_save = new LayananIdDetail([
                    'id_layanan' => $id_layanan,
                    'value' => $request->get('jenis_penanganan_lainnya'),
                    'id_layanan_kategori' => 1
                ]);
                $jenis_save->save();
            }
        }

        Session::flash('download_resi', asset("layanan-id/resi/$kode_layanan"));
        return redirect('/layanan-id/form?kode_layanan='.$kode_layanan_update->kode_layanan.'#status')->with('success', 'Harap simpan kode layanan anda: '.$kode_layanan_update->kode_layanan); 
    }
}