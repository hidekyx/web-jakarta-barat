<div class="col-12 mt-4">
    <div class="card h-100 mb-4">
    <div class="card-header pb-0 px-3">
        <div class="row">
        <div class="col-md-6">
            <h6 class="mb-0">Kompensasi - {{ $user->nama_lengkap }}</h6>
        </div>
        
        </div>
    </div>
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/absensi/generate_kompensasi/'.$user->username) }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="username" value="{{ $user->username }}">
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
        <div class="container-zero">
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group input-group-outline mb-3 focused is-focused">
                    <label class="form-label">Bulan</label>
                    <input readonly type="month" name="bulan" class="form-control" value="{{ $filter_bulan }}" required>
                </div>
            </div>
            @if($kompensasi != null)
            <div class="col-lg-2">
                @if($kompensasi->jumlah != null)
                <div class="input-group input-group-outline mb-3 focused is-focused">
                @else
                <div class="input-group input-group-outline mb-3">
                @endif
                    <label class="form-label">Jumlah Kompensasi</label>
                    <input type="number" name="jumlah" value="{{ $kompensasi->jumlah }}" class="form-control">
                </div>
            </div>     
            <div class="col-lg-8">
                @if($kompensasi->keterangan != null)
                <div class="input-group input-group-outline mb-3 focused is-focused">
                @else
                <div class="input-group input-group-outline mb-3">
                @endif
                    <label class="form-label">Keterangan Kompensasi</label>
                    <input name="keterangan" name="keterangan" value="{{ $kompensasi->keterangan }}" type="text" class="form-control">
                </div>
            </div>
            @else
            <div class="col-lg-2">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Jumlah Kompensasi</label>
                    <input type="number" name="jumlah" class="form-control">
                </div>
            </div>     
            <div class="col-lg-8">
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Keterangan Kompensasi</label>
                    <input name="keterangan" name="keterangan" type="text" class="form-control">
                </div>
            </div>
            @endif
        </div>
        </div>
        <hr class="mt-1">
        <div class="text-left">
            <!-- <button type="submit" class="btn bg-gradient-info ml-2 mb-2 add-field">Tambah</button> -->
            <button type="submit" class="btn bg-gradient-primary ml-2 mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>