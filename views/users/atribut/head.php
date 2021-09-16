<!DOCTYPE html>
<html lang="en" class="fixed">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>Sistem Pendukung Keputusan Jenis Tanaman</title>

    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/logo.png">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../assets/admin/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="../../assets/admin/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../../assets/admin/vendor/magnific-popup/magnific-popup.css" />

    <?php
    $content = (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_REQUEST['content'])) ? str_replace('-', '_', $_REQUEST['content']) : $_REQUEST['content'];
    if (file_exists('css/' . $content . '.php')) {
        switch ($content) {
            case $content:
                include_once 'css/' . str_replace('-', '_', $content) . '.php';
                break;
        }
    }
    ?>

    <link rel="stylesheet" href="../../assets/admin/stylesheets/theme.css" />
    <link rel="stylesheet" href="../../assets/admin/stylesheets/skins/default.css" />
    <link rel="stylesheet" href="../../assets/admin/stylesheets/theme-custom.css">

    <script type="text/javascript" src="../../assets/admin/vendor/modernizr/modernizr.js"></script>
    <script rel="preload" type="text/javascript" src="../../assets/admin/vendor/jquery/jquery.js"></script>

</head>

<body>
    <section class="body">