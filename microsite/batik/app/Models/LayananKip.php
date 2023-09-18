<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananKip extends Model
{
    protected $table = "kip_layanan";
    protected $primaryKey = 'id_layanan_kip';
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
        'deskripsi',
        'surat_permohonan',
        'tanggal_penerimaan',
        'tanggal_proses',
        'tanggal_selesai',
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananKipDetail::class, 'id_layanan_kip');
    }
    
    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id_instansi', 'id_instansi');
    }
}
