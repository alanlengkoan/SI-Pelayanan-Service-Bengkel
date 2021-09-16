<?php
$id = strip_tags($_POST['inpidlokasi']);
$nama = strip_tags($_POST['inpnama']);

$update = $pdo->Update('tb_lokasi', 'id_lokasi', $id, ['nama'], [$nama]);

if ($update == 1) {
  exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
  exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
}
