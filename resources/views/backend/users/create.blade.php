@extends('layouts.backendMainLayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
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
                                            {{ $error }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <form class="form-validate" action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Nama</label>
                                            <input type="text" required="required" class="form-control" placeholder="Nama"
                                                name="nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" required="required" class="form-control"
                                                placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12 col-sm-6">
                                            <div class="controls">
                                                <label>Password</label>
                                                <input type="password" required="required" class="form-control" id="pass"
                                                    name="password">
                                            </div>
                                        </div>
                                        <div class="form-group col-12 col-sm-6">
                                            <div class="controls">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" id="pass_confirm"
                                                    name="confirm-password">
                                                <span id="alert_text" class="text-danger">Password not match!</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" required="required" name="id_role">
                                            <option value=null selected>Pilih Role</option>
                                            @foreach ($roles as $value)
                                                @if ($value->id != 1)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="is_active">
                                            <option value="t" selected>Active</option>
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                        <label>Company</label>
                        <input type="text" class="form-control" placeholder="Company name" name="company" value="{{old('company')}}">
                        </div> --}}
                                </div>
                                {{-- <div class="col-12 col-sm-6">
                        <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Personal Info</h5>
                        <div class="form-group">
                        <div class="controls">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="{{old('country')}}">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="controls">
                        <label>Language</label>
                        <input type="text" class="form-control" placeholder="Language" name="language" value="{{old('language')}}">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="controls">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone number" name="phone" value="{{old('phone')}}">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="controls">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}">
                        </div>
                        </div>
                        </div> --}}
                                {{-- <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                        <h5 class="mb-1"><i class="bx bx-link mr-25"></i>Social Links</h5>
                        <div class="form-group">
                        <label>Linkedin</label>
                        <input class="form-control" type="text" name="linkedin" value="{{old('linkedin')}}">
                        </div>
                        </div> --}}
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button id="submit_data" type="submit"
                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Tambah</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    $('#alert_text').hide();
                    $('#pass_confirm').on('keyup', function() {
                        if ($('#pass').val() == $('#pass_confirm').val()) {
                            $('#alert_text').hide();
                        } else
                            $('#alert_text').show();
                    });
                </script>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
    <script src="{{ asset('app-assets/js/scripts/charts/index_frontend.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/jquery.tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $('textarea#tiny').tinymce({
            height: 200,
            menubar: false,
            plugins: 'link',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | link',
            default_link_target: '_blank'
        });
    </script>
@endsection
