<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data PPID</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">PPID</li>
            @if($subpage == "laporan-penyelesaian-ppid")
                <li class="breadcrumb-item">Laporan Penyelesaian PPID</li>
            @else
                <li class="breadcrumb-item">@unlink($subpage)</li>
            @endif
            <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if($subpage == "laporan-penyelesaian-ppid")
                    <h5 class="card-title">Edit Data - Laporan Penyelesaian PPID</h5>
                @else
                    <h5 class="card-title">Edit Data - @unlink($subpage)</h5>
                @endif
                <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/ppid/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
                @csrf
                    <input type="hidden" value="update" name="submit_form">
                    <input type="hidden" value="{{ $data_ppid['id_ppid'] }}" name="id_ppid">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori PPID" value="@unlink($subpage)" required disabled>
                            <label for="kategori">Data PPID</label>
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul data informasi publik" value="{{ $data_ppid['judul'] }}" required>
                        <div class="invalid-tooltip">
                            Judul data informasi publik wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" placeholder="Keterangan data informasi publik" id="keterangan" name="keterangan" style="height: 100px;" required>{{ $data_ppid['keterangan'] }}</textarea>
                        <div class="invalid-tooltip">
                            Keterangan data informasi publik wajib diisi
                        </div>
                    </div>
                    <div class="col-md-12 position-relative">
                        <label for="file" class="col-sm-2 col-form-label">File Data</label>
                        <input class="form-control mb-2" type="file" id="file" name="file" accept=".pdf">
                        @if($subpage == "daftar-informasi-publik")
                        File Asli: <i><a href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$data_ppid['file']) }}" target="_blank">{{ $data_ppid['judul'] }}.pdf</a></i>
                        @elseif($subpage == "laporan-penyelesaian-ppid")
                        File Asli: <i><a href="{{ asset('storage/files/images/foto/ppid_laporan_penyelesaian/'.$data_ppid['file']) }}" target="_blank">{{ $data_ppid['judul'] }}.pdf</a></i>
                        @elseif($subpage == "sop-ppid")
                        File Asli: <i><a href="{{ asset('storage/files/images/foto/ppid_sop/'.$data_ppid['file']) }}" target="_blank">{{ $data_ppid['judul'] }}.pdf</a></i>
                        @endif
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