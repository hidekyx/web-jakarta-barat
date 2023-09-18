<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kegiatan;
use App\Models\RuangLingkup;
use App\Models\KegiatanLink;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Exports\KegiatanExport;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanController extends Controller
{
    public function main() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;

            if($id_role == 1 || $id_role == 4) {
                $tenaga_terampil = User::where('id_role','=','3')->where('status_kontrak','Aktif')->get();
                return view("main", [
                    'page' => "Kegiatan",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil
                ]);
            }

            else if($id_role == 2 || $id_role == 5) {
                $id_seksi = $logged_user->id_seksi;
                $tenaga_terampil = User::whereHas('seksi', function($query) use ($id_seksi) {
                $query->where([
                    ['status_kontrak', '=', 'Aktif'],
                    ['id_seksi', '=', $id_seksi],
                    ['id_role', '=', '3']
                ]);
                })->get();
                return view("main", [
                    'page' => "Kegiatan",
                    'logged_user' => $logged_user,
                    'id_role' => $logged_user->id_role,
                    'tenaga_terampil' => $tenaga_terampil
                ]);
            }

            else if($id_role == 3) {
                $username = $logged_user->username;
                return redirect('/kegiatan/view/'.$username);
            }

            else {
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function list($username) {
        if (Auth::check()) {
            $user = User::where('username','=',$username)->first();
            if($user == null) {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }

            $logged_user = Auth::user();
            if ($user->id_role == 3) {
                if($logged_user->id_role == 1 || $logged_user->id_role == 4) {
                    return $this->list_load($user, $logged_user, $username);
                }
                else if($logged_user->id_role == 2 || 5 && $logged_user->id_seksi == $user->id_seksi) {
                    return $this->list_load($user, $logged_user, $username);
                }
                else if($logged_user->id_role == 3 && $logged_user->id_user == $user->id_user) {
                    return $this->list_load($user, $logged_user, $username);
                }
            }
        }
        return redirect('/');
    }

    public function list_load($user, $logged_user, $username) {
        $id_user = $user->id_user;
        $kegiatan_kosong = false;
        $unvalidated = false;
        $disabled_export = false;
        $kegiatan = array();
        $selected_bulan = 0;
        $selected_tahun = 0;
        $id_role = $logged_user->id_role;
        $logged_username = $logged_user->username;
        if($id_role == 3 && $username != $logged_username) {
            return response()->json([
                'error' => 'Tidak berhak untuk mengakses page ini'
            ], 401);
        }

        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if($results['bulan'] == "")  {
                return redirect('/kegiatan/view/'.$username);   
            }

            $filter_bulan = explode('-',$results['bulan']);
            $selected_bulan = $filter_bulan[1];
            $selected_tahun = $filter_bulan[0];

            // $kegiatan = Kegiatan::whereHas('kegiatan_link', function($query) use ($id_user) {
            //     $query->where('id_user', $id_user);
            // })
            $kegiatan = Kegiatan::where('id_user', $id_user)
            ->whereMonth('tanggal', $selected_bulan)
            ->whereyear('tanggal', $selected_tahun)
            ->orderBy('tanggal', 'ASC')
            ->orderBy('jam_mulai', 'ASC')
            ->get();

            $status = "";
            foreach ($kegiatan as $key => $k) {
                $status .= $k->validated;
                $id_user = $k->id_user;
            }

            if(strpos($status, "N") !== false) { //Cek ada yang unvalidated atau ngga di bulan yang dipilih
                $unvalidated = true;
            } 
            else {
                $unvalidated = false;
            }

        }
        else {
            $kegiatan_kosong = true;
            $disabled_export = true;
        }
        if (!count($kegiatan)) {
            $kegiatan_kosong = true;
        }

        return view("main", [
            'page' => "Kegiatan",
            'subpage' => "List",
            'nama_lengkap' => $user->nama_lengkap,
            'jabatan' => $user->jabatan,
            'id_role' => $id_role,
            'id_user' => $id_user,
            'kegiatan_kosong' => $kegiatan_kosong,
            'disabled_export' => $disabled_export,
            'unvalidated' => $unvalidated,
            'kegiatan' => $kegiatan,
            'selected_bulan' => $selected_bulan,
            'selected_tahun' => $selected_tahun,
            'logged_username' => $logged_username,
            'logged_user' => $logged_user
        ]);
    }

    public function create() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_jabatan = $logged_user->id_jabatan;
            $ruang_lingkup = RuangLingkup::whereHas('jabatan', function($query) use ($id_jabatan) {
                $query->where('id_jabatan', $id_jabatan);
            })->get();
            return view("main", [
                'ruang_lingkup' => $ruang_lingkup,
                'logged_user' => $logged_user,
                'id_role' => $logged_user->id_role,
                'page' => "Kegiatan",
                'subpage' => "Tambah"
            ]);
        }
        return redirect('/');
    }

    public function edit($username, $id_kegiatan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_jabatan = $logged_user->id_jabatan;
            $id_role = $logged_user->id_role;
            $logged_id_user = $logged_user->id_user;
            $logged_username = $logged_user->username;

            if($id_role == 3 && $username != $logged_username) {
                return response()->json([
                    'error' => 'Tidak berhak untuk mengakses page ini'
                ], 401);
            }
            
            $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)->get();
            foreach ($kegiatan as $k) {
                $kegiatan_id_user = $k->id_user;
                $tanggal_input = $k->tanggal;
            }

            $tanggal_editable = true;
            $tanggal_input = date('Y-m', strtotime($tanggal_input));
            $tanggal_sekarang = date('Y-m');
            if ($tanggal_input != $tanggal_sekarang) {
                $tanggal_editable = false;
            }


            if($logged_id_user != $kegiatan_id_user) {
                return response()->json([
                    'error' => 'Tidak berhak untuk mengakses page ini'
                ], 401);
            }
        
            $ruang_lingkup = RuangLingkup::whereHas('jabatan', function($query) use ($id_jabatan) {
                $query->where('id_jabatan', $id_jabatan);
            })->get();
            
            
            return view("main", [
                'ruang_lingkup' => $ruang_lingkup,
                'logged_user' => $logged_user,
                'id_role' => $logged_user->id_role,
                'kegiatan' => $kegiatan,
                'tanggal_editable' => $tanggal_editable,
                'page' => "Kegiatan",
                'subpage' => "Edit"
            ]);
        }
        return redirect('/');
    }

    public function store(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $username = $logged_user->username;
            $rules = [
                'tanggal'               => 'required|date',
                'jam_mulai'             => 'required',
                'jam_selesai'           => 'required',
                'id_ruang_lingkup'      => 'required|int',
                'deskripsi'             => 'required|string'
            ];

            $messages = [
                'tanggal.required'            => 'Tanggal wajib diisi',
                'tanggal.date'                => 'Tanggal tidak valid',
                'jam_mulai.required'          => 'Jam Mulai wajib diisi',
                'jam_mulai.time'              => 'Jam Mulai tidak valid',
                'jam_selesai.required'        => 'Jam Selesai wajib diisi',
                'jam_selesai.time'            => 'Jam Selesai tidak valid',
                'id_ruang_lingkup.required'   => 'Ruang Lingkup wajib diisi',
                'id_ruang_lingkup.int'        => 'Ruang Lingkup tidak valid',
                'deskripsi.required'          => 'Deskripsi wajib diisi',
                'deskripsi.date'              => 'Deskripsi tidak valid'
            ];
            if ($logged_user->id_jabatan == 8) {
                $rules = $rules + ['link' => 'required', 'lokasi' => 'required|string'];
                $messages = $messages + ['link.required' => 'Link web wajib diisi', 'lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }
            elseif ($logged_user->id_jabatan == 14) {
                // $rules = $rules + ['twitter' => 'string', 'instagram' => 'string', 'facebook' => 'string', 'youtube' => 'string'];
                // $messages = $messages + ['twitter.string' => 'Link twitter tidak valid', 'instagram.string' => 'Link instagram tidak valid', 'facebook.string' => 'Link facebook tidak valid', 'youtube.string' => 'Link youtube tidak valid'];
            }
            elseif ($logged_user->id_jabatan == 11) {
                $rules = $rules + ['lokasi' => 'required|string'];
                $messages = $messages + ['lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }
            else {
                $rules = $rules + ['gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg', 'lokasi' => 'required|string'];
                $messages = $messages + ['gambar.required' => 'Gambar wajib diupload', 'gambar.image' => 'Gambar tidak valid', 'lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $tanggal_input = date('Y-m', strtotime($request->get('tanggal')));
            $tanggal_sekarang = date('Y-m');
            //if ($tanggal_input != $tanggal_sekarang) {
            //    return redirect()->back()->withErrors('Tidak bisa input data kegiatan untuk bulan ini');
            //}

            if ($logged_user->id_jabatan != 8 || $logged_user->id_jabatan != 14) {
                $randomName = null;
                if ($request->hasFile('gambar')) {
                    $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName = $filenameSimpan;
                    $image = Image::make($request->file('gambar'));
                    $destinationPath = public_path('storage/images/dokumentasi');
                    $image->resize(1600,600, function($constraint){
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$randomName);
                    // $path = $image->storeAs('public/images/dokumentasi', $filenameSimpan);
                }
            }

            $id_link = null;
            if ($logged_user->id_jabatan == 14) {
                $kegiatan_link = new KegiatanLink([
                    'twitter'           => $request->get('twitter'),
                    'instagram'         => $request->get('instagram'),
                    'facebook'          => $request->get('facebook'),
                    'youtube'           => $request->get('youtube'),
                ]);
                $kegiatan_link->save();
                $id_link = $kegiatan_link->id_link;
            }

            $kegiatan = new Kegiatan([
                'id_user'           => $id_user,
                'tanggal'           => $request->get('tanggal'),
                'jam_mulai'         => $request->get('jam_mulai'),
                'jam_selesai'       => $request->get('jam_selesai'),
                'id_ruang_lingkup'  => $request->get('id_ruang_lingkup'),
                'deskripsi'         => $request->get('deskripsi'),
                'link'              => $request->get('link'),
                'lokasi'            => $request->get('lokasi'),
                'gambar'            => $randomName,
                'id_link'           => $id_link
            ]);

            if($kegiatan->save()) {
                return redirect('/kegiatan/view/'.$username.'?bulan='.date('Y-m', strtotime($request->get('tanggal'))))->with('success', 'Data kegiatan berhasil ditambahkan');
            }
        }   
    }

    public function update(Request $request, $username, $id_kegiatan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $username = $logged_user->username;
            $rules = [
                'tanggal'               => 'required|date',
                'jam_mulai'             => 'required',
                'jam_selesai'           => 'required',
                'id_ruang_lingkup'      => 'required|int',
                'deskripsi'             => 'required|string'
            ];
            $messages = [
                'tanggal.required'            => 'Tanggal wajib diisi',
                'tanggal.date'                => 'Tanggal tidak valid',
                'jam_mulai.required'          => 'Jam Mulai wajib diisi',
                'jam_mulai.time'              => 'Jam Mulai tidak valid',
                'jam_selesai.required'        => 'Jam Selesai wajib diisi',
                'jam_selesai.time'            => 'Jam Selesai tidak valid',
                'id_ruang_lingkup.required'   => 'Ruang Lingkup wajib diisi',
                'id_ruang_lingkup.int'        => 'Ruang Lingkup tidak valid',
                'deskripsi.required'          => 'Deskripsi wajib diisi',
                'deskripsi.date'              => 'Deskripsi tidak valid'
            ];

            if ($logged_user->id_jabatan == 8) {
                $rules = $rules + ['link' => 'required', 'lokasi' => 'required|string'];
                $messages = $messages + ['link.required' => 'Link web wajib diisi', 'lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }
            elseif ($logged_user->id_jabatan == 14) {
                // $rules = $rules + ['twitter' => 'string', 'instagram' => 'string', 'facebook' => 'string', 'youtube' => 'string'];
                // $messages = $messages + ['twitter.string' => 'Link twitter tidak valid', 'instagram.string' => 'Link instagram tidak valid', 'facebook.string' => 'Link facebook tidak valid', 'youtube.string' => 'Link youtube tidak valid'];
            }
            elseif ($logged_user->id_jabatan == 11) {
                $rules = $rules + ['lokasi' => 'required|string'];
                $messages = $messages + ['lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }
            else {
                $rules = $rules + ['gambar' => 'image', 'lokasi' => 'required|string'];
                $messages = $messages + ['gambar.image' => 'Gambar tidak valid', 'lokasi.required' => 'Lokasi wajib diisi', 'lokasi.string' => 'Lokasi tidak valid'];
            }

            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $kegiatan = Kegiatan::find($id_kegiatan);
            if (!$kegiatan) {
                echo "gaada"; die();
            }

            if ($logged_user->id_jabatan != 8 || $logged_user->id_jabatan != 14) {
                $randomName = null;
                if ($request->hasFile('gambar')) {
                    $filenameWithExt = $request->file('gambar')->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('gambar')->getClientOriginalExtension();
                    $filenameSimpan = md5($filename. time()).'.'.$extension;
                    $randomName = $filenameSimpan;
                    $image = Image::make($request->file('gambar'));
                    $destinationPath = public_path('storage/images/dokumentasi');
                    $image->resize(1600,600, function($constraint){
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$randomName);
                    // $path = $image->storeAs('public/images/dokumentasi', $filenameSimpan);
                    $kegiatan->gambar = $randomName;
                }
                if($request->dokumentasi == null) {
                    $kegiatan->gambar = null;
                }
            }

            $kegiatan->tanggal = $request->get('tanggal');
            $kegiatan->jam_mulai = $request->get('jam_mulai');
            $kegiatan->jam_selesai = $request->get('jam_selesai');
            $kegiatan->id_ruang_lingkup = $request->get('id_ruang_lingkup');
            $kegiatan->deskripsi = $request->get('deskripsi');
            $kegiatan->lokasi = $request->get('lokasi');
            $kegiatan->link = $request->get('link');

            if ($logged_user->id_jabatan == 14) {
                $id_link = $kegiatan->id_link;
                $kegiatan_link = KegiatanLink::find($id_link);
                if (!$kegiatan_link) {
                    echo "gaada"; die();
                }

                $kegiatan_link->twitter = $request->get('twitter');
                $kegiatan_link->facebook = $request->get('facebook');
                $kegiatan_link->instagram = $request->get('instagram');
                $kegiatan_link->youtube = $request->get('youtube');
                $kegiatan_link->update();
            }

            if($kegiatan->update()) {
                return redirect('/kegiatan/view/'.$username.'?bulan='.date('Y-m', strtotime($kegiatan->tanggal)))->with('success', 'Data kegiatan berhasil diperbaharui');
            }
        }   
    }

    public function delete($username, $id_kegiatan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $logged_username = $logged_user->username;
            if ($username != $logged_username) {
                echo "data orang gaboleh dihapus"; die();
            }

            $kegiatan = Kegiatan::find($id_kegiatan);
            if (!$kegiatan) {
                echo "gaada"; die();
            }
            $tanggal = $kegiatan->tanggal;

            if($kegiatan->delete())
            {
                return redirect('/kegiatan/view/'.$username.'?bulan='.date('Y-m', strtotime($tanggal)))->with('success', 'Data kegiatan berhasil dihapus');
            }
        }
    }

    public function revisi_view($username, $id_kegiatan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $user = User::where('username','=',$username)->first();
            if($user == null) {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }

            $kegiatan = Kegiatan::where('id_kegiatan', $id_kegiatan)->get();
            foreach($kegiatan as $k) {
                if($k->user->id_seksi == $logged_user->id_seksi) {
                    if ($user->id_role == 3) {
                        if($logged_user->id_role == 1) {
                            return $this->revisi_load($kegiatan, $logged_user);
                        }
                        else if($logged_user->id_role == 2 && $logged_user->id_seksi == $user->id_seksi) {
                            return $this->revisi_load($kegiatan, $logged_user);
                        }
                        else if($logged_user->id_role == 3 && $logged_user->id_user == $user->id_user) {
                            return $this->revisi_load($kegiatan, $logged_user);
                        }
                    }
                }
            }
        }
        return redirect('/');
    }

    public function revisi_load($kegiatan, $logged_user) {
        return view("main", [
            'page' => "Kegiatan",
            'subpage' => "Revisi",
            'kegiatan' => $kegiatan,
            'id_role' => $logged_user->id_role,
            'logged_user' => $logged_user
        ]);
    }

    public function revisi_action(Request $request, $username, $id_kegiatan) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $user = User::where('username','=',$username)->first();
            if($user == null) {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }

            if ($logged_user->id_role != 3) {
                $kegiatan = Kegiatan::find($id_kegiatan);
                if (!$kegiatan) {
                    echo "gaada"; die();
                }

                $kegiatan->keterangan = $request->get('keterangan');
                $kegiatan->validated = "I";

                if($kegiatan->update()) {
                    $user = User::where('id_user', $kegiatan->id_user)->first();
                    return redirect('/kegiatan/validasi/'.$user->username.'?bulan='.date('Y-m', strtotime($kegiatan->tanggal)))->with('success', 'Data keterangan revisi kegiatan berhasil diperbaharui');
                }
            }
        }   
    }

    public function validasi_view($username) {
        if (Auth::check()) {
            $user = User::where('username','=',$username)->first();
            if($user == null) {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }

            $logged_user = Auth::user();
            if ($user->id_role == 3) {
                if($logged_user->id_role == 1) {
                    return $this->validasi_load($user, $logged_user, $username);
                }
                else if($logged_user->id_role == 2 && $logged_user->id_seksi == $user->id_seksi) {
                    return $this->validasi_load($user, $logged_user, $username);
                }
                else if($logged_user->id_role == 3 && $logged_user->id_user == $user->id_user) {
                    return $this->validasi_load($user, $logged_user, $username);
                }
            }
        }
        return redirect('/');
    }

    public function validasi_load($user, $logged_user, $username) {
        $id_user = $user->id_user;
        $kegiatan = array();
        $kegiatan_kosong = false;
        $id_role = $logged_user->id_role;
        $logged_username = $logged_user->username;
        if($id_role == 3 && $username != $logged_username) {
            return response()->json([
                'error' => 'Tidak berhak untuk mengakses page ini'
            ], 401);
        }

        $currentURL = url()->full();  
        $components = parse_url($currentURL);   
        if(isset($components['query'])) {
            parse_str($components['query'], $results); 
            if($results['bulan'] == "")  {
                return redirect('/kegiatan/validasi/'.$username);   
            }

            $filter_bulan = explode('-',$results['bulan']);
            $selected_bulan = $filter_bulan[1];
            $selected_tahun = $filter_bulan[0];

            $kegiatan = Kegiatan::whereHas('ruanglingkup', function($query) use ($id_user) {
                $query->where('id_user', $id_user);
            })
            ->whereMonth('tanggal', $selected_bulan)
            ->whereyear('tanggal', $selected_tahun)
            ->orderBy('tanggal', 'ASC')
            ->orderBy('jam_mulai', 'ASC')
            ->get();
        }
        
        if (!count($kegiatan)) {
            $kegiatan_kosong = true;
        }

        return view("main", [
            'page' => "Kegiatan",
            'subpage' => "Validasi",
            'id_role' => $id_role,
            'kegiatan_kosong' => $kegiatan_kosong,
            'kegiatan' => $kegiatan,
            'username' => $username,
            'user' => $user,
            'jabatan' => $user->jabatan,
            'logged_username' => $logged_username,
            'logged_user' => $logged_user
        ]);
    }

    public function validasi_action(Request $request, $username) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_role = $logged_user->id_role;
            if($id_role == 3) {
                return response()->json([
                    'error' => 'Tidak berhak untuk mengakses page ini'
                ], 401);
            }
            if($request->unvalidated != null) {
                foreach ($request->unvalidated as $key => $value) {
                    $data = array(
                        'validated'=> "N"
                    );
                    Kegiatan::where('id_kegiatan',$request->unvalidated[$key])
                    ->update($data);
                }
            }            
            if($request->validated != null) {
                foreach ($request->validated as $key => $value) {
                    $data = array(
                        'validated'=> "Y",
                        'keterangan'=> null
                    );
                    Kegiatan::where('id_kegiatan',$request->validated[$key])
                    ->update($data);
                }
            }
            return redirect()->back()->with('success', 'Validasi kegiatan berhasil diperbaharui');   
        }
        return redirect('/');
    }

    public function export($id_user, $selected_tahun, $selected_bulan, $format) {
        if (Auth::check()) {
            $user = User::where('id_user', $id_user)->first();
            $id_user = $user->id_user;
            $nama_lengkap = $user->nama_lengkap;
            $bulan = date("F", strtotime(date("Y") ."-". $selected_bulan ."-01"));
            $bulan = Carbon::parse($bulan)->isoFormat('MMMM');
            $kegiatan = Kegiatan::where('id_user', $id_user)
            ->where('validated','Y')
            ->whereMonth('tanggal', $selected_bulan)
            ->whereyear('tanggal', $selected_tahun)
            ->orderBy('tanggal', 'ASC')
            ->get();
            $bulan_cetak = $bulan.' '.$selected_tahun;
            if ($format == "excel") {
                return Excel::download(new KegiatanExport($kegiatan, $user, $bulan_cetak), 'Laporan Kegiatan - '.$bulan.' '.$selected_tahun.' - '.$nama_lengkap.'.xlsx');
            }
            // if ($format == "pdf") {
            //     return Excel::download(new KegiatanExport($kegiatan, $user), 'Laporan Kegiatan - '.$bulan.' '.$selected_tahun.' - '.$nama_lengkap.'.pdf');
            // }
            
        }
        return redirect('/');
	}
}
