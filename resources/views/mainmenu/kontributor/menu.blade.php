<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
                    <div class="brand-logo">
                        <img  class="logo" src="{{asset('assets/images/logo/logo_jakbar.png')}}">
                    </div>
                    <h5 class="brand-text mb-0">JAKARTA BARAT</h5>
                </a></li>
            {{-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i></a></li> --}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
            <li class=" nav-item"><a href="{{url('dashboard')}}"><i class="menu-livicon" data-icon="desktop"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
            <li class="navigation-header text-truncate"><span>Main Menu</span></li>
            <li class="nav-item">
                <a href="# " >
                <i class="menu-livicon" data-icon="retweet"></i>
                <span class="menu-title text-truncate">Publikasi</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a href="/kontributor/list-berita"  class="d-flex align-items-center">
                            <i class="bx bx-right-arrow-alt"></i>
                            <span class="menu-item text-truncate">Berita</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
