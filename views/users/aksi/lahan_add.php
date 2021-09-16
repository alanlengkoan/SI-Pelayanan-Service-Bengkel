<?php
$id_a = strip_tags($_POST['inpidlokasi']);
$id_k = array_map("strip_tags", $_POST['inpidkriteria']);
$par  = array_map("strip_tags", $_POST['inpnilai']);

for ($i = 0; $i < count($id_k); $i++) {
    $insert = $pdo->Insert("tb_lahan", ["id_lokasi", "id_atribut", "nilai"], [$id_a, $id_k[$i], $par[$i]]);
}

if ($insert == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data gagal ditambah.', 'type' => 'success', 'button' => 'Ok!')));
}