<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Validasi Kegiatan Bulanan</h6>
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
        <div class="row container">
            <div class="col-12 col-lg-3 mb-4">
                <form role="form" class="text-start">
                    <div class="input-group input-group-outline">
                        <input type="month" class="form-control" name="bulan">
                        <button type="submit" class="btn btn-outline-primary mb-0">Filter</button>
                    </div>
                </form>
            </div>
            <div class="col-12 mb-4">
                <h5 class="mb-1">
                {{ $user->nama_lengkap }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                {{ $user->jabatan->nama_jabatan }}
                </p>
            </div>
        </div>
        <div class="table-responsive p-0">
        @if (Session::has('success'))
        <div class="row px-3">
            <div class="col">
            <div class="alert alert-success alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
        </div>
        @endif
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="py-0">
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input font-weight-bolder ps-0" type="checkbox" id="selectall" onclick="toggle(this)">
                      <label class="form-check-label text-uppercase text-secondary text-xxs font-weight-bolder ps-1 opacity-7" for="selectall">Validate All</label>
                    </div>
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">Jam</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aktifitas</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rincian Pekerjaan</th>
                    @if($user->jabatan->id_jabatan != 14)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                    @endif
                    @if($jabatan->id_jabatan == 8 || $jabatan->id_jabatan == 14 || $jabatan->id_jabatan == 11)
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Link Web</th>
                    @else
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="width: 250px">Dokumentasi</th>
                    @endif
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Revisi</th>
                </tr>
            </thead>
            <tbody>
            @if($kegiatan_kosong == true)
                <tr>
                    <td colspan="7" class="text-center"><p class="text-lg font-weight-bold mt-3 mb-3 ps-3">Pilih bulan untuk melakukan validasi kegiatan</p></td>
                </tr>
            @else
            <form role="form" class="text-start" action="{{ asset('/kegiatan/generate_validasi/'.$username) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf
                @foreach ($kegiatan as $k)
                <tr>
                    <td class="px-4">
                        <div class="form-check form-check-info text-start ps-0">
                        @if ($k->validated == "Y")
                        <input type="hidden" value="{{ $k->id_kegiatan }}" name="unvalidated[]">
                        <input checked class="form-check-input text-xs font-weight-bolder ps-0" type="checkbox" value="{{ $k->id_kegiatan }}" name="validated[]" id="k_{{ $k->id_kegiatan }}">
                        @else
                        <input class="form-check-input text-xs font-weight-bolder ps-0" type="checkbox" value="{{ $k->id_kegiatan }}" name="validated[]" id="k_{{ $k->id_kegiatan }}">
                        @endif
                        <label class="form-check-label text-uppercase text-secondary text-xxs font-weight-bolder ps-1 opacity-7" for="k_{{ $k->id_kegiatan }}">Validate</label>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('dddd')}}</p>
                        <p class="text-xs text-secondary mb-0 ps-3">{{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-0">
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
                    @if($user->jabatan->id_jabatan != 14)
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
                    @elseif($jabatan->id_jabatan == 14)
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
                    @else
                    <td>
                        @if($k->gambar != null)
                        <div class="overflow" style="overflow: hidden;">
                            <img class="zoom" src="{{ asset('/storage/images/dokumentasi/'.$k->gambar) }}" style="min-width: 250px; max-width: 250px; object-fit: cover;" data-toggle="modal" data-target="#gambarid{{ $k->gambar }}">
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
                                    <img src="{{ asset('/storage/images/dokumentasi/'.$k->gambar) }}" width="100%">
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
                    <td>
                        <p class="text-xs text-secondary mb-0"><a href="{{ asset('/kegiatan/revisi/'.$username.'/'.$k->id_kegiatan) }}"><i class="fas fa-edit text-warning text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Revisi"></i></a> {{ $k->keterangan }}</p>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @if($kegiatan_kosong == false)
        <hr>
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mx-3 my-2 mb-2">Simpan</button>
        </div>
        </form>
        @endif
        </div>        
    </div>
    </div>
</div>
</div>
<script>
    toggle = function(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i] != source)
    checkboxes[i].checked = source.checked;
    }
    }
</script>