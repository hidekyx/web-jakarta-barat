
<div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Export Data Absen</h6>
        </div>
        </div>
    
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/absensi/generate_export_bulanan'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
            <div class="col-lg-6 mb-3">
                <h6 class="text-dark text-sm ">Bulan: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="bulan" type="month" class="form-control" required>
                </div>
                <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Pilih bulan untuk melakukan export data absen ke dalam format excel</p>
                <p class="text-xs font-weight-bold font-italic text-secondary mb-0">*) Data yang akan di excel hanyalah data absen yang sudah divalidasi terlebih dahulu oleh kepala seksi</p>
            </div>
        </div>
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>