<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananPublik extends Model
{
    protected $table = "layanan_publik";
    protected $primaryKey = 'id_layanan_publik';
    
    protected $fillable = [
        'id_user',
        'kategori',
        'nama_layanan',
        'alamat_layanan',
        'foto',
    ];
}