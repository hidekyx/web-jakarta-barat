<div class="col-12 mt-5">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row mb-4">
        <div class="col-md-6">
            <h6>Cek Status Data Layanan</h6>
            <form role="form" class="text-start">
            <div class="input-group input-group-outline" style="width:fit-content">
                <input type="text" class="form-control" placeholder="Kode Layanan" name="kode_layanan">
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
        @if($layanan != null)
        <div class="row">
            <div class="col-lg-6">    
                <h6 class="text-dark text-sm ">Identitas Pemohon: </h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm font-weight-bold" style="background-color: #f0f2f5;">
                            <td>Nama</td>
                            <td>No. Telp / HP / Email</td>
                            <td>Instansi</td>
                        </tr>
                        <tr>
                            <td class="text-sm">{{ $layanan->nama_pemohon }}</td>
                            <td class="text-sm">{{ $layanan->kontak }}</td>
                            <td class="text-sm">{{ $layanan->instansi->nama_instansi }}</td>
                        </tr>
                        <tr class="text-sm font-weight-bold">
                            <td colspan="4" style="background-color: #f0f2f5;">Alamat</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            <td colspan="4" class="text-sm">{{ $layanan->alamat }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col">
                        <h6 class="text-dark text-sm ">Tanggal Permohonan: </h6>
                        <div class="mb-3 text-sm">
                            {{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd, DD MMMM Y')}}
                        </div>
                        @if($layanan->status == "Sedang Dikerjakan")
                        <h6 class="text-dark text-sm ">Teknisi: </h6>
                        <div class="mb-3 text-sm">
                            @foreach($layanan->layanan_detail as $index => $ld)
                                @if($ld->id_layanan_kategori == 8)
                                - {{ $ld->disposisi->nama_lengkap }} ({{ $ld->disposisi->no_telp }})<br>
                                @endif
                            @endforeach
                        </div>
                        @elseif($layanan->status == "Selesai")
                        <h6 class="text-dark text-sm ">Tanggal Selesai: </h6>
                        <div class="mb-3 text-sm">
                            {{ \Carbon\Carbon::parse($layanan->tanggal_selesai)->isoFormat('dddd, DD MMMM Y')}}
                        </div>
                        @endif
                    </div>
                    <div class="col">
                        <h6 class="text-dark text-sm ">Status: </h6>
                        <div class="mb-3 text-sm">
                            @if($layanan->status == "Belum Disposisi" || $layanan->status == "Menunggu Respon")
                            <span class="font-weight-bolder text-warning">Menunggu Respon</span>
                            @elseif($layanan->status == "Sedang Dikerjakan")
                            <span class="font-weight-bolder text-info">{{ $layanan->status }}</span>
                            @elseif($layanan->status == "Dibatalkan")
                            <span class="font-weight-bolder text-danger">{{ $layanan->status }}</span>
                            @elseif($layanan->status == "Selesai")
                            <span class="font-weight-bolder text-success pr-2">{{ $layanan->status }}</span>
                            <a class="text-info" href="{{ asset('/ticketing/export/'.$layanan->id_layanan) }}"><i class="fa fa-arrow-right text-info me-2"></i>Download File Berita Acara</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($layanan->status == "Selesai")
            <div class="col-lg-12">    
                <h6 class="text-dark text-sm ">Data Layanan: </h6>
                <div class="table-responsive">
                    <table class="table table-bordered" style="border-color: #f0f2f5;">
                        <tr class="text-sm font-weight-bold" style="background-color: #f0f2f5;">
                            <td>Nama</td>
                            <td>Cakupan</td>
                            <td>Jenis Permohonan/Penanganan</td>
                            <td>Deskripsi Permohonan</td>
                            <td>Perangkat Jaringan Yang Ditangani</td>
                            <td>Perangkat Kominfotik</td>
                            <td>IP Address Yang Digunakan</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            <td class="text-sm">
                            @php
                                $maxLength = 25;
                                
                                $kategori = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $layanan->kategori, 0, PREG_SPLIT_NO_EMPTY);
                                echo $kategori_split = implode("<br>",$kategori);
                                
                                @endphp
                            </td>
                            <td class="text-sm">{{ $layanan->cakupan }}</td>
                            <td class="text-sm">
                                @foreach($layanan->layanan_detail as $index => $ld)
                                    @if($ld->id_layanan_kategori == 1)
                                    - {{ $ld->value }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-sm">
                                @php
                                $maxLength = 25;
                                
                                $deskripsi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $layanan->deskripsi, 0, PREG_SPLIT_NO_EMPTY);
                                echo $deskripsi_split = implode("<br>",$deskripsi);
                                
                                @endphp
                            </td>
                            <td class="text-sm">
                                @foreach($layanan->layanan_detail as $index => $ld)
                                    @if($ld->id_layanan_kategori == 4)
                                    - {{ $ld->value }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-sm">
                                @foreach($layanan->layanan_detail as $index => $ld)
                                    @if($ld->id_layanan_kategori == 6)
                                    - {{ $ld->value }} <br>SN: {{ $ld->value_2 }}<br>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-sm">
                                @foreach($layanan->layanan_detail as $index => $ld)
                                    @if($ld->id_layanan_kategori == 7)
                                    {{ $ld->value }} s/d<br> {{ $ld->value_2 }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr class="text-sm font-weight-bold">
                            @if($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan")
                            <td style="background-color: #f0f2f5;">Surat</td>
                            @endif
                            <td style="background-color: #f0f2f5;">Penjelasan Pekerjaan</td>
                            <td colspan="7" style="background-color: #f0f2f5;">Teknisi Yang Bertugas</td>
                        </tr>
                        <tr style="border-width: 1px; border-color: #dee2e6;">
                            @if($layanan->kategori == "Instalasi, Penambahan, dan Penataan Jaringan")
                            <td class="text-sm" style="border-width: 1px; border-color: #dee2e6;">
                                <p class="text-sm font-weight-bold mb-0">No: {{ $layanan->no_surat }}</p>
                                <p class="text-sm text-secondary mb-0">{{ $layanan->tanggal_surat }}</p>
                                <p class="text-sm text-secondary mb-0">Perihal: {{ $layanan->perihal_surat }}</p>
                                <p class="text-sm text-secondary mb-0"><a class="text-primary font-weight-bold mb-2" target="_blank" href="{{ asset('storage/images/layanan/surat/'.$layanan->file_surat) }}">Download File Surat</a></p>
                            </td>
                            @endif
                            <td class="text-sm" style="border-width: 1px; border-color: #dee2e6;">{{ $layanan->penjelasan_pekerjaan }}</td>
                            <td colspan="7" style="border-width: 1px; border-color: #dee2e6;" class="text-sm">
                                @foreach($layanan->layanan_detail as $index => $ld)
                                    @if($ld->id_layanan_kategori == 8)
                                    - {{ $ld->disposisi->nama_lengkap }}<br>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @endif
        <hr class="my-3">
    </div>
    </div>
</div>