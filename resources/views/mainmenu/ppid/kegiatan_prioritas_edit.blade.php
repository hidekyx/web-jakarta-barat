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
            <i class="fa fa-plus"></i>Edit Kegiatan Prioritas
        </div>
        @foreach($data as $d)
        <form action="/kegiatan-prioritas/update/{{ $d->id_kegiatan_prioritas }}" method="post" class="add" enctype="multipart/form-data">
        <div class="card-block">
            @csrf
            <label for="basic-url" class="form-label">Input Judul</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Judul Kegiatan</span>
                <input type="text" class="form-control" required="required" value="{{ $d->judul }}" placeholder="Ketik Disini" id="judul" name="judul" autocomplete="off">
            </div>

            <label for="basic-url" class="form-label">Input Caption</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Caption Kegiatan</span>
                <input type="text" class="form-control" required="required" value="{{ $d->caption }}" placeholder="Ketik Disini" id="caption" name="caption" autocomplete="off">
            </div>

            <label for="basic-url" class="form-label">Input Tanggal/Jam</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Tanggal/Jam Publikasi</span>
                <input type="datetime-local" class="form-control" required="required" value="{{ $d->tanggal }}" placeholder="Ketik Disini" id="tanggal" name="tanggal">
            </div>

            <label for="basic-url" class="form-label">Upload Media</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file" accept="image/*, video/*">
                <label class="input-group-text" for="uploadberita">Upload</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-submit btn-success">Simpan</button>
            </div>
        </div>
        </form>
        @endforeach
    </div>
</div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

