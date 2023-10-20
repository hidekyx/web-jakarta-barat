<div class="sc-statistics-style white-bg-color">
    <center><h4 style="margin-top: 70px;">Status Layanan</h4></center>
    <hr>
    <div class="row">
        <h5 class="label-head mb-3" style="color:#feb52b;">Identitas Pemohon</h5>
        <div class="col-lg-6 col-12">    
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Nama</p>
                <p id="status_nama_pemohon">{{ $layanan->nama_pemohon }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">No. HP / Email</p>
                <p id="status_kontak">{{ $layanan->kontak }}</p>
            </div>
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Instansi</p>
                <p id="status_instansi">{{ $layanan->instansi->nama_instansi }}</p>
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
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tanggal Permohonan</p>
                <p id="status_tanggal_permohonan">{{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('D MMMM Y')}}</p>
            </div>
            @if($layanan->status == "Selesai")
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Tanggal Selesai</p>
                <p id="status_tanggal_selesai">{{ \Carbon\Carbon::parse($layanan->tanggal_selesai)->isoFormat('dddd')}}, {{ \Carbon\Carbon::parse($layanan->tanggal_selesai)->isoFormat('D MMMM Y')}}</p>
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
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Deskripsi</p>
                <p id="status_deskripsi" class="mb-0">{{ $layanan->deskripsi }}</p>
                <ul style="padding: 0; list-style-type: none;" id="status_jenis">
                    @foreach($layanan->layanan_detail as $index => $ld)
                        @if($ld->id_layanan_kategori == 1)
                        <li class="text-wrap">- {{ $ld->value }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @if($layanan->kategori != "Dukungan Zoom Meeting")
            <div class="mb-3">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Cakupan</p>
                <p id="status_cakupan">{{ $layanan->cakupan }}</p>
            </div>
            @endif
            @if($layanan->kategori == "Penanganan Permasalahan Jaringan")
            <div class="mb-3 div-penanganan">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Penanganan Yang Dilakukan</p>
                <ul class="text-wrap" style="padding: 0; list-style-type: none;" id="status_penanganan">
                @php $jumlah_penanganan = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 2)
                    <li class="text-wrap">- {{ $ld->value }}</li>
                    @php $jumlah_penanganan = $jumlah_penanganan + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_penanganan == 0)
                Tidak ada
                @endif
                </ul>
            </div>
            @endif
            @if($layanan->kategori != "Dukungan Zoom Meeting")
            <div class="mb-3 div-perangkat">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Perangkat Jaringan Yang Ditangani</p>
                <ul style="padding: 0; list-style-type: none;" id="status_perangkat">
                @php $jumlah_perangkat = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 4)
                    <li class="text-wrap">- {{ $ld->value }}</li>
                    @php $jumlah_perangkat = $jumlah_perangkat + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_perangkat == 0)
                Tidak ada
                @endif
                </ul>
            </div>
            <div class="mb-3 div-barang">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Barang Pakai Habis</p>
                <ul style="padding: 0; list-style-type: none;" id="status_barang">
                @php $jumlah_barang = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 5)
                    <li class="text-wrap">- {{ $ld->barang->nama_barang }}: {{ $ld->value_2 }} {{ $ld->barang->satuan }}</li>
                    @php $jumlah_barang = $jumlah_barang + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_barang == 0)
                Tidak ada
                @endif
                </ul>
            </div>
            <div class="mb-3 div-alat-kerja">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Alat Kerja</p>
                <ul style="padding: 0; list-style-type: none;" id="status_alat">
                @php $jumlah_alat = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 3)
                    <li class="text-wrap">- {{ $ld->value }}</li>
                    @php $jumlah_alat = $jumlah_alat + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_alat == 0)
                Tidak ada
                @endif
                </ul>
            </div>
            <div class="mb-3 div-perangkat-kominfotik">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Perangkat Kominfotik</p>
                <ul style="padding: 0; list-style-type: none;" id="status_perangkat_kominfotik">
                @php $jumlah_perangkat_kominfotik = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 6)
                    <li class="text-wrap">- {{ $ld->value }} (S/N: {{ $ld->value_2 }})</li>
                    @php $jumlah_perangkat_kominfotik = $jumlah_perangkat_kominfotik + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_perangkat_kominfotik == 0)
                Tidak ada
                @endif
                </ul>
            </div>
            <div class="mb-3 div-ip">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">IP Address Yang Digunakan</p>
                @if($ld->id_layanan_kategori == 7)
                <p class="text-wrap mt-0" id="status_ip">{{ $ld->value }} - {{ $ld->value_2 }}</p>
                @endif
            </div>
            @endif
            <div class="mb-3 div-ringkasan">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Ringkasan Pekerjaan</p>
                @if($layanan->penjelasan_pekerjaan == null)
                    Belum ada
                @else
                    <p id="status_ringkasan" class="text-wrap">
                        {{ $layanan->penjelasan_pekerjaan }}
                    </p>
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-12">    
            <h5 class="label-head mb-3" style="color:#feb52b;">Informasi Perwakilan</h5>
            <div class="mb-3 div-teknisi">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Teknisi Yang Bertugas</p>
                <ul style="padding: 0; list-style-type: none;" id="status_teknisi">
                @php $jumlah_teknisi = 0 @endphp
                @foreach($layanan->layanan_detail as $index => $ld)
                    @if($ld->id_layanan_kategori == 8)
                    <li class="text-wrap">- {{ $ld->disposisi->nama_lengkap }} (No HP: {{ $ld->disposisi->no_telp }})</li>
                    @php $jumlah_teknisi = $jumlah_teknisi + 1 @endphp
                    @endif
                @endforeach
                @if($jumlah_teknisi == 0)
                Belum ada
                @endif
                </ul>
            </div>
            <div class="mb-3 div-perwakilan">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Nama Perwakilan</p>
                @if($layanan->nama_perwakilan == null)
                Belum ada
                @else
                <p class="text-wrap" id="status_perwakilan">{{ $layanan->nama_perwakilan }} (NIP: {{ $layanan->nip_perwakilan }})</p>
                @endif
            </div>
            @if($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan")
            <div class="mb-3 div-surat">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Surat</p>
                <p class="text-wrap m-0 p-0">No Surat: {{ $layanan->no_surat}}</p>
                <p class="text-wrap m-0 p-0">Tanggal: {{ $layanan->tanggal_surat }}</p>
                <p class="text-wrap m-0 p-0">Perihal: {{ $layanan->perihal_surat }}</p>
                @if($layanan->file_surat != null)
                    <a class="text-info font-weight-bold mb-2 text-wrap" target="_blank" href="{{ asset('storage/layanan/id/surat/'.$layanan->file_surat) }}">Download File Surat</a>
                @endif
                </p>
            </div>
            @endif

            <div class="mb-3 div-foto-hasil">
                <p class="label-body mb-0 fw-bold text-wrap" style="color:#0b0f28;">Foto Hasil</p>
                @if($layanan->foto_hasil != null)
                <img src="{{ asset('/storage/layanan/id/hasil/'.$layanan->foto_hasil) }}" id="status_foto_hasil" style="object-fit: contain; max-height: 400px" class="rounded float-start mb-3 mt-3">
                @else
                <p id="status_foto_hasil_null" class="mt-0 text-wrap">Belum ada</p>
                @endif
            </div>
        </div>
    </div>
</div>