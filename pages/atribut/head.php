<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Pakar Diagnosa Buah Naga</title>
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">

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

    <script rel="preload" type="text/javascript" src="../assets/landing_page/js/jquery-2.1.1.js"></script>
<body>