<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Fasilitas Pendidikan - Kota Administrasi Jakarta Barat</title>
</head>
<style>
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
    .breadcrumbq a{
            color: white;
        }
        .breadcrumbq a:hover {
            color: #777;
        }

        .breadcrumbq .active{
            color: #777;
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
<marquee behavior="scroll" scrolldelay="10" scrollamount="10" direction="left" class="marquee">
    kantor WALIKOTA JAKARTA BARAT Tempat Kami Menumpahkan Segenap Pikiran & Tenaga Demi Kesejahteran Masyarakat
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
                                <a href="/pendidikan">Pendidikan</a>
                                <a href="/kesehatan">Kesehatan</a>
                                <a href="/pemadam">Pemadam Kebakaran</a>
                                <a href="/transportasi">Transportasi</a>
                                <a href="/olahraga">Olah Raga</a>
                                <a href="/perpustakaan">Perpustakaan</a>
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
                                    <a href="/pejabatteras">Pejabat Teras</a>
                                    <a href="/pejabateselon">Pejabat Eselon III</a>
                                    <a href="/camat">Camat</a>
                                    <a href="/lurah">Lurah</a>
                                    </div>
                                    <div class="columnq-three-col">
                                    <h3>BERITA SKPD/UKPD<hr></h3>
                                    <a href="/skpd">SKPD</a>
                                    <a href="/ukpd">UKPD</a>
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
                    <h3 style="color:orangered;">
                        PROFIL</h3>
                    <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                </div>
                <div class="col-md-6 text-right pt-5" style="text-align: right;">
                    <ul class="breadcrumbq">
                        <li>
                        <a href="/" style="text-decoration:none">Home </a>
                        <span style="color:#fff">/</span>
                        <a href="#" style="text-decoration:none">Pemerintahan </a>
                        <span style="color:#fff">/</span>
                        <span class="active">WalikotaTerdahulu</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </section>





    <div class="container pt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 style="color:grey; font-family: poppins-light">
                    FASILITAS PEMADAM KEBAKARAN
                </h2>
                <hr style="color: orangered;" >
                <br>
            </div>

            <div>
                <table class="table table-striped">
                    <th>NO.</th>
                    <th>NAMA</th>
                    <th>KEPALA/PEMIMPIN</th>
                    <th>ALAMAT</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
                    <th>WEBSITE</th>

                </table>
            </div>

        </div>
    </div>

    @include('panels.frontend1.Footer')
</body>
</html>
