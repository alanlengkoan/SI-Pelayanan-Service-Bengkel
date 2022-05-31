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

    <style>
        html,
        body {
            background-color: #e76268;
            width: 100%;
        }
    </style>

</head>

<body>
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            <a href="index" class="logo pull-left">
                <h2 style="color: #fff;">CALL SERVICE</h2>
            </a>

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-bold m-none" style="background-color: #e76268;"><i class="fa fa-user mr-xs"></i>Masuk</h2>
                </div>
                <div class="panel-body" style="border-top-color: #e76268;">

                    <form action="aksi/?aksi=registrasi" id="form-add" method="post">
                        <div class="form-group mb-lg">
                            <label>NIK</label>
                            <input type="text" name="inpnik" id="inpnik" class="form-control input-sm inputNumber" pattern="\d*" maxlength="16" placeholder="Masukkan NIK">
                        </div>
                        <div class="form-group mb-lg">
                            <label>Nama</label>
                            <input type="text" name="inpnama" id="inpnama" class="form-control input-sm" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group mb-lg">
                            <label>No. Hp</label>
                            <input type="text" name="inpnohp" id="inpnohp" class="form-control input-sm inputNumber" pattern="\d*" maxlength="12" placeholder="Masukkan No. Hp">
                        </div>
                        <div class="form-group mb-lg">
                            <label>Tempat Lahir</label>
                            <input type="text" name="inptmplhr" id="inptmplhr" class="form-control input-sm" placeholder="Masuk Tempat Lahir">
                        </div>
                        <div class="form-group mb-lg">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="inptgllhr" id="inptgllhr" class="form-control input-sm" />
                        </div>
                        <div class="form-group mb-lg">
                            <label>Jenis Kelamin</label>
                            <select name="inpjeniskelamin" id="inpjeniskelamin" class="form-control input-sm">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mb-lg">
                            <label>Alamat</label>
                            <input type="text" name="inpalamat" id="inpalamat" class="form-control input-sm" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group mb-lg">
                            <label>Username</label>
                            <input type="text" name="inpusername" id="inpusername" class="form-control input-sm" placeholder="Username">
                        </div>
                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>Password</label>
                                    <input type="password" name="inppassword1" id="inppassword1" class="form-control input-sm" placeholder="Password">
                                    <div id="pesan"></div>
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>Password Confirmation</label>
                                    <input type="password" name="inppassword2" id="inppassword2" class="form-control input-sm" placeholder="Ulangi Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input type="checkbox" name="lihatpassword" id="lihatpassword" />
                                    <label for="AgreeTerms">
                                        <span>Lihat password</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-danger hidden-xs add">Sign Up</button>
                                <button type="submit" class="btn btn-danger btn-block btn-lg visible-xs mt-lg add">Sign Up</button>
                            </div>
                        </div>
                        <hr>
                        <p class="text-center">Sudah punya akun? <a href="login" style="color: #e76268;">Masuk disini!</a>
                    </form>
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                <a href="https://alanlengkoan.netlify.app/" target="_blank" style="color: #fff;"> AL</a> - Sistem Informasi Jalur Terdekat Service Bengkel.
            </p>
        </div>
    </section>
    <!-- end: page -->

    <script src="../assets/admin/vendor/jquery/jquery.js"></script>
    <script src="../assets/admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../assets/admin/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../assets/admin/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../assets/admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../assets/admin/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../assets/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="../assets/admin/javascripts/theme.js"></script>
    <script src="../assets/admin/javascripts/theme.custom.js"></script>
    <script src="../assets/admin/javascripts/theme.init.js"></script>

</body>

</html>