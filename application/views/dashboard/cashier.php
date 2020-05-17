<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/icon.png") ?>">
    <title>Toko Rubik - Kasir</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>" rel="stylesheet">
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

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
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Toko Rubik</p>
        </div>
    </div>

    <div id="main-wrapper">
        <?php $active['cashier'] = 'active' ?>
        <?php $this->load->view('dashboard/templates/navbar', $active) ?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <?= $this->session->flashdata('message') ?>
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Halaman Kasir</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>Cek Kode Booking</h2>
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" class="form-control" placeholder="Masukkan kode booking disini" id="code">
                                    </div>
                                    <div class="col-1">
                                        <button id="search-booked" class="btn btn-success">Cari</button>
                                    </div>
                                </div>
                                <div id="container-booked">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <?= form_open() ?>
                            <div class="card-body">
                                <h3>Pembelian</h3>
                                <div id="pembelian" style="border-bottom: 1px solid">
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h3 class="mt-3 text-right">Total</h3>
                                    </div>
                                    <div class="col-4">
                                        <input type="hidden" value="0" id="total-price">
                                        <h2 class="mt-3 text-info">Rp <span id="print-price">0</span></h2>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="confirmation text-center mt-3 btn btn-success" hidden>Konfirmasi</button>
                                        <button id="submit" class="text-center mt-3 btn btn-info" name="button">Proses Pembelian</button>
                                        <button id="cancel" class="confirmation text-center mt-3 btn btn-danger" hidden>Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="p-2" style="height: 75vh; overflow-y: scroll;">
                                <input id="keyword" type="text" class="p-3 form-control" placeholder="Search Product Here">
                                <div id="container-products">
                                    <?php foreach ($products as $product) : ?>
                                        <div class="row no-gutters mt-3" style="border: 1px solid; border-radius: 10px;">
                                            <div class="col-md-4">
                                                <img src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" class="card-img" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $product['name'] . ' ' . $product['base'] ?></h5>
                                                    <p class="card-text"><?= $product['merk'] ?></p>
                                                    <button class="add btn btn-primary" data-id="<?= $product['id'] ?>" data-stok="<?= $product['stok'] ?>" data-src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" data-price="<?= $product['price'] ?>">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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

    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/js/popper.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/perfect-scrollbar.jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/waves.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/sidebarmenu.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/custom.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/sweet-alert/sweetalert2.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/datatables/datatables.min.js") ?>"></script>
    <script>
        $('document').ready(function() {

            $('#submit').click(function(e) {
                e.preventDefault();
                if ($(this).closest('.card-body').children()[1].children.length == 0) {
                    Swal.fire(
                        'Produk Kosong!',
                        'Silahkan pilih produk!',
                        'error'
                    )
                } else {
                    $(this).attr("hidden", "hidden");
                    $('.confirmation').removeAttr("hidden");
                }
            })

            $('#cancel').click(function(e) {
                e.preventDefault();
                $('.confirmation').attr("hidden", "hidden");
                $('#submit').removeAttr("hidden");
            })

            $('#keyword').on('keyup', function() {
                $('#container-products').load('<?= base_url("admin/live_search?search=") ?>' + $('#keyword').val());
            })

            $('#search-booked').on('click', function() {
                $('#container-booked').load('<?= base_url("admin/search_booked?search=") ?>' + $('#code').val());
            })

            $(document).on("keyup", ".stok", function() {
                var qty = $(this).val();
                var price = $(this).closest('.row')[0].children[1].value;
                price = parseInt(price.split(".").join(""))
                var result = qty * price;
                console.log(result);

                $(this).closest('.row')[0].children[2].value = result;

                var totalPrice = $('.total-price');
                var resultPrice = 0;
                for (var i = 0; i < totalPrice.length; i++) {
                    resultPrice += parseInt(totalPrice[i].value)
                }
                var number_string = resultPrice.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                $('#print-price').text(rupiah);
            });

            $('.add').click(function() {
                var id = $(this).data('id');
                var stok = $(this).data('stok');
                var src = $(this).data('src');
                var price = $(this).data('price');
                var parent = $(this).parent();
                var name = jQuery(parent[0].children[0]).text();
                var merk = jQuery(parent[0].children[1]).text();
                $(this).attr('disabled', 'disabled');

                var template = `
                    <div class="row no-gutters mt-3">
                        <input type="hidden" value="${id}" name="id[]" />
                        <input type="hidden" value="${price}" class="price" />
                        <input type="hidden" value="0" class="total-price" />
                        <div class="col-md-2">
                            <img src="${src}" class="card-img" alt="image" />
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">${name}</h5>
                                <p class="card-text">${merk}</p>
                                <p class="card-text">Rp ${price}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">&emsp;Stok : ${stok}</h5>
                                <div class="col-md-12 InputAddOn">
                                    <span class="InputAddOn-item">qty</span>
                                    <input type="number" min="1" max="${stok}" placeholder="Jumlah" class="stok InputAddOn-field form-control form-control-line" name="qty[]" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button class="cancel btn btn-danger" data-id="${id}">X Cancel</button>
                        </div>
                    </div>
                `;
                $("#pembelian").append(template);
            });

            $(document).on("click", ".cancel", function() {
                var id = $(this).data("id");
                var totalPrice = $('.total-price');
                var resultPrice = 0;
                var getProductSide = $(this).parents()[7].children[1].children[0].children[0].children[1].children;
                for (var i = 0; i < totalPrice.length; i++) {
                    resultPrice += parseInt(totalPrice[i].value)
                }

                var thisPrice = $(this).closest('.row')[0].children[2].value;
                resultPrice = resultPrice - parseInt(thisPrice);

                var number_string = resultPrice.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                $('#print-price').text(rupiah);
                for (let i = 0; i < getProductSide.length; i++) {
                    var getButton = getProductSide[i].children[1].children[0].children[2];
                    if (id == getButton.dataset.id) {
                        getButton.removeAttribute("disabled");
                    }
                }
                $(this).closest('.row').remove();
            });
        })
    </script>
</body>


</html>