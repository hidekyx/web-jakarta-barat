<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PPID - Kota Administrasi Jakarta Barat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('storage/assets/front/img/logo_jakbar.png') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('storage/assets/front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/assets/front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/assets/front/lib/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/assets/front/lib/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/assets/front/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ asset('storage/assets/front/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
</head>

@push('scripts')
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SFVQ73DL52"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SFVQ73DL52');
</script>
@endpush

<body>
    <!-- Loading Awal -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    @include('front.disabilitas')

    <!-- Header -->
    <div class="container-fluid position-relative p-0">
        @include('front.header')

        @if($page == "Beranda")
            @include('front.beranda.carousel')
        @else
            @include('front.hero')
        @endif
    </div>

    @if($page == "Beranda")
        @include('front.beranda.statistik')
        @include('front.beranda.tentang')
        @include('front.beranda.video')
        @include('front.beranda.layanan')
        @if($siaran_pers != null)
            @include('front.beranda.pers')
        @endif
        <!-- @include('front.beranda.kegiatan') -->
        @include('front.beranda.portal')
    @elseif($page == "Standar Layanan")
        @if($subpage == "Maklumat Informasi Publik")
            @include('front.layanan.maklumat')
        @elseif($subpage == "SOP PPID")
            @include('front.layanan.sop')
        @elseif($subpage == "Waktu dan Biaya Layanan")
            @include('front.layanan.waktubiaya')
        @elseif($subpage == "Kanal Layanan Informasi")
            @include('front.layanan.kanal')
        @elseif($subpage == "Kanal Pengaduan Resmi")
            @include('front.layanan.kanalpengaduan')
        @elseif($subpage == "Prosedur Permohonan Pelayanan Informasi")
            @include('front.layanan.prosedur_permohonan')
        @elseif($subpage == "Prosedur Pengajuan Keberatan Informasi")
            @include('front.layanan.prosedur_keberatan')
        @elseif($subpage == "Prosedur Permohonan Penyelesaian Sengketa Informasi")
            @include('front.layanan.prosedur_penyelesaian')
        @elseif($subpage == "Prosedur Penanganan Sengketa Informasi")
            @include('front.layanan.prosedur_penanganan')
        @elseif($subpage == "Form Permohonan Informasi Publik")
            @include('front.layanan.formpermohonan')
        @elseif($subpage == "Form Pengajuan Keberatan Informasi Publik")
            @include('front.layanan.formkeberatan')
        @elseif($subpage == "Status Permohonan Informasi Publik")
            @include('front.layanan.statuspermohonan')
        @elseif($subpage == "Status Pengajuan Keberatan Informasi Publik")
            @include('front.layanan.statuskeberatan')
        @endif
    @elseif($page == "Profil")
        @if($subpage == "Profil PPID Jakarta Barat")
            @include('front.profil.profil')
        @elseif($subpage == "Visi-Misi PPID")
            @include('front.profil.visimisi')
        @elseif($subpage == "Struktur Organisasi PPID")
            @include('front.profil.struktur')
        @elseif($subpage == "Tugas dan Fungsi PPID")
            @include('front.profil.tugasfungsi')
        @endif
    @elseif($page == "Dokumen Informasi Publik")
        @include('front.informasi.informasi')
        @include('front.footer')
    <!-- @elseif($page == "Berita")
        @include('front.berita.grid')
    @elseif($page == "Berita PPID")
        @include('front.berita.detail') -->
    @elseif($page == "Informasi Berkala" || $page == "Informasi Serta Merta" || $page == "Informasi Setiap Saat")
        @include('front.informasi.informasi_kategori')
    @elseif($page == "Laporan")
        @if($subpage == "Laporan PPID Jakarta Barat")
            @include('front.laporan.laporan')
        @elseif($subpage == "Laporan Statistik PPID Jakarta Barat")
            @include('front.laporan.statistik')
        @endif
    @elseif($page == "Survei Kepuasan Pelayanan")
        @include('front.survei.formsurvei')
    @elseif($page == "Siaran Pers")
        @include('front.pers.detail')
    @endif
    
    @include('front.footer')
    <a id="close" class="fadeInUp" data-wow-delay="0.3s" onclick="myFunction()"><img class="close-survey zoom" style="max-width: 30px;" src="{{ asset('storage/assets/front/img/Close.png') }}"></a>
    <a id="survei" class="fadeInUp" data-wow-delay="0.3s" href="{{ asset('/survei') }}" target="_blank"><img class="survey zoom" style="max-width: 70px;" src="{{ asset('storage/assets/front/img/Survei.png') }}"></a>
    <script>
    function myFunction() {
        document.getElementById("survei").style.display = "none";
        document.getElementById("close").style.display = "none";
    }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('storage/assets/front/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/lib/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('storage/assets/front/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>