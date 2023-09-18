<div id="lainnya" style="display: none;">    
    <h6 class="text-dark text-sm" id="deskripsi_teks">Deskripsi Permohonan Lainnya: </h6>
    <div class="input-group input-group-outline focused is-focused" id="deskripsi_form_3">
        <label class="form-label">Deskripsi</label>
        <input name="deskripsi_3" id="deskripsi_3" type="text" class="form-control lainnya">
    </div>

    <div class="input-group input-group-outline my-3">
        <input name="gambar_3" type="file" id="img_3" hidden="true" accept="image/*" onchange="gambar_upload_3(this.value)" class="lainnya">
        <label for="img_3" class="btn btn-info my-0">Upload Gambar</label>
        <input name="dokumentasi_3" type="text" id="file_3" class="form-control lainnya my-0" placeholder="Upload foto kondisi lokasi rencana lainnya" readonly>
        <script type="text/javascript">
            function gambar_upload_3(val)
            {
                filename = val.split('\\').pop().split('/').pop();
                document.getElementById('file_3').value = filename;
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-3-preview");
                preview.src = src;
                preview.hidden = false;
                preview.style.display = "block";
            }
        </script>
    </div>
    <img id="file-ip-3-preview" hidden="true" height="160px" class="mb-3">

    <h6 class="text-dark text-sm ">Keterangan Surat Permohonan: </h6>
    <div class="input-group input-group-outline focused is-focused" id="no_surat_form_2">
        <label class="form-label">No Surat</label>
        <input name="no_surat_2" id="no_surat_2" type="text" class="form-control lainnya" maxlength="30">
    </div>
    <div class="input-group input-group-outline my-3 focused is-focused">
        <label class="form-label">Tanggal Surat</label>
        <input name="tanggal_surat_2" id="tanggal_surat_2" type="date" class="form-control lainnya">
    </div>
    <div class="input-group input-group-outline my-3 focused is-focused" id="perihal_surat_form_2">
        <label class="form-label">Perihal Surat</label>
        <input name="perihal_surat_2" id="perihal_surat_2" type="text" class="form-control lainnya" maxlength="100">
    </div>
    <div class="input-group input-group-outline my-3">
        <input name="file_2" type="file" id="surat_2" hidden="true" accept=".pdf" onchange="surat_upload_2(this.value)" class="lainnya">
        <label for="surat_2" class="btn btn-info my-0">Upload Surat</label>
        <input name="namasurat_2" type="text" id="files_2" class="form-control lainnya my-0" placeholder="Upload surat permohonan dengan format .pdf" readonly>
        <script type="text/javascript">
            function surat_upload_2(val)
            {
                filename = val.split('\\').pop().split('/').pop();
                document.getElementById('files_2').value = filename;
                var src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </div>
</div>
