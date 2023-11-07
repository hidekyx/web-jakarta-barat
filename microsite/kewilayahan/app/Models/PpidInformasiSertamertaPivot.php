<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSertamertaPivot extends Model
{
    protected $table = "ppid_informasi_sertamerta_pivot";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_ppid',
        'id_user',
        'type',
        'value',
    ];
}