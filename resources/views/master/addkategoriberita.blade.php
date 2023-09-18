@extends('layouts.backendMainLayout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <div class="card-header">
                <i class="fa fa-plus"></i> New Kategori
            </div>
            <form action="/addkategoriberita/store" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" required="required" placeholder="kategori" aria-label="Recipient's username" aria-describedby="basic-addon2" id="kategori" name="kategori">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-submit btn-success">Add</button>
                </div>      
            </form>
        </div>
    </div>
</div>
@endsection
