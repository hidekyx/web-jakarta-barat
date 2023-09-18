<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPotensi extends Model
{
    protected $table = "profil_potensi";
    protected $primaryKey = 'id_profil_potensi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}