<div id="penanganan" style="display: none;">
    <div class="mb-4">
        <label for="name" class="label-form">Jenis Permasalahan Jaringan</label>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="checkbox" id="jenis_1" value="Tidak bisa akses internet" name="jenis[]">
                    <label class="form-check-label" for="jenis_1">Tidak bisa akses internet</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="checkbox" id="jenis_2" value="Internet lambat" name="jenis[]">
                    <label class="form-check-label" for="jenis_2">Internet lambat</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="checkbox" id="jenis_3" value="Wifi tidak bisa diakses" name="jenis[]">
                    <label class="form-check-label" for="jenis_3">Wifi tidak bisa diakses</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="checkbox" id="jenis_4" onchange="handleChange(this);">
                    <label class="form-check-label" for="jenis_4">Lainnya</label>
                </div>
            </div>
        </div>
        <div class="collapse" id="lainnya">
            <div class="form-group" id="lainnya_form">
                <input type="text" name="jenis_lainnya" class="form-control" id="lainnya_text" placeholder="Permasalahan lainnya">
            </div>
        </div>
        <script>
            function handleChange(checkbox) {
                if(checkbox.checked == true){
                    $('#lainnya').fadeIn();
                    $('#lainnya_text').prop('required', true);
                }
                else{
                    $('#lainnya').fadeOut();
                    $('#lainnya_text').prop('required', false);
                }
            }
        </script>
    </div>

    <div class="mb-4">
        <label for="name" class="label-form">Cakupan Permasalahan</label>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="radio" id="cakupan_5" value="Satu atau Beberapa PC" name="cakupan">
                    <label class="form-check-label" for="cakupan_5">Satu atau Beberapa PC</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="radio" id="cakupan_6" value="Satu Ruangan" name="cakupan">
                    <label class="form-check-label" for="cakupan_6">Satu Ruangan</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="radio" id="cakupan_7" value="Satu Lantai" name="cakupan">
                    <label class="form-check-label" for="cakupan_7">Satu Lantai</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input penanganan" type="radio" id="cakupan_8" value="Satu Gedung" name="cakupan">
                    <label class="form-check-label" for="cakupan_8">Satu Gedung</label>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript">
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
    @endpush

    <div class="mb-4">
        <div class="form-group">
            <label for="name" class="label-form">Deskripsi Permasalahan</label>
            <input type="text" name="deskripsi_2" class="form-control penanganan" id="deskripsi_2" placeholder="Isi Deskripsi Permasalahan" required>
        </div>
    </div>

    <label class="label-form" for="gambar_2">Unggah Foto Kondisi</label>
    <input type="file" class="form-control penanganan" id="gambar_2" name="gambar_2" accept="image/*" onchange="gambar_upload_2(this.value)" required>
    <script type="text/javascript">
        function gambar_upload_2(val)
        {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-2-preview");
            preview.src = src;
            preview.hidden = false;
            preview.style.display = "block";
        }
    </script>
    <img id="file-ip-2-preview" hidden="true" height="160px" class="mb-3">
    
    <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
    </div>
    <div class="text-center"><button type="submit">Kirim</button></div>
</div>