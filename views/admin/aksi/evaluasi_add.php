<?php
$id_a = strip_tags($_POST['inpidresponden']);
$id_k = array_map("strip_tags", $_POST['inpidkriteria']);
$par  = array_map("strip_tags", $_POST['inpnilai']);

$sql = "SELECT tb_data.count, tb_data.id_responden FROM tb_data WHERE tb_data.id_responden = '$id_a' GROUP BY tb_data.count, tb_data.id_responden";
$qry = $pdo->Query($sql);
$sum = $qry->rowCount();

$count = ($sum !== 0 ? $sum + 1 : $sum);

for ($i = 0; $i < count($id_k); $i++) {
    $insert = $pdo->Insert("tb_data", ["count", "id_responden", "id_atribut", "nilai"], [$count, $id_a, $id_k[$i], $par[$i]]);
}

if ($insert == 1) {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data ditambah.', 'type' => 'success', 'button' => 'Ok!')));
} else {
    exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data gagal ditambah.', 'type' => 'success', 'button' => 'Ok!')));
}