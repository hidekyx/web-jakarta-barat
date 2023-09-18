<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/css/beritaFoto.css')}}">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css"/>
    <script>
    jQuery(document).ready(function($){
        $('.owl-carousel-foto').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        items : 4,
        responsive:{
            0:{
            items:1
            },
            600:{
            items:2
            },
            900:{
            items:4
            }
        }
        })
    })
    </script>
    <script>
        $(document).ready(function(){
            $(document).on('click', '#foto', function(){
                $('.container-berita-foto-1').hide();
                $('.container-berita-foto-2').hide();
                $('.container-berita-foto-3').hide();
                $('.container-berita-foto-4').hide();
                const img_file = [$(this).data('img'), $(this).data('img_2'), $(this).data('img_3'), $(this).data('img_4')];
                const img_url = [];
                for (let i = 0; i < img_file.length; i++) {
                    img_url[i] = "{{ asset('storage/beritafoto') }}" + "/" +img_file[i];
                }
                
                var title = $(this).data('title');
                var time = $(this).data('time');
                $('#berita-foto-title').text(title);
                $('#berita-foto-time').text(time);
                $('#berita-foto-image').attr("src", img_url[0]);
                if(img_file[1] != "")  {
                    $('.container-berita-foto-1').fadeIn();
                    $('.container-berita-foto-2').fadeIn();
                    $('#berita-foto-image_1').attr("src", img_url[0]);
                    $('#berita-foto-image_2').attr("src", img_url[1]);
                }
                if(img_file[2] != "")  {
                    $('.container-berita-foto-3').fadeIn();
                    $('#berita-foto-image_3').attr("src", img_url[2]);
                }
                if(img_file[3] != "")  {
                    $('.container-berita-foto-4').fadeIn();
                    $('#berita-foto-image_4').attr("src", img_url[3]);
                }
                console.log(img_file);
            })
        })
    </script>
    <style>
        .videowrapper { float: none; clear: both; width: 100%; position: relative; padding-bottom: 56.25%; padding-top: 25px; height: 0; } .videowrapper iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
        .overlay {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5); /* Black see-through */
        color: #f1f1f1;
        width: 100%;
        transition: .5s ease;
        opacity:0;
        color: white;
        font-size: 12px;
        padding: 20px;
        text-align: left;
        font-family: 'Poppins';
        }

        .card:hover .overlay {
        opacity: 1;
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
    </style>

    <section style="font-family: 'Poppins';">
        <div class="container">
            <div class="col-sm-12 text-center pt-5 ">
                <h2>BERITA <span style="color:orangered;">FOTO </span></h2>
            </div>
            <div class="col-sm-12 h5 text-center">
            <p style="color : #78829d; font-size:20px;">Informasi Dalam Rekaman Lensa</p>
            </div>
        </div>

            <div class="text-center pt-2">
                <nav>
                    <div class="nav nav-tabs justify-content-center btn-group" style="border: none !important;" id="btnGroup1" role="tablist">
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link active" id="nav-photo-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-photo" type="button" role="tab" aria-controls="nav-photo"
                    aria-selected="false">SEMUA</button>
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link" id="nav-pemerintahan-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-pemerintahan" type="button" role="tab" aria-controls="nav-pemerintahan"
                    aria-selected="false">PEMERINTAHAN</button>
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link" id="nav-perekonomian-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-perekonomian" type="button" role="tab" aria-controls="nav-perekonomian"
                    aria-selected="false">PEREKONOMIAN</button>
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link" id="nav-pembangunan-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-pembangunan" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">PEMBANGUNAN</button>
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link" id="nav-kesejahteraanmasyarakat-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-kesejahteraanmasyarakat" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">KESEJAHTERAAN MASYARAKAT  </button>
                    <button style="background-color: rgb(157, 163, 168); border-radius: 0px !important;" class="nav-link" id="nav-umum-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-umum" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">UMUM</button>
                </nav>
            </div>

    </section>


    <div class="container">
        <?php $param1 = 6;?>
        <?php $param2 = 7;?>
        <?php $param3 = 8;?>
        <?php $param4 = 9;?>
        <?php $param5 = 10;?>
            <div class="tab-content" style="width: 100% !important" id="nav-tabContent">
                <div class="tab-pane fade show active p-3 text-center" style="width: 100% !important" id="nav-photo" role="tabpanel"
                    aria-labelledby="nav-photo-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        @foreach ($beritafoto as $item)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($item->img != null || $item->img != "")
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="{{ asset('storage/beritafoto/'.$item->img) }}" class="card-img-top" alt="...">
                                @else
                                <img  height ="300px !important" width="300px !important" style="object-fit: cover" src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $item->judul }}" data-time="{{ \Carbon\Carbon::parse($item->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $item->img }}" data-img_2="{{ $item->img_2 }}" data-img_3="{{ $item->img_3 }}" data-img_4="{{ $item->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $item->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-pemerintahan" role="tabpanel"
                    aria-labelledby="nav-pemerintahan-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data = DB::select(DB::raw("select * from beritafoto where catID = '$param1' order by id desc limit 8"))?>
                        @foreach ($data as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img  height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                    <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-perekonomian" role="tabpanel"
                    aria-labelledby="nav-perekonomian-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data2 = DB::select(DB::raw("select * from beritafoto where catID = '$param2' order by id desc limit 8"))?>
                        @foreach ($data2 as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-pembangunan" role="tabpanel"
                    aria-labelledby="nav-perekonomian-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data3 = DB::select(DB::raw("select * from beritafoto where catID = '$param3' order by id desc limit 8"))?>
                        @foreach ($data3 as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img  height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-pembangunan" role="tabpanel"
                    aria-labelledby="nav-pembangunan-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data4 = DB::select(DB::raw("select * from beritafoto where catID = '$param4' order by id desc limit 8"))?>
                        @foreach ($data4 as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-kesejahteraanmasyarakat" role="tabpanel"
                    aria-labelledby="nav-kesejahteraanmasyarakat-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data5 = DB::select(DB::raw("select * from beritafoto where catID = '$param4' order by id desc limit 8"))?>
                        @foreach ($data5 as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover"  src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade show p-3 text-center" style="width: 100% !important" id="nav-umum" role="tabpanel"
                    aria-labelledby="nav-umum-tab">
                    <div class="owl-carousel owl-carousel-foto owl-theme mt-4 text-center" style="width: 100% !important">
                        <?php $data6 = DB::select(DB::raw("select * from beritafoto where catID = '$param5' order by id desc limit 8"))?>
                        @foreach ($data6 as $datas)
                        <div style="width: 100%; display: flex !important; justify-content: center;">
                            <div style="width: 20rem; height: 300%;" class="card">
                                @if ($datas->img != null || $datas->img != "")
                                <img  height ="300px !important" width="300px !important" style="object-fit: cover" src="{{ asset('storage/beritafoto/'.$datas->img) }}" class="card-img-top" alt="...">
                                @else
                                <img height ="300px !important" width="300px !important" style="object-fit: cover" src="../assets/images/noimage.png" class="card-img-top" alt="...">
                                @endif
                                <div class="overlay">
                                <p id="foto" data-bs-toggle="modal" data-title="{{ $datas->judul }}" data-time="{{ \Carbon\Carbon::parse($datas->time)->isoFormat('dddd, D MMMM Y') }}"
                                    data-bs-target="#exampleModal3" data-img="{{ $datas->img }}" data-img_2="{{ $datas->img_2 }}" data-img_3="{{ $datas->img_3 }}" data-img_4="{{ $datas->img_4 }}" class="card-text" type="button" style="text-decoration:none">{{ $datas->judul }}</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-block">
                <div class="d-flex">
                    <b class="modal-title" id="berita-foto-title">Judul</b>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <small class="modal-title" id="berita-foto-time">Tanggal</small>
            </div>
            <div class="modal-body">
                <img width="100%" height="100%" id="berita-foto-image">
                <hr>
                <div class="row mt-2">
                    <div class="col box container-berita-foto-1" style="display: none;"><img id="berita-foto-image_1" class="img-fluid detail-pic active-pic"></div>
                    <div class="col box container-berita-foto-2" style="display: none;"><img id="berita-foto-image_2" class="img-fluid detail-pic"></div>
                    <div class="col box container-berita-foto-3" style="display: none;"><img id="berita-foto-image_3" class="img-fluid detail-pic"></div>
                    <div class="col box container-berita-foto-4" style="display: none;"><img id="berita-foto-image_4" class="img-fluid detail-pic"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $('.detail-pic').click(function(){
            var image = $(this).attr('src');
            $('.detail-pic').removeClass('active-pic');
            $(this).addClass('active-pic');
            $('#berita-foto-image').fadeOut(250, function() {
                $('#berita-foto-image').attr('src', image);
            })
            .fadeIn(250);
        });
    </script>