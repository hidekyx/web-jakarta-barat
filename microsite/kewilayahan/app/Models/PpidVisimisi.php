<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidVisimisi extends Model
{
    protected $table = "ppid_visimisi";
    protected $primaryKey = 'id_ppid_visimisi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}