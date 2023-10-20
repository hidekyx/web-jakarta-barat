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
}
