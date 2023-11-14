<div class="row">
<div class="col-12">
    <div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <div class="row">
            <div class="col-8 d-flex align-items-center">
                <h6 class="text-white text-capitalize ps-3">Daftar Layanan Jaringan Masuk</h6>
            </div>
        </div>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2 mx-0">
    <div class="row px-4">
        @if(session('errors'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                @foreach ($errors->all() as $error)
                <span class="text-sm">{{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                <span class="text-sm">{{ Session::get('error') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
            <div class="col-12 col-lg">
                <div id="cari">
                    <form role="form" class="text-start">
                    <div class="row">
                        <div class="col-lg col-12 mb-3">
                            <h6 class="text-dark text-sm ">Posisi: </h6>
                            <div class="input-group input-group-outline">
                            <select class="selectpicker w-100" id="posisi" title="Posisi" data-live-search="true" data-size="5" name="posisi">
                                <optgroup label="Infrastruktur Data">
                                    <option value="TJJ">Teknisi Jaringan Junior</option>
                                    <option value="TJS">Teknisi Jaringan Senior</option>
                                </optgroup>
                                <optgroup label="Komunikasi dan Informasi Publik">
                                    <option value="OMS">Operator Media Sosial</option>
                                    <option value="EV">Editor Video</option>
                                    <option value="DG">Desainer Grafis</option>
                                    <option value="FG">Fotografer</option>
                                    <option value="REP">Reporter</option>
                                    <option value="EB">Editor Berita</option>
                                <optgroup label="Aplikasi Siber dan Statistik">
                                    <option value="TWA">Tenaga Web Aplikasi</option>
                                    <option value="TSKI">Techinical Support Keamanan Informasi</option>
                                </optgroup>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg col-12">
                            <h6 class="text-dark text-sm ">NIK: </h6>
                            <div class="input-group input-group-outline">
                                <input name="nik" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg col-12">
                            <h6 class="text-sm" style="visibility: hidden;">Cari</h6>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="table-responsive p-0">
        <table class="table table-hover align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7" style="width: 20px;">No</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Berkas</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Nama Kandidat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Posisi</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">NIK Kandidat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Kontak Kandidat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Tanggal Lahir</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">Menu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekrutmen as $index => $r)
                <tr>
                    <td>
                        <p class="text-xs mb-0 ps-3">{{ $index+1 }}</p>
                    </td>
                    <td>
                        <button class="btn btn-sm mb-0 btn-info" id="tombol-{{ $r->id_rekrutmen }}">Detail</button>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $r->nama_lengkap }}</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ strtoupper($r->posisi) }}</p>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">{{ $r->nik }}</p>
                    </td>
                    <td>
                        <p class="text-xs text-secondary mb-0">Email: {{ $r->email }}</p>
                        <p class="text-xs text-secondary mb-0">No Telp: {{ $r->no_telp }}</p>
                    </td>
                    <td>
                        <p class="text-xs mb-0">{{ \Carbon\Carbon::parse($r->tanggal_lahir)->isoFormat('D MMMM Y')}}</p>
                    </td>
                    <td>
                        <p class="text-xs mb-0">
                            @php
                            $maxLength = 20;
                            
                            $alamat = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $r->alamat, 0, PREG_SPLIT_NO_EMPTY);
                            echo $alamat_split = implode("<br>",$alamat);
                            
                            @endphp
                        </p>
                    </td>
                    <td>
                        @if($r->status == "Menunggu Pengumuman")
                        -
                        @elseif($r->status == "Lolos Administrasi")
                        <p class="text-xs font-weight-bold text-success mb-0">{{ $r->status }}</p>
                        @elseif($r->status == "Tidak Lolos Administrasi")
                        <p class="text-xs font-weight-bold text-danger mb-0">{{ $r->status }}</p>
                        @endif
                    </td>
                    <td>
                        @if($r->status == "Menunggu Pengumuman")
                        <form role="form" class="text-start" action="{{ asset('/manage-rekrutmen/lolos/'.$r->id_rekrutmen); }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-sm mb-0 btn-success" type="button" data-toggle="modal" data-target="#loloskan-{{ $r->id_rekrutmen }}">Loloskan</button>
                        <div class="modal fade" id="loloskan-{{ $r->id_rekrutmen }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Seleksi Kandidat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Anda yakin ingin konfirmasi data kandidat ini?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-success">Loloskan</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        @elseif($r->status == "Lolos Administrasi")
                        <form role="form" class="text-start" action="{{ asset('/manage-rekrutmen/reset/'.$r->id_rekrutmen); }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-sm mb-0 btn-warning" type="button" data-toggle="modal" data-target="#batalkan-{{ $r->id_rekrutmen }}">Reset</button>
                        <div class="modal fade" id="batalkan-{{ $r->id_rekrutmen }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Reset Kandidat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Anda yakin ingin reset data kandidat ini?</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                                    <button type="submit" class="btn btn-warning">Reset</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        @endif
                    </td>
                    <style>
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
            </tbody>
            <script>
            $(document).ready(function(){
                $("#tombol-{{ $r->id_rekrutmen }}").click(function(){
                    var detail = $('#detail-{{ $r->id_rekrutmen }}');
                    if($(detail).css('display') == 'none') {
                        $(detail).fadeIn();
                    }
                    else {
                        $(detail).fadeOut();
                    }
                });
            });
            </script>
            <tbody style="display: none;" id="detail-{{ $r->id_rekrutmen }}">
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan Surat Lamaran Kerja</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_surat_lamaran_kerja) }}">{{ $r->scan_surat_lamaran_kerja }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan Daftar Riwayat Hidup</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_daftar_riwayat_hidup) }}">{{ $r->scan_daftar_riwayat_hidup }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan KTP</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_ktp) }}">{{ $r->scan_ktp }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan NPWP</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_npwp) }}">{{ $r->scan_npwp }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan Ijazah dan Transkrip Nilai</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_ijazah) }}">{{ $r->scan_ijazah }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan Sertifikat Pendukung</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_sertifikat_pendukung) }}">{{ $r->scan_sertifikat_pendukung }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan SIM</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_sim) }}">{{ $r->scan_sim }}</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Scan Surat Pengalaman Kerja</td>
                    @if($r->scan_surat_pengalaman_kerja != null)
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ asset('storage/rekrutmen/berkas/'.$r->scan_surat_pengalaman_kerja) }}">{{ $r->scan_surat_pengalaman_kerja }}</a></td>
                    @else
                    <td colspan="8" class="text-xs font-weight-bold text-info">: -</td>
                    @endif
                </tr>
                @if($r->posisi == "EV" || $r->posisi == "DG")
                <tr>
                    <td></td>
                    <td class="text-xs font-weight-bold">Portofolio</td>
                    <td colspan="8" class="text-xs font-weight-bold text-info">: <a target="_blank" class="text-info" href="{{ $r->portofolio }}">{{ $r->portofolio }}</a></td>
                </tr>
                @endif
            </tbody>
            @endforeach
        </table>
        <hr class="mt-0">
        <div class="ml-4">
            {{ $rekrutmen->withQueryString()->links() }}
        </div>
       </div>
    </div>
    </div>
</div>
</div>
