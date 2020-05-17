<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/icon/cube.png") ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/bootstrap4/bootstrap.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/plugins/font-awesome-4.7.0/css/font-awesome.min.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/contact.css") ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/vendor/sublime/styles/contact_responsive.css") ?>">

	<!-- Material Icons -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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

		<!-- Contact -->

		<div class="mt-5 contact">
			<div class="container">
				<div class="row">

					<!-- Get in touch -->
					<div class="col-lg-8 contact_col">
						<div class="get_in_touch">
							<div class="section_title">Get in Touch</div>
							<div class="section_subtitle">Say hello</div>
							<div class="contact_form_container">
								<?= form_open() ?>
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="contact_name">First Name*</label>
										<input type="text" id="contact_name" class="contact_input uang" required="required" name="firstName">
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name">Last Name*</label>
										<input type="text" id="contact_last_name" class="contact_input" required="required" name="lastName">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Subject</label>
									<input type="text" id="contact_company" class="contact_input" name="subject">
								</div>
								<div>
									<label for="contact_textarea">Message*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required" name="message"></textarea>
								</div>
								<button class="button contact_button"><span>Send Message</span></button>
								</form>
							</div>
						</div>
					</div>

					<!-- Contact Info -->
					<div class="col-lg-3 offset-xl-1 contact_col">
						<div class="contact_info">
							<div class="contact_info_section">
								<div class="contact_info_title">Information</div>
								<ul>
									<li>Phone: <span>+62 838 098 1478</span></li>
									<li>Email: <span>customer_rubik@store.com</span></li>
								</ul>
							</div>
							<div class="contact_info_section">
								<div class="contact_info_title">Cashier</div>
								<ul>
									<li>Phone: <span>+62 858 321 7654</span></li>
									<li>Email: <span>cashier@rubik-store.com</span></li>
								</ul>
							</div>
							<div class="contact_info_section">
								<div class="contact_info_title">Owner</div>
								<ul>
									<li>Phone: <span>+62 895 123 4567</span></li>
									<li>Email: <span>rubik_cube@store.com</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->

		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="footer_background" style="background-image:url('<?= base_url("assets/vendor/sublime/images/footer.jpg") ?>')"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
							<div class="footer_logo"><a href="#">Sublime.</a></div>
							<div class="copyright ml-auto mr-auto">
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made by <a href="https://colorlib.com" target="_blank">Colorlib</a> And Modified by Alif Irfandi
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
	<script src="<?= base_url("assets/vendor/sublime/js/contact.js") ?>"></script>
	<script src="<?= base_url("assets/vendor/sweet-alert/sweetalert2.min.js") ?>"></script>

	<?= $this->session->flashdata('alert') ?>
</body>

</html>