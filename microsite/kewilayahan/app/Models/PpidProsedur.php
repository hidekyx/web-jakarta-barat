<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidProsedur extends Model
{
    protected $table = "ppid_prosedur";
    protected $primaryKey = 'id_ppid_prosedur';
    
    protected $fillable = [
        'id_user',
        'prosedur',
    ];
}