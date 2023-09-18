<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatPimpinan extends Model
{
    protected $table = "perangkat_pimpinan";
    protected $primaryKey = 'id_perangkat_pimpinan';
    
    protected $fillable = [
        'id_user',
        'foto_pimpinan',
        'nama_pimpinan',
        'nip_pimpinan',
        'pangkat_pimpinan',
    ];
}