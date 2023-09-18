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
				<i class="fa fa-plus"></i> Edit Wilayah
			</div>
			@foreach($data as $p)
			<form action="/fasilitas/update/{{ $p->id }}" method="post">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Nama Fasilitas</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Nama Fasilitas</span>
						<input type="text" class="form-control" required="required" value="{{$p->nama}}" disabled placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" name="nama">
					</div>
				
					<label for="basic-url" class="form-label">Input Nama Pimpinan</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Nama Pimpinan</span>
						<input type="text" class="form-control" value="{{$p->pimpinan}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="pimpinan" name="pimpinan">
					</div>

					<!-- <div> -->
					<label for="basic-url" class="form-label">Input Alamat</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Alamat</span>
						<input type="text" class="form-control" required="required" value="{{$p->alamat}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="alamat" name="alamat">
					</div>
					
					<!-- <div> -->
					<label for="basic-url" class="form-label">Input Telepon</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Telepon</span>
						<input type="text" class="form-control" value="{{$p->telp}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="telp" name="telp">
					</div>
					
					<!-- <div> -->
					<label for="basic-url" class="form-label">Input Email</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Email</span>
						<input type="text" class="form-control" value="{{$p->email}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="email" name="email">
					</div>
					
					<!-- <div> -->
					<label for="basic-url" class="form-label">Input Website</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Website</span>
						<input type="text" class="form-control" value="{{$p->website}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="website" name="website">
					</div>
					
					<!-- <div> -->
					<div class="form-group">
						<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Edit</button>
						<a href="/fasilitas" class="btn btn-submit btn-primary">Kembali</a>
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
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection

