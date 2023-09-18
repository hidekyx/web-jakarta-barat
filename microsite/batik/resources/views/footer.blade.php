<!--=========== Footer Section Start =========-->
<section class="sc-footer-section footer-bg-image1 sc-pt-120 sc-md-pt-80">
    <div class="container">
        <div class="row sc-pt-10 sc-pb-100 sc-md-pb-80">
            <div class="col-xl-4 col-lg-6 col-md-6" data-sal="slide-up" data-sal-duration="500" data-sal-delay="100">
                <div class="footer-about sc-md-mb-45">
                    <div class="footer-logo sc-mb-30">
                        <a href="#"><img src="{{ asset('storage/assets/images/footer-logo.png') }}" alt="Foote Logo" /></a>
                    </div>
                    <p class="footer-des">
                        Jaringan intra pemerintah, aplikasi, persandian, siber, statistik dan dukungan publikasi informasi publik.
                    </p>
                    <div class="sc-contact-number border-style d-flex align-items-center">
                        <div class="phone-icon">
                            <div class="icon-whatsapp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                        </div>
                        <div class="contact-number">
                            Contact Support BATIK:
                            <a href="https://wa.me/+6281211255934" target="_blank" class="number">+62 812-1125-5934</a>
                        </div>
                    </div>
                    <div class="social-media mt-4">
                        <ul class="about-icon">
                            <li>
                                <a href="https://www.facebook.com/kotaadmjakartabarat"><i class="icon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/kotajakbar"><i class="icon-twiter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UChXtiMFK84Q1od1R_SvEbuQ"><i class="icon-youtube"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/kotajakartabarat/"><i class="icon-intragram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 sc-xs-mt-40" data-sal="slide-up" data-sal-duration="500" data-sal-delay="200">
                <div class="footer-menu-area sc-pl-35 sc-md-pl-40 sc-sm-mb-0">
                    <h4 class="footer-title white-color sc-md-mb-15">Alamat</h4>
                    <p>Jalan Raya Kembangan No.2, RT.2/RW.2, Kembangan Selatan Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</p>
                </div>
                <div class="footer-menu-area sc-pl-35 sc-md-pl-40 sc-sm-mb-0">
                    <h4 class="footer-title white-color sc-md-mb-15">Peta Wilayah</h4>
                    <iframe style="width: 100%; height: 250px;" src="https://maps.google.com/maps?q=kantor%20walikota%20jakarta%20barat&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 sc-sm-mt-40" data-sal="slide-up" data-sal-duration="500" data-sal-delay="300">
                <div class="footer-menu-area sc-footer-recent footer-menu-area-left sc-pl-35 sc-blg-pl-15 sc-lg-pl-0 sc-sm-pt-30">
                    <h4 class="footer-title white-color sc-md-mb-15">Infografis Security Awareness</h4>
                    <div class="row">
                        @foreach ($footer_secaw_infografis as $fsi)
                        <div class="col-6">
                            <div class="sc-recent-post d-flex align-items-center sc-mb-25">
                                <div class="recent-image">
                                    <a href="https://barat.jakarta.go.id/storage/banner/{{ $fsi['img'] }}" class="lightbox" title="{{ $fsi['nama'] }}"><img src="https://barat.jakarta.go.id/storage/banner/{{ $fsi['img'] }}" alt="Infografis" style="min-height: 230px; object-fit: contain;" /></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text text-center">
                        <p>© 2023 <a href="#" target="_blank"> Suku Dinas Komunikasi, Informatika, dan Statistik Jakarta Barat, </a> All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========== Footer Section End =========-->