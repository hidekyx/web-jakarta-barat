<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Layanan Publik</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Layanan Publik</li>
            <li class="breadcrumb-item">@unlink($subpage)</li>
            <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data - Layanan @unlink($subpage)</h5>
                <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/layanan-publik/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Layanan" value="@unlink($subpage)" required disabled>
                            <label for="kategori">Kategori</label>
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" required>
                        <div class="invalid-tooltip">
                            Nama layanan wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="alamat_layanan" class="form-label">Alamat Layanan</label>
                        <textarea class="form-control" placeholder="Alamat Layanan" id="alamat_layanan" name="alamat_layanan" style="height: 100px;" required></textarea>
                        <div class="invalid-tooltip">
                            Alamat layanan wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="foto" class="col-form-label">Foto Bangunan</label>
                        <input class="form-control" type="file" id="foto" accept="image/*" name="foto">
                        <img id="foto_preview" hidden="true" height="160px">
                        <div class="invalid-feedback">Foto harus diisi!</div>
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
    </div>
</main>