<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKategori extends Model
{
    protected $table = "layanan_kategori";
    protected $primaryKey = 'id_layanan_kategori';
    protected $fillable = [
        'keterangan'
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananDetail::class, 'id_layanan_detail');
    }
}
