@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body"><br>
            <article>
                <h1>{{ $post->title }}</h1>
                <h6 class="mb-2">
                    Kontributor: {{ $post->nama }} <br>
                    Nama Penulis: {{ $post->nama_narahubung  }}<br>
                    No Kontak: {{ $post->no_kontak_narahubung }}<br>
                    Kategori: {{ $post->kategori }}
                </h6>
                <p>{!! $post->content !!}</p>

                <div class="row">
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('storage/berita/'.$post->img) }}" alt="picture" style="max-width: 350px;">
                    </div>
                    @if($post->img_2 != null || $post->img_2 != "")
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('storage/berita/'.$post->img_2) }}" alt="picture" style="max-width: 350px;">
                    </div>
                    @endif
                    @if($post->img_3 != null || $post->img_3 != "")
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('storage/berita/'.$post->img_3) }}" alt="picture" style="max-width: 350px;">
                    </div>
                    @endif
                    @if($post->img_4 != null || $post->img_4 != "")
                    <div class="col-md-3 mb-2">
                        <img src="{{ asset('storage/berita/'.$post->img_4) }}" alt="picture" style="max-width: 350px;">
                    </div>
                    @endif
                </div>
                <p>Caption: {{ $post->caption }}</p>
                <p>Diupload pada {{ $post->time }}</p>
                </article>
        <a href="/kontributor/list-berita" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>

</script>
@endsection
