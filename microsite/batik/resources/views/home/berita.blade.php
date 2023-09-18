<div class="sc-blog-section-area sc-pt-100 sc-pb-180 sc-md-pb-110 sc-md-pt-80" id="berita_container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="sc-heading-area sc-mb-55 text-center">
                    <span class="sub-title"><i class="icon-line"></i> Informasi Teraktual</span>
                    <h2 class="title">
                        Berita <span class="primary-color italic">Jakarta Barat</span>
                    </h2>
                </div>
            </div>
        </div>
        <div class="swiper sc-blog-slider">
            <div class="swiper-wrapper">
                @foreach ($berita as $b)
                <div class="swiper-slide" data-sal="zoom-in" data-sal-duration="800" data-sal-delay="50">
                    <div class="sc-blog-style2">
                        <div class="blog-img">
                            <a href="https://barat.jakarta.go.id/detailberita/{{ $b['id'] }}"
                                ><img src="https://barat.jakarta.go.id/storage/berita/{{ $b['img'] }}" style="width: 100%; height: 200px !important; object-fit: cover;" alt="Blog"/>
                            </a>
                        </div>
                        <div class="sc-blog-date-box">
                            <div class="sc-date-box">
                                <h4 class="title">{{ \Carbon\Carbon::parse($b['time'])->isoFormat('D')}}</h4>
                                <span class="sub-title">{{ Str::limit(\Carbon\Carbon::parse($b['time'])->isoFormat('MMMM'), 3, '') }}</span>
                            </div>
                            <div class="sc-blog-social text-center">
                                <ul class="list-gap">
                                    <li><i class="fa-regular fa-eye fa-lg" style="font-size: 20px !important;"></i>Dilihat ({{ $b['viewed'] }})</li>
                                </ul>
                            </div>
                        </div>
                        <div class="sc-blog-text">
                            <h4>
                                <a class="title" href="https://barat.jakarta.go.id/detailberita/{{ $b['id'] }}">{{ Str::limit($b['title'], 62) }}</a>
                            </h4>
                            <div class="sc-blog-btn">
                                <a class="sc-transparent-btn" href="https://barat.jakarta.go.id/detailberita/{{ $b['id'] }}">Baca Berita</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>