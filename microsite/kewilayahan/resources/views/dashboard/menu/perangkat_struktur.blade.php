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
                    <form class="row g-3 needs-validation" id="form-struktur-organisasi" method="post" action="{{ asset('dashboard/perangkat/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="struktur_organisasi" class="col-form-label">Bagan Struktur Organisasi</label>
                            <input class="form-control" type="file" id="struktur_organisasi" accept="image/*" name="struktur_organisasi" onchange="setpreview(this.value)">
                            @if($data_perangkat)
                                @if($data_perangkat->struktur_organisasi != null)
                                <img id="struktur_organisasi_preview" src="{{ asset('storage/files/images/foto/struktur_organisasi/'.$data_perangkat->struktur_organisasi) }}" width="100%">
                                @endif
                            @else
                            <img id="struktur_organisasi_preview" hidden="true" width="100%">
                            @endif
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