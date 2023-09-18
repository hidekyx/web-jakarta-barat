@extends('layouts.backendMainLayout')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="app-content content">
<div class="content-overlay"></div>
<div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body">
			<div class="card-header">
				<i class="fa fa-plus"></i><i>*) Untuk hasil yang optimal, pastikan resolusi gambar yang di upload berukuran 960x376 pixel.
			</div>
			@foreach($data as $h)
			<form action="/header-update/{{$h->id}}" method="post" class="add" enctype="multipart/form-data">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Teks</label>
					<div class="input-group mb-3">
						<input type="text" class="form-control" required="required" value="{{ $h->title }}" placeholder="Ketik Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="title" name="title">
					</div>

					<label for="basic-url" class="form-label">Upload Gambar Header</label>
					<div class="input-group mb-3">
						<input type="file" class="form-control" value="{{ $h->img }}" id="img" name="img">
						<label class="input-group-text" for="uploadberita">Upload</label>
					</div>

					<div class="input-group mb-3 d-flex">
						<div style="margin-right: 10%">
							<input id="private" type="radio" name="aktif"
							@if ($h->aktif == "N")
								checked
							@endif
							value="N">
							<label for="private">Inactive</label>
						</div>
						<div>
							<input id="public" type="radio" name="aktif"
							@if ($h->aktif == "Y")
								checked
							@endif
							value="Y">
							<label for="public">Active</label>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-submit btn-success">Edit</button>
						<a href="/header-list" class="btn btn-submit btn-primary">Kembali</a>
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
<script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $('textarea#tiny').tinymce({
		height: 200,
		menubar: false,
		plugins: 'link',
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link',
		default_link_target: '_blank'
    });
</script>
@endsection

