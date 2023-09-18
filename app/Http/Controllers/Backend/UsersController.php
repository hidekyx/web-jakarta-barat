<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

	// function __construct()
	// {
	// 	$this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
	// 	$this->middleware('permission:user-create', ['only' => ['create','store']]);
	// 	$this->middleware('permission:user-edit', ['only' => ['edit','update']]);
	// 	$this->middleware('permission:user-delete', ['only' => ['destroy']]);
	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{

        $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        if (Auth::check()) {
            if($datauser->id_role == 1){
                $search = str_replace("'","''",$request->input('q'));
                $results = User::orderBy('id');
                if($search!=''){
                    // $user->where('email','like','%'.$search.'%');
                    $results = $results->whereRAW("LOWER(email) like '%".strtolower($search)."%' OR LOWER(aname) like '%".strtolower($search)."%' ");
                }
                $results = $results->paginate(10);
                $datadua = DB::select(DB::raw("select * from roles"));
                return view('backend.users.index',compact('results', 'priv','datadua','datauser'))->with('i', ($request->input('page', 1) - 1) * 10);
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
        $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
		$roles = Role::all();
        if (Auth::check()) {
            if($datauser->id_role == 1){
                return view('backend.users.create',compact('roles','priv','datauser'));
            } else {
                return redirect('/dashboard')->with('jsAlert', 'User has no permission, Access denied!');
            }
        } else {
            return redirect('/login')->with('jsAlert', 'Session Not Found, silahkan login terlebih dahulu');
        }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{

		$this->validate($request, [
			'nama' => 'required',
			'email' => 'required',
			'password' => 'required',
			'id_role' => 'required'
		]);


		$input = $request->all();
		$input['password'] = Hash::make($input['password']);

        $check = DB::table('users')
            ->select('*')
            ->where('email', '=', $request->email)
            ->get();

        foreach($check as $check){
            return redirect('/users/create')->with('jsAlert', 'Email is already used');
        }

    	$user = DB::table('users')->insert([
            'nama' => $input['nama'],
            'password' => $input['password'],
            'email' => $input['email'],
            'id_role' => $input['id_role'],
            'remember_token'=> 'R0nlydwsr7X7GLhvUp4OvWMhS6ClrE8ACYlm3msbcPVpTcEFvXDlRlIcBPBr'
        ]);
    	// $user->assignRole($request->input('roles'));

    	return redirect()->route('users.index')->with('success','User created successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		$permission = Permission::get();
		$rolePermissions = DB::table('model_has_roles')->join('role_has_permissions','role_has_permissions.role_id','=','model_has_roles.role_id')->select('role_has_permissions.permission_id')->where('model_has_roles.model_id',$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
		// $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
		$userRole = $user->roles->pluck('name','name')->all();
		return view('backend.users.show',compact('user','permission','rolePermissions','userRole'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		$roles = Role::pluck('name','name')->all();
		$userRole = $user->roles->pluck('name','name')->all();


		return view('backend.users.edit',compact('user','roles','userRole'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		// print_r($request->all());
	 	$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email|unique:users,email,'.$id,
			'password' => 'same:confirm-password',
			'roles' => 'required'
		]);

		$input = $request->all();
		$input['updated_at'] = \Carbon\Carbon::now();
		if(!empty($input['password'])){
			$input['password'] = Hash::make($input['password']);
		}else{
			$input = Arr::except($input,array('password'));
		}

		$user = User::find($id);
		$user->update($input);
		DB::table('model_has_roles')->where('model_id',$id)->delete();

		$user->assignRole($request->input('roles'));

		return redirect()->route('users.index')->with('success','User updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		User::find($id)->delete();
		return redirect()->route('user.index')->with('success','User deleted successfully');
	}

    public function userDetail($id){

        $user = User::find($id);
        $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
        $editedrole = Role::all();
		if($id == $datauser->id) {
			return view('mainmenu.user-setting',compact('user', 'priv', 'datauser', 'editedrole'));
		}
		else {
			return redirect('/user-profile/'.$datauser->id);
		}
        
    }

    public function profile(Request $request, $id){

        $randomName = null;
        if($request->has('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('image')->storeAs('public/profile-photo', $filenameSimpan);

            DB::table('users')->where('id', '=' , $id)->update([
                'profile_photo' => $randomName,
            ]);

            return redirect('/login');
        }else{
            DB::table('users')->where('id', '=' , $id)->update([
                'nama' => $request->aname,
            ]);

            return redirect('/dashboard');
        }
    }

    public function profilePhoto(Request $request, $id){

        $randomName = null;
         if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $randomName = $filenameSimpan;
            $path = $request->file('image')->storeAs('public/profile-photo', $filenameSimpan);
        }else{
            // tidak ada file yang diupload
        }

        DB::table('users')->where('id', '=' , $id)->update([
            'profile_photo' => $randomName,
        ]);

        return redirect('/dashboard');
    }

    public function changePass($id){
        $user = User::find($id);
        $datauser = Auth::user();
        $priv= DB::select(DB::raw("SELECT p.name from role_has_permissions rhp left join permissions p on rhp.permission_id = p.id
        left join users u on rhp.role_id = u.id_role where u.id = '$datauser->id'"));
		if($id == $datauser->id) {
			return view('mainmenu.change-pass',compact('user', 'priv', 'datauser'));
		}
		else {
			return redirect('/change-password/'.$datauser->id);
		}
    }

    public function pass(Request $request, $id){
        $this->validate($request, [
			'password' => 'same:confirm-password',
		]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        DB::table('users')->where('id', '=' , $id)->update([
            'password' => $input['password'],
        ]);

        return redirect('/dashboard');

    }

    public function ubahRole($id, $roleId){

        DB::table('users')->where('id', '=' , $id)->update([
            'id_role' => $roleId,
        ]);

    }
}
