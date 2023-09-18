<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilDemografi extends Model
{
    protected $table = "profil_demografi";
    protected $primaryKey = 'id_profil_demografi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}