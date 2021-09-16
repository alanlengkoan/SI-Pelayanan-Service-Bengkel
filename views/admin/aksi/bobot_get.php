<?php
$result = [];
$id     = $_POST['id'];
$query  = $pdo->GetWhere('tb_parameter', 'id_parameter', $id);
$row    = $query->fetch(PDO::FETCH_OBJ);

$result = [
    "id_parameter" => $row->id_parameter,
    "id_atribut"   => $row->id_atribut,
    "parameter"    => $row->parameter,
    "nilai"        => $row->nilai,
];

echo json_encode($result);
