<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidKeberatan extends Model
{
    protected $table = "ppid_keberatan";
    protected $primaryKey = 'id_ppid_keberatan';
    
    protected $fillable = [
        'id_user',
        'gambar',
    ];
}