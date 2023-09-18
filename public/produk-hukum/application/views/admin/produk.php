<link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/simple-datatables/style.css">
<div class="flash-data" data-flash="<?php echo $this->session->flashdata('ubah'); ?>"></div>
<div class="flash-add" data-flash="<?php echo $this->session->flashdata('tambah'); ?>"></div>
<div class="flash-del" data-flash="<?php echo $this->session->flashdata('hapus'); ?>"></div>
<div id="main">
            <div class="page-heading">
                <h3>Produk Hukum</h3>
                <p class="text-subtitle text-muted">Jakarta Barat Produk Hukum</p>
            </div>
            <section class="section">
                    <div class="card">
                        <div style="margin-top: 15px;margin-left: 10px;"><a href="<?php echo base_url('administrator/produk-hukum/tambah'); ?>" class="btn-tambah" style="background: #64c09e!important;padding: 5px 10px;color: #ffff;"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Nomor</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center"><i class="fa fa-edit"></i></th>
                                        <th class="text-center"><i class="fa fa-trash"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no =1; ?>
                                    <?php foreach($produk as $row){ ?>
                                    <?php $dateUpload = DateTime::createFromFormat('Y-m-d', $row->tanggal); ?>
                                    <tr>
                                        <td class="text-center"><small><?php echo $no++; ?>.</small></td>
                                        <td class="text-center"><small><?php echo $row->title; ?></small></td>
                                        <td class="text-center"><small><?php echo $row->no_produk; ?></small></td>
                                        <td class="text-center"><small><?php echo $row->tahun; ?></small></td>
                                        <td class="text-center" style="width: 13.07086%;">
                                            <a href="<?php echo site_url('administrator/produk-hukum/ubah/'.$row->id_produk); ?>"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="text-center" style="width: 13.07086%;">
                                            <a href="<?php echo site_url('administrator/produk-hukum/hapus/'.$row->id_produk) ?>"><i class="fa fa-trash" style="color: red!important;"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                <script src="<?php echo base_url() ?>assets-admin/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>assets-admin/vendors/simple-datatables/simple-datatables.js"></script>
            <script>
                // Simple Datatable
                let table1 = document.querySelector('#table1');
                let dataTable = new simpleDatatables.DataTable(table1);
            </script>
            


            