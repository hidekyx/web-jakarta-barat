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
            <div class="row">
                <div class="col-md-12">
                    <a href="/masterberitafoto" class="btn btn-light-primary">Tambah Berita Foto</a>
                </div>
                <div class="col-md-12" align="right">
                    <!-- <input id="datepicker" width="276"> -->
                </div>
            </div>
            <br>

            <table class="table table-hover table-bordered table-responsive" id="tabel-data">
                <thead class="bg-dark">
                    <tr>
                        <th class="text-white">No</th>
                        <th class="text-white">Judul</th>
                        <th class="text-white">Kategori</th>
                        <th class="text-white">Lokasi</th>
                        <th class="text-white">Penulis</th>
                        <th class="text-white">Tanggal</th>
                        <th class="text-white">Published</th>
                        <th class="text-white">Action</th>
                    </tr>
                </thead>
                @foreach ($data as $index => $post)
                @if ($post->published == 'N')
                    <tr class="ttable-bordered">
                @else
                    <tr class="table-bordered">
                @endif
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $post->judul }}</td>
                    <td>{{ $post->kategori }}</td>
                    <td>{{ $post->lokasi }}</td>
                    <td>{{ $post->nama }}</td>
                    <td>{{ date('d F Y', strtotime($post->time)) }}</td>

                    @if ($post->published == 'N')
                    <td class="text-center table-danger table-bordered"><i class="fas fa-times"></i></td>
                    @else
                    <td class="text-center table-success table-bordered"><i class="fas fa-check"></i></td>
                    @endif
                    <td align="center">
                        @if ($hasRole == true) 
                            <a class="btn-table btn-warning" href="/masterberitafoto/{{ $post->id }}"><i class="fas fa-edit"></i></a>
                            <a class="btn-table btn-danger" onclick="deleteConfirmation({{ $post->id }})"><i class="fas text-white fa-trash"></i></a>
                        @elseif ($hasRole == false)
                        @if ($post->published == 'N')
                            <a class="btn-table btn-warning" href="/masterberitafoto/{{ $post->id }}"><i class="fas fa-edit"></i></a>
                        @endif
                        @endif
                            <a class="btn-table btn-info" href="/menuberitafoto/{{ $post->id }}"><i class="fas fa-info "></i></a>
                    </td>
                </tr>
                @endforeach

                <script type="text/javascript">
                    function deleteConfirmation(id) {
                        swal({
                            title: "Hapus berita ini?",
                            text: "Berita yang telah dihapus tidak akan bisa dikembalikan",
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
                                    url: "{{ url('/deletefoto') }}/" + id,
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
            </table>
            Current Page: {{ $data->currentPage() }}<br>
            Jumlah Data: {{ $data->total() }}<br>
            Data perhalaman: {{ $data->perPage() }}<br>
            <br>
            {{ $data->links() }}
            <script>
                $(document).ready(function() {
                    $('#tabel-data').DataTable();
                });
            </script>
            <script type="text/javascript">
                function deleteConfirmation(id) {
                    swal({
                        title: "Delete?",
                        text: "Please ensure and then confirm!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(function(e) {

                        if (e.value === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                type: 'POST',
                                url: "{{ url('/deletefoto') }}/" + id,
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

                function changeStatus(id) {
                    swal({
                        title: "Change Status?",
                        text: "Please ensure and then confirm!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes",
                        cancelButtonText: "Cancel",
                        reverseButtons: !0
                    }).then(function(e) {

                        if (e.value === true) {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                            $.ajax({
                                type: 'POST',
                                url: "{{ url('/change-stats-beritafoto') }}/" + id,
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

            <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

        </div>
    </div>
</div>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{ asset('app-assets/js/scripts/charts/index_frontend.js') }}"></script>
<script></script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
@endsection
