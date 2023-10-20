<div class="col-lg-8" id="pemulihan_akun" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Pemulihan Akun Pemerintahan</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control pemulihan_akun_form" type="text" name="nama_pemohon_pemulihan" placeholder="Isi Nama Lengkap Pemohon" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control pemulihan_akun_form" type="text" name="nip_pemohon_pemulihan" id="nip_pemohon_pemulihan" placeholder="Isi NIP Pemohon" maxlength="18" minlength="9" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control pemulihan_akun_form" type="text" name="jabatan_pemohon_pemulihan" placeholder="Isi Jabatan Pemohon" maxlength="80" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker pemulihan_akun_form" name="instansi_pemulihan" id="instansi_pemulihan" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No HP Pemohon</b>
                <input class="from-control pemulihan_akun_form" type="text" name="no_hp_pemohon_pemulihan" id="no_hp_pemohon_pemulihan" placeholder="Isi No HP Pemohon" maxlength="15" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Email Instansi</b>
                <input class="from-control pemulihan_akun_form" type="email" name="email_instansi_pemulihan" placeholder="Isi Email Instansi" maxlength="100" />
            </div>
            <div class="col-md-4">
                <b class="contact-title sc-pb-0 primary-color">Seksi / SubBag / Satpel</b>
                <input class="from-control pemulihan_akun_form" type="text" name="seksi_pemulihan" placeholder="Isi Seksi / SubBag / Satpel" required="" />
            </div>
            <div class="col-md-4">
                <b class="contact-title sc-pb-0 primary-color">Bidang / Unit / Bagian</b>
                <input class="from-control pemulihan_akun_form" type="text" name="bidang_pemulihan" placeholder="Isi Bidang / Unit / Bagian" required="" />
            </div>
            <div class="col-md-4">
                <b class="contact-title sc-pb-0 primary-color">Perangkat Daerah</b>
                <input class="from-control pemulihan_akun_form" type="text" name="perangkat_daerah_pemulihan" placeholder="Isi Perangkat Daerah" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Alamat Instansi</b>
                <div class="form-box">
                    <textarea class="from-control pemulihan_akun_form" name="alamat_instansi_pemulihan" placeholder="Tuliskan Alamat Lengkap Instansi" maxlength="500"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Penjelasan Permasalahan</b>
                <div class="form-box">
                    <textarea class="from-control pemulihan_akun_form" name="deskripsi_pemulihan" placeholder="Jelaskan deskripsi, kronologi, ataupun segala cara yang sudah diupayakan dalam mengembalikan akun anda" maxlength="500"></textarea>
                </div>
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Jenis Akun</b>
                <select title="Pilih Jenis Akun" data-size="8" class="form-control form-select selectpicker pemulihan_akun_form" name="jenis_akun_pemulihan" id="jenis_akun_pemulihan" onchange="changeColor(this.id);" required="">
                    <option value="Komputer">Media Sosial</option>
                    <option value="Email">Email</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Username / Email / No HP</b>
                <input class="from-control pemulihan_akun_form" type="text" name="username_pemulihan" placeholder="Isi Username / Email / No HP" maxlength="100" />
            </div>
        </div>

        <hr>
        <h5 class="contact-title sc-pb-15">Informasi Narahubung</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Narahubung</b>
                <input class="from-control pemulihan_akun_form" type="text" name="nama_narahubung_pemulihan" placeholder="Isi Nama Narahubung" maxlength="100" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Telp/HP</b>
                <input class="from-control pemulihan_akun_form" type="text" name="no_telp_narahubung_pemulihan" id="no_telp_narahubung_pemulihan" placeholder="Isi No Telp/HP" maxlength="15" oninput="numberOnly(this.name);" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan</b>
                <input class="from-control pemulihan_akun_form" type="file" name="file_surat_pemulihan" accept=".pdf" required="" />
            </div>
        </div>
        
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>