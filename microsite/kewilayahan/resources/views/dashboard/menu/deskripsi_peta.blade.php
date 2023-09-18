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
                    <form class="row g-3 needs-validation" id="form-layanan-publik" method="post" action="{{ asset('dashboard/deskripsi-website/'.$subpage.'/simpan') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12 position-relative">
                            <label for="peta_keyword" class="col-form-label">Kata Kunci Google Map</label>
                            @if($data_deskripsi)
                            <input class="form-control" type="text" id="peta_keyword" accept="image/*" name="peta_keyword" placeholder="Contoh: Kecamatan Palmerah" value="{{ $data_deskripsi->peta_keyword }}" required>
                            @else
                            <input class="form-control" type="text" id="peta_keyword" accept="image/*" name="peta_keyword" placeholder="Contoh: Kecamatan Palmerah" required>
                            @endif
                        </div>
                        <div class="col-md-12 position-relative">
                            <label for="peta_zoom" class="col-form-label">Atur Level Zoom</label>
                            @if($data_deskripsi)
                            <input type="range" class="form-range" min="10" max="15" step="1" id="peta_zoom" name="peta_zoom" value="{{ $data_deskripsi->peta_zoom }}" required>
                            @else
                            <input type="range" class="form-range" min="10" max="15" step="1" id="peta_zoom" name="peta_zoom" required>
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
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            @if($data_deskripsi)
                            src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q={{ $data_deskripsi->peta_keyword }}&amp;t=&amp;z={{ $data_deskripsi->peta_zoom }}&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            @else
                            src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q={{ $logged_user->nama }}&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                            @endif
                            </iframe>
                        </div>
                        <style>.mapouter{position:relative;text-align:right;width:100%;height:450px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:450px;}.gmap_iframe {height:450px!important;}</style>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>