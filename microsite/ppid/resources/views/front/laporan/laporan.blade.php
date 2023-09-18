<div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="wow zoomIn" data-wow-delay="0.4s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-4">Laporan PPID - Kota Administrasi Jakarta Barat</h3>
                    </div>
                </div>    
               

                <div class="wow zoomIn" data-wow-delay="0.8s">
                    <div class="row" style="margin-top:10px; margin-bottom:30px;">
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                            <img src="{{ asset('storage/assets/front/img/laporan1.png ') }}" style="width: 120px; height: 120px; margin-bottom:10px;">
                        </div>
                        <div class="col-lg-7">
                            <h5 class="mb-0">Laporan Layanan Informasi Publik 2022</h5>                            
                            <p align="justify">Laporan Tahunan Permohonan lnformasi Publik Tahun 2022 menunjukan jumlah Pemohon Informasi sebanyak 81 permohonan yang diterima seluruhnya.</p>                            
                                                            
                        </div>
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                                <a href="{{ asset('storage/files/dokumen/Laporan Layanan Informasi Publik 2022.pdf') }}"><button type="button" class="btn btn-outline-primary py-2 px-3 mt-3">Lihat</button></a>
                        </div>
                    </div>  
                </div>
                
                <hr>

                <div class="wow zoomIn" data-wow-delay="0.3s">
                    <div class="row" style="margin-top:10px; margin-bottom:30px;">
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                            <img src="{{ asset('storage/assets/front/img/laporan2.png ') }}" style="width: 120px; height: 120px; margin-bottom:10px;">
                        </div>
                        <div class="col-lg-7">
                            <h5 class="mb-0">Laporan Layanan Informasi Publik 2021</h5>
                            <p align="justify">Laporan Tahunan Permohonan lnformasi Publik Tahun 2021 menunjukan jumlah Pemohon Informasi sebanyak 206 permohonan dengan jumlah yang diterima 185 permohonan dan yang ditolak 21 permohonan.</p>                            
                        </div>
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                            <a href="{{ asset('storage/files/dokumen/Laporan Layanan Informasi Publik 2021.pdf') }}"><button type="button" class="btn btn-outline-primary py-2 px-3 mt-3">Lihat</button></a>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="wow zoomIn" data-wow-delay="0.5s">
                    <div class="row" style="margin-top:10px; margin-bottom:30px;">
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                            <img src="{{ asset('storage/assets/front/img/laporan3.png ') }}" style=" width: 120px; height: 120px; margin-bottom:10px;" >
                        </div>
                        <div class="col-lg-7">
                            <h5 class="mb-0">Laporan Layanan Informasi Publik 2017-2018</h5>
                            <p align="justify">Laporan Tahunan Permohonan lnformasi Publik Tahun 2017 menunjukan jumlah Pemohon Informasi sebanyak 603 permohonan dan laporan tahun 2018 sebanyak 1066 permohonan yang diterima seluruhnya.</p>
                        </div>
                        <div class="col-lg-2" style="display:flex; align-items:center; justify-content: center;">
                            <a href="{{ asset('storage/files/dokumen/Laporan Layanan Informasi Publik 2017-2018.pdf') }}"><button type="button" class="btn btn-outline-primary py-2 px-3 mt-3">Lihat</button></a>
                        </div>
                    </div>
                </div>

                <hr>

            </div>
            <div class="col-lg-4 col-12">
                @include('front.berita.sidebar')
            </div>
        </div>
    </div>
</div>