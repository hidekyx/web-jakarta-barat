<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = "ppid_permohonan";
    protected $primaryKey = 'id_permohonan';
    public $timestamps = false;
    
    protected $fillable = [
        'kode_permohonan',
        'kategori',
        'alamat',
        'email',
        'no_telp',
        'pekerjaan',
        'rincian',
        'tujuan',
        'cara_memperoleh',
        'media',
        'cara_mendapatkan',
        'tanggal_permohonan',
        'tanggal_penerimaan',
        'tanggal_respon',
        'status',
        'keterangan'
    ];
}
