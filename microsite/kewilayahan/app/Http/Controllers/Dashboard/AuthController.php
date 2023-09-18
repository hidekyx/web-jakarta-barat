<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\MenuTrait;

class AuthController extends Controller
{
    use MenuTrait;

    public function password_view() {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $list_menu = $this->get_list_menu();
            return view("dashboard.main", [
                'page' => "Password",
                'logged_user' => $logged_user,
                'list_menu' => $list_menu,
            ]);
        }
        else {
            Session::flash('error', 'Anda harus login terlebih dahulu');
            return redirect('/dashboard/login');
        }
    }

    public function password_change(Request $request) {
        if (Auth::check()) {
            $logged_user = Auth::user();
            $rules = [
                'password'                       => 'required|string|confirmed'
            ];
            $messages = [
                'password.required'              => 'Password baru wajib diisi',
                'password_confirmation.required' => 'Password baru wajib diisi'
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return redirect()->back()->with('error', 'Password gagal dirubah');
            }
    
            $user = User::find($logged_user->id_user);
            if (!$user) {
                echo "gaada"; die();
            }
    
            $user->password = bcrypt($request->get('password'));
    
            if($user->update()) {
                return redirect()->back()->with('success', 'Password berhasil dirubah');
            }
        }
        else {
            Session::flash('error', 'Anda harus login terlebih dahulu');
            return redirect('/dashboard/login');
        }
    }

    public function login_view() {
        if (Auth::check()) {
            //Login Success
            return redirect('/dashboard/home');
        }
        return view("dashboard.main", [
            'page' => "Login"
        ]);
    }

    public function login_auth(Request $request) {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string',
            'captcha'               => 'required|captcha'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string',
            'captcha.required'      => 'Captcha wajib diisi',
            'captcha.captcha'       => 'Captcha yang diinput salah'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        $remember = $request->remember ? true : false ;

        Auth::attempt($data, $remember);
 
        if (Auth::check()) {
            //Login Success
            User::where('id_user',Auth::user()->id)->update(['lastlog' => \Carbon\Carbon::now()]);
            return redirect('/dashboard/home');
        }
        else {
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/dashboard/login');
        }
    }

    public function reload_captcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/dashboard/home');
    }
}
