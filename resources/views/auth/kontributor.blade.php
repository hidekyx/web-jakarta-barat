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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

<body class="horizontal-layout horizontal-menu navbar-static 1-column   footer-static bg-full-screen-image-kontributor  blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
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
												<h4 class="text-center mb-0">Selamat Datang, Kontributor</h4>
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
									<img class="img-fluid" src="{{url('assets/images/pages/faq-kontributor.png')}}" alt="branding logo">
								</div>
								<div class="col-12">
									<div class="divider">
										<div class="divider-text text-muted"><h3>FAQs</h3></div>
									</div>
								</div>
								<div class="col-12 mb-3">
									<div class="accordion" id="myAccordion">
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-1">
												<button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse-1">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Di mana narasi berita yang telah dikirim dipublikasikan?</div>
												</button>
											</h2>
											<div id="collapse-1" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Narasi berita akan dipublikasikan pada media sosial (instagram, facebook, twitter), 
														website Kota Jakarta Barat yang dikelola oleh Suku Dinas Komunikasi, Informatika dan Statistik Kota Administrasi Jakarta Barat 
														<a href="https://barat.jakarta.go.id/berita">https://barat.jakarta.go.id/berita</a> dan 
														website PPID Provinsi DKI Jakarta pada laman Siaran Pers Wilayah Jakbar 
														<a href="https://ppid.jakarta.go.id/siaran-pers-wilayah-jakbar">https://ppid.jakarta.go.id/siaran-pers-wilayah-jakbar</a>.
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-2">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-2">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Bagaimana saya mengirimkan narasi berita melalui dashboard Kontribusi Berita Jakarta Barat?</div>
												</button>
											</h2>
											<div id="collapse-2" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Cukup kunjungi laman <a href="https://barat.jakarta.go.id/kontributor">https://barat.jakarta.go.id/kontributor</a>. lalu isi dengan alamat e-mail dan password yang sudah dibagikan. 
														Klik ‘publikasi’ pada halaman utama website di sebelah kiri, lalu klik <b>berita</b>. Pilih <b>Tambah Berita</b> lalu isi jawaban yang sesuai.
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-3">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-3">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Apa yang perlu saya persiapkan sebelum mengirim narasi berita?</div>
												</button>
											</h2>
											<div id="collapse-3" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Yang perlu disiapkan sebelum mengirim narasi berita adalah;
														<ul>
															<li>Judul berita yang singkat, jelas dan langsung pada pokok pesan utama yang disampaikan.</li>
															<li>Naskah berita yang mengandung unsur 5W + 1H.</li>
															<li>Foto lampiran berupa satu foto utama terbaik beserta keterangan dan tiga foto pendukung dengan <b>masing-masing foto maksimal 2mb</b>. Pastikan foto yang dikirim tidak menggunakan timestamp dan berukuran 3:4 (Jika diperlukan dimensi yang lebih luas, disarankan menggunakan ukuran 16:9).</li>
														</ul>
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-4">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-4">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Apakah ada hal lain yang perlu diperhatikan saat mengirim berita?</div>
												</button>
											</h2>
											<div id="collapse-4" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Kontributor diharapkan melakukan rename nama pada dashboard website dengan format (Nama - Kelurahan/Kecamatan/UKPD).
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-5">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-5">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Bagaimana mempertahankan resolusi foto tetap baik saat mengirimkan foto lewat Whatsapp?</div>
												</button>
											</h2>
											<div id="collapse-5" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Saat berbagi foto di Whatsapp, pastikan mengirimkan foto sebagai dokumen.
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-6">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-6">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Apakah semua berita yang dikirimkan akan dipublikasikan?</div>
												</button>
											</h2>
											<div id="collapse-6" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Tidak semua berita yang telah dikirimkan akan dipublikasikan. Narasi berita yang memiliki nilai berita yang baik dan bukan bersifat seremonial memiliki peluang lebih besar untuk dipublikasikan. Contohnya adalah berita terkait kegiatan strategis daerah. Selain itu, narasi berita memiliki nilai lebih apabila didukung foto pendukung yang memiliki kualitas baik.
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-7">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-7">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Kapan saat yang tepat mengirim narasi berita?</div>
												</button>
											</h2>
											<div id="collapse-7" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
														Narasi berita baik dikirimkan secepatnya apabila semua materi yang dibutuhkan sudah lengkap. Hal ini menjadikan berita tersebut aktual.
													</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="heading-8">
												<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-8">
													<i class="bx bx-help-circle icon-help mr-1 mb-0" style="color: #4d74b8;"></i>
													<div style="font-size: 16px; color: #4d74b8; font-weight: 500;">Apa yang harus dilakukan apabila mengalami kendala atau kesulitan saat mengirim berita?</div>
												</button>
											</h2>
											<div id="collapse-8" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
												<div class="card-body">
													<p class="text-justify">
													Silahkan hubungi narahubung Laksmi (089692071141) atau Rendy (085655258817).
													</p>
												</div>
											</div>
										</div>
									</div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
