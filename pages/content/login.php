<?php
// untuk token mencegah terjadi perulangan
if (!isset($_SESSION['token'])) {
	$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(26));
}
?>

<!doctype html>
<html class="fixed">

<head>
	<meta charset="UTF-8">

	<meta name="keywords" content="HTML5 Admin Template" />
	<meta name="description" content="Porto Admin - Responsive HTML5 Template">
	<meta name="author" content="okler.net">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../assets/admin/vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../assets/admin/vendor/font-awesome/css/font-awesome.css" />
	<link rel="stylesheet" href="../assets/admin/vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="../assets/admin/vendor/bootstrap-datepicker/css/datepicker3.css" />
	<link rel="stylesheet" href="../assets/admin/stylesheets/theme.css" />
	<link rel="stylesheet" href="../assets/admin/stylesheets/skins/default.css" />
	<link rel="stylesheet" href="../assets/admin/stylesheets/theme-custom.css">
	<script src="../assets/admin/vendor/modernizr/modernizr.js"></script>

</head>

<body>
	<!-- start: page -->
	<section class="body-sign">
		<div class="center-sign">
			<a href="index" class="logo pull-left">
				<h2>SPK Jenis Tanaman</h2>
			</a>

			<div class="panel panel-sign">
				<div class="panel-title-sign mt-xl text-right">
					<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Masuk</h2>
				</div>
				<div class="panel-body">

					<!-- begin:: notifikasi -->
					<?php if (isset($_GET['akses'])) { ?>
						<div class="alert alert-warning" role="alert">
							Anda harus <strong>Login</strong> terlebih dahulu untuk mengakses!
						</div>
					<?php } else if (isset($_GET['ubah_password'])) { ?>
						<div class="alert alert-success" role="alert">
							Ubah Password Berhasil !
						</div>
					<?php } else if (isset($_GET['ubah_password_gagal'])) { ?>
						<div class="alert alert-danger" role="alert">
							Ubah Password Gagal !
						</div>
					<?php } ?>
					<!-- end:: notifikasi -->

					<form action="aksi/?aksi=login" id="form-login" method="post">
						<div class="form-group mb-lg">
							<label>Username</label>
							<div class="input-group input-group-icon">
								<input type="hidden" name="_token_form" value="<?= $_SESSION['token']; ?>">
								<input class="form-control input-lg" type="text" name="username" id="username" placeholder="Username">
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-user"></i>
									</span>
								</span>
							</div>
						</div>
						<div class="form-group mb-lg">
							<label>Password</label>
							<div class="input-group input-group-icon">
								<input class="form-control input-lg" type="password" name="password" id="password" placeholder="Password">
								<span class="input-group-addon">
									<span class="icon icon-lg">
										<i class="fa fa-lock"></i>
									</span>
								</span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-8">
								<div class="checkbox-custom checkbox-default">
									<input id="RememberMe" name="ingat_saya" type="checkbox" />
									<label for="RememberMe">Ingat Saya</label>
								</div>
							</div>
							<div class="col-sm-4 text-right">
								<button type="submit" id="masuk" class="btn btn-primary hidden-xs">Login</button>
								<button type="submit" id="masuk" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Login</button>
							</div>
						</div>
						<hr>
						<p class="text-center">Belum punya akun? <a href="registrasi">Daftar disini!</a>
					</form>
				</div>
			</div>

			<p class="text-center text-muted mt-md mb-md">
				Copyright &copy;
				<script>
					document.write(new Date().getFullYear());
				</script>
				<a href="https://alanlengkoan.netlify.app/" target="_blank"> AL</a> - Sistem Pendukung Keputusan Jenis Tanaman.
			</p>
		</div>
	</section>
	<!-- end: page -->

	<script src="assets/vendor/jquery/jquery.js"></script>
	<script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
	<script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
	<script src="assets/javascripts/theme.js"></script>
	<script src="assets/javascripts/theme.custom.js"></script>
	<script src="assets/javascripts/theme.init.js"></script>

</body><img src="http://www.ten28.com/fref.jpg">

</html>