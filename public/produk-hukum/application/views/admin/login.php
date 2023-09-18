<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pemkot Jakarta Pusat</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/pages/auth.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/js/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets-admin/css/custom.css">
</head>

<body>
    <div id="auth">
        <div class="flash-not" data-flash="<?php echo $this->session->flashdata('is_active'); ?>"></div>
        <div class="flash-null" data-flash="<?php echo $this->session->flashdata('unregistered'); ?>"></div>
        <div class="row h-100" style="margin-top: 5%;">
            <div class="col-lg-3 d-none d-lg-block">
            
            </div>
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                   <!--  <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title text-center" style="color: #323268!important;font-size: 45px;">Produk Hukum.</h1>
                    <p class="auth-subtitle mb-5 text-center" style="font-size: 1.2rem!important;color: #6f788b!important;">Jakarta Barat</p>

                    <form action="<?php echo base_url('administrator/login') ?>" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            <?php echo form_error('email', '<div class="error-form"><small>', '</small></div>'); ?>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <?php echo form_error('password', '<div class="error-form"><small>', '</small></div>'); ?>
                        </div>
                       
                        <button class="btn btn-primary btn-block btn-lg shadow-lg" style="background-color: #323268!important;border-color: #323268!important;">Log in</button>
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
            
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets-admin/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url() ?>assets-admin/js/myscript.js"></script>
</body>

</html>