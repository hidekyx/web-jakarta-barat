<!--Footer Start-->
<footer class="footer">
<div class="footer-top wf100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
            <!--Footer Widget Start-->
            <div class="footer-widget">
                <h4>Sejarah Singkat</h4>
                <p>Walkot Farm 4.0 dicanangkan oleh Wali Kota Administrasi Jakarta Barat H. Rustam Effendi, Jumat 13 Desember 2019 di halaman Kantor Walikota, Walkot Farm 4.0 merupakan metode pertanian berbasis teknologi.</p>
                <a href="{{ asset('/tentang') }}" class="lm">Baca Selengkapnya</a>
            </div>
            <!--Footer Widget End-->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
            <!--Footer Widget Start-->
            <div class="footer-widget">
                <h4>Kegiatan Terbaru</h4>
                <ul class="lastest-products">
                    @foreach ($footerkegiatan as $fk)
                    <li>
                        <img style="width: 80px;" src="{{ asset('storage/images/kegiatan/'.$fk->gambar) }}" alt="">
                        <strong><a href="{{ asset('/kegiatan/'.$fk->id) }}">{!! Str::limit($fk->judul, 30) !!}</a></strong>
                        <span class="pdate"><i>Posted:</i> {{ $fk->tanggal }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!--Footer Widget End-->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
            <!--Footer Widget Start-->
            <div class="footer-widget">
                <div id="fpro-slider" class="owl-carousel owl-theme">
                    <!--Footer Product Start-->
                    @foreach ($footertanaman as $ft)
                    <div class="item">
                        <div class="f-product">
                        <img style="height: 350px; object-fit: cover;" src="{{ asset('storage/images/tanaman/'.$ft->gambar) }}" alt="">
                        <div class="fp-text">
                            <h6><a href="{{ asset('tanaman/'.$ft->kategori->nama_kategori.'/'.$ft->id_tanaman) }}">{{ $ft->nama_tanaman_latin }}</a></h6>
                        </div>
                        </div>
                    </div>
                    @endforeach
                    <!--Footer Product End-->
                </div>
            </div>
            <!--Footer Widget End-->
            </div>
        </div>
    </div>
</div>
<div class="footer-copyr wf100">
    <div class="container">
        <div class="row">
            <div class="col">
                <p style="text-align: center;">© 2022 SUDIS KOMINFOTIK JAKARTA BARAT, ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </div>
</div>
</footer>
<!--Footer End-->
