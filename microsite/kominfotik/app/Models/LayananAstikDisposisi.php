<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananAstikDisposisi extends Model
{
    protected $table = "astik_layanan_disposisi";
    protected $primaryKey = 'id_disposisi_astik';
    public $timestamps = false;
    protected $fillable = [
        'id_layanan_astik',
        'id_user',
    ];

    public function layanan_astik()
    {
        return $this->belongsTo(LayananAstik::class, 'id_layanan_astik');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }
}
