@extends('layouts.backendMainLayout')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form>
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-8">
                                <label for="users-list-verified">Search</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" placeholder="Keyword" name="q">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2 d-flex align-items-center">
                                <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2 d-flex align-items-center">
                                <a href="{{route('roles.create')}}" class="btn btn-primary btn-block glow users-list-clear mb-0">
                                    Add New Role
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-like"></i>
                                    <span>
                                        {{$message}}
                                    </span>
                                </div>
                            </div>
                            @endif
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>name</th>
                                            <th>created</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td><a href="#"> {{$value->name}} </a></td>
                                            <td>{{$value->created_at}}</td>
                                            <td><a href="{{route('roles.edit',$value->id)}}"><i class="bx bx-edit-alt"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- datatable ends -->
                            <div class="justify-content-end">
                                {!! $results->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- users list ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection