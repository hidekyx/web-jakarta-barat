<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKipDisposisi extends Model
{
    protected $table = "kip_layanan_disposisi";
    protected $primaryKey = 'id_disposisi_kip';
    public $timestamps = false;
    protected $fillable = [
        'id_layanan_kip',
        'id_user',
    ];

    public function layanan_kip()
    {
        return $this->belongsTo(LayananKip::class, 'id_layanan_kip');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id_user');
    }
}
