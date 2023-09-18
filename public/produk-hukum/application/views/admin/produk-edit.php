<link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/bootstrap-datepicker/dist/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/summernote/summernote-lite.min.css">
<?php $tanggal = DateTime::createFromFormat('Y-m-d', $produk->tanggal); ?>
<div class="flash-not" data-flash="<?php echo $this->session->flashdata('gagal'); ?>"></div>
<div id="main">
            <div class="page-heading">
                <h3>Tambah Produk Hukum</h3>
            </div>
            <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" role="form" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Judul:</label>
                                                        <div class="position-relative">
                                                            <input type="text" name="title" value="<?php echo $produk->title; ?>" class="form-control"id="first-name-icon" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label>Tentang:</label>
                                                        <div class="position-relative">
                                                            <textarea name="desc" class="form-control" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong!')" oninput="setCustomValidity('')" style="height: 100px;"><?php echo $produk->detail; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12 row">
                                                    <label>Tanggal Upload:</label>
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control datetimepicker-input" value="<?php echo $tanggal->format('d-m-Y') ?>" id="datepicker" data-toggle="datetimepicker" name="tanggal" data-target="#datepicker" required>
                                                            <div class="form-control-icon">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Nomor:</label>
                                                        <div class="position-relative">
                                                            <input type="number" name="nomor" value="<?php echo $produk->no_produk; ?>" class="form-control"id="first-name-icon" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label>Tahun:</label>
                                                        <div class="position-relative">
                                                            <input type="number" name="tahun" value="<?php echo $produk->tahun; ?>" class="form-control"id="first-name-icon" required oninvalid="this.setCustomValidity('Tidak Boleh Kosong!')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12 row">
                                                    <label>Kategori:</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-select" name="kategori" id="basicSelect" required>
                                                        <option value="">--- Pilih Kategori ---</option>
                                                        <?php foreach($kategori as $kategoris){ ?>
                                                            <option value="<?php echo $kategoris->id_kategori; ?>" <?php if($kategoris->id_kategori == $produk->cat_id){ ?> selected <?php } ?>><?php echo $kategoris->nama_kat; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6 col-12 row">
                                                    <label>File:</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupFile01"><i
                                                                    class="bi bi-upload"></i></label>
                                                            <input type="file" class="form-control" id=" upload_rider" name="path_file" value="<?php echo $produk->path ?>" onchange="loadFile(event)">
                                                            <a href="<?php echo base_url($produk->path); ?>" style="margin-left: 10px;"><i class="fa fa-download"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex" style="margin-top: 4%;">
                                                    <a href="<?php echo site_url('administrator/produk-hukum') ?>"  class="btn btn-success me-1 mb-1"> << Kembali</a>
                                                    <input type="submit"
                                                        class="btn btn-primary me-1 mb-1" name="simpan" value="Simpan">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script src="<?php echo base_url() ?>assets-admin/jquery/jquery.min.js"></script>
                <script src="<?php echo base_url() ?>assets-admin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                <script src="<?php echo base_url() ?>assets-admin/js/admin/news.js"></script>
                <script src="<?php echo base_url() ?>assets-admin/vendors/ckeditor/ckeditor.js"></script>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>

                <script src="assets/js/main.js"></script>
                <script type="text/javascript">
                    $(function () {
                        $('#datetimepicker4').datetimepicker({
                            format: 'DD/MM/YYYY',
                        });
                    });
                </script>
                <script type="text/javascript">
                    $(function() {
                      $('#datepicker').datepicker({
                        format: 'dd-mm-yyyy',
                        endDate: "today",
                        autoclose: true
                      });
                      // Time Picker Initialization
                    });
                  </script>



            