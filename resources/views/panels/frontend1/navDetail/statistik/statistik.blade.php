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


        <title>Statistik - Kota Administrasi Jakarta Barat</title>
    </head>
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
                        <h3 style="color:orangered;">Statistik</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Statistik </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <div class="container pt-5">
            <div class="row">
                <div class="col">
                    <h3 style="color:#b3b3b3">
                        Statistik
                    </h3>
                    <hr style="color: orangered;" >
                    <div style="width: 100% !important; overflow-x: auto !important;">
                        <table class="table table-bordered" id="tabel-data">
                            <thead>
                                <tr>
                                    <th class="text-center">NO.</th>
                                    <th>TAHUN</th>
                                    <th>JUDUL</th>
                                    <th>UNDUH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporan_statistik as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td>{{ $item->tahun }}</p></td>
                                    <td>{{ $item->judul }}</td>
                                    <td>
                                        <a href="{{ asset('storage/laporan_statistik/'.$item->file) }}" type="button" class="btn btn-success">Unduh</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function(){
                                $('#tabel-data').DataTable();
                            });
                        </script>
                        <br>
                        {{ $laporan_statistik->links() }}
                    </div>
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
                    <br><br><br>
                </div>
            </div>
        </div>
        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>
