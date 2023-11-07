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
                                        @if($current_subpage == "SOP-PPID")
                                        <td><a target="_blank" href="{{ asset('storage/files/images/foto/ppid_sop/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
                                        @elseif($current_subpage == "Laporan-Penyelesaian-PPID")
                                        <td><a target="_blank" href="{{ asset('storage/files/images/foto/ppid_laporan_penyelesaian/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
                                        @elseif($current_subpage == "dokumen-informasi-publik")
                                        <td><a target="_blank" href="{{ asset('storage/files/images/foto/ppid_dokumen_informasi_publik/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @elseif($current_menu->konten == "Tabel Informasi")
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover" style="width:100%">
                        <thead style="background-color: #3c4043; color: #fff">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['ppid'][strtolower($current_subpage)] as $key => $dp)
                                <tr style="background-color: #e4e6ef;">
                                    <th scope="row"><a href="#">{{ $key+1 }}</a></th>
                                    <th>{{ $dp->judul }}</th>
                                    <th></th>
                                </tr>
                                @foreach($dp['isi'] as $isi)
                                <tr>
                                    <th></th>
                                    <td>{{ $isi->isi }}</td>
                                    @if($isi->pivot($isi->id_ppid, $kewilayahan->id_user))
                                    <td>
                                        @if($isi->pivot($isi->id_ppid, $kewilayahan->id_user)->type == "Link")
                                        <a href="{{ $isi->pivot($isi->id_ppid, $kewilayahan->id_user)->value }}">
                                            <button type="button" class="btn btn-sm btn-info text-white">Link</button>
                                        </a>
                                        @elseif($isi->pivot($isi->id_ppid, $kewilayahan->id_user)->type == "File")
                                        <a href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$isi->pivot($isi->id_ppid, $kewilayahan->id_user)->value) }}">
                                            <button type="button" class="btn btn-sm btn-primary">File</button>
                                        </a>
                                        @endif
                                    </td>
                                    @else
                                    <td>-</td>
                                    @endif
                                </tr>
                                @endforeach
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