<div class="col-lg-8" id="troubleshooting_aplikasi" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Troubleshooting Aplikasi</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control troubleshooting_aplikasi_form" type="text" name="nama_pemohon_troubleshooting" placeholder="Isi Nama Lengkap Pemohon" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control troubleshooting_aplikasi_form" type="number" name="nip_pemohon_troubleshooting" id="nip_pemohon_troubleshooting" placeholder="Isi NIP Pemohon" maxlength="18" minlength="9" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control troubleshooting_aplikasi_form" type="text" name="jabatan_pemohon_troubleshooting" placeholder="Isi Jabatan Pemohon" maxlength="80" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker troubleshooting_aplikasi_form" name="instansi_troubleshooting" id="instansi_troubleshooting" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control troubleshooting_aplikasi_form" type="number" name="no_hp_pemohon_troubleshooting" id="no_hp_pemohon_troubleshooting" placeholder="Isi No HP Pemohon" maxlength="15" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pemohon</b>
                <input class="from-control troubleshooting_aplikasi_form" type="email" name="email_pemohon_troubleshooting" placeholder="Isi Email Pemohon" maxlength="100" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Alamat Kantor</b>
                <div class="form-box">
                    <textarea class="from-control troubleshooting_aplikasi_form" name="alamat_kantor_troubleshooting" placeholder="Tuliskan Alamat Lengkap Kantor" required=""></textarea>
                </div>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Penjelasan Permasalahan</b>
                <div class="form-box">
                    <textarea class="from-control troubleshooting_aplikasi_form" name="deskripsi_troubleshooting" placeholder="Jelaskan deskripsi dan kronologi permasalahan yang anda hadapi" required=""></textarea>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Permasalahan</b>
                <div class="form-check">
                    <input class="form-check-input troubleshooting_aplikasi_form" type="radio" id="tidak_bisa_akses" name="jenis_permasalahan_troubleshooting" value="Tidak Bisa Akses" onchange="handleChange_radio2();" required="" />
                    <label class="form-check-label" for="tidak_bisa_akses">Tidak Bisa Akses</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input troubleshooting_aplikasi_form" type="radio" id="tidak_bisa_upload" name="jenis_permasalahan_troubleshooting" value="Tidak Bisa Upload" onchange="handleChange_radio2();" required="" />
                    <label class="form-check-label" for="tidak_bisa_upload">Tidak Bisa Upload</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input troubleshooting_aplikasi_form" type="radio" id="tidak_bisa_simpan" name="jenis_permasalahan_troubleshooting" value="Tidak Bisa Simpan" onchange="handleChange_radio2();" required="" />
                    <label class="form-check-label" for="tidak_bisa_simpan">Tidak Bisa Simpan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input troubleshooting_aplikasi_form" type="radio" id="jenis_permasalahan_lainnya" name="jenis_permasalahan_troubleshooting" onchange="handleChange_radio2();" required="" />
                    <label class="form-check-label" for="jenis_permasalahan_lainnya">Lainnya</label>
                </div>
                <input class="from-control troubleshooting_aplikasi_form disabled" id="permasalahan_lainnya" type="text" name="jenis_permasalahan_lainnya_troubleshooting" placeholder="Isi Jenis Permasalahan Lainnya" required="" style="display: none;" />
                <script>
                    function handleChange_radio2() {
                        if($('#jenis_permasalahan_lainnya').is(':checked')) {
                            $('#permasalahan_lainnya').fadeIn();
                            $('#permasalahan_lainnya').prop('required', true);
                        }
                        else{
                            $('#permasalahan_lainnya').fadeOut();
                            $('#permasalahan_lainnya').prop('required', false);
                        }
                    }
                </script>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Lampiran</h5>
        <div class="row">
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Screenshot Error</b>
                <input class="from-control troubleshooting_aplikasi_form" type="file" name="file_surat_troubleshooting" accept="image/*" />
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input troubleshooting_aplikasi_form" type="checkbox" id="konfirmasi_troubleshooting" required="">
            <label class="form-check-label" for="konfirmasi_troubleshooting">
                <p class="mb-0"><b>Saya Setuju</b></p>
                <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Setelah mengisi form ini, anda setuju untuk mengikuti aturan dan kebijakan yang berkaitan dengan keamanan informasi serta akan berkoordinasi dalam proses troubleshooting aplikasi atau software.</i></p>
            </label>
        </div>

        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>