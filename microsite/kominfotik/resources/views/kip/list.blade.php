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
                                    <option value="Publikasi Media Video dan Grafis">Publikasi Media Video dan Grafis</option>
                                    <option value="Dukungan Komunikasi dan Informasi Publik">Dukungan Komunikasi dan Informasi Publik</option>
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
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kontak Pemohon</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Alamat Kantor</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Surat Permohonan</th>
                    @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data ticketing akan didisposisikan ke pegawai di bawah ini">help</i></th>
                    @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Disposisi <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" title="Data ticketing cukup sekali konfirmasi dari salah satu yang didisposisikan">help</i></th>
                    @endif
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
                        @if($l->kategori == "Publikasi Media Video dan Grafis")
                        <span class="badge w-100 badge-sm bg-gradient-dark">Publikasi Media</span>
                        @elseif($l->kategori == "Dukungan Komunikasi dan Informasi Publik")
                        <span class="badge w-100 badge-sm bg-gradient-secondary">Dukungan KIP</span>
                        @endif
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0"><b>Nama:</b> {{ $l->nama_pemohon }}</p>
                        <p class="text-xs text-secondary mb-0"><b>NIP:</b> {{ $l->nip_pemohon }}</p>
                        <p class="text-xs text-secondary mb-0"><b>Jabatan:</b> {{ $l->jabatan }}</p>
                        <p class="text-xs text-secondary mb-0"><b>No HP:</b> {{ $l->no_hp_pemohon }}</p>
                        @if($l->kategori == "Dukungan Komunikasi dan Informasi Publik")
                            <p class="text-xs text-secondary mb-0"><b>Email:</b> {{ $l->email }}</p>
                        @endif
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                        @php
                        $maxLength = 20;
                        
                        $alamat_kantor = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", strtoupper($l->alamat_kantor), 0, PREG_SPLIT_NO_EMPTY);
                        echo $alamat_kantor_split = implode("<br>",$alamat_kantor);
                        
                        @endphp
                        </p>
                    </td>
                    <td>
                        <a href="{{ asset('/storage/layanan/kip/surat_permohonan/'.$l->surat_permohonan) }}"><button type="button" class="btn btn-sm mb-0 btn-info">Download</button></a>
                    </td>
                    <td>
                        @if($id_role == 2)
                            @php $belum_disposisi = true @endphp
                            @foreach($l->layanan_kip_detail as $index => $ld)
                                @if($ld->id_layanan_kategori == 8)
                                <p class="text-xs font-weight-bold mb-0">{{ $ld->disposisi->nama_lengkap }}</p>
                                @php $belum_disposisi = false @endphp
                                @endif
                            @endforeach
                            @if($l->status == "Belum Disposisi" || $l->status == "Menunggu Respon")
                                @if($belum_disposisi == true)
                                    <a href="{{ asset('/astik/disposisi/'.$l->id_layanan) }}" class="text-xs mb-0"><button class="btn btn-sm btn-warning">Disposisi</button></a>
                                @else
                                    <a href="{{ asset('/astik/disposisi/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah Disposisi">group</i></a>
                                @endif
                            @endif
                        @elseif($id_role == 6)
                        -
                        @else
                        @foreach($l->layanan_kip_detail as $index => $ld)
                            @if($ld->id_layanan_kategori == 8)
                            <p class="text-xs font-weight-bold mb-0">{{ $ld->disposisi->nama_lengkap }}</p>
                            @endif
                        @endforeach
                        @endif
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
                            <a href="{{ asset('/kip/edit/'.$l->id_layanan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
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
                                        <form role="form" class="text-start" action="{{ asset('/kip/delete/'.$l->id_layanan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                            <form role="form" class="text-start" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button class="btn btn-sm btn-primary" type="submit">Kerjakan</button>
                            </form>
                            @endif
                        @elseif($l->status == "Sedang Dikerjakan")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn-link"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Batalkan">cancel</i></button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="{{ asset('/kip/report/'.$l->id_layanan) }}"><button class="btn btn-sm btn-primary" type="submit">Laporkan</button></a>
                            @endif
                        @elseif($l->status == "Menunggu Validasi")
                            @if($logged_user->id_role == 1 || $logged_user->id_role == 2)
                            <form role="form" class="text-start" action="#" method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Validasi</button>
                            </form>
                            @elseif($logged_user->id_role == 3 || $logged_user->id_role == 5)
                            <a href="#"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                            @endif
                        @elseif($l->status == "Selesai")
                        <a href="#"><i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Cetak Berita Acara">print</i></a>
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


