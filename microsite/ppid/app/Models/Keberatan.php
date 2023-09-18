<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keberatan extends Model
{
    protected $table = "ppid_keberatan";
    protected $primaryKey = 'id_keberatan';
    public $timestamps = false;
    
    protected $fillable = [
        'id_permohonan',
        'kode_permohonan',
        'nik',
        'keterangan_keberatan',
        'status',
        'keterangan_penolakan',
        'tanggal_keberatan',
        'tanggal_penerimaan',
        'tanggal_respon'
    ];

    public function permohonan()
    {
        return $this->hasOne(Permohonan::class, 'id_permohonan');
    }
}
