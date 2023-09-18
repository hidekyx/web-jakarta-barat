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
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $(document).on('click', '#detail', function(){
                console.log("try");
                  var header = 'PROFIL ' + $(this).data('header');
                  var nama = $(this).data('nama');
                  if($(this).data('alamat') == ""){
                    var alamat = '-';
                  } else {
                    var alamat = $(this).data('alamat');
                  }
                  if($(this).data('telp') == ""){
                    var telp = '-';
                  } else {
                    var telp = $(this).data('telp');
                  }
                  if($(this).data('email') == ""){
                    var email = '-';
                  } else {
                    var email = $(this).data('email');
                  }
                  var foto = $(this).data('foto');
                  var profil = $(this).data('profil');
                  $('#header').text(header);
                  $('#nama').text(nama);
                  $('#alamat').text(alamat);
                  $('#telp').text(telp);
                  $('#email').text(email);
                  $('#foto').attr("src", foto);
                  $('#profil').html(profil);
                  console.log('nama');
                })
            })
        </script>


        <title>Struktur PPID - Kota Administrasi Jakarta Barat</title>
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
.e802_78 {
	width:1003px;
	height:558.5333251953125px;
	position:absolute;
}
.e801_73 {
	transform: rotate(90.00000421341525deg);
	width:27px;
	height:0px;
	position:absolute;
	left:118px;
	top:401px;
}
.801_73 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_67 {
	transform: rotate(90.0000036732339deg);
	width:31px;
	height:0px;
	position:absolute;
	left:118px;
	top:276px;
}
.801_67 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_57 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:387.82666015625px;
	top:0px;
}
.e801_12 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_15 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_13 {
	color:rgba(0, 0, 0, 1);
	width:113px;
	height:22px;
	position:absolute;
	left:62.17333984375px;
	top:13px;
	font-family:Poppins;
	text-align:left;
	font-size:18px;
	letter-spacing:0;
}
.e801_14 {
	color:rgba(0, 0, 0, 1);
	width:206.10667419433594px;
	height:21.239999771118164px;
	position:absolute;
	left:15.17333984375px;
	top:60px;
	font-family:Poppins;
	text-align:left;
	font-size:14px;
	letter-spacing:0;
}
.e801_56 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:387.82666015625px;
	top:141.5999755859375px;
}
.e801_16 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_17 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_18 {
	color:rgba(0, 0, 0, 1);
	width:103px;
	height:21px;
	position:absolute;
	left:67.17333984375px;
	top:12.4000244140625px;
	font-family:Poppins;
	text-align:left;
	font-size:18px;
	letter-spacing:0;
}
.e801_19 {
	color:rgba(0, 0, 0, 1);
	width:226px;
	height:17px;
	position:absolute;
	left:5.17333984375px;
	top:57.4000244140625px;
	font-family:Poppins;
	text-align:left;
	font-size:13px;
	letter-spacing:0;
}
.e801_50 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:306.800048828125px;
}
.e801_26 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_27 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_28 {
	color:rgba(0, 0, 0, 1);
	width:202.17333984375px;
	height:21.239999771118164px;
	position:absolute;
	left:17px;
	top:15.199951171875px;
	font-family:Poppins;
	text-align:left;
	font-size:14px;
	letter-spacing:0;
}
.e801_29 {
	color:rgba(0, 0, 0, 1);
	width:223.413330078125px;
	height:31.46666717529297px;
	position:absolute;
	left:6.293333530426025px;
	top:51.92000198364258px;
	font-family:Poppins;
	text-align:center;
	font-size:10px;
	letter-spacing:0;
}
.e801_52 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:511.33349609375px;
	top:306.800048828125px;
}
.e801_34 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_35 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_36 {
	color:rgba(0, 0, 0, 1);
	width:215.54666137695312px;
	height:21.239999771118164px;
	position:absolute;
	left:12.58666706085205px;
	top:13.373332977294922px;
	font-family:Poppins;
	text-align:left;
	font-size:14px;
	letter-spacing:0;
}
.e801_37 {
	color:rgba(0, 0, 0, 1);
	width:177px;
	height:31px;
	position:absolute;
	left:32.66650390625px;
	top:52.199951171875px;
	font-family:Poppins;
	text-align:center;
	font-size:11px;
	letter-spacing:0;
}
.e801_58 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:767px;
	top:306.800048828125px;
}
.e801_38 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_39 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_40 {
	color:rgba(0, 0, 0, 1);
	width:185.65333557128906px;
	height:42.47999954223633px;
	position:absolute;
	left:25.1733341217041px;
	top:4.71999979019165px;
	font-family:Poppins;
	text-align:center;
	font-size:14px;
	letter-spacing:0;
}
.e801_41 {
	color:rgba(0, 0, 0, 1);
	width:229px;
	height:16px;
	position:absolute;
	left:4px;
	top:56.199951171875px;
	font-family:Poppins;
	text-align:center;
	font-size:11px;
	letter-spacing:0;
}
.e801_59 {
	width:239.96009826660156px;
	height:94.4000015258789px;
	position:absolute;
	left:376px;
	top:464.13330078125px;
}
.e801_42 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:3.9600977897644043px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_43 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:3.9600977897644043px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_44 {
	color:rgba(0, 0, 0, 1);
	width:200.60000610351562px;
	height:21.239999771118164px;
	position:absolute;
	left:22.053430557250977px;
	top:12.58666706085205px;
	font-family:Poppins;
	text-align:center;
	font-size:14px;
	letter-spacing:0;
}
.e801_45 {
	color:rgba(0, 0, 0, 1);
	width:238px;
	height:42px;
	position:absolute;
	left:0px;
	top:48.86669921875px;
	font-family:Poppins;
	text-align:center;
	font-size:9px;
	letter-spacing:0;
}
.e801_51 {
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:255.66650390625px;
	top:306.800048828125px;
}
.e801_30 {
	background-color:rgba(167.00000524520874, 231.00000143051147, 240.00000089406967, 1);
	width:236px;
	height:94.4000015258789px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_31 {
	background-color:rgba(88.00000235438347, 195.0000035762787, 220.00000208616257, 1);
	width:236px;
	height:47.20000076293945px;
	position:absolute;
	left:0px;
	top:0px;
	border-top-left-radius:10px;
	border-top-right-radius:10px;
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
}
.e801_32 {
	color:rgba(0, 0, 0, 1);
	width:221.83999633789062px;
	height:21.239999771118164px;
	position:absolute;
	left:7.079999923706055px;
	top:15.733333587646484px;
	font-family:Poppins;
	text-align:left;
	font-size:14px;
	letter-spacing:0;
}
.e801_33 {
	color:rgba(0, 0, 0, 1);
	width:170px;
	height:31px;
	position:absolute;
	left:39.33349609375px;
	top:52.199951171875px;
	font-family:Poppins;
	text-align:center;
	font-size:11px;
	letter-spacing:0;
}
.e801_62 {
	transform: rotate(90.0000036732339deg);
	width:48px;
	height:0px;
	position:absolute;
	left:506px;
	top:94px;
}
.801_62 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_63 {
	transform: rotate(90.00000280894356deg);
	width:40px;
	height:0px;
	position:absolute;
	left:506px;
	top:236px;
}
.801_63 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_69 {
	transform: rotate(90.00000311426359deg);
	width:36px;
	height:0px;
	position:absolute;
	left:498px;
	top:428px;
}
.801_69 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_70 {
	transform: rotate(90.00000421341525deg);
	width:27px;
	height:0px;
	position:absolute;
	left:632px;
	top:401px;
}
.801_70 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_72 {
	transform: rotate(90.00000421341525deg);
	width:27px;
	height:0px;
	position:absolute;
	left:380px;
	top:401px;
}
.801_72 {
	border:3px solid rgba(0, 0, 0, 1);
}
.801_74 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_74 {
	width:767px;
	height:0px;
	position:absolute;
	left:118px;
	top:428px;
}
.e801_71 {
	transform: rotate(90.00000421341525deg);
	width:27px;
	height:0px;
	position:absolute;
	left:885px;
	top:401px;
}
.801_71 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_64 {
	transform: rotate(90.0000036732339deg);
	width:31px;
	height:0px;
	position:absolute;
	left:632px;
	top:276px;
}
.801_64 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_66 {
	transform: rotate(90.0000036732339deg);
	width:31px;
	height:0px;
	position:absolute;
	left:380px;
	top:276px;
}
.801_66 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_68 {
	transform: rotate(-1.4033419209422001e-14deg);
	width:767px;
	height:0px;
	position:absolute;
	left:118px;
	top:276px;
}
.801_68 {
	border:3px solid rgba(0, 0, 0, 1);
}
.e801_65 {
	transform: rotate(90.0000036732339deg);
	width:31px;
	height:0px;
	position:absolute;
	left:885px;
	top:276px;
}
.801_65 {
	border:3px solid rgba(0, 0, 0, 1);
}

.struktur{
}

.link-mobile{
    display: none;
}

@media screen and (max-width: 1000px) {
    .link-mobile{
        display: inline;
    }

    .struktur{
        display: none;
    }


}

        </style>
    <body>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="header"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <b id="nama"></b>
                  <br>
                  <b>Alamat : </b><b id="alamat"></b>
                  &nbsp;
                  &nbsp;
                  <b>Telp : </b><b id="telp"></b>
                  &nbsp;
                  &nbsp;
                  <b>Email : </b><b id="email"></b>
                  <hr>
                  <div class="text-center" style="pb-3">
                    <img id="foto" width="50%" height="50%" style="object-fit: cover; object-position: center">
                  </div>
                  <div id="profil"></div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
              </div>
            </div>
          </div>
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
                            <span class="active">Struktur</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </section>

        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col">
                    <h3 style="color:#b3b3b3">
                        Struktur PPID
                    </h3>
                    <hr style="color: orangered;" >
                    <br>

                    <div class="link-mobile">
                        <a href="/struktur-ppid">Lihat Struktur</a>
                    </div>

                    <div class="struktur">
                        <div class="e802_78">
                            <div class="e801_73"></div>
                            <div class="e801_67"></div>
                            <div class="e801_57">
                              <div class="e801_12"></div>
                              <div class="e801_15"></div><span  class="e801_13">Atasan PPID</span>
                              @foreach ($walkot as $data)
                                <a id="detail" type="button" class="btn btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                data-header="{{ $data->jabatan }}"
                                data-nama="{{ $data->nama }}"
                                data-alamat="{{ $data->alamat }}"
                                data-telp="{{ $data->telp }}"
                                data-email="{{ $data->email }}"
                                data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                                data-profil="{{ $data->profil }}"><span  class="e801_14">Walikota Adm. Jakarta Barat</span></a>
                              @endforeach
                            </div>
                            <div class="e801_56">
                              <div class="e801_16"></div>
                              <div class="e801_17"></div><span  class="e801_18">Ketua PPID</span>
                              @foreach ($sek as $data)
                                <a id="detail" type="button" class="btn btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                data-header="{{ $data->jabatan }}"
                                data-nama="{{ $data->nama }}"
                                data-alamat="{{ $data->alamat }}"
                                data-telp="{{ $data->telp }}"
                                data-email="{{ $data->email }}"
                                data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                                data-profil="{{ $data->profil }}"><span  class="e801_19">Seretaris Kota Adm. Jakarta Barat</span></a>
                              @endforeach
                            </div>
                            <div class="e801_50">
                              <div class="e801_26"></div>
                              <div class="e801_27"></div><span  class="e801_28">Bidang Pelayanan Informasi</span>
                              @foreach ($bag1 as $data)
                              <a id="detail" type="button" class="btn btn-danger"
                              data-bs-toggle="modal"
                              data-bs-target="#exampleModal"
                              data-header="{{ $data->jabatan }}"
                              data-nama="{{ $data->nama }}"
                              data-alamat="{{ $data->alamat }}"
                              data-telp="{{ $data->telp }}"
                              data-email="{{ $data->email }}"
                              data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                              data-profil="{{ $data->profil }}"><span  class="e801_29">Bagian Keegawaian, Tata Laksana dan Pelayanan Publik Setko Adm. Jakarta Barat</span></a>
                            @endforeach
                            </div>
                            <div class="e801_52">
                              <div class="e801_34"></div>
                              <div class="e801_35"></div><span  class="e801_36">Bidang Pengelolaan Informasi</span>
                              @foreach ($bag2 as $data)
                              <a id="detail" type="button" class="btn btn-danger"
                              data-bs-toggle="modal"
                              data-bs-target="#exampleModal"
                              data-header="{{ $data->jabatan }}"
                              data-nama="{{ $data->nama }}"
                              data-alamat="{{ $data->alamat }}"
                              data-telp="{{ $data->telp }}"
                              data-email="{{ $data->email }}"
                              data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                              data-profil="{{ $data->profil }}"><span  class="e801_37">Bagian Tata Pemerintahan Setko Adm. Jakarta Barat</span></a>
                            @endforeach
                            </div>
                            <div class="e801_58">
                              <div class="e801_38"></div>
                              <div class="e801_39"></div><span  class="e801_40">Bidang Penyelesaian
                          Sengketa Informasi Publik</span>
                          @foreach ($bag3 as $data)
                          <a id="detail" type="button" class="btn btn-danger"
                          data-bs-toggle="modal"
                          data-bs-target="#exampleModal"
                          data-header="{{ $data->jabatan }}"
                          data-nama="{{ $data->nama }}"
                          data-alamat="{{ $data->alamat }}"
                          data-telp="{{ $data->telp }}"
                          data-email="{{ $data->email }}"
                          data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                          data-profil="{{ $data->profil }}"><span  class="e801_41">Bagian Hukum Setko Adm Jakarta Barat</span></a>
                        @endforeach
                            </div>
                            <div class="e801_59">
                              <div class="e801_42"></div>
                              <div class="e801_43"></div><span  class="e801_44">Petugas Data dan Informasi</span>
                              <a ><span  class="e801_45">Ka. Sudis Kominfotik Kota Adm. Jakarta Barat
                                <br>
                        Para Kepala Bagian Setko Adm. Jakarta Barat <br>
                        Para Ka. Sub Bagian Setko Adm. Jakarta Barat</span></a>
                            </div>
                            <div class="e801_51">
                              <div class="e801_30"></div>
                              <div class="e801_31"></div><span  class="e801_32">Bidang Dokumentasi dan Arsip</span>
                              @foreach ($bag4 as $data)
                              <a id="detail" type="button" class="btn btn-danger"
                              data-bs-toggle="modal"
                              data-bs-target="#exampleModal"
                              data-header="{{ $data->jabatan }}"
                              data-nama="{{ $data->nama }}"
                              data-alamat="{{ $data->alamat }}"
                              data-telp="{{ $data->telp }}"
                              data-email="{{ $data->email }}"
                              data-foto="{{ asset('storage/pejabat/'.$data->img) }}"
                              data-profil="{{ $data->profil }}"><span  class="e801_33">Bagian Umum dan Protokol Setko Adm. Jakarta Barat</span></a>
                            @endforeach
                            </div>
                            <div class="e801_62"></div>
                            <div class="e801_63"></div>
                            <div class="e801_69"></div>
                            <div class="e801_70"></div>
                            <div class="e801_72"></div>
                            <div class="e801_74"></div>
                            <div class="e801_71"></div>
                            <div class="e801_64"></div>
                            <div class="e801_66"></div>
                            <div class="e801_68"></div>
                            <div class="e801_65"></div>
                          </div>


                        <div >
                            <img  src="../assets/images/struktur.png" alt="">
                        </div>
                    </div>

            </div>

                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    </body>
    </html>

    @include('panels.frontend1.Footer')
