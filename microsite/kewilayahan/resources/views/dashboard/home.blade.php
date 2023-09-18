<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard') }}">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-6">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Status Kelengkapan Website <span>| {{ $logged_user->nama }} </span></h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col" style="width: 50px;">Status</th>
                                    <th scope="col">Diperbaharui</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($status as $menu)
                                    @foreach($menu as $data)
                                    <tr>
                                        <td>{{ $data['kategori'] }}</td>
                                        <th scope="row"><a href="{{ asset('/dashboard') }}/@link($data['kategori'])/@link($data['nama_menu'])">{{ $data['nama_menu'] }}</a></th>
                                        @if($data['status'] == "Belum Diisi")
                                            <td><span class="badge bg-danger w-100">{{ $data['status'] }}</span></td>
                                        @elseif($data['status'] == "Menunggu Konfirmasi")
                                            <td><span class="badge bg-warning w-100">{{ $data['status'] }}</span></td>
                                        @elseif($data['status'] == "Sudah Dipublikasi")
                                            <td><span class="badge bg-success w-100">{{ $data['status'] }}</span></td>
                                        @endif
                                        @if($data['diperbaharui'])
                                            <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($data['diperbaharui'])->isoFormat('D MMMM Y - H:m')}}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Keterangan Status <span>| Kelengkapan Website</span></h5>
                        <div class="activity">
                            <div class="activity-item d-flex">
                                <div class="activite-label text-danger">Belum Diisi</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    Anda diwajibkan untuk mengisi data atau konten sesuai dengan kategori menu yang tersedia.
                                </div>
                            </div>
                            <div class="activity-item d-flex">
                                <div class="activite-label text-warning">Menunggu Konfirmasi</div>
                                <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                <div class="activity-content">
                                    Data atau konten yang telah anda isi sedang dalam proses pengecekan oleh admin.
                                </div>
                            </div>
                            <div class="activity-item d-flex">
                                <div class="activite-label text-success">Sudah Dipublikasi</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    Data atau konten sudah dikonfirmasi oleh admin dan sudah dipublikasikan melalui website kelurahan/kecamatan.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>