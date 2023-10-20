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

    public function disposisi()
    {
        return $this->hasOne(User::class, 'id_user', 'value');
    }

    public function barang()
    {
        return $this->hasOne(InventarisBarang::class, 'id_barang', 'value');
    }

    // public function layanan_kategori()
    // {
    //     return $this->hasMany(LayananIdKategori::class, 'id_layanan');
    // }
}
