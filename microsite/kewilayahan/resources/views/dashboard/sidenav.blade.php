<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ asset('/dashboard/home') }}">
            <i class="bi bi-grid"></i>
            <span>Beranda</span>
            </a>
        </li>
        
        <li class="nav-heading">Menu</li>

        @foreach ($list_menu as $key => $submenu)
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#@link($key)-nav" data-bs-toggle="collapse" href="#">
                @if ($key == "Deskripsi Website")
                    <i class="bi bi-globe"></i>
                @elseif ($key == "Profil")
                    <i class="bi bi-people"></i>
                @elseif ($key == "Perangkat")
                    <i class="bi bi-menu-button-wide"></i>
                @elseif ($key == "Layanan Publik")
                    <i class="bi bi-geo-alt"></i>
                @elseif ($key == "Informasi Wilayah")
                    <i class="bi bi-briefcase"></i>
                @elseif ($key == "PPID")
                    <i class="bi bi-journal-text"></i>
                @endif
                <span>{{ $key }}</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="@link($key)-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                @foreach ($submenu as $sm)
                @if($sm->nama_menu == "LMK" && $logged_user->kategori == "Kecamatan")
                    @continue
                @elseif($sm->nama_menu == "Layanan PPID" || $sm->nama_menu == "Prosedur Layanan PPID" || $sm->nama_menu == "Daftar Informasi Publik")
                    @continue
                @endif
                <li>
                    <a href="{{ asset('/dashboard') }}/@link($sm->kategori)/@link($sm->nama_menu)"><i class="bi bi-circle"></i><span>{{ $sm->nama_menu }}</span></a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach

        <li class="nav-heading">Pengaturan</li>

    </ul>
</aside>