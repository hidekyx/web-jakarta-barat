<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DateTime;
use Symfony\Component\VarDumper\Cloner\Data;
use Auth;

class PPIDSetController extends Controller{

    public function list(){
        $data = DB::table('ppid_daftar_i')
        ->select('*')
        ->orderBy('id_dftr', 'DESC')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.list',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function add(){
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.add', ['priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function store(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $filenameGenerated = null;
        $now = new DateTime();
        $year = $now->format("Y");

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $filenameGenerated = $filenameSimpan;
            $path = $request->file('file')->storeAs('public/ppid_docs/', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('ppid_daftar_i')->insert([
            'nama_inf' => $request->nama_inf,
            'detail_inf' => $request->detail_inf,
            'kategori' => $request->kategori,
            'format_inf' => 'Softcopy',
            'jangka_waktu' => 'Selama Masih Berlaku',
            'tahun' => $year,
            'lokasi' => 'Jakarta Barat',
            'penanggung_jaw' => $request->penanggung_jaw,
            'file' => $filenameGenerated
        ]);

        return redirect('/info-publik');
    }

    public function edit($id){
        $data = DB::table('ppid_daftar_i')
            ->select('*')
            ->where('id_dftr','=',$id)
            ->get();
            if (Auth::check()) {
                $datauser = Auth::user();
                $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
                left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
                foreach($priv as $perm){
                    if($perm->name == 'ppid'){
                        $hasRole = true;
                    }
                }
                if($hasRole){
                    return view('mainmenu.ppid.edit',['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
                }  else {
                    return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
                }
            } else {
                return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
            }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'file' => 'mimes:pdf|max:10000'
        ]);

        $filenameGenerated = null;

        if($request->file == "" || $request->file == null){
            DB::table('ppid_daftar_i')->where('id_dftr', $id)->update([
                'nama_inf' => $request->nama_inf,
                'detail_inf' => $request->detail_inf,
                'kategori' => $request->kategori,
                'penanggung_jaw' => $request->penanggung_jaw,
            ]);
        } else {
            if($request->hasFile('file')){
                $filenameWithExt = $request->file('file')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('file')->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $filenameGenerated = $filenameSimpan;
                $path = $request->file('file')->storeAs('public/ppid_docs/', $filenameSimpan);
            }else{
                // tidak ada file yang diupload
            }

            DB::table('ppid_daftar_i')->where('id_dftr', $id)->update([
                'nama_inf' => $request->nama_inf,
                'detail_inf' => $request->detail_inf,
                'kategori' => $request->kategori,
                'penanggung_jaw' => $request->penanggung_jaw,
                'file' => $filenameGenerated
            ]);
        }
        return redirect('/info-publik');
    }

    public function delete($id) {
        $delete = DB::table('ppid_daftar_i')->where('id_dftr', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Data PPID berhasil dihapus";
        } else {
            $success = true;
            $message = "Data tidak ditemukan";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function permohonan_list(){
        $data = DB::table('ppid_permohonan')
        ->select('*')
        ->orderBy('id_permohonan', 'DESC')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.permohonan_list',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function permohonan_detail($id){
        $data = DB::table('ppid_permohonan')
        ->select('*')
        ->where('id_permohonan', $id)
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.permohonan_detail',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function permohonan_tinjau($id){
        $data = DB::table('ppid_permohonan')
        ->select('*')
        ->where('id_permohonan', $id)
        ->get();
        $status = DB::table('ppid_permohonan')
        ->select('status')
        ->where('id_permohonan', $id)
        ->first();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                if($status->status == "Sedang Diproses") {
                    return view('mainmenu.ppid.permohonan_tinjau',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
                }
                else {
                    return redirect('/layanan-info-publik/permohonan')->withErrors('Tidak bisa tinjau data yang sudah diproses');
                }
                
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function permohonan_tolak_view($id){
        $data = DB::table('ppid_permohonan')
        ->select('*')
        ->where('id_permohonan', $id)
        ->get();
        $status = DB::table('ppid_permohonan')
        ->select('status')
        ->where('id_permohonan', $id)
        ->first();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                if($status->status == "Sedang Diproses") {
                    return view('mainmenu.ppid.permohonan_tolak',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
                }
                else {
                    return redirect('/layanan-info-publik/permohonan')->withErrors('Tidak bisa tinjau data yang sudah diproses');
                }
                
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function permohonan_tolak_action(Request $request, $id) {
        $tanggal_respon = date('Y-m-d');
        DB::table('ppid_permohonan')->where('id_permohonan', $id)->update([
            'status' => 'Ditolak',
            'keterangan' => $request->keterangan,
            'tanggal_respon' => $tanggal_respon
        ]);
        return redirect('/layanan-info-publik/permohonan')->with('success', 'Data Permohonan Berhasil Ditolak');
    }

    public function permohonan_konfirmasi($id) {
        $tanggal_penerimaan = date('Y-m-d');
        DB::table('ppid_permohonan')->where('id_permohonan', $id)->update([
            'status' => 'Sedang Diproses',
            'tanggal_penerimaan' => $tanggal_penerimaan
        ]);
        return redirect()->back()->with('success', 'Data permohonan berhasil dikonfirmasi');
    }

    public function permohonan_simpan(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $filenameGenerated = null;
        $now = new DateTime();
        $year = $now->format("Y");

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $filenameGenerated = $filenameSimpan;
            $path = $request->file('file')->storeAs('public/ppid_docs/', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('ppid_daftar_i')->insert([
            'nama_inf' => $request->nama_inf,
            'detail_inf' => $request->detail_inf,
            'kategori' => $request->kategori,
            'format_inf' => 'Softcopy',
            'jangka_waktu' => 'Selama Masih Berlaku',
            'tahun' => $year,
            'lokasi' => 'Jakarta Barat',
            'penanggung_jaw' => $request->penanggung_jaw,
            'file' => $filenameGenerated
        ]);
        $id_ppid = DB::getPdo()->lastInsertId();

        $id = $request->id_permohonan;
        $tanggal_respon = date('Y-m-d');
        DB::table('ppid_permohonan')->where('id_permohonan', $id)->update([
            'status' => 'Dipersetujui',
            'id_dftr' => $id_ppid,
            'tanggal_respon' => $tanggal_respon
        ]);

        return redirect('/layanan-info-publik/permohonan')->with('success', 'Data PPID berhasil ditambahkan');
    }

    public function keberatan_list(){
        $data = DB::table('ppid_keberatan')
        ->select('*')
        ->orderBy('id_keberatan', 'DESC')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.keberatan_list',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function keberatan_konfirmasi($id) {
        $tanggal_penerimaan = date('Y-m-d');
        DB::table('ppid_keberatan')->where('id_keberatan', $id)->update([
            'status' => 'Sedang Diproses',
            'tanggal_penerimaan' => $tanggal_penerimaan
        ]);
        return redirect()->back()->with('success', 'Data pengajuan keberatan berhasil dikonfirmasi');
    }

    public function keberatan_detail($id){
        $data = DB::table('ppid_keberatan')
        ->leftJoin('ppid_permohonan', 'ppid_keberatan.id_permohonan', '=', 'ppid_permohonan.id_permohonan')
        ->select('*', 'ppid_permohonan.tanggal_respon as tanggal_respon_permohonan')
        ->where('id_keberatan', $id)
        ->get();
        
        $status = DB::table('ppid_keberatan')
        ->select('status')
        ->where('id_keberatan', $id)
        ->first();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.keberatan_detail',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
                
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function keberatan_tinjau($id){
        $data = DB::table('ppid_keberatan')
        ->leftJoin('ppid_permohonan', 'ppid_keberatan.id_permohonan', '=', 'ppid_permohonan.id_permohonan')
        ->select('*', 'ppid_permohonan.tanggal_respon as tanggal_respon_permohonan')
        ->where('id_keberatan', $id)
        ->get();
        
        $status = DB::table('ppid_keberatan')
        ->select('status')
        ->where('id_keberatan', $id)
        ->first();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                if($status->status == "Sedang Diproses") {
                    return view('mainmenu.ppid.keberatan_tinjau',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
                }
                else {
                    return redirect('/layanan-info-publik/pengajuan-keberatan')->withErrors('Tidak bisa tinjau data yang sudah diproses');
                }
                
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function keberatan_simpan(Request $request){
        $this->validate($request, [
            'file' => 'required|mimes:pdf|max:10000'
        ]);

        $filenameGenerated = null;
        $now = new DateTime();
        $year = $now->format("Y");

        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $filenameGenerated = $filenameSimpan;
            $path = $request->file('file')->storeAs('public/ppid_docs/', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('ppid_daftar_i')->insert([
            'nama_inf' => $request->nama_inf,
            'detail_inf' => $request->detail_inf,
            'kategori' => $request->kategori,
            'format_inf' => 'Softcopy',
            'jangka_waktu' => 'Selama Masih Berlaku',
            'tahun' => $year,
            'lokasi' => 'Jakarta Barat',
            'penanggung_jaw' => $request->penanggung_jaw,
            'file' => $filenameGenerated
        ]);
        $id_ppid = DB::getPdo()->lastInsertId();

        $id = $request->id_permohonan;
        $tanggal_respon = date('Y-m-d');
        DB::table('ppid_permohonan')->where('id_permohonan', $id)->update([
            'id_dftr' => $id_ppid
        ]);

        $id_keberatan = $request->id_keberatan;
        DB::table('ppid_keberatan')->where('id_keberatan', $id_keberatan)->update([
            'status' => 'Dipersetujui',
            'tanggal_respon' => $tanggal_respon
        ]);

        return redirect('/layanan-info-publik/pengajuan-keberatan')->with('success', 'Data PPID berhasil ditambahkan');
    }

    public function keberatan_tolak_view($id){
        $data = DB::table('ppid_keberatan')
        ->leftJoin('ppid_permohonan', 'ppid_keberatan.id_permohonan', '=', 'ppid_permohonan.id_permohonan')
        ->select('*', 'ppid_permohonan.tanggal_respon as tanggal_respon_permohonan')
        ->where('id_keberatan', $id)
        ->get();
        $status = DB::table('ppid_keberatan')
        ->select('status')
        ->where('id_keberatan', $id)
        ->first();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                if($status->status == "Sedang Diproses") {
                    return view('mainmenu.ppid.keberatan_tolak',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
                }
                else {
                    return redirect('/layanan-info-publik/permohonan')->withErrors('Tidak bisa tinjau data yang sudah diproses');
                }
                
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function keberatan_tolak_action(Request $request, $id) {
        $tanggal_respon = date('Y-m-d');
        DB::table('ppid_keberatan')->where('id_keberatan', $id)->update([
            'status' => 'Ditolak',
            'keterangan_penolakan' => $request->keterangan_penolakan,
            'tanggal_respon' => $tanggal_respon
        ]);
        return redirect('/layanan-info-publik/pengajuan-keberatan')->with('success', 'Data Pengajuan Keberatan Berhasil Ditolak');
    }

    public function survei_list(){
        $data = DB::table('ppid_survei_jawaban')
        ->select('*')
        ->orderBy('id_jawaban', 'DESC')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.survei_list',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function survei_detail($id){
        $data = DB::table('ppid_survei_jawaban')
        ->select('*')
        ->where('id_jawaban', $id)
        ->first();
        $pertanyaan = DB::table('ppid_survei_pertanyaan')->get();
        $jawaban = json_decode($data->jawaban, true);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.survei_detail',['data'=>$data, 'pertanyaan'=>$pertanyaan, 'jawaban'=>$jawaban, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function kegiatan_prioritas_list(){
        $data = DB::table('ppid_kegiatan_prioritas')
        ->select('*')
        ->orderBy('id_kegiatan_prioritas', 'DESC')
        ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.kegiatan_prioritas_list',['data'=>$data, 'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function kegiatan_prioritas_add(){
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.kegiatan_prioritas_add', ['priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function kegiatan_prioritas_store(Request $request){
        $date = date("Y-m-d\TH:i:s", strtotime($request->tanggal));
        $date = str_replace("T", " ", $date);

        dd($request->all());
        $filenameGenerated = null;
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $filenameGenerated = $filenameSimpan;
            $path = $request->file('file')->storeAs('public/kegiatan_prioritas/', $filenameSimpan);
        }

        DB::table('ppid_kegiatan_prioritas')->insert([
            'judul' => $request->judul,
            'caption' => $request->caption,
            'tanggal' => $date,
            'media' => $filenameGenerated,
            'jenis' => "Video"
        ]);

        return redirect('/kegiatan-prioritas');
    }

    public function kegiatan_prioritas_edit($id){
        $data = DB::table('ppid_kegiatan_prioritas')
        ->select('*')
        ->where('id_kegiatan_prioritas','=',$id)
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'ppid'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.ppid.kegiatan_prioritas_edit',['data'=>$data,'priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function kegiatan_prioritas_update(Request $request, $id)
    {
        $date = date("Y-m-d\TH:i:s", strtotime($request->tanggal));
        $date = str_replace("T", " ", $date);

        $filenameGenerated = null;
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $filenameGenerated = $filenameSimpan;
            $path = $request->file('file')->storeAs('public/kegiatan_prioritas/', $filenameSimpan);

            DB::table('ppid_kegiatan_prioritas')->where('id_kegiatan_prioritas', $id)->update([
                'judul' => $request->judul,
                'caption' => $request->caption,
                'tanggal' => $date,
                'media' => $filenameGenerated
            ]);
        }
        else {
            DB::table('ppid_kegiatan_prioritas')->where('id_kegiatan_prioritas', $id)->update([
                'judul' => $request->judul,
                'caption' => $request->caption,
                'tanggal' => $date,
                'media' => $filenameGenerated
            ]);
        }
        return redirect('/kegiatan-prioritas');
    }

    public function kegiatan_prioritas_delete($id) {
        $delete = DB::table('ppid_kegiatan_prioritas')->where('id_kegiatan_prioritas', $id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Data Kegiatan berhasil dihapus";
        } else {
            $success = true;
            $message = "Data tidak ditemukan";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}