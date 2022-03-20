<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Sistem Informasi Jalur Terdekat Service Bengkel" />
    <meta name="description" content="Sistem Informasi Jalur Terdekat Service Bengkel" />
    <meta name="author" content="alanlengkoan.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Informasi Jalur Terdekat Service Bengkel</title>
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/landing_page/images/favicon.ico">

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

    <script type="text/javascript" src="../assets/landing_page/js/jquery.min.js"></script>

<body>