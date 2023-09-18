<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiKalender extends Model
{
    protected $table = "informasi_kalender";
    protected $primaryKey = 'id_informasi_kalender';
    
    protected $fillable = [
        'id_user',
        'acara',
        'tempat',
        'kehadiran',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
    ];
}