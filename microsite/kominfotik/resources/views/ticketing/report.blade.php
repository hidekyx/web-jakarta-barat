<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header bg-gradient-info shadow-dark pb-3 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0 text-white">Laporan Penyelesaian Aktifitas Layanan</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" id="ticketing" class="text-start" action="{{ asset('/ticketing/submit_report/'.$layanan->id_layanan); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
            <div class="col-lg">    
                <h6 class="text-primary text-sm ">Identitas Pemohon: </h6>
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
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <div class="mb-3 text-sm">
                        <h6 class="text-primary text-sm">Pegawai Disposisi: </h6>
                        <ul>
                            @foreach ($layanan->layanan_detail as $ld)
                                @if($ld->id_layanan_kategori == 8)
                                <li>{{ $ld->disposisi->nama_lengkap }}</li>
                                @endif
                            @endforeach
                        </ul>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="mb-3 text-sm">
                            <h6 class="text-primary text-sm">Tanggal Permohonan: </h6>
                            {{ \Carbon\Carbon::parse($layanan->tanggal)->isoFormat('dddd, DD MMMM Y')}}
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg">
                <h6 class="text-primary text-sm">Data Layanan: </h6>
                <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #f0f2f5;">
                    <tbody>
                    <tr>
                        <td class="text-sm font-weight-bold">Kategori</td>
                        <td class="text-sm">{{ $layanan->kategori }}</td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Cakupan</td>
                        <td class="text-sm">{{ $layanan->cakupan }}</td>
                    </tr>
                    @if($layanan->kategori != "Dukungan Zoom Meeting")
                    <tr>
                        <td class="text-sm font-weight-bold">Jenis Permasalahan Jaringan</td>
                        <td class="text-sm">
                            @foreach ($layanan->layanan_detail as $ld)
                                @if($ld->id_layanan_kategori == 1)
                                - {{ $ld->value }}<br>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endif
                    <tr style="border-width: 1px; border-color: #dee2e6;">
                        <td class="text-sm font-weight-bold">Deskripsi Permasalahan</td>
                        <td class="text-sm">
                            @php
                            $maxLength = 50;
                            
                            $deskripsi = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $layanan->deskripsi, 0, PREG_SPLIT_NO_EMPTY);
                            echo $deskripsi_split = implode("<br>",$deskripsi);
                            
                            @endphp
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <h6 class="text-primary text-sm">Laporan Layanan: </h6>
                <div class="table-responsive">
                <table class="table table-bordered" style="border-color: #f0f2f5;">
                    <tbody>
                    @if($kategori == "Report Penanganan")
                    <tr>
                        <td class="text-sm font-weight-bold">Penanganan <br>Yang Dilakukan
                        </td>
                        <td class="text-sm">
                        <div class="form-group options">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_1" name="penanganan[]" value="Setting IP Address">
                                <label class="custom-control-label" for="penanganan_1">Setting IP Address</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_2" name="penanganan[]" value="Cek jalur kabel">
                                <label class="custom-control-label" for="penanganan_2">Cek jalur kabel</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_3" name="penanganan[]" value="Cek perangkat jaringan">
                                <label class="custom-control-label" for="penanganan_3">Cek perangkat jaringan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_4" name="penanganan[]" value="Cek koneksi">
                                <label class="custom-control-label" for="penanganan_4">Cek koneksi</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_5" name="penanganan[]" value="Crimping kabel UTP">
                                <label class="custom-control-label" for="penanganan_5">Crimping kabel UTP</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_6" name="penanganan[]" value="Penarikan kabel UTP">
                                <label class="custom-control-label" for="penanganan_6">Penarikan kabel UTP</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_7" name="penanganan[]" value="Konfigurasi perangkat">
                                <label class="custom-control-label" for="penanganan_7">Konfigurasi perangkat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_8" name="penanganan[]" value="Pasang perangkat jaringan">
                                <label class="custom-control-label" for="penanganan_8">Pasang perangkat jaringan</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_9" name="penanganan[]" value="Melaporkan ke dinas atau vendor">
                                <label class="custom-control-label" for="penanganan_9">Melaporkan ke dinas atau vendor</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input penanganan" id="penanganan_10" onchange='handleChange(this);'>
                                <label class="custom-control-label" for="penanganan_10">Lainnya</label>
                            </div>
                            <div class="col collapse mt-2" id="penanganan_lainnya">
                                <div class="input-group input-group-outline mb-3" id="penanganan_lainnya_form">
                                    <label class="form-label">Penanganan Lainnya</label>
                                    <input name="penanganan_lainnya" id="penanganan_lainnya_text" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <script>
                            var checkbox_penanganan = $("input.penanganan:checkbox");
                            checkbox_penanganan.prop('required', true);
                            checkbox_penanganan.on('click', function() {
                                if (checkbox_penanganan.is(':checked')) {
                                    checkbox_penanganan.prop('required', false);
                                }
                                else {
                                    checkbox_penanganan.prop('required', true);
                                }
                            });
                        </script>
                        <script>
                            function handleChange(checkbox) {
                                if(checkbox.checked == true){
                                    $('#penanganan_lainnya').collapse('show');
                                    $('#penanganan_lainnya_text').prop('required', true);
                                }
                                else{
                                    $('#penanganan_lainnya').collapse('hide');
                                    $('#penanganan_lainnya_text').prop('required', false);
                                }
                            }
                        </script>
                        </td>
                    </tr>
                    @endif
                    @if($layanan->kategori != "Dukungan Zoom Meeting")
                    <tr>
                        <td class="text-sm font-weight-bold">Perangkat Jaringan <br>Yang Ditangani</td>
                        <td class="text-sm">
                        <div class="form-group options">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_1" name="perangkat[]" value="Modem">
                                <label class="custom-control-label" for="perangkat_1">Modem</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_2" name="perangkat[]" value="Catalyst">
                                <label class="custom-control-label" for="perangkat_2">Catalyst</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_3" name="perangkat[]" value="Wifi Router">
                                <label class="custom-control-label" for="perangkat_3">Wifi Router</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_4" name="perangkat[]" value="Access Point">
                                <label class="custom-control-label" for="perangkat_4">Access Point</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_5" name="perangkat[]" value="Router">
                                <label class="custom-control-label" for="perangkat_5">Router</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_6" name="perangkat[]" value="Switch/HUB">
                                <label class="custom-control-label" for="perangkat_6">Switch/HUB</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input perangkat" id="perangkat_7" onchange='handleChange_2(this);'>
                                <label class="custom-control-label" for="perangkat_7">Lainnya</label>
                            </div>
                            <div class="col collapse mt-2" id="perangkat_lainnya">
                                <div class="input-group input-group-outline mb-3" id="perangkat_lainnya_form">
                                    <label class="form-label">Perangkat Lainnya</label>
                                    <input name="perangkat_lainnya" id="perangkat_lainnya_text" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <script>
                            var checkbox_perangkat = $("input.perangkat:checkbox");
                            checkbox_perangkat.prop('required', true);
                            checkbox_perangkat.on('click', function() {
                                if (checkbox_perangkat.is(':checked')) {
                                    checkbox_perangkat.prop('required', false);
                                }
                                else {
                                    checkbox_perangkat.prop('required', true);
                                }
                            });
                        </script>
                        <script>
                            function handleChange_2(checkbox) {
                                if(checkbox.checked == true){
                                    $('#perangkat_lainnya').collapse('show');
                                    $('#perangkat_lainnya_text').prop('required', true);
                                }
                                else{
                                    $('#perangkat_lainnya').collapse('hide');
                                    $('#perangkat_lainnya_text').prop('required', false);
                                }
                            }
                        </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Alat Kerja <br>Yang Digunakan</td>
                        <td class="text-sm">
                        <div class="form-group options">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_1" name="alat_kerja[]" value="Tang Crimping">
                                <label class="custom-control-label" for="alat_kerja_1">Tang Crimping</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_2" name="alat_kerja[]" value="Tester Kabel">
                                <label class="custom-control-label" for="alat_kerja_2">Tester Kabel</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_3" name="alat_kerja[]" value="Laptop">
                                <label class="custom-control-label" for="alat_kerja_3">Laptop</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_4" name="alat_kerja[]" value="Obeng">
                                <label class="custom-control-label" for="alat_kerja_4">Obeng</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_5" name="alat_kerja[]" value="Tangga">
                                <label class="custom-control-label" for="alat_kerja_5">Tangga</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_6" name="alat_kerja[]" value="Senter">
                                <label class="custom-control-label" for="alat_kerja_6">Senter</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_7" name="alat_kerja[]" value="Bor">
                                <label class="custom-control-label" for="alat_kerja_7">Bor</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input alat_kerja" id="alat_kerja_8" onchange='handleChange_3(this);'>
                                <label class="custom-control-label" for="alat_kerja_8">Lainnya</label>
                            </div>
                            <div class="col collapse mt-2" id="alat_kerja_lainnya">
                                <div class="input-group input-group-outline mb-3" id="alat_kerja_lainnya_form">
                                    <label class="form-label">Alat Kerja Lainnya</label>
                                    <input name="alat_kerja_lainnya" id="alat_kerja_lainnya_text" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <script>
                            var checkbox_alat_kerja = $("input.alat_kerja:checkbox");
                            checkbox_alat_kerja.prop('required', true);
                            checkbox_alat_kerja.on('click', function() {
                                if (checkbox_alat_kerja.is(':checked')) {
                                    checkbox_alat_kerja.prop('required', false);
                                }
                                else {
                                    checkbox_alat_kerja.prop('required', true);
                                }
                            });
                        </script>
                        <script>
                            function handleChange_3(checkbox) {
                                if(checkbox.checked == true){
                                    $('#alat_kerja_lainnya').collapse('show');
                                    $('#alat_kerja_lainnya_text').prop('required', true);
                                }
                                else{
                                    $('#alat_kerja_lainnya').collapse('hide');
                                    $('#alat_kerja_lainnya_text').prop('required', false);
                                }
                            }
                        </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Barang Habis Pakai <br>Yang Digunakan</td>
                        <td class="text-sm">
                        <div class="form-group">
                            @foreach ($barang as $b)
                            <div class="row">
                                <div class="col">
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="custom-control-input barang_habis" id="barang_habis_{{ $b->id_barang }}" name="barang_habis[{{ $b->id_barang }}][id_barang]" value="{{ $b->id_barang }}" onchange='barangHabis(this);'>
                                        <label class="custom-control-label" for="barang_habis_{{ $b->id_barang }}">{{ $b->nama_barang }}</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="barang_habis_{{ $b->id_barang }}_value" style="visibility: hidden;">
                                        : <input type="number" class="barang_habis_{{ $b->id_barang }}_value" name="barang_habis[{{ $b->id_barang }}][jumlah]" min="1" max="999" style="border: none; border-bottom: 1px solid black;">
                                        <label class="">{{ $b->satuan }}</label>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input barang_habis" id="tidak_pakai_barang_habis" onchange='barangHabis(this);'>
                                <label class="custom-control-label" for="tidak_pakai_barang_habis">Tidak pakai barang habis</label>
                            </div>
                        </div>
                        <script>
                            var checkbox_barang_habis = $("input.barang_habis:checkbox");
                            checkbox_barang_habis.prop('required', true);
                            checkbox_barang_habis.on('click', function() {
                                if (checkbox_barang_habis.is(':checked')) {
                                    checkbox_barang_habis.prop('required', false);
                                }
                                else {
                                    checkbox_barang_habis.prop('required', true);
                                }
                            });
                        </script>
                        <script>
                            function barangHabis(checkbox) {
                                var id = checkbox.id;
                                var span = ("." + id + "_value");
                                if(checkbox.checked == true){
                                    $(span).css('visibility', 'visible');
                                    $(span).prop('required', true);
                                }
                                else{
                                    $(span).css('visibility', 'hidden');
                                    $(span).prop('required', false);
                                }
                            }
                        </script>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Perangkat / Barang Milik <br>Sudiskominfotik Yang Dipasang</td>
                        <td class="text-sm">
                            <div class="perangkat_sudiskominfotik">
                                <button class="btn btn-sm btn-info tambah_perangkat">Tambah Perangkat</button>
                            </div>
                        </td>
                        <script>
                        $(document).ready(function() {
                            var max_fields = 10;
                            var wrapper = $(".perangkat_sudiskominfotik");
                            var add_button = $(".tambah_perangkat");

                            var x = 0;
                            $(add_button).click(function(e) {
                                e.preventDefault();
                                if (x < max_fields) {
                                    x++;
                                    $(wrapper).append('<div><label class=""><b>- </b> Jenis/Merk : </label><input type="text" name="perangkat_kominfo_jenis[]" style="border: none; border-bottom: 1px solid black;" required><label class="">SN : </label><input type="text" name="perangkat_kominfo_SN[]" required style="border: none; border-bottom: 1px solid black;"><a href="#" class="delete"><i class="material-icons text-danger">delete</i></a></div></div>');
                                } else {
                                    alert('Melebihi maksimal input perangkat')
                                }
                            });

                            $(wrapper).on("click", ".delete", function(e) {
                                e.preventDefault();
                                $(this).parent('div').remove();
                                x--;
                            })
                        });
                        </script>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">IP Address Yang Digunakan (Range IP)</td>
                        <td class="text-sm">
                            <label class="">IP Address : </label>
                            <input type="text" name="ip_1" id="ip_1" style="border: none; border-bottom: 1px solid black;" required>
                            &nbsp;-&nbsp;
                            <input type="text" name="ip_2" id="ip_2" style="border: none; border-bottom: 1px solid black;" required>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td class="text-sm font-weight-bold">Penjelasan Pekerjaan, <br>Lokasi, dan Keterangan Lain</td>
                        <td class="text-sm">
                            <div class="input-group input-group-outline mb-3" id="penjelasan_pekerjaan_form">
                                <label class="form-label">Penjelasan Pekerjaan</label>
                                <input name="penjelasan_pekerjaan" type="text" id="penjelasan_pekerjaan" class="form-control" maxlength="100" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Perwakilan <br>UKPD/SKPD</td>
                        <td class="text-sm">
                            <div class="input-group input-group-outline mb-3 perwakilan">
                                <label class="form-label">Nama Perwakilan</label>
                                <input name="nama_perwakilan" type="text" class="form-control" id="nama_perwakilan" maxlength="50" required>
                            </div>
                            <div class="input-group input-group-outline mb-3 perwakilan">
                                <label class="form-label">NIP Perwakilan</label>
                                <input name="nip_perwakilan" type="number" class="form-control" id="nip_perwakilan" oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="30" required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Tanda Tangan <br>Perwakilan UKPD/SKPD</td>
                        <td>
                            <div class='js-signature' data-height="200"></div>
                            <script>
                                $('.js-signature').jqSignature();
                            </script>
                            <span id="clearBtn" class="btn btn-warning" onclick="clearCanvas();">Ulangi</span>
                            <span id="saveBtn" class="btn btn-info" onclick="saveCanvas();" disabled>Simpan</span>
                            <script>
                            function clearCanvas() {
                                $('.js-signature').jqSignature('clearCanvas');
                                $('#signature').empty();
                            }

                            function saveCanvas() {
                                $('#signature').empty();
                                var dataUrl = $('.js-signature').jqSignature('getDataURL');
                                var img = $('<img>').attr('src', dataUrl);
                                var input = $('<input>').attr('type', 'hidden').attr('value', dataUrl).attr('name', 'ttd');
                                $('#signature').append($('<p>').text("Hasil tanda tangan:"));
                                $('#signature').append(img);
                                $('#signature').append(input);
                            }

                            $('.js-signature').on('jq.signature.changed', function() {
                                $('#saveBtn').attr('disabled', false);
                            });

                            </script>
                            <div id="signature"></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-sm font-weight-bold">Foto Hasil</td>
                        <td>
                            <input name="foto_hasil" type="file" id="img" hidden="true" accept="image/*" onchange="gambar_upload(this.value)" class="instalasi">
                            <label for="img" class="btn btn-info my-0">Upload Gambar</label>
                            <script type="text/javascript">
                                function gambar_upload(val)
                                {
                                    filename = val.split('\\').pop().split('/').pop();
                                    var src = URL.createObjectURL(event.target.files[0]);
                                    var preview = document.getElementById("file-ip-1-preview");
                                    preview.src = src;
                                    preview.hidden = false;
                                    preview.style.display = "block";
                                }
                            </script>
                            <img id="file-ip-1-preview" hidden="true" height="160px" class="mb-3">
                        </td>
                    </tr>
                    <tr style="border-width: 1px; border-color: #dee2e6;">
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-lg">
                <h6 class="text-primary text-sm">Foto Kondisi: </h6>
                <img src="{{ asset('/storage/layanan/id/kondisi/'.$layanan->foto_kondisi) }}" class="w-100 mb-3">
            </div>
        </div>        
        <hr class="my-3">
        <div class="text-left">
            <!-- <button type="button" class="btn bg-gradient-primary mb-2" id="simpan" data-toggle="modal" data-target="#submitid{{ $layanan->id_layanan }}">Simpan</button> -->
            <button type="submit" class="btn btn-primary mb-2">Simpan</button>
            <!-- Modal Submit -->
            <div class="modal fade" id="submitid{{ $layanan->id_layanan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Simpan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span>Setelah simpan anda tidak akan bisa merubah data lagi, lanjutkan?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>