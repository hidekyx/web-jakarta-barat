@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card-header">
                <i class="fa fa-plus"></i> Edit pejabat
            </div>
            @foreach($editdata as $p)
            <form action="/addpejabat/update" method="post">
                <div class="card-block">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required="required" value="{{ $p->namaInstansi }}" placeholder="instansiID" aria-label="Recipient's username" aria-describedby="basic-addon2" id="instansiID" name="instansiID">
                    </div>
                    
					<div class="input-group mb-3">
                        <input type="text" class="form-control" required="required" value="{{ $p->jabatan }}" placeholder="Jabatan" aria-label="Recipient's username" aria-describedby="basic-addon2" id="jabatan" name="jabatan">
                    </div>
    
					<div class="input-group mb-3">
						<input type="text" class="form-control" required="required" value="{{ $p->nama }}" placeholder="nama" aria-label="Recipient's username" aria-describedby="basic-addon2" id="nama" name="nama">
					</div>

					<div class="input-group mb-3">
						<input type="text" class="form-control" required="required" value="{{ $p->alamat }}" placeholder="alamat" aria-label="Recipient's username" aria-describedby="basic-addon2" id="alamat" name="alamat">
					</div>

					<div class="input-group mb-3">
						<input type="number" class="form-control" required="required" value="{{ $p->telp }}" placeholder="telp" aria-label="Recipient's username" aria-describedby="basic-addon2" id="telp" name="telp">
					</div>

					<div class="input-group mb-3">
						<input type="text" class="form-control" required="required" value="{{ $p->email }}" placeholder="email" aria-label="Recipient's username" aria-describedby="basic-addon2" id="email" name="email">
					</div>

					<div class="input-group mb-3">
						<input type="text" class="form-control" required="required" value="{!! $p->profil !!}" placeholder="profil" aria-label="Recipient's username" aria-describedby="basic-addon2" id="profil" name="profil">
					</div>

					<label for="basic-url" class="form-label">Upload Foto</label>
					<div class="input-group mb-3">
						<input type="file" class="form-control" id="img" name="img">
						<label class="input-group-text" for="uploadberita">Upload</label>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-submit btn-success">Edit</button>
					</div>     
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
@endsection
