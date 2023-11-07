<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSertamerta extends Model
{
    protected $table = "ppid_informasi_sertamerta";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_subkategori',
        'kategori',
        'jenis',
        'isi',
    ];

    public function pivot($id_ppid, $id_user)
    {
        return PpidInformasiSertamertaPivot::where('id_ppid', $id_ppid)->where('id_user', $id_user)->first();
    }
}