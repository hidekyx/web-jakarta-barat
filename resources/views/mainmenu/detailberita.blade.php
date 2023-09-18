@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body"><br>
			@foreach($post as $data)
			<article>
				<h1>
					{{ $data->title }}
				</h1>
				<h6 class="mb-2">
					By: {{ $data->nama }} kategori {{ $data->kategori }}
				</h6>
				<p>
					{!! $data->content !!}
				</p>

				<img src="/imgcoba/{{ $data->img }}" alt="picture" width="150px"><br><br>

				<p>
					Diupload pada {{ $data->time }}
				</p>
			</article>
			@endforeach
			<a href="/menuberita" class="text-decoration-none">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script></script>
@endsection
