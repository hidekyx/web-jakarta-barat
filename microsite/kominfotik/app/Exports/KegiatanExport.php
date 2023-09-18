<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KegiatanExport implements FromCollection, WithMapping, WithHeadings, WithStyles, WithEvents, WithCustomStartCell
{
    private $row = 1;
    private $kegiatan;
    private $user;
    private $bulan_cetak;
    private $tanggal_sebelumnya;

    public function __construct($kegiatan, $user, $bulan_cetak) {
        $this->kegiatan = $kegiatan;
        $this->user = $user;
        $this->bulan_cetak = $bulan_cetak;
    }

    public function collection() {
        return $this->kegiatan;
    }

    public function map($kegiatan) : array {
        if ($this->user->id_jabatan == 8) {
            $tanggal = Carbon::parse($kegiatan->tanggal)->isoFormat('dddd, D/M/Y');
            if($tanggal == $this->tanggal_sebelumnya) {
                $tanggal = null;
            }
            else {
                $this->tanggal_sebelumnya = $tanggal;
            }
            return [
                $this->row++,
                $tanggal,
                $kegiatan->deskripsi,
                $kegiatan->lokasi,
                $kegiatan->link
            ];
        }
        elseif ($this->user->id_jabatan == 14) {
            $link = array();
            if($kegiatan->kegiatanlink->twitter != null) {
                $link[] = $kegiatan->kegiatanlink->twitter;
            }
            if($kegiatan->kegiatanlink->instagram != null) {
                $link[] = $kegiatan->kegiatanlink->instagram;
            }
            if($kegiatan->kegiatanlink->facebook != null) {
                $link[] = $kegiatan->kegiatanlink->facebook;
            }
            if($kegiatan->kegiatanlink->youtube != null) {
                $link[] = $kegiatan->kegiatanlink->youtube;
            }
            $jumlah = count($link);
            $tanggal = Carbon::parse($kegiatan->tanggal)->isoFormat('dddd, D/M/Y');
            if($tanggal == $this->tanggal_sebelumnya) {
                $tanggal = null;
            }
            else {
                $this->tanggal_sebelumnya = $tanggal;
            }
            for ($i=0; $i < $jumlah; $i++) { 
                if($i == 0) {
                    $branch[$i] = array(
                        $this->row++,
                        $tanggal,
                        $kegiatan->deskripsi,
                        $link[$i]
                    );
                }
                else {
                    $branch[$i] = array (
                        null,
                        null,
                        null,
                        $link[$i]
                    );
                }
            }
            return $branch;
        }
        elseif ($this->user->id_jabatan == 11) {
            $tanggal = Carbon::parse($kegiatan->tanggal)->isoFormat('dddd, D/M/Y');
            if($tanggal == $this->tanggal_sebelumnya) {
                $tanggal = null;
            }
            else {
                $this->tanggal_sebelumnya = $tanggal;
            }
            
            if ($kegiatan->gambar != null) {
                return [
                    $this->row++,
                    $tanggal,
                    $kegiatan->deskripsi,
                    $kegiatan->lokasi
                ];
            }
            elseif ($kegiatan->link != null) {
                return [
                    $this->row++,
                    $tanggal,
                    $kegiatan->deskripsi,
                    $kegiatan->lokasi,
                    $kegiatan->link
                ];
            }
            else {
                return [
                    $this->row++,
                    $tanggal,
                    $kegiatan->deskripsi,
                    $kegiatan->lokasi
                ];
            }
        }
        else {
            $tanggal = Carbon::parse($kegiatan->tanggal)->isoFormat('dddd, D/M/Y');
            if($tanggal == $this->tanggal_sebelumnya) {
                $tanggal = null;
            }
            else {
                $this->tanggal_sebelumnya = $tanggal;
            }
            return [
                $this->row++,
                $tanggal,
                $kegiatan->deskripsi,
                $kegiatan->lokasi
            ];
        }  
    }
 
    public function headings() : array {
        if ($this->user->id_jabatan == 8) { //Reporter
            return [
                'NO',
                'HARI/TANGGAL',
                'JUDUL BERITA',
                'LOKASI',
                'LINK WEB'
             ]; 
        }
        elseif ($this->user->id_jabatan == 14) { //Operator Sosial Media
            return [
                'NO',
                'HARI/TANGGAL',
                'JUDUL PUBLIKASI',
                'LINK'
             ]; 
        }
        elseif ($this->user->id_jabatan == 11) { //Editor
            return [
                'NO',
                'HARI/TANGGAL',
                'DETAIL KEGIATAN',
                'LOKASI',
                'LINK/DOKUMENTASI'
             ];
        }
        else {
            return [
                'NO',
                'HARI/TANGGAL',
                'DETAIL KEGIATAN',
                'LOKASI',
                'DOKUMENTASI'
             ];
        }
    }

    public function startCell(): string
    {
        return 'A10';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $total_row = $event->sheet->getDelegate()->getHighestDataRow();
                for ($i=0; $i <= $total_row; $i++) { 
                    if ($i < 10) {
                        $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(15);
                    }
                    else {
                        if($this->user->id_jabatan != 8 && $this->user->id_jabatan != 11 && $this->user->id_jabatan != 14) {
                            $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(130);
                        }
                    }
                }
                $event->sheet->setCellValue('A1', 'SUKU DINAS KOMUNIKASI INFORMATIKA DAN STATISTIK KOTA ADMINISTRASI JAKARTA BARAT');
                if ($this->user->seksi->id_seksi == 1) {
                    $event->sheet->setCellValue('A2', 'SEKSI INFRASTRUKTUR DIGITAL');
                }
                if ($this->user->seksi->id_seksi == 2) {
                    $event->sheet->setCellValue('A2', 'SEKSI KOMUNIKASI DAN INFORMASI PUBLIK');
                }
                if ($this->user->seksi->id_seksi == 3) {
                    $event->sheet->setCellValue('A2', 'SEKSI APLIKASI SIBER DAN STATISTIK');
                }
                $event->sheet->setCellValue('A3', 'LAPORAN KEGIATAN');
                $event->sheet->setCellValue('A5', 'Nama');
                $event->sheet->setCellValue('A6', 'Bidang / Suku Dinas');
                $event->sheet->setCellValue('A7', 'Pekerjaan');
                $event->sheet->setCellValue('A8', 'Bulan');

                $event->sheet->setCellValue('C5', ': '.$this->user->nama_lengkap);
                $event->sheet->setCellValue('C6', ': '.$this->user->seksi->nama_seksi.' / Kominfotik Jakarta Barat');
                $event->sheet->setCellValue('C7', ': '.$this->user->jabatan->nama_jabatan);
                $event->sheet->setCellValue('C8', ': '.$this->bulan_cetak);
                $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getDelegate()->getStyle('C:D')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle('1:3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('A10:E'.$total_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('C')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $event->sheet->getDelegate()->getStyle('C10')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getRowDimension(10)->setRowHeight(15);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(3);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(20);
                if ($this->user->id_jabatan == 8) {
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(23);
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(35);
                    $event->sheet->getStyle('A10:E'.$total_row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                }
                elseif ($this->user->id_jabatan == 14) {
                    $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(35);
                    $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(35);
                    $event->sheet->getStyle('A10:D'.$total_row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $event->sheet->getDelegate()->getStyle('C2:D'.$total_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                }
                else {
                    $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(39);
                    $event->sheet->getStyle('A10:E'.$total_row)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                }
                
                if ($total_row > 1) {
                    $event->sheet->getDelegate()->getStyle('1:'.$total_row)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER); 
                    $event->sheet->getDelegate()->getStyle('1:'.$total_row)->getFont()->setSize(9);
                    $event->sheet->getDelegate()->getStyle('1:'.$total_row)->getFont()->setName('Arial');
                    $kegiatan = $this->kegiatan;
                    
                    foreach ($kegiatan as $array => $k) {
                        if ($k->gambar != null) {     
                            $drawing[$array] = new Drawing();
                            $drawing[$array]->setPath(public_path('/storage/images/dokumentasi/'.$k->gambar));
                            $drawing[$array]->setOffsetX(10);
                            $drawing[$array]->setOffsetY(10);
                            $drawing[$array]->setWidth(250);
                            $drawing[$array]->setCoordinates('E' . ($array+11));
                            $drawing[$array]->setWorksheet($event->sheet->getDelegate());

                            
                            $width = $drawing[$array]->getWidth();
                            if($width > 250) {
                                $drawing[$array]->setWidth(250);
                            }
                            $height = $drawing[$array]->getHeight();
                            $height = $height - ($height * 15 / 100);
                            $event->sheet->getDelegate()->getRowDimension($array+11)->setRowHeight($height);
                            // dd($drawing);
                        }
                    }
                }
            },  
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1:10')->getFont()->setBold(true);
        if ($this->user->jabatan->id_jabatan == 14) {
            $column = "D";
        }
        else {
            $column = "E";
        }
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
        
        return [
            10 => ['font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFF2F2F2',
                ],
                'endColor' => [
                    'argb' => 'FFF2F2F2',
                ],
            ]]
        ];
    }
}