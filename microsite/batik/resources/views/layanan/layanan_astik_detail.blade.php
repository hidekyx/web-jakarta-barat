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
            @if($layanan->kategori != "Troubleshooting Aplikasi")
            <hr>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Nama Narahubung</p>
                <p class="text-wrap">{{ $layanan->nama_narahubung ? $layanan->nama_narahubung : '-' }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">No HP Narahubung</p>
                <p class="text-wrap">{{ $layanan->no_hp_narahubung ? $layanan->no_hp_narahubung : '-' }}</p>
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
            @if($layanan->kategori == "Troubleshooting Aplikasi")
            <div id="troubleshooting_aplikasi">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Jenis Permasalahan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->jenis_permasalahan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Penjelasan Permasalahan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->penjelasan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Screenshot Error</p>
                    @if($layanan->surat_permohonan != null)
                    <img src="{{ asset('/storage/layanan/astik/surat_permohonan/'.$layanan->surat_permohonan) }}" width="300px" height="250px" style="object-fit: cover;" class="rounded float-start mb-3 mt-3" alt="Screenshot Error">
                    @else
                    <p class="mt-0 text-wrap">-</p>
                    @endif
                </div>
            </div>
            @elseif($layanan->kategori == "Kontra Penginderaan")
            <div id="kontra_penginderaan">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Waktu Pelaksanaan</p>
                    <p class="mb-0 text-wrap">
                    {{ \Carbon\Carbon::parse($layanan->layanan_detail->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y')}} 
                    <br>
                    Jam: {{ \Carbon\Carbon::parse($layanan->layanan_detail->waktu_mulai)->isoFormat('H:m')}}
                    </p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Lokasi Pelaksanaan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->lokasi_pelaksanaan }}</p>
                </div>
            </div>
            @elseif($layanan->kategori == "Pengamanan Sinyal")
            <div id="pengamanan_sinyal">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Waktu Pelaksanaan</p>
                    <p class="mb-0 text-wrap">
                    {{ \Carbon\Carbon::parse($layanan->layanan_detail->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM Y')}} 
                    <br>
                    Jam: {{ \Carbon\Carbon::parse($layanan->layanan_detail->waktu_mulai)->isoFormat('H:m')}} - {{ \Carbon\Carbon::parse($layanan->layanan_detail->waktu_selesai)->isoFormat('H:m')}}
                    </p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Lokasi Pelaksanaan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->lokasi_pelaksanaan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Jammer Sinyal</p>
                    <p class="mb-0 text-wrap">
                    @foreach(explode("|", $layanan->layanan_detail->jammer_sinyal) as $js)
                    - {{ $js }}
                    <br>
                    @endforeach
                    </p>
                </div>
            </div>
            @elseif($layanan->kategori == "Penetration Testing")
            <div id="penetration_testing">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Nama Domain</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->nama_domain }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Jenis Web</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->jenis_web }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Fungsi Web</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->fungsi_web }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Lokasi Server</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->lokasi_server }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">IP Address</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->ip_address }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Port Yang Digunakan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->port }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Sistem Operasi</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->operating_system }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Protokol</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->protokol }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Bahasa Pemrograman</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->bahasa }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Database</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->database }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Service Lain Yang Digunakan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->service ? $layanan->layanan_detail->service : '-' }}</p>
                </div>
            </div>
            @elseif($layanan->kategori == "Optimalisasi Komputer / Laptop")
            <div id="optimalisasi_komputer">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Penjelasan Permasalahan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->penjelasan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Perangkat</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->perangkat }}</p>
                </div>
            </div>
            @elseif($layanan->kategori == "Pemulihan Akun Pemerintahan Yang Diretas")
            <div id="pemulihan_akun">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Penjelasan Permasalahan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->penjelasan }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Seksi/SubBag/Satpel</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->seksi }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Bidang/Unit/Bagian</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->bidang }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Perangkat Daerah</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->perangkat_daerah }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Jenis Akun</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->jenis_akun }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Target Akun/Nomor Yang Dipulihkan</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->target_akun }}</p>
                </div>
            </div>
            @elseif($layanan->kategori == "Sertifikat Elektronik")
            <div id="sertifikat_elektronik">
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">NIK Pemohon</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->nik_pemohon }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Organisasi</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->organisasi }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Kota</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->kota }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">Provinsi</p>
                    <p class="mb-0 text-wrap">{{ $layanan->layanan_detail->provinsi }}</p>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">File E-KTP</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/ektp/'.$layanan->layanan_detail->file_ektp) }}">Lihat File E-KTP</a>
                </div>
                <div class="mb-3">
                    <p class="label-body mb-0 label-deskripsi fw-bold text-wrap" style="color:#0b0f28;">File SK Jabatan/SK Penempatan</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/sk/'.$layanan->layanan_detail->file_sk) }}">Lihat File SK Jabatan/SK Penempatan</a>
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
                        @foreach($layanan->layanan_astik_disposisi as $ld)
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
                @if($layanan->hasil_file != null)
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Laporan File PDF</p>
                    <a class="text-info" target="_blank" href="{{ asset('/storage/layanan/astik/hasil_file/'.$layanan->hasil_file) }}">Lihat Laporan File PDF</a>
                </div>
                @endif
                <div class="mb-3">
                    <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Dokumentasi Hasil</p>
                    @if($layanan->hasil_image != null)
                    <img src="{{ asset('/storage/layanan/astik/hasil_image/'.$layanan->hasil_image) }}" style="object-fit: contain; max-height: 400px" class="rounded float-start mb-3 mt-3" alt="Dokumentasi Hasil">
                    @else
                    <p class="mt-0 text-wrap">-</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>