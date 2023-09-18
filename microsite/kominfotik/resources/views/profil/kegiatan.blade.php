<div class="row in collapse show" id="kegiatan">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Laporan Kegiatan Terbaru</h6>
    </div>
    <div class="card-body px-0 pb-2 mx-0">
        <div class="table-responsive p-0">
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jam</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aktifitas</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Rincian Pekerjaan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Lokasi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Validated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $k)
                <tr>
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
                    <td>
                        <p class="text-xs text-secondary mb-0">{{ $k->lokasi }}</p>
                    </td>
                    <td>
                        @if($k->validated == "Y")
                            <i class="material-icons ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top">check</i>
                        @else
                            <i class="material-icons ms-auto text-danger cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top">close</i>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
</div>