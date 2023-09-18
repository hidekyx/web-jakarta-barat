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
				<i class="fa fa-plus"></i> New Kelurahan
			</div>
			<form action="/insertkelurahan/{{$idKec}}" method="post" class="add" enctype="multipart/form-data">
			<div class="card-block">
				@csrf
				<label for="basic-url" class="form-label">Input Nama Instansi</label>
				<div class="input-group mb-3">
					<span class="input-group-text">Nama Instansi</span>
					<input type="text" class="form-control" required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" name="nama">
				</div>
				<div>
					<span class="input-group-text">Profil Instansi</span>
					<textarea class="form-control" name="profil" id="tiny">
					</textarea>
				</div>
				<br><br>
				<label for="basic-url" class="form-label">Input Telepon</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Telepon</span>
						<input type="text" required="required" class="form-control placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="telp" name="telp">
					</div>
				<label for="basic-url" class="form-label">Input Alamat</label>
				<div class="input-group mb-3">
					<span class="input-group-text">Alamat</span>
					<input type="text" required="required" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="alamat" name="alamat">
				</div>
				<label for="basic-url" class="form-label">Input Fax</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Fax</span>
						<input type="text" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="fax" name="fax">
					</div>
				<label for="basic-url" class="form-label">Input Email</label>
				<div class="input-group mb-3">
					<span class="input-group-text">Email</span>
					<input type="text" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="email" name="email">
				</div>
				<label for="basic-url" class="form-label">Input Website</label>
				<div class="input-group mb-3">
					<span class="input-group-text">Website</span>
					<input type="url" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="website" name="website">
				</div>
				<label for="basic-url" class="form-label">Input Kode Pos</label>
				<div class="input-group mb-3">
					<span class="input-group-text">Kode Pos</span>
					<input type="text" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="kodepos" name="kodepos">
				</div>
				<div>
					<span class="input-group-text">Tupoksi</span>
					<textarea class="form-control" name="tupoksi" id="tinymce">
					</textarea>
				</div><br><br>

				<label for="basic-url" class="form-label">Upload Foto</label>
				<div class="input-group mb-3">
					<input type="file" class="form-control" id="img" name="img">
					<label class="input-group-text" for="uploadberita">Upload</label>
				</div>

				<div class="form-group">
					<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Add</button>
				</div>
			</div>
      		</form>
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
    $('textarea#tinymce').tinymce({
		height: 200,
		menubar: false,
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
</script>
@endsection

