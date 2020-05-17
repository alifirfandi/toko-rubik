<!DOCTYPE html>
<html lang="en">

<head>
	<title>Booked</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/cube.png") ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/bootstrap4/bootstrap.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/cart.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/cart_responsive.css") ?>">

	<!-- Material Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<header class="header">
			<div class="header_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="header_content d-flex flex-row align-items-center justify-content-start">
								<div class="logo"><a href="<?= site_url() ?>">Rubik's St<img src="<?= base_url("assets/icon/icon.png") ?>" width="30px">re</a></div>

								<?php $this->load->view('templates/nav') ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Menu -->

		<div class="menu menu_mm trans_300">
			<div class="menu_container menu_mm">
				<div class="page_menu_content">

					<div class="page_menu_search menu_mm">
						<form action="#">
							<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
						</form>
					</div>
					<ul class="page_menu_nav menu_mm">
						<li class="page_menu_item menu_mm"><a href="<?= site_url() ?>">Home<i class="fa fa-angle-down"></i></a></li>
						<li class="page_menu_item menu_mm"><a href="<?= site_url("contact") ?>">Contact<i class="fa fa-angle-down"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		</div>

		<!-- Cart Info -->

		<div class="cart_info mt-5">
			<h2 class="text-center text-info">List Booked Rubik's</h2>
			<div class="container">
				<?php if (empty($booked)) : ?>
					<h3 class="mt-5 text-center text-secondary">List Empty</h3>
				<?php endif; ?>
				<?php foreach ($booked as $book) : ?>
					<div class="card mt-5">
						<div class="card-header text-white bg-success">
							<div class="row">
								<div class="col-6 pt-2">
									<h4>ID-<?= str_pad($book['id_book'], 8, '0', STR_PAD_LEFT) ?></h4>
								</div>
								<div class="col-6 pt-2 text-right">
									<h4>Kode Booking : <?= $book['code'] ?></h4>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 text-center">
									<img class="img-thumbnail" src="<?= base_url("assets/img/rubik/") . $book['img'] ?>" alt="" width="250">
								</div>
								<div class="col-md-6 pt-4">
									<h2 class="card-title text-dark"><?= $book['name'] ?> <?= $book['base'] ?></h2>
									<h3 class="card-text"><?= $book['merk'] ?></h3>
									<h3 class="text-primary">Rp <?= $book['price'] ?></h3>
								</div>
							</div>
						</div>
						<div class="card-footer text-white bg-danger">
							Deadline : <?= $book['deadline'] ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">Sublime.</a></div>
						<div class="copyright ml-auto mr-auto">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a> And Modified by Alif Irfandi
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</div>
						<div class="logo footer_social ml-lg-auto"><a href="#">Rubik's St<img src="<?= base_url("assets/icon/icon.png") ?>" width="30px">re</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<script src="<?= base_url("assets/vendor/sublime/js/jquery-3.2.1.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/styles/bootstrap4/popper.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/styles/bootstrap4/bootstrap.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/greensock/TweenMax.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/greensock/TimelineMax.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/scrollmagic/ScrollMagic.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/greensock/animation.gsap.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/greensock/ScrollToPlugin.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/easing/easing.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/parallax-js-master/parallax.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/js/cart.js") ?>"></script>
</body>

</html>