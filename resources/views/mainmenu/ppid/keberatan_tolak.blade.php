@extends('layouts.backendMainLayout')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <div class="card-header">
            <i class="fa fa-plus"></i>Tolak Pengajuan Keberatan Informasi
        </div>
        @foreach($data as $d)
        <div class="card-block">
            <form action="/layanan-info-publik/pengajuan-keberatan/tolak/simpan/{{ $d->id_keberatan }}" method="post" class="add" enctype="multipart/form-data" autocomplete="off">
            @csrf
                <label for="basic-url" class="form-label">Alasan Penolakan</label>
                <div class="input-group mb-2">
                    <span class="input-group-text">Alasan</span>
                    <input type="text" class="form-control" required="required" placeholder="Ketik Disini" id="keterangan" name="keterangan_penolakan">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-submit btn-primary">Tolak Pengajuan Keberatan</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Kode Permohonan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->kode_permohonan }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Tanggal Permohonan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($d->tanggal_permohonan)->isoFormat('dddd, DD MMMM Y')}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Tanggal Respon Permohonan</label>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($d->tanggal_respon_permohonan)->isoFormat('dddd, DD MMMM Y')}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Tanggal Pengajuan Keberatan</label>
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($d->tanggal_keberatan)->isoFormat('dddd, DD MMMM Y')}}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Kategori</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->kategori }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Email</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->email }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">No Telp</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->no_telp }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <label for="basic-url" class="form-label">Pekerjaan</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->pekerjaan }}" disabled>
                    </div>
                </div>
            </div>
            <label for="basic-url" class="form-label">Alamat</label>
            <div class="mb-3">
                <span class="input-group-text">Alamat</span>
                <textarea class="form-control" disabled>{{ $d->alamat }}</textarea>
            </div>
            <div class="row mb-0">
                <div class="col-4">
                    <label for="basic-url" class="form-label">Rincian Permohonan</label>
                    <div class="mb-3">
                        <span class="input-group-text">Rincian</span>
                        <textarea class="form-control" style="height: 200px;" disabled>{{ $d->rincian }}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <label for="basic-url" class="form-label">Tujuan Permohonan</label>
                    <div class="mb-3">
                        <span class="input-group-text">Tujuan</span>
                        <textarea class="form-control" style="height: 200px;" disabled>{{ $d->tujuan }}</textarea>
                    </div>
                </div>
                <div class="col-4">
                    <label for="basic-url" class="form-label">Keterangan Pengajuan Keberatan</label>
                    <div class="mb-3">
                        <span class="input-group-text">Tujuan</span>
                        <textarea class="form-control" style="height: 200px;" disabled>{{ $d->keterangan_keberatan }}</textarea>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <label for="basic-url" class="form-label">Cara Memperoleh Informasi</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->cara_memperoleh }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <label for="basic-url" class="form-label">Media</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->media }}" disabled>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <label for="basic-url" class="form-label">Cara Mendapatkan Informasi</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value="{{ $d->cara_mendapatkan }}" disabled>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

