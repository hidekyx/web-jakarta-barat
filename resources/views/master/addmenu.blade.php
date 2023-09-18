@extends('layouts.backendMainLayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<script>
    $(document).ready(function(){
        $(document).on('change', '#jenisMenu', function(){
            var value = $('#jenisMenu').val();
            console.log(value);
            if(value == 3){
                $('#link-form').show();
                $('#menu-form').hide();
                $('#big-menu-form').hide();
            } else if(value == 1){
                $('#link-form').hide();
                $('#menu-form').hide();
                $('#big-menu-form').hide();
            } else if(value == 2){
                $('#link-form').hide();
                $('#menu-form').show();
                $('#big-menu-form').hide();
            } else if(value == 4){
                $('#link-form').show();
                $('#menu-form').show();
                $('#big-menu-form').hide();
            } else if(value == 5){
                $('#link-form').hide();
                $('#menu-form').hide();
                $('#big-menu-form').show();
            }
        })
    })
</script>
<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body">
			<div class="card-header">
				<i class="fa fa-plus"></i> New Menu
			</div>
			<form action="/addmenu/store" method="post" class="add">
				<div class="card-block">
					@csrf
					<label for="basic-url" class="form-label">Input Nama Menu</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Nama Menu</span>
						<input type="text" class="form-control" required="required" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="keterangan" name="keterangan">
					</div>

					{{-- <div class="input-group mb-3 d-flex justify-content-around">
						<div>
							<input id="menu_utama" required="required" type="radio" name="jenisMenu" value="1">
							<label for="menu_utama">Menu Utama</label>
						</div>
						<div>
							<input id="menu_kedua" required="required" type="radio" name="jenisMenu" value="2">
							<label for="menu_kedua">Sub Menu</label>
						</div>
						<div>
							<input id="menu_ketiga" required="required" type="radio" name="jenisMenu" value="3">
							<label for="menu_ketiga">Link Menu</label>
						</div>
					</div> --}}

					<label for="basic-url" class="form-label">Pilih Jenis Menu</label>
					<div class="input-group mb-3">
						<span class="input-group-text">Jenis Menu</span>
						<select required="required" class="form-control" name="jenisMenu" id="jenisMenu">
							<option value="" selected></option>
							<option value="1">Menu Utama</option>
							<option value="2">Sub Menu</option>
							<option value="3">Link Menu</option>
							<option value="4">Linked SubMenu</option>
							<option value="5">Sub Submenu</option>
						</select>
					</div>

					<div id="link-form" style="display:none">
						<label for="basic-url" class="form-label">Input Link</label>
						<div class="input-group mb-3">
							<span class="input-group-text">Link</span>
							<input type="text" class="form-control" placeholder="Ketik disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="link" name="link">
						</div>
					</div>

					<div id="menu-form" style="display:none">
						<label for="basic-url" class="form-label">Pilih Menu Induk</label>
						<div class="input-group mb-3">
							<span class="input-group-text">Menu</span>
							<select class="form-control" name="id_menu" id="idmenu">
								<option value=null selected></option>
								@foreach ($data as $item)
								<option value="{{ $item->id }}">{{ $item->keterangan }}</option>
								@endforeach
							</select>
						</div>	
					</div>

					<div id="big-menu-form" style="display:none">
						<label for="basic-url" class="form-label">Pilih Menu Induk</label>
						<div class="input-group mb-3">
							<span class="input-group-text">Menu</span>
							<select class="form-control" name="id_bigmenu" id="idBigmenu">
								<option value=null selected></option>
								@foreach ($databigmenu as $item)
								<option value="{{ $item->id }}">{{ $item->keterangan }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<button type="submit" value="add" class="btn btn-submit btn-success">Add</button>
					</div>
				</div>
      		</form>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script><script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.tiny.cloud/1/kslnuok238njqoqgytmv0c0v26swh1vyljtvhk5a4r0byita/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
<script>
    $('textarea#tiny').tinymce({
		height: 200,
		menubar: false,
		toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });
</script> --}}
@endsection


