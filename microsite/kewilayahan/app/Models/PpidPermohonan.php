<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidPermohonan extends Model
{
    protected $table = "ppid_permohonan";
    protected $primaryKey = 'id_ppid_permohonan';
    
    protected $fillable = [
        'id_user',
        'gambar',
    ];
}