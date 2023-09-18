<div id="instalasi" style="display: none;">
    <div class="mb-4">
        <label for="name" class="label-form">Jenis Instalasi Jaringan</label>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="checkbox" id="jenis_5" value="Instalasi kabel jaringan baru" name="jenis[]">
                    <label class="form-check-label" for="jenis_5">Instalasi kabel jaringan baru</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="checkbox" id="jenis_6" value="Penambahan kabel jaringan" name="jenis[]">
                    <label class="form-check-label" for="jenis_6">Penambahan kabel jaringan</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="checkbox" id="jenis_7" value="Penataan kabel jaringan" name="jenis[]">
                    <label class="form-check-label" for="jenis_7">Penataan kabel jaringan</label>
                </div>
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
        <label for="name" class="label-form">Cakupan Instalasi</label>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="radio" id="cakupan_1" value="Satu atau Beberapa PC" name="cakupan">
                    <label class="form-check-label" for="cakupan_1">Satu atau Beberapa PC</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="radio" id="cakupan_2" value="Satu Ruangan" name="cakupan">
                    <label class="form-check-label" for="cakupan_2">Satu Ruangan</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="radio" id="cakupan_3" value="Satu Lantai" name="cakupan">
                    <label class="form-check-label" for="cakupan_3">Satu Lantai</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input instalasi" type="radio" id="cakupan_4" value="Satu Gedung" name="cakupan">
                    <label class="form-check-label" for="cakupan_4">Satu Gedung</label>
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
            <label for="name" class="label-form">Deskripsi Instalasi</label>
            <input type="text" name="deskripsi_1" class="form-control instalasi" id="deskripsi_1" placeholder="Isi Deskripsi Instalasi">
        </div>
    </div>

    <label class="label-form" for="gambar_1">Unggah Foto Kondisi</label>
    <input type="file" class="form-control instalasi" id="gambar_1" name="gambar_1" accept="image/*" onchange="gambar_upload(this.value)">
    <script type="text/javascript">
        function gambar_upload(val)
        {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.hidden = false;
            preview.style.display = "block";
        }
    </script>
    <img id="file-ip-1-preview" hidden="true" height="160px" class="mb-3">

    <div class="mb-4 my-4">
        <div class="form-group">
            <label for="name" class="label-form">No Surat</label>
            <input type="text" name="no_surat" class="form-control instalasi" id="no_surat" placeholder="Isi No Surat" maxlength="30">
        </div>
    </div>

    <div class="mb-4">
        <div class="form-group">
            <label for="name" class="label-form">Tanggal Surat</label>
            <input type="date" name="tanggal_surat" class="form-control instalasi" id="tanggal_surat">
        </div>
    </div>

    <div class="mb-4">
        <div class="form-group">
            <label for="name" class="label-form">Perihal Surat</label>
            <input type="text" name="perihal_surat" class="form-control instalasi" id="perihal_surat" placeholder="Isi Perihal Surat"  maxlength="100">
        </div>
    </div>

    <div class="mb-4">
        <div class="form-group">
            <label class="label-form" for="surat">Unggah File Surat</label>
            <input type="file" class="form-control instalasi" id="surat" name="file" accept=".pdf">
        </div>
    </div>
    
    <div class="my-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
    </div>
    <div class="text-center"><button type="submit">Kirim</button></div>
</div>