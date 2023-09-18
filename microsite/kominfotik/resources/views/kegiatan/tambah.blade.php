<div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Input Laporan Kegiatan - {{ $logged_user->jabatan->nama_jabatan }}</h6>
        </div>
        </div>
        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>30 March 2020</small>
        </div> -->
        
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/kegiatan/simpan'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row">
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="text-sm">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-lg-6">
            <h6 class="text-dark text-sm ">Tanggal : </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal" type="date" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-3">
            <h6 class="text-dark text-sm ">Jam Mulai : </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="jam_mulai" type="time" class="form-control" value="07:30:00" required>
                </div>
            </div>
            <div class="col-lg-3">
            <h6 class="text-dark text-sm ">Jam Selesai : </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="jam_selesai" type="time" class="form-control" value="16:30:00" required>
                </div>
            </div>
        </div>
        <h6 class="text-dark text-sm"> Kegiatan : </h6>
        <div class="input-group input-group-outline mb-3">
        <select class="form-control" name="id_ruang_lingkup" required>
            <option selected disabled hidden>-- Pilih Ruang Lingkup --</option>
            @foreach ($ruang_lingkup as $rl)
                <option style="padding: 80px;" value="{{ $rl->id_ruang_lingkup }}">
                @php echo $ruanglingkup = str_replace(['~'], '', $rl->deskripsi); @endphp
                </option>
            @endforeach
            
        </select>
        </div>
        <div class="input-group input-group-outline my-3">
            @if($logged_user->id_jabatan == 8)
            <label class="form-label">Judul Berita</label>
            @else
            <label class="form-label">Deskripsi Kegiatan</label>
            @endif
            <input name="deskripsi" type="text" class="form-control" required>
        </div>
        @if($logged_user->id_jabatan != 14)
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Lokasi</label>
            <input name="lokasi" type="text" class="form-control" maxlength="100" required>
        </div>
        @endif
        @if($logged_user->id_jabatan == 8 || $logged_user->id_jabatan == 11)
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Link Web</label>
            @if($logged_user->id_jabatan == 11)
            <input name="link" type="text" class="form-control" >
            @else
            <input name="link" type="text" class="form-control" required>
            @endif
        </div>
        @endif
        @if($logged_user->id_jabatan == 14)
        <h6 class="text-dark text-sm ">Link Publikasi : </h6>
        <div class="row">
            <div class="col-6">
                <div class="input-group input-group-outline">
                    <label class="form-label">Twitter</label>
                    <input name="twitter" type="text" class="form-control" maxlength="1000">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-outline">
                    <label class="form-label">Instagram</label>
                    <input name="instagram" type="text" class="form-control" maxlength="1000">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Facebook</label>
                    <input name="facebook" type="text" class="form-control" maxlength="1000">
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">Youtube</label>
                    <input name="youtube" type="text" class="form-control" maxlength="1000">
                </div>
            </div>
        </div>
        @endif
        @if($logged_user->id_jabatan != 14 && $logged_user->id_jabatan != 8)
        <div class="input-group input-group-outline my-3">
            @if($logged_user->id_jabatan == 11)
            <input name="gambar" type="file" id="img" hidden="true" accept="image/*" onchange="setfilename(this.value)">
            <label for="img" class="btn btn-info my-0">Upload Gambar</label>
            <input name="dokumentasi" type="text" id="file" class="form-control my-0" placeholder="Dokumentasi" readonly>
            @else
            <input name="gambar" type="file" id="img" hidden="true" accept="image/*" onchange="setfilename(this.value)" required>
            <label for="img" class="btn btn-info my-0">Upload Gambar</label>
            <input name="dokumentasi" type="text" id="file" class="form-control my-0" placeholder="Dokumentasi" readonly required>
            @endif
            <script type="text/javascript">
                function setfilename(val)
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
        <img id="file-ip-1-preview" hidden="true" height="160px">
        @endif
        <hr class="my-3">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>