<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidLaporan extends Model
{
    protected $table = "ppid_laporan";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}