<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $table = "instansi";
    protected $primaryKey = 'id_instansi';
    public $timestamps = false;
    protected $fillable = [
        'nama_instansi'
    ];
}
