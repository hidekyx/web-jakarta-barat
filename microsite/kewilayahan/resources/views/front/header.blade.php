@if($data['foto-keperluan-website'] != null)
<header id="header" data-transparent="true" data-fullwidth="true" class="dark">
@else
<header id="header" data-transparent="true" data-fullwidth="true" class="dark header-sticky sticky-active">
@endif
    <div class="header-inner">
        <div class="container">
            <div id="logo">
                <a href="{{ asset('/'.$kewilayahan->username) }}">
                    <img src="{{ asset('storage/assets/img/logo.png') }}" class="logo-dark d-none d-xl-block">
                    <span class="logo-dark">{{ $kewilayahan->nama }}</span>
                </a>
            </div>
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            @if($kewilayahan->kategori == "Kecamatan")
                            <li class="dropdown"><span class="dropdown-arrow"></span><a href="#">Kelurahan</a>
                                <ul class="dropdown-menu">
                                    @foreach($data['kewilayahan'][$data['current_kecamatan']->username] as $key => $dk)
                                    <li><a href="https://barat.jakarta.go.id/kelurahan/@link($dk->username)">{{ $dk->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @foreach ($list_menu as $key => $submenu)
                            @if($key != "Deskripsi Website")
                                @if($key == "Profil")
                                <li class="dropdown"><span class="dropdown-arrow"></span><a href="{{ asset('/'.$kewilayahan->username) }}#profil">{{ $key }}</a>
                                @else
                                <li class="dropdown"><span class="dropdown-arrow"></span><a href="#">{{ $key }}</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($submenu as $sm)
                                        <!-- <li><a href="{{ asset('/'.$kewilayahan->username) }}/@link($sm->kategori)/@link($sm->nama_menu)">{{ $sm->nama_menu }}</a></li> -->
                                            @if($sm->nama_menu == "Layanan PPID")
                                                <li class="dropdown-submenu"><a href="#">{{ $sm->nama_menu }}</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a target="_blank" href="https://ppid.jakarta.go.id/permohonan-informasi">Form Permohonan Informasi Publik</a></li>
                                                        <li><a target="_blank" href="https://ppid.jakarta.go.id/pengajuan-keberatan">Form Pengajuan Keberatan Informasi Publik</a></li>
                                                        <li><a target="_blank" href="https://ppid.jakarta.go.id/cek-status-permohonan-informasi">Cek Status Permohonan Informasi Publik</a></li>
                                                        <li><a target="_blank" href="https://ppid.jakarta.go.id/cek-status-keberatan">Cek Status Pengajuan Keberatan Informasi Publik</a></li>
                                                    </ul>
                                                </li>
                                            @elseif($sm->nama_menu == "Profil Pimpinan")
                                                @continue
                                            @elseif($kewilayahan->kategori == "Kecamatan" && $sm->nama_menu == "LMK")
                                                @continue
                                            @else
                                                <li><a href="{{ asset('/'.$kewilayahan->username) }}/@link($sm->kategori)?page=@link($sm->nama_menu)">{{ $sm->nama_menu }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            @endif
                            @endforeach
                            <li class="dropdown"><span class="dropdown-arrow"></span><a href="{{ asset('/'.$kewilayahan->username) }}/berita">Berita</a>
                            <li class="dropdown"><span class="dropdown-arrow"></span><a href="{{ asset('/'.$kewilayahan->username) }}#footer">Kontak Kami</a>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>