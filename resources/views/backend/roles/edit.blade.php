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

                        <form class="form-validate" action="{{ route('roles.update',$role->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                
                                <div class="col-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" value="{{$role->name}}" name="name" readonly="">
                                        </div>
                                    </div>                                  
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table mt-1">
                                            <thead>
                                                <tr>
                                                    <th>Module Permission</th>
                                                    <th>Read</th>
                                                    <th>Create</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $group = array();
                                                    foreach ($permission as $value) {
                                                        $group[] = $value->group;
                                                    }
                                                    $groups = array_unique($group);
                                                ?>
                                                @foreach($groups as $group)
                                                <tr>
                                                    <td>{{$group}}</td>
                                                    <?php
                                                    foreach ($permission as $value) {
                                                        $permision_name = explode("-", $value->name);
                                                        if($permision_name[1] == 'list' AND $value->group == $group){
                                                            $permision_read = $value->id;
                                                            $read = in_array($value->id, $rolePermissions) ? 'checked': '';
                                                        }elseif($permision_name[1] == 'create' AND $value->group == $group){
                                                            $permission_create = $value->id;
                                                            $create = in_array($value->id, $rolePermissions) ? 'checked': '';
                                                        }elseif($permision_name[1] == 'edit' AND $value->group == $group){
                                                            $permission_edit = $value->id;
                                                            $edit = in_array($value->id, $rolePermissions) ? 'checked': '';
                                                        }elseif($permision_name[1] == 'delete' AND $value->group == $group){
                                                            $permission_delete = $value->id;
                                                            $delete = in_array($value->id, $rolePermissions) ? 'checked': '';
                                                        }
                                                    }

                                                    ?>

                                                    <td>
                                                        <div class="checkbox">
                                                            <input class="checkbox-input" id="{{$group.'-'.$permision_read}}" name="permission[]" type="checkbox" value="{{$permision_read}}" {{$read}}>
                                                            <label for="{{$group.'-'.$permision_read}}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input class="checkbox-input" id="{{$group.'-'.$permission_create}}" name="permission[]" type="checkbox" value="{{$permission_create}}" {{$create}}>
                                                            <label for="{{$group.'-'.$permission_create}}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input class="checkbox-input" id="{{$group.'-'.$permission_edit}}" name="permission[]" type="checkbox" value="{{$permission_edit}}" {{$edit}}>
                                                            <label for="{{$group.'-'.$permission_edit}}"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="checkbox">
                                                            <input class="checkbox-input" id="{{$group.'-'.$permission_delete}}" name="permission[]" type="checkbox" value="{{$permission_delete}}" {{$delete}}>
                                                            <label for="{{$group.'-'.$permission_delete}}"></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                        changes</button>
                                    <a href="{{ route('roles.index') }}" class="btn btn-light">Cancel</a>
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