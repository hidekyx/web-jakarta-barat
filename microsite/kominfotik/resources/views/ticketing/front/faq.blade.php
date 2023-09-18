<!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq section-bg">
    <div class="container" data-aos="fade-up">

    <div class="section-title">
        <h2>Frequently Asked Questions</h2>
        <p>Sebelum anda mengajukan layanan jaringan terhadap Sudis Kominfotik JB, ada baiknya jika anda melakukan pengecekan terlebih dahulu secara manual.</p>
    </div>

    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="faq-list accordion" id="accordionExample">
                <div class="accordion-item" data-aos="fade-right" data-aos-delay="100">
                    <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="faq-list-button-1">
                        <i class="bx bx-help-circle icon-help"></i><div class="collapse faq-collapse">Jaringan mati untuk satu atau beberapa PC?</div>
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <ul style="list-style-type: none;">
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Lakukan pengecekan pada kabel jaringan di PC yang bermasalah;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Cek switch HUB di sekitar PC yang bermasalah/terhubung (listrik & kabel jaringan);</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Cabut dan colok kembali kabel adaptor switch HUB;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Tes akses ke internet melalui browser/ping <b>8.8.8.8</b> pada PC;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Apabila masih bermasalah, silahkan ajukan layanan <a href="#layanan">di sini.</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item" data-aos="fade-right" data-aos-delay="200">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="faq-list-button-2">
                        <i class="bx bx-help-circle icon-help"></i><div class="collapse faq-collapse">Jaringan mati untuk satu ruangan?</div>
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <ul>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Lakukan pengecekan pada switch HUB utama di ruangan tersebut (listrik & kabel jaringan);</a></li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Cabut dan colok kembali kabel adaptor switch HUB;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Tes akses ke internet melalui browser/ping <b>8.8.8.8</b> pada PC;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Apabila masih bermasalah, silahkan ajukan layanan <a href="#layanan">di sini.</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item" data-aos="fade-right" data-aos-delay="300">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="faq-list-button-3">
                        <i class="bx bx-help-circle icon-help"></i><div class="collapse faq-collapse">Jaringan mati untuk satu gedung?</div>
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <ul>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Lakukan pengecekan pada modem, router (aruba & fortinet), dan cisco catalyst (indikator LED, listrik & kabel jaringan);</a></li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Cabut dan colok kembali kabel power router (aruba/fortinet) & cisco catalyst;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Tes akses ke internet melalui browser/ping <b>8.8.8.8</b> pada PC;</li>
                            <li class="my-0 py-1 mx-1"><i class="ri-check-double-line px-1" style="vertical-align: middle;"></i>Apabila masih bermasalah, silahkan ajukan layanan <a href="#layanan">di sini.</a></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            <div class="portfolio-item filter-card" data-aos="fade-up" data-aos-delay="200">
                <div class="portfolio-img"><img id="faq-image" src="{{ asset('storage/images/layanan/static/faq-1.gif') }}" alt="" class="img-fluid" style="border-radius: 4px;"></div>
            </div>
        </div>
        @push('scripts')
        <script>
            var faq1 = '{{ asset('/storage/images/layanan/static/faq-1.gif'); }}';
            var faq2 = '{{ asset('/storage/images/layanan/static/faq-2.gif'); }}';
            var faq3 = '{{ asset('/storage/images/layanan/static/faq-3.gif'); }}';
            $(document).ready(function() {
                $("#faq-list-button-1").click(function() {
                    $("#faq-image").attr('src', faq1);
                });
                $("#faq-list-button-2").click(function() {
                    $("#faq-image").attr('src', faq2);
                });
                $("#faq-list-button-3").click(function() {
                    $("#faq-image").attr('src', faq3);
                });
            });
        </script>
        @endpush
    </div>

    </div>
</section>
