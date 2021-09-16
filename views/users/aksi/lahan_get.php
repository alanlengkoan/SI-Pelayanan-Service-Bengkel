<?php
$id_lokasi = $_POST['id_lokasi'];

$sqlData = "SELECT * FROM tb_lahan WHERE tb_lahan.id_lokasi = '$id_lokasi'";

$qry1 = $pdo->Query($sqlData);
$qry2 = $pdo->Query($sqlData);

$result = [];
$row = $qry1->fetch(PDO::FETCH_OBJ);
$result['id_lokasi'] = $row->id_lokasi;

while ($rows = $qry2->fetch(PDO::FETCH_OBJ)) {
    $result['detail'][] = [
        "id_atribut"   => $rows->id_atribut,
        "nilai"        => $rows->nilai,
    ];
}

echo json_encode($result);