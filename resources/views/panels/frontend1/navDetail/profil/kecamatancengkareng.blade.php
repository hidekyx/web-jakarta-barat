<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@include('layouts.disabilitas')
<!DOCTYPE html>
    @foreach ($data as $data)
    <html lang="en">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/beritaFoto.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Fonts -->

        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



        <title>{{ strtoupper($data->title) }} - Kota Administrasi Jakarta Barat</title>
    </head>
    <style>
        .blogq {
            font-family: 'Poppins';
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

        /* .container {
        height: 200px;
        position: relative;
        border: 3px solid green;
        } */

        .vertical-center {
        margin: 0;
        position: absolute;
        top: 50%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
        }

        .btnq {
    display: inline-block;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    /* background-color: transparent;
    border: 1px solid transparent; */
    padding: .375rem .75rem;
    font-size: 0.8rem;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

        </style>
    <body>

        @include('panels.frontend1.nav')
        <section style="font-family: 'Poppins';">
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">PROFIL</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Profil </a>
                            <span style="color:#fff">/</span>
                            <span class="active">{{ $data->title }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        {{-- <div class="d-flex justify-content-center" style="text-align: center; width:100%; height:100%; padding-top: 25px; font-size: 0.1rem; ">
            <a class="btnq btn-primary mx-1" style= " color: #fff;" >PROFIL <br> {{ strtoupper($data->title) }} </a>
            <a class="btnq btn-danger mx-1" style= "color: #fff;" >BERITA <br> {{ strtoupper($data->title) }} </a>
            <a class="btnq btn-success mx-1" style= "color: #fff;" >AGENDA <br> {{ strtoupper($data->title) }} </a>
          </div> --}}

        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <h3 style="color:#b3b3b3">
                        {{ strtoupper($data->title) }}
                    </h3>
                    <hr style="color: orangered;" >
                    <nav>
                        <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup1" role="tablist">
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning active" id="nav-profil-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil"
                            aria-selected="true">PROFIL KECAMATAN</button>
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning" id="nav-tugas-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-tugas" type="button" role="tab" aria-controls="nav-tugas"
                            aria-selected="false">TUGAS POKOK</button>
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning" id="nav-kelurahan-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-kelurahan" type="button" role="tab" aria-controls="nav-kelurahan"
                            aria-selected="false">KELURAHAN</button>
                    </nav>
                    @foreach ($kecamatan as $item)
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active p-3" id="nav-profil" role="tabpanel"
                            aria-labelledby="nav-profil-tab">
                                <p class="blogq" style="color: #747474;">
                                    {!! $item->profil !!}
                                </p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-tugas" role="tabpanel"
                            aria-labelledby="nav-tugas-tab">
                                <p class="blogq" style="color: #747474;">
                                    {!! $item->tupoksi !!}
                                </p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-kelurahan" role="tabpanel"
                            aria-labelledby="nav-kelurahan-tab">
                            <table class="table table-striped mt-2">
                                <tr>
                                    <th>
                                        NO
                                    </th>
                                    <th>
                                        NAMA KELURAHAN
                                    </th>
                                    <th>
                                        LAMAN
                                    </th>
                                    <th>
                                        PROFIL
                                    </th>
                                </tr>
                                <?php $kelurahan = DB::select(DB::raw("select row_number() over() as nomor, id, nama, website from instansi where sub = '$item->id'"))?>
                                @foreach ($kelurahan as $kel)
                                    <tr>
                                        <td>
                                            {{ $kel->nomor }}
                                        </td>
                                        <td>
                                            {{ $kel->nama }}
                                        </td>
                                        <td>
                                            <a href="{{ $kel->website }}">{{ $kel->website }}</a>
                                        </td>
                                        <td>
                                            <a href="/kelurahan-info/{{ $kel->id }}" class="btn btn-warning">LIHAT PROFIL</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @endforeach
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        @include('panels.frontend1.Footer')

    </body>
    </html>

    @endforeach
