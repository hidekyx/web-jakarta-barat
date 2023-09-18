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
				<i class="fa fa-plus"></i> New Agenda
			</div>
			@foreach ($value as $value)
			<form action="/agenda/edit/{{$value->id}}" method="post">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Pelaksana</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Pelaksana</span>
						<select class="form-control" required="required" name="pelaksana" id="pelaksana">
							@foreach ($pelaksana as $p)
							@if ($value->pelaksana == $p->id)
							<option value="{{ $p->id }}" selected>{{ $p->nama }}</option>
							@endif
							<option value="{{ $p->id }}">{{ $p->nama }}</option>
							@endforeach
						</select>
					</div>
					<label for="basic-url" class="form-label">Input Agenda</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Agenda</span>
						<input type="text" class="form-control" value="{{$value->acara}}" required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="acara" name="acara">
					</div>
					<div>
					<div>
						<span class="input-group-text">Keterangan</span>
						<textarea class="form-control" name="ket" id="tiny">
							{!! $value->ket !!}
						</textarea>
					</div>
					<br><br>
					<label for="basic-url" class="form-label">Input Tempat</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Tempat</span>
						<input type="text" class="form-control"  value="{{$value->tempat}}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="tempat" name="tempat">
					</div>
					<div>
					<label for="basic-url" class="form-label">Input Tanggal</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Tanggal</span>
						<input type="date" class="form-control" value="{{$value->tanggal}}" placeholder="Time" required="required" aria-label="Recipient's username" aria-describedby="basic-addon2" id="tanggal" name="tanggal">
					</div>
					<label for="basic-url" class="form-label">Waktu ({{$value->pukul}} WIB (waktu asal))</label>
					<div class="d-flex" style="width: 100% !important">
						<div class="input-group mb-3 pr-5">
							<span class="input-group-text">Mulai</span>
							<input type="time" class="form-control" placeholder="Time" aria-label="Recipient's username" aria-describedby="basic-addon2" id="time1" name="time1">
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text">Sampai</span>
							<input type="time" class="form-control" placeholder="Time" aria-label="Recipient's username" aria-describedby="basic-addon2" id="time2" name="time2">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Add</button>
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
.</script>
@endsection

