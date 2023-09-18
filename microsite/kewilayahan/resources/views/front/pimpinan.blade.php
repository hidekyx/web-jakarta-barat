<section class="fullsceren my-0 py-0" style="color: #fff;" data-bg-parallax="{{ asset('storage/front-assets/img/layout/perangkat.png') }}" data-animate="fadeIn" data-animate-delay="0">
    <div class="bg-overlay" data-style="4"></div>
    <div class="shape-divider" data-style="10"></div>
    
    <div class="container mt-3">
        <div class="testimonial testimonial-single testimonial-left" data-items="1" data-autoplay="true" data-loop="true" data-autoplay="3500">
            <div class="testimonial-item">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/files/images/foto/pimpinan/'.$data['perangkat']['profil-pimpinan']->foto_pimpinan) }}" class="pimpinan-foto" alt="" data-animate="zoomIn" data-animate-delay="0">
                    </div>
                    <div class="col-md-8">
                        <span><h2 class="text-uppercase" style="color: #fff;">{{ $data['perangkat']['profil-pimpinan']->nama_pimpinan }}</h2></span>
                        @if($kewilayahan->kategori == "Kecamatan")
                        <p style="color: #fff;">Camat - {{ $kewilayahan->nama }}</p>
                        @elseif($kewilayahan->kategori == "Kelurahan")
                        <p style="color: #fff;">Lurah - {{ $kewilayahan->nama }}</p>
                        @endif
                        <div class="row">
                            <div class="col-md-3">
                                <span class="pimpinan-span-head">Pangkat</span>
                                <span class="pimpinan-span-desc">{{ $data['perangkat']['profil-pimpinan']->pangkat_pimpinan }}</span>
                            </div>
                            <div class="col-md-3">
                                <span class="pimpinan-span-head">NIP / NRK</span>
                                <span class="pimpinan-span-desc">{{ $data['perangkat']['profil-pimpinan']->nip_pimpinan }}</span>
                            </div>
                            <div class="col-md-12 mt-4">
                                <a href="{{ asset('/'.$kewilayahan->username) }}/perangkat?page=struktur-organisasi"><button type="button" class="btn btn-light btn-outline btn-rounded btn-iconed perangkat-hover mb-2">Perangkat Wilayah</button></a>
                                <a href="#"><button type="button" class="btn btn-light btn-outline btn-rounded btn-iconed perangkat-hover mb-2">Informasi Wilayah</button></a>
                                <a href="{{ asset('/'.$kewilayahan->username) }}/ppid?page=struktur-ppid"><button type="button" class="btn btn-light btn-outline btn-rounded btn-iconed perangkat-hover mb-2">PPID</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>