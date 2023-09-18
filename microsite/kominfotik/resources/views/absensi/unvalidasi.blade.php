
        <div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Un-Validasi Absen Bulanan</h6>
        </div>
        </div>
    
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/absensi/generate_unvalidasi'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
            <div class="col-lg-4">
                <h6 class="text-dark text-sm ">Seksi: </h6>
                <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="id_seksi" onchange="setuser(this.value)" onmousedown="resetuser(this.value)" required>
                        <option selected disabled hidden>-- --</option>
                        @foreach ($seksi as $s)
                            <option style="padding: 80px;" value="{{ $s->id_seksi }}">
                            {{ $s->nama_seksi }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <script type="text/javascript">
                function resetuser(value)
                {
                    document.getElementById(value).hidden = true;
                    document.getElementById('id_user').disabled = true;
                }
                function setuser(value)
                {
                    document.getElementById(value).hidden = false;
                    document.getElementById('id_user').disabled = false;
                }
            </script>
            <div class="col-lg-4">
                <h6 class="text-dark text-sm ">Pegawai: </h6>
                <div class="input-group input-group-outline mb-3">
                    <select class="form-control" name="id_user" id="id_user" required disabled>
                        <option selected disabled hidden>-- --</option>
                        @foreach ($seksi as $key => $s)
                        <optgroup label="{{ $s->nama_seksi }}" id="{{ $s->id_seksi }}" hidden>
                            @foreach ($user[$key+1] as $u)
                                <option style="padding: 80px;" value="{{ $u->id_user }}">
                                {{ $u->nama_lengkap }}
                                </option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4">
                <h6 class="text-dark text-sm ">Bulan: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="bulan" type="month" class="form-control" required>
                </div>
            </div>
        </div>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Pilih bulan untuk unvalidasi data absen</p>
        <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Total perhitungan absensi bulanan akan dikalkulasi ulang setelah validasi kembali</p>
        <hr class="mt-1">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>