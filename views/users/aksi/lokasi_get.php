<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_lokasi', 'id_lokasi', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_lokasi" => $row->id_lokasi,
    "nama"      => $row->nama,
];

echo json_encode($result);
