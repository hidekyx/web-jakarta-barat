<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = "menu";
    protected $primaryKey = 'id_menu';
    public $timestamps = false;
    
    protected $fillable = [
        'kategori',
        'nama_menu',
    ];

    public function profil()
    {
        $profil['sejarah'] = $this->hasOne(ProfilSejarah::class, 'id_user', 'id_user');
        $profil['geografi'] = $this->hasOne(ProfilGeografi::class, 'id_user', 'id_user');
        $profil['demografi'] = $this->hasOne(ProfilDemografi::class, 'id_user', 'id_user');
        $profil['visi-dan-misi'] = $this->hasOne(ProfilVisimisi::class, 'id_user', 'id_user');
        $profil['prestasi'] = $this->hasOne(ProfilPrestasi::class, 'id_user', 'id_user');
        $profil['inovasi'] = $this->hasOne(ProfilInovasi::class, 'id_user', 'id_user');

        return $this->hasOne(ProfilSejarah::class, 'id_user', 'id_user');
    }
}