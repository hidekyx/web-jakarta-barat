<section class="block pt-3 pb-3" style="justify-content: center; font-family: 'Poppins';" >
    <div class="container ">
        <div class="row mt-5">
            <div class="col-xl">
                    {{-- <div class="h2" style="color: black"> PRAKIRAAN CUACA </div>
                    <div style="font-size: 25px;"></div> --}}

                    <a class="weatherwidget-io" href="https://forecast7.com/en/n6d17106d76/west-jakarta/" data-label_1="JAKARTA BARAT" data-icons="Climacons Animated" data-theme="pure" >JAKARTA BARAT</a>
                    <script>
                    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
                    </script>
            </div>
        </div>

    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
<style>
    .item:hover img
        {
        -moz-transform: scale(1.3);
        -webkit-transform: scale(1.3);
        transform: scale(1.3);
        }

        .main-content {
        position: relative;

        .owl-theme {
        .custom-nav {
        position: absolute;
        top: 20%;
        left: 0;
        right: 0;

        .owl-prev, .owl-next {
            position: absolute;
            height: 100px;
            color: inherit;
            background: none;
            border: none;
            z-index: 100;

            i {
                font-size: 2.5rem;
                color: #cecece;
            }
        }

        .owl-prev {
            left: 0;
        }

        .owl-next {
            right: 0;
        }
    }
}
}

</style>
{{-- <section class="block pt-5 pb-5" style="justify-content: center; font-family: 'Poppins';" >
    <div class="container center ">
        <div class="row">
            <div class="owl-carousel owl-carousel-premiere owl-theme mt-5 text-center">
            <a class="py-1" href="https://pusat.jakarta.go.id" target="_blank"><img  width="250px" height="62" style="object-fit: cover" src="assets/images/logo/partner-pusat.png" alt="client logo" ></a>
            <a class="py-1" href="https://selatan.jakarta.go.id" target="_blank"><img   width="250px" height="60" style="object-fit: cover"  src="assets/images/logo/partner-selatan.png" alt="client logo"></a>
            <a class="py-1" href="https://utara.jakarta.go.id" target="_blank"><img  width="250px" height="60" style="object-fit: cover" src="assets/images/logo/partner-utara.png" alt="client logo" class="img-responsive center-block animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100"></a>
            <a class="py-1" href="https://timur.jakarta.go.id" target="_blank"><img  width="250px" height="60" style="object-fit: cover" src="assets/images/logo/partner-timur.png" alt="client logo" class="img-responsive center-block animated fadeIn visible" data-animation="fadeIn" data-animation-delay="150"></a>
            <a class="py-1" href="https://pulauseribu.jakarta.go.id" target="_blank"><img  width="250px" height="60" style="object-fit: cover" src="assets/images/logo/partner-seribu.png" alt="client logo" class="img-responsive center-block animated fadeIn visible" data-animation="fadeIn" data-animation-delay="200"></a>
            </div>
        </div>
    </div>
</section> --}}
<hr>
<div class="container" align="center">
    <style>
    .zoom {
        transition: transform .2s;
        margin: 0 auto;
    }

    .zoom:hover {
        transform: scale(1.2);
    }
    </style>
    <div class="col-sm-12 text-center pt-5 ">
        <h2>WEBSITE <span style="color:orangered;">PORTAL</span></h2>
    </div>
    <div class="col-sm-12 h5 text-center">
        <p style="color : #78829d; font-size:20px;">Terintegrasi Dengan Jakarta Barat</p>
    </div>
    <div class="row mt-5 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 mb-5">
        <div class="col">
            <a href="https://pusat.jakarta.go.id/" target="_blank"><img class="zoom" src="{{ asset('storage/portal/Jakarta-Pusat.jpg') }}" alt="Jakarta Pusat" style="max-width: 150px;"></a>
        </div>
        <div class="col">
            <a href="https://utara.jakarta.go.id/" target="_blank"><img class="zoom" src="{{ asset('storage/portal/Jakarta-Utara.jpg') }}" alt="Jakarta Utara" style="max-width: 150px;"></a>
        </div>
        <div class="col">
            <a href="https://timur.jakarta.go.id/" target="_blank"><img class="zoom" src="{{ asset('storage/portal/Jakarta-Timur.jpg') }}" alt="Jakarta Timur" style="max-width: 150px;"></a>
        </div>
        <div class="col">
            <a href="https://selatan.jakarta.go.id/" target="_blank"><img class="zoom" src="{{ asset('storage/portal/Jakarta-Selatan.jpg') }}" alt="Jakarta Selatan" style="max-width: 150px;"></a>
        </div>
        <div class="col">
            <a href="https://pulauseribu.jakarta.go.id/" target="_blank"><img class="zoom" src="{{ asset('storage/portal/Kep-Seribu.jpg') }}" alt="Kepulauan Seribu" style="max-width: 150px;"></a>
        </div>
    </div>
    <hr>
    <div class="row mt-5 mb-5 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5">
        @foreach ($portal as $item)
            <div class="col">
                <a class="py-1" href="{{$item->link}}" target="_blank">
                    <img width="190px" height="100px" style="object-fit: contain" src="{{  asset('storage/portal/'.$item->logo)  }}" alt="client logo" class="img-responsive zoom center-block animated fadeIn visible" data-animation="fadeIn" data-animation-delay="200">
                </a>
            </div>
        @endforeach
    </div>
</div>





















