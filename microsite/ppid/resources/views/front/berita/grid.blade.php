<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        @foreach($berita as $b)
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="blog-item bg-light rounded overflow-hidden h-100">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('storage/images/berita/'.$b->img) }}" style="max-height: 300px;" alt="">
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-eye text-primary me-2"></i>{{ $b->viewed }}</small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($b->time)->isoFormat('DD MMMM Y')}}</small>
                                    </div>
                                    <h4 class="mb-3">{{ $b->title }}</h4>
                                    <p>{!! Str::limit($b->content, 120) !!}</em></b></p>
                                    <a class="text-uppercase" href="{{ asset('/berita/'.$b->id) }}">Baca Selengkapnya<i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            {{ $berita->withQueryString()->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('front.berita.sidebar')
                </div>

            </div>
        </div>
    </div>