<div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="row g-5">
                <div class="col-lg-8">
                    @foreach($berita as $b)
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded" src="{{ asset('storage/images/berita/'.$b->img) }}" alt="">
                        <div class="mb-3">
                            <span class="badge bg-success">Reporter : {{ $b->writer }}</span>
                            <span class="badge bg-info"><i class="far fa-eye me-2"></i>{{ $b->viewed }}</span>
                            <span class="badge bg-dark"><i class="far fa-calendar me-2"></i>{{ \Carbon\Carbon::parse($b->time)->isoFormat('dddd, DD MMMM Y')}}</span>
                            <hr>
                        </div>
                        
                        <h1 class="mb-4">{{ $b->title }}</h1>
                        {!! $b->content !!}
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    @include('front.berita.sidebar')
                </div>
            </div>
        </div>
    </div>