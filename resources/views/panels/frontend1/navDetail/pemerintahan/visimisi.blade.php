<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@include('layouts.disabilitas')
<!DOCTYPE html>

@foreach ($data as $data)
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
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>



        <title>{{strtoupper($data->title)}} - Kota Administrasi Jakarta Barat</title>
    </head>
    <style>
        .blogq{
            font-family: 'Poppins';
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
    <body style="font-family: 'Poppins';">
        @include('panels.frontend1.nav')
        <section>
            <div class="jumbotronq" style="weight: 500px">
            <div class="container">
                <div class="row row mt20 mb30">
                    <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                        <h3 style="color:orangered;">PEMERINTAHAN</h3>
                        <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                    </div>
                    <div class="col-md-6 text-right pt-5" style="text-align: right;">
                        <ul class="breadcrumbq">
                            <li>
                            <a href="/" style="text-decoration:none">Home </a>
                            <span style="color:#fff">/</span>
                            <a href="#" style="text-decoration:none">Profil </a>
                            <span style="color:#fff">/</span>
                            <span class="active">{{$data->title}}</span>
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
                        {{strtoupper($data->title)}}
                    </h3>
                    <hr style="color: orangered;" >
                    <br>
                    @foreach ($profil as $profil)
                            <p class="blogq" style="color: #747474;">
                                {!! $profil->konten !!}
                            </p>
                    @endforeach
                    {{-- <p class="blogq" style="color: #747474;">
                        <span>  Kota Administrasi adalah pembagian wilayah Administrasi di Indonesia Provinsi DKI
                                Jakarta terdapat 5 kota Administrasi yaitu Jakarta Barat, Jakarta timur,
                                Jakarta Utara, Jakarta Selatan dan Jakarta Pusat yang hanya berada di Provinsi
                                DKI Jakarta serta 1 Kabupaten Administrasi yaitu Kabupaten Kepulauan Seribu
                                yang dipimpin oleh seorang Bupati.
                                <br>
                                Berbeda dengan kota-kota lain di Indonesia,
                                kota administrasi bukanlah daerah otonom. Kota Administrasi dipimpin oleh
                                seorang Walikota dan dibantu oleh Wakil Walikota yang diangkat oleh Gubernur
                                dari kalangan Pegawai Negeri Sipil (PNS). Perangkat daerah Kota Administrasi
                                terdiri atas Sekretariat Kota Administrasi, Suku Dinas, lembaga teknis lain,
                                kecamatan dan kelurahan.
                                <br>
                        </span>
                            <br>
                            Kota Administrasi Jakarta Barat mempunyai luas wilayah : 12.615,14 Ha dan terletak
                            antara 106 - 48 BT, 60 - 12 LU dan dibatasi oleh wilayah sebagai berikut:
                            Sebelah Selatan: Kota Administrasi Jakarta Selatan dan Kabupaten/Kodya
                            Tangerang, Sebelah Barat: Kabupaten dan Kotamadya Tangerang, Sebelah Timur:
                            Kota Administrasi Jakarta Utara dan Kota Administrasi Jakarta Pusat, sedangkan
                            Sebelah Utara: Kabupaten/Kota Madya Tangerang dan Kota Administrasi Jakarta
                            Utara. Jakarta Barat mempunyai 8 Kecamatan, 56 Kelurahan, 578 Rukun Warga,
                            6.348 Rukun Tetangga.
                            <br><br>
                            Dari segi personilnya, Walikota Jakarta Barat mempunyai
                            10.589 orang Pegawai yang terdiri dari: 1. Pegawai Pemerintahan : 3.364 orang
                            2. Guru SD, SLTP, SLTA 6.537 orang 3. Medis dan Paramedis 688 orang. Jakarta Barat
                            mempunyai visi agar terwujudnya Kota Administrasi Jakarta Barat sebagai Kota
                            jasa yang nyaman dan sejahtera. Dan misi untuk membangun tata pemerintahan yang
                            baik guna terwujudnya kota jasa dan wisata budaya dan sejarah. Meningkatkan
                            kualitas lingkungan perkotaan yang berkelanjutan dan memberdayakan masyarakat
                            dengan mengembangkan nilai, norma serta pranata sosial, guna meningkatkan
                            kualitas pelayanan masyarakat.
                            <br><br>
                            Motto Jakarta Barat adalah "Kampung Kite
                            Kalo Bukan Kite Nyang Ngurusin Siape Lagi" Motto ini mempunyai makna dan
                            harapan akan besarnya rasa tanggung jawab dan rasa cinta warga masyarakat pada
                            Kota Administrasi Jakarta Barat yang diwujudkan dengan peran serta dan
                            kerjasama yang erat dan terpadu antara pemerintah, pihak swasta dan masyarakat
                            dalam memajukan pembangunan kota disegala bidang demi kesejahteraan semua
                            masyarakat termasuk bersama-sama untuk menjaga dan menciptakan lingkungan yang
                            aman, tertib dan bersih. Dengan ini juga sarat makna yang sangat disadari bahwa
                            kitalah yang menentukan keberhasilan itu semua dengan segala daya dan upaya
                            kita sendiri.
                            <br><br>
                            Pemerintah Kota Administrasi Jakarta Barat mempunyai 59 Unit
                            Kerja Perangkat Daerah (UKPD) yang membantu dalam penyelenggaraan pemerintah di
                            wilayah Jakarta Barat. Salah satunya adalah Suku Dinas Komunikasi , Informatika
                            dan Statistik yang beralamat di Kantor Walikota Jakarta Barat Jalan Kembangan
                            Raya No. 2 Kelurahan Kembangan Utara, Kecamatan Kembangan, Jakarta Barat,
                            11610.

                            Peraturan
                            Pemerintah Nomor : 25 Tahun 1978, wilayah DKI Jakarta di bagi menjadi 5 (lima)
                            wilayah kota administrasif. Wilayah kotamadya Jakarta Barat merupakan salah
                            satu bagian yang memiliki kedudukan setingkat dengan Kotamadya Tingkat II.
                            Walikotamadya yang bertanggungjawab langsung kepada Gubernur KDKI Jakarta
                            Berdasarkan Penetapan Presiden RI No.2 Tahun 1961 tentang Pemerintahan DKI
                            Jakarta dan Penjelasan Undang-undang No. 5 Tahun 1974 tentang pokok-pokok
                            pemerintah di daerah, bahwa tugas, wewenang dan kewajiban Walikotamadya adalah
                            menjalankan Pemerintahan pembangunan dan pembinaan kemasyarakatan dalam
                            wilayah.
                            <br><br>
                            Tugas-tugas tersebut meliputi bidang pemerintahan, ketentraman dan
                            ketertiban, kesejahteraan masyarakat, sosial politik, agama, tenaga kerja,
                            pendidikan, pemudan dan olah raga. Kependudukan perekonomian dan pembangunan
                            fisik prasarana lingkungan serta bidang-bidang lain yang ditetapkan oleh
                            Gubernur Kepala daerah Khusus Ibukota Jakarta. Pemukiman di daerah sangat padat
                            penduduk seperti Kelurahan Kali Anyar sudah tidak layak huni dan tidak memenuhi
                            persyaratan kesehatan. Mata pencaharian penduduk Kodya Jakarta Barat:
                            <br>
                            Pertanian: 1.02 %
                            <br>
                            Pertambangan : 0.30 %
                            <br>
                            Industri : 23.24 %
                            <br>
                            Listrik/gas/air minum : 1.17 %
                            <br>
                            Perdagangan : 33.28 %
                            <br>
                            Angkutan dan Komunikasi : 6.22 %
                            <br>
                            Keuangan/Asuransi : 3.47 %
                            <br>
                            Bagunan : 5.66 %
                            <br>
                            Jasa dan Lainnya : 25.64 %
                    </p> --}}
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

        @include('panels.frontend1.Footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>


    @endforeach
