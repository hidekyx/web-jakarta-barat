<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeskripsiFoto extends Model
{
    protected $table = "deskripsi_foto";
    protected $primaryKey = 'id_deskripsi_foto';
    
    protected $fillable = [
        'id_user',
        'foto_banner_1',
        'foto_banner_2',
        'foto_banner_3',
        'foto_bangunan',
    ];
}