<section id="page-content">
    <div class="container">
        <div class="grid-system-demo-live">
            <div class="row">
                <div class="col-lg-8 p-t-20 p-b-20">
                    <div class="heading-text heading-section heading-gradient">
                        @if($current_subpage == "Visi-dan-Misi-PPID" || $current_subpage == "Tugas-dan-Fungsi-PPID")
                        <h2><span>{{ str_replace('-', ' ', $current_subpage) }}</span></h2>
                        @else
                        <h2><span>@unlink($current_subpage)</span></h2>
                        @endif
                    </div>
                    @if($current_menu->konten == "Teks" && $data['ppid'][strtolower($current_subpage)] != null)
                        <div style="text-align: justify;">
                        {!! $data['ppid'][strtolower($current_subpage)]->konten !!}
                        </div>
                    @elseif($current_menu->konten == "Gambar" && $data['ppid'][strtolower($current_subpage)] != null)
                        @if($current_subpage == "prosedur-permohonan-pelayanan-informasi" || $current_subpage == "prosedur-pengajuan-keberatan-informasi" || $current_subpage == "prosedur-penanganan-sengketa-informasi" || $current_subpage == "prosedur-permohonan-penyelesaian-sengketa-informasi")
                        <img src="{{ asset('storage/files/images/foto/ppid_prosedur/'.$data['ppid'][strtolower($current_subpage)]->gambar) }}" width="100%">
                        @elseif($current_subpage == "Struktur-PPID")
                        <img src="{{ asset('storage/files/images/foto/ppid_struktur_organisasi/'.$data['ppid'][strtolower($current_subpage)]->struktur_organisasi) }}" width="100%">
                        @endif
                    @elseif($current_menu->konten == "Tabel")
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                        <th>File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['ppid'][strtolower($current_subpage)] as $key => $dp)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $dp->judul }}</td>
                                        <td>{{ $dp->keterangan }}</td>
                                        <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($dp->created_at)->isoFormat('D MMMM Y')}}</td>
                                        <td><a target="_blank" href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
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