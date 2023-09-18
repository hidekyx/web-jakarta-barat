<div class="container-fluid wow fadeInUp" data-wow-delay="0.3s">
    <div class="container">
    <form action="{{ asset('/standar-layanan/form-permohonan-informasi-publik/submit'); }}" method="post" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row">
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
        <div class="col-lg-6 col-12 mb-4">
        <h4>Identitas Pemohon</h4>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Kategori Permohonan</label>
                    <div class="input-group mb-2">
                        <select class="form-control border-0 bg-light px-4" name="kategori" style="height: 55px;" required="required">
                            <option hidden selected>Pilih Kategori</option>
                            <option value="Perorangan">Perorangan</option>
                            <option value="Lembaga">Lembaga / Organisasi</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <div class="input-group mb-2">
                        <textarea class="form-control border-0 bg-light px-4" style="height: 140px;" placeholder="Input Alamat" required="required" name="alamat"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Email</label>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Email" name="email" style="height: 55px;" maxLength="30">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">No Telepon</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-0 bg-light px-4" required="required" placeholder="Input No Telepon" name="no_telp" style="height: 55px;" maxLength="15">
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Pekerjaan</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control border-0 bg-light px-4" required="required" placeholder="Input Pekerjaan" name="pekerjaan" style="height: 55px;" maxLength="30">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
        <h4>Data Permohonan</h4>
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Rincian Informasi</label>
                    <div class="input-group mb-2">
                        <textarea class="form-control border-0 bg-light px-4" style="height: 140px;" placeholder="Input Rincian Informasi" required="required" name="rincian"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Tujuan Penggunaan Informasi</label>
                    <div class="input-group mb-2">
                        <textarea class="form-control border-0 bg-light px-4" style="height: 140px;" placeholder="Input Tujuan Penggunaaan Informasi" required="required" name="tujuan"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Cara Memperoleh Informasi</label>
                    <div class="input-group">
                        <div class="form-check mx-3">
                            <input type="radio" class="form-check-input" name="cara_memperoleh" value="Melihat" checked>Melihat
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="cara_memperoleh" value="Membaca">Membaca
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-check mx-3">
                            <input type="radio" class="form-check-input" name="cara_memperoleh" value="Mendengarkan">Mendengarkan
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="cara_memperoleh" value="Mencatat">Mencatat
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Media Salinan Informasi</label>
                    <div class="input-group">
                        <div class="form-check mx-3">
                            <input type="radio" class="form-check-input" name="media" value="Softcopy" checked>Softcopy
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="media" value="Hardcopy">Hardcopy
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label">Cara Mendapatkan Salinan Informasi</label>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="cara_mendapatkan" value="Mengambil Langsung" checked>Mengambil Langsung
                    </div>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="cara_mendapatkan" value="Faksimili">Faksimili
                    </div>
                    <div class="form-check mx-3">
                        <input type="radio" class="form-check-input" name="cara_mendapatkan" value="Email">Email
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Kirim Permohonan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</div>
