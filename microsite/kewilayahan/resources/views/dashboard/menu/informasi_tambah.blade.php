<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Informasi Wilayah</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Informasi Wilayah</li>
            <li class="breadcrumb-item">@unlink($subpage)</li>
            <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Data - @unlink($subpage)</h5>
                <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/informasi-wilayah/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <input type="hidden" value="save" name="submit_form">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Layanan" value="@unlink($subpage)" required disabled>
                            <label for="kategori">Kategori</label>
                        </div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal acara" required>
                        <div class="invalid-tooltip">
                            Tanggal acara wajib diisi
                        </div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="jam_mulai" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Jam mulai acara" required>
                        <div class="invalid-tooltip">
                            Jam mulai wajib diisi
                        </div>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="jam_selesai" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Jam selesai acara" required>
                        <div class="invalid-tooltip">
                            Jam selesai wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12"><hr></div>
                    <div class="col-md-12 position-relative">
                        <label for="acara" class="form-label">Judul Acara Kegiatan</label>
                        <input type="text" class="form-control" id="acara" name="acara" placeholder="Isi judul acara kegiatan" required>
                        <div class="invalid-tooltip">
                            Judul acara kegiatan wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="tempat" class="form-label">Tempat Acara</label>
                        <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Isi tempat acara dilaksanakan" required>
                        <div class="invalid-tooltip">
                            Tempat acara wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="kehadiran" class="form-label">Kehadiran Oleh</label>
                        <input type="text" class="form-control" id="kehadiran" name="kehadiran" placeholder="Isi keterangan siapa yang menghadiri kegiatan" required>
                        <div class="invalid-tooltip">
                            Form kehadiran acara wajib diisi
                        </div>
                    </div>
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