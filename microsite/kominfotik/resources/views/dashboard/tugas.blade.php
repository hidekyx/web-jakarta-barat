@if ($id_role == "1")
<div class="col-md-6 mb-4">
<div class="card h-100">
<div class="card-header pb-0">
    <h6>Ringkasan Tugas - Admin</h6>
    <p class="text-sm">
    <i class="fa fa-calendar text-secondary" aria-hidden="true"></i>
    {{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}
    </p>
</div>
<div class="card-body p-3">
    <div class="timeline timeline-one-side">
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-success text-gradient">input</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Import Data Absen WFO</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Admin mengupload data absen bulanan tenaga terampil dari mesin absen</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
    <span class="timeline-step">
        <i class="material-icons text-info text-gradient">assignment</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Import Data Absen WFH</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Admin mengupload data absen WFH dari rekap absen bulanan</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-warning text-gradient">event</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Input Hari Libur Bulanan</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Admin menginput data hari libur perbulan sesuai dengan Kalender Indonesia</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-primary text-gradient">table_view</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Menunggu Validasi Kepala Seksi</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Admin menunggu konfirmasi validasi data absen dan kegiatan dari kepala seksi</p>
        </div>
    </div>
    </div>
</div>
</div>
</div>

@elseif ($id_role == "2")
<div class="col-md-6 mb-4">
<div class="card h-100">
<div class="card-header pb-0">
    <h6>Ringkasan Tugas - Kepala Seksi</h6>
    <p class="text-sm">
    <i class="fa fa-calendar text-secondary" aria-hidden="true"></i>
    {{ \Carbon\Carbon::parse($bulan_lalu)->isoFormat('MMMM Y')}}
    </p>
</div>
<div class="card-body p-3">
    <div class="timeline timeline-one-side">
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-warning text-gradient">input</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Menunggu Admin Import Data Absen</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Kepala Seksi menunggu admin mengupload data absen bulanan</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-success text-gradient">edit</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Memperbaharui Data Absen</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Kepala Seksi memberi keterangan absensi apabila ada yang izin / cuti / alpha</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-info text-gradient">receipt_long</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Validasi Data Absen</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Kepala Seksi validasi data absen tenaga terampil sesuai dengan seksinya</p>
        </div>
    </div>
    <div class="timeline-block mb-3">
        <span class="timeline-step">
        <i class="material-icons text-primary text-gradient">table_view</i>
        </span>
        <div class="timeline-content">
        <h6 class="text-dark text-sm font-weight-bold mb-0">Validasi Data Kegiatan</h6>
        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Kepala Seksi validasi data kegiatan tenaga terampil sesuai dengan seksinya</p>
        </div>
    </div>
    </div>
</div>
</div>
</div>
@endif