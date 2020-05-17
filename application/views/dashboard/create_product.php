<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/icon.png") ?>">
    <title>Toko Rubik - Buat Produk</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <style>
        .InputAddOn {
            display: flex;
            margin-bottom: 1.5em;
        }

        .InputAddOn-field {
            flex: 1;
        }

        .InputAddOn-field:not(:first-child) {
            border-left: 0;
        }

        .InputAddOn-field:not(:last-child) {
            border-right: 0;
        }

        .InputAddOn-item {
            background-color: rgba(147, 128, 108, 0.1);
            color: #666666;
            font: inherit;
            font-weight: normal;
        }

        .InputAddOn-field,
        .InputAddOn-item {
            border: 1px solid rgba(147, 128, 108, 0.25);
            padding: 0.5em 0.75em;
        }

        .InputAddOn-field:first-child,
        .InputAddOn-item:first-child {
            border-radius: 2px 0 0 2px;
        }

        .InputAddOn-field:last-child,
        .InputAddOn-item:last-child {
            border-radius: 0 2px 2px 0;
        }
    </style>
</head>

<body class="fix-header card-no-border fix-sidebar">

    <?php $this->load->view('dashboard/templates/navbar') ?>

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Create Product</h3>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <?= form_open_multipart('admin/create_product', 'class="form-horizontal form-material"') ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><span class="lstick"></span>Upload Foto Rubik</h4>
                            <input type="file" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" required>
                            <center class="m-t-30"> <img class="img-circle" width="150" height="150" id="image" /></center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <!-- <form class="form-horizontal form-material" method="post"> -->
                            <div class="form-group">
                                <label class="col-md-12">Nama Rubik</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Rubik" class="form-control form-control-line" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Harga</label>
                                <div class="col-md-12 InputAddOn">
                                    <span class="InputAddOn-item">Rp</span>
                                    <input type="text" placeholder="Masukkan Harga" class="uang InputAddOn-field form-control form-control-line" name="price" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Stok</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Stok" class="form-control form-control-line" name="stok" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Base</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="base" required>
                                        <option selected disabled value="">Pilih Base</option>
                                        <?php foreach ($bases as $base) : ?>
                                            <option value="<?= $base['id'] ?>"><?= $base['base'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Select Merk</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="merk" required>
                                        <option selected disabled value="">Pilih Merk</option>
                                        <?php foreach ($merks as $merk) : ?>
                                            <option value="<?= $merk['id'] ?>"><?= $merk['merk'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Create Product</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/js/popper.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/perfect-scrollbar.jquery.min.js") ?>"></script>
    <!--Wave Effects -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/waves.js") ?>"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/sidebarmenu.js") ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/custom.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/mask-money/jquery.mask.js") ?>"></script>

    <script>
        $('document').ready(function() {
            $('.uang').mask('000.000.000', {
                reverse: true
            });
        })
    </script>
</body>

</html>