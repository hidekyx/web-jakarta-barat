<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatLmk extends Model
{
    protected $table = "perangkat_lmk";
    protected $primaryKey = 'id_perangkat_lmk';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}