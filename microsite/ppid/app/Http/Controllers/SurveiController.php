<?php

namespace App\Http\Controllers;

use App\Models\SurveiJawaban;
use App\Models\SurveiPertanyaan;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SurveiController extends Controller
{
    public function formsurvei() {
        $pertanyaan = SurveiPertanyaan::get();
        $statistik['hari_ini'] = Statistik::wheredate('date', date('Y-m-d'))->count();
        $statistik['bulan_ini'] = Statistik::wheremonth('date', date('m'))->count();
        $statistik['tahun_ini'] = Statistik::whereyear('date', date('Y'))->count();
        $statistik['total'] = Statistik::count();
        return view("front.main", [
            'statistik' => $statistik,
            'pertanyaan' => $pertanyaan,
            'page' => 'Survei Kepuasan Pelayanan',
            'subpage' => 'Kota Administrasi Jakarta Barat'
        ]);
    }

    public function formsurvei_submit(Request $request) {
        $rules = [
            'nama_lengkap'         => 'required|string',
            'jenis_kelamin'        => 'required|string',
            'email'                => 'required|email',
            'tanggal_lahir'        => 'required|date',
            'pendidikan_terakhir'  => 'required|string',
            'pekerjaan'            => 'required|string',
            'jawaban'              => 'required'
        ];

        $messages = [
            'nama_lengkap.required'   => 'Nama lengkap wajib diisi',
            'nama_lengkap.string'  => 'Nama lengkap tidak valid',
            'jenis_kelamin.required'   => 'Jenis kelamin wajib diisi',
            'jenis_kelamin.string'  => 'Jenis kelamin tidak valid',
            'email.required'   => 'Email wajib diisi',
            'email.email'  => 'Email tidak valid',
            'tanggal_lahir.required'   => 'Tanggal lahir wajib diisi',
            'tanggal_lahir.string'  => 'Tanggal lahir tidak valid',
            'pendidikan_terakhir.required'   => 'Pendidikan terakhir wajib diisi',
            'pendidikan_terakhir.string'  => 'Pendidikan terakhir tidak valid',
            'pekerjaan.required'   => 'Pekerjaan wajib diisi',
            'pekerjaan.string'  => 'Pekerjaan tidak valid',
            'jawaban.required'   => 'Jawaban kuesioner wajib diisi',
            'jawaban.string'  => 'Jawaban kuesioner tidak valid'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $pengajuan_permohonan = $request->pengajuan_permohonan;
        if($pengajuan_permohonan == null) {
            $pengajuan_permohonan = "Belum";
        }
        
        $jawaban = json_encode($request->jawaban);
        // $jawaban_array = json_decode($jawaban, true); //Buat decode data jawabannya

        $tanggal_survei = date('Y-m-d');
        $survei_jawaban = new SurveiJawaban([
            'nama_lengkap' => $request->get('nama_lengkap'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'email' => $request->get('email'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'pendidikan_terakhir' => $request->get('pendidikan_terakhir'),
            'pekerjaan' => $request->get('pekerjaan'),
            'pengajuan_permohonan' => $pengajuan_permohonan,
            'jawaban' => $jawaban,
            'tanggal_survei' => $tanggal_survei
        ]);;

        if($survei_jawaban->save()) {
            return redirect()->back()->with('success', 'Data survei berhasil dikirim');   
        }
    }
}
