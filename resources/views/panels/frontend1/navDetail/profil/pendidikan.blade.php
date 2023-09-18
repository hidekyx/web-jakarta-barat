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

        <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
        type = "image/x-icon">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Fasilitas {{ $data->title }} - Kota Administrasi Jakarta Barat</title>
</head>
<style>
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
                        <span class="active">{{$data->title}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    </section>

    <div class="container pt-5" style="font-family: 'Poppins';">
        <div class="row" style="width: 100% !important">
            <div class="col-md-12">
                <h2 style="color:grey; font-family: poppins-light">
                    FASILITAS {{ strtoupper($data->title) }}
                </h2>
                <hr style="color: orangered;" >
                <br>
            </div>

            <div style="width: 100% !important; overflow-x: auto !important;">
                <table class="table table-striped" style="width: 100% !important;">
                <tr>
                    <th>NO.</th>
                    <th>NAMA</th>
                    <th>KEPALA/PEMIMPIN</th>
                    <th>ALAMAT</th>
                    <th>TELP</th>
                    <th>EMAIL</th>
                    <th>WEBSITE</th>
                </tr>
                @foreach ($content as $index => $item)
                <tr>
                    <td>{{ $item->nomor }}</td>
                    <td>{{ $item->nama }}</td>
                    @if ($item->pimpinan != null)
                        <td>{{ $item->pimpinan }}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    @if ($item->alamat != null)
                        <td>{{ $item->alamat }}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    @if ($item->telp != null)
                        <td>{{ $item->telp }}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    @if ($item->email != null)
                        <td>{{ $item->email }}</td>
                    @else
                        <td class="text-center">-</td>
                    @endif
                    @if ($item->website != null)
                        <td>{{ $item->website }}</td>
                    @else
                        <td class="text-center">-</td>
                    </tr>
                    @endif
                @endforeach
                </table>
                    <script>
                        $(document).ready(function(){
                            $('#tabel-data').DataTable();
                        });
                    </script>
                    Current Page: {{ $content->currentPage() }}<br>
        			Jumlah Data: {{ $content->total() }}<br>
        			Data perhalaman: {{ $content->perPage() }}<br>
                    <br>
                    <div style="max-width: 100% !important">
                        {{ $content->links()}}
                    </div>
            </div>

        </div>
    </div>

    @include('panels.frontend1.Footer')

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>

</script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>

@endforeach
