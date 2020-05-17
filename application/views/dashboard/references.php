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
    <title>Toko Rubik - Referensi</title>
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
        <?php $active['references'] = 'active' ?>
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
                        <h3 class="text-themecolor">References</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <span class="h4">Rubik Merk</span><button id="add" class="add btn waves-effect waves-light btn-danger pull-right">Add Merk</button>
                                <div class="table-responsive">
                                    <table class="table" id="table-bases">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Merk</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($merks as $merk) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $merk['merk'] ?></td>
                                                    <td><button class="edit btn btn-info" data-id="<?= $merk['id'] ?>" data-value="<?= $merk['merk'] ?>" data-key="merk"><i class="mdi mdi-pencil"></i> Edit</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <span class="h4">Rubik Base</span><button class="add btn waves-effect waves-light btn-danger pull-right">Add Base</button>
                                <div class="table-responsive">
                                    <table class="table" id="table-merk">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Base</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($bases as $base) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?= $base['base'] ?></td>
                                                    <td><button class="edit btn btn-info" data-id="<?= $base['id'] ?>" data-value="<?= $base['base'] ?>" data-key="base"><i class="mdi mdi-pencil"></i> Edit</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
    <script src="<?= base_url("assets/vendor/datatables/datatables.min.js") ?>"></script>
    <script>
        $('document').ready(function() {
            $('#table-bases').DataTable({
                "searching": false,
                "info": false
            });
            $('#table-merk').DataTable({
                "searching": false,
                "info": false
            });

            $(".add").on('click', function(event) {
                var key = jQuery(this).text().toLowerCase().substring(4);

                Swal.fire({
                    title: 'Input new ' + key,
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Add',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url("admin/create_reference") ?>",
                            data: {
                                'key': key,
                                'value': login
                            }
                        });
                    },
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Create Reference Success!',
                        })
                    }
                })
            })

            $('.edit').on('click', function() {
                var key = $(this).data('key');
                var id = $(this).data('id');
                var value = $(this).data('value');
                console.log(value);
                Swal.fire({
                    title: 'Edit ' + key,
                    input: 'text',
                    inputValue: value,
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url("admin/update_reference") ?>",
                            data: {
                                'key': key,
                                'id': id,
                                'value': login
                            }
                        });
                    },
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Update Reference Success!',
                        }).then(function() {
                            window.location.href = "<?= base_url("admin/references") ?>";
                        });
                    }
                })
            })
        })
    </script>
</body>


</html>