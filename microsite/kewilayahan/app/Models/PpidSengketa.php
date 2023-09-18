<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidSengketa extends Model
{
    protected $table = "ppid_sengketa";
    protected $primaryKey = 'id_ppid_sengketa';
    
    protected $fillable = [
        'id_user',
        'gambar',
    ];
}