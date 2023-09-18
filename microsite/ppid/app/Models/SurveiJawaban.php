<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveiJawaban extends Model
{
    protected $table = "ppid_survei_jawaban";
    protected $primaryKey = 'id_jawaban';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'email',
        'tanggal_lahir',
        'pendidikan_terakhir',
        'pekerjaan',
        'pengajuan_permohonan',
        'jawaban'
    ];
}
