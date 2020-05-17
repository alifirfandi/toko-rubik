<?php
defined('BASEPATH') or exit('No direct script access allowed');
function roundCircle($select, $rubikSold)
{
    $sum = 0;
    foreach ($rubikSold as $rubik) {
        $sum += $rubik['jumlah'];
    }
    return round($select / $sum * 100, 1, PHP_ROUND_HALF_UP);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/icon.png") ?>">
    <title>Toko Rubik - Dashboard</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/chartist-js/dist/chartist.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/c3-master/c3.min.css") ?>">
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>">
    <!-- Dashboard 1 Page CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/pages/dashboard.css") ?>">
    <!-- Theme colors -->
    <link rel="stylesheet" href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme">

</head>

<body class="fix-header fix-sidebar card-no-border">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Toko Rubik</p>
        </div>
    </div>

    <div id="main-wrapper">

        <?php $active['dashboard'] = 'active' ?>
        <?php $this->load->view('dashboard/templates/navbar', $active) ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Sales overview chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h3 class="card-title m-b-5"><span class="lstick"></span>Grafik Penjualan</h3>
                                    </div>
                                    <div class="ml-auto">
                                        <span>Tahun 2020</span>
                                    </div>
                                </div>
                                <div id="sales-overview2" class="p-relative" style="height:360px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- visit charts-->
                    <!-- ============================================================== -->
                    <div class="col-lg-3 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><span class="lstick"></span>Rubik Terlaris</h4>
                                <div id="visitor" style="height:250px; width:100%;"></div>
                                <table class="table vm font-14">
                                    <tr>
                                        <td class="b-0"><?= $rubikSold[0]['produk'] ?></td>
                                        <td class="text-right font-medium b-0"><?= roundCircle($rubikSold[0]['jumlah'], $rubikSold) ?>%</td>
                                    </tr>
                                    <tr>
                                        <td><?= $rubikSold[1]['produk'] ?></td>
                                        <td class="text-right font-medium"><?= roundCircle($rubikSold[1]['jumlah'], $rubikSold) ?>%</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- Projects of the month -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h4 class="card-title"><span class="lstick"></span>5 Transaksi Terakhir</h4>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-20">
                                    <table class="table vm no-th-brd no-wrap pro-of-month">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Produk</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transaksiTerakhir as $last) : ?>
                                                <tr>
                                                    <td style="width:50px;"><span class="round"><img src="<?= base_url("assets/img/rubik/") . $last['img'] ?>" alt="product" width="50"></span></td>
                                                    <td>
                                                        <h6><?= $last['produk'] ?> <?= $last['base'] ?></h6><small class="text-muted"><?= $last['merk'] ?></small>
                                                    </td>
                                                    <td><?= $last['date'] ?></td>
                                                    <td><?= $last['qty'] ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- contact -->
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="card-title"><span class="lstick"></span>Rubik Terbaru</h4>
                                </div>
                                <div class="table-responsive m-t-9">
                                    <table class="table vm no-th-brd no-wrap pro-of-month">
                                        <thead>
                                            <tr>
                                                <th class="h5"><?= $produkTerakhir['name'] ?> <?= $produkTerakhir['base'] ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="width:100px;"><span class="round"><img src="<?= base_url("assets/img/rubik/") . $produkTerakhir['img'] ?>" alt="user" width="70"></span></td>
                                                <td>
                                                    <p class="mt-4 h5"><?= $produkTerakhir['merk'] ?></p>
                                                </td>
                                                <td>
                                                    <p class="mt-4 h5">Rp <?= $produkTerakhir['price'] ?></p>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h4 class="card-title"><span class="lstick"></span>Account Information</h4>
                                </div>
                                <div class="message-box contact-box">
                                    <div class="message-widget contact-widget">
                                        <?php if ($this->session->userdata('role') == 1) : ?>
                                            <h2 class="text-success"><i class="mdi mdi-account"></i> <?= $this->session->userdata('name') ?></h2>
                                        <?php else : ?>
                                            <h1 class="text-success"><i class="mdi mdi-calculator"></i> <?= $this->session->userdata('name') ?></h1>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </div>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap popper Core JavaScript -->
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/chartist-js/dist/chartist.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js") ?>"></script>
    <!--c3 JavaScript -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/d3/d3.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/c3-master/c3.min.js") ?>"></script>
    <!-- Chart JS -->
    <script>
        // $(document).on("click", ".c3-tooltip-name--Megaminx-Stickerless-YongJun", function() {
        //     var child = $(this).parent();
        //     console.log(child)
        // });
        $(function() {
            "use strict";
            // ============================================================== 
            // Sales overview
            // ============================================================== 
            new Chartist.Line('#sales-overview2', {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [{
                    meta: "Sold",
                    data: [<?= $jan ?>, <?= $feb ?>, <?= $mar ?>, <?= $apr ?>, <?= $may ?>]
                }]
            }, {
                low: 0,
                high: 500,
                showArea: true,
                divisor: 10,
                lineSmooth: false,
                fullWidth: true,
                showLine: true,
                chartPadding: 30,
                axisX: {
                    showLabel: true,
                    showGrid: false,
                    offset: 50
                },
                plugins: [
                    Chartist.plugins.tooltip()
                ],
                // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
                axisY: {
                    onlyInteger: true,
                    showLabel: true,
                    scaleMinSpace: 50,
                    showGrid: true,
                    offset: 10,
                    labelInterpolationFnc: function(value) {
                        return value
                    },

                }

            });
            // ============================================================== 
            // Visitor
            // ============================================================== 

            var chart = c3.generate({
                bindto: '#visitor',
                data: {
                    columns: [
                        ['<?= $rubikSold[3]['produk'] ?>', <?= $rubikSold[3]['jumlah'] ?>],
                        ['<?= $rubikSold[2]['produk'] ?>', <?= $rubikSold[2]['jumlah'] ?>],
                        ['<?= $rubikSold[1]['produk'] ?>', <?= $rubikSold[1]['jumlah'] ?>],
                        ['<?= $rubikSold[0]['produk'] ?>', <?= $rubikSold[0]['jumlah'] ?>],
                    ],

                    type: 'donut',
                    onclick: function(d, i) {
                        console.log("onclick", d, i);
                    },
                    onmouseover: function(d, i) {
                        console.log("onmouseover", d, i);
                    },
                    onmouseout: function(d, i) {
                        console.log("onmouseout", d, i);
                    }
                },
                donut: {
                    label: {
                        show: false
                    },
                    title: "Favorite",
                    width: 20,

                },

                legend: {
                    hide: true
                    //or hide: 'data1'
                    //or hide: ['data1', 'data2']
                },
                color: {
                    pattern: ['#eceff1', '#745af2', '#26c6da', '#1e88e5']
                }
            });
        });
    </script>
</body>

</html>