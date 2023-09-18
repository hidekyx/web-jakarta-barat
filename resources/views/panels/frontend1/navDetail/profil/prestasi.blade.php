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
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>



        <title>{{strtoupper($data->title)}} - Kota Administrasi Jakarta Barat</title>
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
    @include('panels.frontend1.nav')

    <section>
        <div class="jumbotronq" style="weight: 500px">
        <div class="container">
            <div class="row row mt20 mb30">
                <div class="col-md-6 pt-4 text-left" style="text-align: left;">
                    <h3 style="color:orangered;">
                        {{strtoupper($data->title)}}</h3>
                    <p class="h5 alpha10" style="color: white">Kota Administrasi Jakarta Barat</p>
                </div>
                <div class="col-md-6 text-right pt-5" style="text-align: right;">
                    <ul class="breadcrumbq">
                        <li>
                        <a href="/" style="text-decoration:none">Home </a>
                        <span style="color:#fff">/</span>
                        <a href="#" style="text-decoration:none">Profil </a>
                        <span style="color:#fff">/</span>
                        <span class="active">{{strtoupper($data->title)}}</span>
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
                    {{strtoupper($data->title)}}
                </h2>
                <hr style="color: orangered;" >
                <br>
            </div>
        </div>
    </div>





    @include('panels.frontend1.Footer')
</body>
    </html>


    @endforeach
