<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />

<script>
jQuery(document).ready(function($){
    $('.owl-carousel-video').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
        items:1
        },
        600:{
        items:3
        },
        1000:{
        items:4
        }
    }
    })
})
jQuery(document).ready(function($){
    $('.owl-carousel-banner').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    responsive:{
        0:{
        items:1
        },
        600:{
        items:3
        },
        1000:{
        items:4
        }
    }
    })
})
</script>
<style>
    .owl-theme .owl-dots .owl-dot.active span,
    .owl-theme .owl-dots .owl-dot:hover span {
    background: #4e5366;
    }
    .videowrapper { float: none; clear: both; width: 100%; position: relative; padding-bottom: 56.25%; padding-top: 25px; height: 0; } .videowrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }


    /* (A) STANDARD ROW HEIGHT */
    .vwrap, .vitem {
    height: 30px;
    line-height: 30px;
    }

    /* (B) FIXED WRAPPER */
    .vwrap {
    overflow: hidden; /* HIDE SCROLL BAR */
    background: #eee;
    }
    /* (C) TICKER ITEMS */
    .vitem { text-align: center; }

    /* (D) ANIMATION - MOVE ITEMS FROM TOP TO BOTTOM */
    /* CHANGE KEYFRAMES IF YOU ADD/REMOVE ITEMS */
    .vmove { position: relative; }
    @keyframes tickerv {
    0% { bottom: 0; } /* FIRST ITEM */
    30% { bottom: 30px; } /* SECOND ITEM */
    60% { bottom: 60px; } /* THIRD ITEM */
    90% { bottom: 90px; } /* FORTH ITEM */
    100% { bottom: 0; } /* BACK TO FIRST */
    }
    .vmove {
    animation-name: tickerv;
    animation-duration: 10s;
    animation-iteration-count: infinite;
    animation-timing-function: cubic-bezier(1, 0, .5, 0);
    }
    .vmove:hover { animation-play-state: paused; }

    blink {
    -webkit-animation: 2s linear infinite condemned_blink_effect; /* for Safari 4.0 - 8.0 */
    animation: 2s linear infinite condemned_blink_effect;
    }

    /* for Safari 4.0 - 8.0 */
    @-webkit-keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
    }

    @keyframes condemned_blink_effect {
    0% {
        visibility: hidden;
    }
    50% {
        visibility: hidden;
    }
    100% {
        visibility: visible;
    }
    }
</style>
<script>
    $(document).ready(function(){
        $(document).on('click', '#video', function(){
            var source = $(this).data('source');
            var header = $(this).data('header');
            $('#header-modal').text(header);
            $('#videoplay').attr("src", source);
            console.log(source);
        })
    })
</script>
<script>
$(document).ready(function(){
    $('.modal').each(function(){
        var src = $(this).find('iframe').attr('src');
        $(this).on('click', function(){
            $(this).find('iframe').attr('src', '');
            $(this).find('iframe').attr('src', src);
        });
    });
});
</script>

<br>
    <section>
        <div class="container">
            <nav>
                <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup1" role="tablist">

                    {{-- <button style="background-color: rgb(88, 94, 99); border-radius: 0px !important;" class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">
                    BERITA SKPD/UKPD
                    </button> --}}

                    <button style="background-color: rgb(88, 94, 99); border-radius: 0px !important;" class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                    aria-selected="true">
                    VIDEO TERBARU
                    </button>

                    <button style="background-color: rgb(88, 94, 99); border-radius: 0px !important;" class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                    aria-selected="false">
                    INFO GRAFIS
                    </button>

                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent" style="font-family: 'Poppins';">
                <div class="tab-pane fade show active p-3 text-center" style="width: 100% !important" id="nav-home" role="tabpanel"
                aria-labelledby="nav-home-tab">
                    <div style="padding-bottom: 20px">
                        <div class="owl-carousel owl-carousel-foto owl-theme mt-5 text-center" style="width: 100%">
                            @foreach ($beritavideo as $item)
                            <div style="width: 100%; display: flex !important; justify-content: center;" class="text-start">
                                <div class="card" style="width: 20rem; height: 25rem; font-family: 'Poppins' ;">
                                    <a id="video" data-bs-toggle="modal" data-header="{{ $item->judul }}"
                                    data-bs-target="#exampleModal" data-source="{{ $item->source }}">
                                        <img width="100%" src="https://img.youtube.com/vi/{{ substr($item->source,30) }}/hqdefault.jpg" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <!-- Button trigger modal -->
                                        <a id="video" data-bs-toggle="modal" data-header="{{ $item->judul }}"
                                            data-bs-target="#exampleModal" data-source="{{ $item->source }}">
                                            {!! Str::limit($item->judul, 100) !!}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade p-3" id="nav-contact" role="tabpanel"
                aria-labelledby="nav-contact-tab" >
                    <div style="padding-bottom: 20px">
                        <div class="owl-carousel owl-carousel-banner owl-theme mt-5">
                            @foreach ($banner as $banner)
                            <div  class="card-md-6">
                                @if ($banner->img != null || $banner->img != "")
                                <a target="_blank" href="{{ $banner->link }}"><img id= height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/banner/'.$banner->img) }}" class="card-img-top" alt="..."></a>
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover" src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <p id="foto" data-bs-toggle="modal" data-header="{{ $banner->nama }}"
                                        data-bs-target="#Modalinfo" data-source="{{  asset('storage/banner/'.$banner->img)  }}" class="card-text" type="button" style="text-decoration:none"></p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
</section>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <b id="header-modal"></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="videowrapper">
                    <iframe id="videoplay" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script>
        jQuery(".modal-backdrop, #exampleModal .close, #exampleModal .btn").on("click", function() {
        jQuery("#exampleModal iframe").attr("src", jQuery("#exampleModal iframe").attr("src"));
});
</script>

    <div class="modal fade" id="Modalinfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <b id="header-modal"></b>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
        </div>
    </div>

    {{-- <div class="pb-3">
    <b>
        <p style="color: red; text-align: center; font-size: 18px;" class="blink">
            <img style="height: 20px; width: 20px"  src="/assets/images/icon/infoo.png">&nbsp;&nbsp;   INFO JAKARTA BARAT
        </p>
    </b>
    </div>
    <div class="vwrap mb-5">
        <div class="vmove">
        <div class="vitem"><p>Informasi Corona dan Vaksinasi Informasi mengenai Covid-19 dan pelaksanaan vaksin dapat diakses melalui website: <a href="https://corona.jakarta.go.id/"> https://corona.jakarta.go.id/</a></p> </div>
        <div class="vitem"><p>Pendaftaran Vaksinasi Covid-19 Pendaftaran Vaksinasi Covid-19 dapat dilakukan melalui aplikasi "Jaki" atau langsung ke sentra vaksinasi terdekat</p> </div>
    </div>
    </div> --}}


