<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPrioritas extends Model
{
    protected $table = "ppid_kegiatan_prioritas";
    protected $primaryKey = 'id_kegiatan_prioritas';
    public $timestamps = false;
    
    protected $fillable = [
        'judul',
        'caption',
        'tanggal',
        'media'
    ];
}
