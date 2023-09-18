<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = "instansi";
    protected $primaryKey = 'id_instansi';
    
    protected $fillable = [
        'nama_instansi'
    ];
}
