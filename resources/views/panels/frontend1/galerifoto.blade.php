<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>


        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>


        <title>Galeri Foto Pejabat - Kota Administrasi Jakarta Barat</title>
    </head>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#detailagenda', function(){
              var acara = $(this).data('acara');
              var tanggal = $(this).data('tanggal') + "  " + $(this).data('pukul') + " WIB";
              var keterangan = $(this).data('keterangan');
              var pelaksana = $(this).data('pelaksana');
              var tempat = $(this).data('tempat');
              $('#acara').text(acara);
              $('#tanggal').text(tanggal);
              $('#keterangan').html(keterangan);
              $('#pelaksana').text(pelaksana);
              $('#tempat').text(tempat);
            })
        })
    </script>

    <script>
        jQuery(document).ready(function($){
            $('.owl-carousel-foto').owlCarousel({
            loop:false,
            margin:10,
            nav: false,
            navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
            responsive:{
                0:{
                items:1
                },
                600:{
                items:1
                },
                1000:{
                items:1
                }
            }
            })
        })
        </script>
    <style>
        .blogq{
            font-family: 'Open Sans', sans-serif !important;
            margin: 0 0 25px 0;
            font-size: 14px;
            line-height: 30px;
            color: #747474;
        }
        .blogq{
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
        .breadcrumbq a{
            color: white;
        }
        .breadcrumbq a:hover {
            color: #777;
        }

        .breadcrumbq .active{
            color: #777;
        }
        .jumbotronq {
            height: 170px;
            background-image: url("/assets/images/Header.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        </style>
    <body>
        @include('panels.frontend1.nav')
        <section>
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">Galeri Foto Pejabat</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Galeri </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <div class="container pt-5">
            <h3 style="color:#b3b3b3">
                Galeri Foto Pejabat
            </h3>
            <hr style="color: orangered;" >
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12 align-self-center">
                    <div class="card">
                    <a href="{{ asset('galeri-foto-pejabat/walikota') }}">
                        <img class="card-img-top" src="{{ asset('storage/galeri_pemimpin/2022/Foto-Walikota-1.jpg') }}">
                        <div class="card-body" id="detail">
                            <p class="card-text text-center" style="font-family: poppins; font-size: 15px;">Yani Wahyu Purwoko</p>
                            <p class="card-text text-center" style="font-family: poppins; font-size: 10px;">Walikota Administrasi Jakarta Barat</p>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 align-self-center">
                    <div class="card">
                    <a href="{{ asset('galeri-foto-pejabat/ketua-tp-pkk') }}">
                        <img class="card-img-top" src="{{ asset('storage/galeri_pemimpin/2022/Foto-Ibu-Wali-8.JPG') }}">
                        <div class="card-body" id="detail">
                            <p class="card-text text-center" style="font-family: poppins; font-size: 15px;">Liliana Wahyu Purwoko</p>
                            <p class="card-text text-center" style="font-family: poppins; font-size: 10px;">Ketua TP-PKK</p>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
            <br><br><br>
        </div>
        <style>
            a {
                text-decoration: none;
            }
            #detail {
                background-color: #FF4500;
                transition: 0.2s;
                text-transform: uppercase;
                color: #ffffff;
            }

            #detail:hover {
                background-color: #ba3200;
            }
        </style>
        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
