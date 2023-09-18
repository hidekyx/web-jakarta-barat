
			<div class="sidebar-widget featured-tab post-tab mb-20 col-md-3">
				<ul class="nav nav-tabs text-center">
					<li class="nav-item">
						<a class="nav-link animated active fadeIn" href="#post_tab_a" data-toggle="tab">
							<span class="tab-head">
								<span class="tab-text-title">Kategori</span>					
							</span>
						</a>
					</li>
				</ul>
				<div class="gap-50 d-none d-md-block"></div>
				<div class="row">
					<div class="col-12">
						<div class="tab-content">
							<div class="tab-pane active animated fadeInRight" id="post_tab_a">
								<div class="list-post-block">
									<ul class="list-post">
										<?php foreach($kategori as $kat_row){ ?>
										<li style="margin-bottom: 10px;">
											<div class="post-block-style media">
												<div class="post-content media-body">
													<p class="post-title">
														> <a href="<?php echo site_url('kategori/'.$kat_row->slug_cat); ?>" style="font-size: 15px;color: #4283ba;"><?php echo $kat_row->nama_kat; ?></a>
													</p>
												</div><!-- Post content end -->
											</div><!-- Post block style end -->
										</li><!-- Li 1 end -->
										<?php } ?>
									</ul><!-- List post end -->
								</div>
							</div><!-- Tab pane 1 end -->
						</div><!-- tab content -->
					</div>
				</div>
			</div><!-- widget end -->

			</div>
		</div>
		<!-- container end-->
	</section>
	<!-- .section -->