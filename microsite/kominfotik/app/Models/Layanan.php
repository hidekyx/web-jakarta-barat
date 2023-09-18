<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
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
        'foto_kondisi',
        'deskripsi',
        'file_surat',
        'no_surat',
        'tanggal_surat',
        'perihal_surat',
        'penjelasan_pekerjaan',
        'status',
        'tanda_tangan',
        'tanggal_selesai',
        'perwakilan',
        'foto_hasil'
    ];

    public function layanan_detail()
    {
        return $this->hasMany(LayananDetail::class, 'id_layanan');
    }
    
    public function instansi()
    {
        return $this->hasOne(Instansi::class, 'id_instansi', 'id_instansi');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'perwakilan');
    }
}
