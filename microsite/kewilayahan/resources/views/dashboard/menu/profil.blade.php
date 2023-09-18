<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Profil</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Profil</li>
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
        <form class="row needs-validation" id="form-profil" method="post" action="{{ asset('dashboard/profil/'.$subpage.'/simpan') }}" enctype="multipart/form-data" novalidate>
        @csrf

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@unlink($subpage) {{ $logged_user->nama }}</h5>
                        <div class="quill-editor-full" id="profil" style="height: 50vh;">
                        @if($data_profil)
                            {!! $data_profil->konten !!}
                        @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 section profile">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status Data @unlink($subpage)</h5>
                        <hr class="mt-0">
                        <div class="tab-content">
                        <div class="tab-pane fade show active profile-overview">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Wilayah</div>
                                <div class="col-lg-9 col-md-8">{{ $logged_user->nama }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Data Website</div>
                                <div class="col-lg-9 col-md-8">{{ $page }} - @unlink($subpage)</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Status</div>
                                <div class="col-lg-9 col-md-8">
                                @if($data_profil)
                                    @if($data_profil->status == "Menunggu Konfirmasi")
                                    <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                    @elseif($data_profil->status == "Sudah Dipublikasi")
                                    <span class="badge bg-success">Sudah Dipublikasi</span>
                                    @endif
                                @else
                                    <span class="badge bg-danger">Belum Diisi</span>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Perubahan Terakhir</div>
                                <div class="col-lg-9 col-md-8">-</div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="button" id="submit-form">Simpan Perubahan</button>
                                </div>
                            </div>
                            @push('scripts')
                            <script type="text/javascript">
                            $("#submit-form").click(function(e){
                                var myEditor = document.querySelector('#profil');
                                var text = myEditor.children[0].innerHTML;
                                var regex = /(<([^>]+)>)/ig;
                                hasText = !!text.replace(regex, "").length;
                                if (hasText) {
                                    $(this).append("<textarea name='konten' style='display:none'>"+text+"</textarea>");
                                    $("#form-profil").submit();
                                }
                                else {
                                    iziToast.error({
                                        title: 'Gagal!',
                                        message: 'Data {{ $subpage }} harus anda isi terlebih dahulu!',
                                        overlay: true,
                                        position: 'topRight',
                                    });
                                }
                            })
                            </script>
                            @endpush               
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</main>
