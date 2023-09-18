@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card-header">
                <i class="fa fa-plus"></i> Edit Post
            </div>
            @foreach($edit as $p)
            <form action="/addkategoriberita/update" method="post">
                <div class="card-block">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required="required" value="{{ $p->kategori }}" placeholder="kategori" aria-label="Recipient's username" aria-describedby="basic-addon2" id="kategori" name="kategori">
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

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script></script>
@endsection
