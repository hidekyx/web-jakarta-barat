<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Dashboard - Website Kewilayahan Jakarta Barat</title>
<meta content="Dashboard Website Kewilayahan | Jakarta Barat" name="description">
<meta content="Dashboard Website Kewilayahan | Jakarta Barat" name="keywords">
<meta content="{{ csrf_token() }}" name="csrf-token">

<!-- Favicons -->
<link rel="icon" type="image/png" href="{{ asset('storage/assets/img/logo.png') }}">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('storage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/vendor/izitoast/css/iziToast.min.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css" rel="stylesheet">
<link href="{{ asset('storage/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
@if($page == "Login")
    @include('dashboard.login')
@else
    @include('dashboard.header')
    @include('dashboard.sidenav')
    @if($page == "Home")
        @include('dashboard.home')
    @elseif($page == "Password")
        @include('dashboard.password_change')
    @elseif($page == "Deskripsi Website")
        @isset($submenu)
            @if($submenu == "Foto Keperluan Website")
                @include('dashboard.menu.deskripsi_foto')
            @elseif($submenu == "Peta Wilayah")
                @include('dashboard.menu.deskripsi_peta')
            @elseif($submenu == "Kontak Wilayah")
                @include('dashboard.menu.deskripsi_kontak')
            @endif
        @endisset
    @elseif($page == "Profil")
        @include('dashboard.menu.profil')
    @elseif($page == "Perangkat")
        @isset($submenu)
            @if($submenu == "Profil Pimpinan")
                @include('dashboard.menu.perangkat_pimpinan')
            @elseif($submenu == "Struktur Organisasi")
                @include('dashboard.menu.perangkat_struktur')
            @elseif($submenu == "Lmk" || $submenu == "Tugas Dan Fungsi")
                @include('dashboard.menu.perangkat')
            @endif
        @endisset
    @elseif($page == "Layanan Publik")
        @isset($submenu)
            @if($submenu == "Create")
                @include('dashboard.menu.layanan_publik_tambah')
            @elseif($submenu == "Edit")
                @include('dashboard.menu.layanan_publik_edit')
            @endif
        @else
            @include('dashboard.menu.layanan_publik_list')
        @endisset
    @elseif($page == "Informasi Wilayah")
        @isset($submenu)
            @if($submenu == "Kalender Kegiatan")
                @include('dashboard.menu.informasi_list')
            @elseif($submenu == "Kalender Kegiatan - Tambah")
                @include('dashboard.menu.informasi_tambah')
            @elseif($submenu == "Kalender Kegiatan - Edit")
                @include('dashboard.menu.informasi_edit')
            @elseif($submenu == "Inovasi Dan Prestasi")
                @include('dashboard.menu.informasi_inovasi')
            @endif
        @endisset
    @elseif($page == "PPID")
        @isset($submenu)
            @if($submenu == "Struktur Ppid")
                @include('dashboard.menu.ppid_struktur')
            @elseif($submenu == "Prosedur Pelayanan Informasi")
                @include('dashboard.menu.ppid_prosedur')
            @elseif($submenu == "Tugas Dan Fungsi Ppid" || $submenu == "Waktu Dan Biaya Layanan Informasi" || $submenu == "Visi Dan Misi Ppid")
                @include('dashboard.menu.ppid')
            @elseif($submenu == "Daftar Informasi Publik")
                @include('dashboard.menu.ppid_informasi_list')
            @elseif($submenu == "Laporan Penyelesaian Ppid")
                @include('dashboard.menu.ppid_laporan_list')
            @elseif($submenu == "Create")
                @include('dashboard.menu.ppid_create')
            @elseif($submenu == "Edit")
                @include('dashboard.menu.ppid_edit')
            @endif
        @endisset
    @endif
    @include('dashboard.footer')
@endif

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<link href="{{ asset('storage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

<script src="{{ asset('storage/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('storage/assets/vendor/izitoast/js/iziToast.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@stack('scripts')

<!-- Template Main JS File -->
<script src="{{ asset('storage/assets/js/main.js') }}"></script>

</body>

</html>