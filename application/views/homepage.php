<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/cube.png") ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/bootstrap4/bootstrap.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/OwlCarousel2-2.2.1/owl.carousel.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/OwlCarousel2-2.2.1/owl.theme.default.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/OwlCarousel2-2.2.1/animate.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/main_styles.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/responsive.css") ?>">

	<!-- Material Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<style>
		.click-book {
			cursor: pointer;
		}
	</style>


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

		<!-- Home -->

		<div class="mt-5 products">
			<h2 class="text-center text-info">Available Rubik's Cube</h2>
			<div class="container mt-5">
				<span class="text-dark">Base</span>&ensp;
				<select id="select-base" class="m-3 select" name="state">
					<option value="All">All</option>
					<?php foreach ($bases as $base) : ?>
						<option value="<?= $base['id'] ?>"><?= $base['base'] ?></option>
					<?php endforeach; ?>
				</select>&emsp;
				<span class="text-dark">Merk</span>&ensp;
				<select id="select-merk" class="m-3 select" name="state">
					<option value="All">All</option>
					<?php foreach ($merks as $merk) : ?>
						<option value="<?= $merk['id'] ?>"><?= $merk['merk'] ?></option>
					<?php endforeach; ?>
				</select>
				<div class="row mt-4">
					<div class="col">
						<div id="product-container" class="product_grid row">
							<?php $i = 1 ?>
							<?php foreach ($products as $product) : ?>
								<!-- Product -->
								<div class="product">
									<div class="product_image"><img src="<?= base_url("assets/img/rubik/") . $product['img'] ?>" alt=""></div>
									<?php if ($i == 1) : ?>
										<div class="product_extra product_sale"><a class="text-white">New</a></div>
									<?php endif;
									$i++ ?>
									<div class="product_content">
										<div class="product_title"><a class="text-dark"><?= $product['name'] ?> <?= $product['base'] ?> <?= $product['merk'] ?></a></div>
										<div class="product_price">Rp <?= $product['price'] ?></div>
										<div class="mt-2 h6 text-danger">Stok : <?= $product['stok'] ?></div>
										<?php if ($this->session->userdata('role') == 3) : ?>
											<button class="click-book btn btn-warning" data-id="<?= $product['id'] ?>">Book</button>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Icon Boxes -->

		<div class="icon_boxes">
			<div class="container">
				<div class="row icon_box_row">

					<!-- Icon Box -->
					<div class="col-lg-4 icon_box_col">
						<div class="icon_box">
							<div class="icon_box_image"><img src="<?= base_url("assets/vendor/sublime/images/icon_1.svg") ?>" alt=""></div>
							<div class="icon_box_title">Free Book</div>
							<div class="icon_box_text">
								<p>Anda bisa membuking rubik yang anda inginkan secara gratis dengan menjadi member kami</p>
							</div>
						</div>
					</div>

					<!-- Icon Box -->
					<div class="col-lg-4 icon_box_col">
						<div class="icon_box">
							<div class="icon_box_image"><img src="<?= base_url("assets/vendor/sublime/images/icon_2.svg") ?>" alt=""></div>
							<div class="icon_box_title">Card Member</div>
							<div class="icon_box_text">
								<p>Anda akan mendapat kartu tanda member dengan mendaftar langsung ke kasir kami</p>
							</div>
						</div>
					</div>

					<!-- Icon Box -->
					<div class="col-lg-4 icon_box_col">
						<div class="icon_box">
							<div class="icon_box_image"><img src="<?= base_url("assets/vendor/sublime/images/icon_3.svg") ?>" alt=""></div>
							<div class="icon_box_title">High Quality Rubik's</div>
							<div class="icon_box_text">
								<p>Rubik yang dijual disini adalah rubik yang original dan berkualitas</p>
							</div>
						</div>
					</div>

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
	<script src="<?= base_url("assets/vendor/sublime/plugins/OwlCarousel2-2.2.1/owl.carousel.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/Isotope/isotope.pkgd.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/easing/easing.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/plugins/parallax-js-master/parallax.min.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sublime/js/custom.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sweet-alert/sweetalert2.min.js") ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>


	<?= $this->session->flashdata('alert') ?>
	<script>
		$(document).ready(function() {
			$('.select').select2({
				minimumResultsForSearch: -1,
				width: '110px'
			});
			$('.select').on('select2:select', function(e) {
				var base = $('#select-base').val();
				var merk = $('#select-merk').val();
				$('#product-container').load('<?= base_url("visitor/live_select?base=") ?>' + base + '&merk=' + merk);
			})

			$('.click-book').click(function() {
				var id = $(this).data('id');
				Swal.fire({
					title: 'Yakin membooking rubik ini?',
					text: "Booking tidak bisa dibatalkan sampai habis berlaku waktunya!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes!',
				}).then((result) => {
					if (result.dismiss != "cancel" && result.dismiss != "backdrop")
						window.location.href = "<?= site_url("member/book?id=") ?>" + id;
				})
			})
		})
	</script>
</body>

</html>