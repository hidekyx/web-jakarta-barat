<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AstikSecurityAwareness extends Model
{
    protected $table = "astik_secaw";
    protected $primaryKey = 'id_secaw';
    
    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'kategori',
        'tanggal',
        'file',
        'file_2',
        'file_3',
        'file_4',
        'nama_file',
        'nama_file_2',
        'nama_file_3',
        'nama_file_4',
    ];
}
