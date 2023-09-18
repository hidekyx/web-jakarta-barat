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


        <title>Berita - Kota Administrasi Jakarta Barat</title>
    </head>

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
        <script>
            $(document).ready(function(){
                $(document).on('click', '#submit', function(){
                    var value = $('#inputTagName').val();
                    if(value == null || value == ""){
                        console.log('kosong');
                    } else{
                        window.location.href = '/berita/param='+value;
                    }
                })
            })
        </script>
    <body>
        @include('panels.frontend1.nav')
        <section>
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">Publikasi</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Publikasi </a>
                            <span style="color:#fff">/</span>
                            <span class="active">Berita</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <div class="container pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 style="color:#b3b3b3">
                        Berita
                    </h3>
                    <hr style="color: orangered;" >
                    {{-- @foreach ($content as $wilayah)
                        <p class="blogq" style="color: #747474;">
                            {!! $wilayah->konten !!}
                        </p>
                    @endforeach --}}
                    <div class="content-berita">
                        <table class="table" id="tabel-data">
                            @foreach ($berita as $item)
                    <div class="card">
                        <div class="card-body ">
                            @if ($item->img != null || $item->img != "")
                            <img   src="{{ asset('storage/berita/'.$item->img) }}" class="card-img-top" alt="...">
                            @else
                            <img   src="../assets/images/noimage.png" class="card-img-top" alt="...">
                            @endif
                          <div style="padding-left: 15px">
                            <p style="color: orangered">{{ $item->kategori }}
                                <span style="color: grey"> &nbsp; {{ \Carbon\Carbon::parse($item->published_date)->isoFormat('D MMMM Y')}}</span></p>
                                <b><h5 class="card-title">{{$item->title}}</h5></b>
                                <p  class="card-text">{!! Str::limit($item->content, 150) !!}</p>
                                <div class="d-flex align-items-center" >
                                    <img src="/assets/images/Read-more.png" style="width: 6%; height: 5%"alt="">&nbsp;
                                    <a href="/detailberita/{{ $item->id }}" class="card-link" style="text-decoration:none" >BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <img src="/assets/images/viewers.png" style="width: 7%; height: 13%"alt="">&nbsp;
                                        {{ $item->viewed }}
                                </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                        </table>
                        <script>
                            $(document).ready(function(){
                                $('#tabel-data').DataTable();
                            });
                        </script>
                        <br>
                        {{ $berita->links() }}
                    </div>
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
                    <div>
                        <h5 class="mb-3 mt-2">
                            Another Tags
                        </h5>
                        <div class="d-flex mb-4">
                            @foreach ($tags as $tag)
                                <a style="margin-right: 3%; text-decoration: none;" href="/berita/param={{ $tag->desc }}" class="badge bg-dark">
                                    {{ $tag->desc }}
                                </a>
                            @endforeach
                        </div>
                        <div class="input-group mb-3" style="width: 30%;">
                            <input type="text" id="inputTagName" class="form-control" placeholder="Search Tags" aria-label="Tags" aria-describedby="basic-addon1">
                            <a id="submit"><span style="cursor: pointer" class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span></a>
                        </div>
                    </div>
                    <br><br><br>
                </div>
                <div class="col-md-4 pt-2 pb-5">
                    <div>
                        BERITA TERBARU
                        <hr>
                        @foreach ($beritaterbaru as $data)
                            <div class="d-flex" style="margin-bottom:10px;">
                            @if ($data->img != null || $data->img != "")
                            <img   src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="..." style="width:200px;height:100px; object-fit: cover; object-position: center ">
                            @else
                            <img   src="../assets/images/noimage.png" class="card-img-top" alt="..." style="width:200px;height:100px; object-fit: cover; object-position: center ">
                            @endif
                                &nbsp;&nbsp;&nbsp;
                                <div>
                                    <span>{{ \Carbon\Carbon::parse($data->published_date)->isoFormat('D MMMM Y')}}</span>
                                    <p style="font-weight: bold; font-size:16px;">
                                        <a href="/detailberita/{{ $data->id }}" style="text-decoration:none; color:#3b4455;"> {!! Str::limit($data->title, 20) !!}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-3">
                        FASILITAS
                        <hr>
                        @foreach ($fasilitas as $fasilitas)
                            <div class="d-flex">
                                {!! $fasilitas->icon !!}&nbsp;&nbsp;
                                <h6><a href="/profil/fasilitas/{{$fasilitas->id}}/{{strtolower($fasilitas->keterangan)}}" style="text-decoration:none; color:#3b4455;">{{ $fasilitas->keterangan }}</a></h6>
                            </div>
                            <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                            <br>
                        @endforeach
                    </div>

                    <div class="pt-3">
                        <img width="100%" src="/assets/images/banner-3M.jpeg" alt="">
                    </div>

                    </div>
                </div>
            </div>
        </div>
        @include('panels.frontend1.Footer')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>
