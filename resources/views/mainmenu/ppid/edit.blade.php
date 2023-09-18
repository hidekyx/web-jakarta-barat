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
            <i class="fa fa-plus"></i>Edit Informasi Publik
        </div>
        @foreach($data as $d)
        <form action="/info-publik/update/{{ $d->id_dftr }}" method="post" class="add" enctype="multipart/form-data">
        <div class="card-block">
            @csrf
            <label for="basic-url" class="form-label">Pilih Kategori Informasi</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Kategori</span>
                <select class="form-control" required="required" name="kategori" id="kategori">
                    <option value="{{ $d->kategori }}" hidden selected>{{ $d->kategori }}</option>
                    <option value="Berkala">Berkala</option>
                    <option value="Dikecualikan">Dikecualikan</option>
                    <option value="Serta Merta">Serta Merta</option>
                    <option value="Tersedia Setiap">Tersedia Setiap</option>
                </select>
            </div>

            <label for="basic-url" class="form-label">Input Judul</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Judul Informasi</span>
                <input type="text" class="form-control" value="{{ $d->nama_inf }}" required="required" placeholder="Ketik Disini" id="nama_inf" name="nama_inf">
            </div>

            <label for="basic-url" class="form-label">Input Detail</label>
            <div class="mb-3">
                <span class="input-group-text">Detail Informasi</span>
                <textarea class="form-control" name="detail_inf">{{ $d->detail_inf }}</textarea>
            </div>

            <label for="basic-url" class="form-label">Input SKPD / UKPD</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Nama SKPD / UKPD</span>
                <input type="text" class="form-control" required="required" value="{{ $d->penanggung_jaw }}" placeholder="Ketik Disini" id="penanggung_jaw" name="penanggung_jaw">
            </div>

            <label for="basic-url" class="form-label">Upload File</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="file" name="file">
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

