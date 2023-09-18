<!-- post wraper start-->
	<section class="trending-slider pb-0">
		<div class="container">
			<div class="row">
			<div class="col-lg-9">
				<div class="comments-area">
					<h3 class="block-title"><a href="<?php echo base_url(); ?>" style="color: #7f7d8b;"><i class="fa fa-home"></i> Beranda</a><span style="color: #323268;"> / Produk Hukum / Produk Hukum Detail</span></h3>
					<ul class="comments-list">
						<?php $dateUpload = DateTime::createFromFormat('Y-m-d', $produk->tanggal); ?>
						<h3>DETAIL DATA</h3><br>
						<p><b>Kategori:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $produk->nama_kat; ?></span></p><br>
						<p><b>Nomor:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $produk->no_produk; ?></span></p><br>
						<p><b>Tahun:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $produk->tahun; ?></span></p><br>
						<p><b>Tentang:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $produk->detail; ?></span></p><br>
						<p><b>Tanggal Upload:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $dateUpload->format('j M Y'); ?></span></p><br>
						<p><b>Download:</b> <span style="color: #1c0caa; font-weight: bold;"><?php echo $produk->views; ?></span></p><br>
						<a href="<?php echo site_url('download/'.$produk->id_produk); ?>" class="btn btn-danger" style="background: #2b897c;border-color: #2b897c;"><i class="fa fa-download"></i> Unduh Produk Hukum</a>

					</ul><!-- Comments-list ul end -->
				</div><!-- comment end -->
				<!-- comment form -->
				<!-- ts-populer-post-box end-->
			</div>
