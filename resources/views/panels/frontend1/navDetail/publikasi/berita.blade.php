<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@include('layouts.disabilitas')
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

        .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 80%;
    border-radius: 5px;
    margin-bottom: 3rem;
    border: 1px solid #dd2476;
    }

    .card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    /* img {
    border-radius: 5px 5px 0 0;
    } */
    .content{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: 0.4s all ease;
    }

    .content:hover{
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }

    /* .img-berita{
        width: 100% !important;
        height: 270px;
    } */

    .sign-berita{
        width: 100%;
        padding-left: 3%;
        padding-right: 3%;
    }

    @media screen and (max-width: 1000px) {
        .content{
            flex-direction: column;
        }

        .img-berita{
            width: 100% !important;
        }
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
            $(document).ready(function(){
                $(document).on('click', '#cari', function(){
                    var value = $('#inputparam').val();
                    if(value == null || value == ""){
                        console.log('kosong');
                    } else{
                        window.location.href = '/berita/tentang='+value;
                    }
                })
            })
        </script>
    <body style="font-family: 'Poppins';">
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

<div class="container mt-5">
    <div class="row">
        <div class="col" >
            <h3 style="color:#b3b3b3">
                Berita
            </h3>
            {{-- <div>
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
            </div> --}}

            <hr style="color: orangered;" >
            <form role="form" class="text-start">
                <div class="input-group" style="width:fit-content">
                    <!-- <select name="kategori" class="form-control">
                        <option hidden value="">Semua Kategori</option>
                        @foreach ($kategori ?? '' as $k)
                        <option value="{{ $k->kategori }}">{{ $k->kategori }}</option>
                        @endforeach
                    </select> -->
                    <input type="month" name="bulan" class="form-control">
                    <input type="text" name="konten" class="form-control" placeholder="Cari Berita Terkait">
                    <button type="submit" class="btn btn-outline-primary mb-0"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <br>
            <div class="px-2" style="overflow-x: auto">
                <table>
                    <tr>
                        @foreach ($berita as $item)
                        <div class="content d-flex mb-5" style="width: 100% !important;">
                            <div>
                            @if ($item->img != null || $item->img != "")
                                <img height ="350px !important" width="420px !important" style="object-fit: cover ;" class="img-berita"  src="{{ asset('storage/berita/'.$item->img) }}" class="card-img-top" alt="...">
                            @else
                                <img height ="350px !important" width="420px !important" style="object-fit: cover ;" class="img-berita" src="../assets/images/noimage.png" class="card-img-top" alt="...">
                            @endif
                            </div>

                            <div class="sign-berita py-4">
                                <p style="color: orangered">{{ $item->kategori }}
                                    <span style="color: grey"> &nbsp; {{ \Carbon\Carbon::parse($item->published_date)->isoFormat('D MMMM Y')}}</span></p>
                                    <a href="/detailberita/{{ $item->id }}" style="text-decoration: none; color: black;"><b><h5 class="card-title">{{$item->title}}</h5></b></a>
                                    <p  class="card-text">{!! Str::limit($item->content, 150) !!}</em></p>
                                    <div class="d-flex align-items-center" >
                                        <img src="/assets/images/Read-more.png" style="width: 3%;"alt="">&nbsp;
                                        <a href="/detailberita/{{ $item->id }}" class="card-link" style="text-decoration:none" >BACA SELENGKAPNYA</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <img src="/assets/images/viewers.png" style="width: 3%;"alt="">&nbsp;
                                            {{ $item->viewed }}
                                    </div>
                              </div>
                        </div>
                          @endforeach
                    </tr>
                </table>

                <br>
                {{ $berita->withQueryString()->links() }}
            </div>


                        <script>
                            $(document).ready(function(){
                                $('#tabel-data').DataTable();
                            });
                        </script>
                    {{-- </div> --}}
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>

                    <br><br><br>
                </div>



                <div class="col-md-4 pt-2 pb-5">
                    <div>
                        BERITA TERBARU
                        <hr>
                        @foreach ($beritaterbaru as $data)
                            <div class="d-flex" style="margin-bottom:10px;">
                                @if ($data->img != null || $data->img != "")
                                <img  src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="..." style="width:200px;height:100px; object-fit: cover; object-position: center ">
                                @else
                                <img  src="../assets/images/noimage.png" class="card-img-top" alt="..."  style="width:200px;height:100px; object-fit: cover; object-position: center ">
                                @endif
                                &nbsp;&nbsp;&nbsp;
                                <div>
                                    <span>{{ \Carbon\Carbon::parse($data->published_date)->isoFormat('D MMMM Y')}}</span>
                                    <p style="font-weight: bold; font-size:15px;">
                                        <a href="/detailberita/{{ $data->id }}" style="text-decoration:none; color:#3b4455;">{!! Str::limit($data->title, 20) !!}</a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-3" ">
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
                        <a target="_blank" href="{{ $banner->link }}"><img width="100%" src="{{ asset('storage/banner/'.$banner->img) }}" alt=""></a>
                    </div>

            </div>
        </div>
    </div>
</div>
 @include('panels.frontend1.Footer')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
    </html>
