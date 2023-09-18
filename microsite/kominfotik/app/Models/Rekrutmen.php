<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekrutmen extends Model
{
    protected $table = "rekrutmen";
    protected $primaryKey = 'id_rekrutmen';
    public $timestamps = false;
    protected $fillable = [
        'nama_lengkap',
        'posisi',
        'nik',
        'email',
        'alamat',
        'no_telp',
        'tanggal_lahir',
        'scan_surat_lamaran_kerja',
        'scan_daftar_riwayat_hidup',
        'scan_ktp',
        'scan_npwp',
        'scan_ijazah',
        'scan_sertifikat_pendukung',
        'scan_surat_pengalaman_kerja',
        'scan_sim',
        'scan_sertifikat_vaksin',
        'scan_skck',
        'scan_keterangan_sehat',
        'status',
        'portofolio',
        'tanggal_submit',
        'status',
        'periode'
    ];

    public function persyaratan()
    {
        return $this->hasMany(RekrutmenPersyaratan::class, 'id_user');
    }
}
