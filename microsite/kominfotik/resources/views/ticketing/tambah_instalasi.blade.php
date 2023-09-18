<div id="instalasi" style="display: none;">    
    <h6 class="text-dark text-sm ">Jenis Instalasi Jaringan: </h6>
    <div class="form-group options">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input instalasi" id="jenis_5" name="jenis[]" value="Instalasi kabel jaringan baru">
            <label class="custom-control-label" for="jenis_5">Instalasi kabel jaringan baru</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input instalasi" id="jenis_6" name="jenis[]" value="Penambahan kabel jaringan">
            <label class="custom-control-label" for="jenis_6">Penambahan kabel jaringan</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input instalasi" id="jenis_7" name="jenis[]" value="Penataan kabel jaringan">
            <label class="custom-control-label" for="jenis_7">Penataan kabel jaringan</label>
        </div>
        @isset($logged_user)
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input instalasi" id="jenis_8" name="jenis[]" value="Pemasangan Rackmount">
            <label class="custom-control-label" for="jenis_8">Pemasangan Rackmount</label>
        </div>
        @endif
    </div>

    <h6 class="text-dark text-sm ">Cakupan Instalasi Jaringan: </h6>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input instalasi" id="cakupan_1" name="cakupan" value="Satu atau Beberapa PC">
        <label class="custom-control-label" for="cakupan_1">Satu atau Beberapa PC</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input instalasi" id="cakupan_2" name="cakupan" value="Satu Ruangan">
        <label class="custom-control-label" for="cakupan_2">Satu Ruangan</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input instalasi" id="cakupan_3" name="cakupan" value="Satu Lantai">
        <label class="custom-control-label" for="cakupan_3">Satu Lantai</label>
    </div>
    <div class="custom-control custom-radio mb-3">
        <input type="radio" class="custom-control-input instalasi" id="cakupan_4" name="cakupan" value="Satu Gedung">
        <label class="custom-control-label" for="cakupan_4">Satu Gedung</label>
    </div>

    <script>
        var checkbox_required = $('input[type="checkbox"]');
        checkbox_required.prop('required', true);
        checkbox_required.on('click', function() {
            if (checkbox_required.is(':checked')) {
                checkbox_required.prop('required', false);
            }
            else {
                checkbox_required.prop('required', true);
            }
        });
    </script>

    <h6 class="text-dark text-sm" id="deskripsi_teks">Deskripsi Permohonan: </h6>
    <div class="input-group input-group-outline focused is-focused" id="deskripsi_form_1">
        <label class="form-label">Deskripsi</label>
        <input name="deskripsi_1" id="deskripsi_1" type="text" class="form-control instalasi">
    </div>

    <div class="input-group input-group-outline my-3">
        <input name="gambar_1" type="file" id="img" hidden="true" accept="image/*" onchange="gambar_upload(this.value)" class="instalasi">
        <label for="img" class="btn btn-info my-0">Upload Gambar</label>
        <input name="dokumentasi_1" type="text" id="file" class="form-control instalasi my-0" placeholder="Upload foto kondisi lokasi rencana instalasi" readonly>
        <script type="text/javascript">
            function gambar_upload(val)
            {
                filename = val.split('\\').pop().split('/').pop();
                document.getElementById('file').value = filename;
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.hidden = false;
                preview.style.display = "block";
            }
        </script>
    </div>
    <img id="file-ip-1-preview" hidden="true" height="160px" class="mb-3">

    <h6 class="text-dark text-sm ">Keterangan Surat Permohonan: </h6>
    <div class="input-group input-group-outline focused is-focused" id="no_surat_form">
        <label class="form-label">No Surat</label>
        <input name="no_surat" id="no_surat" type="text" class="form-control instalasi" maxlength="30">
    </div>
    <div class="input-group input-group-outline my-3 focused is-focused">
        <label class="form-label">Tanggal Surat</label>
        <input name="tanggal_surat" id="tanggal_surat" type="date" class="form-control instalasi">
    </div>
    <div class="input-group input-group-outline my-3 focused is-focused" id="perihal_surat_form">
        <label class="form-label">Perihal Surat</label>
        <input name="perihal_surat" id="perihal_surat" type="text" class="form-control instalasi" maxlength="100">
    </div>
    <div class="input-group input-group-outline my-3">
        <input name="file" type="file" id="surat" hidden="true" accept=".pdf" onchange="surat_upload(this.value)" class="instalasi">
        <label for="surat" class="btn btn-info my-0">Upload Surat</label>
        <input name="namasurat" type="text" id="files" class="form-control instalasi my-0" placeholder="Upload surat permohonan dengan format .pdf" readonly>
        <script type="text/javascript">
            function surat_upload(val)
            {
                filename = val.split('\\').pop().split('/').pop();
                document.getElementById('files').value = filename;
                var src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </div>
</div>
