<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Rekrutmen;
use App\Models\RekrutmenPersyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RekrutmenController extends Controller
{
    public function list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 1 || $id_role == 2) {
                $query = Rekrutmen::orderBy('id_rekrutmen', 'DESC');
                $instansi = Instansi::get();
                $results = null;
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    if(isset($results['posisi']) && $results['posisi'] != null) {
                        $posisi = $results['posisi'];
                        $query->where('posisi', $posisi);
                    }
                    if(isset($results['nik']) && $results['nik'] != null) {
                        $nik = $results['nik'];
                        $query->where('nik', $nik);
                    }
                }
                $rekrutmen = $query->paginate(10);
                return view("main", [
                    'page' => "Manage-Rekrutmen",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'rekrutmen' => $rekrutmen,
                    'instansi' => $instansi
                ]);
            }
        }
        return redirect('/');
    }

    public function main() {
        return view("main", [
            'page' => "Rekrutmen"
        ]);
    }

    public function form() {
        return view("main", [
            'page' => "Rekrutmen",
            'subpage' => "Form"
        ]);
    }

    public function persyaratan($posisi) {
        $persyaratan = RekrutmenPersyaratan::where('posisi', $posisi)->get();
        return response()->json($persyaratan);
    }

    public function submit(Request $request) {
        $portofolio = null;
        $rules = [
            'nama_lengkap' => 'required|string',
            'nik' => 'unique:rekrutmen|required|string|max:16',
            'no_telp' => 'required|string',
            'email' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'posisi' => 'required|string|in:TJJ,TJS,OSM,EV,DG,FG,REP,EB,TWA,TSKI',
        ];
        $messages = [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'nik.required' => 'NIK wajib diisi',
            'nik.unique' => 'NIK telah terdaftar',
            'email.required' => 'Email wajib diisi',
            'no_telp.required' => 'Nomor HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'posisi.required' => 'Posisi wajib diisi',
        ];

        if ($request->get('posisi') == "EAV" || $request->get('posisi') == "DG") {
            $rules = $rules + [
                'portofolio' => 'required|string'
            ];
            $messages = [
                'portofolio.required' => 'Portofolio wajib diisi'
            ];
            $portofolio = $request->get('portofolio');
        }

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $berkas = array(
            'scan_surat_lamaran_kerja',
            'scan_daftar_riwayat_hidup',
            'scan_ktp',
            'scan_npwp',
            'scan_ijazah',
            'scan_sertifikat_pendukung',
        );

        $label_berkas = array(
            'Scan Surat Lamaran Kerja',
            'Scan Daftar Riwayat Hidup',
            'Scan KTP',
            'Scan NPWP',
            'Scan Ijazah dan Transkrip Nilai',
            'Scan Sertifikat Pendukung',
        );

        if ($request->get('posisi') == "TJJ" || $request->get('posisi') == "TJS" || $request->get('posisi') == "FG" || $request->get('posisi') == "REP") {
            $berkas = $berkas + array('scan_sim');
            $label_berkas = $label_berkas + array('Scan SIM');
        }
        $total_berkas = count($berkas);

        for ($i=0; $i < $total_berkas; $i++) {
            $nama_berkas[$i] = null;
            if ($request->hasFile($berkas[$i])) {
                $filenameWithExt = $request->file($berkas[$i])->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file($berkas[$i])->getClientOriginalExtension();
                $filenameSimpan = $request->get('posisi').' - '.$request->get('nama_lengkap').' ('.$request->get('nik').') '.' - '.$label_berkas[$i].'.'.$extension;
                $nama_berkas[$i] = $filenameSimpan;
            }
            else {
                return redirect()->back()->withErrors('File berkas tidak lengkap!');
            }
        }
        for ($i=0; $i < $total_berkas; $i++) {
            $request->file($berkas[$i])->storeAs('public/rekrutmen/berkas/', $nama_berkas[$i]);
        }

        if ($request->get('posisi') == "TJJ" || $request->get('posisi') == "TJS" || $request->get('posisi') == "FG" || $request->get('posisi') == "REP") {
            $nama_berkas[6] = null;
        }

        $scan_surat_pengalaman_kerja = null;
        if ($request->hasFile('scan_surat_pengalaman_kerja')) {
            $filenameWithExt = $request->file('scan_surat_pengalaman_kerja')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('scan_surat_pengalaman_kerja')->getClientOriginalExtension();
            $filenameSimpan = $request->get('posisi').' - '.$request->get('nama_lengkap').' ('.$request->get('nik').') '.' - Scan Surat Pengalaman Kerja.'.$extension;
            $scan_surat_pengalaman_kerja = $filenameSimpan;
            $request->file('scan_surat_pengalaman_kerja')->storeAs('public/rekrutmen/berkas/', $scan_surat_pengalaman_kerja);
        }

        $rekrutmen = new Rekrutmen([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'posisi' => $request->get('posisi'),
            'nik' => $request->get('nik'),
            'alamat' => $request->get('alamat'),
            'no_telp' => $request->get('no_telp'),
            'email' => $request->get('email'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'scan_surat_lamaran_kerja' => $nama_berkas[0],
            'scan_daftar_riwayat_hidup' => $nama_berkas[1],
            'scan_ktp' => $nama_berkas[2],
            'scan_npwp' => $nama_berkas[3],
            'scan_ijazah' => $nama_berkas[4],
            'scan_sertifikat_pendukung' => $nama_berkas[5],
            'scan_sim' => $nama_berkas[6],
            'scan_surat_pengalaman_kerja' => $scan_surat_pengalaman_kerja,
            'portofolio' => $portofolio,
            'tanggal_submit' => date('Y-m-d'),
            'status' => "Menunggu Pengumuman",
            "periode" => "2024"
        ]);
        if($rekrutmen->save()) {
            return redirect('/rekrutmen/status?nik='.$rekrutmen->nik)->with('success', 'Data dan berkas lamaran kerja akan kami review');
        }
    }

    public function status() {
        $rekrutmen = null;
        $seksi = null;
        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results);
            $nik = $results['nik'];
            if($nik == "")  {
                $rekrutmen = null;
                return redirect('/rekrutmen/status')->withErrors('Data kandidat tidak ditemukan!');
            }
            $rekrutmen = Rekrutmen::where('nik', $nik)->first();
            if($rekrutmen == null) {
                return redirect('/rekrutmen/status')->withErrors('Data kandidat tidak ditemukan!');
            }
            if($rekrutmen->posisi == "TWA" || $rekrutmen->posisi == "TSA") {
                $seksi = "SISS";
            }
            if($rekrutmen->posisi == "TSJ-SMK" || $rekrutmen->posisi == "TSJ-D3") {
                $seksi = "JKD";
            }
            if($rekrutmen->posisi == "KMR-SMA" || $rekrutmen->posisi == "KMR-D3" || $rekrutmen->posisi == "OMS" || $rekrutmen->posisi == "EAV" || $rekrutmen->posisi == "DG" || $rekrutmen->posisi == "REP" || $rekrutmen->posisi == "EB") {
                $seksi = "KIP";
            }
        }
        return view("main", [
            'page' => "Rekrutmen",
            'subpage' => "Status",
            'rekrutmen' => $rekrutmen,
            'seksi' => $seksi
        ]);
    }

    public function lolos($id_rekrutmen) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $rekrutmen = Rekrutmen::where('id_rekrutmen', $id_rekrutmen)->first();
                if($rekrutmen != null) {
                    $rekrutmen->status = "Lolos Administrasi";
                    $rekrutmen->update();
                    return redirect('/manage-rekrutmen')->with('success', 'Data kandidat telah lolos seleksi administrasi');
                }
            }
            return redirect('/manage-rekrutmen')->with('error', 'Data kandidat gagal diproses');
        }
        return redirect('/');
    }

    public function reset($id_rekrutmen) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $rekrutmen = Rekrutmen::where('id_rekrutmen', $id_rekrutmen)->first();
                if($rekrutmen != null) {
                    $rekrutmen->status = "Menunggu Pengumuman";
                    $rekrutmen->update();
                    return redirect('/manage-rekrutmen')->with('success', 'Data kandidat berhasil di reset');
                }
            }
            return redirect('/manage-rekrutmen')->with('error', 'Data kandidat gagal diproses');
        }
        return redirect('/');
    }

    public function download($nik, $berkas) {
        $rekrutmen = rekrutmen::where('nik', $nik)->first();
        if($rekrutmen == null) {
            return redirect()->back()->withErrors('Terjadi kesalahan pada sistem!');
        }
        if($berkas == "scan_surat_lamaran_kerja" && $rekrutmen->scan_surat_lamaran_kerja != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_surat_lamaran_kerja;
            return response()->download($link);
        }
        elseif($berkas == "scan_daftar_riwayat_hidup" && $rekrutmen->scan_daftar_riwayat_hidup != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_daftar_riwayat_hidup;
            return response()->download($link);
        }
        elseif($berkas == "scan_ktp" && $rekrutmen->scan_ktp != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_ktp;
            return response()->download($link);
        }
        elseif($berkas == "scan_npwp" && $rekrutmen->scan_npwp != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_npwp;
            return response()->download($link);
        }
        elseif($berkas == "scan_ijazah" && $rekrutmen->scan_ijazah != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_ijazah;
            return response()->download($link);
        }
        elseif($berkas == "scan_sertifikat_pendukung" && $rekrutmen->scan_sertifikat_pendukung != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_sertifikat_pendukung;
            return response()->download($link);
        }
        elseif($berkas == "scan_sim" && $rekrutmen->scan_sim != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_sim;
            return response()->download($link);
        }
        elseif($berkas == "scan_sertifikat_vaksin" && $rekrutmen->scan_sertifikat_vaksin != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_sertifikat_vaksin;
            return response()->download($link);
        }
        elseif($berkas == "scan_skck" && $rekrutmen->scan_skck != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_skck;
            return response()->download($link);
        }
        elseif($berkas == "scan_keterangan_sehat" && $rekrutmen->scan_keterangan_sehat != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_keterangan_sehat;
            return response()->download($link);
        }
        elseif($berkas == "scan_surat_pengalaman_kerja" && $rekrutmen->scan_surat_pengalaman_kerja != null) {
            $link = 'storage/rekrutmen/berkas/'.$rekrutmen->scan_surat_pengalaman_kerja;
            return response()->download($link);
        }
        return redirect()->back()->withErrors('Terjadi kesalahan pada sistem!');
    }
}