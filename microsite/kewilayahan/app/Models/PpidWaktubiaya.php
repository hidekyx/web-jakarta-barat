<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidWaktubiaya extends Model
{
    protected $table = "ppid_waktubiaya";
    protected $primaryKey = 'id_ppid_waktubiaya';
    
    protected $fillable = [
        'id_user',
        'konten',
        'status',
    ];
}