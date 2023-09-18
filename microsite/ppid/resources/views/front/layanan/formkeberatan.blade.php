<div class="container-fluid wow fadeInUp" data-wow-delay="0.3s">
    <div class="container">
    <form action="{{ asset('/standar-layanan/form-pengajuan-keberatan-informasi-publik/submit'); }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-6 col-12 mb-4">
        @if(session('errors'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            @foreach ($errors->all() as $error)
            <span class="text-sm">{{ $error }}</span>
            @endforeach
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h4>Pengajuan Keberatan</h4>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Kode Permohonan</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Kode Permohonan" name="kode_permohonan" style="height: 55px;" maxLength="20">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">NIK</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-0 bg-light px-4" required="required" placeholder="Input NIK" name="nik" style="height: 55px;" maxLength="20">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Keterangan</label>
                    <div class="input-group mb-2">
                        <textarea class="form-control border-0 bg-light px-4" style="height: 140px;" placeholder="Input Keterangan Pengajuan Keberatan" required="required" name="keterangan_keberatan"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary py-3 px-4" type="submit">Kirim</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</div>