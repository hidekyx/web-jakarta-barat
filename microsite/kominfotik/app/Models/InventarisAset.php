<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarisAset extends Model
{
    protected $table = "inventaris_aset";
    protected $primaryKey = 'id_aset';
    public $timestamps = false;
    protected $fillable = [
        'nama_aset',
        'kategori_aset',
        'kode_barang_aset',
    ];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class, 'kode_barang_aset');
    }
}