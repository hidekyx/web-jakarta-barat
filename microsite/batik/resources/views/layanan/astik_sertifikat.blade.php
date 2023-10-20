<div class="col-lg-8" id="sertifikat_elektronik" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Pemanfaatan Layanan Sertifikat Elektronik</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Lengkap</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="nama_lengkap_sertifikat" placeholder="Isi Nama Lengkap" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIK KTP</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="nik_sertifikat" id="nik_sertifikat" placeholder="Isi NIK KTP" maxlength="16" minlength="9" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="nip_sertifikat" id="nip_sertifikat" placeholder="Isi NIP" maxlength="18" minlength="9" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pribadi @jakarta.go.id</b>
                <input class="from-control sertifikat_elektronik_form" type="email" name="email_pribadi_sertifikat" placeholder="Isi Email Wajib @jakarta.go.id" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="jabatan_sertifikat" placeholder="Isi Jabatan" maxlength="80" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker sertifikat_elektronik_form" name="instansi_sertifikat" id="instansi_sertifikat" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="no_hp_sertifikat" id="no_hp_sertifikat" placeholder="Isi No HP" maxlength="15" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Organisasi</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="organisasi_sertifikat" placeholder="Isi Organisasi" maxlength="80" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Kota</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="kota_sertifikat" placeholder="Isi Kota" maxlength="16" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Provinsi</b>
                <input class="from-control sertifikat_elektronik_form" type="text" name="provinsi_sertifikat" placeholder="Isi Provinsi" maxlength="11" />
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Lampiran Pengajuan</h5>
        <div class="row">
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">e-KTP Berwarna</b>
                <input class="from-control sertifikat_elektronik_form" type="file" name="file_ektp_sertifikat" accept=".pdf" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">SK Jabatan / SK Penempatan</b>
                <input class="from-control sertifikat_elektronik_form" type="file" name="file_sk_sertifikat" accept=".pdf" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan / Rekomendasi</b>
                <input class="from-control sertifikat_elektronik_form" type="file" name="file_surat_sertifikat" accept=".pdf" required="" />
            </div>
        </div>
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;" class="mb-0"><i style="font-size: 15px;">File e-KTP, SK Jabatan/Penempatan, dan Surat Permohonan harus menggunakan format .pdf!</i></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Contoh surat permohonan dalam mengajukan sertifikat elektronik dapat dilihat <a href="{{ asset('storage/layanan/astik/files/Contoh surat permohonan sertifikat elektronik.pdf') }}">di sini</a>.</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>