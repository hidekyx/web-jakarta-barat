<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekrutmenPersyaratan extends Model
{
    protected $table = "rekrutmen_persyaratan";
    protected $primaryKey = 'id_persyaratan';
    public $timestamps = false;
    protected $fillable = [
        'posisi',
        'keterangan'
    ];
}
