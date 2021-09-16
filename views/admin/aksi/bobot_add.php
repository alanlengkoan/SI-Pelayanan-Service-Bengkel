<?php
$kriteria  = strip_tags($_POST['inpidkriteria']);
$parameter = $_POST['inpparameter'];
$nilai     = strip_tags($_POST['inpnilai']);

$insert = $pdo->Insert("tb_parameter", ["id_atribut", "parameter", "nilai"], [$kriteria, $parameter, $nilai]);

if ($insert == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data gagal ditambah.', 'type' => 'error', 'button' => 'Ok!')));
}
