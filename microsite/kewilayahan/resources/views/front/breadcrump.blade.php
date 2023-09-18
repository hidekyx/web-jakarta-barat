<section id="page-title" style="background-color: #1b1d42;">
<div id="particles-stars" class="particles"></div>
    <div class="container text-light">
        <div class="page-title">
            @if($page == "Ppid")
            <h1>PPID - Wilayah</h1>
            @elseif($page == "Informasi Wilayah")
            <h1>Informasi Wilayah</h1>
            @else
            <h1>{{ $page }} - Wilayah</h1>
            @endif
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ asset('/'.$kewilayahan->username) }}">Beranda</a></li>
                @if($page == "Ppid")
                <li>PPID</li>
                @else
                <li>{{ $page }}</li>
                @endif
                <li class="active">@unlink($current_subpage)</li>
            </ul>
        </div>
    </div>
</section>
<div class="page-menu menu-rounded">
    <div class="container-wide">
        <nav>
            <ul>
                @foreach($subpage as $sp)
                    @if($sp->nama_menu == ucwords(str_replace('-', ' ', $current_subpage)))
                        <li class="active"><a href="#">{{ $sp->nama_menu }}</a></li>
                    @else
                        @if($sp->nama_menu == "Profil Pimpinan")
                            @continue
                        @endif
                        @if($kewilayahan->kategori == "Kecamatan" && $sp->nama_menu == "LMK")
                            @continue
                        @endif
                        @if($sp->nama_menu == "Layanan PPID")
                            <li class="dropdown"><a href="#">{{ $sp->nama_menu }}</a>
                                <ul class="dropdown-menu">
                                    <li><a target="_blank" href="https://ppid.jakarta.go.id/permohonan-informasi">Form Permohonan Informasi Publik</a></li>
                                    <li><a target="_blank" href="https://ppid.jakarta.go.id/pengajuan-keberatan">Form Pengajuan Keberatan Informasi Publik</a></li>
                                    <li><a target="_blank" href="https://ppid.jakarta.go.id/cek-status-permohonan-informasi">Cek Status Permohonan Informasi Publik</a></li>
                                    <li><a target="_blank" href="https://ppid.jakarta.go.id/cek-status-keberatan">Cek Status Pengajuan Keberatan Informasi Publik</a></li>
                                </ul>
                            </li>
                        @elseif($sp->nama_menu == "Prosedur Layanan PPID")
                            <li class="dropdown"><a href="#">{{ $sp->nama_menu }}</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ asset('/'.$kewilayahan->username) }}/ppid?page=prosedur-permohonan-pelayanan-informasi">Prosedur Permohonan Pelayanan Informasi</a></li>
                                    <li><a href="{{ asset('/'.$kewilayahan->username) }}/ppid?page=prosedur-pengajuan-keberatan-informasi">Prosedur Pengajuan Keberatan Informasi</a></li>
                                    <li><a href="{{ asset('/'.$kewilayahan->username) }}/ppid?page=prosedur-penanganan-sengketa-informasi">Prosedur Penanganan Sengketa Informasi</a></li>
                                    <li><a href="{{ asset('/'.$kewilayahan->username) }}/ppid?page=prosedur-permohonan-penyelesaian-sengketa-informasi">Prosedur Permohonan Penyelesaian Sengketa Informasi</a></li>
                                </ul>
                            </li>
                        @elseif($sp->nama_menu == "Prosedur Permohonan Pelayanan Informasi" || $sp->nama_menu == "Prosedur Pengajuan Keberatan Informasi" || $sp->nama_menu == "Prosedur Penanganan Sengketa Informasi" || $sp->nama_menu == "Prosedur Permohonan Penyelesaian Sengketa Informasi")
                            @continue
                        @elseif($sp->nama_menu == "Visi Dan Misi PPID")
                            <li><a href="{{ asset('/'.$kewilayahan->username) }}/@link($sp->kategori)?page=@link($sp->nama_menu)">Visi dan Misi PPID</a></li>
                        @elseif($sp->nama_menu == "Tugas Dan Fungsi PPID")
                            <li><a href="{{ asset('/'.$kewilayahan->username) }}/@link($sp->kategori)?page=@link($sp->nama_menu)">Tugas dan Fungsi PPID</a></li>
                        @else
                            <li><a href="{{ asset('/'.$kewilayahan->username) }}/@link($sp->kategori)?page=@link($sp->nama_menu)">{{ $sp->nama_menu }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </nav>
        <div id="pageMenu-trigger">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>