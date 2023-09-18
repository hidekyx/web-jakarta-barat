@extends('layouts.backendMainLayout')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function(){
            $(document).on('change', '#role-change', function(){
                var value = $('#role-change').val();
                var id = $(this).data('id');
                if(value == null || value == ""){
                        console.log('kosong');
                    } else{
                        window.location.href = '/ubah-'+id+'/'+value;
                    }
            })
        })
    </script>
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
                    <form action="{{route('users.index')}}" method="GET">
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-8">
                                <label for="users-list-verified">Search</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" placeholder="Keyword" name="q" value="{{app('request')->input('q')}}">
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-1 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0">Search</button>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-1 d-flex align-items-center">
                                <a href="/users" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</a>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2 d-flex align-items-center">
                                <a href="{{route('users.create')}}" class="btn btn-primary btn-block glow users-list-clear mb-0">
                                    Add New User
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
                                            <th>email</th>
                                            <th>name</th>
                                            <th>last activity</th>
                                            <th>role</th>
                                            <th>status</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($results as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->email}}</td>
                                            <td> {{$value->nama}} </a></td>
                                            @if($value->id > 1)
                                                <td>{{$value->lastlog}}</td>
                                            @else
                                                <td>-</td>
                                            @endif

                                            {{-- <td></td>--}}
                                            <td>
                                               @foreach($datadua as $role)
                                                    @if($value->id_role == $role->id)
                                                        @if ($role->id == 1)
                                                            <select class="form-control" disabled name="" id="">
                                                                <option selected>{{$role->name}}</option>
                                                            </select>
                                                        @else
                                                            <select id="role-change" class="form-control" data-id="{{$value->id}}">
                                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                                @foreach ($datadua as $roleoption)
                                                                    @if($roleoption->id != 1 && $roleoption->id != $role->id)
                                                                        <option value="{{$roleoption->id}}">{{$roleoption->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    @endif
                                               @endforeach
                                            </td>
                                            <td><?= $value->is_active > 1 ? '<span class="badge badge-light-success">Active</span>' :  '<span class="badge badge-light-warning">Close</span>'?></td>
                                            <td class="align-items-center">
                                                @if($value->id > 1)
                                                <a  onclick="deleteConfirmation({{$value->id}}" ><i class="bx bxs-eraser"></i></a>
                                                @endif
                                            </td>
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
<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: "{{url('/users/destroy')}}/" + id,
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    success: function (results) {

                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                            window.location.reload();
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
<!-- END: Content-->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>

</script>
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
@endsection

