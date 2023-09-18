@extends('layouts.backendMainLayout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    .btn-table {
        cursor: pointer;
        width: 35px;
        height: 35px;
        border-radius: 3px;
        border: 0.3px solid rgb(209, 207, 207);
        text-decoration: none;
        color: grey;
        font-size: 20px;
        opacity: 0.7;
        text-align: center;
        padding-top: 5px;
        margin: 5px;
    }

    .btn-table:hover {
        color: black;
        opacity: 1;
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
        <div class="content-wrapper">
        <div class="content-header row"></div>
            <div class="content-body"><br><br>
            @if(session('errors'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                @foreach ($errors->all() as $error)
                <span class="text-sm">{{ $error }}</span>
                @endforeach
                <button type="button" class="btn btn-close text-lg opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn btn-close text-lg opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <a href="/info-publik/add" class="btn btn-light-primary mb-2">Tambah Informasi Publik Baru</a>
            <table class="table table-hover table-bordered table-responsive" id="tabel-data">
            <thead class="bg-dark">
                <tr>
                    <th class="text-white">No</th>
                    <th class="text-white">Judul</th>
                    <th class="text-white">Detail</th>
                    <th class="text-white">Kategori</th>
                    <th class="text-white">SKPD / UKPD</th>
                    <th class="text-white">Tahun</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
                @foreach($data as $index => $p)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $p->nama_inf }}</td>
                    <td>{{ $p->detail_inf }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->penanggung_jaw }}</td>
                    <td>{{ $p->tahun }}</td>
                    <td align="center">
                        <a class="btn-table btn-warning" href="/info-publik/{{ $p->id_dftr }}"><i class="fas fa-edit"></i></a>
                        <a class="btn-table btn-danger text-white" onclick="deleteConfirmation({{ $p->id_dftr }})"><i class="fas text-white fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
                <script>
                    $(document).ready(function() {
                        $('#tabel-data').DataTable();
                    });
                </script>
                <script>
                    $('#datepicker').datepicker({
                        uiLibrary: 'bootstrap4'
                    });
                </script>
                <script type="text/javascript">
                    function deleteConfirmation(id) {
                        swal({
                            title: "Hapus data PPID",
                            text: "Apakah anda yakin ini menghapus data PPID ini",
                            type: "warning",
                            showCancelButton: !0,
                            confirmButtonText: "Hapus",
                            cancelButtonText: "Batal",
                            reverseButtons: !0
                        }).then(function(e) {

                            if (e.value === true) {
                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                                $.ajax({
                                    type: 'POST',
                                    url: "{{url('/info-publik/delete')}}/" + id,
                                    data: {
                                        _token: CSRF_TOKEN
                                    },
                                    dataType: 'JSON',
                                    success: function(results) {

                                        if (results.success === true) {
                                            swal("Done!", results.message, "success");
                                            window.location.reload();
                                        } else {
                                            swal("Error!", results.message, "error");
                                        }
                                    }
                                });

                            } else {
                                e.dismiss;
                            }

                        }, function(dismiss) {
                            return false;
                        })
                    }
                </script>
            </table>
        Halaman Sekarang: {{ $data->currentPage() }}<br>
        Jumlah Data: {{ $data->total() }}<br>
        Data Perhalaman: {{ $data->perPage() }}<br>
        <br>
        {{ $data->links() }}
        </div>
    </div>
</div>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{ asset('app-assets/js/scripts/charts/index_frontend.js') }}"></script>
<script>

</script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
@endsection
