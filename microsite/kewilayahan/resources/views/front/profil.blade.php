<div class="shape-divider" data-style="2"></div>
<section id="profil" class="p-b-0">
    <div class="container">
        <div class="row m-b-50">
            <div class="col-lg-12">
                <div class="tabs tabs-vertical">
                    <div class="row">
                        <div class="col-md-2" data-animate="fadeInLeft" data-animate-delay="0">
                            <ul class="nav flex-column nav-tabs" id="myTab4" role="tablist" aria-orientation="vertical">
                                @foreach ($list_menu['Profil'] as $profil)
                                <li class="nav-item">
                                    <a class="nav-link @if($profil->nama_menu == "Sejarah") active @endif" data-bs-toggle="tab" href="#profil-@link($profil->nama_menu)" role="tab">{{ $profil->nama_menu }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-10" data-animate="fadeInRight" data-animate-delay="0">
                            <div class="tab-content">
                                @foreach ($list_menu['Profil'] as $profil)
                                <div class="tab-pane fade @if($profil->nama_menu == "Sejarah") active show @endif"" id="profil-@link($profil->nama_menu)" role="tabpanel">
                                    <div class="heading-text heading-gradient heading-section">
                                        <h2><span>{{ $profil->nama_menu }}</span></h2>
                                    </div>
                                    @if($data['profil'][str_replace(' ', '-', strtolower($profil->nama_menu))])
                                    <p class="text-justify">{!! $data['profil'][str_replace(' ', '-', strtolower($profil->nama_menu))]->konten !!}</p>
                                    @else
                                    <p class="text-justify">Data belum tersedia.</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>