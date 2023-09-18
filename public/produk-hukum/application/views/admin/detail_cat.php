<div id="main">
            <div class="page-heading">
                <h3>Tambah Kategori</h3>
                <p class="text-subtitle text-muted">Jakarta Barat Produk Hukum</p>
            </div>
            <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" role="form" method="POST" enctype="form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="first-name-icon">Nama Kategori</label>
                                                        <div class="position-relative">
                                                            <input type="text" value="<?php echo $details->nama_kat; ?>" name="nama_kat" class="form-control"
                                                                id="first-name-icon" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-location-arrow"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                   
                                                <div class="col-12 d-flex" style="margin-top: 1%;">
                                                    <a href="<?php echo site_url('administrator/kategori') ?>"  class="btn btn-success me-1 mb-1"> << Kembali</a>
                                                    <input type="submit"
                                                        class="btn btn-primary me-1 mb-1" name="Simpan" value="Simpan">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script src="<?php echo base_url() ?>assets/jquery/jquery.min.js"></script>
                



            