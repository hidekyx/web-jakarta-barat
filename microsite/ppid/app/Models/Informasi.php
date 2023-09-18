<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = "ppid_informasi";
    protected $primaryKey = 'id_informasi';
    public $timestamps = false;
    
    protected $fillable = [
        'kategori',
        'id_subkategori',
        'jenis',
        'isi',
        'file',
        'views'
    ];
}
