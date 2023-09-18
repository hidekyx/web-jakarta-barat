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
				<i class="fa fa-plus"></i> Running Text Setting
			</div>
			@foreach($data as $p)
			<form action="/running-text/update" method="post">
				<div class="card-block">
			@csrf
					<div class="input-group mb-3">
						<span class="input-group-text">Text</span>
						<input type="text" class="form-control" required="required" value="{{ $p->teks }}" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="teks" name="teks">
					</div>
                    <div class="form-group">
						<button type="submit" value="Simpan Data" class="btn btn-submit btn-success">Edit</button>
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

