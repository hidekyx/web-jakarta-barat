<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\LayananKip;
use App\Models\LayananKipDetail;
use App\Models\LayananKipDisposisi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Image;

class KipController extends Controller
{
    public function list() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if(($id_role == 1 || $id_role == 4) || ($logged_user->id_seksi == 2)) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','2')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','2')->get();
                $instansi = Instansi::get();

                $results = null;
                $selected_bulan = null;
                $selected_tahun = null;
                $query = LayananKip::orderBy('id_layanan_kip', 'DESC');
                $currentURL = url()->full();
                $components = parse_url($currentURL);
                if(isset($components['query'])) {
                    parse_str($components['query'], $results); 
                    if(isset($results['bulan']) && $results['bulan'] != null) {
                        $filter_bulan = explode('-',$results['bulan']);
                        $selected_bulan = $filter_bulan[1];
                        $selected_tahun = $filter_bulan[0];
                        $query->whereMonth('tanggal_penerimaan', $selected_bulan)->whereyear('tanggal_penerimaan', $selected_tahun);
                    }
                    if(isset($results['instansi']) && $results['instansi'] != null) {
                        $instansi_search = $results['instansi'];
                        $query->where('id_instansi', $instansi_search);
                    }
                    if(isset($results['kategori']) && $results['kategori'] != null) {
                        $kategori_search = $results['kategori'];
                        $query->where('kategori', $kategori_search);
                    }
                    if(isset($results['kode']) && $results['kode'] != null) {
                        $kode = $results['kode'];
                        $query->where('kode_layanan', $kode);
                    }
                    if(isset($results['disposisi']) && $results['disposisi'] != null) {
                        $disposisi_search = $results['disposisi'];
                        $id_layanan_kip = LayananKipDisposisi::where('id_user', $disposisi_search)->pluck('id_layanan_kip');
                        $query->whereIn('id_layanan_kip', $id_layanan_kip);
                    }
                }
                if($id_role == 3) {
                    $id_layanan_kip = LayananKipDisposisi::where('id_user', $logged_user->id_user)->pluck('id_layanan_kip');
                    $query->whereIn('id_layanan_kip', $id_layanan_kip);
                }
                $layanan = $query->paginate(10);
                // dd($layanan[1]->layanan_kip_detail);
                return view("main", [
                    'page' => "Kip",
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

    public function disposisi($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 2) {
                $tenaga_terampil = User::where('id_role','3')->where('id_seksi','2')->where('status_kontrak','Aktif')->get();
                $staff = User::where('id_role','5')->where('id_seksi','2')->get();
                $layanan = LayananKip::where('id_layanan_kip', $id_layanan_kip)->first();
                if($layanan->status == "Belum Disposisi" || $layanan->status == "Menunggu Respon") {
                    $disposisi = $layanan->layanan_kip_disposisi->pluck('id_user');
                    return view("main", [
                        'page' => "Kip",
                        'subpage' => "Disposisi",
                        'logged_user' => $logged_user,
                        'id_role' => $logged_user->id_role,
                        'tenaga_terampil' => $tenaga_terampil,
                        'staff' => $staff,
                        'layanan' => $layanan,
                        'disposisi' => $disposisi
                    ]);
                }
            }
        }
        return redirect('/');
    }

    public function submit_disposisi(Request $request, $id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();

            $id_role = $logged_user->id_role;
            if($id_role == 2) {
                $layanan = LayananKip::find($id_layanan_kip);
                if (!$layanan) {
                    echo "gaada"; die();
                }
                $id_layanan_kip = $layanan->id_layanan_kip;
                $disposisi_delete = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->get();
                $total_disposisi_delete = count($disposisi_delete);

                $disposisi = $request->get('disposisi');
                if($disposisi != null) {
                    $total_disposisi = count($disposisi);
                    $layanan->status = "Menunggu Respon";
                }
                else {
                    $total_disposisi = 0;
                    $layanan->status = "Belum Disposisi";
                }
                try {
                    DB::beginTransaction();
                    $layanan->update();
                    for ($i=0; $i < $total_disposisi_delete; $i++) { 
                        $disposisi_delete[$i]->delete();
                    }
                    for ($i=0; $i < $total_disposisi; $i++) { 
                        $disposisi_save = new LayananKipDisposisi([
                            'id_layanan_kip' => $id_layanan_kip,
                            'id_user' => $disposisi[$i],
                        ]);
                        $disposisi_save->save();
                    }
                    DB::commit();
                    return redirect('/kip')->with('success', 'Data layanan berhasil diperbaharui');
                } 
                catch(\Exception $e) {
                    DB::rollback();
                    dd($e); // error transaction
                }
            }
        }
        return redirect('/');
    }

    public function process($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 3 || $id_role == 5) {
                $cek_layanan = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->where('id_user', $logged_user->id_user)->first();
                if($cek_layanan != null) {
                    $layanan = LayananKip::find($id_layanan_kip);
                    $layanan->status = "Sedang Dikerjakan";
                    $layanan->tanggal_proses = date("Y-m-d");
                    $layanan->update();
                    return redirect('/kip')->with('success', 'Data layanan akan diproses');
                }
            }
            return redirect('/kip')->with('error', 'Data layanan gagal diproses');
        }
        return redirect('/');
    }

    public function cancel($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $layanan = LayananKip::find($id_layanan_kip);
                if (!$layanan) {
                    echo "gaada"; die();
                }
                $layanan->status = "Menunggu Respon";
                $layanan->update();
                return redirect('/kip')->with('success', 'Data layanan telah dibatalkan');
            }
            return redirect('/kip')->with('error', 'Data layanan gagal dibatalkan');
        }
        return redirect('/');
    }

    public function report($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 3 || $id_role == 5) {
                $layanan = LayananKip::where('id_layanan_kip', $id_layanan_kip)->first();
                if($layanan) {
                    if($layanan->status == "Sedang Dikerjakan") {
                        $cek_layanan = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->where('id_user', $logged_user->id_user)->first();
                        if($cek_layanan != null) {
                            return view("main", [
                                'page' => "Kip",
                                'subpage' => "Report",
                                'logged_user' => $logged_user,
                                'id_role' => $logged_user->id_role,
                                'layanan' => $layanan,
                            ]);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function edit_report($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 3 || $id_role == 5) {
                $layanan = LayananKip::where('id_layanan_kip', $id_layanan_kip)->first();
                if($layanan) {
                    if($layanan->status == "Menunggu Validasi") {
                        $cek_layanan = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->where('id_user', $logged_user->id_user)->first();
                        if($cek_layanan != null) {
                            return view("main", [
                                'page' => "Kip",
                                'subpage' => "Report",
                                'logged_user' => $logged_user,
                                'id_role' => $logged_user->id_role,
                                'layanan' => $layanan,
                            ]);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function submit_report(Request $request, $id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $rules = [
                'hasil_text' => 'required|string',
                'hasil_image' => 'image|mimes:jpg,png,jpeg,gif,svg',
                'hasil_file' => 'mimes:pdf',
            ];

            $messages = [
                'hasil_text.required' => 'Hasil pekerjaan wajib diisi',
                'hasil_text.string' => 'Hasil pekerjaan tidak valid',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
            
            $id_role = $logged_user->id_role;
            if($id_role == 3 || $id_role == 5) {
                $layanan = LayananKip::where('id_layanan_kip', $id_layanan_kip)->first();
                if ($layanan) {
                    $cek_layanan = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->where('id_user', $logged_user->id_user)->first();
                    if($cek_layanan != null) {
                        $randomName = null;
                        if ($request->hasFile('hasil_image')) {
                            $filenameWithExt = $request->file('hasil_image')->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $extension = $request->file('hasil_image')->getClientOriginalExtension();
                            $filenameSimpan = md5($filename. time()).'.'.$extension;
                            $randomName = $filenameSimpan;
                            $image = Image::make($request->file('hasil_image'));
                            $destinationPath = public_path('storage/layanan/kip/hasil_image');
                            $image->save($destinationPath.'/'.$randomName);
                            $layanan->hasil_image = $randomName;
                        }
                        $hasil_file = null;
                        if ($request->hasFile('hasil_file')) {
                            $filenameWithExt = $request->file('hasil_file')->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $extension = $request->file('hasil_file')->getClientOriginalExtension();
                            $filenameSimpan = 'BATIK - '.$layanan->kode_layanan.' - '.$layanan->kategori.' - Laporan.'.$extension;
                            $hasil_file = $filenameSimpan;
                            $request->file('hasil_file')->storeAs('public/layanan/kip/hasil_file/', $hasil_file);
                            $layanan->hasil_file = $hasil_file;
                        }
                        $layanan->hasil_text = $request->get('hasil_text');
                        $layanan->tanggal_selesai = date('Y-m-d');
                        $layanan->alat_kerja = implode(', ', $request->get('alat_kerja'));
                        $layanan->link = $request->get('link');
                        $layanan->status = "Menunggu Validasi";
                        $layanan->update();
                        return redirect('/kip')->with('success', 'Data layanan berhasil dilaporkan');
                    }
                }
            }
        }
        return redirect('/');
    }

    public function validasi_report($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $layanan = LayananKip::find($id_layanan_kip);
                $layanan->status = "Selesai";
                $layanan->tanggal_selesai = date("Y-m-d");
                $layanan->update();
                return redirect('/kip')->with('success', 'Data layanan berhasil divalidasi');
            }
            return redirect('/kip')->with('error', 'Data layanan gagal divalidasi');
        }
        return redirect('/');
    }

    public function delete($id_layanan_kip) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 1 || $id_role == 2) {
                $layanan = LayananKip::find($id_layanan_kip);
                $disposisi_delete = LayananKipDisposisi::where('id_layanan_kip', $id_layanan_kip)->get();
                $total_disposisi_delete = count($disposisi_delete);

                $detail_delete = LayananKipDetail::where('id_layanan_kip', $id_layanan_kip)->get();
                $total_detail_delete = count($detail_delete);
                
                try {
                    DB::beginTransaction();
                    $layanan->delete();
                    for ($i=0; $i < $total_detail_delete; $i++) { 
                        $detail_delete[$i]->delete();
                    }
                    for ($i=0; $i < $total_disposisi_delete; $i++) { 
                        $disposisi_delete[$i]->delete();
                    }
                    DB::commit();
                    return redirect('/kip')->with('success', 'Data layanan berhasil dihapus');
                } 
                catch(\Exception $e) {
                    DB::rollback();
                    return redirect('/kip')->with('success', 'Data layanan gagal dihapus');
                }
            }
        }
        return redirect('/');
    }
}