<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiBerkala extends Model
{
    protected $table = "ppid_informasi_berkala";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}