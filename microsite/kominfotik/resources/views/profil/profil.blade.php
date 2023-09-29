<div class="px-2 px-md-4">
<div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('{{ asset('storage/assets/img/panel-header.jpg') }}');">
</div>
<div class="card card-body mx-3 mx-md-4 mt-n6">
<div class="row gx-4 mb-2">
    <div class="col-auto">
    <div class="avatar avatar-xl position-relative">
        <img src="{{ asset('storage/images/foto/'.$user->foto) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
    </div>
    </div>
    <div class="col-auto my-auto">
    <div class="h-100">
        <h5 class="mb-1">
        {{ $user->nama_lengkap }}
        </h5>
        <p class="mb-0 font-weight-normal text-sm">
        {{ $user->jabatan->nama_jabatan }}
        </p>
    </div>
    </div>
    <div class="col-auto my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
    @if ($logged_profile == true)
    <a href="{{ asset('/profil/password/'.$logged_user->username) }}"><button type="button" class="btn btn-primary mb-2 mx-4"><i class="material-icons ms-auto cursor-pointer">security</i> Edit Password</button></a>
    @endif
    </div>
</div>
@include('profil.info')
@if ($logged_profile == true && $id_role == 3)
    @include('profil.kegiatan')
@endif
@if ($logged_profile == false && $id_role != 3)
    @include('profil.kegiatan')
@endif
@include('profil.absensi')
</div>
</div>