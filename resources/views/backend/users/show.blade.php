@extends('layouts.backendMainLayout')
@section('content')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users view start -->
            <section class="users-view">
                <!-- users view media object start -->
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="media mb-2">
                            <a class="mr-1" href="javascript:void(0);">
                                <img src="{{asset('assets/images/icon/profile.png')}}" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                            </a>
                            <div class="media-body pt-25">
                                <h4 class="media-heading"><span class="users-view-name">{{$user->name}}</span><span class="text-muted font-medium-1"> | </span><span class="users-view-username text-muted font-medium-1 ">{{$user->email}}</span></h4>
                                <span>ID:</span>
                                <span class="users-view-id">{{$user->id}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                        <a href="javascript:void(0);" class="btn btn-sm mr-25 border">Profile</a>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                </div>
                <!-- users view media object ends -->
                <!-- users view card data start -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Registered:</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <td>Latest Login:</td>
                                            <td class="users-view-latest-activity">{{$user->last_login}}</td>
                                        </tr>
                                        <tr>
                                            <td>Verified:</td>
                                            <td class="users-view-verified"><?= !is_null($user->email_verified_at) ? 'Yes' : 'No' ; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Role:</td>
                                            <td class="users-view-role">{{implode(',',$userRole)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td><?= $user->is_active ? '<span class="badge badge-light-success users-view-status">Active</span>' : '<span class="badge badge-light-success users-view-warning">Close</span>' ; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="table-responsive">
                                    <table class="table mb-0">
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
                                                		$permision_read = in_array($value->id, $rolePermissions) ? 'Yes': 'No';
                                                	}elseif($permision_name[1] == 'create' AND $value->group == $group){
                                                		$permission_create = in_array($value->id, $rolePermissions) ? 'Yes': 'No';
                                                	}elseif($permision_name[1] == 'edit' AND $value->group == $group){
                                                		$permission_edit = in_array($value->id, $rolePermissions) ? 'Yes': 'No';
                                                	}elseif($permision_name[1] == 'delete' AND $value->group == $group){
                                                		$permission_delete = in_array($value->id, $rolePermissions) ? 'Yes': 'No';
                                                	}
                                                }

                                                ?>
                                                <td>{{$permision_read}}</td>
                                                <td>{{$permission_create}}</td>
                                                <td>{{$permission_edit}}</td>
                                                <td>{{$permission_delete}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- users view card data ends -->
                <!-- users view card details start -->
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="users-view-name">{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="users-view-email">{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Company:</td>
                                        <td>{{$user->company}}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <h5 class="mb-1"><i class="bx bx-link"></i> Social Links</h5>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Linkedin:</td>
                                        <td><a href="javascript:void(0);">{{$user->linkedid}}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 class="mb-1"><i class="bx bx-info-circle"></i> Personal Info</h5>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Country:</td>
                                        <td>{{$user->country}}</td>
                                    </tr>
                                    <tr>
                                        <td>Languages:</td>
                                        <td>{{$user->language}}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- users view card details ends -->

            </section>
            <!-- users view ends -->

        </div>
    </div>
</div>
<!-- END: Content-->

@endsection