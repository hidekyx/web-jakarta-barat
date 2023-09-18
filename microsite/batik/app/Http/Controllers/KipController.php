<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\LayananKip;
use App\Models\LayananKipDetail;
use App\Traits\ApiBarat;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class KipController extends Controller
{
    use ApiBarat;

    public function layanan_kip_form() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $instansi = Instansi::get();

        return view("main", [
            'page' => "Layanan KIP",
            'subpage' => "Form Layanan Komunikasi dan Informasi Publik",
            'instansi' => $instansi,
            'footer_secaw_infografis' => $footer_secaw_infografis
        ]);
    }

    public function layanan_kip_resi($kode_layanan) {
        $layanan = LayananKip::where('kode_layanan', $kode_layanan)->first();
        $pdf = PDF::loadview('layanan.layanan_resi',['layanan'=>$layanan]);
        return $pdf->stream('Resi Kode Layanan BATIK - '.$layanan->kode_layanan.'.pdf');
    }

    public function layanan_kip_form_submit(Request $request){
        $id_instansi = $kode_layanan = $kategori = $nama_pemohon = $nip_pemohon = $jabatan = $no_hp_pemohon = $email = $alamat_kantor = $deskripsi = $file_surat = null;
        $id_layanan_kip = $jenis_media = $file_media = $jenis_kebutuhan = $waktu_pelaksanaan = $file_materi = null;
        
        if($request->kategori == "Publikasi Media Video dan Grafis") {
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_publikasi' => 'required|string',
                'nip_pemohon_publikasi' => 'required',
                'jabatan_pemohon_publikasi' => 'required|string',
                'instansi_publikasi' => 'required|int',
                'no_hp_pemohon_publikasi' => 'required',
                'email_pemohon_publikasi' => 'required|string',
                'alamat_kantor_publikasi' => 'required|string',
                'deskripsi_publikasi' => 'required|string',
                'file_surat_publikasi' => 'required|mimes:pdf|max:2000'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_publikasi.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_publikasi.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_publikasi.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_publikasi.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_publikasi.string' => 'Jabatan pemohon tidak valid',
                'instansi_publikasi.required' => 'Unit kerja wajib dipilih',
                'instansi_publikasi.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_publikasi.required' => 'No hp pemohon wajib diisi',
                'email_pemohon_publikasi.required' => 'E-mail pemohon wajib diisi',
                'email_pemohon_publikasi.string' => 'E-mail pemohon tidak valid',
                'alamat_kantor_publikasi.required' => 'Alamat kantor wajib diisi',
                'alamat_kantor_publikasi.string' => 'Alamat kantor tidak valid',
                'deskripsi_publikasi.required' => 'Deskripsi publikasi wajib diisi',
                'deskripsi_publikasi.string' => 'Deskripsi publikasi tidak valid',
                'file_surat_publikasi.required' => 'File surat permohonan wajib diupload',
                'file_surat_publikasi.mimes' => 'File surat permohonan tidak valid',
                'file_surat_publikasi.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_publikasi');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_publikasi');
            $nip_pemohon = $request->get('nip_pemohon_publikasi');
            $jabatan = $request->get('jabatan_pemohon_publikasi');
            $no_hp_pemohon = $request->get('no_hp_pemohon_publikasi');
            $email = $request->get('email_publikasi');
            $alamat_kantor = $request->get('alamat_kantor_publikasi');
            $deskripsi = $request->get('deskripsi_publikasi');
            $kategori_file_surat = "file_surat_publikasi";
            $jenis_media = $request->get("jenis_media_publikasi");
            $file_media = "file_media_publikasi";
            $kode_kategori = "KP"; //Kip publikasi

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        elseif($request->kategori == "Dukungan Komunikasi dan Informasi Publik"){
            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon_dukungan' => 'required|string',
                'nip_pemohon_dukungan' => 'required',
                'jabatan_pemohon_dukungan' => 'required|string',
                'instansi_dukungan' => 'required|int',
                'no_hp_pemohon_dukungan' => 'required',
                'email_pemohon_dukungan' => 'required|string',
                'alamat_kantor_dukungan' => 'required|string',
                'deskripsi_dukungan' => 'required|string',
                'file_surat_dukungan' => 'required|mimes:pdf|max:2000' 
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'kategori.string' => 'Kategori tidak valid',
                'nama_pemohon_dukungan.required' => 'Nama pemohon wajib diisi',
                'nama_pemohon_dukungan.string' => 'Nama pemohon tidak valid',
                'nip_pemohon_dukungan.required' => 'NIP pemohon wajib diisi',
                'jabatan_pemohon_dukungan.required' => 'Jabatan pemohon wajib diisi',
                'jabatan_pemohon_dukungan.string' => 'Jabatan pemohon tidak valid',
                'instansi_dukungan.required' => 'Unit kerja wajib dipilih',
                'instansi_dukungan.int' => 'Unit kerja tidak valid',
                'no_hp_pemohon_dukungan.required' => 'No hp pemohon wajib diisi',
                'email_pemohon_dukungan.required' => 'E-mail pemohon wajib diisi',
                'email_pemohon_dukungan.string' => 'E-mail pemohon tidak valid',
                'alamat_kantor_dukungan.required' => 'Alamat kantor wajib diisi',
                'alamat_kantor_dukungan.string' => 'Alamat kantor tidak valid',
                'deskripsi_dukungan.required' => 'Deskripsi publikasi wajib diisi',
                'deskripsi_dukungan.string' => 'Deskripsi publikasi tidak valid',
                'file_surat_dukungan.required' => 'File surat permohonan wajib diupload',
                'file_surat_dukungan.mimes' => 'File surat permohonan tidak valid',
                'file_surat_dukungan.max' => 'File surat permohonan melebihi batas maksimal upload yang diperbolehkan'
            ];

            $id_instansi = $request->get('instansi_dukungan');
            $kategori = $request->get('kategori');
            $nama_pemohon = $request->get('nama_pemohon_dukungan');
            $nip_pemohon = $request->get('nip_pemohon_dukungan');
            $jabatan = $request->get('jabatan_pemohon_dukungan');
            $no_hp_pemohon = $request->get('no_hp_pemohon_dukungan');
            $email = $request->get('email_pemohon_dukungan');
            $alamat_kantor = $request->get('alamat_kantor_dukungan');
            $deskripsi = $request->get('deskripsi_dukungan');
            $kategori_file_surat = "file_surat_dukungan";
            $jenis_kebutuhan = $request->get("jenis_kebutuhan_dukungan");
            $waktu_pelaksanaan = $request->get("waktu_pelaksanaan_dukungan");
            $file_materi = "file_materi_dukungan";
            $kode_kategori = "KD"; //Kip publikasi

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
        }

        else {
            return redirect() ->back()->withErrors('Kategori layanan wajib dipilih');
        }

        if ($request->hasFile($kategori_file_surat)){
            $filenameWithExt = $request->file($kategori_file_surat)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($kategori_file_surat)->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_surat = $filenameSimpan;
            $path = $request->file($kategori_file_surat)->storeAs('public/layanan/kip/surat_permohonan/', $file_surat);
        }

        if ($request->hasFile('file_media_publikasi')) {
            $filenameWithExt = $request->file('file_media_publikasi')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_media_publikasi')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_media = $filenameSimpan;
            $path = $request->file('file_media_publikasi')->storeAs('public/layanan/kip/file_media/', $file_media);
        }

        if ($request->hasFile('file_materi_dukungan')) {
            $filenameWithExt = $request->file('file_materi_dukungan')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_materi_dukungan')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $file_materi = $filenameSimpan;
            $path = $request->file('file_materi_dukungan')->storeAs('public/layanan/kip/file_materi/', $file_materi);
        }

        $layanan_kip = new LayananKip([
            'id_instansi' => $id_instansi,
            'kategori' => $kategori,
            'nama_pemohon' => $nama_pemohon,
            'nip_pemohon' => $nip_pemohon,
            'jabatan' => $jabatan,
            'no_hp_pemohon' => $no_hp_pemohon,
            'email' => $email,
            'alamat_kantor' => $alamat_kantor,
            'deskripsi' => $deskripsi,
            'surat_permohonan' => $file_surat,
            'tanggal_penerimaan' => date("Y-m-d")
        ]);
        

        if($layanan_kip->save()){
            //kode layanan = Kategori-IDLayanan-Instansi;
            $id_layanan_kip = $layanan_kip->id_layanan_kip;
            $kode_layanan = $kode_kategori.$layanan_kip->id_layanan_kip.$layanan_kip->id_instansi;
            $kode_layanan_update = LayananKip::find($id_layanan_kip);
            if (!$kode_layanan_update){
                echo "Error, layanan tidak ditemukan"; die();
            }
            $kode_layanan_update->kode_layanan = $kode_layanan;
            $kode_layanan_update->update();

            $layanan_kip_detail = new LayananKipDetail([
                'id_layanan_kip' => $id_layanan_kip,
                'kategori' => $kategori,
                'jenis_media' => $jenis_media,
                'file_media' => $file_media,
                'jenis_kebutuhan' => $jenis_kebutuhan,
                'waktu_pelaksanaan' => $waktu_pelaksanaan,
                'file_materi' => $file_materi,
            ]);
            $layanan_kip_detail->save();
        }

        Session::flash('download_resi', asset("layanan-kip/resi/$kode_layanan"));
        return redirect('/layanan-kip/form?kode_layanan'.$kode_layanan_update->kode_layanan.'#status')->with('success', 'Harap simpan kode layanan anda: '.$kode_layanan_update->kode_layanan);        
    }
}