@extends('layouts.backendMainLayout')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-body">
                        
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-error"></i>
                                        <span>
                                            {{$error}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <form class="form-validate" action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}" name="email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-6">
                                            <div class="controls">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <div class="controls">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" name="confirm-password">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12 col-sm-6">
                                    @if($user_>id > 1)
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name="roles">
                                            @foreach($roles as $value)
                                            <option value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="is_active">
                                            <option value="true" <?= $user->is_active ? 'selected' : '' ?> >Active</option>
                                            <option value="false" <?= !$user->is_active ? 'selected' : ''?> >Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" class="form-control" placeholder="Company name" value="{{$user->company}}" name="company">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Personal Info</h5>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Country</label>
                                            <input type="text" class="form-control" placeholder="Country" name="country" value="{{$user->country}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Language</label>
                                            <input type="text" class="form-control" placeholder="Language" name="language" value="{{$user->language}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" placeholder="Phone number" value="{{$user->phone}}" name="phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Address</label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                                   <h5 class="mb-1"><i class="bx bx-link mr-25"></i>Social Links</h5>
                                    <div class="form-group">
                                        <label>Linkedin</label>
                                        <input class="form-control" type="text" value="{{$user->linkedin}}" name="linkedin">
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection