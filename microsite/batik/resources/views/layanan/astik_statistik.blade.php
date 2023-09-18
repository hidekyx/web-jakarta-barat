
<!--=========== project section Start =========-->
<div id="sc-popular-courses" class="sc-project-filter-section sc-pt-100 sc-md-pt-80 sc-pb-85 sc-md-pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="sc-heading-area sc-mb-55 sc-md-mb-35 text-center">
                    <span class="sub-title"><i class="icon-line"></i> Statistik</span>
                    <h2 class="title mb-0" id="statistik_title">Infografis</h2>
                    <p class="sub-title" id="statistik_subtitle">Mengenal informasi data statistik dalam bentuk Desain Visual</p>
                </div>
            </div>
        </div>
        <div class="sc-project-filter text-center mb-70 md-mb-50">
            <button class="pills_statistik" id="statistik_infografis">Infografis</button>
            <button class="pills_statistik active" id="statistik_materi">Materi</button>
        </div>

        <div class="row gx-3" id="materi_container">
            @if(count($statistik_materi))
            @foreach ($statistik_materi as $sm)
            <div class="wow zoomIn" data-wow-delay="0.8s">
                <div class="row" style="margin-top: 10px; margin-bottom: 30px;">
                    <div class="col-lg-3" style="display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('storage/assets/images/statistik/'.$sm->image) }}" style="max-width: 250px; object-fit: cover; margin-bottom: 15px;">
                    </div>
                    <div class="col-lg-7">
                        <h5 class="mb-0">{{ $sm->judul }}</h5>
                        <p><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($sm->tanggal)->isoFormat('D MMMM Y')}}</p>
                        <p align="justify">{{ $sm->deskripsi }}</p>
                    </div>
                    @if($sm->file_2 == null && $sm->file_3 == null && $sm->file_4 == null)
                    <div class="col-lg-2" style="display: flex; align-items: center; justify-content: center;">
                        <a href="{{ asset('storage/layanan/astik/statistik/'.$sm->file) }}" target="_blank">
                            <button type="button" class="btn btn-outline-primary py-2 px-3 mt-3">Baca Materi</button>
                        </a>
                    </div>
                    @else
                    <div class="col-lg-2" style="display: flex; align-items: center; justify-content: center;">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Baca Materi</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/statistik/'.$sm->file) }}">{{ $sm->nama_file }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/statistik/'.$sm->file_2) }}">{{ $sm->nama_file_2 }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/statistik/'.$sm->file_3) }}">{{ $sm->nama_file_3 }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/statistik/'.$sm->file_4) }}">{{ $sm->nama_file_4 }}</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <hr>
            @endforeach
            @endif
        </div>
        <div class="row" id="infografis_container" style="display: none;">
            @if($statistik_infografis != null)
            @foreach ($statistik_infografis as $si)
            <div class="col-md-4 infografis">
                <div class="sc-project-item sc-mb-15">
                    <img src="https://barat.jakarta.go.id/storage/banner/{{ $si['img'] }}" alt="Image" style="object-fit: cover;" />
                    <div class="sc-project-content-box">
                        <div class="sc-project-icon">
                            <a href="https://barat.jakarta.go.id/storage/banner/{{ $si['img'] }}" class="lightbox" title="{{ $si['nama'] }}"><i class="icon-search"></i></a>
                        </div>
                        <div class="sc-project-text">
                            <h4><a class="">{{ $si['nama'] }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
            <hr>
        </div>

        @push('scripts')
        <script>
            $(".pills_statistik").click(function(){
                var id_button = this.id;
                if(id_button == "statistik_infografis") {
                    $('#materi_container').fadeOut("fast");
                    $('#infografis_container').delay(100).fadeIn();
                    $('#statistik_infografis').addClass('active');
                    $('#statistik_materi').removeClass('active');
                    $('#statistik_subtitle').html('Mengenal informasi statistik dalam bentuk desain visual');
                    $('#statistik_title').html('Infografis');
                }
                else if(id_button == "statistik_materi") {
                    $('#infografis_container').fadeOut("fast");
                    $('#materi_container').delay(100).fadeIn();
                    $('#statistik_materi').addClass('active');
                    $('#statistik_infografis').removeClass('active');
                    $('#statistik_subtitle').html('Mempelajari data statistik yang disajikan dalam format file PDF');
                    $('#statistik_title').html('Materi');
                }
            });
        </script>
        @endpush
    </div>
</div>