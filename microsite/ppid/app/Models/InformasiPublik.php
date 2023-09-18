<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiPublik extends Model
{
    protected $table = "ppid_daftar_i";
    protected $primaryKey = 'id_dftr';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_inf', // judul
        'detail_inf', // detail
        'kategori',
        'penanggung_jaw', // skpd ukpd
        'file',
        'download'
    ];
}
