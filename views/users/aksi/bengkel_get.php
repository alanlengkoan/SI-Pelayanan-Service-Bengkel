<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_bengkel', 'id_bengkel', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_bengkel" => $row->id_bengkel,
    "node"       => $row->node,
    "nama"       => $row->nama,
    "alamat"     => $row->alamat,
    "gambar"     => $row->gambar,
    "latitude"   => $row->latitude,
    "longitude"  => $row->longitude,
];

echo json_encode($result);
