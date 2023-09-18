<main class="main-content  mt-0">
<div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('storage/assets/img/login-bg.jpg'); }}');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
    <div class="row">
        <div class="col-lg-5 mx-auto">
        <div class="card z-index-0 fadeIn3 fadeInBottom">


            <!-- logo -->
            <div class="text-center mt-5 mb-3">
                <img src="storage/assets/img/logo.png" alt="Logo" width="70%" class="zoom">
            </div>


            <div class="card-body mt-0 pt-0 ">
            <form role="form" class="text-start" action="{{ asset('/autentikasi'); }}" method="post" enctype="multipart/form-data">
            @csrf
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="text-sm">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <!-- FORM INPUT EMAIL & PASSWORD -->
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required="required">
            </div>

            <div class="input-group input-group-outline mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" required="required">
            </div>
            <!-- FORM INPUT EMAIL & PASSWORD END -->


                <div class="form-group row">
                    <div class="col-md-7 captcha">
                        <span>{!! Captcha::img() !!}</span>
                        <button type="button" class="btn btn-sm btn-primary mb-0" class="reload" id="reload">&#x21bb;</button>
                    </div>
                    @push('scripts')
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $('#reload').click(function () {
                            $.ajax({
                                type: 'GET',
                                url: 'reload-captcha',
                                success: function (data) {
                                    $(".captcha span").html(data.captcha);
                                }
                            });
                        });
                    </script>
                    @endpush
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group border-bottom">
                            <input id="captcha" type="text" class="form-control" name="captcha" required="required" placeholder="Enter Captcha">
                        </div>
                    </div>
                </div>
                <div class="form-check form-switch d-flex align-items-center">
                    <input name="remember" class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label ms-2" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</main>

