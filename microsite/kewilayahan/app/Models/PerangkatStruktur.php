<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatStruktur extends Model
{
    protected $table = "perangkat_struktur";
    protected $primaryKey = 'id_perangkat_struktur';
    
    protected $fillable = [
        'id_user',
        'struktur_organisasi',
    ];
}