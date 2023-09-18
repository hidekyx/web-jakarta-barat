<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidMaklumat extends Model
{
    protected $table = "ppid_maklumat";
    protected $primaryKey = 'id_ppid_maklumat';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}