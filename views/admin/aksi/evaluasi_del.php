<?php
$id_responden = $_POST['id_responden'];
$count = $_POST['count'];

$sql = "DELETE FROM tb_data WHERE tb_data.count = '$count' AND tb_data.id_responden = '$id_responden'";
$delete  = $pdo->Query($sql);

exit(json_encode(array('title' => 'Berhasil!', 'text' => 'Data telah dihapus.', 'type' => 'success', 'button' => 'Ok!')));