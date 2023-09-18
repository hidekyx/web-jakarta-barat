<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeskripsiPeta extends Model
{
    protected $table = "deskripsi_peta";
    protected $primaryKey = 'id_deskripsi_peta';
    
    protected $fillable = [
        'id_user',
        'peta_keyword',
        'peta_zoom',
    ];
}