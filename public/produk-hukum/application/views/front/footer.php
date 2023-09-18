<!-- ad banner end-->
	<div class="gap-30"></div>
	<div class="gap-30"></div>
	<!-- Footer start -->
	<div class="ts-footer">
		<div class="container">
			<div class="row ts-gutter-30 justify-content-lg-between justify-content-center">
				<div class="col-lg-4 col-md-6">
					<div class="footer-widtet">
						<h3 class="widget-title"><span>Tentang Kami</span></h3>
						<div class="widget-content">
							<ul class="ts-footer-info">
								<li><i class="fa fa-home"></i>Jalan Raya Kembangan No.2 Kota Jakarta Barat Provinsi DKI Jakarta</li>
								<li><i class="icon icon-phone2"></i>Telp : 021-5821740, Fax : 021-5821740</li>
								<li><i class="fa fa-envelope"></i>sekkojakbar@jakarta.go.id</li>
							</ul>			
						</div>
					</div>
				</div><!-- col end -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-widtet">
						<h3 class="widget-title"><span>Produk Hukum Terbaru</span></h3>
						<div class="widget-content">
							<div class="list-post-block">
								<ul class="list-post">
									<?php foreach($produk as $row){ ?>
									<li>
										<a href="<?php echo site_url('detail/'.$row->slug_cat.'/'.$row->id_produk); ?>" style="color: #ffff;"><small>> <?php echo $row->title; ?></small></a>
									</li><!-- Li 1 end -->
									<?php } ?>
								</ul><!-- list-post end -->
							</div>
						</div>
					</div>
				</div><!-- col end -->

				<div class="col-lg-4 col-md-6">
					<div class="footer-widtet">
						<h3 class="widget-title"><span>Link Terkait</span></h3>
						<div class="widget-content">
							<div class="list-post-block">
								<ul class="list-post">
									<li>
										<a href="https://jdih-itjen.kemenkumham.go.id/" style="color: #ffff;">> Kementerian Hukum dan HAM</a>
									</li><!-- Li 1 end -->
									<li>
										<a href="https://bphn.jdihn.go.id/" style="color: #ffff;">> Badan Pembinaan Hukum Nasional</a>
									</li><!-- Li 1 end -->
									<li>
										<a href="https://jdih.jakarta.go.id/" style="color: #ffff;">> JDIH Pemerintah Provinsi DKI Jakarta</a>
									</li><!-- Li 1 end -->
									<li>
										<a href="https://jdih.dprd-dkijakartaprov.go.id/" style="color: #ffff;">> JDIH DPRD Provinsi DKI Jakarta</a>
									</li><!-- Li 1 end -->
								</ul><!-- list-post end -->
							</div>
						</div>
					</div>
				</div><!-- col end -->
				
			</div><!-- row end -->
		</div><!-- container end -->
	</div>
	<!-- Footer End-->

	<!-- ts-copyright start -->
	<div class="ts-copyright">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-12 text-center">
					<div class="copyright-content text-light">
						<p>&copy; 2021 , PPID Kota Administrasi Jakarta Barat.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ts-copyright end-->

	<!-- backto -->
	<div class="top-up-btn">
		<div class="backto" style="display: block;"> 
			<a href="#" class="icon icon-arrow-up" aria-hidden="true"></a>
		</div>
	</div>
	<!-- backto end-->
	
	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<!-- Popper Jquery -->
	<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<!-- Bootstrap jQuery -->
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<!-- magnific-popup -->
	<script src="<?php echo base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Owl Carousel -->
	<script src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
	<!-- Color box -->
	<script src="<?php echo base_url() ?>assets/js/jquery.colorbox.js"></script>
	<!-- Template custom -->
	<script src="<?php echo base_url() ?>assets/js/custom.js"></script>
	
</body>

<!-- Mirrored from demo.themewinter.com/html/digiqole/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Jan 2020 20:06:14 GMT -->
</html>