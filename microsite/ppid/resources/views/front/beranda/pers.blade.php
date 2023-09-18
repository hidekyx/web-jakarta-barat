<section id="team" class="team section-bg py-5 bg-light bg-gradient">
    <div class="container wow fadeInUp" data-wow-delay="0.1s"" data-aos="fade-up">
    <div class="section-title mb-0">
        <h1 class="mb-2 text-dark">Siaran Pers</h1>
        <h6 class="fw-bold text-primary text-uppercase">Kota Administrasi Jakarta Barat</h6>
    </div>

    <div class="row">
        @foreach($siaran_pers as $sp)
        <div class="col-lg-6 mt-4">
        <a href="{{ asset('/siaran-pers/'.$sp['id_siaran_pers']) }}">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                <div class="pic"><img src="{{ $sp['imagecover'] }}" class="img-fluid" alt=""></div>
                <div class="member-info">
                    <h4 style="color: #37517e;">{!! Str::limit($sp['title'], 60) !!}</h4>
                    <span style="color: #6B6A75;">{{ \Carbon\Carbon::parse($sp['date_release'])->isoFormat('D MMMM Y')}}</span>
                    <p style="color: #6B6A75;">{!! Str::limit(htmlspecialchars_decode(htmlspecialchars_decode($sp['preview_isipers'])), 120) !!}</em></p>
                </div>
            </div>
        </a>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        <!-- <a href="{{ asset('/siaran-pers') }}" class="btn btn-primary py-2 px-4 mt-4 wow zoomIn" data-wow-delay="0.2s">Lihat Semua</a> -->
    </div>
    </div>
</section>