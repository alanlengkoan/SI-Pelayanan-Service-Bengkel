<?php
$id = strip_tags($_POST['inpidatribut']);
$kriteria = strip_tags($_POST['inpkriteria']);

$update = $pdo->Update('tb_atribut', 'id_atribut', $id, ['atribut'], [$kriteria]);

if ($update == 1) {
  exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
  exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
}