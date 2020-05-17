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
    <title>Toko Rubik - Inbox</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Toko Rubik</p>
        </div>
    </div>

    <div id="main-wrapper">
        <?php $active['inbox'] = 'active' ?>
        <?php $this->load->view('dashboard/templates/navbar', $active) ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?= $this->session->flashdata('message') ?>
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Daftar Inbox</h3>
                    </div>
                    <?php if ($this->session->userdata('role') == 1) : ?>
                        <div class="col-md-7 align-self-center">
                            <button id="clear-inbox" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down">Clear All Inbox</button>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <?php foreach ($inboxes as $inbox) : ?>
                            <div class="card mt-2">
                                <div class="slide-header card-header text-white bg-info" style="cursor:pointer">
                                    <div class="row">
                                        <div class="col-6 pt-2">
                                            <h4 class="text-white"><?php if ($inbox['subject']) echo $inbox['subject'];
                                                                    else echo "No Subject"; ?></h4>
                                        </div>
                                        <div class="col-6 pt-2 text-right">
                                            <h4 class="text-white"><i class="mdi mdi-account"></i> <?= $inbox['name'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div id="<?= $inbox['id'] ?>" class="card-body" style="display:none">
                                    <div class="row">
                                        <div>
                                            <p class="p-3"><?= $inbox['message'] ?></p>
                                        </div>
                                        <?php if ($this->session->userdata('role') == 1) : ?>
                                            <div class="col text-right">
                                                <a href="<?= site_url('admin/delete_inbox?id=') . $inbox['id'] ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i> Delete this message</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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
    <script src="<?= base_url("assets/vendor/sweet-alert/sweetalert2.min.js") ?>"></script>
</body>
<script>
    $('document').ready(function() {
        $('.slide-header').click(function() {
            $('#' + $(this).closest('.card')[0].children[1].getAttribute('id')).slideToggle();
        })

        $('#clear-inbox').on('click', function() {
            Swal.fire({
                title: 'Yakin ingin menghapus semua pesan?',
                text: "Data yang terhapus akan hilang selamanya!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'Terhapus!',
                        text: "Data pesan berhasil dihapus.",
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(function() {
                        window.location.href = "<?= base_url("admin/delete_all") ?>";
                    });
                }
            })
        })
    })
</script>

</html>