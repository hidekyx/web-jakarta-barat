<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Traits\ApiBarat;
use App\Traits\BerandaTrait;
use App\Traits\DeskripsiTrait;
use App\Traits\MenuTrait;
use Illuminate\Pagination\LengthAwarePaginator;

class BeritaController extends Controller
{
    use MenuTrait;
    use ApiBarat;
    use BerandaTrait;
    use DeskripsiTrait;

    public function berita_list($username) {
        $kewilayahan = $this->get_url($username);

        if($kewilayahan) { 
            $list_menu = $this->get_list_menu();
            $data = $this->get_berita_list($kewilayahan);
            $berita_paginate_collection = collect($data['berita_paginate'], true);
            $data['berita_paginate_collection'] = new LengthAwarePaginator(
                $berita_paginate_collection->slice(0, 10),
                $berita_paginate_collection->count(),
                10,
                1,
                ['path' => request()->url(), 'query' => request()->query()]
            );
            return view("front.main", [
                'kewilayahan' => $kewilayahan,
                'list_menu' => $list_menu,
                'data' => $data,
                'page' => "Berita - List",
            ]);
        }
        else {
            echo "404"; die();
        }
    }

    public function detail($username, $kategori) {

    }
}
