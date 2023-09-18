<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKipDetail extends Model
{
    protected $table = "kip_layanan_detail";
    protected $primaryKey = 'id_layanan_kip_detail';
    public $timestamps = false;
    protected $fillable = [
        'id_layanan_kip',
        'kategori',
        'jenis_media',
        'file_media',
        'jenis_kebutuhan',
        'waktu_pelaksanaan',
        'file_materi',
    ];

    public function layanan()
    {
        return $this->belongsTo(LayananKip::class, 'id_layanan_kip');
    }
}
