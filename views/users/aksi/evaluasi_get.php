<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_evaluasi', 'id_evaluasi', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_evaluasi" => $row->id_evaluasi,
    "awal"        => $row->awal,
    "akhir"       => $row->akhir,
    "jarak"       => $row->jarak,
];

echo json_encode($result);
