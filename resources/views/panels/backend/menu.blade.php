<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo">
                        <img  class="logo" src="{{asset('assets/images/logo/logo_jakbar.png')}}">
                    </div>
                    <h5 class="brand-text mb-0">JAKARTA BARAT</h5>
                </a>
            </li>
            {{-- <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
                    <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
                </a>
            </li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" nav-item">
                <a href="{{url('dashboard')}}">
                    <i class="menu-livicon" data-icon="desktop"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <li class="navigation-header text-truncate">
                <span>Main Menu</span>
            </li>
            <li class="nav-item ">
                <a href="# " >
                    <i class="menu-livicon" data-icon="retweet"></i>
                    <span class="menu-title text-truncate">Publikasi</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a href="/menuberita"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Berita</span>
                        </a>
                    </li>
                    <li >
                        <a href="/menuberitafoto"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Berita Foto</span>
                        </a>
                    </li>
                    <li >
                        <a href="/menuberitavideo"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Berita Video</span>
                        </a>
                    </li>
                    @foreach ($priv as $perm)
                    @if ($perm->name == 'publish')
                    <li >
                        <a href="/infografis"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Infografis</span>
                        </a>
                    </li>
                    <li >
                        <a href="/tags"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Tags</span>
                        </a>
                    </li>
                    @endif
                    @if ($perm->name == 'agenda')
                    <li>
                        <a href="/agenda-settings"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Agenda</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @foreach ($priv as $priv)
                @if ($priv->name == 'profil')
                <li class="nav-item ">
                    <a href="# " >
                        <i class="menu-livicon" data-icon="retweet"></i>
                        <span class="menu-title text-truncate">Profil</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/wilayah"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Wilayah</span>
                            </a>
                        </li>
                        <li >
                            <a href="/kecamatan"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Kecamatan</span>
                            </a>
                        </li>
                        <li >
                            <a href="/fasilitas"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Fasilitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="/"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Lain - lain</span>
                            </a>
                        </li>
                    </ul>
                @endif
                @if ($priv->name == 'pemerintahan')
                <li class="nav-item ">
                    <a href="# " >
                        <i class="menu-livicon" data-icon="retweet"></i>
                        <span class="menu-title text-truncate">Pemerintahan</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/profil"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Profil</span>
                            </a>
                        </li>
                        <li >
                            <a href="/pejabat"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Pejabat</span>
                            </a>
                        </li>
                    </ul>
                @endif
                @if ($priv->name == 'ppid')
                <li class="nav-item ">
                    <a href="#" >
                        <i class="menu-livicon" data-icon="retweet"></i>
                        <span class="menu-title text-truncate">PPID</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/info-publik"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Info Publik</span>
                            </a>
                        </li>
                        <li>
                            <a href="/layanan-info-publik/permohonan"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Permohonan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/layanan-info-publik/pengajuan-keberatan"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Keberatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="/layanan-info-publik/survei"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Survei</span>
                            </a>
                        </li>
                        <li>
                            <a href="/kegiatan-prioritas"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Kegiatan Prioritas</span>
                            </a>
                        </li>
                    </ul>
                @endif
                @if ($priv->name == 'master')
                <li class="nav-item ">
                    <a href="# " >
                        <i class="menu-livicon" data-icon="retweet"></i>
                        <span class="menu-title text-truncate">Master</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/menu"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Menu</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="/agenda-settings"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Agenda</span>
                            </a>
                        </li> --}}

                        <li>
                            <a href="/running-text"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Running Text</span>
                            </a>
                        </li>

                        <li>
                            <a href="/popup-content"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Pop Up</span>
                            </a>
                        </li>

                        <li>
                            <a href="/portal"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Portal</span>
                            </a>
                        </li>

                        <li>
                            <a href="/header-list"  class="d-flex align-items-center">
                                <i class="bx bx-right-arrow-alt"></i>
                                <span class="menu-item text-truncate">Header</span>
                            </a>
                        </li>
                    </ul>
                @endif
                {{-- <li class=" navigation-header text-truncate">
                    <span data-i18n="Apps">Main Menu</span>
                </li>
                <li class=" nav-item">
                    <a href="#" target="_blank">
                        <i class="menu-livicon" data-icon="check-alt"></i>
                        <span class="menu-title text-truncate" data-i18n="Notes">Menu 1</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="#" target="_blank">
                        <i class="menu-livicon" data-icon="comments"></i>
                        <span class="menu-title text-truncate" data-i18n="Survey">Menu 2</span>
                    </a>
                </li>
                <li class=" nav-item">
                    <a href="#" target="_blank">
                        <i class="menu-livicon" data-icon="line-chart"></i>
                        <span class="menu-title text-truncate" data-i18n="Analytics">Menu 3</span>
                    </a>
                </li> --}}
                @if ($priv->name == 'add-user')
                    <li class=" navigation-header text-truncate">
                        <span data-i18n="Apps">Portal Management</span>
                        {{-- <li class=" nav-item">
                            <a href="#">
                                <i class="menu-livicon" data-icon="globe"></i>
                                <span class="menu-title text-truncate" data-i18n="Web">Web</span>
                            </a>
                            <ul class="menu-content">
                                <li>
                                    <a class="d-flex align-items-center" href="#">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <span class="menu-item text-truncate" data-i18n="Invoice List">Menu 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="d-flex align-items-center" href="#">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <span class="menu-item text-truncate" data-i18n="Invoice">Menu 2</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class=" nav-item">
                            <a href="#">
                                <i class="menu-livicon" data-icon="users"></i>
                                <span class="menu-title text-truncate" data-i18n="Web">Users</span>
                            </a>
                            <ul class="menu-content">
                                <li>
                                    <a class="d-flex align-items-center" href="{{url('users')}}">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <span class="menu-item text-truncate" data-i18n="Invoice List">User</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a class="d-flex align-items-center" href="{{url('roles')}}">
                                        <i class="bx bx-right-arrow-alt"></i>
                                        <span class="menu-item text-truncate" data-i18n="Invoice">Role</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                @endif
                @endforeach
        </ul>
    </div>
</div>
