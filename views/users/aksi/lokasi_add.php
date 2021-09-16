<?php
$nama = strip_tags($_POST['inpnama']);

$insert = $pdo->Insert("tb_lokasi", ["nama"], [$nama]);

if ($insert == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Gagal!!', 'text' => 'Data gagal ditambah.', 'type' => 'error', 'button' => 'Ok!')));
}
