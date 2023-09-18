<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sudin Kominfotik Jakarta Barat</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="{{ asset('storage/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('storage/assets/js/plugins/chartjs.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('storage/assets/js/jq-signature.min.js') }}"></script>



</head>
<body>
    

<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Daftar Layanan Jaringan Masuk</h6>
            </div>
        </div>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2 mx-0">
        <div class="row px-4">
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="text-sm">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('error') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="row container">
            <div class="col-12 col-lg">
                @if ($id_role == 1 || $id_role == 5)
                <a href="{{ asset('/ticketing/tambah') }}"><button class="btn btn-sm btn-info">Tambah Data</button></a>
                @endif
                <div id="cari">
                    <hr class="p-0 w-100">
                    <form role="form" class="text-start">
                    <div class="row">
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Bulan: </h6>
                            <div class="input-group input-group-outline">
                                <input name="bulan" type="month" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Kategori: </h6>
                            <div class="input-group input-group-outline">
                                <select class="selectpicker w-100" title="Pilih Kategori Penanganan" name="kategori">
                                    <option value="Instalasi">Instalasi, Penambahan, dan Penataan Jaringan</option>
                                    <option value="Penanganan">Penanganan Permasalahan Jaringan</option>
                                </select>
                            </div>
                        </div>
                        @if ($id_role == 1 || $id_role == 2 || $id_role == 4)
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm">Disposisi: </h6>
                            <select class="selectpicker w-100" data-size="4" title="Pilih Disposisi" name="disposisi[]" multiple>
                                <optgroup label="Staff">
                                    @foreach ($staff as $s)
                                    <option value="{{ $s->id_user }}">{{ $s->nama_lengkap }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Tenaga Terampil">
                                @foreach ($tenaga_terampil as $tt)
                                    <option value="{{ $tt->id_user }}">{{ $tt->nama_lengkap }}</option>
                                @endforeach
                                </optgroup>
                            </select>
                        </div>

                        @endif
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Instansi: </h6>
                            <div class="input-group input-group-outline">
                                <select class="selectpicker w-100" title="Pilih Instansi" name="instansi" data-live-search="true" data-size="4">
                                    @foreach ($instansi as $i)
                                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- create new column -->
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Kode: </h6>
                            <div class="input-group input-group-outline">
                                <input name="kode" type="text" class="form-control">
                            </div>
                        </div>
                        <!-- create new column end -->
                        
                        <div class="col-lg col-12">
                            <h6 class="text-sm" style="visibility: hidden;">Cari</h6>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="table-responsive p-0">
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kode</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Instansi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kontak</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Jenis Permohonan/Keluhan</th>
                    @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data ticketing akan didisposisikan ke pegawai di bawah ini">help</i></th>
                    @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data ticketing cukup sekali konfirmasi dari salah satu yang didisposisikan">help</i></th>
                    @endif
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Dokumentasi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan as $l)
                <tr>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ \Carbon\Carbon::parse($l->tanggal)->isoFormat('dddd')}}</p>
                        <p class="text-xs mb-0 ps-3">{{ \Carbon\Carbon::parse($l->tanggal)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ strtoupper($l->kode_layanan) }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            @php
                            $maxLength = 20;
                            
                            $instansi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", strtoupper($l->instansi->nama_instansi), 0, PREG_SPLIT_NO_EMPTY);
                            echo $instansi_split = implode("<br>",$instansi);
                            
                            @endphp
                        </p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $l->nama_pemohon }}</p>
                        <p class="text-xs text-secondary mb-0">Kontak: {{ $l->kontak }}</p>
                        @if($l->status == "Selesai" || $l->status == "Menunggu Validasi")
                        <hr class="mt-0 mb-2">
                        <p class="text-xs font-weight-bold mb-0">{{ $l->nama_perwakilan }}</p>
                        <p class="text-xs text-secondary mb-0">NIP: {{ $l->nip_perwakilan }}</p>
                        @endif
                    </td>
                    <td>
                        @if($l->kategori == "Penanganan Permasalahan Jaringan")
                        <span class="badge w-100 badge-sm bg-gradient-secondary">Penanganan</span>
                        @elseif($l->kategori == "Instalasi, Penambahan, dan Penataan Jaringan")
                        <span class="badge w-100 badge-sm bg-gradient-dark">Instalasi</span>
                        @elseif($l->kategori == "Kategori Lainnya")
                        <span class="badge w-100 badge-sm bg-gradient-primary">Lainnya</span>
                        @endif
                    </td>
                    <td>
                        @if($l->kategori == "Kategori Lainnya")
                            <p class="text-xs font-weight-bold mb-0">
                                @php
                                $maxLength = 35;
                                
                                $deskripsi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $l->deskripsi, 0, PREG_SPLIT_NO_EMPTY);
                                echo $deskripsi_split = implode("<br>",$deskripsi);
                                
                                @endphp
                            </p>
                        @else
                            <p class="text-xs font-weight-bold mb-0">{{ $l->cakupan }}</p>
                            @foreach($l->layanan_detail as $index => $ld)
                                @if($ld->id_layanan_kategori == 1)
                                <p class="text-xs mb-0">- 
                                    @php
                                    $maxLength = 35;
                                    
                                    $value = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $ld->value, 0, PREG_SPLIT_NO_EMPTY);
                                    echo $value_split = implode("<br>",$value);
                                    
                                    @endphp
                                </p>
                                @endif
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($id_role == 2)
                            @php $belum_disposisi = true @endphp
                            @foreach($l->layanan_detail as $index => $ld)
                                @if($ld->id_layanan_kategori == 8)
                                <p class="text-xs font-weight-bold mb-0">{{ $ld->disposisi->nama_lengkap }}</p>
                                @php $belum_disposisi = false @endphp
                                @endif
                            @endforeach
                            @if($l->status == "Belum Disposisi" || $l->status == "Menunggu Respon")
                                @if($belum_disposisi == true)
                                    <a href="{{ asset('/ticketing/disposisi/'.$l->id_layanan) }}" class="text-xs mb-0"><button class="btn btn-sm btn-warning">Disposisi</button></a>
                                @else
                                    <a href="{{ asset('/ticketing/disposisi/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Disposisi">group</i></a>
                                @endif
                            @endif
                        @elseif($id_role == 6)
                        -
                        @else
                        @foreach($l->layanan_detail as $index => $ld)
                            @if($ld->id_layanan_kategori == 8)
                            <p class="text-xs font-weight-bold mb-0">{{ $ld->disposisi->nama_lengkap }}</p>
                            @endif
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @if($l->foto_kondisi != null)
                        <button type="button" class="btn-link" data-toggle="modal" data-target="#fotoid{{ $l->id_layanan }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Kondisi">image</i></button>
                        <!-- Modal Picture -->
                        <div class="modal fade" id="fotoid{{ $l->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Foto Kondisi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/storage/layanan/id/kondisi/'.$l->foto_kondisi) }}" width="100%">
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($l->foto_hasil != null)
                        <button type="button" class="btn-link" data-toggle="modal" data-target="#hasilid{{ $l->id_layanan }}"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Hasil">photo</i></button>
                        <!-- Modal Picture -->
                        <div class="modal fade" id="hasilid{{ $l->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Foto Hasil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/storage/layanan/id/hasil/'.$l->foto_hasil) }}" width="100%">
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($l->tanda_tangan != null)
                        <button type="button" class="btn-link" data-toggle="modal" data-target="#ttdid{{ $l->id_layanan }}"><i class="material-icons ms-auto text-primary cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Tanda Tangan">article</i></button>
                        <div class="modal fade" id="ttdid{{ $l->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tanda Tangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/storage/layanan/id/ttd/'.$l->tanda_tangan) }}" width="100%">
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <style>
                        .btn-link {
                            border: none;
                            outline: none;
                            background: none;
                            cursor: pointer;
                            color: #0000EE;
                            padding: 0;
                            text-decoration: underline;
                            font-family: inherit;
                            font-size: inherit;
                        }
                        </style>
                    </td>
                    <td>
                        <!-- <p class="text-xs mb-0">
                            <button class="btn btn-sm mb-0 btn-info" id="tombol-{{ $l->id_layanan }}">Detail</button>
                        </p> -->
                        <button type="button" class="btn btn-sm mb-0 btn-info" data-bs-toggle="modal" data-bs-target="#detail-{{ $l->id_layanan }}">
                            Detail
                        </button>
                        <!-- MODAL -->
                        <div class="modal fade" id="detail-{{ $l->id_layanan }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-white fw-bold text-wrap">DETAIL STATUS</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="min-height: calc(100vh - 210px); overflow-y: auto; overflow-x: hidden; max-height: 100%; position: relative;">
                                <div class="container-fluid" id="detail_status"> 
                                <div class="row">
                                    <h6 class="label-head mb-3 text-primary text-wrap">IDENTITAS PEMOHON</h6>
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Nama</p>
                                            <p id="status_nama_pemohon" class="text-wrap">{{ $l->nama_pemohon }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">No. HP / Email</p>
                                            <p id="status_kontak" class="text-wrap">{{ $l->kontak }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Instansi</p>
                                            <p id="status_instansi" class="text-wrap">
                                                @php
                                                $maxLength = 60;
                                                
                                                $instansi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $l->instansi->nama_instansi, 0, PREG_SPLIT_NO_EMPTY);
                                                echo $instansi_split = implode("<br>",$instansi);
                                                
                                                @endphp
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">    
                                        <div class="mb-3 status_progress">
                                            <p class="label-body mb-0 fw-bold text-wrap">Status</p>
                                            @if($l->status == "Selesai")
                                            <b><span id="status_status" class="text-success text-wrap">{{ $l->status }}</span></b>
                                            <a href="{{ asset('/ticketing/export/'.$l->id_layanan) }}" id="berita_acara" class="text-info">- Cetak Berita Acara</a>
                                            @elseif($l->status == "Menunggu Validasi")
                                            <b><span id="status_status" class="text-primary text-wrap">{{ $l->status }}</span></b>
                                            @elseif($l->status == "Sedang Dikerjakan")
                                            <b><span id="status_status" class="text-info text-wrap">{{ $l->status }}</span></b>
                                            @elseif($l->status == "Menunggu Respon")
                                            <b><span id="status_status" class="text-warning text-wrap">{{ $l->status }}</span></b>
                                            @elseif($l->status == "Belum Disposisi" || $l->status == "Dibatalkan")
                                            <b><span id="status_status" class="text-danger text-wrap">{{ $l->status }}</span></b>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Tanggal Permohonan</p>
                                            <p id="status_tanggal_permohonan text-wrap">{{ \Carbon\Carbon::parse($l->tanggal)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($l->tanggal)->isoFormat('D MMMM Y')}}</p>
                                        </div>
                                        @if($l->status == "Selesai")
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Tanggal Selesai</p>
                                            <p id="status_tanggal_selesai text-wrap">{{ \Carbon\Carbon::parse($l->tanggal_selesai)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($l->tanggal_selesai)->isoFormat('D MMMM Y')}}</p>
                                        </div>
                                        @endif
                                    </div>
                                    <div id="selesai" class="container-fluid">
                                    <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <h6 class="label-head mb-3 text-primary text-wrap">DETAIL LAYANAN</h6>
                                                <div class="mb-3">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Kategori Layanan</p>
                                                    <p id="status_kategori" class="text-secondary text-wrap ">{{ $l->kategori }}</p>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Deskripsi</p>
                                                    <p id="status_deskripsi" class="mb-0 text-wrap">
                                                    {{ $l->deskripsi }}
                                                    </p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_jenis">
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 1)
                                                        <li class="text-wrap">- {{ $ld->value }}</li>
                                                        @endif
                                                    @endforeach
                                                    </ul>
                                                </div>
                                                <div class="mb-3">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Cakupan</p>
                                                    <p id="status_cakupan" class="text-wrap">{{ $l->cakupan }}</p>
                                                </div>
                                                @if($l->kategori == "Penanganan Permasalahan Jaringan")
                                                <div class="mb-3 div-penanganan">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Penanganan Yang Dilakukan</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_penanganan">
                                                    @php $jumlah_penanganan = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 2)
                                                        <li class="text-wrap">- {{ $ld->value }}</li>
                                                        @php $jumlah_penanganan = $jumlah_penanganan + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_penanganan == 0)
                                                    Tidak ada
                                                    @endif
                                                    </ul>
                                                    
                                                </div>
                                                @endif
                                                <div class="mb-3 div-perangkat">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Perangkat Jaringan Yang Ditangani</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_perangkat">
                                                    @php $jumlah_perangkat = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 4)
                                                        <li class="text-wrap">- {{ $ld->value }}</li>
                                                        @php $jumlah_perangkat = $jumlah_perangkat + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_perangkat == 0)
                                                    Tidak ada
                                                    @endif
                                                    </ul>
                                                </div>
                                                <div class="mb-3 div-barang">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Barang Pakai Habis</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_barang">
                                                    @php $jumlah_barang = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 5)
                                                        <li class="text-wrap">- {{ $ld->barang->nama_barang }}: {{ $ld->value_2 }} {{ $ld->barang->satuan }}</li>
                                                        @php $jumlah_barang = $jumlah_barang + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_barang == 0)
                                                    Tidak ada
                                                    @endif
                                                    </ul>
                                                </div>
                                                <div class="mb-3 div-alat-kerja">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Alat Kerja</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_alat">
                                                    @php $jumlah_alat = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 3)
                                                        <li class="text-wrap">- {{ $ld->value }}</li>
                                                        @php $jumlah_alat = $jumlah_alat + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_alat == 0)
                                                    Tidak ada
                                                    @endif
                                                    </ul>
                                                </div>
                                                <div class="mb-3 div-perangkat-kominfotik">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Perangkat Kominfotik</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_perangkat_kominfotik">
                                                    @php $jumlah_perangkat_kominfotik = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 6)
                                                        <li class="text-wrap">- {{ $ld->value }} (S/N: {{ $ld->value_2 }})</li>
                                                        @php $jumlah_perangkat_kominfotik = $jumlah_perangkat_kominfotik + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_perangkat_kominfotik == 0)
                                                    Tidak ada
                                                    @endif
                                                    </ul>
                                                </div>
                                                <div class="mb-3 div-ip">
                                                    <p class="label-body mb-0 fw-bold text-wrap">IP Address Yang Digunakan (Range)</p>
                                                    @if($l->status == "Selesai")
                                                        @if($ld->id_layanan_kategori == 7)
                                                        <p class="text-wrap" id="status_ip">{{ $ld->value }} - {{ $ld->value_2 }}</p>
                                                        @endif
                                                        @else
                                                        Belum ada
                                                    @endif
                                                </div>
                                                <div class="mb-3 div-ringkasan">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Ringkasan Pekerjaan</p>
                                                    @if($l->penjelasan_pekerjaan == null)
                                                    Belum ada
                                                    @else
                                                    <p id="status_ringkasan" class="text-wrap">
                                                    {{ $l->penjelasan_pekerjaan }}
                                                    </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12">    
                                                <h6 class="label-head mb-3 text-primary text-wrap">INFORMASI PERWAKILAN</h6>
                                                <div class="mb-3 div-teknisi">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Teknisi Yang Bertugas</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_teknisi">
                                                    @php $jumlah_teknisi = 0 @endphp
                                                    @foreach($l->layanan_detail as $index => $ld)
                                                        @if($ld->id_layanan_kategori == 8)
                                                        <li class="text-wrap">- {{ $ld->disposisi->nama_lengkap }} (No HP: {{ $ld->disposisi->no_telp }})</li>
                                                        @php $jumlah_teknisi = $jumlah_teknisi + 1 @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($jumlah_teknisi == 0)
                                                    Belum ada
                                                    @endif
                                                    </ul>
                                                </div>
                                                <div class="mb-3 div-perwakilan">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Nama Perwakilan</p>
                                                    @if($l->nama_perwakilan == null)
                                                    Belum ada
                                                    @else
                                                    <p class="text-wrap" id="status_perwakilan">{{ $l->nama_perwakilan }} (NIP: {{ $l->nip_perwakilan }})</p>
                                                    @endif
                                                </div>
                                                @if($l->kategori == "Instalasi, Penambahan, dan Penataan Jaringan")
                                                <div class="mb-3 div-surat">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Surat</p>
                                                        <p class="text-wrap m-0 p-0">No Surat: {{ $l->no_surat}}</p>
                                                        <p class="text-wrap m-0 p-0">Tanggal: {{ $l->tanggal_surat }}</p>
                                                        <p class="text-wrap m-0 p-0">Perihal: {{ $l->perihal_surat }}</p>
                                                    <a class="text-info font-weight-bold mb-2 text-wrap" target="_blank" href="{{ asset('storage/layanan/id/surat/'.$l->file_surat) }}">Download File Surat</a>
                                                </div>
                                                @endif
                                                <div class="mb-3 div-foto-hasil">
                                                    <h6 class="label-head fw-bold text-secondary mb-0 text-wrap">Foto Hasil</h6>
                                                    @if($l->foto_hasil != null)
                                                    <img src="{{ asset('/storage/layanan/id/hasil/'.$l->foto_hasil) }}" id="status_foto_hasil" width="300px" height="250px" class="rounded float-start mb-3 mt-3">
                                                    @else
                                                    <p id="status_foto_hasil_null" class="mt-0 text-wrap">Belum ada</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- MODAL END -->
                    </td>

                    <td>
                        @if($l->status == "Menunggu Respon")
                        <p class="text-xs text-warning font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Sedang Dikerjakan")
                        <p class="text-xs text-info font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Menunggu Validasi")
                        <p class="text-xs text-primary font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Selesai")
                        <p class="text-xs text-success font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Belum Disposisi")
                        <p class="text-xs text-danger font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @endif
                    </td>
                    <td>
                        @if($l->status == "Belum Disposisi")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2 || $logged_user->id_role == 5)
                            <a href="{{ asset('/ticketing/edit/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            <button type="button" class="btn-link" data-toggle="modal" data-target="#deleteid{{ $l->id_layanan }}"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></button>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteid{{ $l->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <span>Anda yakin ingin menghapus data ini?</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark mt-0" data-dismiss="modal">Batalkan</button>
                                        <form role="form" class="text-start" action="{{ asset('/ticketing/delete/'.$l->id_layanan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-0">Hapus Data</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @elseif($l->status == "Menunggu Respon")
                            @if($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <form role="form" class="text-start" action="{{ asset('/ticketing/process/'.$l->id_layanan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button class="btn btn-sm btn-primary" type="submit">Kerjakan</button>
                            </form>
                            @endif
                        @elseif($l->status == "Sedang Dikerjakan")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="{{ asset('/ticketing/cancel/'.$l->id_layanan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn-link"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">cancel</i></button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="{{ asset('/ticketing/report/'.$l->id_layanan) }}"><button class="btn btn-sm btn-primary" type="submit">Laporkan</button></a>
                            @endif
                        @elseif($l->status == "Menunggu Validasi")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="{{ asset('/ticketing/validasi_report/'.$l->id_layanan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Validasi</button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="{{ asset('/ticketing/edit_report/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            @endif
                        @elseif($l->status == "Selesai")
                        <a href="{{ asset('/ticketing/export/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Berita Acara">print</i></a>
                        @endif
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <hr class="mt-0">
        <div class="ml-4">
            {{ $layanan->withQueryString()->links() }}
        </div>
        </div>
    </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('storage/assets/js/material-dashboard.min.js?v=3.0.1') }}"></script>
</body>
</html>


