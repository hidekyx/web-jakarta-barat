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
                <h6 class="text-white text-capitalize ps-3">Layanan Batik - Aplikasi Siber dan Statistik</h6>
            </div>
        </div>
        </div>
    </div>
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
                                    <option value="Kontra Penginderaan">Kontra Penginderaan</option>
                                    <option value="Pengamanan Sinyal">Pengamanan Sinyal</option>
                                    <option value="Instalasi Antivirus">Instalasi Antivirus</option>
                                    <option value="Penetration Testing">Penetration Testing</option>
                                    <option value="Optimalisasi Komputer / Laptop">Optimalisasi Komputer / Laptop</option>
                                    <option value="Pemulihan Akun Pemerintahan Yang Diretas">Pemulihan Akun Pemerintahan Yang Diretas</option>
                                    <option value="Sertifikat Elektronik">Sertifikat Elektronik</option>
                                    <option value="Permohonan Email">Permohonan Email</option>
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
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Kode: </h6>
                            <div class="input-group input-group-outline">
                                <input name="kode" type="text" class="form-control">
                            </div>
                        </div>
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
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kontak Pemohon</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kontak Narahubung</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Surat Permohonan</th>
                    @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data layanan akan didisposisikan ke pegawai di bawah ini">help</i></th>
                    @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data layanan cukup sekali konfirmasi dari salah satu yang didisposisikan">help</i></th>
                    @endif
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanan as $l)
                <tr>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ \Carbon\Carbon::parse($l->tanggal_penerimaan)->isoFormat('dddd')}}</p>
                        <p class="text-xs mb-0 ps-3">{{ \Carbon\Carbon::parse($l->tanggal_penerimaan)->isoFormat('D MMMM Y')}}</p>
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
                        @if($l->kategori == "Kontra Penginderaan")
                        <span class="badge w-100 badge-sm bg-gradient-primary">Kontra Penginderaan</span>
                        @elseif($l->kategori == "Pengamanan Sinyal")
                        <span class="badge w-100 badge-sm bg-gradient-secondary">Pengamanan Sinyal</span>
                        @elseif($l->kategori == "Instalasi Antivirus")
                        <span class="badge w-100 badge-sm bg-gradient-dark">Instalasi Antivirus</span>
                        @elseif($l->kategori == "Penetration Testing")
                        <span class="badge w-100 badge-sm bg-gradient-success">Penetration Testing</span>
                        @elseif($l->kategori == "Optimalisasi Komputer / Laptop")
                        <span class="badge w-100 badge-sm bg-gradient-warning">Optimalisasi Komputer</span>
                        @elseif($l->kategori == "Pemulihan Akun Pemerintahan Yang Diretas")
                        <span class="badge w-100 badge-sm bg-gradient-info">Pemulihan Akun</span>
                        @elseif($l->kategori == "Sertifikat Elektronik")
                        <span class="badge w-100 badge-sm bg-gradient-danger">Sertifikat Elektronik</span>
                        @elseif($l->kategori == "Permohonan Email")
                        <span class="badge w-100 badge-sm bg-gradient-secondary">Permohonan Email</span>
                        @endif
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0"><b>Nama:</b> {{ $l->nama_pemohon }}</p>
                        <p class="text-xs text-secondary mb-0"><b>NIP:</b> {{ $l->nip_pemohon }}</p>
                        <p class="text-xs text-secondary mb-0"><b>Jabatan:</b> {{ $l->jabatan }}</p>
                        @if($l->kategori == "Instalasi Antivirus" || $l->kategori == "Optimalisasi Komputer / Laptop" || $l->kategori == "Pemulihan Akun Pemerintahan Yang Diretas" || $l->kategori == "Permohonan Email")
                            <p class="text-xs text-secondary mb-0"><b>No HP:</b> {{ $l->no_hp_pemohon }}</p>
                            <p class="text-xs text-secondary mb-0"><b>Email:</b> {{ $l->email }}</p>
                        @endif
                    </td>
                    <td>
                        @if($l->kategori == "Penetration Testing" || $l->kategori == "Permohonan Email" || $l->kategori == "Sertifikat Elektronik")
                        -
                        @else
                        <p class="text-xs text-secondary mb-0"><b>Nama:</b> {{ $l->nama_narahubung }}</p>
                        <p class="text-xs text-secondary mb-0"><b>No HP:</b> {{ $l->no_hp_narahubung }}</p>
                        @endif
                    </td>
                    <td>
                        @if($l->surat_permohonan)
                        <a href="{{ asset('/storage/layanan/astik/surat_permohonan/'.$l->surat_permohonan) }}"><button type="button" class="btn btn-sm mb-0 btn-info">Download</button></a>
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            @if($l->status == "Belum Disposisi")
                                <a href="{{ asset('/astik/disposisi/'.$l->id_layanan_astik) }}" class="text-xs mb-0"><button class="btn btn-sm mb-0 btn-warning">Disposisi</button></a>
                            @else
                                @foreach($l->layanan_astik_disposisi as $ld)
                                    <p class="text-xs font-weight-bold mb-0">{{ $ld->user->nama_lengkap }}</p>
                                @endforeach
                                @if($l->status == "Menunggu Respon")
                                    <a href="{{ asset('/astik/disposisi/'.$l->id_layanan_astik) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Disposisi">group</i></a>
                                @endif
                            @endif
                        @else
                            @foreach($l->layanan_astik_disposisi as $ld)
                                <p class="text-xs font-weight-bold mb-0">{{ $ld->user->nama_lengkap }}</p>
                            @endforeach
                        @endif
                    </td>

                    <td>
                        <button type="button" class="btn btn-sm mb-0 btn-primary" data-bs-toggle="modal" data-bs-target="#detail-{{ $l->id_layanan_astik }}">Detail</button>
                        <div class="modal fade" id="detail-{{ $l->id_layanan_astik }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-white fw-bold text-wrap">DETAIL STATUS - {{ $l->kode_layanan }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="min-height: calc(100vh - 210px); overflow-y: auto; overflow-x: hidden; max-height: 100%; position: relative;">
                                <div class="container-fluid" id="detail_status"> 
                                <div class="row">
                                    <h6 class="label-head mb-3 text-primary text-wrap">IDENTITAS KONTAK</h6>
                                    <div class="col-lg-6 col-12">
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Nama Pemohon</p>
                                            @if($l->nama_pemohon)
                                            <p class="text-wrap">{{ $l->nama_pemohon }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">NIP Pemohon</p>
                                            @if($l->nip_pemohon)
                                            <p class="text-wrap">{{ $l->nip_pemohon }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Jabatan Pemohon</p>
                                            @if($l->jabatan)
                                            <p class="text-wrap">{{ $l->jabatan }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">No HP Pemohon</p>
                                            @if($l->no_hp_pemohon)
                                            <p class="text-wrap">{{ $l->no_hp_pemohon }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Email</p>
                                            @if($l->email)
                                            <p class="text-wrap">{{ $l->email }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Instansi</p>
                                            <p class="text-wrap">
                                                @php
                                                $maxLength = 60;
                                                
                                                $instansi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $l->instansi->nama_instansi, 0, PREG_SPLIT_NO_EMPTY);
                                                echo $instansi_split = implode("<br>",$instansi);
                                                
                                                @endphp
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Alamat Kantor</p>
                                            @if($l->email)
                                            <p class="text-wrap">
                                                @php
                                                $maxLength = 60;
                                                
                                                $alamat_kantor = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $l->alamat_kantor, 0, PREG_SPLIT_NO_EMPTY);
                                                echo $alamat_kantor_split = implode("<br>",$alamat_kantor);
                                                
                                                @endphp
                                            </p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
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
                                            <p class="label-body mb-0 fw-bold text-wrap">Surat Permohonan</p>
                                            @if($l->surat_permohonan)
                                            <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/surat_permohonan/'.$l->surat_permohonan) }}">Lihat Surat Permohonan</a>
                                            @else
                                            -
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Tanggal Permohonan</p>
                                            <p id="status_tanggal_permohonan text-wrap">{{ \Carbon\Carbon::parse($l->tanggal_penerimaan)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($l->tanggal_penerimaan)->isoFormat('D MMMM Y')}}</p>
                                        </div>
                                        @if($l->tanggal_proses)
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Tanggal Proses</p>
                                            <p id="status_tanggal_permohonan text-wrap">{{ \Carbon\Carbon::parse($l->tanggal_proses)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($l->tanggal_proses)->isoFormat('D MMMM Y')}}</p>
                                        </div>
                                        @endif
                                        @if($l->status == "Selesai")
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Tanggal Selesai</p>
                                            <p id="status_tanggal_selesai text-wrap">{{ \Carbon\Carbon::parse($l->tanggal_selesai)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($l->tanggal_selesai)->isoFormat('D MMMM Y')}}</p>
                                        </div>
                                        @endif
                                        <hr>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">Nama Narahubung</p>
                                            @if($l->nama_narahubung)
                                            <p class="text-wrap">{{ $l->nama_narahubung }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <p class="label-body mb-0 fw-bold text-wrap">No HP Narahubung</p>
                                            @if($l->no_hp_narahubung)
                                            <p class="text-wrap">{{ $l->no_hp_narahubung }}</p>
                                            @else
                                            <p class="text-wrap">-</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="selesai" class="container-fluid">
                                    <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <h6 class="label-head mb-3 text-primary text-wrap">DETAIL LAYANAN</h6>
                                                <div class="mb-3">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Kategori Layanan</p>
                                                    <p class="text-secondary text-wrap ">{{ $l->kategori }}</p>
                                                </div>
                                                @if($l->kategori == "Kontra Penginderaan")
                                                <div id="kontra_penginderaan">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Waktu Pelaksanaan</p>
                                                        <p class="mb-0 text-wrap">
                                                        {{ \Carbon\Carbon::parse($l->layanan_astik_detail->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y')}} 
                                                        <br>
                                                        Jam: {{ \Carbon\Carbon::parse($l->layanan_astik_detail->waktu_mulai)->isoFormat('H:m')}}
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Lokasi Pelaksanaan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->lokasi_pelaksanaan }}</p>
                                                    </div>
                                                </div>
                                                @elseif($l->kategori == "Pengamanan Sinyal")
                                                <div id="pengamanan_sinyal">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Waktu Pelaksanaan</p>
                                                        <p class="mb-0 text-wrap">
                                                        {{ \Carbon\Carbon::parse($l->layanan_astik_detail->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y')}} 
                                                        <br>
                                                        Jam: {{ \Carbon\Carbon::parse($l->layanan_astik_detail->waktu_mulai)->isoFormat('H:m')}} - {{ \Carbon\Carbon::parse($l->layanan_astik_detail->waktu_selesai)->isoFormat('H:m')}}
                                                        </p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Lokasi Pelaksanaan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->lokasi_pelaksanaan }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Jammer Sinyal</p>
                                                        <p class="mb-0 text-wrap">
                                                        @foreach(explode("|", $l->layanan_astik_detail->jammer_sinyal) as $js)
                                                        - {{ $js }}
                                                        <br>
                                                        @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                                @elseif($l->kategori == "Penetration Testing")
                                                <div id="penetration_testing">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Nama Domain</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->nama_domain }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Jenis Web</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->jenis_web }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Fungsi Web</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->fungsi_web }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Lokasi Server</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->lokasi_server }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">IP Address</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->ip_address }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Port Yang Digunakan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->port }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Sistem Operasi</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->operating_system }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Protokol</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->protokol }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Bahasa Pemrograman</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->bahasa }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Database</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->database }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Service Lain Yang Digunakan</p>
                                                        <p class="mb-0 text-wrap">
                                                        @if($l->layanan_astik_detail->service)
                                                        {{ $l->layanan_astik_detail->service }}
                                                        @else
                                                        -
                                                        @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                @elseif($l->kategori == "Optimalisasi Komputer / Laptop")
                                                <div id="optimalisasi_komputer">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Penjelasan Permasalahan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->penjelasan }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Perangkat</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->perangkat }}</p>
                                                    </div>
                                                </div>
                                                @elseif($l->kategori == "Pemulihan Akun Pemerintahan Yang Diretas")
                                                <div id="pemulihan_akun">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Penjelasan Permasalahan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->penjelasan }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Seksi/SubBag/Satpel</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->seksi }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Bidang/Unit/Bagian</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->bidang }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Perangkat Daerah</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->perangkat_daerah }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Jenis Akun</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->jenis_akun }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Target Akun/Nomor Yang Dipulihkan</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->target_akun }}</p>
                                                    </div>
                                                </div>
                                                @elseif($l->kategori == "Sertifikat Elektronik")
                                                <div id="sertifikat_elektronik">
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">NIK Pemohon</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->nik_pemohon }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Organisasi</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->organisasi }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Kota</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->kota }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Provinsi</p>
                                                        <p class="mb-0 text-wrap">{{ $l->layanan_astik_detail->provinsi }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">File E-KTP</p>
                                                        <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/ektp/'.$l->layanan_astik_detail->file_ektp) }}">Lihat File E-KTP</a>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">File SK Jabatan/SK Penempatan</p>
                                                        <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/sk/'.$l->layanan_astik_detail->file_sk) }}">Lihat File SK Jabatan/SK Penempatan</a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 col-12">    
                                                <h6 class="label-head mb-3 text-primary text-wrap">INFORMASI PERWAKILAN</h6>
                                                <div class="mb-3">
                                                    <p class="label-body mb-0 fw-bold text-wrap">Tenaga Yang Bertugas</p>
                                                    <ul class="text-wrap" style="padding: 0; list-style-type: none;">
                                                        @if($l->status == "Belum Disposisi")
                                                            <li class="text-wrap">-</li>
                                                        @else
                                                            @foreach($l->layanan_astik_disposisi as $ld)
                                                                <li class="text-wrap">{{ $ld->user->nama_lengkap }} - (No HP: {{ $ld->user->no_telp }})</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                <h6 class="label-head mb-3 text-primary text-wrap">PENYELESAIAN LAYANAN</h6>
                                                <div class="mb-3">
                                                    <h6 class="label-head fw-bold text-secondary mb-0 text-wrap">Laporan/Ringkasan Penyelesaian</h6>
                                                    @if($l->hasil_text != null)
                                                    <p class="mt-0 text-wrap text-justify">{{ $l->hasil_text }}</p>
                                                    @else
                                                    <p class="mt-0 text-wrap">-</p>
                                                    @endif
                                                </div>
                                                @if($l->hasil_file != null)
                                                <div class="mb-3">
                                                    <h6 class="label-head fw-bold text-secondary mb-0 text-wrap">Laporan File PDF</h6>
                                                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/hasil_file/'.$l->hasil_file) }}">Lihat Laporan File PDF</a>
                                                </div>
                                                @endif
                                                <div class="mb-3">
                                                    <h6 class="label-head fw-bold text-secondary mb-0 text-wrap">Dokumentasi Hasil</h6>
                                                    @if($l->hasil_image != null)
                                                    <img src="{{ asset('/storage/layanan/astik/hasil_image/'.$l->hasil_image) }}" width="300px" height="250px" style="object-fit: cover;" class="rounded float-start mb-3 mt-3" alt="Dokumentasi Hasil">
                                                    @else
                                                    <p class="mt-0 text-wrap">-</p>
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
                    </td>

                    <td>
                        @if($l->status == "Belum Disposisi")
                        <p class="text-xs text-danger font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Menunggu Respon")
                        <p class="text-xs text-warning font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Sedang Dikerjakan")
                        <p class="text-xs text-info font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Menunggu Validasi")
                        <p class="text-xs text-primary font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @elseif($l->status == "Selesai")
                        <p class="text-xs text-success font-weight-bold mb-0">{{ strtoupper($l->status) }}</p>
                        @endif
                    </td>
                    <td>
                        @if($l->status == "Belum Disposisi")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2 || $logged_user->id_role == 5)
                            <button type="button" class="btn-link" data-toggle="modal" data-target="#deleteid{{ $l->id_layanan_astik }}"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></button>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteid{{ $l->id_layanan_astik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                        <form role="form" class="text-start" action="{{ asset('/astik/delete/'.$l->id_layanan_astik) }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                            <form role="form" class="text-start" action="{{ asset('/astik/process/'.$l->id_layanan_astik) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button class="btn btn-sm btn-primary mb-0" type="submit">Kerjakan</button>
                            </form>
                            @endif
                        @elseif($l->status == "Sedang Dikerjakan")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="{{ asset('/astik/cancel/'.$l->id_layanan_astik) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn-link"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">cancel</i></button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="{{ asset('/astik/report/'.$l->id_layanan_astik) }}"><button class="btn btn-sm btn-primary mb-0" type="submit">Laporkan</button></a>
                            @endif
                        @elseif($l->status == "Menunggu Validasi")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="{{ asset('/astik/validasi_report/'.$l->id_layanan_astik) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Validasi</button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="{{ asset('/astik/edit_report/'.$l->id_layanan_astik) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            @endif
                        @elseif($l->status == "Selesai")
                        <!-- <a href="#"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Berita Acara">print</i></a> -->
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


