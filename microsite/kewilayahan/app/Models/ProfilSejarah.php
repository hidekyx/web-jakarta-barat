<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSejarah extends Model
{
    protected $table = "profil_sejarah";
    protected $primaryKey = 'id_profil_sejarah';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}