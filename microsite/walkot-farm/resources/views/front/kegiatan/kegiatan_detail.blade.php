<!--Blog Start-->
<section class="wf100 p80 blog">
<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            <!--Blog Single Content Start-->
            <div class="blog-single-content">
                @foreach ($kegiatan as $k)
                <div class="blog-single-thumb"><img src="{{ asset('storage/images/kegiatan/'.$k->gambar) }}" alt=""></div>
                <h3>{{ $k->judul }}</h3>
                <ul class="post-meta">
                    <li><i class="fas fa-user-circle"></i> {{ $k->reporter }}</li>
                    <li><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('D MMMM Y')}}</li>
                    <li><i class="fas fa-eye"></i> {{ $k->pengunjung }} Views</li>
                </ul>
                <p> {{ $k->isi }}</p>
                @endforeach
            </div>
            <!--Blog Single Content End--> 
            </div>
            <div class="col-lg-3 col-md-4">
                @include('front.kegiatan.sidebar')
            </div>
        </div>
    </div>
</div>
</section>
<!--Blog End--> 