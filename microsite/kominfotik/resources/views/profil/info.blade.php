<div class="row in collapse show" id="info">
    <div class="row">
    <div class="col-12 col-xl-4">
        <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Informasi Pegawai</h6>
        </div>
        <div class="card-body p-3">
            <h6 class="text-uppercase text-xs font-weight-bolder">Bagian Seksi</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ $user->seksi->nama_seksi }}</label>
            <h6 class="text-uppercase text-xs font-weight-bolder">Jenis Pegawai</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ $user->role->nama_role }}</label>
            <h6 class="text-uppercase text-xs font-weight-bolder">Status Kontrak</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ $user->status_kontrak }}</label>
            @if ($logged_profile == true || $id_role != "3")
            <h6 class="text-uppercase text-xs font-weight-bolder">No Kontrak</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ $user->no_kontrak }}</label>
            <h6 class="text-uppercase text-xs font-weight-bolder">Masa Kerja</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ \Carbon\Carbon::parse($user->masa_kerja_awal)->isoFormat('DD MMMM Y')}} - {{ \Carbon\Carbon::parse($user->masa_kerja_akhir)->isoFormat('DD MMMM Y')}} </label>
            @endif
            
        </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
            <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Informasi Pribadi</h6>
            </div>
            <div class="col-md-4 text-end">
            </div>
            </div>
        </div>
        <div class="card-body p-3">
            @if ($logged_profile == true || $id_role != "3")
            <h6 class="text-sm font-weight-bolder">Alamat Rumah</h6>
            <label class="text-body ms-3 w-80 mb-3">{{ $user->alamat }}</label>
            @endif
            <ul class="list-group">
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong> &nbsp; {{ $user->nama_lengkap }}</li>
            @if ($logged_profile == true || $id_role != "3")
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Tanggal Lahir:</strong> &nbsp; {{ \Carbon\Carbon::parse($user->tanggal_lahir)->isoFormat('D MMMM Y')}}</li>
            @endif
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">No Telp:</strong> &nbsp; {{ $user->no_telp }}</li>
            @if ($logged_profile == true || $id_role != "3")
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">NIK:</strong> &nbsp; {{ $user->nik }}</li>
            @endif
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user->email }}</li>
            </ul>
        </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card card-plain h-100">
        <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Pegawai Seksi</h6>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
            @foreach ($pegawai_seksi as $ps)
            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                <div class="avatar me-3">
                <img src="{{ asset('storage/images/foto/'.$ps->foto) }}" alt="kal" class="border-radius-lg shadow">
                </div>
                <div class="d-flex align-items-start flex-column justify-content-center">
                <h6 class="mb-0 text-sm">{{ $ps->nama_lengkap }}</h6>
                <p class="mb-0 text-xs">{{ $ps->jabatan->nama_jabatan }}</p>
                </div>
                <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto" href="{{ asset('/profil/view/'.$ps->username) }}">Lihat</a>
            </li>
            @endforeach
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>