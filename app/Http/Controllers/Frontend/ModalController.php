<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GlobalFunction;


class ModalController extends Controller
{

    public function pejabatmodal($id){
        $pejabat = DB::table('pejabat')
            ->select('*')
            ->where('id','=',$id)
            ->get();

        return view('panels.frontend1.navDetail.pemerintahan.modal', ['pejabat'> $pejabat]);
    }
}
