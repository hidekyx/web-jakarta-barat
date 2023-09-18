<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@include('layouts.disabilitas')
@foreach ($data as $item)
<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fonts -->

        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>{{ $item->nama }}</title>
    </head>
    <style>
        .blogq {
            font-family: 'Open Sans', sans-serif !important;
            margin: 0 0 25px 0;
            font-size: 14px;
            line-height: 30px;
            color: #747474;
        }
        .blogq {
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
        .dropdown-contentq {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        left:0;
        right:0;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        }

        .dropdown-contentq .header {
        background: red;
        padding: 16px;
        color: white;
        }

        .dropdownq:hover .dropdown-contentq {
        display: block;
        }

        .dropdownq .withoutdesc {
            margin-top: 0;
            margin-left:405px;
            text-align: left;
            text-transform: none;
        }

        /* Create three equal columns that floats next to each other */
        .columnq{
        float: left;
        width: 25%;
        padding: 10px;
        background-color: #ccc;
        height: 350px;
        }

        .columnq-three-col{
        float: left;
        width: 33%;
        padding: 10px;
        background-color: #ccc;
        height: 350px;
        }

        .columnq-three-col a {
        float: none;
        color: black;
        padding: 3px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .columnq-three-col h3 {
            font-size:20px;
        }

        .columnq h3 {
            font-size:20px;
        }

        .columnq a {
        float: none;
        color: black;
        padding: 3px;
        text-decoration: none;
        display: block;
        text-align: left;
        }

        .columnq a:hover {
        background-color: #ddd;
        }

        .columnq-three-col a:hover {
        background-color: #ddd;
        }

        /* Clear floats after the columns */
        .rowq:after {
        content: "";
        display: table;
        clear: both;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        .columnq {
            width: 100%;
            height: auto;
        }

        .columnq-three-col {
            width: 100%;
            height: auto;
        }
        }
        </style>
    <body>

        @include('panels.frontend1.nav')
        <section>
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">DETAIL BERITA</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    {{-- <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Profil </a>
                            <span style="color:#fff">/</span>
                            <span class="active">Geografis</span>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>

        </section>

        <div class="container pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 style="color:#b3b3b3">
                        {{ strtoupper($item->nama) }}
                    </h3>
                    <hr style="color: orangered;" >
                    <p class="blogq" style="color: #747474;">
                        {!! $item->profil !!}
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
                                <img  src="{{ asset('storage/berita/'.$data->img) }}" class="card-img-top" alt="..." style="width:200px;height:100px; object-fit: cover; object-position: center ">
                                @else
                                <img  src="../assets/images/noimage.png" class="card-img-top" alt="..."  style="width:200px;height:100px; object-fit: cover; object-position: center ">
                                @endif
                                &nbsp;&nbsp;&nbsp;
                                <div>
                                    <span>{{ date('d F Y', strtotime($data->published_date)) }}</span>
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
                        <a target="_blank" href="{{ $banner->link }}"><img width="100%" src="{{ asset('storage/banner/'.$banner->img) }}" alt=""></a>
                    </div>

                </div>
            </div>
        </div>



        @include('panels.frontend1.Footer')

    </body>
    </html>


@endforeach
