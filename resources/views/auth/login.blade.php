<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="Login Admin Dashboard - Jakarta Barat">
	<meta name="keywords" content="Login Admin Dashboard - Jakarta Barat">
	<meta name="author" content="PIXINVENT">
	<title>LOGIN Dashboard - Jakarta Barat</title>

    <link rel="icon" href="{{asset('assets/images/logo/logo_jakbar.png')}}"
    type = "image/x-icon">
	<!-- <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}"> -->
	<!-- <link rel="shortcut icon" href="https://asean.org/storage/2015/12/asean_favicon.png" type="image/x-icon"> -->
	<!-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}"> -->
	<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">


	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/authentication.css')}}">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	 <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu navbar-static 1-column   footer-static bg-full-screen-image  blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<!-- login page start -->
				<section id="auth-login" class="row flexbox-container">
					<div class="col-xl-8 col-11">
						<div class="card bg-authentication mb-0">
							<div class="row m-0">
								<!-- left section-login -->
								<div class="col-md-6 col-12 px-0">
									<div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
										<div class="card-header pb-1">
											<div class="card-title">
												<h4 class="text-center mb-0">Selamat Datang</h4>
											</div>
										</div>
										<div class="card-body">
											<div class="divider">
												<div class="divider-text text-uppercase text-muted"><small>Login menggunakan email</small>
												</div>
											</div>

											<form action="{{ route('login') }}" method="post">
                							@csrf
                							@if(session('errors'))
						                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
													Ada kesalahan:
						                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						                                <span aria-hidden="true">×</span>
						                            </button>
						                            <ul>
						                            @foreach ($errors->all() as $error)
						                            <li>{{ $error }}</li>
						                            @endforeach
						                            </ul>
						                        </div>
						                    @endif
						                    @if (Session::has('success'))
						                        <div class="alert alert-success">
						                            {{ Session::get('success') }}
						                        </div>
						                    @endif
						                    @if (Session::has('error'))
						                        <div class="alert alert-danger">
						                            {{ Session::get('error') }}
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						                                <span aria-hidden="true">×</span>
						                            </button>
						                        </div>
						                    @endif
												<div class="form-group mb-50">
													<label class="text-bold-600" for="exampleInputEmail1">Alamat Email</label>
													<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat Email" name="email" required="required"></div>
												<div class="form-group">
													<label class="text-bold-600" for="exampleInputPassword1">Password</label>
													<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="required">
												</div>
												<div class="form-group row">
													<label for="captcha" class="col-md-4 col-form-label">Captcha</label>
													<div class="col-md-7 captcha">
														<span>{!! Captcha::img() !!}</span>
														<button type="button" class="btn btn-sm btn-primary mb-0" class="reload" id="reload">&#x21bb;</button>
													</div>
												</div>
												<div class="form-group row">
													<label for="captcha" class="col-md-4 col-form-label">Enter Captcha</label>
													<div class="col-md-6">
														<div class="input-group input-group-outline">
															<input id="captcha" type="text" class="form-control" name="captcha" required="required">
														</div>
													</div>
												</div>
												<div class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center mt-0">
													<div class="text-left">
														<div class="checkbox checkbox-sm">
															<input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
															<label class="checkboxsmall" for="exampleCheck1"><small>Keep me logged
																	in</small></label>
														</div>
													</div>
												</div>
												<button type="submit" class="btn btn-primary glow w-100 position-relative">Login<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
											</form>
											<hr>

										</div>
									</div>
								</div>
								<!-- right section image -->
								<div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
									<img class="img-fluid" src="{{url('assets/images/pages/login.png')}}" alt="branding logo">
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- login page ends -->

			</div>
		</div>
	</div>
	<!-- END: Content-->
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

	<!-- BEGIN: Vendor JS-->
	<script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
	<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js')}}"></script>
	<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js')}}"></script>
	<script src="{{asset('app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js')}}"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="{{asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="{{asset('app-assets/js/scripts/configs/horizontal-menu.js')}}"></script>
	<script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
	<script src="{{asset('app-assets/js/core/app.js')}}"></script>
	<script src="{{asset('app-assets/js/scripts/components.js')}}"></script>
	<script src="{{asset('app-assets/js/scripts/footer.js')}}"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<!-- END: Page JS-->
    @stack('scripts')
</body>
<!-- END: Body-->

</html>
