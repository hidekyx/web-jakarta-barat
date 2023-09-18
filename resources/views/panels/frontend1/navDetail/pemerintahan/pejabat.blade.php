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
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



        <title>{{ strtoupper($data->title) }} - Kota Administrasi Jakarta Barat</title>
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
        <section>
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
                            <a href="/" style="text-decoration:none; color: white">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none; color: white">Profil </a>
                            <span style="color:#fff">/</span>
                            <span class="active">{{ $data->title }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <div class="d-flex justify-content-center" style="text-align: center; width:100%; height:100%; padding-top: 25px; font-size: 0.1rem; ">
            <a class="btnq btn-primary mx-1" style= " color: #fff;" >PROFIL <br> {{ strtoupper($data->title) }} </a>
            <a class="btnq btn-danger mx-1" style= "color: #fff;" >BERITA <br> {{ strtoupper($data->title) }} </a>
            <a class="btnq btn-success mx-1" style= "color: #fff;" >AGENDA <br> {{ strtoupper($data->title) }} </a>
          </div>

        <div class="container pt-5">
            <div class="row">
                <div class="col-md-8">
                    <h3 style="color:#b3b3b3">
                        {{ strtoupper($data->title) }}
                    </h3>
                    <hr style="color: orangered;" >
                    {{-- <nav>
                        <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup1" role="tablist">
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning active" id="nav-profil-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profil" type="button" role="tab" aria-controls="nav-profil"
                            aria-selected="true">PROFIL KECAMATAN</button>
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning" id="nav-tugas-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-tugas" type="button" role="tab" aria-controls="nav-tugas"
                            aria-selected="false">TUGAS POKOK</button>
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning" id="nav-camat-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-camat" type="button" role="tab" aria-controls="nav-camat"
                            aria-selected="false">PROFIL CAMAT</button>
                            <button style="border-radius: 0px !important;" class="nav-link bg-warning" id="nav-kelurahan-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-kelurahan" type="button" role="tab" aria-controls="nav-kelurahan"
                            aria-selected="false">KELURAHAN</button>
                    </nav> --}}
                    {{-- @foreach ($kecamatan as $item)
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
                                    {{ $item->tupoksi }}
                                </p>
                        </div>
                        <div class="tab-pane fade show p-3" id="nav-camat" role="tabpanel"
                            aria-labelledby="nav-camat-tab">
                            <?php $data = DB::select(DB::raw("select * from pejabat"))?>
                                @foreach ($data as $datas)
                                    @if ( $datas->instansiID == $item->id)
                                        <h6 class="mt-2">{{ $datas->nama }}</h6>
                                        <div class="d-flex justify-content-around">
                                            <img src="{{ $datas->img }}" alt="">
                                            <div style="color: #747474;">
                                                {!! $datas->profil !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
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
                                            <a href="/kelurahan/{{ $kel->id }}" class="btn btn-warning">LIHAT PROFIL</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @endforeach --}}
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
                    <br><br><br>
                </div>
                <div class="col-md-4 pt-2 pb-5">
                    <div>
                        BERITA TERBARU
                        <hr>
                        <div class="d-flex">
                            <img src="/assets/images/profile/pages/page-02.jpg" alt="">
                            <h6><span href="">27/09/2020</span><a href="" style="text-decoration:none; color:#3b4455;"> Antisipasi Genangan, Warga Kalianyar Ramai-ramai Keruk Sampah Saluran</a></h6>
                        </div>
                        <br>
                        <div class="d-flex">
                            <img src="/assets/images/profile/pages/page-04.jpg" alt="">
                            <h6><span href="">27/09/2020</span><a href="" style="text-decoration:none; color:#3b4455;"> Rustam Efendi Ajak Warga Ikut Vaksinasi Covid di Cengkareng Timur</a></h6>
                        </div>
                        <br>
                        <div class="d-flex">
                            <img src="/assets/images/profile/pages/page-05.jpg" alt="">
                            <h6><span href="">27/09/2020</span><a href="" style="text-decoration:none; color:#3b4455;"> Pemkot Jakbar Gelar Pembinaan Pengelolaan Keuangan Daerah 2021</a></h6>
                        </div>
                        <br>
                        <div class="d-flex">
                            <img src="/assets/images/profile/pages/page-08.jpg" alt="">
                            <h6><span href="">27/09/2020</span><a href="" style="text-decoration:none; color:#3b4455;"> Percantik Sentra Flona Semanan, Pelaku Usaha Tanam Bunga Matahari</a></h6>
                        </div>
                        <br>
                        <div class="d-flex">
                            <img src="/assets/images/profile/pages/page-09.jpg" alt="">
                            <h6><span href="">27/09/2020</span><a href="" style="text-decoration:none; color:#3b4455;"> Capaian Vaksinasi di Tanah Sereal 77,55 Persen</a></h6>
                        </div>
                    </div>

                    <div class="pt-5">
                        FASILITAS
                        <hr>
                        <div class="d-flex">
                            <i class="fas fa-graduation-cap"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;"> Pendidikan</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                        <br>
                        <div class="d-flex">
                            <i class="fas fa-ambulance"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;" > Kesehatan</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                        <br>
                        <div class="d-flex">
                            <i class="fas fa-fire-extinguisher"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;"> Pemadam Kebakaran</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                        <br>
                        <div class="d-flex">
                            <i class="fas fa-bus"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;"> Transportasi</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                        <br>
                        <div class="d-flex">
                            <i class="fas fa-futbol"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;"> Olahraga</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                        <br>
                        <div class="d-flex">
                            <i class="fas fa-book"></i>&nbsp;&nbsp;
                            <h6><a href="" style="text-decoration:none; color:#3b4455;"> Perpustakaan</a></h6>
                        </div>
                        <div class="pt-2"style="border-bottom:1px dotted gray;"></div>
                    </div>
                    <div class="pt-5">
                        PELAYANAN
                        <hr><br>
                        <div class="d-flex">
                        <h5 ><li type="circle" style="font-size:13px">Pelayanan Terpadu Satu Pintu (PTSP)</li></h5>
                        </div>
                        <div style="border-bottom:1px dotted gray;"></div>
                        <div class="d-flex pt-4">
                            <h5><li type="circle" style="font-size:13px">Pelayanan Malam Hari</li></h5>
                        </div>
                        <div style="border-bottom:1px dotted gray;"></div>
                        <div class="d-flex pt-4">
                            <h5><li type="circle" style="font-size:13px">Pelayanan Umum</li></h5>
                        </div>
                        <div style="border-bottom:1px dotted gray;"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        @include('panels.frontend1.Footer')

    </body>
    </html>

    @endforeach
