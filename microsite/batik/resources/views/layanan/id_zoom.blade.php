<div class="col-lg-8" id="id_zoom" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Dukungan Zoom Meeting.</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control zoom_id_form" type="text" name="nama_pemohon_zoom_id" placeholder="Isi Nama Lengkap Pemohon" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP / Email</b>
                <input class="from-control zoom_id_form" type="text" name="kontak_zoom_id" id="kontak_zoom_id" placeholder="Isi Kontak" maxlength="100" />
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Instansi</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker zoom_id_form" name="instansi_zoom" id="instansi_zoom" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>

        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
                <div class="col-md-12">
                    <b class="contact-title sc-pb-0 primary-color">Deskripsi</b>
                    <div class="form-box">
                        <textarea class="from-control zoom_id_form" name="deskripsi_zoom_id" placeholder="Isi Deskripsi Dukungan" required=""></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <b class="contact-title sc-pb-0 primary-color">No Surat</b>
                    <input class="from-control zoom_id_form" type="text" name="no_surat_zoom_id" placeholder="Isi No Surat" required="" />
                </div>

                <div class="col-md-6">
                    <b class="contact-title sc-pb-0 primary-color">Tanggal Surat</b>
                    <input class="from-control zoom_id_form" type="date" name="tanggal_surat_zoom_id" required="" />
                </div>

                <div class="col-md-12">
                    <b class="contact-title sc-pb-0 primary-color">Perihal Surat</b>
                    <input class="from-control zoom_id_form" type="text" name="perihal_surat_zoom_id" placeholder="Isi Perihal Surat" required="" />
                </div>

                <div class="col-md-12">
                    <b class="contact-title sc-pb-0 primary-color">Unggah File Surat</b>
                    <input class="from-control zoom_id_form" type="file" name="file_surat_zoom" accept=".pdf" required="" />
                </div>
                
                
        </div>
        
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">File Surat harus menggunakan format .pdf!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>