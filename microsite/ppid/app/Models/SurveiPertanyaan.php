<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveiPertanyaan extends Model
{
    protected $table = "ppid_survei_pertanyaan";
    protected $primaryKey = 'id_pertanyaan';
    public $timestamps = false;
    
    protected $fillable = [
        'pertanyaan'
    ];
}
