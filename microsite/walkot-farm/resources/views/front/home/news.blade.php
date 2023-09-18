<!--News & Articles Start-->
<section class="h2-news wf100 p80">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="section-title-2">
            <h5>Baca Kegiatan Terbaru</h5>
            <h2>Walkot Farm 4.0</h2>
            </div>
        </div>
        <div class="col-md-6"> <a href="{{ asset('/kegiatan') }}" class="view-more">Lihat Selengkapnya</a> </div>
    </div>
    <div class="row">
        <!-- <div class="col-md-6">
            @foreach ($kegiatanheadline as $kh)
            <div class="blog-post-large">
            <div class="post-thumb"> <a href="{{ asset('/kegiatan/'.$kh->id) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('storage/images/kegiatan/'.$kh->gambar) }}" alt=""></div>
            <div class="post-txt">
                <ul class="post-meta">
                    <li><i class="fas fa-calendar-alt"></i> {{ $kh->tanggal }}</li>
                    <li><i class="fas fa-eye"></i> {{ $kh->pengunjung }}</li>
                </ul>
                <h5><a href="{{ asset('/kegiatan/'.$kh->id) }}">{{ $kh->judul }}</a></h5>
            </div>
            </div>
            @endforeach
        </div> -->
        @foreach ($kegiatanterbaru as $kt)
        <div class="col-md-6">
            <div class="blog-small-post">
            <div class="post-thumb"> <a href="{{ asset('/kegiatan/'.$kt->id) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('storage/images/kegiatan/'.$kt->gambar) }}" alt=""> </div>
            <div class="post-txt">
                <span class="pdate">
                <div class="row">
                    <div class="col"><i class="fas fa-calendar-alt"></i> {{ $kt->tanggal }}</div>
                    <div class="col"><i class="fas fa-eye"></i> {{ $kt->pengunjung }}</div>
                </div>
                </span>
                <h5><a href="{{ asset('/kegiatan/'.$kt->id) }}"> {!! Str::limit($kt->judul, 50) !!}</a></h5>
                <p>{!! Str::limit($kt->isi, 90) !!}</p>
                <a href="#" class="rm">Baca Selengkapnya</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
<!--News & Articles End-->
