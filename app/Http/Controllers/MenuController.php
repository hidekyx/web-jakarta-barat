<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class MenuController extends Controller
{
    public function index()
    {
        $data = DB::table('menu')
            ->select('id', 'keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'deleteable', 'link')
            // ->where('berita.id', '=', $id)
            ->paginate(10);
        $full = DB::table('menu')
            ->select('id', 'keterangan', 'href_status as href', 'id_menu as idMenu', 'id_submenu as idSubMenu', 'deleteable')
            // ->where('berita.id', '=', $id)
            ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.menu', ['data' => $data, 'full'=>$full, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function add()
    {
        $data = DB::table('menu')
            ->select('*')
            ->whereNull('id_menu')
            ->where('href_status', '=', false)
            ->where('deleteable', '=', false)
            // ->where('berita.id', '=', $id)
            ->get();

        $databigmenu= DB::table('menu')
        ->select('*')
        ->whereNull('id_menu')
        ->where('href_status', '=', false)
        ->where('deleteable', '=', true)
        ->where('submenu','=',true)
        // ->where('berita.id', '=', $id)
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.addmenu', ['data' => $data, 'databigmenu'=>$databigmenu, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function addcontent()
    {
        $data = DB::table('menu')
            ->select('*')
            ->orderByDesc('id')
            ->limit(1)
            // ->where('berita.id', '=', $id)
            ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.addcontentmenu', ['data' => $data, 'priv'=>$priv, 'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function addbigcontent($id)
    {
        $data = DB::table('menu')
            ->select('*')
            ->orderByDesc('id')
            ->limit(1)
            // ->where('berita.id', '=', $id)
            ->get();

        $values = DB::table('menu')
        ->select('*')
        ->where('id_menu','=',$id)
        ->whereNull('id_submenu')
        ->where('deleteable', '=', true)
        ->whereNotNull('identifier')
        ->orderByDesc('id')
        ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.addbigcontent', ['data' => $data, 'values'=>$values, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function store(Request $request)
    {
        if($request->jenisMenu == 1){
            DB::table('menu')->insert([
                'keterangan' => $request->keterangan,
                'href_status' => false,
                'deleteable'=> false
            ]);


            return redirect('/menu');
        } else if($request->jenisMenu == 3){
            DB::table('menu')->insert([
                'keterangan' => $request->keterangan,
                'href_status' => true,
                'link' => $request->link
            ]);


            return redirect('/menu');
        } else if($request->jenisMenu == 2){
            DB::table('menu')->insert([
                'keterangan' => $request->keterangan,
                'href_status' => true,
                'id_menu'=>$request->id_menu
            ]);

            return redirect('/addcontentmenu');
        }  else if($request->jenisMenu == 4){
            DB::table('menu')->insert([
                'keterangan' => $request->keterangan,
                'href_status' => true,
                'id_menu'=>$request->id_menu,
                'link' => $request->link
            ]);

            return redirect('/menu');
        } else if($request->jenisMenu == 5){
            DB::table('menu')->insert([
                'keterangan' => $request->keterangan,
                'href_status' => true,
                'id_menu'=>$request->id_bigmenu
            ]);

            return redirect('/addbigcontentmenu/'.$request->id_bigmenu);
        }
    }

    public function storecontent(Request $request)
    {
        DB::table('content_menu')->insert([
            'id_menu' => $request->id_menu,
            'title_content' => $request->title_content,
            'content'=> $request->content,
        ]);

        return redirect('/menu');
    }

    public function storebigcontent(Request $request, $id)
    {
        DB::table('content_menu')->insert([
            'id_menu' => $id,
            'title_content' => $request->title_content
        ]);

        DB::table('menu')->where('id', '=' , $id)->update([
            'id_submenu' => $request->id_submenu,
        ]);

        if($request->id_submenu == 10 || $request->id_submenu == 11 || $request->id_submenu == 39 ){
            return redirect('/menu');
        } elseif ($request->id_submenu == 9) {
            DB::table('profil')->insert([
                'id_menu' => $id,
                'nama' => $request->title_content
            ]);
            return redirect('/menu');
        } elseif ($request->id_submenu == 38) {
            DB::table('pemerintahan')->insert([
                'id_menu' => $id,
                'nama' => $request->title_content
            ]);
            return redirect('/menu');
        }
    }

    public function delete($id)
    {
        $delete = DB::table('menu')->where('id', $id)->delete();

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function editcontent($id){

        $content =  DB::table('content_menu')
                ->select('*')
                ->where('id_menu', '=', $id)
                ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.editcontentmenu', ['data' => $content, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function editsublink($id){

        $content =  DB::table('menu')
                ->select('*')
                ->where('id', '=', $id)
                ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.editsublink', ['data' => $content, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }


    public function editlink($id){

        $content =  DB::table('menu')
                ->select('*')
                ->where('id', '=', $id)
                ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.editlink', ['data' => $content, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function editmenu($id){

        $content =  DB::table('menu')
                ->select('*')
                ->where('id', '=', $id)
                ->get();
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role == 1){
                return view('master.editmenu', ['data' => $content, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }


    public function updatemain(Request $request, $id){

        DB::table('menu')->where('id', '=' , $id)->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/menu');
    }


    public function updatecontent(Request $request, $id){

        DB::table('content_menu')->where('id', '=' , $id)->update([
            'title_content' => $request->title_content,
            'content' => $request->content
        ]);

        return redirect('/menu');
    }

    public function updatelink(Request $request, $id){

        DB::table('menu')->where('id', '=' , $id)->update([
            'keterangan' => $request->keterangan,
            'link' => $request->link
        ]);

        return redirect('/menu');
    }

    public function updatesublink(Request $request, $id){

        DB::table('menu')->where('id', '=' , $id)->update([
            'keterangan' => $request->keterangan,
            'link' => $request->link
        ]);

        return redirect('/menu');
    }
}
