<div class="col-lg-8" id="kontra_penginderaan" style="display: none;">
    <div class="contact-box sc-md-mb-10 sc-md-mt-45">
        <h4 class="contact-title sc-pb-15">Biodata Pemohon - Kontra Penginderaan</h4>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Pemohon</b>
                <input class="from-control kontra_penginderaan_form" type="text" name="nama_pemohon_penginderaan" placeholder="Isi Nama Lengkap Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">NIP Pemohon</b>
                <input class="from-control kontra_penginderaan_form" type="number" name="nip_pemohon_penginderaan" placeholder="Isi NIP Pemohon" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Jabatan</b>
                <input class="from-control kontra_penginderaan_form" type="text" name="jabatan_pemohon_penginderaan" placeholder="Isi Jabatan Pemohon" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Unit Kerja</b>
                <select title="Pilih Instansi" data-live-search="true" data-live-search-placeholder="Cari Unit Kerja" data-size="8" class="form-control form-select selectpicker kontra_penginderaan_form" name="instansi_penginderaan" id="instansi_penginderaan" onchange="changeColor(this.id);" required="">
                    @foreach ($instansi as $i)
                        <option value="{{ $i->id_instansi }}">{{ $i->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <h5 class="contact-title sc-pb-15">Detail Permohonan</h5>
        <div class="row">
            <div class="col-md-3">
                <b class="contact-title sc-pb-0 primary-color">Tanggal Pelaksanaan</b>
                <input class="from-control kontra_penginderaan_form" type="date" name="tanggal_pelaksanaan_penginderaan" required="" />
            </div>
            <div class="col-md-3">
                <b class="contact-title sc-pb-0 primary-color">Jam Pelaksanaan</b>
                <input class="from-control kontra_penginderaan_form" type="time" name="waktu_mulai_penginderaan" required="" />
            </div>
            <div class="col-md-6" style="margin-bottom: 30px;">
                <b class="contact-title sc-pb-0 primary-color">Lokasi Pelaksanaan</b>
                <select title="Pilih Lokasi Pelaksanaan" data-size="8" class="form-control form-select selectpicker kontra_penginderaan_form" name="lokasi_pelaksanaan_penginderaan" id="lokasi_pelaksanaan_penginderaan" onchange="changeColor(this.id);" required="">
                    <option value="Ruang Kerja">Ruang Kerja</option>
                    <option value="Ruang Rapat/Pertemuan">Ruang Rapat/Pertemuan</option>
                    <option value="Rumah Dinas">Rumah Dinas</option>
                    <option value="Mobil Dinas">Mobil Dinas</option>
                </select>
            </div>
        </div>
        <hr>
        <h5 class="contact-title sc-pb-15">Informasi Narahubung</h5>
        <div class="row">
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">Nama Narahubung</b>
                <input class="from-control kontra_penginderaan_form" type="text" name="nama_narahubung_penginderaan" placeholder="Isi Nama Narahubung" required="" />
            </div>
            <div class="col-md-6">
                <b class="contact-title sc-pb-0 primary-color">No Telp/HP</b>
                <input class="from-control kontra_penginderaan_form" type="number" name="no_telp_narahubung_penginderaan" placeholder="Isi No Telp/HP" required="" />
            </div>
            <div class="col-md-12">
                <b class="contact-title sc-pb-0 primary-color">Surat Permohonan</b>
                <input class="from-control kontra_penginderaan_form" type="file" name="file_surat_penginderaan" accept=".pdf" required="" />
            </div>
        </div>
        <div class="submit-button sc-primary-btn" style="background-color: #feb52b;">
            <input type="submit" value="Ajukan Layanan" />
        </div>
    </div>
</div>