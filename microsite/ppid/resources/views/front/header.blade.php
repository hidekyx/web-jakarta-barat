<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="{{ asset('/') }}" class="navbar-brand p-0">
        <img style="max-width: 250px;" src="{{ asset('storage/assets/front/img/logoputih.png') }}" alt="Image">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ asset('/') }}" class="nav-item nav-link active">Beranda</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ asset('/standar-layanan/form-permohonan-informasi-publik') }}" class="dropdown-item">Form Permohonan Informasi Publik</a>
                    <a href="{{ asset('/standar-layanan/form-pengajuan-keberatan-informasi-publik') }}" class="dropdown-item">Form Pengajuan Keberatan Informasi Publik</a>
                    <a href="{{ asset('/standar-layanan/status-permohonan-informasi-publik') }}" class="dropdown-item">Cek Status Permohonan Informasi Publik</a>
                    <a href="{{ asset('/standar-layanan/status-pengajuan-keberatan-informasi-publik') }}" class="dropdown-item">Cek Status Pengajuan Keberatan Informasi Publik</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Standar Layanan</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ asset('/standar-layanan/prosedur-permohonan-pelayanan-informasi') }}" class="dropdown-item">Prosedur Permohonan Pelayanan Informasi</a>
                    <a href="{{ asset('/standar-layanan/prosedur-pengajuan-keberatan-informasi') }}" class="dropdown-item">Prosedur Pengajuan Keberatan Informasi</a>
                    <a href="{{ asset('/standar-layanan/prosedur-permohonan-penyelesaian-sengketa-informasi') }}" class="dropdown-item">Prosedur Permohonan Penyelesaian Sengketa Informasi</a>
                    <a href="{{ asset('/standar-layanan/prosedur-penanganan-sengketa-informasi') }}" class="dropdown-item">Prosedur Penanganan Sengketa Informasi</a>
                    <a href="{{ asset('/standar-layanan/sop-ppid') }}" class="dropdown-item">SOP PPID</a>
                    <a href="{{ asset('/standar-layanan/kanal-layanan-informasi') }}" class="dropdown-item">Kanal Layanan Informasi</a>
                    <a href="{{ asset('/standar-layanan/waktu-dan-biaya-layanan') }}" class="dropdown-item">Waktu dan Biaya Layanan</a>
                    <a href="{{ asset('/standar-layanan/maklumat-informasi-publik') }}" class="dropdown-item">Maklumat Informasi Publik</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ asset('/profil') }}" class="dropdown-item">Profil PPID Jakarta Barat</a>
                    <a href="{{ asset('/profil/visi-misi') }}" class="dropdown-item">Visi dan Misi</a>
                    <a href="{{ asset('/profil/struktur-organisasi') }}" class="dropdown-item">Struktur Organisasi</a>
                    <a href="{{ asset('/profil/tugas-dan-fungsi') }}" class="dropdown-item">Tugas dan Fungsi</a>
                    <a href="{{ asset('/storage/files/dokumen/SK Walikota PPID.pdf') }}" class="dropdown-item">SK PPID</a>
                    <a href="{{ asset('/storage/files/dokumen/Rencana Kerja PPID Tahun 2022.pptx') }}" class="dropdown-item">Rencana Kerja dan Anggaran</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Publik</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ asset('/daftar-informasi-publik') }}" class="dropdown-item">Dokumen Informasi Publik</a>
                    <a href="{{ asset('/informasi-berkala') }}" class="dropdown-item">Informasi Berkala</a>
                    <a href="{{ asset('/informasi-serta-merta') }}" class="dropdown-item">Informasi Serta Merta</a>
                    <a href="{{ asset('/informasi-setiap-saat') }}" class="dropdown-item">Informasi Setiap Saat</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Laporan</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ asset('/laporan/dokumen') }}" class="dropdown-item">Laporan PPID Jakarta Barat</a>
                    <a href="{{ asset('/laporan/statistik-layanan-informasi-publik') }}" class="dropdown-item">Statistik Laporan PPID Jakarta Barat</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Galeri</a>
                <div class="dropdown-menu m-0">
                    <a target="_blank" href="https://barat.jakarta.go.id/pemerintahan/pejabat/48/pejabat%20teras" class="dropdown-item">Pejabat Teras</a>
                    <a target="_blank" href="https://barat.jakarta.go.id/pemerintahan/pejabat/49/pejabat%20eselon%20iii" class="dropdown-item">Pejabat Eselon III</a>
                    <a target="_blank" href="https://barat.jakarta.go.id/pemerintahan/pejabat/50/camat" class="dropdown-item">Camat</a>
                    <a target="_blank" href="https://barat.jakarta.go.id/pemerintahan/pejabat/51/lurah" class="dropdown-item">Lurah</a>
                </div>
            </div>
            <!-- <a href="{{ asset('/berita') }}" class="nav-item nav-link">Berita</a> -->
            <a href="#footer" class="nav-item nav-link">Kontak PPID</a>
        </div>
    </div>
</nav>
