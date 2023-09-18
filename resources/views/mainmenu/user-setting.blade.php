@extends('layouts.backendMainLayout')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    $(document).ready(function(){
        $('#image').change(function(){

           let reader = new FileReader();

           reader.onload = (e) => {

             $('#preview-image-before-upload').attr('src', e.target.result);
           }

           reader.readAsDataURL(this.files[0]);

          });
    })
</script>
@section('content')
<div class="app-content content">
    <form class="form-validate" action="/users/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="card">
                    <div class="card-body">
                    @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center" style="width:100%;">
                                    <div class="py-2">
                                        @if ($user->profile_photo == null)
                                        <img class="rounded-circle" src="assets/images/portrait/small/user-none.jpg" width="15%">
                                        @else
                                        <img class="rounded-circle" src="{{ asset('storage/profile-photo/'.$user->profile_photo) }}" width="15%">
                                        @endif
                                    </div>
                                    <a href="#" id="profile-photo" data-code="{{ $user->id }}" data-toggle="modal" data-target="#changePhotoModal">Edit Profile Photo</a>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Nama</label>
                                                <input type="text" required="required" value="{{$user->nama}}" class="form-control" placeholder="Nama" name="aname">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>E-mail</label>
                                                <input type="email" value="{{$user->email}}" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>as</label>
                                                <input type="text" required="required" class="form-control"
                                                @foreach ($editedrole as $erole)
                                                    @if ($erole->id == $user->id_role)
                                                        value="{{$erole->name}}"
                                                    @endif
                                                @endforeach
                                                disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>status</label>
                                                <input type="text" value="Active" class="form-control" disabled>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button id="submit_data" type="submit"
                                        class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Edit Profile</button>
                                        @if ($user->id_role != 1)
                                            <a href="/change-password/{{$user->id}}" class="btn btn-light">Change Password</a>
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
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
<!-- </div> -->
        <div class="modal fade" id="changePhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center mb-2">
                            <img id="preview-image-before-upload" class="rounded-circle" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" width="200px" height="200px" style="object-fit: cover">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" placeholder="Choose image" id="image">
                            <label class="input-group-text" for="uploadberita">Upload</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Edit</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </form>
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
