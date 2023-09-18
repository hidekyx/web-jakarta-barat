
<!-- post wraper start-->
	<section class="trending-slider pb-0">
		<div class="container">
			<div class="row">
			<div class="col-lg-9">
				<div class="comments-area">
					<h3 class="block-title"><a href="<?php echo base_url(); ?>" style="color: #7f7d8b;"><i class="fa fa-home"></i> Beranda</a><span style="color: #323268;"> / Semua Produk Hukum</span></h3>
					<ul class="comments-list">

						<?php if($produk){ ?>
							<?php foreach($produk as $row){ ?>
							<li>
								<div class="comment">
									<img class="comment-avatar pull-left" alt="" src="<?php echo base_url() ?>assets/images/prokum.jpg">
									<div class="comment-body">
										<div class="meta-data link-tit">
											<a href="<?php echo site_url('detail/'.$row->slug_cat.'/'.$row->id_produk); ?>"><span class="comment-author"><?php echo $row->title; ?></span></a>
										</div>
										<div class="comment-content">
										<a href="<?php echo site_url('detail/'.$row->slug_cat.'/'.$row->id_produk); ?>" style="color: #918783!important;"><p><?php echo $row->detail; ?>.</p></a></div>
										<div class="text-left">
											<a class="comment-reply" href="<?php echo site_url('download/'.$row->id_produk); ?>" style="color: #585195;font-weight: bold;"><i class="fa fa-download"></i> Unduh</a>
										</div>	
									</div>
								</div><!-- Comments end -->
							</li><!-- Comments-list li end -->
							<?php } ?>
						<?php }else{ ?>
							<b><i><h3 class="text-center" style="margin-top: 20px;">Data Tidak Tersedia</h3></i></b>
						<?php } ?>

					</ul><!-- Comments-list ul end -->
				</div><!-- comment end -->

				<?php echo $pagination; ?>
				<!-- comment form -->
				<!-- ts-populer-post-box end-->
			</div>
