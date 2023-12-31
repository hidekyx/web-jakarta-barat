<section id="page-content">
    <div class="container">
        <div class="grid-system-demo-live">
            <div class="row">
                <div class="col-lg-8 p-t-20 p-b-20">
                    <div class="heading-text heading-section heading-gradient">
                        <h2><span>@unlink($current_subpage)</span></h2>
                    </div>
                    @if($current_menu->konten == "Teks" && $data['informasi-wilayah'][strtolower($current_subpage)] != null)
                        <div style="text-align: justify;">
                        {!! $data['informasi-wilayah'][strtolower($current_subpage)]->konten !!}
                        </div>
                    @elseif($current_menu->konten == "Tabel")
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Acara</th>
                                    <th>Tempat</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['informasi-wilayah'][strtolower($current_subpage)] as $key => $di)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($di->tanggal)->isoFormat('D MMMM Y')}}<br>{{ $di->jam_mulai }} - {{ $di->jam_selesai }}</td>
                                    <td>{{ $di->acara }}</td>
                                    <td>{{ $di->tempat }}</td>
                                    <td>{{ $di->kehadiran }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p>Data belum tersedia.</p>
                    @endif
                </div>
                <div class="sidebar col-lg-4">
                    @include('front.widget_berita')
                </div>
            </div>
        </div>
    </div>
</section>