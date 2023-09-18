
        <div class="row">
        <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">Ubah Password</h6>
        </div>
        </div>
    
    <div class="card-body pt-4 p-3">
        <form role="form" class="text-start" action="{{ asset('/profil/password_update/'.$logged_user->username); }}" method="post" enctype="multipart/form-data" autocomplete="off">
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
        <h6 class="text-dark text-sm ">Masukkan kata sandi lama : </h6>
        <div class="input-group input-group-outline my-0 pb-3">
            <label class="form-label">Kata sandi lama</label>
            <input name="password_lama" type="password" class="form-control" required>
        </div>
        <hr>
        <h6 class="text-dark text-sm ">Masukkan kata sandi baru : </h6>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Kata sandi baru</label>
            <input name="password" type="password" class="form-control" required>
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Ulangi kata sandi baru</label>
            <input name="password_confirmation" type="password" class="form-control" required>
        </div>
        <div class="text-left">
            <button type="submit" class="btn bg-gradient-primary my-2 mb-2">Simpan</button>
        </div>
        </form>
    </div>
    </div>
</div>