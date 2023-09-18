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



        <title>Peta Wilayah</title>
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
    <marquee behavior="scroll" scrolldelay="10" scrollamount="5" direction="left" class="marquee">
        KANTOR WALIKOTA JAKARTA BARAT Tempat Kami Menumpahkan Segenap Pikiran & Tenaga Demi Kesejahteran Masyarakat
        </marquee>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container fw-bold">
                <a class="navbar-brand" href="/" style="color: rgb(0,0,0,.55);">JAKARTA BARAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdownq">
                            <a class="nav-link active" aria-current="page" href="#">PROFIL</a>
                            <div class="dropdown-contentq" style="width:100%;">
                                <div class="rowq">
                                    <div class="columnq">
                                    <h3>WILAYAH<hr></h3>
                                    <a href="/sejarah">Sejarah</a>
                                    <a href="/infrastruktur">Infrastruktur</a>
                                    <a href="/kependudukan">Kependudukan</a>
                                    <a href="/geografis">Letak Geografis</a>
                                    <a href="/peta">Peta Wilayah</a>
                                    </div>
                                    <div class="columnq">
                                    <h3>KECAMATAN & KELURAHAN<hr></h3>
                                    <a href="#">Kecamatan Cengkareng</a>
                                    <a href="#">Kecamatan Grogol Petamburan</a>
                                    <a href="#">Kecamatan Kalideres</a>
                                    <a href="#">Kecamatan Kebon Jeruk</a>
                                    <a href="#">Kecamatan Kembangan</a>
                                    <a href="#">Kecamatan Palmerah</a>
                                    <a href="#">Kecamatan Taman Sari</a>
                                    <a href="#">Kecamatan Tambora</a>
                                    </div>
                                    <div class="columnq">
                                    <h3>FASILITAS<hr></h3>
                                    <a href="#">Pendidikan</a>
                                    <a href="#">Kesehatan</a>
                                    <a href="#">Pemadam Kebakaran</a>
                                    <a href="#">Transportasi</a>
                                    <a href="#">Olah Raga</a>
                                    <a href="#">Perpustakaan</a>
                                    </div>
                                    <div class="columnq">
                                    <h3>LAIN-LAIN<hr></h3>
                                    <a href="#">Prestasi</a>
                                    <a href="#">Kawasan Unggulan</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdownq">
                            <a class="nav-link" aria-current="page" href="#">PEMERINTAHAN</a>
                            <div class="dropdown-contentq withoutdesc" style="width:50%;">
                                <div class="rowq">
                                    <div class="columnq-three-col">
                                    <h3>PROFIL<hr></h3>
                                    <a href="/visimisi">Visi & Misi</a>
                                    <a href="/strukturorganisasi">Struktur Organisasi</a>
                                    <a href="/tugasfungsi">Tugas Fungsi</a>
                                    <a href="/rencanastrategis">Rencana Strategis</a>
                                    <a href="https://barat.jakarta.go.id/v15/IKU_JB.pdf">Indikator Kinerja Utama (IKU)</a>
                                    <a href="https://barat.jakarta.go.id/v15/PERKIN_RENKIN_JB_2020.pdf">Perjanjian Kinerja & Rencana Kinerja 2020</a>
                                    <a href="/walikotaterdahulu">Walikota Terdahulu</a>
                                    </div>
                                    <div class="columnq-three-col">
                                    <h3>PEJABAT<hr></h3>
                                    <a href="#">Pejabat Teras</a>
                                    <a href="#">Pejabat Eselon III</a>
                                    <a href="#">Camat</a>
                                    <a href="#">Lurah</a>
                                    </div>
                                    <div class="columnq-three-col">
                                    <h3>BERITA SKPD/UKPD<hr></h3>
                                    <a href="#">SKPD</a>
                                    <a href="#">UKPD</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdownq">
                            <a class="nav-link" aria-current="page" href="#">PELAYANAN</a>
                            <div class="dropdown-contentq" style="width:15%; margin-left:547px;">
                                <div class="rowq">
                                    <div class="columnq" style="width:100%; height: 120px;">
                                    <a href="#">Pelayanan PTSP</a>
                                    <a href="#">Pelayanan Malam Hari</a>
                                    <a href="#">Pelayanan Umum</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">AGENDA</a>
                        </li>


                        <li class="nav-item dropdownq">
                            <a class="nav-link" aria-current="page" href="#">PUBLIKASI</a>
                            <div class="dropdown-contentq" style="width:20%; margin-left:739px;">
                                <div class="rowq">
                                    <div class="columnq" style="width:100%; height: 180px;">
                                    <a href="#">Berita</a>
                                    <a href="#">Berita Foto</a>
                                    <a href="#">Berita Vidio</a>
                                    <a href="#">Jakarta Smart City CCTV</a>
                                    <a href="#">Survey Kepuasan Masyarakat</a>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="/panels/frontend/menu">LAYANAN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/panels/frontend/menu">AGENDA</a>
                        </li>


                        <li class="nav-item dropdownq">
                            <a class="nav-link" aria-current="page" href="#">PPID JAKARTA BARAT</a>
                            <div class="dropdown-contentq" style="width:20%; margin-left:1009px;">
                                <div class="rowq">
                                    <div class="columnq" style="width:100%;">
                                    <a href="#">Profil</a>
                                    <a href="#">Visi & Misi</a>
                                    <a href="#">Struktur</a>
                                    <a href="#">Hukum dan SOP</a>
                                    <a href="#">Maklumat</a>
                                    <a href="#">PPID Provinsi DKI Jakarta</a>
                                    <a href="#">Daftar Informasi Publik</a>
                                    <a href="#">Layanan PPID</a>
                                    <a href="#">Laporan Informasi</a>
                                    <a href="#">Formulir Permohonan Informasi</a>
                                    <a href="#">Kontak PPID Jakarta Barat</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/login">SKPD</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Profil </a>
                            <span style="color:#fff">/</span>
                            <span class="active">Peta Wilayah</span>
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
                        PETA WILAYAH
                    </h3>
                    <hr style="color: orangered;" >
                    <p class="blogq" style="color: #747474;">
                        <span></span>
                    </p>
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



        @include('panels.frontend1.Footer')

    </body>
    </html>
