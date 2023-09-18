<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ asset('/profil/view/'.$logged_user->username) }}">
            @if ($logged_user->id_role == 3)
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('storage/images/foto/'.$logged_user->foto) }}" alt="kal" class="navbar-brand-img h-100 rounded-circle shadow">
                </div>
                <div class="col-9">
                    <h6 class="mb-0 text-white text-sm">{{ \Illuminate\Support\Str::limit($logged_user->nama_lengkap, 17, $end='...') }}</h6>
                    <p class="mb-0 text-white text-xs">{{ $logged_user->email }}</p>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-3">
                    <img src="{{ asset('storage/assets/img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                </div>
                <div class="col-9">
                    <h6 class="mb-0 text-white text-sm">{{ $logged_user->nama_lengkap }}</h6>
                    <p class="mb-0 text-white text-xs">{{ $logged_user->email }}</p>
                </div>
            </div>
            @endif
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @if ($id_role != 3)
                <li class="nav-item">
                @if ($page == "Dashboard")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/dashboard') }}">
                @else
                    <a class="nav-link text-white" href="{{ asset('/dashboard') }}">
                @endif
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
            @endif
            @if ($id_role != 6)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Tenaga Terampil</h6>
                </li>
                <li class="nav-item">
                @if ($page == "Absensi")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/absensi') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/absensi') }}">
                @endif
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Absensi</span>
                    </a>
                </li>
                <li class="nav-item">
                @if ($page == "Kegiatan")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/kegiatan') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/kegiatan') }}">
                @endif
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Kegiatan</span>
                    </a>
                </li>
                @if ($id_role != 3)
                    <li class="nav-item">
                    @if ($page == "Profil")
                        <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/profil') }}">
                    @else
                        <a class="nav-link text-white " href="{{ asset('/profil') }}">
                    @endif
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Karyawan</span>
                        </a>
                    </li>
                @endif
            @endif
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Layanan</h6>
            </li>
            @if ($logged_user->id_seksi == 1 || $id_role == 6 || $id_role == 1)
                <li class="nav-item">
                @if ($page == "Ticketing")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/ticketing') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/ticketing') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">settings_input_antenna</i>
                </div>
                <span class="nav-link-text ms-1">BATIK - ID</span>
                </a>
                </li>
            @endif
            @if ($logged_user->id_seksi == 3 || $id_role == 6 || $id_role == 1)
                <li class="nav-item">
                @if ($page == "Astik")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/astik') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/astik') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">security</i>
                </div>
                <span class="nav-link-text ms-1">BATIK - ASTIK</span>
                </a>
                </li>
            @endif
            @if ($logged_user->id_seksi == 2 || $id_role == 6 || $id_role == 1)
                <li class="nav-item">
                @if ($page == "Kip")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/kip') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/kip') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">camera_alt</i>
                </div>
                <span class="nav-link-text ms-1">BATIK - KIP</span>
                </a>
                </li>
            @endif
            @if ($id_role == 1 || $id_role == 2 || $id_role == 5)
                <li class="nav-item">
                @if ($page == "Instansi")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/instansi') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/instansi') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">work</i>
                </div>
                <span class="nav-link-text ms-1">Unit Kerja</span>
                </a>
                </li>
            @endif
            @if ($logged_user->id_role == 1 || $logged_user->id_role == 2 || $logged_user->id_role == 4 || $logged_user->id_role == 5)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Inventaris</h6>
                </li>
                <li class="nav-item">
                @if ($page == "Barang-Pakai-Habis")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/inventaris/barang-pakai-habis') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/inventaris/barang-pakai-habis') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">inventory</i>
                </div>
                <span class="nav-link-text ms-1">Barang Pakai Habis</span>
                </a>
                </li>
                <li class="nav-item">
                @if ($page == "Barang-Aset")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/inventaris/barang-aset') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/inventaris/barang-aset') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">storage</i>
                </div>
                <span class="nav-link-text ms-1">Barang Aset</span>
                </a>
                </li>
            @endif
            @if ($logged_user->id_role == 1 || $logged_user->id_role == 2)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pegawai</h6>
                </li>
                <li class="nav-item">
                @if ($page == "Manage-Rekrutmen")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/manage-rekrutmen') }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/manage-rekrutmen') }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">archive</i>
                </div>
                <span class="nav-link-text ms-1">Rekrutmen</span>
                </a>
                </li>
            @endif
            @if ($logged_user->id_role == 1 || $logged_user->id_role == 2 || $logged_user->id_role == 5)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Keamanan</h6>
                </li>
                <li class="nav-item">
                @if ($page == "Keamanan")
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ asset('/profil/password/'.$logged_user->username) }}">
                @else
                    <a class="nav-link text-white " href="{{ asset('/profil/password/'.$logged_user->username) }}">
                @endif
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">shield</i>
                </div>
                <span class="nav-link-text ms-1">Password</span>
                </a>
                </li>
            @endif
            <hr class="horizontal light mt-0 mb-2">
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ asset('/logout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>