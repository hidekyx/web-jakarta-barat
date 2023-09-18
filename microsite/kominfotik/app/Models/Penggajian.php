<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    protected $table = "penggajian";
    protected $primaryKey = 'id_penggajian';
    protected $fillable = [
        'id_user',
        'bulan',
        'total_telat',
        'total_pulang_cepat',
        'total_telat_dan_pulang_cepat',
        'total_izin',
        'total_cuti',
        'total_alpha',
        'total_sakit',
        'total_tidak_absen',
        'total_dinas_luar_sehari',
        'total_dinas_luar_setengah',
        'potongan_alpha',
        'gaji_sebelum_pajak'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
