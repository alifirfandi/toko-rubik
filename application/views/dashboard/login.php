<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= base_url("assets/icon/icon.png") ?>>" />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/bootstrap/css/bootstrap.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/animate/animate.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/css-hamburgers/hamburgers.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/animsition/css/animsition.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/select2/select2.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/vendor/daterangepicker/daterangepicker.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/css/util.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/login/css/main.css") ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.1.45/css/materialdesignicons.css" integrity="sha256-S4gGutpwAQwjSxN3yTYGZonsC63Xx5TdIVxEXn3g4U4=" crossorigin="anonymous" />
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<div class="row">
					<div class="alert col-4"><a href="<?= site_url() ?>" style="font-size: 18px"><i class="mdi mdi-arrow-left"></i> <b>Back</b></a></div>
					<div class="col-8"><?= $this->session->flashdata('message') ?></div>
				</div>
				<?= form_open('auth/login', 'class="login100-form validate-form flex-sb flex-w"') ?>
				<span class="login100-form-title p-b-32">
					Account Login
				</span>
				<span class="txt1 p-b-11">
					Username
				</span>
				<div class="wrap-input100 validate-input m-b-36" data-validate="Username is required">
					<input class="input100" type="text" name="username">
					<span class="focus-input100"></span>
				</div>

				<span class="txt1 p-b-11">
					Password
				</span>
				<div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
					<span class="btn-show-pass">
						<i class="fa fa-eye"></i>
					</span>
					<input class="input100" type="password" name="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="mt-3 login100-form-btn">
						Login
					</button>
				</div>

				<h6 class="mt-4 text-danger">Belum punya akun ? <br>Silahkan mendaftar secara langsung dengan kasir</h6>
				<?= form_close() ?>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<script src="<?= base_url("assets/vendor/login/vendor/jquery/jquery-3.2.1.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/animsition/js/animsition.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/bootstrap/js/popper.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/bootstrap/js/bootstrap.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/select2/select2.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/daterangepicker/moment.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/daterangepicker/daterangepicker.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/vendor/countdowntime/countdowntime.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/login/js/main.js") ?>"></script>

</body>

</html>