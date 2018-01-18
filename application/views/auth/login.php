<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Indorental - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url();?>assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url();?>assets/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-accpunt-pages">

        <!-- HOME -->
        <section>
            <div class="container">
    <div class="row">
        <div class="col-sm-12">

            <div class="wrapper-page">

                <div class="account-pages">
                    <div class="account-box">
                        <div class="account-logo-box">
                            <h2 class="text-uppercase text-center">
                                <a href="index.html" class="text-success">
                                    <span><img src="assets/images/logo_dark.png" alt="" height="18"></span>
                                </a>
                            </h2>
                            <h6 class="text-uppercase text-center font-bold mt-4">Halaman Login</h6>
                            <!-- <h6 class="text-uppercase text-center font-bold mt-4"><i class="mdi mdi-lastfm "></i></h6> -->
                        </div>
                        <div class="account-content">

                                <?php echo form_open('auth/authlog', 'class="form-login"'); ?>
                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="username" name="username" id="username" placeholder="Enter your username">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-gradient waves-effect waves-light" type="submit">Sign In</button>
                                    </div>
                                </div>

                            <?php echo form_close(); ?>

                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Tidak Punya Akun? <a href="<?php echo base_url('auth/nothing');?>" class="text-dark m-l-5"><b>Daftar</b></a></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card-box-->


            </div>
            <!-- end wrapper -->

        </div>
    </div>
</div>
        </section>
        <!-- END HOME -->


        <!-- jQuery  -->
        <script src="<?php echo base_url();?>assets/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/waves.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url();?>assets/assets/js/jquery.app.js"></script>

    </body>
</html>