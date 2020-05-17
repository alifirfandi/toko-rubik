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
    <title>Toko Rubik - Buat User</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

</head>

<body class="fix-header card-no-border fix-sidebar">

    <?php $active['users'] = 'active' ?>
    <?php $this->load->view('dashboard/templates/navbar', $active) ?>
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
                    <h3 class="text-themecolor">Create User</h3>
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
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <?= form_open('admin/create_user', 'class="form-horizontal form-material"') ?>
                            <!-- <form class="form-horizontal form-material" method="post"> -->
                            <div class="form-group">
                                <label class="col-md-12">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Nama Lengkap" class="form-control form-control-line" name="name" value="<?= set_value('name') ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan Username" class="form-control form-control-line" name="username" id="username" value="<?= set_value('username') ?>" required>
                                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <label class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="password" required>
                                </div>
                            </label>
                            <div class="form-group">
                                <label class="col-md-12">Phone</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Masukkan No Telepon" class="form-control form-control-line" name="phone" value="<?= set_value('phone') ?>" required>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('role') == 1) : ?>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Role</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="role" required>
                                            <option selected disabled value="">Pilih Role</option>
                                            <?php foreach ($roles as $role) : ?>
                                                <option value="<?= $role['id'] ?>" <?php if ($role['id'] == set_value('role')) echo 'selected' ?>><?= $role['role'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php else : ?>
                                <input type="hidden" name="role" value="3">
                            <?php endif; ?>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Create User</button>
                                </div>
                            </div>
                            </form>
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
</body>

</html>