<!--=========== Seksi Section Start =========-->
<div class="sc-service-section-four sc-pt-60 sc-pb-115 sc-md-pt-40 sc-md-pb-80 section-shape" id="seksi_container">
    <div class="container">
        <div class="sc-heading-area sc-mb-30 sc-md-mb-10 text-center">
            <span class="sub-title"><i class="icon-line"></i> Seksi Kominfotik JB </span>
            <h2 class="title">
                Kategori Layanan <span class="primary-color">BATIK</span>
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="300">
                <div class="sc-service-style-three sc-mb-25 text-center seksi_kip">
                    <i class="p-z-idex position-relative icomoon fa-solid fa-camera"></i>
                    <h4 class="title p-z-idex position-relative">
                        <a class="title">Komunikasi Informasi Publik</a>
                    </h4>
                    <p class="des p-z-idex position-relative">
                        Seksi Komunikasi dan Informasi Publik bertugas mengelola dan menyelenggarakan pelayanan komunikasi dan informasi publik
                    </p>
                    <div class="service-btn" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <a class="sc-service-btn mt-4"><i class="icon-sliuder-arrow2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="400">
                <div class="sc-service-style-three sc-mb-25 text-center seksi_id">
                    <i class="p-z-idex position-relative icomoon fa-solid fa-wifi"></i>
                    <h4 class="title p-z-idex position-relative">
                        <a class="title">Infrastruktur Digital</a>
                    </h4>
                    <p class="des p-z-idex position-relative">
                        Seksi Infrastruktur Digital melaksanakan layanan pengembangan jaringan intranet dan penggunaan akses internet
                    </p>
                    <div class="service-btn" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <a class="sc-service-btn mt-4"><i class="icon-sliuder-arrow2"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-sal="slide-up" data-sal-duration="800" data-sal-delay="500">
                <div class="sc-service-style-three sc-mb-25 text-center seksi_astik">
                    <i class="p-z-idex position-relative icomoon fa-sharp fa-solid fa-shield-halved"></i>
                    <h4 class="title p-z-idex position-relative">
                        <a class="title">Aplikasi Siber dan Statistik</a>
                    </h4>
                    <p class="des p-z-idex position-relative">
                        Seksi Aplikasi Siber dan Statistik melaksanakan pembinaan, pengawasan dan pengendalian di bidang Aplikasi, Siber dan Statistik
                    </p>
                    <div class="service-btn" style="position: absolute; top: 85%; left: 50%; transform: translate(-50%, -50%);">
                        <a class="sc-service-btn mt-4"><i class="icon-sliuder-arrow2"></i></a>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
                $('.seksi_astik').click(function(){
                    $('#layanan_kip_container').fadeOut();
                    $('#layanan_id_container').fadeOut();
                    $('#layanan_astik_container').fadeIn();
                    var tag = $('#layanan_container');
                    $('html,body').animate({scrollTop: tag.offset().top},'slow');
                });
            });
            </script>
            <script>
            $(document).ready(function(){
                $('.seksi_id').click(function(){
                    $('#layanan_kip_container').fadeOut();
                    $('#layanan_astik_container').fadeOut();
                    $('#layanan_id_container').fadeIn();
                    var tag = $('#layanan_container');
                    $('html,body').animate({scrollTop: tag.offset().top},'slow');
                });
            });
            </script>
            <script>
            $(document).ready(function(){
                $('.seksi_kip').click(function(){
                    $('#layanan_id_container').fadeOut();
                    $('#layanan_astik_container').fadeOut();
                    $('#layanan_kip_container').fadeIn();
                    var tag = $('#layanan_container');
                    $('html,body').animate({scrollTop: tag.offset().top},'slow');
                });
            });
            </script>
        </div>
    </div>
</div>
<!--=========== Seksi Section End =========-->