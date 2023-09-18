@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="card-header">
                <i class="fa fa-plus"></i> Add Footer Tag
            </div>
            <form action="/tags/insert" method="post">
                <div class="card-block">
                    @csrf
                    <label for="basic-url" class="form-label">Input Nama Tag</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Tag</span>
                        <input type="text" class="form-control" required="required" placeholder="Ketik Disini" aria-label="Recipient's username" aria-describedby="basic-addon2" id="desc" name="desc">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-submit btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script></script>
@endsection
