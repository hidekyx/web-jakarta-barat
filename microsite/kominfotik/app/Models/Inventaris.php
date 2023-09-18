<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = "inventaris";
    protected $primaryKey = 'id_inventaris';
    protected $fillable = [
        'id_seksi',
        'kode_barang_aset',
        'no_registrasi',
        'satuan',
        'tanggal_perolehan',
        'bahan',
        'merk',
        'tipe',
        'tanggal_bpkb',
        'no_rangka',
        'no_mesin',
        'no_polisi',
        'asal_perolehan',
        'harga',
        'kondisi_aset',
        'status_aset'
    ];

    public function aset()
    {
        return $this->belongsTo(InventarisAset::class, 'kode_barang_aset', 'kode_barang_aset');
    }
    public function seksi()
    {
        return $this->belongsTo(Seksi::class, 'id_seksi', 'id_seksi');
    }
}