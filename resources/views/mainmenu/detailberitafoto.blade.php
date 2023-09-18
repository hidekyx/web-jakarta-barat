@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
		<div class="content-header row">
		</div>
		<div class="content-body"><br>
			@foreach($data as $post)
			<article>
				<h1>
					{{ $post->judul }}
				</h1>
				<h6 class="mb-2">
					kategori {{ $post->kategori }}
				</h6>

				<img src="{{ asset('storage/beritafoto/'.$post->img) }}" alt="picture" width="200px" style="object-fit:cover;"><br><br>

				<p>
					{!! $post->keterangan !!}
				</p>
				<p>
					dilihat {{ $post->viewed }}
				</p>
				<p>
					Diupload pada {{ $post->time }}
				</p>
			</article>
			@endforeach
			<a href="/menuberitafoto" class="text-decoration-none">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script></script>
@endsection
