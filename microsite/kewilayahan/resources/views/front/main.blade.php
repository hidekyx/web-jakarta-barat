<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="{{ $kewilayahan->nama }}" />
    <meta name="description" content="{{ $kewilayahan->nama }} | {{ $page }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/assets/img/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $kewilayahan->nama }} | {{ $page }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/front-assets/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/front-assets/css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/front-assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/front-assets/plugins/datatables/datatables.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('storage/front-assets/plugins/glightbox/glightbox.min.css') }}" />
</head>

<body>
    <div class="body-inner">
        @if($page == "Beranda")
            @include('front.header')
            @isset($data['foto-keperluan-website'])
                @include('front.slider')
            @endisset
            @isset($data['perangkat']['profil-pimpinan'])
                @include('front.pimpinan')
            @endisset
            @include('front.profil')
            @include('front.peta')
            @if(count($data['berita']))
                @include('front.berita')
            @endif
            @include('front.footer')
        @elseif($page == "Perangkat")
            @include('front.header')
            @include('front.breadcrump')
            @include('front.detail_perangkat')
            @include('front.footer')
        @elseif($page == "Ppid")
            @include('front.header')
            @include('front.breadcrump')
            @include('front.detail_ppid')
            @include('front.footer')
        @elseif($page == "Informasi Wilayah")
            @include('front.header')
            @include('front.breadcrump')
            @include('front.detail_informasi')
            @include('front.footer')
        @elseif($page == "Layanan Publik")
            @include('front.header')
            @include('front.breadcrump')
            @include('front.detail_layanan')
            @include('front.footer')
        @elseif($page == "Berita - List")
            @include('front.header')
            @include('front.berita_breadcrump')
            @include('front.berita_list')
            @include('front.footer')
        @endif
    </div>
    
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <script src="{{ asset('storage/front-assets/js/jquery.js') }}"></script>
    <script src="{{ asset('storage/front-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('storage/front-assets/js/functions.js') }}"></script>
    <script src="{{ asset('storage/front-assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('storage/front-assets/plugins/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('storage/front-assets/plugins/particles/particles.js') }}"></script>
    <script src="{{ asset('storage/front-assets/plugins/particles/particles-stars.js') }}"></script>
    <script src="https://barat.jakarta.go.id/kominfotik/storage/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="https://barat.jakarta.go.id/kominfotik/storage/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        const LightboxDetail = GLightbox({
            selector: '.lightbox-detail',
            width: '1000px',
            height: '55vh'
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        } );
    </script>
</body>

</html>