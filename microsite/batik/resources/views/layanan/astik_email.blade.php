<div class="col-lg-8" id="permohonan_email" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Permohonan Email @jakarta.go.id</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Lengkap</b>
                <input class="from-control permohonan_email_form" type="text" name="nama_lengkap_email" placeholder="Isi Nama Lengkap" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP</b>
                <input class="from-control permohonan_email_form" type="text" name="nip_email" id="nip_email" placeholder="Isi NIP" maxlength="18" minlength="9" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control permohonan_email_form" type="text" name="jabatan_email" placeholder="Isi Jabatan" maxlength="80" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP</b>
                <input class="from-control permohonan_email_form" type="text" name="no_hp_email" id="no_hp_email" placeholder="Isi No HP" maxlength="15" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker permohonan_email_form" name="instansi_email" id="instansi_email" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Lampiran Pengajuan</h5>
        <div class="row">
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan / Rekomendasi</b>
                <input class="from-control permohonan_email_form" type="file" name="file_surat_email" accept=".pdf" required="" />
            </div>
        </div>
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;" class="mb-0"><i style="font-size: 15px;">Surat Permohonan harus menggunakan format .pdf!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>