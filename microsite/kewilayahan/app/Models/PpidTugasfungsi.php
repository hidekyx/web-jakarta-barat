<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidTugasfungsi extends Model
{
    protected $table = "ppid_tugasfungsi";
    protected $primaryKey = 'id_ppid_tugasfungsi';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}