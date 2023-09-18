<?php

namespace App\Http\Controllers;

use App\Models\AstikSecurityAwareness;
use App\Traits\ApiBarat;

class HomeController extends Controller
{
    use ApiBarat;

    public function home() {
        $footer_secaw_infografis = $this->get_latest_infografis();
        $berita = $this->get_latest_berita();
        
        return view("main", [
            'page' => "Home",
            'footer_secaw_infografis' => $footer_secaw_infografis,
            'berita' => $berita
        ]);
    }
}