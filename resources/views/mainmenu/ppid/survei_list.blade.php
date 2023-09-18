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
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <span class="text-sm">{{ Session::get('success') }}</span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <h5>Daftar Responden Kuesioner</h5>
            <table class="table table-hover table-bordered table-responsive" id="tabel-data">
            <thead class="bg-dark">
                <tr>
                    <th class="text-white">No</th>
                    <th class="text-white">Tanggal Survei</th>
                    <th class="text-white">Nama Lengkap</th>
                    <th class="text-white">Email</th>
                    <th class="text-white">Tanggal Lahir</th>
                    <th class="text-white">Pendidikan Terakhir</th>
                    <th class="text-white">Pekerjaan</th>
                    <th class="text-white">Mengajukan Permohonan</th>
                    <th class="text-white">Detail Jawaban</th>
                </tr>
            </thead>
                @foreach($data as $index => $d)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tanggal_survei)->isoFormat('DD MMMM Y')}}</td>
                    <td>{{ $d->nama_lengkap }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($d->tanggal_lahir)->isoFormat('DD MMMM Y')}}</td>
                    <td>{{ $d->pendidikan_terakhir }}</td>
                    <td>{{ $d->pekerjaan }}</td>
                    <td>{{ $d->pengajuan_permohonan }}</td>
                    <td align="center">
                        <a class="btn-table btn-info" href="/layanan-info-publik/survei/detail/{{ $d->id_jawaban }}"><i class="fas fa-eye"></i></a>
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
