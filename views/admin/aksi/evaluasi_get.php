<?php
$id_responden = $_POST['id_responden'];
$count = $_POST['count'];

$sqlData = "SELECT * FROM tb_data WHERE tb_data.count = '$count' AND tb_data.id_responden = '$id_responden'";

$qry1 = $pdo->Query($sqlData);
$qry2 = $pdo->Query($sqlData);

$result = [];
$row = $qry1->fetch(PDO::FETCH_OBJ);
$result['id_responden'] = $row->id_responden;

while ($rows = $qry2->fetch(PDO::FETCH_OBJ)) {
    $result['detail'][] = [
        "id_atribut"   => $rows->id_atribut,
        "nilai"        => $rows->nilai,
    ];
}

echo json_encode($result);