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
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/cube.png") ?>">
    <title>Admin Pro Admin Template - The Ultimate Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/style.css") ?>" rel="stylesheet">
    <!-- page css -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/pages/error-pages.css") ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url("assets/vendor/admin-pro-lite-master/html/css/colors/default-dark.css") ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">

                <h1>4<img src="<?= base_url("assets/icon/cube.png") ?>" width="200" alt="">4</h1>
                <h3 class="text-uppercase"></h3>
                <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
                <?php if ($this->session->userdata('role') == 1 || $this->session->userdata('role') == 2) : ?>
                    <a href="<?= site_url('admin') ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a>
                <?php else : ?>
                    <a href="<?= site_url() ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a>
                <?php endif; ?>
            </div>
        </div>
    </section>
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
    <!--Wave Effects -->
    <script src="<?= base_url("assets/vendor/admin-pro-lite-master/html/js/waves.js") ?>"></script>
</body>

</html>