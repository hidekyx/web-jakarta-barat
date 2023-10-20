<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventarisBarang extends Model
{
    protected $table = "inventaris_barang";
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $fillable = [
        'kategori',
        'nama_barang',
        'satuan',
        'jumlah_terpakai'
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananDetail::class, 'id_layanan');
    }
}