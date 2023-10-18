<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
<!-- <link rel="icon" type="image/png" href="{{ asset('storage/assets/img/favicon.png') }}"> -->
<title>Sudin Kominfotik Jakarta Barat</title>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="{{ asset('storage/assets/css/nucleo-icons.css') }}" rel="stylesheet">
<link href="{{ asset('storage/assets/css/nucleo-svg.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<link id="pagestyle" href="{{ asset('storage/assets/css/material-dashboard.css?v=3.0.1') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap-select.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('storage/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('storage/assets/js/plugins/chartjs.min.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('storage/assets/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('storage/assets/js/jq-signature.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body class="g-sidenav-show bg-gray-200">
  @if($page == "Login")
    @include('login')

  @elseif($page == "Net-Ticketing")
    <div class="container p-5">
      @isset($subpage)
        @include('ticketing.navbar')
        @if($subpage == "Home")
          @include('ticketing.batik')
        @elseif($subpage == "Request")
          @include('ticketing.request')
        @elseif($subpage == "Status")
          @include('ticketing.status')
        @endif
      @endisset
    @include('ticketing.footer')
    </div>
  @elseif($page == "Rekrutmen")
    <div class="container p-5 px-0">
      @isset($subpage)
        @include('rekrutmen.navbar')
        @if($subpage == "Form")
          @include('rekrutmen.form')
        @elseif($subpage == "Status")
          @include('rekrutmen.status')
        @endif
      @else
      @include('rekrutmen.landing')
      @endisset
    @include('rekrutmen.footer')
    </div>
  @else
    @include('sidenav')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      @include('header')
      <div class="">
        @if($page == "Dashboard")
          @include('dashboard.dashboard')

        @elseif($page == "Kegiatan")
          @isset($subpage)
            @if($subpage == "List")
              @include('kegiatan.list')
            @elseif($subpage == "Tambah")
              @include('kegiatan.tambah')
            @elseif($subpage == "Edit")
              @include('kegiatan.edit')
            @elseif($subpage == "Validasi")
              @include('kegiatan.validasi')
            @elseif($subpage == "Revisi")
              @include('kegiatan.revisi')
            @endif
          @else
            @include('kegiatan.kegiatan')
          @endisset
          
        @elseif($page == "Absensi")
          @isset($subpage)
            @if($subpage == "List")
              @include('absensi.list')
            @elseif($subpage == "Import")
              @include('absensi.import')
            @elseif($subpage == "WFH")
              @include('absensi.wfh')
            @elseif($subpage == "Libur")
              @include('absensi.libur')
            @elseif($subpage == "Keterangan")
              @include('absensi.keterangan')
            @elseif($subpage == "Validasi")
              @include('absensi.validasi')
            @elseif($subpage == "Unvalidasi")
              @include('absensi.unvalidasi')
            @elseif($subpage == "TambahBonus")
              @include('absensi.tambahbonus')
            @elseif($subpage == "EditBonus")
              @include('absensi.editbonus')
            @elseif($subpage == "Kompensasi")
              @include('absensi.kompensasi')
            @elseif($subpage == "ExportBulanan")
              @include('absensi.export_bulanan')
            @endif
          @else
            @include('absensi.absensi')
          @endisset

        @elseif($page == "Profil")
          @isset($subpage)
            @if($subpage == "View")
              @include('profil.profil')
            @elseif($subpage == "Password")
              @include('profil.password')
            @endif
          @else
            @include('profil.list')
          @endisset

        @elseif($page == "Ticketing")
          @isset($subpage)
            @if($subpage == "Tambah")
              @include('ticketing.tambah')
            @elseif($subpage == "Edit")
              @include('ticketing.edit')
            @elseif($subpage == "Disposisi")
              @include('ticketing.disposisi')
            @elseif($subpage == "Report")
              @include('ticketing.report')
            @elseif($subpage == "EditReport")
              @include('ticketing.edit_report')
            @endif
          @else
            @include('ticketing.list')
          @endisset

        @elseif($page == "Astik")
          @isset($subpage)
            @if($subpage == "Disposisi")
              @include('astik.disposisi')
            @elseif($subpage == "Report")
              @include('astik.report')
            @endif
          @else
            @include('astik.list')
          @endisset

        @elseif($page == "Kip")
          @isset($subpage)
            @if($subpage == "Disposisi")
              @include('kip.disposisi')
            @elseif($subpage == "Report")
              @include('kip.report')
            @endif
          @else
            @include('kip.list')
          @endisset

        @elseif($page == "Barang-Pakai-Habis")
          @isset($subpage)
            @if($subpage == "BarangList")
              @include('inventaris.barang_list')
            @endif
          @endisset

        @elseif($page == "Barang-Aset")
          @isset($subpage)
            @if($subpage == "AsetList")
              @include('inventaris.aset_list')
            @elseif($subpage == "Import")
              @include('inventaris.import_aset')
            @endif
          @endisset
            
        @elseif($page == "Manage-Rekrutmen")
          @include('rekrutmen.list')

        @elseif($page == "Instansi")
          @isset($subpage)
            @if($subpage == "Tambah")
              @include('instansi.tambah')
            @elseif($subpage == "Edit")
              @include('instansi.edit')
            @endif
          @else
            @include('instansi.list')
          @endisset

        @endif
      @include('footer')
    @endif
      </div>
    </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Pengaturan</h5>
          <p>Tentukan tema display sesuai pilihan.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Warna Tombol Menu</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Tema Menu</h6>
          <p class="text-sm">Pilih tema pilihan menu.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Gelap</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparan</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Terang</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">Hanya bisa merubah tema untuk tampilan desktop.</p>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Mode Terang / Gelap</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <hr class="horizontal dark my-sm-4">
      </div>
    </div>
  </div>
  <script src="{{ asset('storage/assets/js/material-dashboard.min.js?v=3.0.1') }}"></script>
  @stack('scripts')
</body>
</html>