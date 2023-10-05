<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSertaMerta extends Model
{
    protected $table = "ppid_informasi_sertamerta";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}