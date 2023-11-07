<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSetiapsaatPivot extends Model
{
    protected $table = "ppid_informasi_setiapsaat_pivot";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_ppid',
        'id_user',
        'type',
        'value',
    ];
}