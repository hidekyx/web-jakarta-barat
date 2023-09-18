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
				<i class="fa fa-plus"></i> New Infografis
			</div>
			<form action="/addinfografis/store" method="post" class="add"  class="add" enctype="multipart/form-data">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Nama Banner</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Nama Infografis</span>
						<input type="text" class="form-control" required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" name="nama">
					</div>
					<label for="basic-url" class="form-label">Input URL</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Url</span>
						<input type="url" class="form-control" required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="link" name="link">
					</div>

					<label for="basic-url" class="form-label">Pilih Tags</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Tags</span>
						<select class="form-control" name="tags" id="tags">
							<option value="" selected>-- Tidak Menggunakan Tag --</option>
							@foreach($tags as $t)
							<option value="{{ $t->desc }}">{{ ucwords($t->desc) }}</option>
							@endforeach
						</select>
					</div>

					<label for="basic-url" class="form-label">Upload Gambar</label>
					<div class="input-group mb-3">
						<input type="file" class="form-control" id="img" name="img">
						<label class="input-group-text" for="uploadberita">Upload</label>
					</div>

					<div class="input-group mb-3 d-flex">
						<div style="margin-right: 10%">
							<input id="private" type="radio" name="published" value="N">
							<label for="private">Un-Publish</label>
						</div>
						<div>
							<input id="public" type="radio" name="published" value="Y">
							<label for="public">Publish</label>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-submit btn-success">Add</button>
					</div>
				</div>
      		/form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>
</script>
@endsection

