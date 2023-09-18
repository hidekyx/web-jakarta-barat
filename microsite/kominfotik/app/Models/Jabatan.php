<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = "jabatan";
    protected $primaryKey = 'id_jabatan';
    
    protected $fillable = [
        'nama_jabatan'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_user');
    }

    public function ruanglingkup()
    {
        return $this->hasMany(RuangLingkup::class, 'id_ruang_lingkup');
    }
}
