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
            <h3 class="mb-4">Cek Status Permohonan Informasi Publik</h3>
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
        @if($permohonan != null)
        <hr>
        <div class="row">
            <div class="col-6">
                <h6>Kode Permohonan</h6>
                <p>{{ $permohonan->kode_permohonan }}</p>
                <h6>Status Permohonan</h6>
                @if($permohonan->status == "Menunggu Respon")
                <span class="badge bg-warning">{{ $permohonan->status }}</span>
                @elseif($permohonan->status == "Sedang Diproses")
                <span class="badge bg-info">{{ $permohonan->status }}</span>
                @elseif($permohonan->status == "Dipersetujui")
                <span class="badge bg-success">{{ $permohonan->status }}</span>
                @elseif($permohonan->status == "Ditolak")
                <span class="badge bg-danger">{{ $permohonan->status }}</span>
                <h6 class="mt-3">Keterangan Penolakan</h6>
                <p>{{ $permohonan->keterangan }}</p>
                @endif
            </div>
            <div class="col-6" align="right">
                <h6>Tanggal Permohonan</h6>
                <p>{{ \Carbon\Carbon::parse($permohonan->tanggal_permohonan)->isoFormat('dddd, DD MMMM Y')}}</p>
                <h6>Tanggal Respon</h6>
                @if($permohonan->tanggal_respon != null)
                <p>{{ \Carbon\Carbon::parse($permohonan->tanggal_respon)->isoFormat('dddd, DD MMMM Y')}}</p>
                @else
                <p>- -</p>
                @endif
                <a class="btn btn-primary" href="{{ asset('/standar-layanan/cetak-status-permohonan-informasi-publik?kode_permohonan='.$permohonan->kode_permohonan) }}">Cetak Data Permohonan</a>
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
                        <td>{{ $permohonan->kategori }}</td>
                        <td>{{ $permohonan->email }}</td>
                        <td>{{ $permohonan->no_telp }}</td>
                        <td>{{ $permohonan->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td colspan="4"><b>Alamat</b></td>
                    </tr>
                    <tr>
                        <td colspan="4">{{ $permohonan->alamat }}</td>
                    </tr>
                </table>
                @if($permohonan->status == "Ditolak")
                <h5>Ajukan Keberatan</h5>
                <div class="link-animated d-flex flex-column justify-content-start">
                    <a class="text-primary mb-2" href="{{ asset('/standar-layanan/form-pengajuan-keberatan-informasi-publik') }}">
                        <i class="bi bi-arrow-right text-primary me-2"></i>Form Pengajuan Keberatan
                    </a>
                </div>
                @endif
                @if($permohonan->id_dftr != null && $permohonan->status == "Dipersetujui")
                <form method="post" id="download" action="{{ asset('/daftar-informasi-publik/download/'.$permohonan->id_dftr) }}" enctype="multipart/form-data">
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
                    <tr><td colspan="4">{{ $permohonan->rincian }}</td></tr>
                    <tr><td colspan="4"><b>Tujuan</b></td></tr>
                    <tr><td colspan="4">{{ $permohonan->tujuan }}</td></tr>
                    <tr>
                        <td><b>Cara Memperoleh</b></td>
                        <td><b>Media</b></td>
                        <td><b>Cara Mendapatkan</b></td>
                    </tr>
                    <tr>
                        <td>{{ $permohonan->cara_memperoleh }}</td>
                        <td>{{ $permohonan->media }}</td>
                        <td>{{ $permohonan->cara_mendapatkan }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>