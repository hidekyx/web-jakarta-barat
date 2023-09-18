<!DOCTYPE html>
@foreach ($data as $data)
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{strtoupper($data->title)}} - Kota Administrasi Jakarta Barat</title>
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

    <section>
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
                        <a href="/" style="text-decoration:none">Home </a>
                        <span style="color:#fff">/</span>
                        <a href="#" style="text-decoration:none">Pemerintahan </a>
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
            <div class="col-md-12">
                <h2 style="color:grey; font-family: poppins-light">
                    {{strtoupper($data->title)}}
                </h2>
                <hr style="color: orangered;" >
                <br>
            </div>

            <div>
                <table class="table table-striped">

                    <thead>
                        <tr>
                        <th>NO.</th>
                        <th>NAMA</th>
                        <th>JABATAN</th>
                        <th>PROFIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button style="background-color: RED;">PROFIL</button></td>
                        </tr>
                    </tbody>

                </table>
            </div>


        </div>
    </div>

    @include('panels.frontend1.Footer')
</body>
</html>

@endforeach






