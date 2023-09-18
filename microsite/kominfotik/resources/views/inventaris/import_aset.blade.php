<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Import Data Aset</h6>
        </div>
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/inventaris/generate'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
        <div class="input-group input-group-outline my-0 pb-3">
            <input name="file" type="file" id="img" hidden="true" accept=".xlsx" onchange="setfilename(this.value)" required>
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
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Developer only</p>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Form import ini untuk memasukkan data aset dari format excel ke dalam tabel inventaris</p>
        <hr class="mt-1">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>