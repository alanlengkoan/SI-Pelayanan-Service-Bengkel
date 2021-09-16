<?php
$id        = strip_tags($_POST['inpidparamater']);
$kriteria  = strip_tags($_POST['inpidkriteria']);
$parameter = $_POST['inpparameter'];
$nilai     = strip_tags($_POST['inpnilai']);

// untuk fungsi update parameternya (nama_tabel, id untuk where, id untuk nilai, nama_kolom, nama_value/nama_hasil)
$update = $pdo->Update('tb_parameter', 'id_parameter', $id, ["id_atribut", "parameter", "nilai"], [$kriteria, $parameter, $nilai]);

if ($update == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Gagal!', 'text' => 'Data tidak diubah.', 'type' => 'error', 'button' => 'Ok!')));
}
