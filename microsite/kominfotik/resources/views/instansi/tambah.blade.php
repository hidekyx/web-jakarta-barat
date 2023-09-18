<div class="row">
        <div class="col-12">
            <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Tambah Data Unit Kerja</h6>
        </div>
        </div>
        
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/instansi/simpan'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
            <div class="col-lg-12">
            <h6 class="text-dark text-sm ">Nama Instansi: </h6>
                <div class="input-group input-group-outline mb-3">
                    <input name="nama_instansi" type="text" class="form-control" required>
                </div>
            </div>
        </div>
        <hr class="my-3">
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>