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
            <table class="table table-hover table-bordered table-responsive" id="tabel-data">
            <thead class="bg-dark">
                <tr>
                    <th class="text-white">No</th>
                    <th class="text-white">Tanggal Permohonan</th>
                    <th class="text-white">Kode</th>
                    <th class="text-white">Alamat</th>
                    <th class="text-white">Kontak</th>
                    <th class="text-white">Rincian</th>
                    <th class="text-white">Status</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
                @foreach($data as $index => $p)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_permohonan)->isoFormat('DD MMMM Y')}}</td>
                    <td>{{ $p->kode_permohonan }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        {{ $p->email }}<br>
                        {{ $p->no_telp }}
                    </td>
                    <td>{{ $p->rincian }}</td>
                    <td>{{ $p->status }}</td>
                    <td align="center">
                        @if($p->status == "Menunggu Respon")
                        <form action="/layanan-info-publik/permohonan/konfirmasi/{{ $p->id_permohonan }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <button class="btn btn-primary w-100" type="submit">Konfirmasi</button>
                        </form>
                        @elseif($p->status == "Sedang Diproses")
                        <a class="btn btn-success w-100 mb-1" href="/layanan-info-publik/permohonan/tinjau/{{ $p->id_permohonan }}">Tinjau</a>
                        <a class="btn btn-danger w-100" href="/layanan-info-publik/permohonan/tolak/view/{{ $p->id_permohonan }}">Tolak</a>
                        @elseif($p->status == "Ditolak" || $p->status == "Dipersetujui")
                        <a class="btn btn-info w-100" href="/layanan-info-publik/permohonan/detail/{{ $p->id_permohonan }}">Detail</a>
                        @endif
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
