<?php

namespace App\Http\Controllers;

use App\Beritafoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TagsController extends Controller
{
    public function tags(){

        $data = DB::table('tags')
            ->select('*')
            ->orderByDesc('id')
            ->paginate(10);
        if (Auth::check()) {

            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'publish'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.tags', ['data'=>$data, 'priv'=>$priv,'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function delete($id)
    {
        $delete = DB::table('tags')->where('id', $id)->delete();

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

    public function tagsinput(){

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'publish'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                return view('mainmenu.inputtag', ['priv'=>$priv, 'datauser'=>$datauser]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function tagsedit($id){

        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            $hasRole = false;
            foreach($priv as $perm){
                if($perm->name == 'publish'){
                    $hasRole = true;
                }
            }
            if($hasRole){
                $data = DB::table('tags')
                ->select('*')
                ->where('id', $id)
                ->first();
                return view('mainmenu.edittag', ['priv'=>$priv, 'datauser'=>$datauser, 'data'=>$data]);
            }  else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
    }

    public function insert(Request $request)
    {
        DB::table('tags')->insert([
            'desc' => $request->desc,
        ]);


        return redirect('/tags');
    }

    public function update(Request $request, $id)
    {
        DB::table('tags')->where('id', '=' , $id)->update([
            'desc' => $request->get('desc')
        ]);

        return redirect('/tags');
    }

}
