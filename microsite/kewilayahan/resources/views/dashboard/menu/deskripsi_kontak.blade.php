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
                    <form class="row g-3" id="form-layanan-publik" method="post" action="{{ asset('dashboard/deskripsi-website/'.$subpage.'/simpan') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="nama_layanan" class="form-label">Email</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->email != null)
                                <input type="email" class="form-control" placeholder="Email {{ $logged_user->nama }}" value="{{ $data_deskripsi->email }}" id="email" name="email" required>
                                @else
                                <input type="email" class="form-control" placeholder="Email {{ $logged_user->nama }}" id="email" name="email" required>
                                @endif
                            @else
                            <input type="email" class="form-control" placeholder="Email {{ $logged_user->nama }}" id="email" name="email" required>
                            @endif
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="alamat_layanan" class="form-label">Alamat</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->alamat != null)
                                <textarea class="form-control" placeholder="Alamat {{ $logged_user->nama }}" id="alamat" name="alamat" style="height: 100px;" required>{{ $data_deskripsi->alamat }}</textarea>
                                @else
                                <textarea class="form-control" placeholder="Alamat {{ $logged_user->nama }}" id="alamat" name="alamat" style="height: 100px;" required></textarea>
                                @endif
                            @else
                            <textarea class="form-control" placeholder="Alamat {{ $logged_user->nama }}" id="alamat" name="alamat" style="height: 100px;" required></textarea>
                            @endif
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="sosmed_facebook" class="form-label">Facebook</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->sosmed_facebook != null)
                                <input type="url" class="form-control" placeholder="Facebook {{ $logged_user->nama }}" value="{{ $data_deskripsi->sosmed_facebook }}" id="sosmed_facebook" name="sosmed_facebook">
                                @else
                                <input type="url" class="form-control" placeholder="Facebook {{ $logged_user->nama }}" id="sosmed_facebook" name="sosmed_facebook">
                                @endif
                            @else
                            <input type="url" class="form-control" placeholder="Facebook {{ $logged_user->nama }}" id="sosmed_facebook" name="sosmed_facebook">
                            @endif
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="sosmed_isntagram" class="form-label">Instagram</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->sosmed_instagram != null)
                                <input type="url" class="form-control" placeholder="Instagram {{ $logged_user->nama }}" value="{{ $data_deskripsi->sosmed_instagram }}" id="sosmed_instagram" name="sosmed_instagram">
                                @else
                                <input type="url" class="form-control" placeholder="Instagram {{ $logged_user->nama }}" id="sosmed_instagram" name="sosmed_instagram">
                                @endif
                            @else
                            <input type="url" class="form-control" placeholder="Instagram {{ $logged_user->nama }}" id="sosmed_instagram" name="sosmed_instagram">
                            @endif
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="sosmed_youtube" class="form-label">Youtube</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->sosmed_youtube != null)
                                <input type="url" class="form-control" placeholder="Youtube {{ $logged_user->nama }}" value="{{ $data_deskripsi->sosmed_youtube }}" id="sosmed_youtube" name="sosmed_youtube">
                                @else
                                <input type="url" class="form-control" placeholder="Youtube {{ $logged_user->nama }}" id="sosmed_youtube" name="sosmed_youtube">
                                @endif
                            @else
                            <input type="url" class="form-control" placeholder="Youtube {{ $logged_user->nama }}" id="sosmed_youtube" name="sosmed_youtube">
                            @endif
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="sosmed_twitter" class="form-label">Twitter</label>
                            @if($data_deskripsi)
                                @if($data_deskripsi->sosmed_twitter != null)
                                <input type="url" class="form-control" placeholder="Twitter {{ $logged_user->nama }}" value="{{ $data_deskripsi->sosmed_twitter }}" id="sosmed_twitter" name="sosmed_twitter">
                                @else
                                <input type="url" class="form-control" placeholder="Twitter {{ $logged_user->nama }}" id="sosmed_twitter" name="sosmed_twitter">
                                @endif
                            @else
                            <input type="url" class="form-control" placeholder="Twitter {{ $logged_user->nama }}" id="sosmed_twitter" name="sosmed_twitter">
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Preview Website</h5>
                </div>
            </div>
        </div>
    </div>
</main>