<div class="container-fluid wow fadeInUp bg-dark" data-wow-delay="0.1s">
    <div class="container py-5 mb-0">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h6 class="fw-bold text-white text-uppercase">Informasi</h6>
            <h1 class="mb-0 text-white">Kegiatan Prioritas</h1>
        </div>

        <div class="text-center">
            <div class="owl-carousel" id="owl-carousel-1">
                @foreach($kegiatan as $k)
                <div class="item">
                    <div class="pro-box">
                    <video width="100%" src="{{ asset('storage/files/prioritas/'.$k->media) }}" type="video/mp4" controls class="prioritas-portrait"></video>
                    <h6>{{ $k->judul }}</h6>
                    <div class="pro-hover">
                        <span class="tanggal">{{ \Carbon\Carbon::parse($k->tanggal)->isoFormat('D MMMM Y H:m')}}</span>
                        <p>{{ $k->caption }}</p>
                    </div>
                    </div>
                </div>
                @endforeach
                <!-- <div class="item">
                    <div class="pro-box">
                    <img src="{{ asset('storage/files/prioritas/4.jpg') }}" alt="Image" class="prioritas-portrait">
                    <h6>Contoh Foto</h6>
                    <div class="pro-hover">
                        <span class="tanggal">30 Januari 2023, 14:48</span>
                        <p>Caption Jalan ini ditutup selengkapnya lihat jalan hover kegiatan tes caption</p>
                    </div>
                    </div>
                </div> -->
            </div>
        </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function(){
    $("#owl-carousel-1").owlCarousel({
        smartSpeed: 1500,
        margin: 20,
        nav: true,
        dots: false,
        center: true,
        navText: ["<button class='btn btn-sm btn-primary mx-2 mt-4'><i class='fa fa-chevron-left'></i></button>","<button class='btn btn-sm btn-primary mx-2 mt-4'><i class='fa fa-chevron-right'></i></button>"],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:5
            }
        }
    });
});
</script>
<script>
$(".prioritas-portrait").on("play", function (e) {
    $(".pro-hover").hide();
});
$(".prioritas-portrait").on("pause", function (e) {
    $(".pro-hover").show();
});
</script>
@endpush