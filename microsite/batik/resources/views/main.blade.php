<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- meta tag -->
        <meta charset="utf-8" />
        <title>Kominfotik Jakarta Barat</title>
        <meta name="description" content="" />
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/assets/images/fav.png') }}" />
        <!-- Bootstrap  v5.1.3 css -->
        <link rel="stylesheet" href="{{ asset('storage/assets/css/bootstrap.min.css') }}"/>
        <!-- Sall css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/sal.css') }}" />
        <!-- magnific css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/magnific-popup.css') }}" />
        <!-- Swiper Slider css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/swiper.min.css') }}"  />
        <!-- Bootstrap selectpicker css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/bootstrap-select.css') }}">
        <!-- Remixicon Fonts css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/ico-fonts.css') }}" />
        <!-- Remixicon Fonts css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/odometer.min.css') }}"/>
        <!-- Font Awesome Icons css -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Glightbox css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/assets/css/style.css') }}" />
    </head>
    <body>
    @if(Session::has('download_resi'))
        <meta http-equiv="refresh" content="2; url={{ Session::get('download_resi') }}">
    @endif
        <!-- preloader -->
        <div id="preloader" class="preloader">
            <div class="animation-preloader">
                <div class="spinner">
                    <div class="loader-icon">
                        <img src="{{ asset('storage/assets/images/fav.png') }}" style="height: 70px;" alt="BATIK" />
                    </div>
                </div>
                <div class="txt-loading">
                    <span data-text-preloader="B" class="letters-loading"> B </span>
                    <span data-text-preloader="A" class="letters-loading"> A </span>
                    <span data-text-preloader="T" class="letters-loading"> T </span>
                    <span data-text-preloader="I" class="letters-loading"> I </span>
                    <span data-text-preloader="K" class="letters-loading"> K </span>
                </div>
                <p class="text-center">Bantuan Teknologi Informasi dan Komunikasi</p>
            </div>
        </div>

        @isset($detail_page)
            @include('layanan.layanan_detail')
        @else
            @include('header')
            @if($page == "Home")
                @include('home.slider')
                @include('home.seksi')
                @include('home.layanan')
                @include('home.faq')
                @if($berita != null)
                    @include('home.berita')
                @endif
            @elseif($page == "Layanan Astik")
                @isset($subpage)
                    @include('breadcrumb')
                    @if($subpage == "Form Layanan Aplikasi Siber dan Statistik")
                        @include('layanan.astik_layanan_input')
                    @elseif($subpage == "Form Layanan Aplikasi Siber dan Statistik - Optimalisasi")
                        @include('layanan.astik_layanan_input_optimalisasi')
                    @elseif($subpage == "Security Awareness")
                        @include('layanan.astik_secaw')
                    @elseif($subpage == "Statistik")
                        @include('layanan.astik_statistik')
                    @endif
                @endisset
            @elseif($page == "Layanan KIP")
                @isset($subpage)
                    @include('breadcrumb')
                    @if($subpage == "Form Layanan Komunikasi dan Informasi Publik")
                        @include('layanan.kip_layanan_input')
                    @endif
                @endisset
            @elseif($page == "Layanan ID")
                @isset($subpage)
                    @include('breadcrumb')
                    @if($subpage == "Form Layanan Infrastruktur Digital")
                        @include('layanan.id_layanan_input')
                    @endif
                @endisset
            @elseif($page == "Layanan")
                @isset($subpage)
                    @include('breadcrumb')
                    @if($subpage == "Cek Status Layanan")
                        @include('layanan.layanan_cek')
                    @elseif($subpage == "Cek Status Detail")
                        @include('layanan.layanan_detail')
                    @endif
                @endisset
            @endif
            @include('footer')
            @include('mobile_navigation')
        @endisset
        
        <!-- Search Modal Start -->
        <div aria-hidden="true" id="search-modal" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="30px" height="30px">
                    <path
                        d="M 9.15625 6.3125 L 6.3125 9.15625 L 22.15625 25 L 6.21875 40.96875 L 9.03125 43.78125 L 25 27.84375 L 40.9375 43.78125 L 43.78125 40.9375 L 27.84375 25 L 43.6875 9.15625 L 40.84375 6.3125 L 25 22.15625 Z"
                    />
                </svg>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="icon-angle_right"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- start scrollUp  -->
        <div class="boxfin-scroll-top progress-done">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path
                    d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="
                        transition: stroke-dashoffset 10ms linear 0s;
                        stroke-dasharray: 307.919px, 307.919px;
                        stroke-dashoffset: 71.1186px;
                    "
                ></path>
            </svg>
            <div class="boxfin-scroll-top-icon">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    role="img"
                    width="1em"
                    height="1em"
                    viewBox="0 0 24 24"
                    data-icon="mdi:arrow-up"
                    class="iconify iconify--mdi"
                >
                    <path
                        fill="currentColor"
                        d="M13 20h-2V8l-5.5 5.5l-1.42-1.42L12 4.16l7.92 7.92l-1.42 1.42L13 8v12Z"
                    ></path>
                </svg>
            </div>
        </div>
        <!-- End scrollUp  -->
    </body>
    <!-- jquery.min js -->
    <script src="{{ asset('storage/assets/js/jquery.min.js') }}"></script>
    <!-- modernizr.js -->
    <script src="{{ asset('storage/assets/js/modernizr-2.8.3.min.js') }}"></script>
    <!-- Bootstrap.min js -->
    <script src="{{ asset('storage/assets/js/bootstrap.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="{{ asset('storage/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- magnific.min js -->
    <script src="{{ asset('storage/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Swiper.min js -->
    <script src="{{ asset('storage/assets/js/swiper.min.js') }}"></script>
    <!-- bootstrap selectpicker js -->
    <script src="{{ asset('storage/assets/js/bootstrap-select.js') }}"></script>
    <!-- appear js -->
    <script src="{{ asset('storage/assets/js/jquery.appear.min.js') }}"></script>
    <!-- odometer js -->
    <script src="{{ asset('storage/assets/js/odometer.min.js') }}"></script>
    <!-- sal js -->
    <script src="{{ asset('storage/assets/js/sal.js') }}"></script>
    <!-- glightbox js -->
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <!-- main js -->
    <script src="{{ asset('storage/assets/js/main.js') }}"></script>
    @stack('scripts')
</html>