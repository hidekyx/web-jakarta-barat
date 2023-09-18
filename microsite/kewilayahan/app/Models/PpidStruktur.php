<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidStruktur extends Model
{
    protected $table = "ppid_struktur";
    protected $primaryKey = 'id_ppid_struktur';
    
    protected $fillable = [
        'id_user',
        'struktur_organisasi',
    ];
}