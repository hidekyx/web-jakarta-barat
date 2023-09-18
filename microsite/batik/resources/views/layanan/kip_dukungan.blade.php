<div class="col-lg-8" id="kip_dukungan" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Dukungan Komunikasi dan Informasi Publik</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control dukungan_kip_form" type="text" name="nama_pemohon_dukungan" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control dukungan_kip_form" type="number" name="nip_pemohon_dukungan" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control dukungan_kip_form" type="text" name="jabatan_pemohon_dukungan" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker dukungan_kip_form" name="instansi_dukungan" id="instansi_dukungan" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control dukungan_kip_form" type="number" name="no_hp_pemohon_dukungan" placeholder="Isi No HP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pemohon</b>
                <input class="from-control dukungan_kip_form" type="email" name="email_pemohon_dukungan" placeholder="Isi Email Pemohon" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Alamat Kantor</b>
                <div class="form-box">
                    <textarea class="from-control dukungan_kip_form" name="alamat_kantor_dukungan" placeholder="Tuliskan Alamat Lengkap Kantor" required=""></textarea>
                </div>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
        <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Kebutuhan</b>
                <select title="Pilih Jenis Kebutuhan" data-size="8" class="form-control form-select selectpicker dukungan_kip_form" name="jenis_kebutuhan_dukungan" id="jenis_kebutuhan_dukungan" onchange="changeColor(this.id);" required="">
                    <option value="Peliputan">Peliputan</option>
                    <option value="Doorstop">Doorstop</option>
                    <option value="Konferensi Pers">Konferensi Pers</option>
                    <option value="Kunjungan Media">Kunjungan Media</option>
                    <option value="Media Training">Media Training</option>
                    <option value="Media Event">Media Event</option>
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Tanggal Pelaksanaan</b>
                <input class="from-control dukungan_kip_form" type="date" name="waktu_pelaksanaan_dukungan" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Deskripsi</b>
                <div class="form-box">
                    <textarea class="from-control dukungan_kip_form" name="deskripsi_dukungan" placeholder="Tuliskan Deskripsi Dukungan" required=""></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Upload Materi Kegiatan</b>
                <input class="from-control dukungan_kip_form" type="file" name="file_materi_dukungan" accept=".pdf" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan / Rekomendasi</b>
                <input class="from-control dukungan_kip_form" type="file" name="file_surat_dukungan" accept=".pdf" required="" />
            </div>
</div>
            <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">File Materi Kegiatan dan Surat Permohonan harus menggunakan format .pdf!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>