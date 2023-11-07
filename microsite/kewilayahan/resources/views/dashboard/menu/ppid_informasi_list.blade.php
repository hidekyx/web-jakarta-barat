<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data PPID</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">PPID</li>
            <li class="breadcrumb-item active">@unlink($subpage)</li>
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
                <h5 class="card-title">Data PPID - @unlink($subpage) <span>| {{ $logged_user->nama }}</span></h5>
                <hr>
                <table class="table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">File</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_ppid as $key => $dp)
                            <tr>
                                <th scope="row"><a href="#">{{ $key+1 }}</a></th>
                                <th>{{ $dp['judul'] }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($dp['isi'] as $isi)
                            <tr>
                                <th></th>
                                <td>{{ $isi->isi }}</td>
                                @if($isi->pivot($isi->id_ppid, $logged_user->id_user))
                                <td>
                                    @if($isi->pivot($isi->id_ppid, $logged_user->id_user)->type == "Link")
                                    <a href="{{ $isi->pivot($isi->id_ppid, $logged_user->id_user)->value }}">
                                        <button type="button" class="btn btn-sm btn-info text-white">Lihat Link</button>
                                    </a>
                                    @elseif($isi->pivot($isi->id_ppid, $logged_user->id_user)->type == "File")
                                    <a href="{{ asset('storage/files/images/foto/ppid_daftar_informasi_publik/'.$isi->pivot($isi->id_ppid, $logged_user->id_user)->value) }}">
                                        <button type="button" class="btn btn-sm btn-primary">Lihat File</button>
                                    </a>
                                    @endif
                                </td>
                                @else
                                <td>-</td>
                                @endif
                                <th><a href="{{ asset('dashboard/ppid/'.$subpage.'/edit_informasi/'.$isi->id_ppid) }}"><button type="button" class="btn btn-sm btn-warning"><i class="bx bxs-pencil text-white"></i></button></a></th>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <script type="text/javascript">
                        function delete_informasi(id_ppid) {
                            Swal.fire({
                            title: 'Hapus data informasi publik ini?',
                            text: "Data informasi publik yang dihapus tidak akan bisa dikembalikan!",
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
                                            'Data informasi publik berhasil dihapus',
                                            'success'
                                            )
                                            window.location.reload();
                                        }
                                    },
                                    error: function(results) {
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Data informasi publik tidak terhapus'
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