<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GlobalFunction;


class IndexController extends Controller
{
	public function index(Request $request){
		// $datas = GlobalFunction::reduction_in_death();
		// return view("frontend.index",compact('datas'));
		return view("frontend.index");
	}
}