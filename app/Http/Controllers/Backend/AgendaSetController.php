<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class AgendaSetController extends Controller{

    public function list(){
        $agenda = DB::table('agenda')
            ->leftJoin('pejabat', 'agenda.pelaksana', '=', 'pejabat.id')
            ->select(DB::raw('row_number() over() as nomor'),'agenda.id','pejabat.jabatan as pelaksana','pejabat.img as gambar','agenda.tanggal','agenda.pukul','agenda.tempat','agenda.acara','agenda.ket','agenda.aktif')
            ->where('agenda.aktif','=','Y')
            ->orderByDesc('agenda.tanggal')
            ->paginate(10);
        if (Auth::check()) {
            $datauser = Auth::user();
            $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
            left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
            if($datauser->id_role <= 4){
                return view('mainmenu.agendaset', ['data'=>$agenda, 'priv'=>$priv,'datauser'=>$datauser]);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
	}

    public function add(){
        $pelaksana = DB::table('pejabat')
            ->select('nama','jabatan','id')
            ->get();
            if (Auth::check()) {
                $datauser = Auth::user();
                $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
                left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
                if($datauser->id_role <= 4){
                    return view('mainmenu.addagenda', ['pelaksana'=>$pelaksana, 'priv'=>$priv, 'datauser'=>$datauser]);
                } else {
                    return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
                }
            } else {
                return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
            }
    }

    public function insert(Request $request){

        $pukul = $request->time1.' - ' .$request->time2;

        DB::table('agenda')->insert([
            'pelaksana' => $request->pelaksana,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'acara' => $request->acara,
            'ket'=> $request->ket,
            'aktif' => 'Y',
            'pukul' => $pukul
        ]);

        return redirect('/agenda-settings');
    }

    public function delete($id){
        $delete = DB::table('agenda')->where('id', $id)->delete();

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

    public function detail($id){
        $agenda = DB::table('agenda')
            ->leftJoin('pejabat', 'agenda.pelaksana', '=', 'pejabat.id')
            ->select(DB::raw('row_number() over() as nomor'),'agenda.id','pejabat.jabatan as pelaksana','pejabat.img as gambar','agenda.tanggal','agenda.pukul','agenda.tempat','agenda.acara','agenda.ket','agenda.aktif')
            ->where('agenda.id','=',$id)
            ->get();

        $pelaksana = DB::table('pejabat')
            ->select('nama','jabatan','id')
            ->get();
            if (Auth::check()) {
                $datauser = Auth::user();
                $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
                left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
                if($datauser->id_role <= 4){
                    return view('mainmenu.editagenda', ['value'=>$agenda, 'pelaksana'=>$pelaksana, 'priv'=>$priv, 'datauser'=>$datauser]);
                } else {
                    return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
                }
            } else {
                return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
            }
    }

    public function edit(Request $request, $id){

        $pukul = $request->time1.' - ' .$request->time2;

        DB::table('agenda')->where('id', $id)->update([
             'pelaksana' => $request->pelaksana,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'acara' => $request->acara,
            'ket'=> $request->ket,
            'pukul' => $pukul
        ]);

        return redirect('/agenda-settings');
    }
}
