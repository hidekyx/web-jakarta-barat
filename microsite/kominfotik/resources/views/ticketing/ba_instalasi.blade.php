<!DOCTYPE html>
<html>
<head>
	<title>Berita Acara - Instalasi, Penambahan, dan Penataan Jaringan - {{ $layanan->kode_layanan }}</title>
	<link rel="stylesheet" href="{{ public_path('/storage/assets/css/bootstrap.min.css') }}">
</head>
<body>
	<style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        p {
            font-size: 11px;
        }
	</style>
    <img style="position: absolute; left: 30px;" src="{{ public_path('/storage/assets/img/lambang-dki-jakarta.png') }}" width="80px">
	<center>
		<h5 style="font-size: 11px;" class="mb-0">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</h5>
        <h5 style="font-size: 11px;" class="mb-0">DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">SUKU DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK </h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">KOTA ADMINISTRASI JAKARTA BARAT</h5>
        <p class="mb-0">Jl. Raya Kembangan No. 2, Blok A Lantai 9</p>
        <p class="mb-0">Telepon : (021) 5821756,  Faximile (021) 5825106, Email: kominfotikjb@jakarta.go.id</p>
        <p class="mb-0">J A K A R T A</p>
        <p style="font-size: 9px; position: absolute; top: 91px; right: 30px;" class="mb-0">Kode Pos : 11610</p>
	</center>
    <hr style="height: 1px; background: black;" class="mb-1 mt-1">
    <center>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">BERITA ACARA</h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">INSTALASI, PENAMBAHAN DAN PENATAAN JARINGAN</h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">SUKU DINAS KOMINFOTIK JAKARTA BARAT</h5>
    </center>
    <p class="mt-1">Pada hari <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd')}}</b>, tanggal <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('D')}}</b> bulan <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('MMMM')}}</b> tahun <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('Y')}}</b>, telah dilakukan pemeriksaan dan perbaikan jaringan sebagaimana berikut:</p>
 
	<table style="padding: 0px 0px 0px 0px;" class="table table-sm table-bordered">
        <tr style="border-width: 1px; border-color: #ffffff;">
            <td style="width: 250px;">Nama Pemohon</td>
            <td style="width: 5px;">:</td>
            <td colspan="2">{{ $layanan->nama_pemohon }}</td>
        </tr>
        <tr>
            <td>Instansi/SKPD/UKPD</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->instansi->nama_instansi }}</td>
        </tr>
        <tr>
            <td>Alamat Instansi/SKPD/UKPD</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->alamat }}</td>
        </tr>
        <tr>
            <td>No Telp./HP/email</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->kontak }}</td>
        </tr>
        <tr>
            <td>Jenis permasalahan jaringan</td>
            <td>:</td>
            @if(count($layanan_detail['jenis']) == 0)
            <td colspan="2"></td>
            @else
                @for($i=0; $i < count($layanan_detail['jenis']); $i++)
                <td>
                    <ul style="list-style-type:square;" class="mb-0 pl-3">
                    @foreach($layanan_detail['jenis'][$i] as $ld)
                    <li>{{ $ld }}</li>
                    @endforeach
                    </ul>
                </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>Cakupan permasalahan jaringan   </td>
            <td>:</td>
            <td colspan="2">{{ $layanan->cakupan }}</td>
        </tr>
        @isset($layanan_detail['penanganan'])
        <tr>
            <td>Penanganan yang dilakukan</td>
            <td>:</td>
            @if(count($layanan_detail['penanganan']) == 0)
            <td colspan="2"></td>
            @else
                @for($i=0; $i < count($layanan_detail['penanganan']); $i++)
                <td>
                    <ul style="list-style-type:square;" class="mb-0 pl-3">
                    @foreach($layanan_detail['penanganan'][$i] as $ld)
                    <li>{{ $ld }}</li>
                    @endforeach
                    </ul>
                </td>
                @endfor
            @endif
        @endisset
        </tr>
        <tr>
            <td>Perangkat jaringan yang ditangani</td>
            <td>:</td>
            @if(count($layanan_detail['perangkat']) == 0)
            <td colspan="2"></td>
            @else
                @for($i=0; $i < count($layanan_detail['perangkat']); $i++)
                <td>
                    <ul style="list-style-type:square;" class="mb-0 pl-3">
                    @foreach($layanan_detail['perangkat'][$i] as $ld)
                    <li>{{ $ld }}</li>
                    @endforeach
                    </ul>
                </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>Alat kerja yang dipakai</td>
            <td>:</td>
            @if(count($layanan_detail['alat_kerja']) == 0)
            <td colspan="2"></td>
            @else
                @for($i=0; $i < count($layanan_detail['alat_kerja']); $i++)
                <td>
                    <ul style="list-style-type:square;" class="mb-0 pl-3">
                    @foreach($layanan_detail['alat_kerja'][$i] as $ld)
                    <li>{{ $ld }}</li>
                    @endforeach
                    </ul>
                </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>Barang habis pakai yang digunakan</td>
            <td>:</td>
            @if(count($layanan_detail['barang_habis']) == 0)
            <td colspan="2"></td>
            @else
                @for($i=0; $i < count($layanan_detail['barang_habis']); $i++)
                <td>
                    <ul style="list-style-type:square;" class="mb-0 pl-3">
                    @foreach($layanan_detail['barang_habis'][$i] as $ld)
                    <li>{{ $ld }}</li>
                    @endforeach
                    </ul>
                </td>
                @endfor
            @endif
        </tr>
        <tr>
            <td>Perangkat Kominfotik yg dipasang (jika ada)</td>
            <td>:</td>
            <td colspan="2">
                <ul style="list-style-type:square;" class="mb-0 pl-3">
                @foreach($layanan->layanan_detail as $ld)
                    @if($ld->id_layanan_kategori == 6)
                    <li>Jenis : {{ $ld->value }} (S/N : {{ $ld->value_2 }})</li>
                    @endif
                @endforeach
                </ul>
            </td>
        </tr>
        <tr>
            <td>IP address yang digunakan (range)</td>
            <td>:</td>
            <td colspan="2">
                @foreach($layanan->layanan_detail as $ld)
                    @if($ld->id_layanan_kategori == 7)
                    {{ $ld->value }} - {{ $ld->value_2 }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Deskripsi permasalahan, solusi, dan keterangan</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->penjelasan_pekerjaan }}</td>
        </tr>
        <tr>
            <td>Teknisi yang bertugas</td>
            <td>:</td>
            @for($i=0; $i < count($layanan_detail['disposisi']); $i++)
            <td>
                <ul style="list-style-type:square;" class="mb-0 pl-3">
                @foreach($layanan_detail['disposisi'][$i] as $ld)
                <li>{{ $ld }}</li>
                @endforeach
                </ul>
            </td>
            @endfor
        </tr>
	</table>
    <table class="table table-borderless" style="margin-top: 0;">
        <tr>
            <td style="text-align: center;">Perwakilan SKPD/UKPD,</td>
            @if($layanan->user->id_role == 5)
            <td style="text-align: center;">Pelaksana,</td>
            @elseif($layanan->user->id_role == 3)
            <td style="text-align: center;">Tenaga Terampil,</td>
            @endif
            <td style="text-align: center;">Mengetahui,<br>Kepala Seksi Jaringan Komunikasi<br>Data Sudiskominfotik Jakarta Barat,</td>
        </tr>
        <tr align="center">
            <td><img src="{{ public_path('/storage/images/layanan/ttd/'.$layanan->tanda_tangan) }}" width="200px"></td>
            <td><img src="{{ public_path('/storage/images/layanan/ttd/'.$layanan->user->id_user.'.png') }}" width="100px"></td>
            <td><img src="{{ public_path('/storage/images/layanan/ttd/'.$kepala_seksi->id_user.'.png') }}" width="100px"></td>
        </tr>
        <tr>
            <td style="text-align: center;">{{ $layanan->nama_perwakilan }}<br>NIP {{ $layanan->nip_perwakilan }}</td>
            @if($layanan->user->id_role == 5)
            <td style="text-align: center;">{{ $layanan->user->nama_lengkap }}<br>NIP {{ $layanan->user->nik }}</td>
            @elseif($layanan->user->id_role == 3)
            <td style="text-align: center;">{{ $layanan->user->nama_lengkap }}</td>
            @endif
            <td style="text-align: center;">{{ $kepala_seksi->nama_lengkap }}<br>NIP {{ $kepala_seksi->nik }}</td>
        </tr>
    </table>
</body>
</html>

		

