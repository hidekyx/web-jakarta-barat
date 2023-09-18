<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                @foreach ($errors->all() as $error)
                <span class="text-sm">{{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h3 class="mb-4">Cek Status Pengajuan Keberatan Informasi Publik</h3>
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                <form role="form" class="text-start">
                    <div class="input-group">
                        <input type="text" class="form-control p-3" placeholder="Kode Permohonan" name="kode_permohonan">
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        @if($keberatan != null)
        <hr>
        <div class="row">
            <div class="col-lg-6 col-12">
                <h6>Kode Permohonan</h6>
                <p>{{ $keberatan->kode_permohonan }}</p>
                <h6>Status Permohonan</h6>
                <span class="badge bg-danger mb-3">{{ $keberatan->status_permohonan }}</span>
                <h6>Keterangan Penolakan</h6>
                <p>{{ $keberatan->keterangan }}</p>
                <h6>Status Pengajuan Keberatan</h6>
                @if($keberatan->status_keberatan == "Menunggu Respon")
                <span class="badge bg-warning">{{ $keberatan->status_keberatan }}</span>
                @elseif($keberatan->status_keberatan == "Sedang Diproses")
                <span class="badge bg-info">{{ $keberatan->status_keberatan }}</span>
                @elseif($keberatan->status_keberatan == "Dipersetujui")
                <span class="badge bg-success">{{ $keberatan->status_keberatan }}</span>
                @elseif($keberatan->status_keberatan == "Ditolak")
                <span class="badge bg-danger">{{ $keberatan->status_keberatan }}</span>
                <h6 class="mt-3">Keterangan Penolakan</h6>
                <p>{{ $keberatan->keterangan_penolakan }}</p>
                @endif
            </div>
            <div class="col-lg-6 col-12" align="right">
                <h6>Tanggal Permohonan</h6>
                <p>{{ \Carbon\Carbon::parse($keberatan->tanggal_permohonan)->isoFormat('dddd, DD MMMM Y')}}</p>
                <h6>Tanggal Respon Permohonan</h6>
                <p>{{ \Carbon\Carbon::parse($keberatan->tanggal_respon_permohonan)->isoFormat('dddd, DD MMMM Y')}}</p>
                <h6>Tanggal Pengajuan Keberatan</h6>
                <p>{{ \Carbon\Carbon::parse($keberatan->tanggal_keberatan)->isoFormat('dddd, DD MMMM Y')}}</p>
                <h6>Tanggal Respon Pengajuan Keberatan</h6>
                @if($keberatan->tanggal_respon != null)
                <p>{{ \Carbon\Carbon::parse($keberatan->tanggal_respon_keberatan)->isoFormat('dddd, DD MMMM Y')}}</p>
                @else
                <p>- -</p>
                @endif
                <a class="btn btn-primary" href="{{ asset('/standar-layanan/cetak-status-pengajuan-keberatan-informasi-publik?kode_permohonan='.$keberatan->kode_permohonan) }}">Cetak Data Pengajuan Keberatan</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-12">
                <h3>Identitas Pemohon</h3>
                <table class="table table-bordered">
                    <tr>
                        <td><b>Kategori</b></td>
                        <td><b>Email</b></td>
                        <td><b>No Telp</b></td>
                        <td><b>Pekerjaan</b></td>
                    </tr>
                    <tr>
                        <td>{{ $keberatan->kategori }}</td>
                        <td>{{ $keberatan->email }}</td>
                        <td>{{ $keberatan->no_telp }}</td>
                        <td>{{ $keberatan->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td><b>NIK</b></td>
                        <td colspan="3"><b>Alamat</b></td>
                    </tr>
                    <tr>
                        <td>{{ $keberatan->nik }}</td>
                        <td colspan="3">{{ $keberatan->alamat }}</td>
                    </tr>
                </table>
                <h5>Alasan Pengajuan Keberatan</h5>
                <p>{{ $keberatan->keterangan_keberatan }}</p>
                @if($keberatan->id_dftr != null && $keberatan->status_keberatan == "Dipersetujui")
                <form method="post" id="download" action="{{ asset('/daftar-informasi-publik/download/'.$keberatan->id_dftr) }}" enctype="multipart/form-data">
                @csrf
                <div class="link-animated d-flex flex-column justify-content-start">
                    <a class="text-primary mb-2" href="#" onclick="document.getElementById('download').submit()">
                        <i class="bi bi-arrow-right text-primary me-2"></i>Download File di sini
                    </a>
                </div>
                </form>
                @endif
            </div>
            <div class="col-lg-6 col-12" align="right">
                <h3 align="left">Data Permohonan</h3>
                <table class="table table-bordered">
                    <tr><td colspan="4"><b>Rincian</b></td></tr>
                    <tr><td colspan="4">{{ $keberatan->rincian }}</td></tr>
                    <tr><td colspan="4"><b>Tujuan</b></td></tr>
                    <tr><td colspan="4">{{ $keberatan->tujuan }}</td></tr>
                    <tr>
                        <td><b>Cara Memperoleh</b></td>
                        <td><b>Media</b></td>
                        <td><b>Cara Mendapatkan</b></td>
                    </tr>
                    <tr>
                        <td>{{ $keberatan->cara_memperoleh }}</td>
                        <td>{{ $keberatan->media }}</td>
                        <td>{{ $keberatan->cara_mendapatkan }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
