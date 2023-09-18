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


        <title>Agenda - Kota Administrasi Jakarta Barat</title>
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
                        <h3 style="color:orangered;">Agenda</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Agenda </a
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
                        Agenda
                    </h3>
                    <hr style="color: orangered;" >
                    {{-- @foreach ($content as $wilayah)
                        <p class="blogq" style="color: #747474;">
                            {!! $wilayah->konten !!}
                        </p>
                    @endforeach --}}
                    <div style="width: 100% !important; overflow-x: auto !important;">
                        <table class="table table-bordered" id="tabel-data">
                            <thead>
                                <tr>
                                    <th class="text-center">NO.</th>
                                    <th>WAKTU</th>
                                    <th>ACARA</th>
                                    <th>TEMPAT</th>
                                    <th colspan="2">HADIR</th>
                                    <th>DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agenda as $item)
                                <tr>

                                    <td class="text-center">{{ $item->nomor }}</td>
                                    <td>{{ $item->tanggal }}<p>{{$item->pukul}} WIB</p></td>
                                    <td>{{ $item->acara }}</td>
                                    <td>{{ $item->tempat }}</td>
                                    <td>{{ $item->pelaksana }}</td>
                                    @if ($item->gambar != null || $item->gambar != "")
                                        <td><img width="50px" src="{{ asset('storage/pejabat/'.$item->gambar) }}" alt=""></td>
                                    @else
                                        <td><img width="50px" src="../assets/images/noimage.png" alt=""></td>
                                    @endif
                                    <td>
                                        <a href="#" id="detailagenda" data-bs-toggle="modal" data-acara="{{ $item->acara }}" data-tanggal="{{ $item->tanggal }}"
                                            data-pukul ="{{ $item->pukul }}" data-tempat="{{ $item->tempat }}" data-pelaksana="{{ $item->pelaksana }}"
                                            data-keterangan ="{{ $item->ket }}"
                                            data-bs-target ="#exampleModal" type="button" class="btn btn-success">DETAIL</a>
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
                        {{ $agenda->links() }}
                    </div>
                    <div class="pt-5"style="border-bottom:1px dotted gray;"></div>
                    <br><br><br>
                </div>
            </div>
        </div>
        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                    <h5>
                        <i class="fas fa-clock"></i> Detail Agenda
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pt-2">
                        <h6 id="acara"></h6>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <strong class="text-secondary">
                            Waktu
                        </strong>
                        <div class="text-center" style="width: 5%">
                           &nbsp; :
                        </div>
                        <div style="width: 60%" id="tanggal">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <strong class="text-secondary">
                            Tempat
                        </strong>
                        <div class="text-center" style="width: 5%">
                            :
                        </div>
                        <div style="width: 60%" id="tempat">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between py-1">
                        <strong class="text-secondary">
                            Pelaksana
                        </strong>
                        <div style="width: 5%">
                            :
                        </div>
                        <div style="width: 60%" id="pelaksana">
                        </div>
                    </div>
                    <hr>
                    <div id="keterangan">

                    </div>
                </div>
                {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
              </div>
            </div>
          </div>
    </body>
    </html>
