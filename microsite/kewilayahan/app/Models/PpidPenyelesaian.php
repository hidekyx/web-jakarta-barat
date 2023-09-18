<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidPenyelesaian extends Model
{
    protected $table = "ppid_penyelesaian";
    protected $primaryKey = 'id_ppid_penyelesaian';
    
    protected $fillable = [
        'id_user',
        'gambar',
    ];
}