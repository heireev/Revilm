	<?php
	defined('__NOT_DIRECT') || define('__NOT_DIRECT', 1);
	include 'cek_akses.php';
	?>

	<!doctype html>
	<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">

		<!-- My CSS -->
		<link rel="stylesheet" href="assets/my/style.css">

		<!-- Datatables CSS -->
		<link rel="stylesheet" href="css/datatables.css">


		<title>REVILM</title>
	</head>

	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
			<div class="container">
				<a class="navbar-brand fw-bold" href="#">
					<img src="assets/img/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
					Revilm
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
							<a class="nav-link menu active" id="menuFilm" href="#">Daftar
								Film</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menu" id="menuTamu" href="#">Buku Tamu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link menu" id="menuSettings" href="#">Settings</a>
						</li>
					</ul>
					<ul class="navbar-nav ms-auto">
						<li class="nav-item text-light d-flex align-items-center fw-bold mx-4">
							<p class="m-0">Halo,
								<?php echo " " . $__nama_user ?>
							</p>
						</li>
						<li class="nav-item">
							<button class="btn btn-sm btn-outline-danger border-0" data-bs-toggle="modal" data-bs-target="#ModalLogout">
								<iconify-icon icon="heroicons-outline:logout" style="color: white;" width="30" height="30"></iconify-icon>
							</button>
						</li>

						<!--Modal logout-->
						<div class="modal fade" id="ModalLogout">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Logout</h5>
										<button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<center>
											<h4>Yakin Anda Mau Keluar Akun?</h4>
										</center>
									</div>
									<div class="modal-footer">
										<a href="logout.php">
											<button type="button" class="btn btn-primary">Ya</button>
										</a>
										<button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
									</div>
								</div>
							</div>
						</div>
					</ul>
				</div>
			</div>
		</nav>
		<!-- AKHIR NAVBAR -->

		<div id="content">
		</div>

		<!-- FOOTER -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h4>made by - Kelompok 1</h4>
					</div>
				</div>
			</div>
		</footer>
		<!-- AKHIR FOOTER -->

		<script src="assets/js/bootstrap.bundle.js"></script>
		<script src="assets/js/jquery-3.6.1.min.js"></script>
		<script src="assets/js/datatables.js"></script>

		<!-- load script -->
		<script>
			$(document).ready(function() {
				$('#content').load('daftar_film/daftarFilm.php');
			});

			$('.menu').click(function(e) {
				e.preventDefault();

				var menu = $(this).attr('id');
				if (menu == "menuFilm") {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#content').load('daftar_film/daftarFilm.php');
				} else if (menu == "menuTamu") {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#content').load('data_tamu/lihat_tamu.php');
				} else if (menu == "menuSettings") {
					$('.nav-link').removeClass('active');
					$(this).addClass('active');
					$('#content').load('settings.php');
				}
			});
		</script>

		<!-- Script iconify -->
		<script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
	</body>

	</html>