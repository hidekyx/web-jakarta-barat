<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Edit Laporan Kegiatan</h6>
        </div>
        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
            <i class="material-icons me-2 text-lg">date_range</i>
            <small>30 March 2020</small>
        </div> -->
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        @foreach ($kegiatan as $k)
        <form role="form" class="text-start" action="{{ asset('/kegiatan/update/'.$logged_user->username.'/'.$k->id_kegiatan) }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                <div class="input-group input-group-outline mb-3 ">
                    @if($tanggal_editable == true)
                    <input name="tanggal" type="date" value="{{ $k->tanggal }}" class="form-control" required>
                    @else
                    <input name="tanggal" type="date" value="{{ $k->tanggal }}" class="form-control" readonly>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
            <h6 class="text-dark text-sm ">Jam Mulai : </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="jam_mulai" value="{{ $k->jam_mulai }}" type="time" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-3">
            <h6 class="text-dark text-sm ">Jam Selesai : </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="jam_selesai" value="{{ $k->jam_selesai }}" type="time" class="form-control" required>
                </div>
            </div>
        </div>
        <h6 class="text-dark text-sm ">Kegiatan : </h6>
        <div class="input-group input-group-outline mb-3">
        <select class="form-control" name="id_ruang_lingkup" required>
            <option hidden value="{{ $k->id_ruang_lingkup }}">
                @php echo $ruanglingkup = str_replace(['~'], '', $k->ruanglingkup->deskripsi); @endphp
            </option>
            @foreach ($ruang_lingkup as $rl)
                <option style="padding: 80px;" value="{{ $rl->id_ruang_lingkup }}">
                @php echo $ruanglingkup = str_replace(['~'], '', $rl->deskripsi); @endphp
                </option>
            @endforeach
        </select>
        </div>
        <div class="input-group input-group-outline my-3 focused is-focused">
            @if($logged_user->id_jabatan == 8)
            <label class="form-label">Judul Berita</label>
            @else
            <label class="form-label">Deskripsi Kegiatan</label>
            @endif
            <input name="deskripsi" value="{{ $k->deskripsi }}" type="text" class="form-control" required>
        </div>
        @if($logged_user->id_jabatan != 14)
        <div class="input-group input-group-outline my-3 focused is-focused">
            <label class="form-label">Lokasi</label>
            <input name="lokasi" value="{{ $k->lokasi }}" type="text" class="form-control" required>
        </div>
        @endif
        @if($logged_user->id_jabatan == 8 || $logged_user->id_jabatan == 11)
        @if ($k->link != null)
        <div class="input-group input-group-outline my-3 focused is-focused">
        @else
        <div class="input-group input-group-outline my-3">
        @endif
            <label class="form-label">Link Web</label>
            @if($logged_user->id_jabatan == 11)
            <input name="link" value="{{ $k->link }}" type="text" class="form-control">
            @else
            <input name="link" value="{{ $k->link }}" type="text" class="form-control" required>
            @endif
        </div>
        @endif
        @if($logged_user->id_jabatan == 14)
        <h6 class="text-dark text-sm ">Link Publikasi : </h6>
        <div class="row">
            <div class="col-6">
                @if ($k->kegiatanlink->twitter != null)
                <div class="input-group input-group-outline focused is-focused">
                @else
                <div class="input-group input-group-outline">
                @endif
                    <label class="form-label">Twitter</label>
                    <input name="twitter" value="{{ $k->kegiatanlink->twitter }}" type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                @if ($k->kegiatanlink->instagram != null)
                <div class="input-group input-group-outline focused is-focused">
                @else
                <div class="input-group input-group-outline">
                @endif
                    <label class="form-label">Instagram</label>
                    <input name="instagram" value="{{ $k->kegiatanlink->instagram }}" type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                @if ($k->kegiatanlink->facebook != null)
                <div class="input-group input-group-outline my-3 focused is-focused">
                @else
                <div class="input-group input-group-outline my-3">
                @endif
                    <label class="form-label">Facebook</label>
                    <input name="facebook" value="{{ $k->kegiatanlink->facebook }}" type="text" class="form-control">
                </div>
            </div>
            <div class="col-6">
                @if ($k->kegiatanlink->youtube != null)
                <div class="input-group input-group-outline my-3 focused is-focused">
                @else
                <div class="input-group input-group-outline my-3">
                @endif
                    <label class="form-label">Youtube</label>
                    <input name="youtube" value="{{ $k->kegiatanlink->youtube }}" type="text" class="form-control">
                </div>
            </div>
        </div>
        @endif
        @if($logged_user->id_jabatan != 14 && $logged_user->id_jabatan != 8)
        <div class="input-group input-group-outline my-3">
            <input name="gambar" type="file" id="img" hidden="true" accept="image/*" onchange="setfilename(this.value)">
            <label for="img" class="btn btn-info my-0">Upload Gambar</label>
            @if ($k->gambar != null)            
            <a class="btn btn-danger my-0" id="removeImage" href="#" onclick="hapus()">Hapus</a>
            @else
            <a hidden="true" class="btn btn-danger my-0" id="removeImage" href="#" onclick="hapus()">Hapus</a>
            @endif
            <input name="dokumentasi" value="{{ $k->gambar }}" type="text" id="file" class="form-control my-0" placeholder="Dokumentasi" readonly>
            <script type="text/javascript">
                function setfilename(val)
                {
                    filename = val.split('\\').pop().split('/').pop();
                    document.getElementById('file').value = filename;
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("preview");
                    preview.src = src;
                    preview.hidden = false;
                    preview.style.display = "block";
                    document.getElementById("removeImage").hidden = false;
                }
                function hapus()
                {
                    document.getElementById('file').value = null;
                    document.getElementById("img").value = null;
                    var preview = document.getElementById('preview');
                    preview.src = null;
                    preview.hidden = true;
                    preview.style.display = "hidden";
                    document.getElementById("removeImage").hidden = true;
                }
            </script>
        </div>
        @if ($k->gambar != null)
        <img src="{{ asset('/storage/images/dokumentasi/'.$k->gambar); }}" id="preview" height="160px">
        @else
        <img src="{{ asset('/storage/images/dokumentasi/'.$k->gambar); }}" id="preview" height="160px" hidden>
        @endif
        @endif
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary my-2 mb-2">Simpan</button>
        </div>
        </form>
        @endforeach
    </div>
    </div>
</div>