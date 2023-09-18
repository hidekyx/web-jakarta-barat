<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananId extends Model
{
    protected $table = "layanan";
    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        'id_instansi',
        'kode_layanan',
        'media',
        'tanggal',
        'kategori',
        'nama_pemohon',
        'nama_perwakilan',
        'nip_perwakilan',
        'kontak',
        'alamat',
        'cakupan',
        'deskripsi',
        'foto_kondisi',
        'foto_hasil',
        'file_surat',
        'no_surat',
        'tanggal_surat',
        'perihal_surat',
        'tanda_tangan',
        'penjelasan_pekerjaan',
        'status',
        'tanggal_selesai',
        'perwakilan',
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananIdDetail::class, 'id_layanan');
    }
    
    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id_instansi', 'id_instansi');
    }
}
