<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data PPID</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">PPID</li>
            <li class="breadcrumb-item active">Dokumen Informasi Publik</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                <h5 class="card-title">Data PPID - Dokumen Informasi Publik <span>| {{ $logged_user->nama }}</span></h5>
                <a href="{{ asset('dashboard/ppid/'.$subpage.'/tambah') }}"><button type="button" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah Data</button></a>
                <hr>
                <table class="table table-borderless table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">File</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_ppid as $key => $dp)
                        <tr>
                            <th scope="row"><a href="#">#{{ $key+1 }}</a></th>
                            <td>{{ $dp->judul }}</td>
                            <td>{{ $dp->keterangan }}</td>
                            <td style="color: #899bbd;">{{ \Carbon\Carbon::parse($dp->created_at)->isoFormat('D MMMM Y - H:m')}}</td>
                            <td><a href="{{ asset('storage/files/images/foto/ppid_dokumen_informasi_publik/'.$dp->file) }}"><button type="button" class="btn btn-sm btn-primary">Lihat File</button></a></td>
                            <td style="min-width: 100px;">
                                <a href="{{ asset('dashboard/ppid/'.$subpage.'/edit/'.$dp->id_ppid) }}"><button type="button" class="btn btn-sm btn-warning"><i class="bx bxs-pencil text-white"></i></button></a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="delete_informasi({{ $dp->id_ppid }})"><i class="bx bxs-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <script type="text/javascript">
                        function delete_informasi(id_ppid) {
                            Swal.fire({
                            title: 'Hapus data dokumen informasi publik ini?',
                            text: "Data dokumen informasi publik yang dihapus tidak akan bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: 'Hapus',
                            cancelButtonText: "Batal",
                            }).then((result) => {
                            if (result.isConfirmed) {
                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/dashboard/ppid/'.$subpage.'/delete') }}/" + id_ppid,
                                    data: {
                                        _token: CSRF_TOKEN
                                    },
                                    dataType: 'JSON',
                                    success: function(results) {
                                        if (results.success === true) {
                                            Swal.fire(
                                            'Berhasil',
                                            'Data dokumen informasi publik berhasil dihapus',
                                            'success'
                                            )
                                            window.location.reload();
                                        }
                                    },
                                    error: function(results) {
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Data dokumen informasi publik tidak terhapus'
                                        })
                                    }
                                });
                            }
                            })
                        }
                    </script>
                </table>
                </div>
            </div>
        </div>
    </div>
</main>