<section id="footer">
<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-12 col-md-6">
                <div class="row gx-5 pt-5 mb-3">
                    <div class="col-12">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">PPID - Jakarta Barat</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="rounded">
                            <iframe style="width: 100%; height: 250px;" src="https://maps.google.com/maps?q=kantor%20walikota%20jakarta%20barat&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-3">
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Jalan Raya Kembangan No.2, RT.2/RW.2, Kembangan Selatan Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610.</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">ppid.jakbar@jakarta.go.id</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">021 - 5821740</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/kotaadmjakartabarat/"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="https://twitter.com/kotajakbar"><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-primary btn-square me-2" href="https://www.youtube.com/channel/UChXtiMFK84Q1od1R_SvEbuQ/featured"><i class="fab fa-youtube fw-normal"></i></a>
                            <a class="btn btn-primary btn-square" href="https://instagram.com/kotajakartabarat?utm_medium=copy_link"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="rounded">
                            <h4 class="text-white">Statistik Pengunjung</h4>
                            <table class="table text-white  ">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>: {{ $statistik['hari_ini'] }}</td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: {{ $statistik['bulan_ini'] }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun ini</td>
                                    <td>: {{ $statistik['tahun_ini'] }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>: {{ $statistik['total'] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 justify-content-center" align="center">
                        <div class="mt-4">
                            <p class="mb-0">&copy; 2022 Suku Dinas Komunikasi, Informatika, dan Statistik - Kota Administrasi Jakarta Barat.</p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>