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


        <title>PEKPPP 2023 - Kota Administrasi Jakarta Barat</title>
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
                        <h3 style="color:orangered;">PEKPPP 2023</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">PEKPPP 2023 </a>
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
                        PEKPPP 2023
                    </h3>
                    <hr style="color: orangered;" >
                    <div style="width: 100% !important; overflow-x: auto !important;">
                        <div class="accordion" id="pekppaccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" style="font-weight: 700; color: #ff4500; background-color: #e7f1ff;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                INDEKS KEPUASAN MASYARAKAT 2023
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse show" aria-labelledby="headingOne" data-bs-parent="#pekppaccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col mt-1">Nilai IKM Semester I Kota Administrasi Jakarta Barat Tahun 2023</div>
                                        <div class="col"><a href="{{ asset('assets/docs/Nilai IKM Semester I Kota Administrasi Jakarta Barat Tahun 2023.pdf') }}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat</a></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col mt-1">Hasil IKM Suku Dinas Sosial Kota Administrasi Jakarta Barat 2023</div>
                                        <div class="col"><a href="{{ asset('assets/docs/Hasil SKM SUDINSOS 2023.pdf') }}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat</a></div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col mt-1">Hasil IKM Kecamatan Grogol Petamburan 2023</div>
                                        <div class="col"><a href="{{ asset('assets/docs/HASIL IKM KECAMATAN GROGOL PETAMBURAN 2023.pdf') }}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" style="font-weight: 700; color: #ff4500; background-color: #e7f1ff;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                SIPPN 2023
                            </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse" aria-labelledby="headingTwo" data-bs-parent="#pekppaccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col mt-1" style="font-weight: 600;">Suku Dinas Sosial Kota Administrasi Jakarta Barat</div>
                                    </div>
                                        <ul>
                                            <li><a href="{{ asset('assets/docs/DOKUMENTASI PUBLIKASI SIPPN SUDIN SOSIAL JAKARTA BARAT 2023.pdf') }}" target="_blank">Hasil SS SIPPN</a></li>
                                            <li><a href="{{ asset('assets/docs/Hasil Evaluasi SIPPN MENPAN RB SUDIN SOSIAL Tahun 2023.pdf') }}" target="_blank">Hasil TL Evaluasi</a></li>
                                        </ul>
                                    <hr>
                                    <div class="row">
                                        <div class="col mt-1" style="font-weight: 600;">Kecamatan Grogol Petamburan</div>
                                    </div>
                                        <ul>
                                            <li><a href="{{ asset('assets/docs/DOKUMENTASI PUBLIKASI SIPPN KEC. GROGOL PETAMBURAN JAKARTA BARAT 2023.pdf') }}" target="_blank">Hasil SS SIPPN</a></li>
                                            <li><a href="{{ asset('assets/docs/Hasil Evaluasi SIPPN MENPAN RB Kec. Grogol Petamburan Tahun 2023.pdf') }}" target="_blank">Hasil TL Evaluasi</a></li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" style="font-weight: 700; color: #ff4500; background-color: #e7f1ff;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                STANDAR PELAYANAN
                            </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse show" aria-labelledby="headingThree" data-bs-parent="#pekppaccordion">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col mt-1">Standar Pelayanan Kecamatan Grogol Petamburan</div>
                                        <div class="col"><a href="{{ asset('assets/docs/1.1 SP YANG DITETAPKAN.pdf') }}" target="_blank" type="button" class="btn btn-primary btn-sm">Lihat</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        
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
