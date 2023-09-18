<div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="mb-0">Berita Terbaru</h3>
    </div>
    @foreach($berita_terbaru as $b)
    <div class="d-flex rounded overflow-hidden mb-3">
        <img class="img-fluid" src="{{ asset('storage/images/berita/'.$b->img) }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
        <a href="{{ asset('/berita/'.$b->id) }}" class="h6 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $b->title }}
        </a>
    </div>
    @endforeach
</div>
