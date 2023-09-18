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
				<i class="fa fa-plus"></i> Edit Pejabat
			</div>
			@foreach($data as $p)
			<form action="/pejabat/update/{{ $p->id }}" method="post" class="add" enctype="multipart/form-data">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Nama pejabat</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Nama Pejabat</span>
						<input type="text" class="form-control" required="required" value="{{$p->nama}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" name="nama">
					</div>

					<label for="basic-url" class="form-label">Input Jabatan</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Jabatan</span>
						<input type="text" class="form-control" value="{{$p->jabatan}}"  required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="jabatan" name="jabatan">
					</div>
					<!-- <div> -->

					<label for="basic-url" class="form-label">Input Instansi</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Instansi</span>
						<select required="required" class="form-control" disabled>
								<option value="{{ $p->idInstansi }}" selected>{{ $p->instansi }}</option>
						</select>
					</div>
					<!-- <div> -->

					<label for="basic-url" class="form-label">Input NIP / NRK</label>
					<div class="input-group mb-3">
						<span class="input-group-text">NIP / NRK</span>
						<input type="text" class="form-control" value="{{ $p->nip }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nip" name="nip">
						</div>
					<div>

					<label for="basic-url" class="form-label">Input Pangkat / Golongan</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Pangkat / Golongan</span>
						<input type="text" class="form-control" value="{{ $p->pangkat }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="pangkat" name="pangkat">
					</div>
					<!-- <div> -->

					<label for="basic-url" class="form-label">Input Agama</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Agama</span>
							<input type="text" class="form-control" value="{{ $p->agama }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="agama" name="agama">
						</div>
					<div>

					<label for="basic-url" class="form-label">Input Riwayat Pendidikan</label>  
					<div>
						<span class="input-group-text">Riwayat Pendidikan</span>
						<textarea class="form-control" name="riwayat_pendidikan" id="tiny">{{ $p->riwayat_pendidikan }}</textarea>
					</div><br><br>

					<label for="basic-url" class="form-label">Input Riwayat Jabatan</label>  
					<div>
						<span class="input-group-text">Riwayat Jabatan</span>
						<textarea class="form-control" name="riwayat_jabatan" id="tiny2">{{ $p->riwayat_jabatan }}</textarea>
					</div><br><br>

					<label for="basic-url" class="form-label">Upload Foto</label>
					<div class="input-group mb-3">
						<input type="file" class="form-control" value="{{ $p->img }}" id="img" name="img">
						<label class="input-group-text" for="uploadberita">Upload</label>
					</div>

					<div class="form-group">
						<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Edit</button>
						<a href="/pejabat" class="btn btn-submit btn-primary">Kembali</a>
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
		toolbar: ''
    });
</script>
<script>
    $('textarea#tiny2').tinymce({
		height: 200,
		menubar: false,
		toolbar: ''
    });
</script>
@endsection

