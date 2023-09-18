<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiInovasi extends Model
{
    protected $table = "informasi_inovasi";
    protected $primaryKey = 'id_informasi_inovasi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}