<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeskripsiKontak extends Model
{
    protected $table = "deskripsi_kontak";
    protected $primaryKey = 'id_deskripsi_kontak';
    
    protected $fillable = [
        'id_user',
        'alamat',
        'email',
        'sosmed_facebook',
        'sosmed_instagram',
        'sosmed_youtube',
        'sosmed_twitter',
    ];
}