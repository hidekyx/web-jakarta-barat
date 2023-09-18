<div class="col-12 mt-5">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row mb-4">
        <div class="col-md-6">
            <h6>Cari menggunakan NIK yang terdaftar:</h6>
            <form role="form" class="text-start">
            <div class="input-group input-group-outline" style="width:fit-content">
                <input type="text" class="form-control" placeholder="NIK" name="nik">
                <button type="submit" class="btn btn-info mb-0 pt-1">Cari</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <div class="row container">
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                @foreach ($errors->all() as $error)
                <span class="text-sm text-white">{{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm text-white">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        @if($rekrutmen != null)
        <div class="row">
            <div class="col-lg-6">    
                <h6 class="text-dark text-sm ">Identitas Kandidat: </h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm font-weight-bold" style="background-color: #f0f2f5;">
                            <td>Nama</td>
                            <td>Kontak</td>
                            <td>Tanggal Lahir</td>
                            <td>Posisi</td>
                        </tr>
                        <tr>
                            <td class="text-sm">
                                Nama: {{ $rekrutmen->nama_lengkap }}<br>
                                NIK: {{ $rekrutmen->nik }}
                            </td>
                            <td class="text-sm">
                                Email: {{ $rekrutmen->email }}<br>
                                No Telp: {{ $rekrutmen->no_telp }}
                            </td>
                            <td class="text-sm">{{ \Carbon\Carbon::parse($rekrutmen->tanggal_submit)->isoFormat('DD MMMM Y')}}</td>
                            <td class="text-sm font-weight-bolder">{{ $rekrutmen->posisi }}</td>
                        </tr>
                        <tr class="text-sm font-weight-bold">
                            <td colspan="6" style="background-color: #f0f2f5;">Alamat Lengkap</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            <td colspan="6" class="text-sm">{{ $rekrutmen->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col">
                        <h6 class="text-dark text-sm ">Tanggal Daftar: </h6>
                        <div class="mb-3 text-sm">
                            {{ \Carbon\Carbon::parse($rekrutmen->tanggal_submit)->isoFormat('dddd, DD MMMM Y')}}
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="text-dark text-sm ">Status: </h6>
                        <div class="mb-3 text-sm">
                            @if($rekrutmen->status == "Menunggu Pengumuman")
                            <span class="font-weight-bolder text-warning">{{ $rekrutmen->status }}</span>
                            @elseif($rekrutmen->status == "Lolos Administrasi")
                            <span class="font-weight-bolder text-success">{{ $rekrutmen->status }}</span>
                            @elseif($rekrutmen->status == "Tidak Lolos Administrasi")
                            <span class="font-weight-bolder text-danger">{{ $rekrutmen->status }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Kelengkapan Berkas: </h6>
                <ul class="text-sm">
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_surat_lamaran_kerja') }}">Scan Surat Lamaran Kerja </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_daftar_riwayat_hidup') }}">Scan Daftar Riwayat Hidup </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_ktp') }}">Scan KTP </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_npwp') }}">Scan NPWP </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_ijazah') }}">Scan Ijazah dan Transkrip Nilai </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_sertifikat_pendukung') }}">Scan Sertifikat Pendukung </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_sim') }}">Scan SIM </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_sertifikat_vaksin') }}">Scan Sertifikat Vaksin </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_skck') }}">Scan SKCK </a><i class="fa fa-check text-success"></i></li>
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_keterangan_sehat') }}">Scan Surat Keterangan Sehat </a><i class="fa fa-check text-success"></i></li>
                    @if($rekrutmen->scan_surat_pengalaman_kerja != null)
                    <li><a target="_blank" class="text-info" href="{{ asset('/rekrutmen/download/'.$rekrutmen->nik.'/scan_surat_pengalaman_kerja') }}">Scan Surat Pengalaman Kerja </a><i class="fa fa-check text-success"></i></li>
                    @else
                    <li><a class="text-dark">Scan Surat Pengalaman Kerja </a><i class="fa fa-close text-danger"></i></li>
                    @endif
                    @if($rekrutmen->posisi == "EAV" || $rekrutmen->posisi == "DG")
                    <li><a target="_blank" class="text-info" href="{{ $rekrutmen->portofolio }}">Portofolio</a><i class="fa fa-check text-success"></i></li>
                    @endif
                </ul>
            </div>
            @if($rekrutmen->status == "Lolos Administrasi")
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Jadwal Tes CAT: </h6>
                <div class="col ml-0 pl-0">
                    <table class="table table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm">
                            <td class="font-weight-bold" style="background-color: #f0f2f5;">Hari/Tanggal</td>
                            @if($seksi == "KIP")
                            <td>Selasa, 6 Desember 2022</td>
                            @elseif($seksi == "JKD")
                            <td>Senin, 5 Desember 2022</td>
                            @elseif($seksi == "SISS")
                            <td>Rabu, 7 Desember 2022</td>
                            @endif
                        </tr>
                        <tr class="text-sm">
                            <td class="font-weight-bold" style="background-color: #f0f2f5;">Waktu</td>
                            <td>09.00 - selesai</td>
                        </tr>
                        <tr class="text-sm" style="border-width: 1px; border-color: #dee2e6;">
                            <td class="font-weight-bold" style="background-color: #f0f2f5;">Tempat</td>
                            <td style="border-width: 1px; border-color: #dee2e6;">Sudiskominfotik Jakarta Barat<br> Kantor Walikota Jakarta Barat<br> Jl. Raya Kembangan No. 2 Blok A Lt.9</td>
                        </tr>
                    </table>
                </div>
                <style>
                    tr {
                        border-width: 1px;
                        border-color: #dee2e6;
                    }
                </style>
            </div>
            @endif
        @endif
    </div>
    </div>
</div>