<div class="row mb-4">
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
    <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
        <i class="material-icons opacity-10">people</i>
        </div>
        <div class="text-end pt-1">
        <p class="text-sm mb-0 text-capitalize">Jumlah Tenaga Terampil</p>
        <h4 class="mb-0">{{ $jumlah_tenaga_terampil }}</h4>
        </div>
    </div>
    <hr class="dark horizontal my-0">
    <div class="card-footer p-3">
        <p class="mb-0"></p>
    </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
    <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
        <i class="material-icons opacity-10">camera</i>
        </div>
        <div class="text-end pt-1">
        <p class="text-sm mb-0 text-capitalize">Jumlah Data Kegiatan</p>
        <h4 class="mb-0">{{ $jumlah_kegiatan }}</h4>
        </div>
    </div>
    <hr class="dark horizontal my-0">
    <div class="card-footer p-3">
        <p class="mb-0"></p>
    </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
    <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
        <i class="material-icons opacity-10">terminal</i>
        </div>
        <div class="text-end pt-1">
        <p class="text-sm mb-0 text-capitalize">Jumlah Data Absensi</p>
        <h4 class="mb-0">{{ $jumlah_absensi }}</h4>
        </div>
    </div>
    <hr class="dark horizontal my-0">
    <div class="card-footer p-3">
        <p class="mb-0"></p>
    </div>
    </div>
</div>
</div>
<div class="row mb-4">
@include('dashboard.tugas')
@include('dashboard.status')
</div>
