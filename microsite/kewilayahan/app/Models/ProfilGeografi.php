<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilGeografi extends Model
{
    protected $table = "profil_geografi";
    protected $primaryKey = 'id_profil_geografi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}