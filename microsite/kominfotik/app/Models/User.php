<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];
    
    protected $fillable = [
        'id_role',
        'id_seksi',
        'id_jabatan',
        'username',
        'email',
        'no_telp',
        'foto',
        'nik',
        'nama_lengkap',
        'alamat',
        'gaji'
    ];

    public function seksi()
    {
        return $this->belongsTo(Seksi::class, 'id_seksi');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_absensi');
    }

    public function penggajian()
    {
        return $this->hasMany(Penggajian::class, 'id_penggajian');
    }

    public function kompensasi()
    {
        return $this->hasMany(PenggajianKompensasi::class, 'id_kompensasi');
    }
}
