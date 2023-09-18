<div class="col-lg-8" id="id_instalasi" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Instalasi, Penambahan dan Penataan Jaringan.</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control instalasi_id_form" type="text" name="nama_pemohon_instalasi_id" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP / Email</b>
                <input class="from-control instalasi_id_form" type="text" name="kontak_instalasi_id" placeholder="Isi Kontak" required="" />
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Instansi</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker instalasi_id_form" name="instansi_instalasi" id="instansi_instalasi" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>

        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Instalasi Jaringan</b>
                <div class="form-check">
                    <input class="form-check-input instalasi_id_form" type="checkbox" id="jenis5" name="jenis_instalasi[]" value="Instalasi kabel jaringan baru ">
                    <label class="form-check-label" for="jenis5">Instalasi kabel jaringan baru</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input instalasi_id_form" type="checkbox" id="jenis6" name="jenis_instalasi[]" value="Penambahan kabel jaringan">
                    <label class="form-check-label" for="jenis6">Penambahan kabel jaringan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input instalasi_id_form" type="checkbox" id="jenis7" name="jenis_instalasi[]" value="Penataan kabel jaringan">
                    <label class="form-check-label" for="jenis7">Penataan kabel jaringan</label>
                </div>
                @push('scripts')
                <script>
                    var checkbox_instalasi = $("input.instalasi_id_form:checkbox");
                    checkbox_instalasi.prop('required', true);
                    checkbox_instalasi.on('click', function() {
                        if (checkbox_instalasi.is(':checked')) {
                            checkbox_instalasi.prop('required', false);
                        }
                        else {
                            checkbox_instalasi.prop('required', true);
                        }
                    });
                </script>
                @endpush
            </div>
            
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Cakupan Intalasi</b>
                <select title="Cakupan Intalasi" data-size="8" class="form-control form-select selectpicker instalasi_id_form" name="cakupan_instalasi_id" id="cakupan_instalasi_id" onchange="changeColor(this.id);" required="">
                    <option value="Satu atau Beberapa PC">Satu atau Beberapa PC </option>
                    <option value="Satu Ruangan">Satu Ruangan</option>
                    <option value="Satu Lantai">Satu Lantai</option>
                    <option value="Satu Gedung">Satu Gedung</option>
                </select>
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Deskripsi</b>
                <div class="form-box">
                    <textarea class="from-control instalasi_id_form" name="deskripsi_instalasi_id" placeholder="Isi Deskripsi Instalasi" required=""></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Unggah Foto Kondisi</b>
                <input class="from-control instalasi_id_form" type="file" name="file_foto_kondisi_instalasi" accept="image/*" required="" />
            </div>

            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Surat</b>
                <input class="from-control instalasi_id_form" type="text" name="no_surat_instalasi_id" placeholder="Isi No Surat" required="" />
            </div>

            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Tanggal Surat</b>
                <input class="from-control instalasi_id_form" type="date" name="tanggal_surat_instalasi_id" required="" />
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Perihal Surat</b>
                <input class="from-control instalasi_id_form" type="text" name="perihal_surat_instalasi_id" placeholder="Isi Perihal Surat" required="" />
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Unggah File Surat</b>
                <input class="from-control instalasi_id_form" type="file" name="file_surat_instalasi" accept=".pdf" required="" />
            </div>

        </div>
        
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">File Foto Kondisi harus menggunakan format .jpg/.png/.jpeg dan Surat Permohonan harus menggunakan format .pdf!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>