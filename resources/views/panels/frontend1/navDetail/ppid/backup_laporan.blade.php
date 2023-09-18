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


        <title>Laporan PPID - Kota Administrasi Jakarta Barat</title>
    </head>
    <style>
        .blogq{
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
    <body style="font-family: 'Poppins';">
        @include('panels.frontend1.nav')
        <section>
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">PPID</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">PPID </a>
                            <span style="color:#fff">/</span>
                            <span class="active">Laporan</span>
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
                        Laporan PPID
                    </h3>
                    <hr style="color: orangered;" >
                    <br>
                        <p class="blogq" style="color: #747474;">
                            <h4 style="box-sizing: border-box; outline: none; font-family: Montserrat, sans-serif; line-height: 30px; margin-top: 10px; margin-bottom: 10px; font-size: 18px; -webkit-font-smoothing: antialiased; background-color: #ffffff; font-weight: normal !important;"><span style="box-sizing: border-box; outline: none; font-weight: bold;">
                                LAPORAN PPID SEKRETARIAT KOTA ADMINISTRASI JAKARTA BARAT</span></h4>
                            <ul>
                            <li style="box-sizing: border-box; list-style-type: circle; outline: none; color: #747474; font-family: 'Open Sans', sans-serif; background-color: #ffffff;">Laporan Layanan Informasi Publik 2017-2018 <a href="/assets/docs/lap_tahunan_badan_publik20172018.pdf" target="blank">Downloads</a></li>
                            </ul>
                        </p>
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
                    <br><br><br>
                </div>
                <div class="col-md-4 pt-2 pb-5">
                    <div>
                        BERITA TERBARU
                        <hr>
                        @foreach ($berita as $data)
                                <div class="d-flex" style="margin-bottom:10px;">
                                    @if ($data->img != null || $data->img != "")
                                    <img  src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="..." style="width:200px;height:100px; object-fit: cover">
                                    @else
                                    <img  src="../assets/images/noimage.png" class="card-img-top" alt="..."  style="width:200px;height:100px; object-fit: cover">
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

        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
    </html>
