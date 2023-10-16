<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AbsensiBulananExport implements WithMultipleSheets
{
    use Exportable;

    private $absensi;
    private $penggajian;
    private $user;
    private $bulan_cetak;
    private $validated;


    public function __construct($absensi, $penggajian, $user, $bulan_cetak, $validated) {
        $this->absensi = $absensi;
        $this->penggajian = $penggajian;
        $this->user = $user;
        $this->bulan_cetak = $bulan_cetak;
        $this->validated = $validated;
    }

    public function sheets(): array
    {
        $sheets = [];

        for ($total_user = 0; $total_user < count($this->user); $total_user++) {
            $sheets = $sheets + [
                $this->user[$total_user]->nama_lengkap => new AbsensiExport(
                    $this->absensi[$total_user], 
                    $this->penggajian[$total_user], 
                    $this->user[$total_user], 
                    $this->bulan_cetak, 
                    $this->validated[$total_user]
                ),
            ];
        }

        return $sheets;
    }
}