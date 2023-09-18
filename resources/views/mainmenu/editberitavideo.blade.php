@extends('layouts.backendMainLayout')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<style>
.file {
  visibility: hidden;
  position: absolute;
}
</style>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
			<div class="card-header">
				<i class="fa fa-plus"></i> Input Berita Video
			</div>
          	<hr style="margin-top: -12px; margin-bottom: 25px;">

          	@foreach($editberitavideo as $p)
            <form action="/masterberitavideo/update/{{$p->id}}" method="post" class="add" enctype="multipart/form-data">
                <div class="card-block">
                    @csrf
                    <label for="basic-url" class="form-label">Pilih Kategori Berita</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Kategori</span>
						<select class="form-control" required="required" name="catID" id="catID">
							@foreach ($kat as $item)
							@if($item->id == $p->catID)
								<option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
							@else
								<option value="{{ $item->id }}">{{ $item->kategori }}</option>
							@endif
							@endforeach
						</select>
					</div>

					<label for="basic-url" class="form-label">Input Judul Berita</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Judul</span>
						<input type="text" class="form-control" required="required" value="{{ $p->judul }}" placeholder="Judul Berita" aria-label="Recipient's username" aria-describedby="basic-addon2" id="judul" name="judul">
					</div>

					<label for="basic-url" class="form-label">Tanggal</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Tanggal</span>
						<input type="date" class="form-control" value="{{ $p->tanggal }}" placeholder="Tanggal" required="required" aria-label="Recipient's username" aria-describedby="basic-addon2" id="tanggal" name="tanggal">
					</div>

					<label for="basic-url" class="form-label">Input Source Video</label>
					<small><i class="text-danger">*) Link video cukup input kode belakangnya seperti: <b>Ri5Oub_0JIs</b> agar thumbnails otomatis muncul</i></small>
					<div class="input-group mb-3">
						<span class="input-group-text">https://www.youtube.com/embed/</span>
						<input type="text" class="form-control" required="required" value="{{ substr($p->source,30) }}" placeholder="Source" aria-label="Recipient's username" aria-describedby="basic-addon2" id="source" name="source">
					</div>

					<label for="basic-url" class="form-label">Input Deskripsi Berita</label>
					<div>
						<span class="input-group-text">Deskripsi Berita</span>
						<textarea class="form-control" name="deskripsi" id="tiny">
							{!! $p->deskripsi !!}
						</textarea>
					</div>
					<br><br>

					<label for="basic-url" class="form-label">Status Publikasi</label>
					<div class="input-group mb-3 d-flex">
						<div style="margin-right: 10%">
							<input id="private" type="radio" name="published"
							@if ($p->published == 'N')
								checked
							@endif
							value="N">
							<label for="private">Un-Publish</label>
						</div>
						<div>
							<input id="public" type="radio" name="published"
							@if ($p->published == 'Y')
								checked
							@endif
							value="Y">
							<label for="public">Publish</label>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" value="add" class="btn btn-submit btn-success">Simpan</button>
						<a href="/menuberitavideo" class="btn btn-submit btn-primary">Kembali</a>
					</div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $('textarea#tiny').tinymce({
		height: 200,
		menubar: false,
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection
