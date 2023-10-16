<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AbsensiExport implements FromCollection, WithMapping, WithStyles, WithEvents, WithCustomStartCell, WithTitle
{
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

    public function collection() {
        return $this->absensi;
    }

    public function map($absensi) : array {
        $first_in = $absensi->first_in;
        if($first_in == null) {
            $first_in = "- -";
        }

        $penalty_absen_pagi = $absensi->penalty_absen_pagi;
        if($penalty_absen_pagi == null) {
            $penalty_absen_pagi = "- -";
        }

        $keterangan_absen_pagi = $absensi->keterangan_absen_pagi;
        if($keterangan_absen_pagi == null) {
            $keterangan_absen_pagi = "- -";
        }

        $last_out = $absensi->last_out;
        if($last_out == null) {
            $last_out = "- -";
        }

        $penalty_absen_sore = $absensi->penalty_absen_sore;
        if($penalty_absen_sore == null) {
            $penalty_absen_sore = "- -";
        }

        $keterangan_absen_sore = $absensi->keterangan_absen_sore;
        if($keterangan_absen_sore == null) {
            $keterangan_absen_sore = "- -";
        }

        $status = $absensi->status;
        if($status == null || $status == "Masuk") {
            $status = "- -";
        }

        $keterangan = $absensi->keterangan;
        if($keterangan == null) {
            $keterangan = "- -";
        }
        
        

        return [
            Carbon::parse($absensi->tanggal)->isoFormat('dddd, D/M/Y'),
            $first_in,
            $penalty_absen_pagi,
            $keterangan_absen_pagi,
            $last_out,
            $penalty_absen_sore,
            $keterangan_absen_sore,
            $status,
            $keterangan
        ];
    }

    public function startCell(): string
    {
        return 'A12';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $total_row = $event->sheet->getDelegate()->getHighestDataRow();
                for ($i=0; $i <= $total_row; $i++) { 
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(15);
                }
                $event->sheet->setCellValue('A1', 'SUKU DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK KOTA ADMINISTRASI JAKARTA BARAT');
                if ($this->user->seksi->id_seksi == 1) {
                    $event->sheet->setCellValue('A2', 'SEKSI JARINGAN KOMUNIKASI DATA');
                }
                if ($this->user->seksi->id_seksi == 2) {
                    $event->sheet->setCellValue('A2', 'SEKSI KOMUNIKASI DAN INFORMASI PUBLIK');
                }
                if ($this->user->seksi->id_seksi == 3) {
                    $event->sheet->setCellValue('A2', 'SEKSI SISTEM INFORMASI SIBER DAN SANDI');
                }
                $event->sheet->setCellValue('A10', "HARI/TANGGAL");
                $event->sheet->setCellValue('B10', "ABSENSI PAGI");
                $event->sheet->setCellValue('E10', "ABSENSI SORE");
                $event->sheet->setCellValue('B11', "FIRST IN");
                $event->sheet->setCellValue('C11', "TELAT");
                $event->sheet->setCellValue('D11', "KETERANGAN");
                $event->sheet->setCellValue('E11', "LAST OUT");
                $event->sheet->setCellValue('F11', "PULANG CEPAT");
                $event->sheet->setCellValue('G11', "KETERANGAN");
                $event->sheet->setCellValue('H10', "KETERANGAN TAMBAHAN");
                $event->sheet->setCellValue('H11', "STATUS");
                $event->sheet->setCellValue('I11', "DETAIL");
                $event->sheet->getDelegate()->getStyle('1:3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->setCellValue('A3', 'LAPORAN ABSENSI');
                $event->sheet->setCellValue('A5', 'Nama');
                $event->sheet->setCellValue('A6', 'Bidang / Suku Dinas');
                $event->sheet->setCellValue('A7', 'Pekerjaan');
                $event->sheet->setCellValue('A8', 'Bulan');
                $event->sheet->setCellValue('C5', ': '.$this->user->nama_lengkap);
                $event->sheet->setCellValue('C6', ': '.$this->user->seksi->nama_seksi.' / Kominfotik Jakarta Barat');
                $event->sheet->setCellValue('C7', ': '.$this->user->jabatan->nama_jabatan);
                $event->sheet->setCellValue('C8', ': '.$this->bulan_cetak);
                $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getDelegate()->getStyle('10:11')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('10:11')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getStyle('A10:I'.$total_row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(18);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(14);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(13);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(16);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(16);
                $event->sheet->getDelegate()->getStyle('1:'.$total_row+12)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER); 
                $event->sheet->getDelegate()->getStyle('1:'.$total_row+12)->getFont()->setSize(9);
                $event->sheet->getDelegate()->getStyle('1:'.$total_row+12)->getFont()->setName('Arial');

                $event->sheet->setCellValue('A'.$total_row+2, "Izin");

                if($this->validated == true) {
                    if($this->penggajian->total_izin != null && $this->penggajian->total_izin != 0) {
                        $event->sheet->setCellValue('C'.$total_row+2, ": ".$this->penggajian->total_izin." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+2, "");
                    }
                    
                    $event->sheet->setCellValue('A'.$total_row+3, "Cuti");
                    if($this->penggajian->total_cuti != null && $this->penggajian->total_cuti != 0) {
                        $event->sheet->setCellValue('C'.$total_row+3, ": ".$this->penggajian->total_cuti." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+3, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+4, "Alpha");
                    if($this->penggajian->total_alpha != null && $this->penggajian->total_alpha != 0) {
                        $event->sheet->setCellValue('C'.$total_row+4, ": ".$this->penggajian->total_alpha." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+4, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+5, "Sakit");
                    if($this->penggajian->total_sakit != null && $this->penggajian->total_sakit != 0) {
                        $event->sheet->setCellValue('C'.$total_row+5, ": ".$this->penggajian->total_sakit." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+5, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+6, "Tidak Absen");
                    if($this->penggajian->total_tidak_absen != null && $this->penggajian->total_tidak_absen != 0) {
                        $event->sheet->setCellValue('C'.$total_row+6, ": ".$this->penggajian->total_tidak_absen."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+6, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+7, "Dinas Luar Setengah Hari");
                    if($this->penggajian->total_dinas_luar_setengah != null && $this->penggajian->total_dinas_luar_setengah != 0) {
                        $event->sheet->setCellValue('C'.$total_row+7, ": ".$this->penggajian->total_dinas_luar_setengah."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+7, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+8, "Dinas Luar Penuh");
                    if($this->penggajian->total_dinas_luar_sehari != null && $this->penggajian->total_dinas_luar_sehari != 0) {
                        $event->sheet->setCellValue('C'.$total_row+8, ": ".$this->penggajian->total_dinas_luar_sehari."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+8, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+10, "Total Telat");
                    if($this->penggajian->total_telat != null && $this->penggajian->total_telat != 0) {
                        $event->sheet->setCellValue('C'.$total_row+10, ": ".$this->penggajian->total_telat);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+10, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+11, "Total Pulang Cepat");
                    if($this->penggajian->total_pulang_cepat != null && $this->penggajian->total_pulang_cepat != 0) {
                        $event->sheet->setCellValue('C'.$total_row+11, ": ".$this->penggajian->total_pulang_cepat);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+11, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+12, "Total Telat dan Pulang Cepat");
                    if($this->penggajian->total_telat_dan_pulang_cepat != null && $this->penggajian->total_telat_dan_pulang_cepat != 0) {
                        $event->sheet->setCellValue('C'.$total_row+12, ": ".$this->penggajian->total_telat_dan_pulang_cepat);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+12, "");
                    }
                }
                else {
                    if($this->penggajian['total_izin'] != null && $this->penggajian['total_izin'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+2, ": ".$this->penggajian['total_izin']." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+2, "");
                    }
                    
                    $event->sheet->setCellValue('A'.$total_row+3, "Cuti");
                    if($this->penggajian['total_cuti'] != null && $this->penggajian['total_cuti'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+3, ": ".$this->penggajian['total_cuti']." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+3, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+4, "Alpha");
                    if($this->penggajian['total_alpha'] != null && $this->penggajian['total_alpha'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+4, ": ".$this->penggajian['total_alpha']." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+4, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+5, "Sakit");
                    if($this->penggajian['total_sakit'] != null && $this->penggajian['total_sakit'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+5, ": ".$this->penggajian['total_sakit']." hari");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+5, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+6, "Tidak Absen");
                    if($this->penggajian['total_tidak_absen'] != null && $this->penggajian['total_tidak_absen'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+6, ": ".$this->penggajian['total_tidak_absen']."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+6, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+7, "Dinas Luar Setengah Hari");
                    if($this->penggajian['total_dinas_luar_setengah'] != null && $this->penggajian['total_dinas_luar_setengah'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+7, ": ".$this->penggajian['total_dinas_luar_setengah']."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+7, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+8, "Dinas Luar Penuh");
                    if($this->penggajian['total_dinas_luar_sehari'] != null && $this->penggajian['total_dinas_luar_sehari'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+8, ": ".$this->penggajian['total_dinas_luar_sehari']."x");
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+8, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+10, "Total Telat");
                    if($this->penggajian['total_telat'] != null && $this->penggajian['total_telat'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+10, ": ".$this->penggajian['total_telat']);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+10, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+11, "Total Pulang Cepat");
                    if($this->penggajian['total_pulang_cepat'] != null && $this->penggajian['total_pulang_cepat'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+11, ": ".$this->penggajian['total_pulang_cepat']);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+11, "");
                    }
    
                    $event->sheet->setCellValue('A'.$total_row+12, "Total Telat dan Pulang Cepat");
                    if($this->penggajian['total_penalty'] != null && $this->penggajian['total_penalty'] != 0) {
                        $event->sheet->setCellValue('C'.$total_row+12, ": ".$this->penggajian['total_penalty']);
                    }
                    else {
                        $event->sheet->setCellValue('C'.$total_row+12, "");
                    }
                }

                for ($i = 2; $i <= 12; $i++) { 
                    $event->sheet->getDelegate()->getRowDimension($total_row + $i)->setRowHeight(15);
                    $event->sheet->mergeCells('A'.$total_row + $i.':'.'B'.$total_row + $i);
                    $event->sheet->getStyle('C'.$total_row + $i)->getFont()->setBold(true);
                }
            },  
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1:11')->getFont()->setBold(true);
        $column = "I";
        $sheet->mergeCells('A1:'.$column.'1');
        $sheet->mergeCells('A2:'.$column.'2');
        $sheet->mergeCells('A3:'.$column.'3');
        $sheet->mergeCells('C5:'.$column.'5');
        $sheet->mergeCells('C6:'.$column.'6');
        $sheet->mergeCells('C7:'.$column.'7');
        $sheet->mergeCells('C8:'.$column.'8');
        $sheet->mergeCells('A5:B5');
        $sheet->mergeCells('A6:B6');
        $sheet->mergeCells('A7:B7');
        $sheet->mergeCells('A8:B8');
        $sheet->mergeCells('A10:A11');
        $sheet->mergeCells('B10:D10');
        $sheet->mergeCells('E10:G10');
        $sheet->mergeCells('H10:I10');
    }

    public function title(): string
    {
        return $this->user->nama_lengkap;
    }
}