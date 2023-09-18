@foreach ($data as $item)
<!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}" type = "image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/beritaFoto.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

        <title>{{ $item->title }}</title>

        <!-- meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <meta http-equiv="refresh" content="900"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="language" content="id" />
        <meta name="title" content="{{ $item->title }} - Kota Administrasi Jakarta Barat" />
        <meta name="description" content="Berita Jakarta Barat - {{ $item->kategori }}" />
        <meta name="keywords" content="Berita Jakarta Barat, {{ $item->kategori }}, {{ $item->title}}" />
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ asset('detailberita/'.$item->id) }}">
        <meta property="og:title" content="{{ $item->title }} - Kota Administrasi Jakarta Barat">
        <meta property="og:image" itemprop="image" content="{{ asset('storage/berita/thumbnail/'.$item->thumbnail) }}">
        
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    @include('layouts.disabilitas')
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

        .detail-pic {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
            min-width: 100%; 
            min-height: 100%;
        }

        .detail-pic:hover {
            opacity: 0.5;
        }

        .active-pic {
            border-bottom: #ff5724 solid 3px;
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

                    <h3 style="color:orangered; text-align: center">
                        {{ $item->title }}
                    </h3>
                    <div class="text-start" style="width: 100%">
                        <span class="badge bg-primary" style="color:white; text-align: center">
                            {{$item->kategori }}
                        </span>
                        <span class="badge bg-secondary" style="color:white; text-align: center">
                            <i class="fa fa-calendar"></i>
                            @if (\Carbon\Carbon::parse($item->published_date)->isoFormat('H:m') != "0:0")
                            {{ \Carbon\Carbon::parse($item->published_date)->isoFormat('dddd, D MMMM Y') }} - {{\Carbon\Carbon::parse($item->published_date)->isoFormat('H:m')}}
                            @else
                            {{ \Carbon\Carbon::parse($item->published_date)->isoFormat('dddd, D MMMM Y') }}
                            @endif
                        </span>
                        <span class="badge bg-danger" style="color:white; text-align: center">
                            <i class="fa fa-eye"></i>&nbsp;{{$item->viewed}}
                        </span>
                        <span style="padding-left: 20px">
                            Reporter : <strong>{{$item->nama}}</strong>
                        </span>
                        @if ($item->editor != null)
                            @foreach ($editor as $editor)
                                <span style="padding-left: 10px">
                                    Edited By <strong>{{$editor->nama}}</strong>
                                </span>
                            @endforeach
                        @endif
                    </div>
                    {{-- <hr style="color: orangered;" > --}}
                    <style>
                        
                    </style>
                    <p class="blogq" style="color: #747474;">
                            <div class="tab-content" id="nav-tabContent" style="justify-content: center">
                                <div class="tab-pane fade show active" id="nav-image-display" role="tabpanel"
                                aria-labelledby="nav-image-display-tab">
                                    @if ($item->img != null || $item->img != "")
                                    <img src="{{ asset('storage/berita/'.$item->img) }}" class="card-img-top" alt="..." id="detail-pic-highlight">
                                    @else
                                    <img src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                    @endif
                                </div>
                                <div class="row mt-2">
                                    @if ($item->img_2 != null || $item->img_2 != "")
                                        <div class="col"><img src="{{ asset('storage/berita/'.$item->img) }}" class="img-fluid detail-pic active-pic" id="img-detail-1"></div>
                                        <div class="col"><img src="{{ asset('storage/berita/'.$item->img_2) }}" class="img-fluid detail-pic" id="img-detail-2"></div>
                                        @if ($item->img_3 != null || $item->img_3 != "")
                                        <div class="col"><img src="{{ asset('storage/berita/'.$item->img_3) }}" class="img-fluid detail-pic" id="img-detail-3"></div>
                                        @endif
                                        @if ($item->img_4 != null || $item->img_4 != "")
                                        <div class="col"><img src="{{ asset('storage/berita/'.$item->img_4) }}" class="img-fluid detail-pic" id="img-detail-4"></div>
                                        @endif
                                        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
                                        <script type="text/javascript">
                                            $('.detail-pic').click(function(){
                                                var image = $(this).attr('src');
                                                $('.detail-pic').removeClass('active-pic');
                                                $(this).addClass('active-pic');
                                                $('#detail-pic-highlight').fadeOut(250, function() {
                                                    $('#detail-pic-highlight').attr('src', image);
                                                })
                                                .fadeIn(250);
                                            });
                                        </script>
                                    @endif
                                </div>
                                
                                <div class="tab-pane fade show" id="nav-video-play" role="tabpanel"
                                aria-labelledby="nav-video-play-tab">
                                    @if ($item->video != null || $item->video != "")
                                    <video width="100%" controls>
                                        <source src="{{ asset('storage/berita/'.$item->video) }}" type="video/mp4">
                                    </video>
                                    @else
                                    <img   src="../assets/images/novideo.png" class="card-img-top" alt="...">
                                    @endif
                                </div>
                            </div>
                            @if ($item->caption != null || $item->caption != "")
                                <small><i class="text-muted">{{ $item->caption }}</i></small>
                            @endif
                            @if ($item->video != null || $item->video != "")
                            <nav class="pt-3">
                                <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup3" role="tablist">
                                    <button style="border-radius: 0px !important;" class="nav-link active" id="nav-image-display-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-image-display" type="button" role="tab" aria-controls="nav-image-display"
                                    aria-selected="true">
                                        Gambar
                                    </button>
                                    <button style="border-radius: 0px !important;" class="nav-link" id="nav-video-play-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-video-play" type="button" role="tab" aria-controls="nav-video-play"
                                        aria-selected="false">
                                         Video
                                    </button>
                                </div>
                            </nav>
                            @endif

                        <br>
                        <p style="color: orangered" class="mb-0 mt-4">{!! $item->kategori !!}</p>
                        {!! $item->content !!}

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
                        <a target="_blank" href="{{ $banner->link }}"><img width="100%" src="{{ asset('storage/banner/'.$banner->img) }}" alt=""></a>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60179c34b34aee60"></script>

        <div class="addthis_sharing_toolbox" data-url="http://customurl.com" data-title="customtitle"></div>

        <script type="text/javascript">
          var addthis_share = addthis_share || {};
          addthis_share = {
              passthrough: {
                  twitter: {
                      via: 'twitteraccount',
                      text: 'lorem ipsum'
                  }
              }
          };
        </script>
        <script type="text/javascript">
            var addthis_config = addthis_config || {};
            addthis_config.data_track_clickback = false;
            addthis_config.data_track_addressbar = false;
            addthis_config.ui_language = 'fr';
            addthis_config.ui_508_compliant = true;
        </script>

        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>


@endforeach
