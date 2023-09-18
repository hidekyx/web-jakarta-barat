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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">
    <title>{{strtoupper($data->title)}} - Kota Administrasi Jakarta Barat</title>
</head>
<script>
    $(document).ready(function(){
        $(document).on('click', '#detail', function(){
            var nama = $(this).data('nama');
            var jabatan = $(this).data('jabatan');
            var nip = $(this).data('nip');
            var instansi = $(this).data('instansi');
            var pangkat = $(this).data('pangkat');
            var agama = $(this).data('agama');
            var riwayat_pendidikan = $(this).data('riwayat_pendidikan');
            var riwayat_jabatan = $(this).data('riwayat_jabatan');
            var foto = $(this).data('photo-pejabat');
            if(nip == ''){
                $('.nip').hide();
            } else {
                $('.nip').show();
            }
            if(pangkat == ''){
                $('.pangkat').hide();
            } else {
                $('.pangkat').show();
            }
            if(agama == ''){
                $('.agama').hide();
            } else {
                $('.agama').show();
            }
            if(riwayat_pendidikan == ''){
                $('.riwayat_pendidikan').hide();
            } else {
                $('.riwayat_pendidikan').show();
            }
            if(riwayat_jabatan == ''){
                $('.riwayat_jabatan').hide();
            } else {
                $('.riwayat_jabatan').show();
            }
            $('#nama').text(nama);
            $('#nip').text(nip);
            $('#instansi').text(instansi);
            $('#pangkat').text(pangkat);
            $('#agama').text(agama);
            $('#jabatan').text(jabatan);
            $('#riwayat_jabatan').html(riwayat_jabatan);
            $('#riwayat_pendidikan').html(riwayat_pendidikan);
            $('#photo-pejabat').attr("src", foto);
        })
    })
</script>
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
    @include('panels.frontend1.nav')

    <section style="font-family: 'Poppins';">
        <div class="jumbotronq" style="weight: 500px">
        <div class="container">
            <div class="row row mt20 mb30">
                <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                    <h3 style="color:orangered;">
                        PEJABAT</h3>
                    <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                </div>
                <div class="col-md-6 text-right pt-5" style="text-align: right;">
                    <ul class="breadcrumbq">
                        <li>
                        <a href="/" style="text-decoration:none; color: white">Home </a>
                        <span style="color:#fff">/</span>
                        <a href="#" style="text-decoration:none; color: white">Pemerintahan </a>
                        <span style="color:#fff">/</span>
                        <span class="active" style="color: grey">{{$data->title}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </section>

    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <h2 style="color:grey; font-family: poppins-light">
                    {{strtoupper($data->title)}}
                </h2>
            </div>
            <div class="col-lg-6 col-md-12">
                <form class="form-inline w-100" method="get">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <select class="form-control" name="filter">
                            <option value="nama">Nama</option>
                            <option value="jabatan">Jabatan</option>
                            <option value="instansi">Instansi</option>
                        </select>
                    </div>
                    <input class="form-control" type="search" name="keyword" placeholder="Cari berdasarkan filter" aria-label="Search" required>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
                    
        <hr style="color: orangered;" >
        <br>
        <div>
            <table class="table table-striped" id="tabel-data">

                <thead>
                    <tr>
                    <th>NO.</th>
                    <th>NAMA</th>
                    <th>JABATAN</th>
                    <th>INSTANSI</th>
                    <th>PROFIL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pejabat as $data)
                        <tr>
                            <td>{{ $data->nomor}}</td>
                            <td>{{ $data->nama}}</td>
                            <td>{{ $data->jabatan}}</td>
                            <td>{{ $data->instansi}}</td>
                            <td><a id="detail" type="button" class="btn btn-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                                data-jabatan="{{ $data->jabatan }}"
                                data-nama="{{ $data->nama }}"
                                data-nip="{{ $data->nip }}"
                                data-instansi="{{ $data->instansi }}"
                                data-pangkat="{{ $data->pangkat }}"
                                data-agama="{{ $data->agama }}"
                                data-riwayat_pendidikan="{{ $data->riwayat_pendidikan }}"
                                data-riwayat_jabatan="{{ $data->riwayat_jabatan }}"
                                data-photo-pejabat="{{ asset('storage/pejabat/'.$data->img) }}"
                                data-profil="{{ $data->profil }}">PROFIL</a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <script>
                $(document).ready(function(){
                    $('#tabel-data').DataTable();
                });
            </script>
            Current Page: {{ $pejabat->currentPage() }}<br>
            Jumlah Data: {{ $pejabat->total() }}<br>
            <br>
            {{ $pejabat->links() }}
        </div>
    </div>

    @include('panels.frontend1.Footer')

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body" style="width: 100%">
            <div class="text-center">
                <img id="photo-pejabat" style="max-width: 300px; width:100%;" class="rounded">
                <h3 class="pt-2" id="nama"></h3>
                <hr>
            </div>
            <h6 class="text-uppercase text-xs font-weight-bolder">Jabatan</h6>
            <label class="text-body ms-3 w-80 mb-3" id="jabatan"></label>

            <div class="nip">
                <h6 class="text-uppercase text-xs font-weight-bolder">NIP / NRK</h6>
                <label class="text-body ms-3 w-80 mb-3" id="nip"></label>
            </div>

            <div class="instansi">
                <h6 class="text-uppercase text-xs font-weight-bolder">Instansi</h6>
                <label class="text-body ms-3 w-80 mb-3" id="instansi"></label>
            </div>

            <div class="pangkat">
                <h6 class="text-uppercase text-xs font-weight-bolder">Pangkat / Golongan</h6>
                <label class="text-body ms-3 w-80 mb-3" id="pangkat"></label>
            </div>

            <div class="agama">
                <h6 class="text-uppercase text-xs font-weight-bolder">Agama</h6>
                <label class="text-body ms-3 w-80 mb-3" id="agama"></label>
            </div>

            <div class="riwayat_pendidikan">
                <h6 class="text-uppercase text-xs font-weight-bolder">Riwayat Pendidikan</h6>
                <label class="text-body ms-3 w-80 mb-3" id="riwayat_pendidikan"></label>
            </div>

            <div class="riwayat_jabatan">
                <h6 class="text-uppercase text-xs font-weight-bolder">Riwayat Jabatan</h6>
                <label class="text-body ms-3 w-80 mb-0" id="riwayat_jabatan"></label>
            </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      {{-- script --}}

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>

@endforeach