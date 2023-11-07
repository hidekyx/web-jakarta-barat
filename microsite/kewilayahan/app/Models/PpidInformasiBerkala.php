<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiBerkala extends Model
{
    protected $table = "ppid_informasi_berkala";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_subkategori',
        'kategori',
        'jenis',
        'isi',
    ];

    public function pivot($id_ppid, $id_user)
    {
        return PpidInformasiBerkalaPivot::where('id_ppid', $id_ppid)->where('id_user', $id_user)->first();
    }
}