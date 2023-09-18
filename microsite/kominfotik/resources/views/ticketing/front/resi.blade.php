<!DOCTYPE html>
<html>
<head>
	<title>Kode Resi Layanan Batik - Suku Dinas Kominfotik Jakarta Barat - {{ $layanan->kode_layanan }}</title>
    <link rel="stylesheet" href="https://barat.jakarta.go.id/kominfotik/storage/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <img style="position: absolute; left: 30px;" src="https://barat.jakarta.go.id/kominfotik/storage/assets/img/lambang-dki-jakarta.png" width="80px">
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
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">KODE RESI LAYANAN BATIK</h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">SUKU DINAS KOMINFOTIK JAKARTA BARAT</h5>
        <h5 style="font-size: 12px;" class="mb-0 font-weight-bolder">{{ strtoupper($layanan->kategori) }}</h5>
    </center>
    <p class="mt-1">Pada hari <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd')}}</b>, tanggal <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('D')}}</b> bulan <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('MMMM')}}</b> tahun <b>{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('Y')}}</b>, anda telah mengajukan layanan jaringan dengan kategori <b>{{ $layanan->kategori }}</b>.</p>
    <center>
    <p class="mb-2">Kode Layanan anda adalah: </p>
    <div style="border-width:3px; border-style:dotted; padding: 5px; width: 200px; margin:auto;" class="mb-4">
        <h2 class="mb-0">{{ $layanan->kode_layanan }}</h2>
    </div>
    </center>
    <h6>Informasi Pemohon:</h6>
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
            <td colspan="2">{{ $layanan->instansi->nama_instansi }}</td>
        </tr>
        <tr>
            <td>No Telp./HP/email</td>
            <td>:</td>
            <td colspan="2">{{ $layanan->kontak }}</td>
        </tr>
        <tr>
            <td>Cakupan permasalahan jaringan   </td>
            <td>:</td>
            <td colspan="2">{{ $layanan->cakupan }}</td>
        </tr>
	</table>
    <p class="mt-1">Kode resi ini dapat anda gunakan untuk mengecek status layanan aplikasi BATIK melalui link<a href="https://barat.jakarta.go.id/batik/#status" target="_blank">di sini</a>.</p>
</body>
</html>

		

