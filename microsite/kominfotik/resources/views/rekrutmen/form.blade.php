<div class="col-12 mt-5">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-4">Form Calon Kandidat PJLP 2024 - Sudis Kominfotik JB</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/rekrutmen/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">
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
        </div>
        <div class="row">
            <div class="col-lg-6">    
                <h6 class="text-dark text-sm ">Identitas Kandidat: </h6>
                <div class="input-group input-group-outline">
                    <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" required oninvalid="this.setCustomValidity('Nama Lengkap wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
                <div class="input-group input-group-outline my-3">
                    <input name="nik" type="number" class="form-control" placeholder="NIK" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==16) return false;" required oninvalid="this.setCustomValidity('NIK wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
                <div class="input-group input-group-outline my-3">
                    <input name="no_telp" type="number" class="form-control" placeholder="Nomor HP" required oninvalid="this.setCustomValidity('No Telp wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Lahir: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal_lahir" type="date" class="form-control" required oninvalid="this.setCustomValidity('Tanggal Lahir wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
                <div class="input-group input-group-outline my-3">
                    <input name="alamat" type="text" class="form-control" placeholder="Alamat Lengkap" required oninvalid="this.setCustomValidity('Alamat wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
                <div class="input-group input-group-outline my-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" required oninvalid="this.setCustomValidity('Email wajib diisi')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col-lg-12">
                <h6 class="text-dark text-sm ">Posisi Yang Dilamar: </h6>
                <div class="input-group input-group-outline mb-1">
                    <select class="selectpicker w-100" id="posisi" title="Posisi" data-live-search="true" data-size="8" name="posisi" required>
                    <optgroup label="Seksi Infrastruktur Data">
                        <option value="TJJ">Teknisi Jaringan Junior</option>
                        <option value="TJS">Teknisi Jaringan Senior</option>
                    </optgroup>
                    <optgroup label="Seksi Komunikasi dan Informasi Publik">
                        <option value="OMS">Operator Media Sosial</option>
                        <option value="EV">Editor Video</option>
                        <option value="DG">Desainer Grafis</option>
                        <option value="FG">Fotografer</option>
                        <option value="REP">Reporter</option>
                        <option value="EB">Editor Berita</option>
                    </optgroup>
                    <optgroup label="Seksi Aplikasi Siber dan Statistik">
                        <option value="TWA">Tenaga Web Aplikasi</option>
                        <option value="TSKI">Technical Support Keamanan Informasi</option>
                    </optgroup>
                    </select>
                </div>
            </div>
        </div>
        <div id="Persyaratan" style="display: none;">
        <h6 class="text-dark text-sm ">Persyaratan Khusus: </h6>
        <ul id="wrapper"></ul>
        </div>
        <script type=text/javascript>
        $(document).ready(function() {
            posisi_awal = null;
            $('#posisi').on('change', function() {
                posisi = this.value;
                $.ajax({ 
                    type: "GET",
                    url: "persyaratan/" + posisi,       
                    success: function (data) {
                        $('#Persyaratan').fadeIn();
                        $('#Lampiran').fadeIn();
                        $('#kirim').fadeIn();
                        if (posisi != posisi_awal) {
                            $('.' + posisi_awal).remove();
                        }
                        for (let i = 0; i < data.length; i++) {
                            $('#wrapper').append('<li class="text-xs text-secondary '+ data[i].posisi +'">'+ data[i].keterangan +'</li>');
                            posisi_awal = data[i].posisi;
                        }
                        if (posisi == "EV" || posisi == "DG") {
                            $('#portofolio').fadeIn();
                            $('#portofolio_form').prop('required', true);
                            $('#sim').fadeOut();
                            $('#sim_form').prop('required', false);
                        }
                        else if (posisi == "TJJ" || posisi == "TJS" || posisi == "FG" || posisi == "REP") {
                            $('#sim').fadeIn();
                            $('#sim_form').prop('required', true);
                            $('#portofolio').fadeOut();
                            $('#portofolio_form').prop('required', false);
                        }
                        else {
                            $('#portofolio').fadeOut();
                            $('#portofolio_form').prop('required', false);
                            $('#sim').fadeOut();
                            $('#sim_form').prop('required', false);
                        }
                    }
                });
            });
        });
        </script>
        <hr>
        <div id="Lampiran" style="display: none;">
        <h6 class="text-dark text-sm ">Lampiran Berkas Kandidat: </h6>
        <i class="text-xs text-secondary">(*)Scan asli Surat Lamaran Kerja ditujukan kepada Pejabat Pengadaan Barang/Jasa (PPBJ) Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi Jakarta Barat;</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_surat_lamaran_kerja" accept=".pdf" required oninvalid="this.setCustomValidity('Scan surat lamaran kerja wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <i class="text-xs text-secondary">(*)Scan asli Daftar Riwayat Hidup ditempel foto 4x6 dan ditandatangani</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_daftar_riwayat_hidup" accept=".pdf" required oninvalid="this.setCustomValidity('Scan daftar riwayat hidup wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <i class="text-xs text-secondary">(*)Scan asli Kartu Tanda Penduduk (KTP) dan/atau Surat Keterangan Domisili</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_ktp" accept=".pdf" required oninvalid="this.setCustomValidity('Scan KTP wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <i class="text-xs text-secondary">(*)Scan asli Nomor Pokok Wajib Pajak (NPWP)</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_npwp" accept=".pdf" required oninvalid="this.setCustomValidity('Scan NPWP wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <i class="text-xs text-secondary">(*)Scan asli Ijazah dan Transkrip Nilai pendidikan formal terakhir</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_ijazah" accept=".pdf" required oninvalid="this.setCustomValidity('Scan Ijazah wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <i class="text-xs text-secondary">(*)Scan asli Sertifikat Kompetensi/Training pendukung maksimal 2 (dua) tahun terakhir (dijadikan 1 file pdf)</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_sertifikat_pendukung" accept=".pdf" required oninvalid="this.setCustomValidity('Scan sertifikat pendukung wajib diupload')" oninput="this.setCustomValidity('')">
        </div>

        <div style="display: none;" id="sim">
            <i class="text-xs text-secondary">(*)Scan asli Surat Ijin Mengemudi (SIM A/C) yang masih berlaku (Teknisi Jaringan, Fotografer, dan Reporter)</i>
            <div class="mb-3">
                <input class="form-control" type="file" id="sim_form" name="scan_sim" accept=".pdf" oninvalid="this.setCustomValidity('Scan SIM wajib diupload')" oninput="this.setCustomValidity('')">
            </div>
        </div>

        <div style="display: none;" id="portofolio">
            <i class="text-xs text-secondary">(*)Portofolio media sesuai posisi yang dilamar (bisa dalam bentuk link google drive, sosial media, atau youtube channel)</i>
            <div class="input-group input-group-outline mb-3">
                <input name="portofolio" type="text" id="portofolio_form" class="form-control" placeholder="Portofolio">
            </div>
        </div>

        <i class="text-xs text-secondary">Scan asli Surat Keterangan Pengalaman Kerja sesuai dengan bidangnya</i>
        <div class="mb-3">
            <input class="form-control" type="file" name="scan_surat_pengalaman_kerja" accept=".pdf">
        </div>

        <i class="text-xs text-secondary">- Tanda <b>(*)</b> artinya calon kandidat wajib melampirkan berkas tersebut</i><br>
        <i class="text-xs text-secondary">- Harap calon kandidat hanya mengupload lampiran dalam format <b>.PDF</b> dengan maksimal ukuran file 2MB</i><br>
        <i class="text-xs text-secondary">- Calon kandidat dapat mengecek status rekrutmen dengan mencari berdasarkan <b>NIK sesuai dengan yang diisi</b></i>
        <hr class="my-3">
        </div>
        <div class="text-center">
            <button type="submit" id="kirim" style="display: none;" class="btn btn-success">Kirim Data Kandidat</button>
            <!-- <button type="button" class="btn btn-success mb-2" id="kirim" data-toggle="modal" data-target="#submitid" style="display: none;">Kirim</button> -->
            <!-- Modal Submit -->
            <!-- <div class="modal fade" id="submitid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Kirim Data Lamaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Setelah kirim data lamaran anda tidak akan bisa merubahnya lagi, lanjutkan?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-success">Kirim Data</button>
                    </div>
                    </div>
                </div>
            </div> -->
        </div>
        </form>
    </div>
    </div>
</div>