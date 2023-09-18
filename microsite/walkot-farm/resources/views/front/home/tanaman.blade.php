<!--Current Projects Start-->
<section class="wf100 p80 current-projects">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="section-title-2">
            <h5>Tanaman Yang Terdaftar Pada</h5>
            <h2>Walkot Farm 4.0</h2>
            </div>
        </div>
        <div class="col-lg-6">
            <ul class="nav" id="myTab" role="tablist">
            @foreach ($tanaman as $key => $t)
            <li class="nav-item"> <a class="nav-link" id="{{ $key }}-tab" data-toggle="tab" href="#{{ $key }}" role="tab" aria-controls="{{ $key }}-tab" aria-selected="true">Tanaman {{ ucwords($key) }}</a> </li>
            @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tab-content" id="myTabContent">
            @foreach ($tanaman as $key => $t)
            <div class="tab-pane fade" id="{{ $key }}" role="tabpanel" aria-labelledby="{{ $key }}-tab">
                <div class="cpro-slider owl-carousel owl-theme">
                    @foreach ($t as $h)
                    <div class="item">
                        <div class="pro-box">
                        <img src="storage/images/tanaman/{{ $h->gambar }}" alt="">
                        <h5>{{ $h->nama_tanaman_indonesia }}</h5>
                        <div class="pro-hover">
                            <h6>{{ $h->nama_tanaman_latin }}</h6>
                            <p>{!! Str::limit($h->keterangan, 100) !!}</p>
                            <a href="{{ asset('tanaman/'.$h->kategori->nama_kategori.'/'.$h->id_tanaman) }}">Baca Selengkapnya</a> 
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function(){
            $("#hias-tab").addClass('active');
            $("#hias").addClass('show active');
        });
    </script>
    @endpush
</div>
</section>
<!--Current Projects End-->