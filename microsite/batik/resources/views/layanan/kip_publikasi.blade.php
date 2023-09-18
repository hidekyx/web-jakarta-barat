<div class="col-lg-8" id="publikasi_media" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Publikasi Media Video dan Grafis</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control publikasi_media_form" type="text" name="nama_pemohon_publikasi" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control publikasi_media_form" type="number" name="nip_pemohon_publikasi" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control publikasi_media_form" type="text" name="jabatan_pemohon_publikasi" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker publikasi_media_form" name="instansi_publikasi" id="instansi_publikasi" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control publikasi_media_form" type="number" name="no_hp_pemohon_publikasi" placeholder="Isi No HP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pemohon</b>
                <input class="from-control publikasi_media_form" type="email" name="email_pemohon_publikasi" placeholder="Isi Email Pemohon" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Alamat Kantor</b>
                <div class="form-box">
                    <textarea class="from-control publikasi_media_form" name="alamat_kantor_publikasi" placeholder="Tuliskan Alamat Lengkap Kantor" required=""></textarea>
                </div>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Media atau Konten</b>
                <select title="Pilih Jenis Konten" data-size="8" class="form-control form-select selectpicker publikasi_media_form" name="jenis_media_publikasi" id="jenis_media_publikasi" onchange="changeColor(this.id);" required="">
                <option selected disabled hidden>-- Pilih Layanan --</option>
                <optgroup label="Grafis">
                    <option value="Infografis">Infografis</option>
                    <option value="Spanduk/Backdrop">Spanduk/Backdrop</option>
                </optgroup>
                    <option value="Video Perlombaan">Video Perlombaan Tingkat Kota</option>
                </select>
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Deskripsi</b>
                <div class="form-box">
                    <textarea class="from-control publikasi_media_form" name="deskripsi_publikasi" placeholder="Tuliskan Deskripsi Publikasi" required=""></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Upload Media/Konten</b>
                <input class="from-control publikasi_media_form" type="file" name="file_media_publikasi" accept=".pdf" required="" />
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan / Rekomendasi</b>
                <input class="from-control publikasi_media_form" type="file" name="file_surat_publikasi" accept=".pdf" required="" />
            </div>
            <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">File Media/Konten dan Surat Permohonan harus menggunakan format .pdf!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>