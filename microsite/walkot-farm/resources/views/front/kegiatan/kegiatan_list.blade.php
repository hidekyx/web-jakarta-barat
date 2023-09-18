<!--Causes Start-->
<section class="wf100 p80 events">
<div class="event-list">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
            <!--Project Box Start-->
            @foreach ($kegiatan as $k)
            <div class="pro-list-box">
                <div class="pro-thumb"> <a href="{{ asset('/kegiatan/'.$k->id) }}"><i class="fas fa-link"></i></a> <img src="{{ asset('storage/images/kegiatan/'.$k->gambar) }}" alt=""> </div>
                <div class="pro-txt">
                    <ul class="event-meta">
                        <li><i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('D MMMM Y')}}</li>
                        <li><i class="fas fa-user"></i> Reporter : {{ $k->reporter }}</li>
                        <li><i class="fas fa-eye"></i> {{ $k->pengunjung }}</li>
                    </ul>
                    <h4> <a href="{{ asset('/kegiatan/'.$k->id) }}">{{ $k->judul }}</a> </h4>
                    <p>{!! Str::limit($k->isi, 200) !!}</p>
                </div>
            </div>
            @endforeach
            <!--Project Box End-->
            </div>
            <div class="col-lg-3 col-md-4">
                @include('front.kegiatan.sidebar')
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="gt-pagination mt20">
                <nav>
                    {{ $kegiatan->links() }}
                </nav>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--Causes End--> 