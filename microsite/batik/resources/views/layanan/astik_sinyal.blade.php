<div class="col-lg-8" id="pengamanan_sinyal" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Pengamanan Sinyal</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control pengamanan_sinyal_form" type="text" name="nama_pemohon_sinyal" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control pengamanan_sinyal_form" type="number" name="nip_pemohon_sinyal" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control pengamanan_sinyal_form" type="text" name="jabatan_pemohon_sinyal" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker pengamanan_sinyal_form" name="instansi_sinyal" id="instansi_sinyal" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Tanggal Pelaksanaan</b>
                <input class="from-control pengamanan_sinyal_form" type="date" name="tanggal_pelaksanaan_sinyal" required="" />
            </div>
            <div class="col-md-3">
                <b class="contact-title sc-pb-0 primary-color">Jam Mulai</b>
                <input class="from-control pengamanan_sinyal_form" type="time" name="waktu_mulai_sinyal" required="" />
            </div>
            <div class="col-md-3">
                <b class="contact-title sc-pb-0 primary-color">Jam Akhir</b>
                <input class="from-control pengamanan_sinyal_form" type="time" name="waktu_akhir_sinyal" required="" />
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Lokasi Pelaksanaan</b>
                <select title="Pilih Lokasi Pelaksanaan" data-size="8" class="form-control form-select selectpicker pengamanan_sinyal_form" name="lokasi_pelaksanaan_sinyal" id="lokasi_pelaksanaan_sinyal" onchange="changeColor(this.id);" required="">
                    <option value="Ruang Kerja">Ruang Kerja</option>
                    <option value="Ruang Rapat/Pertemuan">Ruang Rapat/Pertemuan</option>
                    <option value="Lapangan/Halaman">Lapangan/Halaman</option>
                </select>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Target Jammer Sinyal</h5>
        <div class="row">
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Pilih Jenis Sinyal (Min: 1)</b>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_1" name="jammer_sinyal[]" value="CDMA : 869 – 890 MHz">
                    <label class="form-check-label" for="jammer_1">CDMA : 869 – 890 MHz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_2" name="jammer_sinyal[]" value="GSM : 925 – 960 MHz">
                    <label class="form-check-label" for="jammer_2">GSM : 925 – 960 MHz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_3" name="jammer_sinyal[]" value="DCS : 1805 – 1880 MHz">
                    <label class="form-check-label" for="jammer_3">DCS : 1805 – 1880 MHz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_4" name="jammer_sinyal[]" value="UMTS : 2110 – 2170 MHz">
                    <label class="form-check-label" for="jammer_4">UMTS : 2110 – 2170 MHz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_5" name="jammer_sinyal[]" value="LTE : 230 – 2400 MHz">
                    <label class="form-check-label" for="jammer_5">LTE : 230 – 2400 MHz</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input pengamanan_sinyal_form" type="checkbox" id="jammer_6" name="jammer_sinyal[]" value="Wifi / Bluetooth : 2400 – 2500 MHz">
                    <label class="form-check-label" for="jammer_6">Wifi / Bluetooth : 2400 – 2500 MHz</label>
                </div>
                @push('scripts')
                <script>
                    var checkbox_sinyal = $("input.pengamanan_sinyal_form:checkbox");
                    checkbox_sinyal.prop('required', true);
                    checkbox_sinyal.on('click', function() {
                        if (checkbox_sinyal.is(':checked')) {
                            checkbox_sinyal.prop('required', false);
                        }
                        else {
                            checkbox_sinyal.prop('required', true);
                        }
                    });
                </script>
                @endpush
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Informasi Narahubung</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Narahubung</b>
                <input class="from-control pengamanan_sinyal_form" type="text" name="nama_narahubung_sinyal" placeholder="Isi Nama Narahubung" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Telp/HP</b>
                <input class="from-control pengamanan_sinyal_form" type="number" name="no_telp_narahubung_sinyal" placeholder="Isi No Telp/HP" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan</b>
                <input class="from-control pengamanan_sinyal_form" type="file" name="file_surat_sinyal" accept=".pdf" required="" />
            </div>
        </div>
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Pemasangan jammer pada acara rapat terbatas, maka ruang rapat akan steril dari sinyal HP maupun alat komunikasi lainnya.</i></p>

        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>

    </div>
</div>