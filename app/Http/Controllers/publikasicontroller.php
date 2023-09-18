<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
        public function index()
        {
            // $data = DB::table('berita')
            //     ->leftJoin('kategori', 'berita.catID', '=', 'kategori.id')
            //     ->leftJoin('users', 'berita.writer', '=', 'users.id')
            //     ->select('berita.id', 'kategori.kategori', 'berita.title', 'users.aname', 'berita.content', 'berita.time', 'berita.img', 'berita.published', 'berita.viewed', 'berita.video')
            //     // ->where('berita.id', '=', $id)
            //     ->orderBy('berita.id', 'ASC')
            //     ->paginate(10);

            $data = DB::table('berita')
                ->select('*')
                ->paginate(6);

            // select beritaid, kategori.kategori ... from berita left

            return view('panels.publikasi', ['data' => $data]);
        }
}