<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidDokumen extends Model
{
    protected $table = "ppid_dokumen_informasi";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}