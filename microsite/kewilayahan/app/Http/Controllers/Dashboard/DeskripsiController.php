<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\DeskripsiTrait;
use App\Traits\MenuTrait;
use Illuminate\Support\Facades\Validator;

class DeskripsiController extends Controller
{
    use MenuTrait;
    use DeskripsiTrait;

    // subpage = huruf kecil, pakai spasi, kebutuhan URL
    // submenu = huruf besar awal kata, pakai (-)

    public function deskripsi_view($subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            $list_menu = $this->get_list_menu();
            $data_deskripsi = $this->get_data_deskripsi($subpage, $id_user);
            if($data_deskripsi == "Halaman deskripsi website tidak ditemukan") {
                echo "404"; die(); // redirect ke 404
            }
            else {
                return view("dashboard.main", [
                    'logged_user' => $logged_user,
                    'list_menu' => $list_menu,
                    'data_deskripsi' => $data_deskripsi,
                    'page' => "Deskripsi Website",
                    'subpage' => $subpage,
                    'submenu' => ucwords(str_replace('-', ' ', $subpage))
                ]);
            }
        } // else condition redirect ke 401, belum login
        return redirect('/dashboard/home');
    }

    public function deskripsi_store(Request $request, $subpage) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $id_user = $logged_user->id_user;
            if($subpage == "foto-keperluan-website") {        
                $randomName['foto_bangunan'] = null;
                $randomName['foto_banner_1'] = null;
                $randomName['foto_banner_2'] = null;
                $randomName['foto_banner_3'] = null;
        
                foreach($randomName as $key => $value)
                {
                    if ($request->hasFile($key)) {
                        $filenameWithExt = $request->file($key)->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $request->file($key)->getClientOriginalExtension();
                        $filenameSimpan = md5($filename. time()).'.'.$extension;
                        $randomName[$key] = $filenameSimpan;
                        $path = $request->file($key)->storeAs('public/files/images/foto/banner', $filenameSimpan);
                    }
                }
                
                $data_deskripsi = $this->get_data_deskripsi($subpage, $id_user);
                if($data_deskripsi) {
                    if($randomName['foto_bangunan'] != null) {
                        $data_deskripsi->foto_bangunan = $randomName['foto_bangunan'];
                    };
                    if($randomName['foto_banner_1'] != null) {
                        $data_deskripsi->foto_banner_1 = $randomName['foto_banner_1'];
                    };
                    if($randomName['foto_banner_2'] != null) {
                        $data_deskripsi->foto_banner_2 = $randomName['foto_banner_2'];
                    };
                    if($randomName['foto_banner_3'] != null) {
                        $data_deskripsi->foto_banner_3 = $randomName['foto_banner_3'];
                    };
                    $transaksi = "update";
                }
                else {
                    $data_deskripsi = $this->store_data_deskripsi_foto($subpage, $id_user, $randomName);
                    $transaksi = "save";
                }
            }
            else if($subpage == "kontak-wilayah") {
                $rules = [
                    'email' => 'required|string',
                    'alamat' => 'required|string',
                ];
                $messages = [
                    'email.required' => 'Email wajib diisi',
                    'email.string' => 'Email tidak valid',
                    'alamat.required' => 'Alamat wajib diisi',
                    'alamat.string' => 'Alamat tidak valid',
                ];
    
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $data_deskripsi = $this->get_data_deskripsi($subpage, $id_user);
                if($data_deskripsi) {
                    $data_deskripsi->alamat = $request->get('alamat');
                    $data_deskripsi->email = $request->get('email');
                    $data_deskripsi->sosmed_facebook = $request->get('sosmed_facebook');
                    $data_deskripsi->sosmed_instagram = $request->get('sosmed_instagram');
                    $data_deskripsi->sosmed_youtube = $request->get('sosmed_youtube');
                    $data_deskripsi->sosmed_twitter = $request->get('sosmed_twitter');
                    $transaksi = "update";
                }
                else {
                    $data_deskripsi = $this->store_data_deskripsi_kontak($subpage, $id_user, $request);
                    $transaksi = "save";
                }
            }
            else if($subpage == "peta-wilayah") {
                $rules = [
                    'peta_keyword' => 'required|string',
                    'peta_zoom' => 'required|int',
                ];
                $messages = [
                    'peta_keyword.required' => 'Keyword peta wajib diisi',
                    'peta_keyword.string' => 'Keyword peta tidak valid',
                    'peta_zoom.required' => 'Zoom level peta wajib diisi',
                    'peta_zoom.int' => 'Zoom level peta tidak valid',
                ];
    
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()){
                    return redirect()->back()->withErrors($validator)->withInput($request->all);
                }

                $data_deskripsi = $this->get_data_deskripsi($subpage, $id_user);
                if($data_deskripsi) {
                    $data_deskripsi->peta_keyword = $request->get('peta_keyword');
                    $data_deskripsi->peta_zoom = $request->get('peta_zoom');
                    $transaksi = "update";
                }
                else {
                    $data_deskripsi = $this->store_data_deskripsi_peta($subpage, $id_user, $request);
                    $transaksi = "save";
                }
            }

            try {
                DB::beginTransaction();
                if($transaksi == "save") { $data_deskripsi->save(); }
                elseif($transaksi == "update") { $data_deskripsi->update(); }
                DB::commit();
                return redirect('/dashboard/deskripsi-website/'.$subpage)->with('success', 'Data berhasil disimpan');
            } 
            catch(\Exception $e) {
                DB::rollback();
                dd($e); // error transaction
            }
        }
        return redirect('/dashboard/home');
    }
}