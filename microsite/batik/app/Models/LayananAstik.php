<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananAstik extends Model
{
    protected $table = "astik_layanan";
    protected $primaryKey = 'id_layanan_astik';
    protected $fillable = [
        'id_instansi',
        'kode_layanan',
        'kategori',
        'nama_pemohon',
        'nip_pemohon',
        'jabatan',
        'no_hp_pemohon',
        'email',
        'alamat_kantor',
        'penjelasan',
        'nama_narahubung',
        'no_hp_narahubung',
        'surat_permohonan',
        'tanggal_penerimaan',
        'tanggal_proses',
        'tanggal_selesai',
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananAstikDetail::class, 'id_layanan_astik');
    }
    
    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id_instansi', 'id_instansi');
    }
}
