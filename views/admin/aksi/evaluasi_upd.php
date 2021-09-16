<?php
$id_a = strip_tags($_POST['inpidresponden']);
$id_k = array_map("strip_tags", $_POST['inpidkriteria']);
$par  = array_map("strip_tags", $_POST['inpnilai']);

for ($i = 0; $i < count($id_k); $i++) {
    $sql = "UPDATE tb_data SET nilai = $par[$i] WHERE id_atribut = '$id_k[$i]' AND id_responden = '$id_a'";
    $qry = $pdo->Query($sql);
}

exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data diubah.', 'type' => 'success', 'button' => 'Ok!')));