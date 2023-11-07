<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Status Kelengkapan Website <span>| Seluruh Wilayah </span></h5>
                        <div class="accordion" id="status_kelengkapan">
                            @foreach($status as $s)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="{{ $s->id_user }}">
                                    @if($s->kategori == "Kecamatan")
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $s->username }}"><b>{{ $s->nama }}</b></button>
                                    @else
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $s->username }}"><span style="margin-left: 20px;">{{ $s->nama }}</span></button>
                                    @endif
                                </h2>
                                <div id="{{ $s->username }}" class="accordion-collapse collapse">
                                    <div class="accordion-body">
                                        <table class="table table-borderless w-100">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 20%;">Kategori</th>
                                                    <th scope="col" style="width: 40%;">Menu</th>
                                                    <th scope="col" style="width: 10%;">Jumlah Data</th>
                                                    <th scope="col" style="width: 10%;">Status</th>
                                                    <th scope="col" style="width: 20%;">Diperbaharui</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($s->data_deskripsi as $key => $data)
                                                <tr>
                                                    <td>Deskripsi Website</td>
                                                    <th scope="row">{{ Str::headline($key) }}</th>
                                                    <td>-</td>
                                                    @if($data)
                                                        <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                        <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                @foreach($s->data_profil as $key => $data)
                                                <tr>
                                                    <td>Profil</td>
                                                    <th scope="row">{{ Str::headline($key) }}</th>
                                                    <td>-</td>
                                                    @if($data)
                                                        <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                        <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                @foreach($s->data_perangkat as $key => $data)
                                                <tr>
                                                    <td>Perangkat</td>
                                                    <th scope="row">{{ Str::headline($key) }}</th>
                                                    <td>-</td>
                                                    @if($data)
                                                        <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                        <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                @foreach($s->data_ppid as $key => $data)
                                                <tr>
                                                    <td>PPID</td>
                                                    <th scope="row">{{ Str::headline($key) }}</th>
                                                    @if($data)
                                                        @if($key == "dokumen-informasi-publik" || $key == "laporan-penyelesaian-ppid" || $key == "sop-ppid")
                                                            @if(count($data) != 0)
                                                            <td><span class="badge bg-info">{{ count($data) }}</span></td>
                                                            <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                            <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data[0]->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                            @else
                                                            <td>-</td>
                                                            <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                            <td>-</td>
                                                            @endif
                                                        @elseif($key == "daftar-informasi-publik-berkala" || $key == "daftar-informasi-publik-serta-merta" || $key == "daftar-informasi-publik-setiap-saat")
                                                            <td>-</td>
                                                            <td>-</td>
                                                            <td>-</td>
                                                        @else
                                                        <td>-</td>
                                                        <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                        @endif
                                                    @else
                                                        <td>-</td>
                                                        <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                @foreach($s->data_informasi as $key => $data)
                                                <tr>
                                                    <td>Informasi Wilayah</td>
                                                    <th scope="row">{{ Str::headline($key) }}</th>
                                                    @if($data)
                                                        @if($key == "kalender-kegiatan")
                                                            @if(count($data) != 0)
                                                            <td><span class="badge bg-info">{{ count($data) }}</span></td>
                                                            <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                            <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data[0]->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                            @else
                                                            <td>-</td>
                                                            <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                            <td>-</td>
                                                            @endif
                                                        @else
                                                        <td>-</td>
                                                        <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                        @endif
                                                    @else
                                                        <td>-</td>
                                                        <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                                @endforeach

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">Kesehatan</th>
                                                    @if($s->data_layanan_kesehatan['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_kesehatan['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_kesehatan['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">Pendidikan</th>
                                                    @if($s->data_layanan_pendidikan['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_pendidikan['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_pendidikan['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">Transportasi</th>
                                                    @if($s->data_layanan_transportasi['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_transportasi['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_transportasi['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">PTSP</th>
                                                    @if($s->data_layanan_ptsp['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_ptsp['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_ptsp['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">Kanal Pengaduan</th>
                                                    @if($s->data_layanan_kanal_pengaduan['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_kanal_pengaduan['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_kanal_pengaduan['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                                <tr>
                                                    <td>Layanan Publik</td>
                                                    <th scope="row">Tempat Ibadah</th>
                                                    @if($s->data_layanan_tempat_ibadah['total'] != 0)
                                                    <td><span class="badge bg-info">{{ $s->data_layanan_tempat_ibadah['total'] }}</span></td>
                                                    <td><span class="badge bg-success w-100">Sudah Dipublikasi</span></td>
                                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($s->data_layanan_tempat_ibadah['updated_at'])->isoFormat('D MMMM Y - HH:mm')}}</td>
                                                    @else
                                                    <td>-</td>
                                                    <td><span class="badge bg-danger w-100">Belum Diisi</span></td>
                                                    <td>-</td>
                                                    @endif
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>