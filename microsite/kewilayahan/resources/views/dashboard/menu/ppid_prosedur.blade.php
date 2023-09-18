<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data PPID</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">PPID</li>
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
                    <form class="row g-3 needs-validation" id="form-prosedur-ppid" method="post" action="{{ asset('dashboard/ppid/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="struktur_organisasi" class="col-form-label">Infografis @unlink($subpage)</label>
                            <input class="form-control" type="file" id="prosedur" accept="image/*" name="prosedur">
                            @if($data_ppid)
                                @if($data_ppid->gambar != null)
                                <img id="prosedur_preview" src="{{ asset('storage/files/images/foto/ppid_prosedur/'.$data_ppid->gambar) }}" width="100%">
                                @endif
                            @else
                            <img id="prosedur_preview" hidden="true" width="100%">
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