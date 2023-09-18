<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananIdDetail extends Model
{
    protected $table = "layanan_detail";
    protected $primaryKey = 'id_layanan_detail';
    public $timestamps = false;
    protected $fillable = [
        'id_layanan',
        'value',
        'value_2',
        'id_layanan_kategori',
    ];

    public function layanan()
    {
        return $this->belongsTo(LayananId::class, 'id_layanan');
    }

    // public function layanan_kategori()
    // {
    //     return $this->hasMany(LayananIdKategori::class, 'id_layanan');
    // }
}
