@extends('layouts.backendMainLayout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<style>
	.btn-table{
		cursor: pointer;
		width: 35px;
		height: 35px;
		border-radius: 3px;
		border: 0.3px solid rgb(209, 207, 207);
		text-decoration: none;
		color: grey;
		font-size: 20px;
		opacity: 0.7;
		text-align: center;
		padding-top: 5px;
	}

	.btn-table:hover{
		color: black;
		opacity: 1;
	}
</style>

<div class="app-content content">
	<div class="content-overlay"></div>
	<div class="content-wrapper">
		<div class="content-header row"></div>
		<div class="content-body"><br><br>
			<table class="table table-responsive" id="tabel-data">
				<thead>
					<tr>
						<th>No</th>
						<th>Judul</th>
						<th>action</th>
					</tr>
				</thead>
				@foreach ($data as $index)
				<tr>
					<td>{{ $index->nomor }}</td>
					<td>{{ $index->nama }}</td>
					<td>
						<a class="btn-table" href="/wilayah/{{ $index->id }}">
							<i class="fas fa-edit"></i>
						</a>
					</td>
				</tr>
				@endforeach
				<script>
					$(document).ready(function(){
						$('#tabel-data').DataTable();
					});
				</script>
			</table>
			Current Page: {{ $data->currentPage() }}<br>
			Jumlah Data: {{ $data->total() }}<br>
			<br>
			{{ $data->links() }}
        </div>
    </div>
</div>

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script></script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
@endsection
