<?php

namespace App\Imports;

use App\Models\Inventaris;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AsetImport implements ToModel, WithHeadingRow
{   
    public function model(array $row)
    {   
        $tanggal_perolehan = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgloleh']))->format('Y-m-d');
        if($row['merk'] == "--") { $row['merk'] = null; }
        if($row['tipe'] == "--") { $row['tipe'] = null; }
        if($row['tgl_bpkb_tgl_dok'] == "--") { $tanggal_bpkb = null; }
            else { $tanggal_bpkb = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgloleh']))->format('Y-m-d'); } 

        if($row['no_chasisno_rangka'] == "--") { $row['no_chasisno_rangka'] = null; }
        if($row['no_mesinno_pabrik'] == "--") { $row['no_mesinno_pabrik'] = null; }
        if($row['nomor_polisi'] == "--") { $row['nomor_polisi'] = null; }
        if($row['seksi'] == "ID") { 
            $seksi = 1;
        }
        if($row['seksi'] == "KIP") { 
            $seksi = 2;
        }
        if($row['seksi'] == "ASTIK") { 
            $seksi = 3;
        }
        if($row['seksi'] == "TU") { 
            $seksi = 4;
        }
    
        return new Inventaris([
            'id_seksi'           => $seksi,
            'kode_barang_aset'   => $row['kobar'],
            'no_registrasi'      => $row['reg'],
            'satuan'             => $row['satuan'],
            'tanggal_perolehan'  => $tanggal_perolehan,
            'bahan'              => $row['bahan'],
            'merk'               => $row['merk'],
            'tipe'               => $row['tipe'],
            'tanggal_bpkb'       => $tanggal_bpkb,
            'no_rangka'          => $row['no_chasisno_rangka'],
            'no_mesin'           => $row['no_mesinno_pabrik'],
            'no_polisi'          => $row['nomor_polisi'],
            'asal_perolehan'     => $row['asal_oleh'],
            'harga'              => $row['harga_rp'],
            'sk_penggunaan'      => "Subag",
            'kondisi_aset'       => "Baik",
            'status_aset'        => "Tersedia"
        ]);
    }
}
