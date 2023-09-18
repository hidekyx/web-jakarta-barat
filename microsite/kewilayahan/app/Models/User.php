<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "user";
    protected $primaryKey = 'id_user';
    protected $hidden = ['password'];
    
    protected $fillable = [
        'username',
        'password',
        'email',
        'nama',
        'kategori',
        'lastlog',
    ];
}
