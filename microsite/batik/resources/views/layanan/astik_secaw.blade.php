
<!--=========== project section Start =========-->
<div id="sc-popular-courses" class="sc-project-filter-section sc-pt-100 sc-md-pt-80 sc-pb-85 sc-md-pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="sc-heading-area sc-mb-55 sc-md-mb-35 text-center">
                    <span class="sub-title"><i class="icon-line"></i> Security Awareness</span>
                    <h2 class="title mb-0" id="secaw_title">Infografis</h2>
                    <p class="sub-title" id="secaw_subtitle">Mengenal Security Awareness dalam bentuk Desain Visual</p>
                </div>
            </div>
        </div>
        <div class="sc-project-filter text-center mb-70 md-mb-50">
            <button class="pills_secaw active" id="secaw_infografis">Infografis</button>
            <button class="pills_secaw" id="secaw_materi">Materi</button>
        </div>

        <div class="row gx-3" id="infografis_container">
            @foreach ($secaw_infografis as $si)
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
            <hr>
        </div>
        <div id="materi_container" style="display: none;">
            @foreach ($secaw_materi as $sm)
            <div class="wow zoomIn" data-wow-delay="0.8s">
                <div class="row" style="margin-top: 10px; margin-bottom: 30px;">
                    <div class="col-lg-3" style="display: flex; align-items: center; justify-content: center;">
                        <img src="{{ asset('storage/assets/images/secaw/'.$sm->image) }}" style="max-width: 250px; object-fit: cover; margin-bottom: 15px;">
                    </div>
                    <div class="col-lg-7">
                        <h5 class="mb-0">{{ $sm->judul }}</h5>
                        <p><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($sm->tanggal)->isoFormat('D MMMM Y')}}</p>
                        <p align="justify">{{ $sm->deskripsi }}</p>
                    </div>
                    @if($sm->file_2 == null && $sm->file_3 == null && $sm->file_4 == null)
                    <div class="col-lg-2" style="display: flex; align-items: center; justify-content: center;">
                        <a href="{{ asset('storage/layanan/astik/secaw/'.$sm->file) }}" target="_blank">
                            <button type="button" class="btn btn-outline-primary py-2 px-3 mt-3">Baca Materi</button>
                        </a>
                    </div>
                    @else
                    <div class="col-lg-2" style="display: flex; align-items: center; justify-content: center;">
                        <div class="dropdown">
                            <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">Baca Materi</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/secaw/'.$sm->file) }}">{{ $sm->nama_file }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/secaw/'.$sm->file_2) }}">{{ $sm->nama_file_2 }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/secaw/'.$sm->file_3) }}">{{ $sm->nama_file_3 }}</a></li>
                                <li><a class="dropdown-item" href="{{ asset('storage/layanan/astik/secaw/'.$sm->file_4) }}">{{ $sm->nama_file_4 }}</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <hr>
            @endforeach
        </div>

        @push('scripts')
        <script>
            $(".pills_secaw").click(function(){
                var id_button = this.id;
                if(id_button == "secaw_infografis") {
                    $('#materi_container').fadeOut("fast");
                    $('#infografis_container').delay(100).fadeIn();
                    $('#secaw_infografis').addClass('active');
                    $('#secaw_materi').removeClass('active');
                    $('#secaw_subtitle').html('Mengenal security awareness dalam bentuk desain visual');
                    $('#secaw_title').html('Infografis');
                }
                else if(id_button == "secaw_materi") {
                    $('#infografis_container').fadeOut("fast");
                    $('#materi_container').delay(100).fadeIn();
                    $('#secaw_materi').addClass('active');
                    $('#secaw_infografis').removeClass('active');
                    $('#secaw_subtitle').html('Mempelajari security awareness yang disajikan dalam format file PDF');
                    $('#secaw_title').html('Materi');
                }
            });
        </script>
        @endpush
    </div>
</div>