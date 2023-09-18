@if ($id_role == "2")
<div class="col-md-6 mb-4">
<div class="card mb-4 h-100">
<div class="card-header pb-0 px-3">
    <div class="row">
    <div class="col-md-6">
        <h6 class="mb-0">Status Import Data Tenaga Terampil </h6>
    </div>
    <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
        <i class="material-icons me-2 text-lg">date_range</i>
        <small>{{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}</small>
    </div>
    </div>
</div>
<div class="card-body pt-4 p-3 mb-0">
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Data Absensi - {{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}</h6>
    <ul class="list-group">
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
        <div class="d-flex align-items-center">
        @if ($imported_absen == true)
        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">check</i></button>
        @else
        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">close</i></button>
        @endif
        <div class="d-flex flex-column">
            <h6 class="mb-1 text-dark text-sm">{{ $seksi->nama_seksi }}</h6>
            @if ($waktu_import_absen != null)
            <p class="text-secondary font-weight-bold text-xs mb-0">{{ \Carbon\Carbon::parse($waktu_import_absen)->isoFormat('D MMMM Y')}} - Jam {{ \Carbon\Carbon::parse($waktu_import_absen)->isoFormat('HH:mm')}}</p>
            @else
            <p class="text-secondary font-weight-bold text-xs mb-0">- -</p>
            @endif
        </div>
        </div>
        @if ($imported_absen == true)
        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">Sudah Import</div>
        @else
        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">Belum Import</div>
        @endif
    </li>
    </ul>
</div>
</div>
</div>
@endif

@if ($id_role == "1")
<div class="col-md-6 mb-4">
<div class="card mb-4 h-100">
<div class="card-header pb-0 px-3">
    <div class="row">
    <div class="col-md-6">
        <h6 class="mb-0">Status Validasi Data Tenaga Terampil</h6>
    </div>
    <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
        <i class="material-icons me-2 text-lg">date_range</i>
        <small>{{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}</small>
    </div>
    </div>
</div>
<div class="card-body pt-4 p-3 mb-0">
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Data Absensi - {{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}</h6>
    <ul class="list-group">
    @foreach ($seksi as $s)
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
        <div class="d-flex align-items-center">
        @if ($validated_absen != null)
        @if ($validated_absen[$s->id_seksi - 1] == true)
        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">check</i></button>
        @else
        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">close</i></button>
        @endif
        <div class="d-flex flex-column">
            <h6 class="mb-1 text-dark text-sm">{{ $s->nama_seksi }}</h6>
            @if ($validated_absen[$s->id_seksi - 1] == true)
            <p class="text-secondary font-weight-bold text-xs mb-0">{{ \Carbon\Carbon::parse($waktu_validasi_absen[$s->id_seksi - 1])->isoFormat('D MMMM Y')}} - Jam {{ \Carbon\Carbon::parse($waktu_validasi_absen[$s->id_seksi - 1])->isoFormat('HH:mm')}}</p>
            @else
            <span class="text-xs">- -</span>
            @endif
        </div>
        </div>
        @if ($validated_absen[$s->id_seksi - 1] == true)
        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">Validated</div>
        @else
        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">Unvalidated</div>
        @endif
        @endif
    </li>
    @endforeach
    </ul>
    <hr>
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3 mt-3">Data Kegiatan - {{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}</h6>
    <ul class="list-group">
    @foreach ($seksi as $s)
    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
        <div class="d-flex align-items-center">
        @if ($validated_kegiatan != null)
        @if (isset($validated_kegiatan[$s->id_seksi - 1]) && $validated_kegiatan[$s->id_seksi - 1] == true)
        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">check</i></button>
        @else
        <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">close</i></button>
        @endif
        <div class="d-flex flex-column">
            <h6 class="mb-1 text-dark text-sm">{{ $s->nama_seksi }}</h6>
            @if (isset($validated_kegiatan[$s->id_seksi - 1]) && $validated_kegiatan[$s->id_seksi - 1] == true)
            <p class="text-secondary font-weight-bold text-xs mb-0">{{ \Carbon\Carbon::parse($waktu_validasi_kegiatan[$s->id_seksi - 1])->isoFormat('D MMMM Y')}} - Jam {{ \Carbon\Carbon::parse($waktu_validasi_kegiatan[$s->id_seksi - 1])->isoFormat('HH:mm')}}</p>
            @else
            <span class="text-xs">- -</span>
            @endif
        </div>
        </div>
        @if (isset($validated_kegiatan[$s->id_seksi - 1]) && $validated_kegiatan[$s->id_seksi - 1] == true)
        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">Validated</div>
        @else
        <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">Unvalidated</div>
        @endif
        @endif
    </li>
    @endforeach
    </ul>
</div>
</div>
</div>
@endif