<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Laporan Kegiatan Bulanan</h6>
            </div>
            <div class="col-4 text-end px-4">
                @if ($id_role == "3")
                <a href="{{ asset('/kegiatan/tambah') }}"><button type="submit" class="bg-white btn btn-outline-primary mb-0">
                    <i class="material-icons cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Tambah Kegiatan">add</i>
                </button></a>
                @endif
            </div>
        </div>
        </div>
    </div>
    <style>
    .overflow {
        overflow: hidden;
        border-radius: 25px;;
    }
    .zoom {
        margin: 0 auto;
        -webkit-transform: scale(1);
        transform: scale(1);
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .zoom:hover {
        -webkit-transform: scale(1.2);
	    transform: scale(1.2);
    }
    </style>
    
    <div class="card-body px-0 pb-2 mx-0">
        @if (Session::has('success'))
        <div class="row px-3">
            <div class="col-12">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        </div>
        @endif
        <div class="row container">
            <div class="col-12 mb-4">
                <h5 class="mb-1">
                {{ $nama_lengkap }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                {{ $jabatan->nama_jabatan }}
                </p>
            </div>
            <div class="col-12 col-lg-3 mb-4">
                <form role="form" class="text-start">
                    <div class="input-group input-group-outline" style="width:fit-content">
                        <input type="month" class="form-control" name="bulan">
                        <button type="submit" class="btn btn-outline-primary mb-0">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive p-0 table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aktifitas</th>
                    @if($jabatan->id_jabatan == 8)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Judul Berita</th>
                    @else
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rincian Kegiatan</th>
                    @endif
                    @if($jabatan->id_jabatan != 14)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                    @endif
                    @if($jabatan->id_jabatan == 8 || $jabatan->id_jabatan == 14 || $jabatan->id_jabatan == 11)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Link Web</th>
                    @else
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 250px">Dokumentasi</th>
                    @endif
                    @if($jabatan->id_jabatan == 8 || $jabatan->id_jabatan == 11)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    @endif
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Validated</th>
                </tr>
            </thead>
            <tbody>
            @if($kegiatan_kosong == true)
                <tr>
                    <td colspan="8" class="text-center"><p class="text-lg font-weight-bold mt-3 mb-3 ps-3">Data kegiatan tenaga terampil bulan ini masih kosong</p></td>
                </tr>
            @else
                @foreach ($kegiatan as $key => $k)
                <tr>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ $key+1 }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('dddd')}}</p>
                        <p class="text-xs text-secondary mb-0">{{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            {{ \Carbon\Carbon::parse($k->jam_mulai)->isoFormat('HH:mm')}} - 
                            {{ \Carbon\Carbon::parse($k->jam_selesai)->isoFormat('HH:mm')}}
                        </p>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">
                            @php
                            $maxLength = 35;
                            
                            $ruanglingkup = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $k->ruanglingkup->deskripsi, 0, PREG_SPLIT_NO_EMPTY);
                            echo $ruanglingkup_split = implode("<br>",$ruanglingkup);
                            
                            @endphp
                        </p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">
                            @php
                            $maxLength = 35;
                            
                            $deskripsi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $k->deskripsi, 0, PREG_SPLIT_NO_EMPTY);
                            echo $deskripsi_split = implode("<br>",$deskripsi);
                            
                            @endphp
                        </p>
                    </td>
                    @if($jabatan->id_jabatan != 14)
                    <td>
                        <p class="text-xs text-secondary mb-0">
                            @php
                            $maxLength = 35;
                            
                            $lokasi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $k->lokasi, 0, PREG_SPLIT_NO_EMPTY);
                            echo $lokasi_split = implode("<br>",$lokasi);
                            
                            @endphp
                        </p>
                    </td>
                    @endif
                    @if($jabatan->id_jabatan == 8 || $jabatan->id_jabatan == 11)
                    <td>
                        @if($k->link != null)
                        <p class="text-xs text-info mb-0">
                            <a href="{{ $k->link }}" target="_blank">
                                @php
                                $maxLength = 35;
                                
                                $link = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $k->link, 0, PREG_SPLIT_NO_EMPTY);
                                echo $link_split = implode("<br>",$link);
                                
                                @endphp
                            </a>
                        </p>
                        @else
                        <p class="text-xs text-info mb-0">-</p>
                        @endif
                    </td>
                    @endif
                    @if($jabatan->id_jabatan == 14)
                    <td>
                        @if($k->kegiatanlink->instagram != null)
                            <p class="text-xs text-info mb-0"><a href="{{ $k->kegiatanlink->instagram }}" target="_blank">- {{ Str::limit($k->kegiatanlink->instagram, 40) }}</a></p>
                        @endif
                        @if($k->kegiatanlink->facebook != null)
                            <p class="text-xs text-info mb-0"><a href="{{ $k->kegiatanlink->facebook }}" target="_blank">- {{ Str::limit($k->kegiatanlink->facebook, 40) }}</a></p>
                        @endif
                        @if($k->kegiatanlink->twitter != null)
                            <p class="text-xs text-info mb-0"><a href="{{ $k->kegiatanlink->twitter }}" target="_blank">- {{ Str::limit($k->kegiatanlink->twitter, 40) }}</a></p>
                        @endif
                        @if($k->kegiatanlink->youtube != null)
                            <p class="text-xs text-info mb-0"><a href="{{ $k->kegiatanlink->youtube }}" target="_blank">- {{ Str::limit($k->kegiatanlink->youtube, 40) }}</a></p>
                        @endif
                    </td>
                    @endif
                    @if($jabatan->id_jabatan != 14)
                    <td>
                        @if($k->gambar != null)
                        <div class="overflow" style="overflow: hidden;">
                            @if($k->is_from_batik == 1)
                            <img class="zoom" src="{{ asset('/storage/layanan/id/hasil/'.$k->gambar) }}" style="min-width: 250px; max-width: 250px; object-fit: cover;" data-toggle="modal" data-target="#gambarid{{ $k->gambar }}">
                            @else
                            <img class="zoom" src="{{ asset('/storage/images/dokumentasi/'.$k->gambar) }}" style="min-width: 250px; max-width: 250px; object-fit: cover;" data-toggle="modal" data-target="#gambarid{{ $k->gambar }}">
                            @endif
                        </div>
                        <!-- Modal Picture -->
                        <div class="modal fade" id="gambarid{{ $k->gambar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Dokumentasi Kegiatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if($k->is_from_batik == 1)
                                    <img src="{{ asset('/storage/layanan/id/hasil/'.$k->gambar) }}" width="100%">
                                    @else
                                    <img src="{{ asset('/storage/images/dokumentasi/'.$k->gambar) }}" width="100%">
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
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
                    @if ($id_role == "3")
                        <td>
                        @if($k->validated == "N")
                        <a href="{{ asset('/kegiatan/edit/'.$logged_username.'/'.$k->id_kegiatan) }}"><i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">edit</i></a>
                        <button type="button" class="btn-link" data-toggle="modal" data-target="#deleteid{{ $k->id_kegiatan }}"><i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">delete</i></button>
                        
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteid{{ $k->id_kegiatan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                    <form action="{{ asset('/kegiatan/delete/'.$logged_username.'/'.$k->id_kegiatan) }}" method="post"> 
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus Data</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        @elseif($k->validated == "I")
                        <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Revisi: {{ $k->keterangan }}">info</i>
                        @else
                        <i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Validated">check</i>
                        @endif
                        </td>
                    @else
                        <td>
                        @if($k->validated == "Y")
                            <i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Validated">check</i>
                        @elseif($k->validated == "I")
                            <i class="material-icons ms-auto text-warning cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Revisi: {{ $k->keterangan }}">info</i>
                        @else
                            <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Unvalidated">close</i>
                        @endif
                        </td>
                    @endif
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <hr class="mt-0">
        @if($kegiatan_kosong == false)
            @if($disabled_export == false)
            @if($unvalidated == false)
            <div class="ms-3 mb-0">
                <a class="mr-2" href="{{ asset('/kegiatan/export/'.$id_user.'/'.$selected_tahun.'-'.$selected_bulan.'/excel') }}"><button type="button" class="btn bg-gradient-success toast-btn"><i class="material-icons ms-auto cursor-pointer">print</i> Export ke Excel</button></a>
                <!-- <a class="mx-3" href="{{ asset('/kegiatan/export/'.$id_user.'/'.$selected_tahun.'-'.$selected_bulan.'/pdf') }}"><button type="button" class="btn bg-gradient-info toast-btn"><i class="material-icons ms-auto cursor-pointer">print</i> Export ke PDF</button></a> -->
            </div>
            @else
            <button type="button" class="btn bg-gradient-success toast-btn ms-3" data-toggle="modal" data-target="#export_excel"><i class="material-icons ms-auto cursor-pointer">print</i> Export ke Excel</button>
            <!-- Modal Cetak -->
            <div class="modal fade" id="export_excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Peringatan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Anda masih memiliki data kegiatan yang belum divalidasi, data tersebut tidak akan di export ke excel.</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <a href="{{ asset('/kegiatan/export/'.$id_user.'/'.$selected_tahun.'-'.$selected_bulan.'/excel') }}"><button type="submit" class="btn btn-info">Lanjutkan</button></a>
                </div>
                </div>
            </div>
            </div>
            @endif
            @endif
        @endif
        </div>   
    </div>
    </div>
</div>
</div>