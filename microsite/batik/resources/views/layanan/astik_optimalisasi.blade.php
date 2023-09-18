<div class="col-lg-8" id="optimalisasi_perangkat" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Optimalisasi Komputer / Laptop</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control optimalisasi_perangkat_form" type="text" name="nama_pemohon_optimalisasi" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control optimalisasi_perangkat_form" type="number" name="nip_pemohon_optimalisasi" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control optimalisasi_perangkat_form" type="text" name="jabatan_pemohon_optimalisasi" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker optimalisasi_perangkat_form" name="instansi_optimalisasi" id="instansi_optimalisasi" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control optimalisasi_perangkat_form" type="number" name="no_hp_pemohon_optimalisasi" placeholder="Isi No HP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Pemohon</b>
                <input class="from-control optimalisasi_perangkat_form" type="email" name="email_pemohon_optimalisasi" placeholder="Isi Email Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Alamat Kantor</b>
                <div class="form-box">
                    <textarea class="from-control optimalisasi_perangkat_form" name="alamat_kantor_optimalisasi" placeholder="Tuliskan Alamat Lengkap Kantor" required=""></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Penjelasan Permasalahan</b>
                <div class="form-box">
                    <textarea class="from-control optimalisasi_perangkat_form" name="deskripsi_optimalisasi" placeholder="Tuliskan Alasan Kenapa Membutuhkan Layanan Optimalisasi Komputer / Laptop" required=""></textarea>
                </div>
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Perangkat</b>
                <select title="Pilih Perangkat" data-size="8" class="form-control form-select selectpicker optimalisasi_perangkat_form" name="perangkat_optimalisasi" id="perangkat_optimalisasi" onchange="changeColor(this.id);" required="">
                    <option value="Komputer">Komputer</option>
                    <option value="Laptop">Laptop</option>
                </select>
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Informasi Narahubung</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Narahubung</b>
                <input class="from-control optimalisasi_perangkat_form" type="text" name="nama_narahubung_optimalisasi" placeholder="Isi Nama Narahubung" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Telp/HP</b>
                <input class="from-control optimalisasi_perangkat_form" type="number" name="no_telp_narahubung_optimalisasi" placeholder="Isi No Telp/HP" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan</b>
                <input class="from-control optimalisasi_perangkat_surat" type="file" name="file_surat_optimalisasi" accept=".pdf" />
            </div>
        </div>
        <div class="form-check">
            <input class="form-check-input optimalisasi_perangkat_form" type="checkbox" id="konfirmasi_optimalisasi" required="">
            <label class="form-check-label" for="konfirmasi_optimalisasi">
                <p class="mb-0"><b>Saya Setuju</b></p>
                <p class="mb-0" style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Pengecekan perangkat hanya akan dilakukan di sisi software khususnya OS, Driver, Virus/Malware dan kinerja komputer.</i></p>
                <p style="text-align: justify; text-justify: inter-word;"><i style="font-size: 15px;">Layanan Optimalisasi hanya berlaku untuk PC/Laptop aset milik pemprov DKI.</i></p>
            </label>
        </div>
        
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>