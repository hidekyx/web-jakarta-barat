<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Laporan Absensi Bulanan</h6>
            </div>
        </div>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2 mx-0">
    <div class="row px-4">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
        <div class="row container">
            <div class="col-12 mb-4">
                <h5 class="mb-1">
                {{ $nama_lengkap }}
                </h5>
                <p class="mb-0 font-weight-normal text-sm">
                {{ $jabatan->nama_jabatan }}
                </p>
            </div>
            <div class="col-12 col-lg mb-4">
                <form role="form" class="text-start">
                    <div class="input-group input-group-outline" style="width:fit-content">
                        <input type="month" class="form-control" name="bulan">
                        <button type="submit" class="btn btn-outline-primary mb-0">Filter</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="table-responsive p-0">
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Absen Pagi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penalty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">-</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Absen Sore</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Penalty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th> -->
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    @if ($id_role == "2")
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                    @endif
                </tr>
            </thead>
            <tbody>
            @if($absensi_kosong == true)
                <tr>
                    <td colspan="12" class="text-center"><p class="text-lg font-weight-bold mt-3 mb-3 ps-3">Data absensi bulan ini masih kosong</p></td>
                </tr>
            @else
                <form role="form" class="text-start" action="{{ asset('/absensi/generate_validasi') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                @foreach ($absensi as $a)
                @if ($a->tanggal == "2023-08-14")
                <tr class="bg-gradient-info">
                    <td colspan="100%" align="center">
                        <p class="mb-0 font-weight-bold text-white">Keterangan : Flexi time mulai berlaku pada tanggal 14 Agustus 2023</p>
                    </td>
                </tr>
                @endif
                @if ($a->jenis == "Libur")
                <tr class="bg-light">
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ \Carbon\Carbon::parse($a->tanggal)->isoFormat('dddd')}}</p>
                        <p class="text-xs mb-0 ps-3">{{ \Carbon\Carbon::parse($a->tanggal)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        <span class="badge badge-sm bg-white text-secondary">{{ $a->jenis }}</span>
                    </td>
                    <td colspan="10">
                        <p class="text-xs font-weight-bold mb-0">Keterangan: {{ $a->keterangan }}</p>
                    </td>
                @else
                </tr>
                <input type="hidden" name="id_absensi[]" value="{{ $a->id_absensi }}">
                <tr>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-3">{{ \Carbon\Carbon::parse($a->tanggal)->isoFormat('dddd')}}</p>
                        <p class="text-xs text-secondary mb-0 ps-3">{{ \Carbon\Carbon::parse($a->tanggal)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        @if ($a->jenis == "WFO")
                        <span class="badge badge-sm bg-gradient-primary">{{ $a->jenis }}</span>
                        @elseif ($a->jenis == "WFH")
                        <span class="badge badge-sm bg-gradient-success">{{ $a->jenis }}</span>
                        @else
                        <span class="badge badge-sm bg-gradient-danger">{{ $a->jenis }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($a->first_in != NULL)
                        <p class="text-xs font-weight-bold mb-0 ps-0">{{ \Carbon\Carbon::parse($a->first_in)->isoFormat('HH:mm:ss')}}</p>
                        @else
                        <p class="text-xs font-weight-bold mb-0 ps-0">-</p>
                        @endif
                    </td>
                    <td>
                        @if ($a->penalty_absen_pagi != NULL)
                        <p class="text-xs font-weight-bold mb-0 ps-0">{{ \Carbon\Carbon::parse($a->penalty_absen_pagi)->isoFormat('HH:mm:ss')}}</p>
                        @else
                        <p class="text-xs font-weight-bold mb-0 ps-0">-</p>
                        @endif
                    </td>
                    <td class="align-middle text-sm">
                        @if ($a->keterangan_absen_pagi == "Tepat Waktu")
                        <span class="badge w-100 badge-sm bg-gradient-success">{{ $a->keterangan_absen_pagi }}</span>
                        @elseif ($a->keterangan_absen_pagi == "Telat")
                        <span class="badge w-100 badge-sm bg-gradient-warning">{{ $a->keterangan_absen_pagi }}</span>
                        @elseif ($a->keterangan_absen_pagi == "Flexible Time")
                        <span class="badge w-100 badge-sm bg-gradient-info">{{ $a->keterangan_absen_pagi }}</span>
                        @else
                        <span class="badge w-100 badge-sm bg-gradient-danger">{{ $a->keterangan_absen_pagi }}</span>
                        @endif
                    </td>
                    <td>

                    </td>
                    <td>
                        @if ($a->last_out != NULL)
                        <p class="text-xs font-weight-bold mb-0 ps-0">{{ \Carbon\Carbon::parse($a->last_out)->isoFormat('HH:mm:ss')}}</p>
                        @else
                        <p class="text-xs font-weight-bold mb-0 ps-0">-</p>
                        @endif
                    </td>
                    <td>
                        @if ($a->penalty_absen_sore != NULL)
                        <p class="text-xs font-weight-bold mb-0 ps-0">{{ \Carbon\Carbon::parse($a->penalty_absen_sore)->isoFormat('HH:mm:ss')}}</p>
                        @else
                        <p class="text-xs font-weight-bold mb-0 ps-0">-</p>
                        @endif
                    </td>
                    <td class="text-sm">
                        @if ($a->keterangan_absen_sore == "Tepat Waktu")
                        <span class="badge w-100 badge-sm bg-gradient-success">{{ $a->keterangan_absen_sore }}</span>
                        @elseif ($a->keterangan_absen_sore == "Pulang Cepat")
                        <span class="badge w-100 badge-sm bg-gradient-warning">{{ $a->keterangan_absen_sore }}</span>
                        @else
                        <span class="badge w-100 badge-sm bg-gradient-danger">{{ $a->keterangan_absen_sore }}</span>
                        @endif
                    </td>

                    <!-- <td>
                        @if ($a->foto_timestamp != NULL)
                        <button type="button" class="btn-link" data-toggle="modal" data-target="#gambarid{{ $a->gambar }}"><i class="material-icons ms-auto text-info cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="View">image</i></button>
                        <div class="modal fade" id="gambarid{{ $a->gambar }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Dokumentasi Kegiatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/storage/images/dokumentasi/'.$a->gambar) }}" width="100%">
                                </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <p class="text-xs font-weight-bold mb-0 ps-0">-</p>
                        @endif
                    </td> -->
                    <td class="align-middle text-sm">
                        <!-- @if ($id_role == "2" && $a->validated == "N")
                            @if ($a->status == "Masuk")
                            <select class="form-select bg-white" name="status[]">
                            @else
                            <select class="form-select text-white" name="status[]">
                            @endif
                            <option selected hidden value="{{ $a->status }}">{{ $a->status }}</option>
                                <option value="Masuk">Masuk</option>
                                <option value="Izin">Izin</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Alpha">Alpha</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Dinas Luar">Dinas Luar</option>
                                <option value="Dinas Luar Awal">Dinas Luar Awal</option>
                                <option value="Dinas Luar Akhir">Dinas Luar Akhir</option>
                            </select>
                            <input type="hidden" name="id_absensi[]" value="{{ $a->id_absensi }}">
                        @else
                        <span class="badge badge-sm bg-white text-secondary">{{ $a->status }}</span>
                        @endif -->
                        @if ($a->status == "Masuk")
                        <span class="badge badge-sm bg-white text-secondary">{{ $a->status }}</span>
                        @else
                        <span class="badge badge-sm bg-dark text-white text-secondary">{{ $a->status }}</span>
                        @endif
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0 ps-0">
                            @php
                            $maxLength = 35;
                            
                            $keterangan = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $a->keterangan, 0, PREG_SPLIT_NO_EMPTY);
                            echo $keterangan_split = implode("<br>",$keterangan);
                            
                            @endphp
                        </p>
                    </td>
                    @if ($id_role == "2" && $a->validated == "N")
                    <td>
                        <a href="{{ asset('/absensi/edit_keterangan/'.$a->id_absensi) }}"><i class="fas fa-edit text-info text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i></a>
                    </td>
                    @else
                    <td></td>
                    @endif
                    <style>
                    .form-select {
                        padding: 1px;
                        border-radius: 0.45rem;
                        text-transform: uppercase;
                        font-size: 75%;
                        font-weight: 700;
                        line-height: 1.7;
                        text-align: center;
                        background-color: #495057;
                    }
                    .form-select:hover {
                        background-color: #16181a;
                    }
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
                </tr>
                @endif
                @endforeach
                @if ($id_role == "2" && $validated == false)
                <tr>
                    <td colspan="12" align="right">
                        <button type="submit" class="btn btn-sm bg-gradient-primary mb-0 toast-btn">Validasi Absen</button>
                    </td>
                </tr>
                @endif
                </form>
            @endif
            </tbody>
        </table>
        <hr class="mt-0">
        @if($absensi_kosong == false)
            <a href="{{ asset('/absensi/export/'.$username.'/'.$filter_bulan) }}"><button type="button" class="btn bg-gradient-success toast-btn ms-3" data-toggle="modal" data-target="#export_excel"><i class="material-icons ms-auto cursor-pointer">print</i> Export ke Excel</button></a>
        @endif
       </div>
        
        @if ($filter_bulan != null && $validated == true)
        <hr class="mt-0 py-3">
        <div class="row container">
            <div class="col-12 mb-4">
            <h5 class="mb-1">
            Rekap Absensi Tenaga Terampil
            </h5>
            <p class="mb-0 font-weight-normal text-sm">
            {{ \Carbon\Carbon::parse($filter_bulan)->isoFormat('MMMM Y')}}
            </p>
            </div>
        </div>
        @foreach ($rekap_absen as $ra)
        <div class="row container text-sm">
            <div class="col-lg-4 col-12">
                <table class="table table-responsive border-radius-lg">
                    <tr>
                        <td class="text-dark">Telat</td>
                        <td>:</td>
                        @if ($ra->total_telat != null)
                        <td>{{ $ra->total_telat }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Pulang Cepat</td>
                        <td>:</td>
                        @if ($ra->total_pulang_cepat != null)
                        <td>{{ $ra->total_pulang_cepat }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Total Telat dan Pulang Cepat</td>
                        <td>:</td>
                        @if ($ra->total_telat_dan_pulang_cepat != null)
                        <td>{{ $ra->total_telat_dan_pulang_cepat }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <table class="table table-responsive border-radius-lg">
                    <tr>
                        <td class="text-dark">Izin</td>
                        <td>:</td>
                        @if ($ra->total_izin != null)
                        <td>{{ $ra->total_izin }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Cuti</td>
                        <td>:</td>
                        @if ($ra->total_cuti != null)
                        <td>{{ $ra->total_cuti }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Alpha</td>
                        <td>:</td>
                        @if ($ra->total_alpha != null)
                        <td>{{ $ra->total_alpha }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Sakit</td>
                        <td>:</td>
                        @if ($ra->total_sakit != null)
                        <td>{{ $ra->total_sakit }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Tidak Absen</td>
                        <td>:</td>
                        @if ($ra->total_tidak_absen != null)
                        <td>{{ $ra->total_tidak_absen }}x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Dinas Luar Setengah Hari</td>
                        <td>:</td>
                        @if ($ra->total_dinas_luar_setengah != null)
                        <td>{{ $ra->total_dinas_luar_setengah }}x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Dinas Luar Penuh</td>
                        <td>:</td>
                        @if ($ra->total_dinas_luar_sehari != null)
                        <td>{{ $ra->total_dinas_luar_sehari }}x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                </table>
            </div>
            @if($id_role != "3")
            <div class="col-lg-4 col-12">
                <table class="table table-responsive border-radius-lg">
                    <tr>
                        <td class="text-dark">Gaji Pokok</td>
                        <td>:</td>
                        @if ($gaji_pokok != null)
                        <td align="right">@duit($gaji_pokok)</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Potongan Alpha</td>
                        <td>:</td>
                        @if ($ra->potongan_alpha != null)
                        <td align="right">@duit($ra->potongan_alpha)</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr style="border-top: solid;">
                        <td class="text-dark">Gaji Sebelum Pajak</td>
                        <td>:</td>
                        @if ($ra->gaji_sebelum_pajak != null)
                        <td align="right" class="font-weight-bolder">@duit($ra->gaji_sebelum_pajak)</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                </table>
            </div>
            @endif
        </div>
        @endforeach
        @elseif ($filter_bulan != null && $validated == false && $rekap_absen != null)
        <hr class="mt-0 py-3">
        <div class="row container">
            <div class="col-12 mb-4">
            <h5 class="mb-1">
            Rekap Absensi Tenaga Terampil
            </h5>
            <p class="mb-0 font-weight-normal text-sm">
            {{ \Carbon\Carbon::parse($filter_bulan)->isoFormat('MMMM Y')}}
            </p>
            </div>
        </div>
        <div class="row container text-sm">
            <div class="col-lg-4 col-12">
                <table class="table table-responsive border-radius-lg">
                    <tr>
                        <td class="text-dark">Telat</td>
                        <td>:</td>
                        @if ($rekap_absen['total_telat'] != null)
                        <td>{{ $rekap_absen['total_telat'] }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Pulang Cepat</td>
                        <td>:</td>
                        @if ($rekap_absen['total_pulang_cepat'] != null)
                        <td>{{ $rekap_absen['total_pulang_cepat'] }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Total Telat dan Pulang Cepat</td>
                        <td>:</td>
                        @if ($rekap_absen['total_penalty'] != null)
                        <td>{{ $rekap_absen['total_penalty'] }}</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <table class="table table-responsive border-radius-lg">
                    <tr>
                        <td class="text-dark">Izin</td>
                        <td>:</td>
                        @if ($rekap_absen['total_izin'] != null)
                        <td>{{ $rekap_absen['total_izin'] }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Cuti</td>
                        <td>:</td>
                        @if ($rekap_absen['total_cuti'] != null)
                        <td>{{ $rekap_absen['total_cuti'] }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Alpha</td>
                        <td>:</td>
                        @if ($rekap_absen['total_alpha'] != null)
                        <td>{{ $rekap_absen['total_alpha'] }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Sakit</td>
                        <td>:</td>
                        @if ($rekap_absen['total_sakit'] != null)
                        <td>{{ $rekap_absen['total_sakit'] }} hari</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Tidak Absen</td>
                        <td>:</td>
                        @if ($rekap_absen['total_tidak_absen'] != null)
                        <td>{{ $rekap_absen['total_tidak_absen'] }} x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Dinas Luar Setengah Hari</td>
                        <td>:</td>
                        @if ($rekap_absen['total_dinas_luar_setengah'] != null)
                        <td>{{ $rekap_absen['total_dinas_luar_setengah'] }} x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="text-dark">Dinas Luar Penuh</td>
                        <td>:</td>
                        @if ($rekap_absen['total_dinas_luar_sehari'] != null)
                        <td>{{ $rekap_absen['total_dinas_luar_sehari'] }} x</td>
                        @else
                        <td>-</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        @endif
        <div class="row container text-sm">
            <div id="grafik_absen" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
    </div>
</div>
</div>

@if($grafik_absen != null)
<script>
    let json_jam_masuk = @json($grafik_absen['pagi']['jam_masuk']);
    let json_jadwal_masuk = @json($grafik_absen['pagi']['jadwal_masuk']);
    let json_jam_pulang = @json($grafik_absen['sore']['jam_pulang']);
    let json_jadwal_pulang = @json($grafik_absen['sore']['jadwal_pulang']);
    let json_tanggal = @json($grafik_absen['pagi']['tanggal']);

    const jam_masuk = json_jam_masuk.map(timeString => {
        const [hours, minutes] = timeString.split(':').map(Number);
        return hours * 60 + minutes; // Convert to minutes
    });

    const jadwal_masuk = json_jadwal_masuk.map(timeString => {
        const [hours, minutes] = timeString.split(':').map(Number);
        return hours * 60 + minutes; // Convert to minutes
    });

    const jam_pulang = json_jam_pulang.map(timeString => {
        const [hours, minutes] = timeString.split(':').map(Number);
        return hours * 60 + minutes; // Convert to minutes
    });

    const jadwal_pulang = json_jadwal_pulang.map(timeString => {
        const [hours, minutes] = timeString.split(':').map(Number);
        return hours * 60 + minutes; // Convert to minutes
    });

    Highcharts.chart('grafik_absen', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Absensi Tenaga Terampil',
            align: 'left'
        },
        subtitle: {
            text: '{{ \Carbon\Carbon::parse($filter_bulan)->isoFormat('MMMM Y')}}',
            align: 'left'
        },
        xAxis: {
            categories: json_tanggal,
            title: {
                text: 'Tanggal'
            }
        },
        yAxis: {
            title: {
                text: 'Jam Absensi'
            },
            labels: {
                formatter: function () {
                    const hours = Math.floor(this.value / 60);
                    const minutes = this.value % 60;
                    return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
                }
            }
        },
        tooltip: {
            formatter: function () {
                const hours = Math.floor(this.y / 60);
                const minutes = this.y % 60;
                return `Jam: ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}`;
            }
        },
        series: [{
            name: 'Jam Masuk',
            data: jam_masuk
        }, {
            name: 'Jam Pulang',
            data: jam_pulang
        }, {
            name: 'Batas Jam Masuk / Flexible Time',
            data: jadwal_masuk
        }]
    });
</script>
@endif