<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerangkatTugasfungsi extends Model
{
    protected $table = "perangkat_tugasfungsi";
    protected $primaryKey = 'id_perangkat_tugasfungsi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}