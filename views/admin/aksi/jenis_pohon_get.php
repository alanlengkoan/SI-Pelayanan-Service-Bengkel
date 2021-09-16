<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_responden', 'id_responden', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_responden" => $row->id_responden,
    "responden"    => $row->responden,
    "gambar"       => $row->gambar,
    "keterangan"   => $row->keterangan,
];

echo json_encode($result);
