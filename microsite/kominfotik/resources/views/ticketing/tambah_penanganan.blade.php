<div id="penanganan" style="display: none;">
    
    <h6 class="text-dark text-sm ">Jenis Permasalahan Jaringan: </h6>
    <div class="form-group options">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input penanganan" id="jenis_1" name="jenis[]" value="Tidak bisa akses internet">
            <label class="custom-control-label" for="jenis_1">Tidak bisa akses internet</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input penanganan" id="jenis_2" name="jenis[]" value="Internet lambat">
            <label class="custom-control-label" for="jenis_2">Internet lambat</label>
        </div>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input penanganan" id="jenis_3" name="jenis[]" value="Wifi tidak bisa diakses">
            <label class="custom-control-label" for="jenis_3">Wifi tidak bisa diakses</label>
        </div>
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input penanganan" id="jenis_4" onchange='handleChange(this);'>
            <label class="custom-control-label" for="jenis_4">Lainnya</label>
        </div>
        <div class="row">
            <div class="col-lg-4 col-12 collapse" id="lainnya">
                <div class="input-group input-group-outline mb-3 focused is-focused" id="lainnya_form">
                    <label class="form-label">Jenis Permasalahan Jaringan Lainnya</label>
                    <input name="jenis_lainnya" id="lainnya_text" type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>

    <h6 id="cakupan_teks" class="text-dark text-sm ">Cakupan Permasalahan: </h6>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input penanganan" id="cakupan_5" name="cakupan" value="Satu atau Beberapa PC">
        <label class="custom-control-label" for="cakupan_5">Satu atau Beberapa PC</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input penanganan" id="cakupan_6" name="cakupan" value="Satu Ruangan">
        <label class="custom-control-label" for="cakupan_6">Satu Ruangan</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input penanganan" id="cakupan_7" name="cakupan" value="Satu Lantai">
        <label class="custom-control-label" for="cakupan_7">Satu Lantai</label>
    </div>
    <div class="custom-control custom-radio mb-3">
        <input type="radio" class="custom-control-input penanganan" id="cakupan_8" name="cakupan" value="Satu Gedung">
        <label class="custom-control-label" for="cakupan_8">Satu Gedung</label>
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
    <script>
        function handleChange(checkbox) {
            if(checkbox.checked == true){
                $('#lainnya').collapse('show');
                $('#lainnya_text').prop('required', true);
            }
            else{
                $('#lainnya').collapse('hide');
                $('#lainnya_text').prop('required', false);
            }
        }
    </script>

    <h6 class="text-dark text-sm" id="deskripsi_teks">Deskripsi Permasalahan: </h6>
    <div class="input-group input-group-outline focused is-focused" id="deskripsi_form_2">
        <label class="form-label">Deskripsi</label>
        <input name="deskripsi_2" id="deskripsi_2" type="text" class="form-control penanganan">
    </div>

    <div class="input-group input-group-outline my-3">
        <input name="gambar_2" type="file" id="img_2" hidden="true" accept="image/*" onchange="gambar_upload_2(this.value)" class="penanganan">
        <label for="img_2" class="btn btn-info my-0">Upload Gambar</label>
        <input name="dokumentasi_2" type="text" id="file_2" class="form-control penanganan my-0" placeholder="Upload gambar pendukung (contoh: kondisi modem, router, switch, test ping, speed test)" readonly>
        <script type="text/javascript">
            function gambar_upload_2(val)
            {
                filename = val.split('\\').pop().split('/').pop();
                document.getElementById('file_2').value = filename;
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.hidden = false;
                preview.style.display = "block";
            }
        </script>
    </div>
    <img id="file-ip-2-preview" hidden="true" height="160px" class="mb-3">
</div>