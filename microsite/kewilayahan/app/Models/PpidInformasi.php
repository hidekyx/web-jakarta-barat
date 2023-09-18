<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasi extends Model
{
    protected $table = "ppid_informasi";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}