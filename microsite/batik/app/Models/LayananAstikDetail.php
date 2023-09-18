<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananAstikDetail extends Model
{
    protected $table = "astik_layanan_detail";
    protected $primaryKey = 'id_layanan_astik_detail';
    public $timestamps = false;
    protected $fillable = [
        'id_layanan_astik',
        'kategori',
        'tanggal_pelaksanaan',
        'waktu_mulai',
        'waktu_akhir',
        'lokasi_pelaksanaan',
        'jammer_sinyal',
        'perangkat',
        'seksi',
        'bidang',
        'perangkat_daerah',
        'jenis_akun',
        'target_akun',
        'nama_domain',
        'jenis_web',
        'fungsi_web',
        'lokasi_server',
        'ip_address',
        'port',
        'operating_system',
        'protokol',
        'bahasa',
        'database',
        'service_lain',
        'organisasi',
        'kota',
        'provinsi',
        'file_ektp',
        'file_sk',
        'nik_pemohon',
    ];

    public function layanan()
    {
        return $this->belongsTo(LayananAstik::class, 'id_layanan_astik');
    }
}
