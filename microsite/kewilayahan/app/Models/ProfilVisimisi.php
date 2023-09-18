<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilVisimisi extends Model
{
    protected $table = "profil_visimisi";
    protected $primaryKey = 'id_profil_visimisi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}