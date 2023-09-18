
        <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Import Data Absen WFH</h6>
        </div>
        </div>
    
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/absensi/generate_wfh'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="row px-2">
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
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('error') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm">{{ Session::get('success') }}</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Awal: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal_awal" type="date" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-dark text-sm ">Tanggal Akhir: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="tanggal_akhir" type="date" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="input-group input-group-outline my-0 pb-3">
            <input name="file" type="file" id="img" hidden="true" accept=".csv" onchange="setfilename(this.value)" required>
            <label for="img" class="btn btn-info my-0">Upload Data</label>
            <input name="namafile" type="text" id="file" class="form-control my-0" placeholder="Filename" readonly required>
            <script type="text/javascript">
                function setfilename(val)
                {
                    filename = val.split('\\').pop().split('/').pop();
                    document.getElementById('file').value = filename;
                    var src = URL.createObjectURL(event.target.files[0]);
                }
            </script>
        </div>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) File yang di import harus format .csv</p>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Form tanggal awal harus diisi dengan tanggal awal bulan sesuai data yang di upload</p>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Form tanggal akhir harus diisi dengan tanggal akhir bulan sesuai data yang di upload</p>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Pastikan nama header kolom pada excel yang akan di import sudah sesuai</p>
        <hr class="mt-1">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>