<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    protected $table = "seksi";
    protected $primaryKey = 'id_seksi';
    
    protected $fillable = [
        'nama_seksi'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_user');
    }
}
