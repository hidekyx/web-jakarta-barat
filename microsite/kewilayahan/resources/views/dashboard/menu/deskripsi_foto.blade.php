<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Deskripsi Website</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Deskripsi Website</li>
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
                    <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/deskripsi-website/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="foto_bangunan" class="col-form-label">Foto Bangunan</label>
                            <input class="form-control" type="file" id="foto_bangunan" accept="image/*" name="foto_bangunan" onchange="setpreview(this.value)">
                            @if($data_deskripsi)
                                @if($data_deskripsi->foto_bangunan != null)
                                <img id="foto_bangunan_preview" src="{{ asset('storage/files/images/foto/banner/'.$data_deskripsi->foto_bangunan) }}" height="160px">
                                @endif
                            @else
                            <img id="foto_bangunan_preview" hidden="true" height="160px">
                            @endif
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="foto_bangunan" class="col-form-label">Foto Banner #1</label>
                            <input class="form-control" type="file" id="foto_banner_1" accept="image/*" name="foto_banner_1" onchange="setpreview(this.value)">
                            @if($data_deskripsi)
                                @if($data_deskripsi->foto_banner_1 != null)
                                <img id="foto_banner_1_preview" src="{{ asset('storage/files/images/foto/banner/'.$data_deskripsi->foto_banner_1) }}" height="160px">
                                @endif
                            @else
                            <img id="foto_banner_1_preview" hidden="true" height="160px">
                            @endif
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="foto_bangunan" class="col-form-label">Foto Banner #2</label>
                            <input class="form-control" type="file" id="foto_banner_2" accept="image/*" name="foto_banner_2" onchange="setpreview(this.value)">
                            @if($data_deskripsi)
                                @if($data_deskripsi->foto_banner_2 != null)
                                <img id="foto_banner_2_preview" src="{{ asset('storage/files/images/foto/banner/'.$data_deskripsi->foto_banner_2) }}" height="160px">
                                @endif
                            @else
                            <img id="foto_banner_2_preview" hidden="true" height="160px">
                            @endif
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="foto_bangunan" class="col-form-label">Foto Banner #3</label>
                            <input class="form-control" type="file" id="foto_banner_3" accept="image/*" name="foto_banner_3" onchange="setpreview(this.value)">
                            @if($data_deskripsi)
                                @if($data_deskripsi->foto_banner_3 != null)
                                <img id="foto_banner_3_preview" src="{{ asset('storage/files/images/foto/banner/'.$data_deskripsi->foto_banner_3) }}" height="160px">
                                @endif
                            @else
                            <img id="foto_banner_3_preview" hidden="true" height="160px">
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