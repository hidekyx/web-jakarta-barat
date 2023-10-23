<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Layanan Publik</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dashboard/home') }}">Home</a></li>
            <li class="breadcrumb-item">Layanan Publik</li>
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
                <h5 class="card-title">Data Layanan - @unlink($subpage) <span>| {{ $logged_user->nama }}</span></h5>
                <a href="{{ asset('dashboard/layanan-publik/'.$subpage.'/tambah') }}"><button type="button" class="btn btn-primary"><i class="bx bx-plus"></i> Tambah Data</button></a>
                <hr>
                <table class="table table-borderless table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Layanan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_layanan as $key => $dl)
                        <tr>
                            <th scope="row"><a href="#">#{{ $key+1 }}</a></th>
                            <td>{{ $dl->nama_layanan }}</td>
                            <td>{{ $dl->alamat_layanan }}</td>
                            <td>
                                <img src="{{ asset('storage/files/images/foto/layanan_publik/'.$dl->foto) }}" class="img-fluid" alt="" style="max-width: 100px;">
                            </td>
                            <td style="min-width: 100px;">
                                <a href="{{ asset('dashboard/layanan-publik/'.$subpage.'/edit/'.$dl->id_layanan_publik) }}"><button type="button" class="btn btn-sm btn-warning"><i class="bx bxs-pencil text-white"></i></button></a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="delete_layanan({{ $dl->id_layanan_publik }})"><i class="bx bxs-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <script type="text/javascript">
                        function delete_layanan(id_layanan_publik) {
                            Swal.fire({
                            title: 'Hapus data layanan ini?',
                            text: "Data layanan yang dihapus tidak akan bisa dikembalikan!",
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
                                    url: "{{ url('/dashboard/layanan-publik/'.$subpage.'/delete') }}/" + id_layanan_publik,
                                    data: {
                                        _token: CSRF_TOKEN
                                    },
                                    dataType: 'JSON',
                                    success: function(results) {
                                        if (results.success === true) {
                                            Swal.fire(
                                            'Berhasil',
                                            'Data layanan berhasil dihapus',
                                            'success'
                                            )
                                            window.location.reload();
                                        }
                                    },
                                    error: function(results) {
                                        Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: 'Data layanan tidak terhapus'
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