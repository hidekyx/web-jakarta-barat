@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            @foreach($data as $post)
                <h1>
                    {{ $post->judul }}
                </h1>
                <p>Kategori {{ $post->kategori }}</p> 

                <video src="{{ $post->source }}"></video>

                <p>
                    {!! $post->deskripsi !!}
                </p>
                <p>
                    dilihat {{ $post->viewed }}
                </p>
                <p>
                    pada tanggal {{ $post->tanggal }}
                </p>
            @endforeach
            <a href="/menuberitavideo" class="text-decoration-none">Kembali</a>
        </div>
    </div>
</div>
@endsection
