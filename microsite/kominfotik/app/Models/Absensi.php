<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "absensi";
    protected $primaryKey = 'id_absensi';
    protected $fillable = [
        'id_user',
        'id_user_mesin',
        'tanggal',
        'first_in',
        'last_out',
        'jenis',
        'foto_timestamp',
        'keterangan_absen_pagi',
        'keterangan_absen_sore',
        'penalty_absen_pagi',
        'penalty_absen_sore',
        'keterangan',
        'status',
        'validated'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
