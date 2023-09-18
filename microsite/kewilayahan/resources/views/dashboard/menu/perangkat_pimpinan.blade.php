<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Perangkat</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Perangkat</li>
            <li class="breadcrumb-item active">@unlink($subpage)</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Data - @unlink($subpage)</h5>
                    <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/perangkat/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="foto_pimpinan" class="col-form-label">Foto Identitas Pimpinan</label>
                            <input class="form-control" type="file" id="foto_pimpinan" accept="image/*" name="foto_pimpinan" required>
                            @if($data_perangkat)
                                @if($data_perangkat->foto_pimpinan != null)
                                <img id="foto_pimpinan_preview" src="{{ asset('storage/files/images/foto/pimpinan/'.$data_perangkat->foto_pimpinan) }}" height="160px">
                                @endif
                            @else
                            <img id="foto_pimpinan_preview" hidden="true" height="160px">
                            @endif
                            <div class="invalid-feedback">Foto pimpinan harus diisi!</div>
                        </div>
                        @push('scripts')
                        <script type="text/javascript">
                            $('input[type="file"]').change(function(e) {
                                var id_preview = $(this).attr('id') + '_preview';
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById(id_preview).src = e.target.result;
                                    document.getElementById(id_preview).hidden = false;
                                };
                                reader.readAsDataURL(this.files[0]);
                            });
                        </script>
                        @endpush
                        <div class="col-md-12 position-relative">
                            <label for="nama_pimpinan" class="form-label">Nama Pimpinan</label>
                            @if($data_perangkat)
                                <input type="text" class="form-control" placeholder="Isi nama pimpinan" value="{{ $data_perangkat->nama_pimpinan }}" id="nama_pimpinan" name="nama_pimpinan" required>
                            @else
                                <input type="text" class="form-control" placeholder="Isi nama pimpinan" id="nama_pimpinan" name="nama_pimpinan" required>
                            @endif
                            <div class="invalid-feedback">Nama pimpinan harus diisi!</div>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="nip_pimpinan" class="form-label">NIP / NRK Pimpinan</label>
                            @if($data_perangkat)
                                <input type="text" class="form-control" placeholder="Isi NIP / NRK pimpinan" value="{{ $data_perangkat->nip_pimpinan }}" id="nip_pimpinan" name="nip_pimpinan" required>
                            @else
                                <input type="text" class="form-control" placeholder="Isi NIP / NRK pimpinan" id="nip_pimpinan" name="nip_pimpinan" required>
                            @endif
                            <div class="invalid-feedback">NIP / NRK pimpinan harus diisi!</div>
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="pangkat_pimpinan" class="form-label">Pangkat Pimpinan</label>
                            @if($data_perangkat)
                                <input type="text" class="form-control" placeholder="Isi pangkat pimpinan" value="{{ $data_perangkat->pangkat_pimpinan }}" id="pangkat_pimpinan" name="pangkat_pimpinan" required>
                            @else
                                <input type="text" class="form-control" placeholder="Isi pangkat pimpinan" id="pangkat_pimpinan" name="pangkat_pimpinan" required>
                            @endif
                            <div class="invalid-feedback">Pangkat pimpinan harus diisi!</div>
                        </div>
                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Preview Website</h5>
                </div>
            </div>
        </div>
    </div>
</main>