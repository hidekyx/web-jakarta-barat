<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PpidInformasiSetiapsaat extends Model
{
    protected $table = "ppid_informasi_setiapsaat";
    protected $primaryKey = 'id_ppid';
    
    protected $fillable = [
        'id_subkategori',
        'kategori',
        'jenis',
        'isi',
    ];

    public function pivot($id_ppid, $id_user)
    {
        return PpidInformasiSetiapsaatPivot::where('id_ppid', $id_ppid)->where('id_user', $id_user)->first();
    }
}