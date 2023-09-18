<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                <div class="card-body">
                    <div class="pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Login Jakarta Barat</h5>
                        <p class="text-center small">Isikan email dan password anda di bawah ini</p>
                    </div>
                    <hr class="mt-0">
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        Email atau Password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form class="row g-3 needs-validation" method="post" action="{{ asset('/dashboard/autentikasi') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Isi email" required>
                            <div class="invalid-feedback">Email harus diisi!</div>
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Isi password" required>
                            <div class="invalid-feedback">Password harus diisi!</div>
                        </div>
                        <div class="col-12 captcha">
                            <span>{!! Captcha::img() !!}</span>
                            <button type="button" class="btn btn-sm btn-primary mb-0" class="reload" id="reload">&#x21bb;</button>
                        </div>
                        @push('scripts')
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
                        <div class="col-12">
                            <div class="input-group">
                                <input id="captcha" type="text" class="form-control" name="captcha" placeholder="Isi captcha" required>
                                <div class="invalid-feedback">Captcha harus diisi</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                </div>
                <div class="credits text-center">
                    &copy; 2023 Copyright <strong><span>Sudis Kominfotik Jakarta Barat</span></strong>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>
</main>