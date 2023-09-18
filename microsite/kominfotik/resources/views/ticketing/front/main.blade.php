<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Barat Ticketing Network - Sudis Kominfotik Jakarta Barat</title>
<meta content="" name="description">
<meta content="" name="keywords">
<link href="storage/images/layanan/static/batik-b-light.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
<link href="{{ asset('storage/front-assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap-select.css') }}">
@if(Session::has('download_resi'))
    <meta http-equiv="refresh" content="2; url={{ Session::get('download_resi') }}">
@endif
</head>

<body>
@include('ticketing.front.header')
@include('ticketing.front.hero')
<main id="main">
@include('ticketing.front.faq')
@include('ticketing.front.layanan')
</main>
@include('ticketing.front.status')
@include('ticketing.front.footer')

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="{{ asset('storage/front-assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('storage/front-assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('storage/assets/js/bootstrap-select.js') }}"></script>
<script src="{{ asset('storage/front-assets/js/main.js') }}"></script>
@stack('scripts')
</body>

</html>
