<footer id="footer" class="inverted">
    <div class="footer-content">
        <div class="container">
            <div class="row gap-y">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 widget" data-animate="fadeIn" data-animate-delay="200">
                        @if ($data['kontak-wilayah'] != null)
                            @if ($data['kontak-wilayah']->alamat != "")
                                <h4>Alamat</h4>
                                <p>{{ $data['kontak-wilayah']->alamat }}</p>
                            @endif
                        @endif
                        </div>
                        <div class="col-md-6 widget" data-animate="fadeInRight" data-animate-delay="0">
                            <h4>{{ $data['current_kecamatan']->nama }}</h4>
                            @foreach($data['kewilayahan'][$data['current_kecamatan']->username] as $key => $dk)
                            <ul class="list-icon list-icon-arrow list-icon-colored">
                                <li><a href="https://barat.jakarta.go.id/kelurahan/@link($dk->username)" data-animate="fadeInRight" data-animate-delay="{{ $key+1 }}00">{{ $dk->nama }}</a></li>
                            </ul>
                            @endforeach
                        </div>
                        <div class="col-md-6 widget" data-animate="fadeInRight" data-animate-delay="0">
                            <h4>Portal</h4>
                            <a href="https://barat.jakarta.go.id" target="_blank"><img src="{{ asset('storage/assets/img/logo.png') }}" class="zoom-hover"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget" data-animate="fadeIn" data-animate-delay="250">
                        <h4>Peta Kantor {{ $kewilayahan->nama }}</h4>
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                                src="https://maps.google.com/maps?width=660&amp;height=450&amp;hl=en&amp;q=kantor {{ $kewilayahan->nama }}&amp;t=&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                </iframe>
                            </div>
                            <style>.mapouter{position:relative;text-align:right;width:100%;height:450px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:450px;}.gmap_iframe {height:450px!important;}</style>
                        </div>
                    </div>
                    <hr>
                    <div class="row" data-animate="fadeIn" data-animate-delay="300">
                        <div class="col-md-7">
                            <h5>Kontak</h5>
                            <ul class="list-icon list-icon-colored">
                                @if ($data['kontak-wilayah'] != null)
                                    @if ($data['kontak-wilayah']->email != "")
                                    <li class="mb-0 pb-0"><a href="#"><i class="icon-mail mr-0"></i>{{ $data['kontak-wilayah']->email }}</a></li>
                                    @endif
                                    <li><a href="#"><i class="fab fa-whatsapp"></i>-</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <h5>Sosial Media</h5>
                            @if ($data['kontak-wilayah'] != null)
                            <div class="social-icons social-icons-colored social-icons-rounded float-left">
                                <ul>
                                    @if ($data['kontak-wilayah']->sosmed_instagram != "")
                                        <li class="social-instagram"><a href="{{ $data['kontak-wilayah']->sosmed_instagram }}"><i class="fab fa-instagram"></i></a></li>
                                    @endif
                                    @if ($data['kontak-wilayah']->sosmed_facebook != "")
                                        <li class="social-facebook"><a href="{{ $data['kontak-wilayah']->sosmed_facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                    @endif
                                    @if ($data['kontak-wilayah']->sosmed_twitter != "")
                                        <li class="social-twitter"><a href="{{ $data['kontak-wilayah']->sosmed_twitter }}"><i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if ($data['kontak-wilayah']->sosmed_youtube != "")
                                        <li class="social-youtube"><a href="{{ $data['kontak-wilayah']->sosmed_youtube }}"><i class="fab fa-youtube"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center text-white">&copy; 2023 Copyright - Sudis Kominfotik Jakarta Barat.</div>
        </div>
    </div>
</footer>