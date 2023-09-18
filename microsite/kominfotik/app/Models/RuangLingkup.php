<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuangLingkup extends Model
{
    protected $table = "ruang_lingkup";
    protected $primaryKey = 'id_ruang_lingkup';
    
    protected $fillable = [
        'id_jabatan',
        'ruang_lingkup'
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'id_kegiatan');
    }
}
