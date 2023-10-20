<div class="sc-statistics-style white-bg-color">
    <center><h4 style="margin-top: 70px;">Status Layanan</h4></center>
    <hr>
    <div class="row">
        <h5 class="label-head mb-3" style="color:#feb52b;">Identitas Pemohon</h5>
        <div class="col-lg-6 col-12">    
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Nama Pemohon</p>
                <p class="text-wrap">{{ $layanan->nama_pemohon ? $layanan->nama_pemohon : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">NIP Pemohon</p>
                <p class="text-wrap">{{ $layanan->nip_pemohon ? $layanan->nip_pemohon : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Jabatan Pemohon</p>
                <p class="text-wrap">{{ $layanan->jabatan ? $layanan->jabatan : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">No HP Pemohon</p>
                <p class="text-wrap">{{ $layanan->no_hp_pemohon ? $layanan->no_hp_pemohon : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Email</p>
                <p class="text-wrap">{{ $layanan->email ? $layanan->email : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Instansi</p>
                <p class="text-wrap">{{ $layanan->instansi->nama_instansi }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Alamat Kantor</p>
                @if($layanan->alamat_kantor)
                <p class="text-wrap">
                    @php
                    $maxLength = 60;
                    
                    $alamat_kantor = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $layanan->alamat_kantor, 0, PREG_SPLIT_NO_EMPTY);
                    echo $alamat_kantor_split = implode("<br>",$alamat_kantor);
                    
                    @endphp
                </p>
                @else
                <p class="text-wrap">-</p>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-12">    
            <div class="mb-3 status_progress">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Status</p>
                @if($layanan->status == "Selesai")
                <b><span id="status_status" class="text-success text-wrap">{{ $layanan->status }}</span></b>
                <a href="{{ asset('/ticketing/export/'.$layanan->id_layanan) }}" id="berita_acara" class="text-info">- Cetak Berita Acara</a>
                @elseif($layanan->status == "Sedang Dikerjakan" || $layanan->status == "Menunggu Validasi")
                <b><span id="status_status" class="text-info text-wrap">Sedang Dikerjakan</span></b>
                @elseif($layanan->status == "Menunggu Respon" || $layanan->status == "Belum Disposisi")
                <b><span id="status_status" class="text-warning text-wrap">Menunggu Respon</span></b>
                @elseif($layanan->status == "Dibatalkan")
                <b><span id="status_status" class="text-danger text-wrap">{{ $layanan->status }}</span></b>
                @endif
            </div>
            @if($layanan->kategori != "Troubleshooting Aplikasi")
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Surat Permohonan</p>
                @if($layanan->surat_permohonan)
                <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/surat_permohonan/'.$layanan->surat_permohonan) }}">Lihat Surat Permohonan</a>
                @else
                -
                @endif
            </div>
            @endif
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tanggal Permohonan</p>
                <p id="status_tanggal_permohonan text-wrap">{{ \Carbon\Carbon::parse($layanan->tanggal_penerimaan)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($layanan->tanggal_penerimaan)->isoFormat('D MMMM Y')}}</p>
            </div>
            @if($layanan->tanggal_proses)
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tanggal Proses</p>
                <p id="status_tanggal_permohonan text-wrap">{{ \Carbon\Carbon::parse($layanan->tanggal_proses)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($layanan->tanggal_proses)->isoFormat('D MMMM Y')}}</p>
            </div>
            @endif
            @if($layanan->status == "Selesai")
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tanggal Selesai</p>
                <p id="status_tanggal_selesai text-wrap">{{ \Carbon\Carbon::parse($layanan->tanggal_selesai)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($layanan->tanggal_selesai)->isoFormat('D MMMM Y')}}</p>
            </div>
            @endif
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6 col-12">    
            <h5 class="label-head mb-3" style="color:#feb52b;">Detail Layanan</h5>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Kategori Layanan</p>
                <p id="status_kategori">{{ $layanan->kategori }}</p>
            </div>
            @if($layanan->kategori == "Publikasi Media Video dan Grafis")
            <div id="publikasi_media_video_dan_grafis">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Jenis Media atau Konten</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->jenis_media }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Deskripsi Permohonan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->deskripsi }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">File Media atau Konten</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/kip/file_media/'.$layanan->layanan_detail->file_media) }}">Lihat File Media</a>
                </div>
            </div>
            @elseif($layanan->kategori == "Dukungan Komunikasi dan Informasi Publik")
            <div id="publikasi_media_video_dan_grafis">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Jenis Kebutuhan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->jenis_kebutuhan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Tanggal Pelaksanaan</p>
                    <p class="mb-0 text-wrap">
                    {{ \Carbon\Carbon::parse($layanan->layanan_detail->waktu_pelaksanaan)->isoFormat('dddd, D MMMM Y')}} 
                    </p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">Deskripsi Permohonan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->deskripsi }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap">File Materi Kegiatan</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/kip/file_materi/'.$layanan->layanan_detail->file_materi) }}">Lihat File Materi</a>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-6 col-12">    
            <h5 class="label-head mb-3" style="color:#feb52b;">Informasi Perwakilan</h5>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tenaga Yang Bertugas</p>
                <ul class="text-wrap" style="padding: 0; list-style-type: none;">
                    @if($layanan->status == "Belum Disposisi")
                        <li class="text-wrap">-</li>
                    @else
                        @foreach($layanan->layanan_kip_disposisi as $ld)
                            <li class="text-wrap">{{ $ld->user->nama_lengkap }} - (No HP: {{ $ld->user->no_telp }})</li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @if($layanan->status == "Selesai")
                <h5 class="label-head mb-3" style="color:#feb52b;">Penyelesaian Layanan</h5>
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Laporan/Ringkasan Penyelesaian</p>
                    @if($layanan->hasil_text != null)
                    <p class="mt-0 text-wrap text-justify">{{ $layanan->hasil_text }}</p>
                    @else
                    <p class="mt-0 text-wrap">-</p>
                    @endif
                </div>
                @if($layanan->alat_kerja != null)
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Alat Kerja</p>
                    <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_alat_kerja">
                    @foreach(explode(', ', $layanan->alat_kerja) as $ak)
                        <li class="text-wrap">- {{ $ak }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                @if($layanan->link != null)
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Link</p>
                    <a class="text-info" target="_blank" href="{{ $layanan->link }}">{{ $layanan->link }}</a>
                </div>
                @endif
                @if($layanan->hasil_file != null)
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Laporan File PDF</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/kip/hasil_file/'.$layanan->hasil_file) }}">Lihat Laporan File PDF</a>
                </div>
                @endif
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Dokumentasi Hasil</p>
                    @if($layanan->hasil_image != null)
                    <img src="{{ asset('/storage/layanan/kip/hasil_image/'.$layanan->hasil_image) }}" style="object-fit: contain; max-height: 400px" class="rounded float-start mb-3 mt-3" alt="Dokumentasi Hasil">
                    @else
                    <p class="mt-0 text-wrap">-</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>