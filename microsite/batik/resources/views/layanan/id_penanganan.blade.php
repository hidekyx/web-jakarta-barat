<div class="col-lg-8" id="id_penanganan" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Penanganan Permasalahan Jaringan.</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control penanganan_id_form" type="text" name="nama_pemohon_penanganan_id" placeholder="Isi Nama Lengkap Pemohon" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP / Email</b>
                <input class="from-control penanganan_id_form" type="text" name="kontak_penanganan_id" id="kontak_penanganan_id" placeholder="Isi Kontak" maxlength="100" />
            </div>
            <div class="col-md-12" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Instansi</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker penanganan_id_form" name="instansi_penanganan" id="instansi_penanganan" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>

        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 15px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Permasalahan Jaringan</b>
                <div class="form-check">
                    <input class="form-check-input penanganan_id_form" type="checkbox" id="jenis1" name="jenis_penanganan[]" value="Tidak bisa akses internet">
                    <label class="form-check-label" for="jenis1">Tidak bisa akses internet</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input penanganan_id_form" type="checkbox" id="jenis2" name="jenis_penanganan[]" value="Wifi tidak bisa diakses">
                    <label class="form-check-label" for="jenis2">Wifi tidak bisa diakses</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input penanganan_id_form" type="checkbox" id="jenis3" name="jenis_penanganan[]" value="Internet lambat">
                    <label class="form-check-label" for="jenis3">Internet lambat</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input penanganan_id_form" type="checkbox" id="jenis4" value="Lainnya" onchange="handleChange_radio();">
                    <label class="form-check-label" for="jenis4">Lainnya</label>
                </div>
                <input class="from-control disabled" id="jenis_penanganan_lainnya" type="text" name="jenis_penanganan_lainnya" placeholder="Permasalahan Lainnya" style="display: none;" />
                
                @push('scripts')
                <script>
                    var checkbox_penanganan = $("input.penanganan_id_form:checkbox");
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
                @endpush
                
               
                <script>
                    function handleChange_radio() {
                        if($('#jenis4').is(':checked')) {
                            $('#jenis_penanganan_lainnya').fadeIn();
                            $('#jenis_penanganan_lainnya').prop('required', true);
                        }
                        else{
                            $('#jenis_penanganan_lainnya').fadeOut();
                            $('#jenis_penanganan_lainnya').prop('required', false);
                        }
                    }
                </script>
                
            </div>
            
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Cakupan Permasalahan</b>
                <select title="Cakupan Permasalahan" data-size="8" class="form-control form-select selectpicker penanganan_id_form" name="cakupan_penanganan_id" id="cakupan_penanganan_id" onchange="changeColor(this.id);" required="">
                    <option value="Satu atau Beberapa PC">Satu atau Beberapa PC </option>
                    <option value="Satu Ruangan">Satu Ruangan</option>
                    <option value="Satu Lantai">Satu Lantai</option>
                    <option value="Satu Gedung">Satu Gedung</option>
                </select>
            </div>

            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Deskripsi</b>
                <div class="form-box">
                    <textarea class="from-control penanganan_id_form" name="deskripsi_penanganan_id" placeholder="Isi Deskripsi Permasalahan" required=""></textarea>
                </div>
            </div>

            
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Unggah Foto Kondisi</b>
                <input class="from-control penanganan_id_form" type="file" name="file_foto_kondisi_penanganan" accept="image/*" required="" />
            </div>

        </div>
        
        <p class="mb-0"><b>Peringatan!</b></p>
        <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">File Foto Kondisi harus menggunakan format .png atau .jpg!</i></p>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>