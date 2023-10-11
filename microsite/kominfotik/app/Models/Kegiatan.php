<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "kegiatan";
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = [
        'id_user',
        'id_ruang_lingkup',
        'id_link',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'deskripsi',
        'lokasi',
        'gambar',
        'link',
        'is_from_batik'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ruanglingkup()
    {
        return $this->belongsTo(RuangLingkup::class, 'id_ruang_lingkup');
    }

    public function kegiatanlink()
    {
        return $this->belongsTo(KegiatanLink::class, 'id_link');
    }
}
