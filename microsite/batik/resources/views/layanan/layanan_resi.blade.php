<!DOCTYPE html>
<html>
<head>
	<title>Kode Resi Layanan Batik - Suku Dinas Kominfotik Jakarta Barat - {{ $layanan->kode_layanan }}</title>
    <!-- <link rel="stylesheet" href="https://barat.jakarta.go.id/kominfotik/storage/assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
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
        .margin_0 {
            margin-bottom: 0px;
            margin-top: 0px;
            padding-bottom: 0px;
            padding-top: 0px;
        }
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
	</style>
    <img style="position: absolute; left: 30px;" src="https://barat.jakarta.go.id/kominfotik/storage/assets/img/lambang-dki-jakarta.png" width="80px">
	<center>
		<h5 style="font-size: 10px;" class="margin_0">PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</h5>
        <h5 style="font-size: 10px;" class="margin_0">DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK</h5>
        <h5 style="font-size: 12px;" class="margin_0 font-weight-bolder">SUKU DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK </h5>
        <h5 style="font-size: 12px;" class="margin_0 font-weight-bolder">KOTA ADMINISTRASI JAKARTA BARAT</h5>
        <p class="margin_0">Jl. Raya Kembangan No. 2, Blok A Lantai 9</p>
        <p class="margin_0">Telepon : (021) 5821756,  Faximile (021) 5825106, Email: kominfotikjb@jakarta.go.id</p>
        <p class="margin_0">J A K A R T A</p>
        <p style="font-size: 9px; position: absolute; top: 85px; right: 30px;" class="margin_0">Kode Pos : 11610</p>
	</center>
    <hr style="height: 1px; background: black;" class="mb-1 mt-1">
    <center>
        <h5 style="font-size: 12px;" class="margin_0 font-weight-bolder">KODE RESI LAYANAN BATIK</h5>
        <h5 style="font-size: 12px;" class="margin_0 font-weight-bolder">SUKU DINAS KOMINFOTIK JAKARTA BARAT</h5>
        <h5 style="font-size: 12px;" class="margin_0 font-weight-bolder">{{ strtoupper($layanan->kategori) }}</h5>
    </center>
    <p class="mt-1">Pada hari <b>{{ \Carbon\Carbon::parse($layanan->tanggal_penerimaan)->isoFormat('dddd')}}</b>, tanggal <b>{{ \Carbon\Carbon::parse($layanan->tanggal_penerimaan)->isoFormat('D')}}</b> bulan <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('MMMM')}}</b> tahun <b>{{ \Carbon\Carbon::parse($layanan->tanggal_penerimaan)->isoFormat('Y')}}</b>, anda telah mengajukan layanan jaringan dengan kategori <b>{{ $layanan->kategori }}</b>.</p>
    <center>
    <p class="mb-2">Kode Layanan anda adalah: </p>
    <div style="border-width:3px; border-style:dotted; padding: 5px; width: 200px; margin:auto;" class="mb-4">
        <h2 class="margin_0">{{ $layanan->kode_layanan }}</h2>
    </div>
    </center>
    <h5 style="font-size: 12px;" class="margin_0">Informasi Pemohon:</h5>
	<table style="padding: 0px 0px 0px 0px; margin-top: 10px; width: 100%;">
        <tr style="border-width: 1px; border-color: #ffffff;">
            <td style="width: 250px;">Nama Pemohon</td>
            <td style="width: 5px;">:</td>
            <td colspan="2">{{ $layanan->nama_pemohon }}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->instansi->nama_instansi }}</td>
        </tr>
        <tr>
            <td>NIP Pemohon</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->nip_pemohon }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->jabatan }}</td>
        </tr>
	</table>
    <p class="mt-1">Kode resi ini dapat anda gunakan untuk mengecek status layanan aplikasi BATIK.</p>
</body>
</html>