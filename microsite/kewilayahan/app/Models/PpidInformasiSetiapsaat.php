<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSetiapsaat extends Model
{
    protected $table = "ppid_informasi_setiapsaat";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_user',
        'judul',
        'file',
        'keterangan',
    ];
}