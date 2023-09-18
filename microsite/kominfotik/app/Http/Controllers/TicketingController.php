<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\InventarisBarang;
use App\Models\Layanan;
use App\Models\LayananDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Image;

class TicketingController extends Controller
{
    public function list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 4 || $id_role == 6) || ($logged_user->id_seksi == 1)) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $instansi = Instansi::get();

                $results = null;
                $selected_bulan = null;
                $selected_tahun = null;
                $query = Layanan::orderBy('id_layanan', 'DESC');
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    if(isset($results['bulan']) && $results['bulan'] != null) {
                        $filter_bulan = explode('-',$results['bulan']);
                        $selected_bulan = $filter_bulan[1];
                        $selected_tahun = $filter_bulan[0];
                        $query->whereMonth('tanggal', $selected_bulan)->whereyear('tanggal', $selected_tahun);
                    }
                    if(isset($results['instansi']) && $results['instansi'] != null) {
                        $instansi_search = $results['instansi'];
                        $query->where('id_instansi', $instansi_search);
                    }
                    if(isset($results['kategori']) && $results['kategori'] != null) {
                        $kategori_search = $results['kategori'];
                        if($kategori_search == "Instalasi") {
                            $kategori_search = "Instalasi, Penambahan, dan Penataan Jaringan";
                        }
                        if($kategori_search == "Penanganan") {
                            $kategori_search = "Penanganan Permasalahan Jaringan";
                        }
                        $query->where('kategori', $kategori_search);
                    }
                    if(isset($results['kode']) && $results['kode'] != null) {
                        $kode = $results['kode'];
                        $query->where('kode_layanan', $kode);
                    }
                    if($id_role == 1 || $id_role == 2 || $id_role == 4) {
                        if(isset($results['disposisi']) && $results['disposisi'] != null) {
                            $disposisi_search = $results['disposisi'];
                            $id_layanan = LayananDetail::where('id_layanan_kategori', 8)->where('value', $disposisi_search)->pluck('id_layanan');
                            $query->whereIn('id_layanan', $id_layanan);
                        }
                    }
                }
                if($id_role == 3) {
                    $id_layanan = LayananDetail::where('id_layanan_kategori', 8)->where('value', $logged_user->id_user)->pluck('id_layanan');
                    $query->whereIn('id_layanan', $id_layanan);
                }
                $layanan = $query->paginate(10);
                return view("main", [
                    'page' => "Ticketing",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil,
                    'staff' => $staff,
                    'instansi' => $instansi,
                    'layanan' => $layanan
                ]);
            }
        }
        return redirect('/');
    }

    public function export($id_layanan) {
        $layanan = Layanan::where('id_layanan', $id_layanan)->first();
        $kepala_seksi = User::where('id_user', 21)->first();
        $layanan_detail = array();
        $jumlah_layanan_detail = array();
        foreach($layanan->layanan_detail as $ld) {
            if($ld->id_layanan_kategori == 1) {
                $layanan_detail['jenis'][] = $ld->value;
                $jumlah_layanan_detail['jenis'] = count($layanan_detail['jenis']);
                $col1 = array_slice($layanan_detail['jenis'], 0, $jumlah_layanan_detail['jenis']/2 + 0.5);
                $col2 = array_slice($layanan_detail['jenis'], $jumlah_layanan_detail['jenis']/2 + 0.5, $jumlah_layanan_detail['jenis']);
                $row['jenis'] = array($col1, $col2);
            }
            if($ld->id_layanan_kategori == 2) {
                $layanan_detail['penanganan'][] = $ld->value;
                $jumlah_layanan_detail['penanganan'] = count($layanan_detail['penanganan']);
                $col1 = array_slice($layanan_detail['penanganan'], 0, $jumlah_layanan_detail['penanganan']/2 + 0.5);
                $col2 = array_slice($layanan_detail['penanganan'], $jumlah_layanan_detail['penanganan']/2 + 0.5, $jumlah_layanan_detail['penanganan']);
                $row['penanganan'] = array($col1, $col2);
            }
            if($ld->id_layanan_kategori == 3) {
                $layanan_detail['alat_kerja'][] = $ld->value;
                $jumlah_layanan_detail['alat_kerja'] = count($layanan_detail['alat_kerja']);
                $col1 = array_slice($layanan_detail['alat_kerja'], 0, $jumlah_layanan_detail['alat_kerja']/2 + 0.5);
                $col2 = array_slice($layanan_detail['alat_kerja'], $jumlah_layanan_detail['alat_kerja']/2 + 0.5, $jumlah_layanan_detail['alat_kerja']);
                $row['alat_kerja'] = array($col1, $col2);
            }
            if($ld->id_layanan_kategori == 4) {
                $layanan_detail['perangkat'][] = $ld->value;
                $jumlah_layanan_detail['perangkat'] = count($layanan_detail['perangkat']);
                $col1 = array_slice($layanan_detail['perangkat'], 0, $jumlah_layanan_detail['perangkat']/2 + 0.5);
                $col2 = array_slice($layanan_detail['perangkat'], $jumlah_layanan_detail['perangkat']/2 + 0.5, $jumlah_layanan_detail['perangkat']);
                $row['perangkat'] = array($col1, $col2);
            }
            if($ld->id_layanan_kategori == 5) {
                $layanan_detail['barang_habis'][] = $ld->barang->nama_barang." : ".$ld->value_2." ".$ld->barang->satuan;
                $jumlah_layanan_detail['barang_habis'] = count($layanan_detail['barang_habis']);
                $col1 = array_slice($layanan_detail['barang_habis'], 0, $jumlah_layanan_detail['barang_habis']/2 + 0.5);
                $col2 = array_slice($layanan_detail['barang_habis'], $jumlah_layanan_detail['barang_habis']/2 + 0.5, $jumlah_layanan_detail['barang_habis']);
                $row['barang_habis'] = array($col1, $col2);
            }
            if($ld->id_layanan_kategori == 8) {
                $layanan_detail['disposisi'][] = $ld->disposisi->nama_lengkap;
                $jumlah_layanan_detail['disposisi'] = count($layanan_detail['disposisi']);
                $col1 = array_slice($layanan_detail['disposisi'], 0, $jumlah_layanan_detail['disposisi']/2 + 0.5);
                $col2 = array_slice($layanan_detail['disposisi'], $jumlah_layanan_detail['disposisi']/2 + 0.5, $jumlah_layanan_detail['disposisi']);
                $row['disposisi'] = array($col1, $col2);
            }
        }

        if(isset($layanan_detail['penanganan'])) {
            $layanan_detail['penanganan'] = $row['penanganan'];
        }
        else {
            $layanan_detail['penanganan'] = array();
        }

        if(isset($layanan_detail['jenis'])) {
            $layanan_detail['jenis'] = $row['jenis'];
        }
        else {
            $layanan_detail['jenis'] = array();
        }

        if(isset($layanan_detail['alat_kerja'])) {
            $layanan_detail['alat_kerja'] = $row['alat_kerja'];
        }
        else {
            $layanan_detail['alat_kerja'] = array();
        }

        if(isset($layanan_detail['perangkat'])) {
            $layanan_detail['perangkat'] = $row['perangkat'];
        }
        else {
            $layanan_detail['perangkat'] = array();
        }

        if(isset($layanan_detail['barang_habis'])) {
            $layanan_detail['barang_habis'] = $row['barang_habis'];
        }
        else {
            $layanan_detail['barang_habis'] = array();
        }

        if(isset($layanan_detail['disposisi'])) {
            $layanan_detail['disposisi'] = $row['disposisi'];
        }
        else {
            $layanan_detail['disposisi'] = array();
        }

        // return view("ticketing.ba_penanganan", [
        //     'layanan' => $layanan,
        //     'layanan_detail' => $layanan_detail,
        //     'kepala_seksi' => $kepala_seksi
        // ]);
        if($layanan->status == "Selesai") {
            if($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                $pdf = PDF::loadview('ticketing.ba_instalasi',['layanan'=>$layanan, 'layanan_detail'=>$layanan_detail, 'kepala_seksi' => $kepala_seksi]);
                return $pdf->stream('Berita Acara - Instalasi, Penambahan, dan Penataan Jaringan - '.$layanan->kode_layanan.'.pdf');
            }
            if($layanan->kategori == "Penanganan Permasalahan Jaringan") {
                $pdf = PDF::loadview('ticketing.ba_penanganan',['layanan'=>$layanan, 'layanan_detail'=>$layanan_detail, 'kepala_seksi' => $kepala_seksi]);
                return $pdf->stream('Berita Acara - Penanganan Permasalahan Jaringan - '.$layanan->kode_layanan.'.pdf');
            }
        }
    }

    public function create() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 1 || $id_role == 5) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $instansi = Instansi::get();
                return view("main", [
                    'page' => "Ticketing",
                    'subpage' => "Tambah",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil,
                    'staff' => $staff,
                    'instansi' => $instansi
                ]);
            }
        }
        return redirect('/');
    }

    public function edit($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 1 || $id_role == 2 || $id_role == 5) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $instansi = Instansi::get();
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                $disposisi = $layanan->layanan_detail->where('id_layanan_kategori', 8)->pluck('value');
                $jenis = $layanan->layanan_detail->where('id_layanan_kategori', 1)->pluck('value');
                // dd($disposisi[1]->disposisi->nama_lengkap);
                
                return view("main", [
                    'page' => "Ticketing",
                    'subpage' => "Edit",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil,
                    'staff' => $staff,
                    'instansi' => $instansi,
                    'layanan' => $layanan,
                    'disposisi' => $disposisi,
                    'jenis' => $jenis
                ]);
            }
        }
        return redirect('/');
    }

    public function disposisi($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 2) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','1')->where('status_kontrak','Aktif')->get();
                $instansi = Instansi::get();
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if($layanan->status == "Belum Disposisi" || $layanan->status == "Menunggu Respon") {
                    $disposisi = $layanan->layanan_detail->where('id_layanan_kategori', 8)->pluck('value');
                    $jenis = $layanan->layanan_detail->where('id_layanan_kategori', 1)->pluck('value');
                    return view("main", [
                        'page' => "Ticketing",
                        'subpage' => "Disposisi",
                        'logged_user' => $logged_user,
                        'id_role' => $logged_user->id_role,
                        'tenaga_terampil' => $tenaga_terampil,
                        'staff' => $staff,
                        'instansi' => $instansi,
                        'layanan' => $layanan,
                        'disposisi' => $disposisi,
                        'jenis' => $jenis
                    ]);
                }
            }
        }
        return redirect('/');
    }

    public function submit_disposisi(Request $request, $id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $rules = [
                'disposisi' => 'required|array'
            ];
            $messages = [
                'disposisi.required' => 'Disposisi wajib diisi'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_role = $logged_user->id_role;
            if($id_role == 2) {
                $layanan = Layanan::find($id_layanan);
                if (!$layanan) {
                    echo "gaada"; die();
                }
                $id_layanan = $layanan->id_layanan;
                $layanan->status = "Menunggu Respon";
                if($layanan->update()) {
                    $disposisi_delete = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->get();
                    $total_disposisi_delete = count($disposisi_delete);
                    for ($i=0; $i < $total_disposisi_delete; $i++) { 
                        $disposisi_delete[$i]->delete();
                    }
                    $disposisi = $request->get('disposisi');
                    $total_disposisi = count($request->get('disposisi'));
                    for ($i=0; $i < $total_disposisi; $i++) { 
                        $disposisi_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $disposisi[$i],
                            'id_layanan_kategori' => 8
                        ]);
                        $disposisi_save->save();
                    }
                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil diperbaharui');
                }
            }
        }
        return redirect('/');
    }

    public function store(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $kategori = $request->get('kategori');
            // dd($request->all());

            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon' => 'required|string',
                'kontak' => 'required|string',
                'alamat' => 'required|string',
                'tanggal' => 'required|date',
                'instansi' => 'required|int'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'nama_pemohon.required' => 'Nama Pemohon wajib diisi',
                'nip.required' => 'NIP wajib diisi',
                'kontak.required' => 'No. Telp / HP / Email wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'tanggal.required' => 'Tanggal wajib diisi',
                'instansi.required' => 'Tanggal wajib dipilih'
            ];

            if($kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                $rules = $rules + [
                    'deskripsi_1' => 'required|string',
                    'no_surat' => 'required|string',
                    'tanggal_surat' => 'required|date',
                    'perihal_surat' => 'required|string',
                    'gambar_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                    'file' => 'required|mimes:pdf',
                    'jenis' => 'required|array',
                    'cakupan' => 'required|string'
                ];
    
                $messages = $messages + [
                    'deskripsi_1.required' => 'Deskripsi wajib diisi',
                    'no_surat.required' => 'No Surat wajib diisi',
                    'tanggal_surat.required' => 'Tanggal Surat wajib diisi',
                    'perihal_surat.required' => 'Perihal Surat wajib diisi',
                    'gambar_1.required' => 'Gambar lokasi wajib diupload',
                    'file.required' => 'File surat wajib diupload',
                    'jenis.required' => 'Jenis pelayanan wajib dipilih',
                    'cakupan.required' => 'Cakupan lokasi wajib diisi'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_1')) {
                    $filenameWithExt = $request->file('gambar_1')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_1')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_1'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                }

                $randomName_2 = null;
                if ($request->hasFile('file')) {
                    $filenameWithExt = $request->file('file')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_2 = $filenameSimpan;
                    $path = $request->file('file')->storeAs('public/layanan/id/surat/', $randomName_2);
                }

                $layanan = new Layanan([
                    'id_instansi' => $request->get('instansi'),
                    'media' => $request->get('media'),
                    'tanggal' => $request->get('tanggal'),
                    'kategori' => $request->get('kategori'),
                    'nama_pemohon' => $request->get('nama_pemohon'),
                    'nip' => $request->get('nip'),
                    'kontak' => $request->get('kontak'),
                    'alamat' => $request->get('alamat'),
                    'cakupan' => $request->get('cakupan'),
                    'deskripsi' => $request->get('deskripsi_1'),
                    'foto_kondisi' => $randomName_1,
                    'file_surat' => $randomName_2,
                    'no_surat' => $request->get('no_surat'),
                    'tanggal_surat' => $request->get('tanggal_surat'),
                    'perihal_surat' => $request->get('perihal_surat'),
                    'status' => "Belum Disposisi"
                ]);
                if($layanan->save()) {
                    $id_layanan = $layanan->id_layanan;
                    $kode_layanan = "TI".$layanan->id_layanan.$layanan->id_instansi;
                    $kode_layanan_update = Layanan::find($id_layanan);
                    if (!$kode_layanan_update) {
                        echo "gaada"; die();
                    }
                    $kode_layanan_update->kode_layanan = $kode_layanan;
                    $kode_layanan_update->update();

                    $jenis = $request->get('jenis');
                    $total_jenis = count($request->get('jenis'));
                    for ($i=0; $i < $total_jenis; $i++) { 
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $jenis[$i],
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }

                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil ditambahkan');
                }
            }

            elseif($kategori == "Penanganan Permasalahan Jaringan") {
                $rules = $rules + [
                    'deskripsi_2' => 'required|string',
                    'gambar_2' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                    'cakupan' => 'required|string'
                ];
    
                $messages = $messages + [
                    'deskripsi_2.required' => 'Deskripsi wajib diisi',
                    'gambar_2.required' => 'Gambar kondisi wajib diupload',
                    'cakupan.required' => 'Cakupan lokasi wajib diisi'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_2')) {
                    $filenameWithExt = $request->file('gambar_2')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_2')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_2'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                }

                $layanan = new Layanan([
                    'id_instansi' => $request->get('instansi'),
                    'media' => $request->get('media'),
                    'tanggal' => $request->get('tanggal'),
                    'kategori' => $request->get('kategori'),
                    'nama_pemohon' => $request->get('nama_pemohon'),
                    'nip' => $request->get('nip'),
                    'kontak' => $request->get('kontak'),
                    'alamat' => $request->get('alamat'),
                    'cakupan' => $request->get('cakupan'),
                    'deskripsi' => $request->get('deskripsi_2'),
                    'foto_kondisi' => $randomName_1,
                    'status' => "Belum Disposisi"
                ]);
                if($layanan->save()) {
                    $id_layanan = $layanan->id_layanan;
                    $kode_layanan = "TP".$layanan->id_layanan.$layanan->id_instansi;
                    $kode_layanan_update = Layanan::find($id_layanan);
                    if (!$kode_layanan_update) {
                        echo "gaada"; die();
                    }
                    $kode_layanan_update->kode_layanan = $kode_layanan;
                    $kode_layanan_update->update();

                    $jenis = $request->get('jenis');
                    $total_jenis = count($request->get('jenis'));
                    for ($i=0; $i < $total_jenis; $i++) { 
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $jenis[$i],
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }
                    if($request->jenis_lainnya != null) {
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $request->jenis_lainnya,
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }

                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil ditambahkan');
                }
            }

            elseif($kategori == "Dukungan Zoom Meeting") {
                $rules = $rules + [
                    'deskripsi_3' => 'required|string',
                    'no_surat_2' => 'required|string',
                    'tanggal_surat_2' => 'required|date',
                    'perihal_surat_2' => 'required|string',
                    'gambar_3' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                    'file_2' => 'required|mimes:pdf'
                ];
    
                $messages = $messages + [
                    'deskripsi_3.required' => 'Deskripsi wajib diisi',
                    'no_surat_2.required' => 'No Surat wajib diisi',
                    'tanggal_surat_2.required' => 'Tanggal Surat wajib diisi',
                    'perihal_surat_2.required' => 'Perihal Surat wajib diisi',
                    'gambar_3.required' => 'Gambar lokasi wajib diupload',
                    'file_2.required' => 'File surat wajib diupload'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_3')) {
                    $filenameWithExt = $request->file('gambar_3')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_3')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_3'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                }

                $randomName_2 = null;
                if ($request->hasFile('file_2')) {
                    $filenameWithExt = $request->file('file_2')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file_2')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_2 = $filenameSimpan;
                    $path = $request->file('file_2')->storeAs('public/layanan/id/surat/', $randomName_2);
                }

                $layanan = new Layanan([
                    'id_instansi' => $request->get('instansi'),
                    'media' => $request->get('media'),
                    'tanggal' => $request->get('tanggal'),
                    'kategori' => $request->get('kategori'),
                    'nama_pemohon' => $request->get('nama_pemohon'),
                    'nip' => $request->get('nip'),
                    'kontak' => $request->get('kontak'),
                    'alamat' => $request->get('alamat'),
                    'cakupan' => "Cakupan Lainnya",
                    'deskripsi' => $request->get('deskripsi_3'),
                    'foto_kondisi' => $randomName_1,
                    'file_surat' => $randomName_2,
                    'no_surat' => $request->get('no_surat_2'),
                    'tanggal_surat' => $request->get('tanggal_surat_2'),
                    'perihal_surat' => $request->get('perihal_surat_2'),
                    'status' => "Belum Disposisi"
                ]);
                if($layanan->save()) {
                    $id_layanan = $layanan->id_layanan;
                    $kode_layanan = "TL".$layanan->id_layanan.$layanan->id_instansi;
                    $kode_layanan_update = Layanan::find($id_layanan);
                    if (!$kode_layanan_update) {
                        echo "gaada"; die();
                    }
                    $kode_layanan_update->kode_layanan = $kode_layanan;
                    $kode_layanan_update->update();
                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil ditambahkan');
                }
            }

            else {
                return redirect()->back()->withErrors('Kategori wajib dipilih');
            }
        }
        return redirect('/');
    }

    public function update(Request $request, $id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $kategori = $request->get('kategori');

            $rules = [
                'kategori' => 'required|string',
                'nama_pemohon' => 'required|string',
                'kontak' => 'required|string',
                'alamat' => 'required|string',
                'tanggal' => 'required|date',
                'instansi' => 'required|int'
            ];
            $messages = [
                'kategori.required' => 'Kategori wajib dipilih',
                'nama_pemohon.required' => 'Nama Pemohon wajib diisi',
                'kontak.required' => 'No. Telp / HP / Email wajib diisi',
                'alamat.required' => 'Alamat wajib diisi',
                'tanggal.required' => 'Tanggal wajib diisi',
                'instansi.required' => 'Tanggal wajib dipilih'
            ];

            if($kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                $rules = $rules + [
                    'deskripsi_1' => 'required|string',
                    'no_surat' => 'required|string',
                    'tanggal_surat' => 'required|date',
                    'perihal_surat' => 'required|string',
                    'jenis' => 'required|array',
                    'cakupan' => 'required|string'
                ];
    
                $messages = $messages + [
                    'deskripsi_1.required' => 'Deskripsi wajib diisi',
                    'no_surat.required' => 'No Surat wajib diisi',
                    'tanggal_surat.required' => 'Tanggal Surat wajib diisi',
                    'perihal_surat.required' => 'Perihal Surat wajib diisi',
                    'jenis.required' => 'Jenis pelayanan wajib dipilih',
                    'cakupan.required' => 'Cakupan lokasi wajib diisi'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $layanan = Layanan::find($id_layanan);
                if (!$layanan) {
                    echo "gaada"; die();
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_1')) {
                    $filenameWithExt = $request->file('gambar_1')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_1')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_1'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                    $layanan->foto_kondisi = $randomName_1;
                }

                $randomName_2 = null;
                if ($request->hasFile('file')) {
                    $filenameWithExt = $request->file('file')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_2 = $filenameSimpan;
                    $path = $request->file('file')->storeAs('public/layanan/id/surat/', $randomName_2);
                    $layanan->file_surat = $randomName_2;
                }
                $layanan->id_instansi = $request->get('instansi');
                $layanan->tanggal = $request->get('tanggal');
                $layanan->kategori = $request->get('kategori');
                $layanan->nama_pemohon = $request->get('nama_pemohon');
                $layanan->kontak = $request->get('kontak');
                $layanan->alamat = $request->get('alamat');
                $layanan->cakupan = $request->get('cakupan');
                $layanan->deskripsi = $request->get('deskripsi_1');
                $layanan->no_surat = $request->get('no_surat');
                $layanan->tanggal_surat = $request->get('tanggal_surat');
                $layanan->perihal_surat = $request->get('perihal_surat');
                if($layanan->update()) {
                    $id_layanan = $layanan->id_layanan;
                    if($logged_user->id_role == 2) {
                        $disposisi_delete = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->get();
                        $total_disposisi_delete = count($disposisi_delete);
                        for ($i=0; $i < $total_disposisi_delete; $i++) { 
                            $disposisi_delete[$i]->delete();
                        }
                        $disposisi = $request->get('disposisi');
                        $total_disposisi = count($request->get('disposisi'));
                        for ($i=0; $i < $total_disposisi; $i++) { 
                            $disposisi_save = new LayananDetail([
                                'id_layanan' => $id_layanan,
                                'value' => $disposisi[$i],
                                'id_layanan_kategori' => 8
                            ]);
                            $disposisi_save->save();
                        }
                    }

                    $jenis_delete = LayananDetail::where('id_layanan_kategori', 1)->where('id_layanan', $id_layanan)->get();
                    $total_jenis_delete = count($jenis_delete);
                    for ($i=0; $i < $total_jenis_delete; $i++) { 
                        $jenis_delete[$i]->delete();
                    }     
                    $jenis = $request->get('jenis');
                    $total_jenis = count($request->get('jenis'));
                    for ($i=0; $i < $total_jenis; $i++) { 
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $jenis[$i],
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }

                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil diperbaharui');
                }
            }

            elseif($kategori == "Penanganan Permasalahan Jaringan") {
                $rules = $rules + [
                    'deskripsi_2' => 'required|string',
                    'cakupan' => 'required|string'
                ];
    
                $messages = $messages + [
                    'deskripsi_2.required' => 'Deskripsi wajib diisi',
                    'cakupan.required' => 'Cakupan lokasi wajib diisi'
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $layanan = Layanan::find($id_layanan);
                if (!$layanan) {
                    echo "gaada"; die();
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_2')) {
                    $filenameWithExt = $request->file('gambar_2')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_2')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_2'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                    $layanan->foto_kondisi = $randomName_1;
                }

                $layanan->id_instansi = $request->get('instansi');
                $layanan->tanggal = $request->get('tanggal');
                $layanan->kategori = $request->get('kategori');
                $layanan->nama_pemohon = $request->get('nama_pemohon');
                $layanan->kontak = $request->get('kontak');
                $layanan->alamat = $request->get('alamat');
                $layanan->cakupan = $request->get('cakupan');
                $layanan->deskripsi = $request->get('deskripsi_2');
                if($layanan->update()) {
                    $id_layanan = $layanan->id_layanan;
                    if($logged_user->id_role == 2) {
                        $disposisi_delete = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->get();
                        $total_disposisi_delete = count($disposisi_delete);
                        for ($i=0; $i < $total_disposisi_delete; $i++) { 
                            $disposisi_delete[$i]->delete();
                        }
                        $disposisi = $request->get('disposisi');
                        $total_disposisi = count($request->get('disposisi'));
                        for ($i=0; $i < $total_disposisi; $i++) { 
                            $disposisi_save = new LayananDetail([
                                'id_layanan' => $id_layanan,
                                'value' => $disposisi[$i],
                                'id_layanan_kategori' => 8
                            ]);
                            $disposisi_save->save();
                        }
                    }

                    $jenis_delete = LayananDetail::where('id_layanan_kategori', 1)->where('id_layanan', $id_layanan)->get();
                    $total_jenis_delete = count($jenis_delete);
                    for ($i=0; $i < $total_jenis_delete; $i++) { 
                        $jenis_delete[$i]->delete();
                    }     
                    $jenis = $request->get('jenis');
                    $total_jenis = count($request->get('jenis'));
                    for ($i=0; $i < $total_jenis; $i++) { 
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $jenis[$i],
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }
                    if($request->jenis_lainnya != null) {
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $request->jenis_lainnya,
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }

                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil diperbaharui');
                }
            }

            elseif($kategori == "Kategori Lainnya") {
                $rules = $rules + [
                    'deskripsi_3' => 'required|string',
                    'no_surat_2' => 'required|string',
                    'tanggal_surat_2' => 'required|date',
                    'perihal_surat_2' => 'required|string',
                    'gambar_3' => 'image|mimes:jpg,png,jpeg,gif,svg',
                    'file_2' => 'mimes:pdf'
                ];
    
                $messages = $messages + [
                    'deskripsi_3.required' => 'Deskripsi wajib diisi',
                    'no_surat_2.required' => 'No Surat wajib diisi',
                    'tanggal_surat_2.required' => 'Tanggal Surat wajib diisi',
                    'perihal_surat_2.required' => 'Perihal Surat wajib diisi',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $layanan = Layanan::find($id_layanan);
                if (!$layanan) {
                    echo "gaada"; die();
                }

                $randomName_1 = null;
                if ($request->hasFile('gambar_3')) {
                    $filenameWithExt = $request->file('gambar_3')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar_3')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_1 = $filenameSimpan;
                    $image = Image::make($request->file('gambar_3'));
                    $destinationPath = public_path('storage/layanan/id/kondisi');
                    $image->save($destinationPath.'/'.$randomName_1);
                    $layanan->foto_kondisi = $randomName_1;
                }

                $randomName_2 = null;
                if ($request->hasFile('file_2')) {
                    $filenameWithExt = $request->file('file_2')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('file_2')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName_2 = $filenameSimpan;
                    $path = $request->file('file_2')->storeAs('public/layanan/id/surat/', $randomName_2);
                    $layanan->file_surat = $randomName_2;
                }
                $layanan->id_instansi = $request->get('instansi');
                $layanan->tanggal = $request->get('tanggal');
                $layanan->kategori = $request->get('kategori');
                $layanan->nama_pemohon = $request->get('nama_pemohon');
                $layanan->kontak = $request->get('kontak');
                $layanan->alamat = $request->get('alamat');
                $layanan->deskripsi = $request->get('deskripsi_3');
                $layanan->no_surat = $request->get('no_surat_2');
                $layanan->tanggal_surat = $request->get('tanggal_surat_2');
                $layanan->perihal_surat = $request->get('perihal_surat_2');
                if($layanan->update()) {
                    $id_layanan = $layanan->id_layanan;
                    if($logged_user->id_role == 2) {
                        $disposisi_delete = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->get();
                        $total_disposisi_delete = count($disposisi_delete);
                        for ($i=0; $i < $total_disposisi_delete; $i++) { 
                            $disposisi_delete[$i]->delete();
                        }
                        $disposisi = $request->get('disposisi');
                        $total_disposisi = count($request->get('disposisi'));
                        for ($i=0; $i < $total_disposisi; $i++) { 
                            $disposisi_save = new LayananDetail([
                                'id_layanan' => $id_layanan,
                                'value' => $disposisi[$i],
                                'id_layanan_kategori' => 8
                            ]);
                            $disposisi_save->save();
                        }
                    }
                    return redirect('/ticketing')->with('success', 'Data ticketing berhasil diperbaharui');
                }
            }

            else {
                return redirect()->back()->withErrors('Kategori wajib dipilih');
            }
        }
        return redirect('/');
    }

    public function delete($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2 || $id_role == 5) {
                $layanan = Layanan::find($id_layanan);
                $detail_layanan = LayananDetail::where('id_layanan', $id_layanan)->get();
                $total_detail = count($detail_layanan);
                for ($i=0; $i < $total_detail; $i++) { 
                    $detail_layanan[$i]->delete();
                }       
                $layanan->delete();
                return redirect('/ticketing')->with('success', 'Data ticketing berhasil dihapus');
            }
        }
        return redirect('/');
    }

    public function cancel($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $layanan = Layanan::find($id_layanan);
                if (!$layanan) {
                    echo "gaada"; die();
                }
                $layanan->status = "Menunggu Respon";
                $layanan->update();
                return redirect('/ticketing')->with('success', 'Data ticketing telah dibatalkan');
            }
            return redirect('/ticketing')->with('error', 'Data ticketing gagal dibatalkan');
        }
        return redirect('/');
    }

    public function process($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 3 || $id_role == 5) {
                $layanan_detail = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->where('value', $logged_user->id_user)->first();
                if($layanan_detail != null) {
                    $layanan = Layanan::find($id_layanan);
                    $layanan->status = "Sedang Dikerjakan";
                    $layanan->update();
                    return redirect('/ticketing')->with('success', 'Data ticketing akan diproses');
                }
            }
            return redirect('/ticketing')->with('error', 'Data ticketing gagal diproses');
        }
        return redirect('/');
    }

    public function report_ttd($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 3 || $id_role == 5) {
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if($layanan) {
                    if($layanan->status == "Sedang Dikerjakan") {
                        return view("main", [
                            'page' => "Ticketing",
                            'subpage' => "Report TTD",
                            'logged_user' => $logged_user,
                            'id_role' => $logged_user->id_role,
                            'layanan' => $layanan
                        ]);
                    }
                }
            }
        }
        return redirect('/');
    }

    public function report($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 3 || $id_role == 5) {
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if($layanan) {
                    if($layanan->status == "Sedang Dikerjakan") {
                        $barang = InventarisBarang::where('kategori', 'Barang Pakai Habis')->get();
                        $layanan_detail = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->where('value', $logged_user->id_user)->first();
                        if($layanan_detail != null) {
                            if($layanan->kategori == "Penanganan Permasalahan Jaringan") {
                                $kategori = "Report Penanganan";
                            }
                            elseif($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                                $kategori = "Report Instalasi";
                            }
                            return view("main", [
                                'page' => "Ticketing",
                                'subpage' => "Report",
                                'kategori' => $kategori,
                                'logged_user' => $logged_user,
                                'id_role' => $logged_user->id_role,
                                'layanan' => $layanan,
                                'barang' => $barang
                            ]);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function edit_report($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 3 || $id_role == 5) {
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if($layanan) {
                    if($layanan->status == "Menunggu Validasi") {
                        $barang = InventarisBarang::where('kategori', 'Barang Pakai Habis')->get();
                        $layanan_detail = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->where('value', $logged_user->id_user)->first();
                        $detail['penanganan'] = $layanan->layanan_detail->where('id_layanan_kategori', 2)->pluck('value');
                        $detail['alat_kerja'] = $layanan->layanan_detail->where('id_layanan_kategori', 3)->pluck('value');
                        $detail['perangkat'] = $layanan->layanan_detail->where('id_layanan_kategori', 4)->pluck('value');
                        $detail['barang_habis']['nama_barang'] = $layanan->layanan_detail->where('id_layanan_kategori', 5)->pluck('value');
                        $detail['barang_habis']['jumlah'] = $layanan->layanan_detail->where('id_layanan_kategori', 5)->pluck('value_2');
                        $detail['perangkat_kominfo']['jenis'] = $layanan->layanan_detail->where('id_layanan_kategori', 6)->pluck('value');
                        $detail['perangkat_kominfo']['sn'] = $layanan->layanan_detail->where('id_layanan_kategori', 6)->pluck('value_2');
                        $detail['ip_1'] = $layanan->layanan_detail->where('id_layanan_kategori', 7)->pluck('value');
                        $detail['ip_2'] = $layanan->layanan_detail->where('id_layanan_kategori', 7)->pluck('value_2');
                        if($layanan_detail != null) {
                            if($layanan->kategori == "Penanganan Permasalahan Jaringan") {
                                $kategori = "Report Penanganan";
                            }
                            elseif($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
                                $kategori = "Report Instalasi";
                            }
                            return view("main", [
                                'page' => "Ticketing",
                                'subpage' => "EditReport",
                                'kategori' => $kategori,
                                'logged_user' => $logged_user,
                                'id_role' => $logged_user->id_role,
                                'layanan' => $layanan,
                                'detail' => $detail,
                                'barang' => $barang
                            ]);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function submit_report(Request $request, $id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $rules = [
                'ip_1' => 'required',
                'ip_2' => 'required',
                'penjelasan_pekerjaan' => 'required',
                'nama_perwakilan' => 'required|string',
                'nip_perwakilan' => 'required|numeric',
            ];

            $messages = [
                'ip_1.required' => 'Range IP wajib diisi',
                'ip_2.required' => 'Range IP wajib diisi',
                'penjelasan_pekerjaan.required' => 'Penjelasan Pekerjaan wajib diisi',
                'nama_perwakilan.required' => 'Nama Perwakilan wajib diisi',
                'nip_perwakilan.required' => 'NIP Perwakilan wajib diisi',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            if($request->get('ttd') == null) {
                return redirect()->back()->withErrors('Tanda tangan wajib diisi');
            }
            
            $id_role = $logged_user->id_role;
            if($id_role == 3 || $id_role == 5) {
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if ($layanan) {
                    $layanan_detail = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->where('value', $logged_user->id_user)->first();
                    if($layanan_detail != null) {
                        $ttd_base64 = $request->ttd;
                        if($ttd_base64 != null) {
                            $ttd_base64 = str_replace('data:image/png;base64,', '', $ttd_base64);
                            $ttd_base64 = str_replace(' ', '+', $ttd_base64);
                            $ttd_namafile = md5($ttd_base64. time()).'.png';
                            \File::put(public_path('storage/layanan/id/ttd'). '/' . $ttd_namafile, base64_decode($ttd_base64));
                        }

                        $randomName_1 = null;
                        if ($request->hasFile('foto_hasil')) {
                            $filenameWithExt = $request->file('foto_hasil')->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $extension = $request->file('foto_hasil')->getClientOriginalExtension();
                            $filenameSimpan = md5($filename. time()).'.'.$extension;
                            $randomName_1 = $filenameSimpan;
                            $image = Image::make($request->file('foto_hasil'));
                            $destinationPath = public_path('storage/layanan/id/hasil');
                            $image->save($destinationPath.'/'.$randomName_1);
                            $layanan->foto_hasil = $randomName_1;
                        }
                        $layanan->penjelasan_pekerjaan = $request->get('penjelasan_pekerjaan');
                        $layanan->tanda_tangan = $ttd_namafile;
                        $layanan->tanggal_selesai = date('Y-m-d');
                        $layanan->perwakilan = $logged_user->id_user;
                        $layanan->nama_perwakilan = $request->get('nama_perwakilan');
                        $layanan->nip_perwakilan = $request->get('nip_perwakilan');
                        $layanan->status = "Menunggu Validasi";
                        $layanan->foto_hasil = $randomName_1;
                        if($layanan->update()) {
                            if($layanan->kategori == "Penanganan Permasalahan Jaringan") {
                                $rules = $rules + [
                                    'penanganan' => 'required|array'
                                ];
                    
                                $messages = $messages + [
                                    'penanganan.required' => 'Form penanganan wajib diisi'
                                ];
                    
                                $validator = Validator::make($request->all(), $rules, $messages);
                                if($validator->fails()){
                                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                                }

                                $penanganan = $request->get('penanganan');
                                $penanganan_lainnya = $request->get('penanganan_lainnya');
                                $total_penanganan = count($request->get('penanganan'));
                                for ($i=0; $i < $total_penanganan; $i++) { 
                                    $penanganan_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $penanganan[$i],
                                        'id_layanan_kategori' => 2
                                    ]);
                                    $penanganan_save->save();
                                }
                                if($penanganan_lainnya != null) {
                                    $penanganan_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $penanganan_lainnya,
                                        'id_layanan_kategori' => 2
                                    ]);
                                    $penanganan_save->save();
                                }
                            }

                            $alat_kerja = $request->get('alat_kerja');
                            $alat_kerja_lainnya = $request->get('alat_kerja_lainnya');
                            $total_alat_kerja = count($request->get('alat_kerja'));
                            for ($i=0; $i < $total_alat_kerja; $i++) { 
                                $alat_kerja_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $alat_kerja[$i],
                                    'id_layanan_kategori' => 3
                                ]);
                                $alat_kerja_save->save();
                            }
                            if($alat_kerja_lainnya != null) {
                                $alat_kerja_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $alat_kerja_lainnya,
                                    'id_layanan_kategori' => 3
                                ]);
                                $alat_kerja_save->save();
                            }

                            $perangkat = $request->get('perangkat');
                            $perangkat_lainnya = $request->get('perangkat_lainnya');
                            $total_perangkat = count($request->get('perangkat'));
                            for ($i=0; $i < $total_perangkat; $i++) { 
                                $perangkat_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $perangkat[$i],
                                    'id_layanan_kategori' => 4
                                ]);
                                $perangkat_save->save();
                            }
                            if($perangkat_lainnya != null) {
                                $perangkat_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $perangkat_lainnya,
                                    'id_layanan_kategori' => 4
                                ]);
                                $perangkat_save->save();
                            }

                            $barang_habis = $request->get('barang_habis');
                            if($barang_habis != null) {
                                foreach ($barang_habis as $b) {
                                    if(isset($b['id_barang'])) {
                                        $barang_habis_save = new LayananDetail([
                                            'id_layanan' => $id_layanan,
                                            'value' => $b['id_barang'],
                                            'value_2' => $b['jumlah'],
                                            'id_layanan_kategori' => 5
                                        ]);
                                        $barang_habis_save->save();
                                        $barang = InventarisBarang::where('id_barang', $b['id_barang'])->first();
                                        $barang->jumlah_terpakai = $barang->jumlah_terpakai + $b['jumlah'];
                                        $barang->update();
                                    }
                                }
                            }

                            if($request->get('perangkat_kominfo_jenis') != null && $request->get('perangkat_kominfo_SN') != null) {
                                $total_perangkat_kominfo = count($request->get('perangkat_kominfo_jenis'));
                                for ($i=0; $i < $total_perangkat_kominfo; $i++) { 
                                    $perangkat_kominfo_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $request->get('perangkat_kominfo_jenis')[$i],
                                        'value_2' => $request->get('perangkat_kominfo_SN')[$i],
                                        'id_layanan_kategori' => 6
                                    ]);
                                    $perangkat_kominfo_save->save();
                                }
                            }
                            
                            $ip_address_save = new LayananDetail([
                                'id_layanan' => $id_layanan,
                                'value' => $request->get('ip_1'),
                                'value_2' => $request->get('ip_2'),
                                'id_layanan_kategori' => 7
                            ]);
                            $ip_address_save->save();
                            return redirect('/ticketing')->with('success', 'Data ticketing telah diselesaikan');
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function update_report(Request $request, $id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $rules = [
                'ip_1' => 'required',
                'ip_2' => 'required',
                'penjelasan_pekerjaan' => 'required',
                'nama_perwakilan' => 'required|string',
                'nip_perwakilan' => 'required|numeric',
            ];

            $messages = [
                'ip_1.required' => 'Range IP wajib diisi',
                'ip_2.required' => 'Range IP wajib diisi',
                'penjelasan_pekerjaan.required' => 'Penjelasan Pekerjaan wajib diisi',
                'nama_perwakilan.required' => 'Nama Perwakilan wajib diisi',
                'nip_perwakilan.required' => 'NIP Perwakilan wajib diisi',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
            
            $id_role = $logged_user->id_role;
            if($id_role == 3 || $id_role == 5) {
                $layanan = Layanan::where('id_layanan', $id_layanan)->first();
                if ($layanan) {
                    $layanan_detail = LayananDetail::where('id_layanan_kategori', 8)->where('id_layanan', $id_layanan)->where('value', $logged_user->id_user)->first();
                    if($layanan_detail != null) {
                        $ttd_base64 = $request->ttd;
                        if($ttd_base64 != null) {
                            $ttd_base64 = str_replace('data:image/png;base64,', '', $ttd_base64);
                            $ttd_base64 = str_replace(' ', '+', $ttd_base64);
                            $ttd_namafile = md5($ttd_base64. time()).'.png';
                            \File::put(public_path('storage/layanan/id/ttd'). '/' . $ttd_namafile, base64_decode($ttd_base64));
                            $layanan->tanda_tangan = $ttd_namafile;
                        }

                        $randomName_1 = null;
                        if ($request->hasFile('foto_hasil')) {
                            $filenameWithExt = $request->file('foto_hasil')->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $extension = $request->file('foto_hasil')->getClientOriginalExtension();
                            $filenameSimpan = md5($filename. time()).'.'.$extension;
                            $randomName_1 = $filenameSimpan;
                            $image = Image::make($request->file('foto_hasil'));
                            $destinationPath = public_path('storage/layanan/id/hasil');
                            $image->save($destinationPath.'/'.$randomName_1);
                            $layanan->foto_hasil = $randomName_1;
                        }

                        $layanan->penjelasan_pekerjaan = $request->get('penjelasan_pekerjaan');
                        $layanan->tanggal_selesai = date('Y-m-d');
                        $layanan->perwakilan = $logged_user->id_user;
                        $layanan->nama_perwakilan = $request->get('nama_perwakilan');
                        $layanan->nip_perwakilan = $request->get('nip_perwakilan');
                        $layanan->status = "Menunggu Validasi";
                        $layanan->foto_hasil = $randomName_1;
                        if($layanan->update()) {
                            if($layanan->kategori == "Penanganan Permasalahan Jaringan") {
                                $rules = $rules + [
                                    'penanganan' => 'required|array'
                                ];
                    
                                $messages = $messages + [
                                    'penanganan.required' => 'Form penanganan wajib diisi'
                                ];
                    
                                $validator = Validator::make($request->all(), $rules, $messages);
                                if($validator->fails()){
                                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                                }

                                $penanganan_delete = LayananDetail::where('id_layanan_kategori', 2)->where('id_layanan', $id_layanan)->get();
                                $total_penanganan_delete = count($penanganan_delete);
                                for ($i=0; $i < $total_penanganan_delete; $i++) { 
                                    $penanganan_delete[$i]->delete();
                                }
                                
                                $penanganan = $request->get('penanganan');
                                $penanganan_lainnya = $request->get('penanganan_lainnya');
                                $total_penanganan = count($request->get('penanganan'));
                                for ($i=0; $i < $total_penanganan; $i++) { 
                                    $penanganan_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $penanganan[$i],
                                        'id_layanan_kategori' => 2
                                    ]);
                                    $penanganan_save->save();
                                }
                                if($penanganan_lainnya != null) {
                                    $penanganan_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $penanganan_lainnya,
                                        'id_layanan_kategori' => 2
                                    ]);
                                    $penanganan_save->save();
                                }
                            }

                            $alat_kerja_delete = LayananDetail::where('id_layanan_kategori', 3)->where('id_layanan', $id_layanan)->get();
                            $total_alat_kerja_delete = count($alat_kerja_delete);
                            for ($i=0; $i < $total_alat_kerja_delete; $i++) { 
                                $alat_kerja_delete[$i]->delete();
                            }

                            $alat_kerja = $request->get('alat_kerja');
                            $alat_kerja_lainnya = $request->get('alat_kerja_lainnya');
                            $total_alat_kerja = count($request->get('alat_kerja'));
                            for ($i=0; $i < $total_alat_kerja; $i++) { 
                                $alat_kerja_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $alat_kerja[$i],
                                    'id_layanan_kategori' => 3
                                ]);
                                $alat_kerja_save->save();
                            }
                            if($alat_kerja_lainnya != null) {
                                $alat_kerja_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $alat_kerja_lainnya,
                                    'id_layanan_kategori' => 3
                                ]);
                                $alat_kerja_save->save();
                            }

                            $perangkat_delete = LayananDetail::where('id_layanan_kategori', 4)->where('id_layanan', $id_layanan)->get();
                            $total_perangkat_delete = count($perangkat_delete);
                            for ($i=0; $i < $total_perangkat_delete; $i++) { 
                                $perangkat_delete[$i]->delete();
                            }

                            $perangkat = $request->get('perangkat');
                            $perangkat_lainnya = $request->get('perangkat_lainnya');
                            $total_perangkat = count($request->get('perangkat'));
                            for ($i=0; $i < $total_perangkat; $i++) { 
                                $perangkat_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $perangkat[$i],
                                    'id_layanan_kategori' => 4
                                ]);
                                $perangkat_save->save();
                            }
                            if($perangkat_lainnya != null) {
                                $perangkat_save = new LayananDetail([
                                    'id_layanan' => $id_layanan,
                                    'value' => $perangkat_lainnya,
                                    'id_layanan_kategori' => 4
                                ]);
                                $perangkat_save->save();
                            }

                            $barang_habis_delete = LayananDetail::where('id_layanan_kategori', 5)->where('id_layanan', $id_layanan)->get();
                            $total_barang_habis_delete = count($barang_habis_delete);
                            for ($i=0; $i < $total_barang_habis_delete; $i++) { 
                                $barang_habis_delete[$i]->delete();
                            }

                            $barang_habis = $request->get('barang_habis');
                            if($barang_habis != null) {
                                foreach ($barang_habis as $b) {
                                    if(isset($b['id_barang'])) {
                                        $barang_habis_save = new LayananDetail([
                                            'id_layanan' => $id_layanan,
                                            'value' => $b['id_barang'],
                                            'value_2' => $b['jumlah'],
                                            'id_layanan_kategori' => 5
                                        ]);
                                        $barang_habis_save->save();
                                        $barang = InventarisBarang::where('id_barang', $b['id_barang'])->first();
                                        $barang->jumlah_terpakai = $barang->jumlah_terpakai + $b['jumlah'];
                                        $barang->update();
                                    }
                                }
                            }

                            if($request->get('perangkat_kominfo_jenis') != null && $request->get('perangkat_kominfo_SN') != null) {
                                $perangkat_kominfo_delete = LayananDetail::where('id_layanan_kategori', 6)->where('id_layanan', $id_layanan)->get();
                                $total_perangkat_kominfo_delete = count($perangkat_kominfo_delete);
                                for ($i=0; $i < $total_perangkat_kominfo_delete; $i++) { 
                                    $perangkat_kominfo_delete[$i]->delete();
                                }

                                $total_perangkat_kominfo = count($request->get('perangkat_kominfo_jenis'));
                                for ($i=0; $i < $total_perangkat_kominfo; $i++) { 
                                    $perangkat_kominfo_save = new LayananDetail([
                                        'id_layanan' => $id_layanan,
                                        'value' => $request->get('perangkat_kominfo_jenis')[$i],
                                        'value_2' => $request->get('perangkat_kominfo_SN')[$i],
                                        'id_layanan_kategori' => 6
                                    ]);
                                    $perangkat_kominfo_save->save();
                                }
                            }
                            
                            $ip_address_delete = LayananDetail::where('id_layanan_kategori', 7)->where('id_layanan', $id_layanan)->get();
                            $total_ip_address_delete = count($ip_address_delete);
                            for ($i=0; $i < $total_ip_address_delete; $i++) { 
                                $ip_address_delete[$i]->delete();
                            }

                            $ip_address_save = new LayananDetail([
                                'id_layanan' => $id_layanan,
                                'value' => $request->get('ip_1'),
                                'value_2' => $request->get('ip_2'),
                                'id_layanan_kategori' => 7
                            ]);
                            $ip_address_save->save();
                            return redirect('/ticketing')->with('success', 'Data ticketing telah diselesaikan');
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function validasi_report($id_layanan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $layanan = Layanan::find($id_layanan);
                $layanan->status = "Selesai";
                $layanan->update();
                return redirect('/ticketing')->with('success', 'Data ticketing berhasil divalidasi');
            }
            return redirect('/ticketing')->with('error', 'Data ticketing gagal diproses');
        }
        return redirect('/');
    }

    public function batik() {
        $instansi = Instansi::get();
        $layanan = null;
        $data = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            if(array_key_exists('kode_ticketing', $results)) {
                if($results['kode_ticketing'] != "")  {
                    $layanan = Layanan::where('kode_layanan', $results)->first();
                    if($layanan == null) {
                        return redirect('/net-ticketing')->with('error', 'Kode ticketing tidak ditemukan');
                    }
                    $data['jenis'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 1)->get();
                    $data['penanganan'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 2)->get();
                    $data['alat_kerja'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 3)->get();
                    $data['perangkat'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 4)->get();
                    $data['perangkat_kominfotik'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 6)->get();
                    $data['ip'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 7)->get();
        
                    $object['barang_habis'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 5)->get();
                    $object['teknisi'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 8)->get();
                    foreach($object['teknisi'] as $key => $d) {
                        $data['teknisi'][$key]['nama_lengkap'] = $d->disposisi->nama_lengkap;
                        $data['teknisi'][$key]['no_telp'] = $d->disposisi->no_telp;
                    }
                    foreach($object['barang_habis'] as $key => $d) {
                        $data['barang_habis'][$key]['nama_barang'] = $d->barang->nama_barang;
                        $data['barang_habis'][$key]['satuan'] = $d->barang->satuan;
                        $data['barang_habis'][$key]['terpakai'] = $d->value_2;
                    }
        
                    $data['instansi'] = $layanan->instansi->nama_instansi;
                    $data['tanggal_permohonan'] = Carbon::parse($layanan['tanggal'])->isoFormat('dddd, DD MMMM Y');
                    $data['tanggal_selesai'] = Carbon::parse($layanan['tanggal_selesai'])->isoFormat('dddd, DD MMMM Y');
                    $data['berita_acara'] = asset('/ticketing/export/'.$layanan->id_layanan);
                }
                else {
                    return redirect('/net-ticketing')->with('error', 'Kode ticketing tidak ditemukan');
                }
            }
            else {
                return redirect('/net-ticketing');
            }
        }
        $res['layanan'] = $layanan;
        $res['detail'] = $data;
        return view("ticketing.front.main", [
            'instansi' => $instansi,
            'res'  => $res
        ]);
    }

    public function batik_status($kode_layanan) {
        $layanan = Layanan::where('kode_layanan', $kode_layanan)->first();
        $data['jenis'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 1)->get();
        $data['penanganan'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 2)->get();
        $data['alat_kerja'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 3)->get();
        $data['perangkat'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 4)->get();
        $data['perangkat_kominfotik'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 6)->get();
        $data['ip'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 7)->get();

        $object['barang_habis'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 5)->get();
        $object['teknisi'] = LayananDetail::where('id_layanan', $layanan->id_layanan)->where('id_layanan_kategori', 8)->get();
        foreach($object['teknisi'] as $key => $d) {
            $data['teknisi'][$key]['nama_lengkap'] = $d->disposisi->nama_lengkap;
            $data['teknisi'][$key]['no_telp'] = $d->disposisi->no_telp;
        }
        foreach($object['barang_habis'] as $key => $d) {
            $data['barang_habis'][$key]['nama_barang'] = $d->barang->nama_barang;
            $data['barang_habis'][$key]['satuan'] = $d->barang->satuan;
            $data['barang_habis'][$key]['terpakai'] = $d->value_2;
        }

        $data['instansi'] = $layanan->instansi->nama_instansi;
        $data['tanggal_permohonan'] = Carbon::parse($layanan['tanggal'])->isoFormat('dddd, DD MMMM Y');
        $data['tanggal_selesai'] = Carbon::parse($layanan['tanggal_selesai'])->isoFormat('dddd, DD MMMM Y');
        $data['berita_acara'] = asset('/ticketing/export/'.$layanan->id_layanan);
        if($layanan == null) {
            $success = false;
            $message = "Kode layanan tidak ditemukan";
        }
        else {
            $success = true;
            $message = "Kode layanan ditemukan";
        }
        return response()->json([
            'success'  => $success,
            'message'  => $message,
            'layanan'  => $layanan,
            'data'     => $data
        ]);
    }

    public function request_submit(Request $request) {
        // dd($request->all());
        $kategori = $request->get('kategori');
        $rules = [
            'kategori' => 'required|string',
            'nama_pemohon' => 'required|string',
            'kontak' => 'required|string',
            'instansi' => 'required|int',
            'cakupan' => 'required|string'
        ];
        $messages = [
            'kategori.required' => 'Kategori wajib dipilih',
            'nama_pemohon.required' => 'Nama pemohon wajib diisi',
            'kontak.required' => 'No. Telp / HP / Email wajib diisi',
            'instansi.required' => 'Tanggal wajib dipilih',
            'cakupan.required' => 'Cakupan lokasi wajib diisi'
        ];

        if($kategori == "Instalasi, Penambahan, dan Penataan Jaringan") {
            $rules = $rules + [
                'deskripsi_1' => 'required|string',
                'no_surat' => 'required|string',
                'tanggal_surat' => 'required|date',
                'perihal_surat' => 'required|string',
                'gambar_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
                'file' => 'required|mimes:pdf',
                'jenis' => 'required|array'
            ];

            $messages = $messages + [
                'deskripsi_1.required' => 'Deskripsi wajib diisi',
                'no_surat.required' => 'No Surat wajib diisi',
                'tanggal_surat.required' => 'Tanggal Surat wajib diisi',
                'perihal_surat.required' => 'Perihal Surat wajib diisi',
                'gambar_1.required' => 'Gambar lokasi wajib diupload',
                'file.required' => 'File surat wajib diupload',
                'jenis.required' => 'Jenis pelayanan wajib dipilih'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $randomName_1 = null;
            if ($request->hasFile('gambar_1')) {
                $filenameWithExt = $request->file('gambar_1')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar_1')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName_1 = $filenameSimpan;
                $image = Image::make($request->file('gambar_1'));
                $destinationPath = public_path('storage/layanan/id/kondisi');
                $image->save($destinationPath.'/'.$randomName_1);
            }

            $randomName_2 = null;
            if ($request->hasFile('file')) {
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName_2 = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/layanan/id/surat/', $randomName_2);
            }

            $layanan = new Layanan([
                'id_instansi' => $request->get('instansi'),
                'media' => "Aplikasi",
                'tanggal' => date("Y-m-d"),
                'kategori' => $request->get('kategori'),
                'nama_pemohon' => $request->get('nama_pemohon'),
                'kontak' => $request->get('kontak'),
                'alamat' => $request->get('alamat'),
                'cakupan' => $request->get('cakupan'),
                'deskripsi' => $request->get('deskripsi_1'),
                'foto_kondisi' => $randomName_1,
                'file_surat' => $randomName_2,
                'no_surat' => $request->get('no_surat'),
                'tanggal_surat' => $request->get('tanggal_surat'),
                'perihal_surat' => $request->get('perihal_surat'),
                'status' => "Belum Disposisi"
            ]);
            if($layanan->save()) {
                //kode layanan = Kategori-IDLayanan-Instansi-Tanggal
                $id_layanan = $layanan->id_layanan;
                $kode_layanan = "TI".$layanan->id_layanan.$layanan->id_instansi;
                $kode_layanan_update = Layanan::find($id_layanan);
                if (!$kode_layanan_update) {
                    echo "gaada"; die();
                }
                $kode_layanan_update->kode_layanan = $kode_layanan;
                $kode_layanan_update->update();

                $jenis = $request->get('jenis');
                $total_jenis = count($request->get('jenis'));
                for ($i=0; $i < $total_jenis; $i++) { 
                    $jenis_save = new LayananDetail([
                        'id_layanan' => $id_layanan,
                        'value' => $jenis[$i],
                        'id_layanan_kategori' => 1
                    ]);
                    $jenis_save->save();
                }

                Session::flash('download_resi', asset("net-ticketing/resi/$id_layanan"));
                return redirect('/net-ticketing?kode_ticketing='.$kode_layanan_update->kode_layanan.'#status')->with('success', 'Harap simpan kode ticketing anda: '.$kode_layanan_update->kode_layanan);
            }
        }

        elseif($kategori == "Penanganan Permasalahan Jaringan") {
            $rules = $rules + [
                'deskripsi_2' => 'required|string',
                'gambar_2' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            ];

            $messages = $messages + [
                'deskripsi_2.required' => 'Deskripsi wajib diisi',
                'gambar_2.required' => 'Gambar kondisi wajib diupload'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $randomName_1 = null;
            if ($request->hasFile('gambar_2')) {
                $filenameWithExt = $request->file('gambar_2')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('gambar_2')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $randomName_1 = $filenameSimpan;
                $image = Image::make($request->file('gambar_2'));
                $destinationPath = public_path('storage/layanan/id/kondisi');
                $image->save($destinationPath.'/'.$randomName_1);
            }

            $layanan = new Layanan([
                'id_instansi' => $request->get('instansi'),
                'media' => "Aplikasi",
                'tanggal' => date("Y-m-d"),
                'kategori' => $request->get('kategori'),
                'nama_pemohon' => $request->get('nama_pemohon'),
                'kontak' => $request->get('kontak'),
                'alamat' => $request->get('alamat'),
                'cakupan' => $request->get('cakupan'),
                'deskripsi' => $request->get('deskripsi_2'),
                'foto_kondisi' => $randomName_1,
                'status' => "Belum Disposisi"
            ]);
            if($layanan->save()) {
                $id_layanan = $layanan->id_layanan;
                $kode_layanan = "TP".$layanan->id_layanan.$layanan->id_instansi;
                $kode_layanan_update = Layanan::find($id_layanan);
                if (!$kode_layanan_update) {
                    echo "gaada"; die();
                }
                $kode_layanan_update->kode_layanan = $kode_layanan;
                $kode_layanan_update->update();

                $jenis = $request->get('jenis');
                if($request->get('jenis')) {
                    $total_jenis = count($request->get('jenis'));
                    for ($i=0; $i < $total_jenis; $i++) { 
                        $jenis_save = new LayananDetail([
                            'id_layanan' => $id_layanan,
                            'value' => $jenis[$i],
                            'id_layanan_kategori' => 1
                        ]);
                        $jenis_save->save();
                    }
                }
                if($request->jenis_lainnya != null) {
                    $jenis_save = new LayananDetail([
                        'id_layanan' => $id_layanan,
                        'value' => $request->jenis_lainnya,
                        'id_layanan_kategori' => 1
                    ]);
                    $jenis_save->save();
                }

                Session::flash('download_resi', asset("net-ticketing/resi/$id_layanan"));
                return redirect('/net-ticketing?kode_ticketing='.$kode_layanan_update->kode_layanan.'#status')->with('success', 'Harap simpan kode ticketing anda: '.$kode_layanan_update->kode_layanan);
            }
        }

        else {
            return redirect()->back()->withErrors('Kategori wajib dipilih');
        }
    }

    public function resi($id_layanan) {
        $layanan = Layanan::where('id_layanan', $id_layanan)->first();
        $kepala_seksi = User::where('id_user', 21)->first();

        // return view("resi", [
        //     'layanan' => $layanan,
        //     'kepala_seksi' => $kepala_seksi
        // ]);
        $pdf = PDF::loadview('ticketing.front.resi',['layanan'=>$layanan, 'kepala_seksi' => $kepala_seksi]);
        return $pdf->stream('Resi Kode Layanan BATIK - '.$layanan->kode_layanan.'.pdf');
    }
}