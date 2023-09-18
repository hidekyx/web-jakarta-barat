<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanLink extends Model
{
    protected $table = "kegiatan_link";
    protected $primaryKey = 'id_link';
    public $timestamps = false;
    protected $fillable = [
        'twitter',
        'instagram',
        'facebook',
        'youtube'
    ];
    

    public function kegiatan()
    {
        return $this->hasOne(Kegiatan::class, 'id_kegiatan');
    }
}
