<div class="col-lg-8" id="instalasi_antivirus" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Instalasi Antivirus</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control instalasi_antivirus_form" type="text" name="nama_pemohon_antivirus" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control instalasi_antivirus_form" type="number" name="nip_pemohon_antivirus" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control instalasi_antivirus_form" type="text" name="jabatan_pemohon_antivirus" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker instalasi_antivirus_form" name="instansi_antivirus" id="instansi_antivirus" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control instalasi_antivirus_form" type="number" name="no_hp_pemohon_antivirus" placeholder="Isi No HP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pemohon</b>
                <input class="from-control instalasi_antivirus_form" type="email" name="email_pemohon_antivirus" placeholder="Isi Email Pemohon" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Alamat Kantor</b>
                <div class="form-box">
                    <textarea class="from-control instalasi_antivirus_form" name="alamat_kantor_antivirus" placeholder="Tuliskan Alamat Lengkap Kantor" required=""></textarea>
                </div>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Informasi Narahubung</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Narahubung</b>
                <input class="from-control instalasi_antivirus_form" type="text" name="nama_narahubung_antivirus" placeholder="Isi Nama Narahubung" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Telp/HP</b>
                <input class="from-control instalasi_antivirus_form" type="number" name="no_telp_narahubung_antivirus" placeholder="Isi No Telp/HP" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan</b>
                <input class="from-control instalasi_antivirus_surat" type="file" name="file_surat_antivirus" accept=".pdf" />
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input instalasi_antivirus_form" type="checkbox" id="konfirmasi_antivirus" required="">
            <label class="form-check-label" for="konfirmasi_antivirus">
                <p class="mb-0"><b>Saya Setuju</b></p>
                <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Setelah mengisi form ini, anda setuju untuk mengikuti aturan dan kebijakan yang berkaitan dengan keamanan informasi serta akan berkoordinasi melakukan instalasi dan konfigurasi Anti Virus sesuai dengan kebutuhan dan permohonan, serta tidak akan menggunakan lisensi ini di luar aset Pemprov DKI Jakarta.</i></p>
            </label>
        </div>
        
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>