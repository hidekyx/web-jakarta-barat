<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.themewinter.com/html/digiqole/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jan 2020 20:06:13 GMT -->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>Produk Hukum</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--Favicon-->
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logos/dki-2.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url() ?>assets/images/logos/dki-2.png" type="image/x-icon">
	
	<!-- CSS
	================================================== -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	
	<!-- IconFont -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/iconfonts.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.theme.default.min.css">
	<!-- magnific -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">

	<!-- Template styles-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/responsive.css">
	
	<!-- Colorbox -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/colorbox.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
	
<body>

	<div class="main-nav clearfix" style="background: #323268;">
		<div class="container">
			<div class="row justify-content-center">
				<nav class="navbar navbar-expand-lg col-lg-8">
					<div class="site-nav-inner float-left">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
							<span class="fa fa-bars"></span>
						</button>
						<!-- End of Navbar toggler -->
						<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse text-center">
							<ul class="nav navbar-nav text-center">
								<li class="nav-item">
									<a href="<?php echo base_url(); ?>">Beranda</a>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle menu-dropdown" data-toggle="dropdown">Kategori <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu" role="menu">
									<li class="">
										<a href="<?php echo site_url('semua'); ?>">Semua</a>
									</li>
									<?php foreach($kategori as $kat_row){ ?>
										<li class="">
											<a href="<?php echo site_url('kategori/'.$kat_row->slug_cat); ?>"><?php echo $kat_row->nama_kat; ?></a>
										</li>
									<?php } ?>
									</ul><!-- End dropdown -->
								</li><!-- Features menu end -->

								<li class="nav-item dropdown active">
									
								</li>
								<li class="nav-item dropdown active">
									
								</li>
								<li class="nav-item dropdown active">
									
								</li>
							</ul><!--/ Nav ul end -->
						</div><!--/ Collapse end -->

					</div><!-- Site Navbar inner end -->
				</nav><!--/ Navigation end -->
				<div class="col-lg-4 text-right nav-social-wrap d-none d-sm-block">
					<b><h3 style="color: #ffff;margin-top: 5%;">Jakarta Barat Informasi Hukum</h3></b>
				</div>
				<div class="col-lg-4 text-right nav-social-wrap d-md-none" style="margin-top: 1%!important;">
					<b><p style="color: #ffff;margin-top: 5%;">Jakarta Barat Informasi Hukum</p></b>
				</div>
			</div><!--/ Row end -->
		</div><!--/ Container end -->
	</div><!-- Menu wrapper end -->
	<div class="gap-30"></div>
	<!-- ad banner start-->
	<div class="newsletter-area">
		<div class="container">
			<div class="ts-gutter-30 justify-content-center align-items-center">
				<!-- col end -->
				<form class="row" role="form" method="POST" enctype="form-data" action="<?php echo site_url('pencarian'); ?>">
				  <div class="form-group col-md-2">
				    <input type="number" class="form-control" name="nomor" id="exampleFormControlInput1" placeholder="Nomor">
				  </div>
				  <div class="form-group col-md-2">
				    <input type="number" class="form-control" name="tahun" id="exampleFormControlInput1" placeholder="Tahun">
				  </div>
				  <div class="form-group col-md-3">
				    <input type="text" class="form-control" name="tentang" id="exampleFormControlInput1" placeholder="Tentang">
				  </div>
				  <div class="form-group col-md-3">
				      <select id="inputState" class="form-control" name="categori">
				        <option selected value="">Kategori</option>
				        <?php foreach($kategori as $kat_row2){ ?>
				        <option value="<?php echo $kat_row2->id_kategori; ?>"><?php echo $kat_row2->nama_kat; ?></option>
				    	<?php } ?>
				      </select>
				   </div>
				   <div class="form-group col-md-2"> 
				      <button type="submit" class="btn" style="padding: none;">Cari</button>
				  </div>
				</form>
				<!-- col end -->
			</div>
			<!-- row  end -->
		</div>
	</div>
	<!-- post wraper start-->